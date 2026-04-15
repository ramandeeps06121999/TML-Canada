<?php
/**
 * Google Indexing API - Daily URL Submitter
 * 
 * Submits up to 150 URLs per day to the Google Indexing API for faster indexing.
 * Cycles through all site URLs, tracking progress in a state file.
 *
 * SETUP:
 * 1. Enable "Web Search Indexing API" in Google Cloud Console
 * 2. Create a Service Account & download the JSON key file
 * 3. Add the service account email as Owner in Google Search Console
 * 4. Place the JSON key file in /scripts/google-service-account.json
 * 5. Run: composer require google/apiclient (in the project root)
 * 6. Set up a cron job: 0 3 * * * php /path/to/scripts/google-indexing-api.php
 *
 * USAGE:
 *   php scripts/google-indexing-api.php              # Submit next 150 URLs
 *   php scripts/google-indexing-api.php --dry-run    # Preview without submitting
 *   php scripts/google-indexing-api.php --reset      # Reset progress & start over
 *   php scripts/google-indexing-api.php --status     # View current progress
 *   php scripts/google-indexing-api.php --limit=50   # Custom limit (default: 150)
 *   php scripts/google-indexing-api.php --urls-file=/path/to/urls.txt   # Submit specific URLs (one per line)
 */

declare(strict_types=1);

// ─── Configuration ──────────────────────────────────────────────────────────

define('DAILY_LIMIT', 150);
define('BATCH_SIZE', 40);  // Google batch endpoint limit per request
define('SCRIPT_DIR', __DIR__);
define('STATE_FILE', SCRIPT_DIR . '/indexing-state.json');
define('LOG_DIR', SCRIPT_DIR . '/indexing-logs');
define('SERVICE_ACCOUNT_FILE', SCRIPT_DIR . '/google-service-account.json');
define('INDEXING_ENDPOINT', 'https://indexing.googleapis.com/v3/urlNotifications:publish');
define('BATCH_ENDPOINT', 'https://indexing.googleapis.com/batch');

// ─── Bootstrap ──────────────────────────────────────────────────────────────

require_once dirname(__DIR__) . '/bootstrap.php';

// Check for Composer autoloader
$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';
$hasComposer = file_exists($autoloadPath);

// ─── CLI Arguments ──────────────────────────────────────────────────────────

$dryRun    = in_array('--dry-run', $argv ?? []);
$reset     = in_array('--reset', $argv ?? []);
$status    = in_array('--status', $argv ?? []);
$limitArg  = null;
$urlsFile  = null;

foreach ($argv ?? [] as $arg) {
    if (str_starts_with($arg, '--limit=')) {
        $limitArg = (int) substr($arg, 8);
    }
    if (str_starts_with($arg, '--urls-file=')) {
        $urlsFile = (string) substr($arg, 12);
    }
}

$dailyLimit = $limitArg ?? DAILY_LIMIT;

// ─── Logging ────────────────────────────────────────────────────────────────

if (!is_dir(LOG_DIR)) {
    mkdir(LOG_DIR, 0755, true);
}

$logFile = LOG_DIR . '/indexing-' . date('Y-m-d') . '.log';

function logMsg(string $message, string $level = 'INFO'): void
{
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    $line = "[$timestamp] [$level] $message\n";
    file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);

    // Also output to console when running CLI
    if (php_sapi_name() === 'cli') {
        echo $line;
    }
}

// ─── Collect All URLs ───────────────────────────────────────────────────────

function collectAllUrls(): array
{
    $siteUrl = TML_SITE_URL;
    $urls = [];

    // 1. Home
    $urls[] = $siteUrl . '/';

    // 2. Static pages
    $staticPages = [
        'about-us',
        'contact-us',
        'portfolio',
        'careers',
        'privacy-policy',
        'terms-of-service',
        'free-tools',
    ];
    foreach ($staticPages as $page) {
        $urls[] = $siteUrl . '/' . $page;
    }

    // 3. Services
    $servicePages = tml_service_pages();
    foreach (array_keys($servicePages) as $slug) {
        $urls[] = $siteUrl . '/services/' . $slug;
    }

    // 4. Location-Service pages (the bulk)
    $locations = tml_locations();
    foreach ($locations as $locSlug => $locData) {
        foreach ($servicePages as $svcSlug => $svcData) {
            $urls[] = $siteUrl . '/services/' . $svcSlug . '-in-' . str_replace('_', '-', $locSlug);
        }
    }

    // 5. Industries
    $urls[] = $siteUrl . '/industries';

    // 6. Blog
    $blogArticles = tml_blog_articles();
    $urls[] = $siteUrl . '/blog';
    foreach (array_keys($blogArticles) as $slug) {
        $urls[] = $siteUrl . '/blog/' . $slug;
    }

    return array_unique($urls);
}

/**
 * Load a list of URLs from a file (one URL per line).
 * Lines starting with # are treated as comments.
 */
function collectUrlsFromFile(string $filePath): array
{
    $filePath = trim($filePath);
    if ($filePath === '' || !file_exists($filePath)) {
        logMsg('URLs file not found: ' . $filePath, 'ERROR');
        return [];
    }
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    if ($lines === false) {
        logMsg('Failed to read URLs file: ' . $filePath, 'ERROR');
        return [];
    }
    $out = [];
    foreach ($lines as $line) {
        $line = trim((string) $line);
        if ($line === '' || str_starts_with($line, '#')) continue;
        $out[] = $line;
    }
    return array_values(array_unique($out));
}

// ─── State Management ──────────────────────────────────────────────────────

function loadState(): array
{
    if (!file_exists(STATE_FILE)) {
        return [
            'lastOffset'     => 0,
            'lastRunDate'    => null,
            'totalSubmitted' => 0,
            'totalCycles'    => 0,
            'dailyLog'       => [],
            'errors'         => [],
        ];
    }
    $data = json_decode(file_get_contents(STATE_FILE), true);
    return is_array($data) ? $data : [
        'lastOffset'     => 0,
        'lastRunDate'    => null,
        'totalSubmitted' => 0,
        'totalCycles'    => 0,
        'dailyLog'       => [],
        'errors'         => [],
    ];
}

function saveState(array $state): void
{
    // Keep only last 30 days of daily logs
    if (isset($state['dailyLog']) && count($state['dailyLog']) > 30) {
        $state['dailyLog'] = array_slice($state['dailyLog'], -30, 30, true);
    }
    // Keep only last 100 errors
    if (isset($state['errors']) && count($state['errors']) > 100) {
        $state['errors'] = array_slice($state['errors'], -100);
    }

    file_put_contents(STATE_FILE, json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

// ─── Google API Auth ────────────────────────────────────────────────────────

function getAccessToken(): ?string
{
    global $hasComposer, $autoloadPath;

    if (!$hasComposer) {
        logMsg('Composer autoloader not found. Run: composer require google/apiclient', 'ERROR');
        return null;
    }

    if (!file_exists(SERVICE_ACCOUNT_FILE)) {
        logMsg('Service account JSON file not found at: ' . SERVICE_ACCOUNT_FILE, 'ERROR');
        logMsg('Download it from Google Cloud Console → IAM → Service Accounts → Keys', 'ERROR');
        return null;
    }

    require_once $autoloadPath;

    try {
        $client = new \Google_Client();
        $client->setAuthConfig(SERVICE_ACCOUNT_FILE);
        $client->addScope('https://www.googleapis.com/auth/indexing');

        $token = $client->fetchAccessTokenWithAssertion();

        if (isset($token['access_token'])) {
            return $token['access_token'];
        }

        logMsg('Failed to obtain access token: ' . json_encode($token), 'ERROR');
        return null;
    } catch (\Exception $e) {
        logMsg('Auth error: ' . $e->getMessage(), 'ERROR');
        return null;
    }
}

// ─── Submit URL (single) ────────────────────────────────────────────────────

function submitUrl(string $url, string $accessToken): array
{
    $payload = json_encode([
        'url'  => $url,
        'type' => 'URL_UPDATED',
    ]);

    $ch = curl_init(INDEXING_ENDPOINT);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
        ],
        CURLOPT_TIMEOUT        => 30,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error    = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['success' => false, 'error' => $error, 'httpCode' => 0];
    }

    $body = json_decode($response, true);

    return [
        'success'  => $httpCode === 200,
        'httpCode' => $httpCode,
        'body'     => $body,
        'error'    => $httpCode !== 200 ? ($body['error']['message'] ?? "HTTP $httpCode") : null,
    ];
}

// ─── Submit URLs (batch) ─────────────────────────────────────────────────────

function submitBatch(array $urls, string $accessToken): array
{
    $boundary = 'batch_indexing_' . uniqid();
    $body = '';

    foreach ($urls as $i => $url) {
        $payload = json_encode([
            'url'  => $url,
            'type' => 'URL_UPDATED',
        ]);

        $body .= "--$boundary\r\n";
        $body .= "Content-Type: application/http\r\n";
        $body .= "Content-ID: <item$i>\r\n\r\n";
        $body .= "POST /v3/urlNotifications:publish HTTP/1.1\r\n";
        $body .= "Content-Type: application/json\r\n";
        $body .= "Content-Length: " . strlen($payload) . "\r\n\r\n";
        $body .= "$payload\r\n";
    }
    $body .= "--$boundary--\r\n";

    $ch = curl_init(BATCH_ENDPOINT);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $body,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            "Content-Type: multipart/mixed; boundary=$boundary",
            'Authorization: Bearer ' . $accessToken,
        ],
        CURLOPT_TIMEOUT        => 60,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error    = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['success' => false, 'error' => $error, 'results' => []];
    }

    // Parse multipart response
    $results = [];
    $successCount = 0;
    $failCount = 0;

    // Simple parsing - look for HTTP status lines in the response
    preg_match_all('/HTTP\/\d\.\d (\d+)/', $response, $statusMatches);
    $statuses = $statusMatches[1] ?? [];

    foreach ($urls as $i => $url) {
        $status = (int) ($statuses[$i] ?? 0);
        $ok = $status === 200;
        $results[] = [
            'url'     => $url,
            'success' => $ok,
            'status'  => $status,
        ];
        if ($ok) {
            $successCount++;
        } else {
            $failCount++;
        }
    }

    return [
        'success'      => $httpCode === 200,
        'httpCode'     => $httpCode,
        'successCount' => $successCount,
        'failCount'    => $failCount,
        'results'      => $results,
    ];
}

// ─── Command: --status ──────────────────────────────────────────────────────

if ($status) {
    $state = loadState();
    $allUrls = collectAllUrls();
    $totalUrls = count($allUrls);

    echo "\n";
    echo "╔══════════════════════════════════════════════════════╗\n";
    echo "║       Google Indexing API - Status Report           ║\n";
    echo "╠══════════════════════════════════════════════════════╣\n";
    printf("║  Total site URLs:        %-25s  ║\n", number_format($totalUrls));
    printf("║  Daily limit:            %-25s  ║\n", number_format($dailyLimit));
    printf("║  Days to complete cycle: %-25s  ║\n", number_format((int) ceil($totalUrls / $dailyLimit)));
    printf("║  Current offset:         %-25s  ║\n", number_format($state['lastOffset']));
    printf("║  Total submitted (all):  %-25s  ║\n", number_format($state['totalSubmitted']));
    printf("║  Complete cycles:        %-25s  ║\n", $state['totalCycles']);
    printf("║  Last run:               %-25s  ║\n", $state['lastRunDate'] ?? 'Never');
    echo "╠══════════════════════════════════════════════════════╣\n";
    echo "║  Recent Daily Submissions:                         ║\n";

    $recentLogs = array_slice($state['dailyLog'] ?? [], -7, 7, true);
    foreach ($recentLogs as $date => $count) {
        printf("║    %s  →  %-5s URLs                             ║\n", $date, $count);
    }
    if (empty($recentLogs)) {
        echo "║    (no submissions yet)                            ║\n";
    }

    echo "╚══════════════════════════════════════════════════════╝\n\n";

    // Show service account status
    if (file_exists(SERVICE_ACCOUNT_FILE)) {
        echo "✅ Service account file found\n";
    } else {
        echo "❌ Service account file MISSING at:\n   " . SERVICE_ACCOUNT_FILE . "\n";
    }

    if ($hasComposer) {
        echo "✅ Composer autoloader found\n";
    } else {
        echo "❌ Composer autoloader MISSING - run: composer require google/apiclient\n";
    }

    echo "\n";
    exit(0);
}

// ─── Command: --reset ───────────────────────────────────────────────────────

if ($reset) {
    if (file_exists(STATE_FILE)) {
        unlink(STATE_FILE);
        echo "✅ State file reset. Next run will start from the beginning.\n";
    } else {
        echo "ℹ️  No state file found. Already at initial state.\n";
    }
    exit(0);
}

// ─── Main Submission Flow ──────────────────────────────────────────────────

logMsg('=== Google Indexing API - Starting daily submission ===');

// Determine URLs to submit
$manualMode = is_string($urlsFile) && trim($urlsFile) !== '';
if ($manualMode) {
    $allUrls = collectUrlsFromFile($urlsFile);
    $totalUrls = count($allUrls);
    logMsg("Manual mode enabled (urls-file). URLs in file: $totalUrls");
    $urlsToSubmit = array_slice($allUrls, 0, $dailyLimit);
    $batchCount = count($urlsToSubmit);
    logMsg("Submitting first $batchCount URLs from file (limit $dailyLimit)");
    // State is not advanced in manual mode
    $state = loadState();
    $offset = 0;
} else {
    // Collect all URLs
    $allUrls = collectAllUrls();
    $totalUrls = count($allUrls);
    logMsg("Total site URLs: $totalUrls");

    // Load state
    $state = loadState();
    $offset = $state['lastOffset'] ?? 0;

    // If offset exceeds total, wrap around (new cycle)
    if ($offset >= $totalUrls) {
        $offset = 0;
        $state['totalCycles'] = ($state['totalCycles'] ?? 0) + 1;
        logMsg("Completed a full cycle! Starting cycle #" . ($state['totalCycles'] + 1));
    }

    // Get today's batch of URLs
    $urlsToSubmit = array_slice($allUrls, $offset, $dailyLimit);
    $batchCount = count($urlsToSubmit);
    logMsg("Submitting URLs $offset to " . ($offset + $batchCount) . " (batch of $batchCount)");
}

if ($dryRun) {
    logMsg('*** DRY RUN MODE - No actual API calls will be made ***');
    echo "\n📋 URLs that would be submitted ($batchCount total):\n";
    echo str_repeat('─', 60) . "\n";
    foreach ($urlsToSubmit as $i => $url) {
        printf("  %3d. %s\n", $i + 1, $url);
    }
    echo str_repeat('─', 60) . "\n";
    echo "\n✅ Dry run complete. Run without --dry-run to actually submit.\n";
    exit(0);
}

// Get access token
$accessToken = getAccessToken();
if (!$accessToken) {
    logMsg('Cannot proceed without valid access token. Aborting.', 'ERROR');
    exit(1);
}

logMsg('Access token obtained successfully');

// Submit in batches for efficiency
$submitted = 0;
$failed = 0;
$chunks = array_chunk($urlsToSubmit, BATCH_SIZE);

foreach ($chunks as $chunkIndex => $chunk) {
    $chunkNum = $chunkIndex + 1;
    $totalChunks = count($chunks);
    logMsg("Processing batch $chunkNum/$totalChunks (" . count($chunk) . " URLs)...");

    // Try batch submission first
    $batchResult = submitBatch($chunk, $accessToken);

    if ($batchResult['success']) {
        // Batch worked - log individual results
        foreach ($batchResult['results'] as $result) {
            if ($result['success']) {
                $submitted++;
                logMsg("  ✅ {$result['url']}", 'OK');
            } else {
                $failed++;
                logMsg("  ❌ {$result['url']} (HTTP {$result['status']})", 'WARN');
                $state['errors'][] = [
                    'date'  => date('Y-m-d H:i:s'),
                    'url'   => $result['url'],
                    'error' => "HTTP {$result['status']}",
                ];
            }
        }
    } else {
        // Batch failed - fall back to individual submissions
        logMsg("Batch submission failed, falling back to individual requests...", 'WARN');

        foreach ($chunk as $url) {
            $result = submitUrl($url, $accessToken);

            if ($result['success']) {
                $submitted++;
                logMsg("  ✅ $url", 'OK');
            } else {
                $failed++;
                $errorMsg = $result['error'] ?? 'Unknown error';
                logMsg("  ❌ $url → $errorMsg", 'WARN');
                $state['errors'][] = [
                    'date'  => date('Y-m-d H:i:s'),
                    'url'   => $url,
                    'error' => $errorMsg,
                ];

                // If rate limited (429), wait and retry
                if (($result['httpCode'] ?? 0) === 429) {
                    logMsg("Rate limited! Waiting 60 seconds...", 'WARN');
                    sleep(60);
                    // Retry once
                    $retry = submitUrl($url, $accessToken);
                    if ($retry['success']) {
                        $submitted++;
                        $failed--;
                        logMsg("  ✅ $url (retry succeeded)", 'OK');
                    }
                }
            }

            // Small delay between individual requests to avoid rate limits
            usleep(200000); // 200ms
        }
    }

    // Brief pause between batches
    if ($chunkIndex < count($chunks) - 1) {
        sleep(2);
    }
}

// Update state
if (!$manualMode) {
    $state['lastOffset']     = $offset + $batchCount;
    $state['lastRunDate']    = date('Y-m-d H:i:s');
    $state['totalSubmitted'] = ($state['totalSubmitted'] ?? 0) + $submitted;
    $state['dailyLog'][date('Y-m-d')] = $submitted;
    saveState($state);
} else {
    logMsg('Manual mode: state not updated (no offset advance).');
}

// Summary
logMsg("=== Submission Complete ===");
logMsg("Submitted: $submitted | Failed: $failed | Total: $batchCount");
logMsg("Next offset: " . ($offset + $batchCount) . " / $totalUrls");

$remainingUrls = $totalUrls - ($offset + $batchCount);
if ($remainingUrls > 0) {
    $daysRemaining = (int) ceil($remainingUrls / $dailyLimit);
    logMsg("Remaining in cycle: $remainingUrls URLs (~$daysRemaining days)");
} else {
    logMsg("🎉 Full cycle complete! Next run will start a new cycle.");
}

echo "\n✅ Done! Check log at: $logFile\n";
