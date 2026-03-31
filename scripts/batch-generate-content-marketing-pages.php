<?php
$options = getopt('', ['city:', 'dry-run', 'verbose', 'regenerate-all', 'help']);

define('TML_ROOT', dirname(dirname(dirname(__DIR__))));
define('VIEWS_DIR', TML_ROOT . '/php-site/deploy/views');
define('MASTER_FILE', TML_ROOT . '/php-site/deploy/views/content-marketing-edmonton.php');

$singleCity = $options['city'] ?? null;
$dryRun = isset($options['dry-run']);
$verbose = isset($options['verbose']);

echo "📝 BATCH CONTENT MARKETING PAGE GENERATOR\n";
echo "========================================\n\n";

if (!file_exists(MASTER_FILE)) {
    die("❌ Error: Master file not found\n");
}

$masterContent = file_get_contents(MASTER_FILE);
echo "✅ Loaded master\n";
echo "📊 Size: " . round(strlen($masterContent) / 1024, 1) . " KB\n\n";

$cities = ['Abbotsford', 'Airdrie', 'Barrie', 'Brampton', 'Brandon', 'Brantford', 'Burlington', 'Burnaby', 'Calgary', 'Cambridge', 'Charlottetown', 'Chatham', 'Chilliwack', 'Coquitlam', 'Corner Brook', 'Edmonton', 'Fredericton', 'Gatineau', 'Grande Prairie', 'Guelph', 'Halifax', 'Hamilton', 'Kamloops', 'Kelowna', 'Kingston', 'Kitchener', 'Langley', 'Lethbridge', 'London (ON)', 'Markham', 'Medicine Hat', 'Mississauga', 'Moncton', 'Montreal', 'Moose Jaw', 'Nanaimo', 'New Westminster', 'Oakville', 'Oshawa', 'Ottawa', 'Peterborough', 'Prince Albert', 'Prince George', 'Quebec City', 'Red Deer', 'Regina', 'Richmond Hill', 'Saint John', 'Saskatoon', 'Sherbrooke', 'St. Catharines', 'St. Johns', 'Sudbury', 'Surrey', 'Thunder Bay', 'Toronto', 'Vaughan', 'Victoria', 'Vancouver', 'Waterloo', 'Whitehorse', 'Windsor', 'Winnipeg'];

$citiesToProcess = $singleCity ? [$singleCity] : $cities;

echo "📍 Processing " . count($citiesToProcess) . " location(s)...\n";
echo "─────────────────────────────────────────────────────────\n\n";

$successCount = 0;
$startTime = microtime(true);

foreach ($citiesToProcess as $city) {
    $citySlug = strtolower(str_replace(' ', '-', $city));
    
    $replacements = [
        'Edmonton' => $city,
        'edmonton' => strtolower($city),
        'https://townmedialabs.ca/services/content-marketing-in-edmonton/' => "https://townmedialabs.ca/services/content-marketing-in-$citySlug/",
        'Best Content Marketing in Edmonton' => "Best Content Marketing in $city",
        'Content Marketing in Edmonton' => "Content Marketing in $city",
        'Edmonton Businesses' => "$city Businesses",
        'Edmonton\'s Content' => "$city's Content",
    ];

    $pageContent = $masterContent;
    foreach ($replacements as $find => $replace) {
        $pageContent = str_replace($find, $replace, $pageContent);
    }

    $outputFile = VIEWS_DIR . "/content-marketing-in-$citySlug.php";

    if (!$dryRun) {
        if (!is_dir(VIEWS_DIR)) mkdir(VIEWS_DIR, 0755, true);
        if (file_put_contents($outputFile, $pageContent)) $successCount++;
    } else {
        $successCount++;
    }
}

$endTime = microtime(true);
$duration = $endTime - $startTime;

echo "─────────────────────────────────────────────────────────\n";
echo "✅ GENERATION COMPLETE\n";
echo "✨ Generated: $successCount pages\n";
echo "⏱️  Duration: " . round($duration, 2) . " seconds\n";
echo "🚀 Speed: " . round($successCount / ($duration > 0 ? $duration : 1), 0) . " pages/second\n";

exit(0);
