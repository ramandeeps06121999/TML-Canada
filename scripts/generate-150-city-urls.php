<?php
/**
 * Generate 150 “city pages” URLs like:
 *   /services/seo-in-edmonton
 *   /services/website-development-in-edmonton
 *
 * Default: 2 services (seo + website-development) × 75 cities = 150 URLs.
 *
 * Usage:
 *   php scripts/generate-150-city-urls.php > scripts/urls-150.txt
 *   php scripts/generate-150-city-urls.php --domain=https://townmedialabs.ca > scripts/urls-150.txt
 *   php scripts/generate-150-city-urls.php --services=seo,website-development --cities=75 > scripts/urls-150.txt
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/bootstrap.php';

$domain = TML_SITE_URL;
$services = ['seo', 'website-development'];
$cityCount = 75;

foreach ($argv ?? [] as $arg) {
    if (str_starts_with($arg, '--domain=')) {
        $domain = rtrim((string) substr($arg, 9), '/');
    }
    if (str_starts_with($arg, '--services=')) {
        $raw = (string) substr($arg, 11);
        $parts = array_values(array_filter(array_map('trim', explode(',', $raw))));
        if (count($parts) > 0) $services = $parts;
    }
    if (str_starts_with($arg, '--cities=')) {
        $cityCount = max(1, (int) substr($arg, 9));
    }
}

$locations = tml_locations();
$keys = array_keys($locations);

// Put edmonton first if present (so it always lands in the first 150).
usort($keys, static function ($a, $b) {
    if ($a === 'edmonton') return -1;
    if ($b === 'edmonton') return 1;
    return strcmp((string) $a, (string) $b);
});

$keys = array_slice($keys, 0, $cityCount);

$urls = [];
foreach ($keys as $locSlug) {
    foreach ($services as $svc) {
        $urls[] = $domain . '/services/' . tml_location_service_slug($svc, (string) $locSlug);
    }
}

// If the requested services × available cities produce <150,
// add more service variants (still city pages) to reach 150.
$fillServices = ['branding', 'google-ads', 'social-media', 'lead-generation', 'graphic-design'];
$unique = array_values(array_unique($urls));
if (count($unique) < 150) {
    foreach ($keys as $locSlug) {
        foreach ($fillServices as $svc) {
            $unique[] = $domain . '/services/' . tml_location_service_slug($svc, (string) $locSlug);
            $unique = array_values(array_unique($unique));
            if (count($unique) >= 150) {
                break 2;
            }
        }
    }
}

// Ensure exactly 150.
$urls = array_slice($unique, 0, 150);

foreach ($urls as $u) {
    echo $u . "\n";
}

