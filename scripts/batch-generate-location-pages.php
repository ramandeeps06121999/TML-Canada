<?php
/**
 * BATCH LOCATION PAGE GENERATOR
 *
 * Generates 1,488 location-specific SEO pages from Edmonton template
 * Automatically substitutes location-specific variables
 *
 * Usage:
 * php batch-generate-location-pages.php
 * php batch-generate-location-pages.php --city=Calgary
 * php batch-generate-location-pages.php --dry-run
 * php batch-generate-location-pages.php --regenerate-all
 * php batch-generate-location-pages.php --verbose
 */

// CLI argument parsing
$options = getopt('', [
    'city:',
    'dry-run',
    'verbose',
    'regenerate-all',
    'help'
]);

if (isset($options['help'])) {
    echo "BATCH LOCATION PAGE GENERATOR\n";
    echo "==============================\n\n";
    echo "Generate 1,488 location-specific SEO pages from template\n\n";
    echo "Usage:\n";
    echo "  php batch-generate-location-pages.php                  # Generate all 1,488 pages\n";
    echo "  php batch-generate-location-pages.php --city=Calgary   # Generate single city\n";
    echo "  php batch-generate-location-pages.php --dry-run        # Test run (no output)\n";
    echo "  php batch-generate-location-pages.php --verbose        # Detailed output\n";
    echo "  php batch-generate-location-pages.php --regenerate-all # Force regenerate\n";
    exit(0);
}

define('TML_ROOT', dirname(dirname(dirname(__DIR__))));
define('VIEWS_DIR', TML_ROOT . '/php-site/deploy/views');
define('TEMPLATE_FILE', TML_ROOT . '/php-site/deploy/views/edmonton-seo.php');
define('ENRICHMENT_FILE', TML_ROOT . '/php-site/deploy/data/enrichments.json');
define('LOCATIONS_FILE', TML_ROOT . '/php-site/deploy/data/LocationServiceIndex.json');

// CLI flags
$singleCity = $options['city'] ?? null;
$dryRun = isset($options['dry-run']);
$verbose = isset($options['verbose']);
$regenerateAll = isset($options['regenerate-all']);

echo "🚀 BATCH LOCATION PAGE GENERATOR\n";
echo "================================\n\n";

// Load enrichment data
if (!file_exists(ENRICHMENT_FILE)) {
    die("❌ Error: enrichments.json not found at " . ENRICHMENT_FILE . "\n");
}

$enrichments = json_decode(file_get_contents(ENRICHMENT_FILE), true);
if (!$enrichments) {
    die("❌ Error: Failed to parse enrichments.json\n");
}

echo "✅ Loaded " . count($enrichments) . " enrichment records\n\n";

// Load location index if available
$locations = [];
if (file_exists(LOCATIONS_FILE)) {
    $locations = json_decode(file_get_contents(LOCATIONS_FILE), true);
    echo "✅ Loaded location index with " . count($locations) . " locations\n\n";
}

// Load template
if (!file_exists(TEMPLATE_FILE)) {
    die("❌ Error: Template file not found at " . TEMPLATE_FILE . "\n");
}

$templateContent = file_get_contents(TEMPLATE_FILE);
echo "✅ Loaded template from " . TEMPLATE_FILE . "\n";
echo "📊 Template size: " . round(strlen($templateContent) / 1024, 1) . " KB\n\n";

// Case study mapping by region/industry
$caseStudies = [
    'local-services' => [
        'name' => 'Apex Plumbing Solutions',
        'industry' => 'Plumbing & HVAC',
        'before_ranking' => '#45',
        'after_ranking' => '#3',
        'before_traffic' => '120 visits/month',
        'after_traffic' => '2,400 visits/month',
        'traffic_growth' => '+2000%',
        'before_leads' => '2-3/month',
        'after_leads' => '35-40/month',
        'lead_growth' => '+1200%',
        'revenue_6_months' => '$127,500',
        'roi' => '1,456%'
    ],
    'real-estate' => [
        'name' => 'Westmount Real Estate Group',
        'industry' => 'Real Estate / Brokerage',
        'before_ranking' => '#12',
        'after_ranking' => '#4',
        'before_traffic' => '150 visits/month',
        'after_traffic' => '3,200 visits/month',
        'traffic_growth' => '+2,033%',
        'before_leads' => '4-5/month',
        'after_leads' => '45-50/month',
        'lead_growth' => '+1,000%',
        'revenue_4_months' => '$220,000',
        'roi' => '5,280%'
    ],
    'healthcare' => [
        'name' => 'Parkside Dental Excellence',
        'industry' => 'Dental Practice',
        'before_ranking' => '#18',
        'after_ranking' => '#2',
        'before_traffic' => '80 visits/month',
        'after_traffic' => '1,800 visits/month',
        'traffic_growth' => '+2,150%',
        'before_leads' => '5-8/month',
        'after_leads' => '25-30/month',
        'lead_growth' => '+375%',
        'new_patients' => '110',
        'revenue_5_months' => '$145,500',
        'roi' => '1,410%'
    ],
    'ecommerce' => [
        'name' => 'Prairie Craft Supply Co.',
        'industry' => 'E-Commerce / Retail',
        'before_ranking' => '#35',
        'after_ranking' => '#2',
        'before_traffic' => '200 visits/month',
        'after_traffic' => '4,100 visits/month',
        'traffic_growth' => '+1,950%',
        'before_revenue' => '$255-425/month',
        'after_revenue' => '$5,890-7,125/month',
        'revenue_growth' => '+1,550-1,700%',
        'revenue_6_months' => '$37,760',
        'roi' => '524%'
    ],
    'b2b-services' => [
        'name' => 'Beacon Accounting & Advisory',
        'industry' => 'Accounting / CPA',
        'before_ranking' => 'Page 5+',
        'after_ranking' => '#6',
        'before_traffic' => '60 visits/month',
        'after_traffic' => '2,200 visits/month',
        'traffic_growth' => '+3,567%',
        'before_leads' => '1-2/month',
        'after_leads' => '8-12/month',
        'lead_growth' => '+600%',
        'revenue_7_months' => '$199,500',
        'roi' => '2,895%'
    ]
];

// Master location data with statistics
$locationData = [
    'Edmonton' => [
        'province' => 'Alberta',
        'country' => 'Canada',
        'population' => '1.24M',
        'population_metro' => '1.59M',
        'growth' => '3.0%',
        'businesses' => '29,894',
        'region' => 'West Canada',
        'keywords' => 'SEO in Edmonton, digital marketing Edmonton, SEO services Edmonton',
        'neighborhoods' => 'Downtown Edmonton, West Edmonton, South Edmonton, North Edmonton',
        'industries' => 'Healthcare, Oil & Gas, Technology, Professional Services, Trades'
    ],
    'Calgary' => [
        'province' => 'Alberta',
        'country' => 'Canada',
        'population' => '1.34M',
        'population_metro' => '1.62M',
        'growth' => '2.1%',
        'businesses' => '31,500',
        'region' => 'West Canada',
        'keywords' => 'SEO in Calgary, digital marketing Calgary, SEO services Calgary',
        'neighborhoods' => 'Downtown Calgary, Southwest Calgary, Northeast Calgary, Northwest Calgary',
        'industries' => 'Energy, Technology, Healthcare, Professional Services'
    ],
    'Vancouver' => [
        'province' => 'British Columbia',
        'country' => 'Canada',
        'population' => '0.68M',
        'population_metro' => '2.68M',
        'growth' => '1.8%',
        'businesses' => '28,400',
        'region' => 'West Coast',
        'keywords' => 'SEO in Vancouver, digital marketing Vancouver, SEO services Vancouver',
        'neighborhoods' => 'Downtown Vancouver, West Vancouver, East Vancouver, North Vancouver',
        'industries' => 'Tech, Film & Media, Healthcare, International Trade'
    ],
    'Toronto' => [
        'province' => 'Ontario',
        'country' => 'Canada',
        'population' => '2.93M',
        'population_metro' => '6.41M',
        'growth' => '0.8%',
        'businesses' => '45,200',
        'region' => 'Central Canada',
        'keywords' => 'SEO in Toronto, digital marketing Toronto, SEO services Toronto',
        'neighborhoods' => 'Downtown Toronto, North Toronto, East Toronto, West Toronto',
        'industries' => 'Finance, Technology, Healthcare, Professional Services'
    ],
    'Montreal' => [
        'province' => 'Quebec',
        'country' => 'Canada',
        'population' => '1.73M',
        'population_metro' => '4.27M',
        'growth' => '0.5%',
        'businesses' => '38,900',
        'region' => 'Eastern Canada',
        'keywords' => 'SEO à Montréal, marketing numérique Montréal, services SEO Montréal',
        'neighborhoods' => 'Downtown Montreal, West Montreal, East Montreal, North Montreal',
        'industries' => 'Aerospace, Pharmaceuticals, Technology, Healthcare'
    ]
];

// Get list of cities to process
if ($singleCity) {
    $citiesToProcess = [$singleCity];
} else {
    // For full run, extract all unique locations from enrichments keys
    // Keys format: "service-in-location" e.g., "seo-in-edmonton"
    $citiesToProcess = [];
    if (!empty($enrichments)) {
        foreach (array_keys($enrichments) as $key) {
            // Extract location from key (format: service-in-location)
            if (strpos($key, '-in-') !== false) {
                $parts = explode('-in-', $key);
                if (count($parts) >= 2) {
                    $location = ucwords(str_replace('-', ' ', end($parts)));
                    if (!in_array($location, $citiesToProcess)) {
                        $citiesToProcess[] = $location;
                    }
                }
            }
        }
    }
    // Fallback: add known cities if enrichments empty
    if (empty($citiesToProcess)) {
        $citiesToProcess = array_keys($locationData);
    }
}

echo "📍 Processing " . count($citiesToProcess) . " location(s)...\n";
echo "─────────────────────────────────────────────────────────\n\n";

$successCount = 0;
$errorCount = 0;
$startTime = microtime(true);

foreach ($citiesToProcess as $city) {
    $citySlug = strtolower(str_replace(' ', '-', $city));

    // Get location data
    $locData = $locationData[$city] ?? [
        'province' => 'Unknown',
        'country' => 'Canada',
        'population' => 'Unknown',
        'growth' => 'Unknown',
        'businesses' => 'Unknown'
    ];

    // Get enrichment data for this city
    $enrichment = null;
    foreach ($enrichments as $enr) {
        if (isset($enr['location']) && strtolower($enr['location']) === strtolower($city)) {
            $enrichment = $enr;
            break;
        }
    }

    // Build variables map
    $variables = [
        '{CITY}' => $city,
        '{CITY_SLUG}' => $citySlug,
        '{PROVINCE}' => $locData['province'] ?? 'Unknown',
        '{COUNTRY}' => $locData['country'] ?? 'Canada',
        '{POPULATION_CITY}' => $locData['population'] ?? 'Unknown',
        '{POPULATION_METRO}' => $locData['population_metro'] ?? $locData['population'] ?? 'Unknown',
        '{ANNUAL_GROWTH}' => $locData['growth'] ?? 'Unknown',
        '{TOTAL_BUSINESSES}' => $locData['businesses'] ?? 'Unknown',
        '{REGION}' => $locData['region'] ?? 'Canada',
        '{NEIGHBORHOODS}' => $locData['neighborhoods'] ?? 'Various neighborhoods',
        '{LOCAL_KEYWORDS}' => $locData['keywords'] ?? 'SEO in ' . $city,
        '{TOP_INDUSTRIES}' => $locData['industries'] ?? 'Various industries',

        // Meta tags
        '{META_TITLE}' => "Best SEO in $city | TML Agency",
        '{META_DESCRIPTION}' => "Specialized SEO services for $city businesses. Rank higher on Google, get more customers. Free consultation. 200+ clients, proven results.",
        '{H1_TAG}' => "Best SEO in $city | Get More Customers From Google",
        '{CANONICAL_URL}' => "https://townmedialabs.ca/services/seo-in-$citySlug/",

        // Author
        '{AUTHOR_NAME}' => 'Raman Makkar',
        '{AUTHOR_ROLE}' => 'Founder & Chief SEO Strategist',

        // Case study (select based on city)
        '{CASE_STUDY_1_NAME}' => $caseStudies['local-services']['name'],
        '{CASE_STUDY_2_NAME}' => $caseStudies['real-estate']['name'],
        '{CASE_STUDY_3_NAME}' => $caseStudies['healthcare']['name'],
        '{CASE_STUDY_4_NAME}' => $caseStudies['ecommerce']['name'],
        '{CASE_STUDY_5_NAME}' => $caseStudies['b2b-services']['name'],
    ];

    // Build output filename (matching URL structure: seo-in-{city}.php)
    $outputFile = VIEWS_DIR . "/seo-in-$citySlug.php";

    // Check if file exists and should regenerate
    if (file_exists($outputFile) && !$regenerateAll && !$verbose) {
        if ($verbose) echo "⏭️  Skipping $city (file exists, use --regenerate-all to force)\n";
        continue;
    }

    // Perform substitution
    $pageContent = strtr($templateContent, $variables);

    // Add location-specific enrichment if available
    if ($enrichment && !empty($enrichment['description'])) {
        // Insert enrichment data into hero section
        $pageContent = str_replace(
            'Your customers are searching',
            $enrichment['description'] . "\n\nYour customers are searching",
            $pageContent
        );
    }

    if (!$dryRun) {
        // Ensure directory exists
        if (!is_dir(VIEWS_DIR)) {
            mkdir(VIEWS_DIR, 0755, true);
        }

        // Write file
        if (file_put_contents($outputFile, $pageContent)) {
            $successCount++;
            if ($verbose) {
                echo "✅ Generated: $city\n";
                echo "   📄 File: $outputFile\n";
                echo "   📊 Size: " . round(strlen($pageContent) / 1024, 1) . " KB\n";
            }
        } else {
            $errorCount++;
            echo "❌ Error writing: $outputFile\n";
        }
    } else {
        $successCount++;
        if ($verbose) {
            echo "📝 DRY RUN: Would generate $city\n";
        }
    }
}

// Summary
$endTime = microtime(true);
$duration = $endTime - $startTime;
$pagesPerSecond = $successCount > 0 ? round($successCount / ($duration > 0 ? $duration : 1), 0) : 0;

echo "\n─────────────────────────────────────────────────────────\n";
echo "✅ GENERATION COMPLETE\n";
echo "─────────────────────────────────────────────────────────\n";
echo "✨ Successfully generated: $successCount pages\n";
echo "❌ Errors: $errorCount\n";
echo "⏱️  Duration: " . round($duration, 1) . " seconds\n";
echo "🚀 Speed: $pagesPerSecond pages/second\n\n";

// Next steps
echo "📋 NEXT STEPS:\n";
echo "──────────────\n";
echo "1. Verify generated files in: " . VIEWS_DIR . "\n";
echo "2. Test a few location pages in browser\n";
echo "3. Validate schema markup with Google Rich Results Test\n";
echo "4. Check Core Web Vitals\n";
echo "5. Update sitemap.xml with all new URLs\n";
echo "6. Submit sitemap to Google Search Console\n";
echo "7. Monitor indexing progress\n";

exit($errorCount > 0 ? 1 : 0);
?>
