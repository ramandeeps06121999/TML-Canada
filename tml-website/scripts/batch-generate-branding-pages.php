<?php
/**
 * BATCH BRANDING PAGE GENERATOR
 * Generates 62 location-specific branding pages
 */

$options = getopt('', ['city:', 'dry-run', 'verbose', 'regenerate-all', 'help']);

if (isset($options['help'])) {
    echo "BATCH BRANDING PAGE GENERATOR\n";
    echo "==============================\n\n";
    echo "Usage:\n";
    echo "  php batch-generate-branding-pages.php                # Generate all 62 pages\n";
    echo "  php batch-generate-branding-pages.php --city=Calgary # Generate single city\n";
    exit(0);
}

define('TML_ROOT', dirname(dirname(dirname(__DIR__))));
define('VIEWS_DIR', TML_ROOT . '/php-site/deploy/views');
define('MASTER_FILE', TML_ROOT . '/php-site/deploy/views/branding-edmonton.php');

$singleCity = $options['city'] ?? null;
$dryRun = isset($options['dry-run']);
$verbose = isset($options['verbose']);
$regenerateAll = isset($options['regenerate-all']);

echo "🎨 BATCH BRANDING PAGE GENERATOR\n";
echo "=================================\n\n";

if (!file_exists(MASTER_FILE)) {
    die("❌ Error: Master file not found at " . MASTER_FILE . "\n");
}

$masterContent = file_get_contents(MASTER_FILE);
echo "✅ Loaded master from " . MASTER_FILE . "\n";
echo "📊 Master size: " . round(strlen($masterContent) / 1024, 1) . " KB\n\n";

$cities = ['Abbotsford', 'Airdrie', 'Barrie', 'Brampton', 'Brandon', 'Brantford', 'Burlington', 'Burnaby', 'Calgary', 'Cambridge', 'Charlottetown', 'Chatham', 'Chilliwack', 'Coquitlam', 'Corner Brook', 'Edmonton', 'Fredericton', 'Gatineau', 'Grande Prairie', 'Guelph', 'Halifax', 'Hamilton', 'Kamloops', 'Kelowna', 'Kingston', 'Kitchener', 'Langley', 'Lethbridge', 'London (ON)', 'Markham', 'Medicine Hat', 'Mississauga', 'Moncton', 'Montreal', 'Moose Jaw', 'Nanaimo', 'New Westminster', 'Oakville', 'Oshawa', 'Ottawa', 'Peterborough', 'Prince Albert', 'Prince George', 'Quebec City', 'Red Deer', 'Regina', 'Richmond Hill', 'Saint John', 'Saskatoon', 'Sherbrooke', 'St. Catharines', 'St. Johns', 'Sudbury', 'Surrey', 'Thunder Bay', 'Toronto', 'Vaughan', 'Victoria', 'Vancouver', 'Waterloo', 'Whitehorse', 'Windsor', 'Winnipeg'];

$citiesToProcess = $singleCity ? [$singleCity] : $cities;

echo "📍 Processing " . count($citiesToProcess) . " location(s)...\n";
echo "─────────────────────────────────────────────────────────\n\n";

$successCount = 0;
$errorCount = 0;
$startTime = microtime(true);

foreach ($citiesToProcess as $city) {
    $citySlug = strtolower(str_replace(' ', '-', $city));
    
    $replacements = [
        'Edmonton' => $city,
        'edmonton' => strtolower($city),
        'https://townmedialabs.ca/services/branding-in-edmonton/' => "https://townmedialabs.ca/services/branding-in-$citySlug/",
        'Branding & Logo Design in Edmonton' => "Branding & Logo Design in $city",
        'Branding in Edmonton' => "Branding in $city",
        'Best Branding & Logo Design in Edmonton' => "Best Branding & Logo Design in $city",
        'Edmonton Businesses' => "$city Businesses",
        'Edmonton market' => "$city market",
        'Edmonton companies' => "$city companies",
        'Edmonton businesses' => "$city businesses",
        'Edmonton\'s Competitive' => "$city's Competitive",
    ];

    $pageContent = $masterContent;
    foreach ($replacements as $find => $replace) {
        $pageContent = str_replace($find, $replace, $pageContent);
    }

    $outputFile = VIEWS_DIR . "/branding-in-$citySlug.php";

    if (file_exists($outputFile) && !$regenerateAll && !$verbose) {
        continue;
    }

    if (!$dryRun) {
        if (!is_dir(VIEWS_DIR)) {
            mkdir(VIEWS_DIR, 0755, true);
        }

        if (file_put_contents($outputFile, $pageContent)) {
            $successCount++;
            if ($verbose) echo "✅ Generated: $city\n";
        } else {
            $errorCount++;
            echo "❌ Error: $city\n";
        }
    } else {
        $successCount++;
    }
}

$endTime = microtime(true);
$duration = $endTime - $startTime;

echo "\n─────────────────────────────────────────────────────────\n";
echo "✅ BRANDING PAGE GENERATION COMPLETE\n";
echo "─────────────────────────────────────────────────────────\n";
echo "✨ Successfully generated: $successCount pages\n";
echo "⏱️  Duration: " . round($duration, 2) . " seconds\n";
echo "🚀 Speed: " . ($successCount > 0 ? round($successCount / ($duration > 0 ? $duration : 1), 0) : 0) . " pages/second\n";

exit($errorCount > 0 ? 1 : 0);
