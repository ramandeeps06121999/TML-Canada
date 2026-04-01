<?php

declare(strict_types=1);

function tml_e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/** @return array<string, mixed>|null */
function tml_json_load(string $relative): ?array
{
    static $cache = [];
    $path = TML_DATA . '/' . $relative;
    if (isset($cache[$path])) {
        return $cache[$path];
    }
    if (!is_readable($path)) {
        return null;
    }
    $raw = file_get_contents($path);
    if ($raw === false) {
        return null;
    }
    $data = json_decode($raw, true);
    if (!is_array($data)) {
        return null;
    }
    $cache[$path] = $data;
    return $data;
}

function tml_location_service_slug(string $serviceSlug, string $locationSlug): string
{
    $loc = str_replace('_', '-', $locationSlug);
    if ($serviceSlug === 'social-media') {
        return 'social-media-marketing-in-' . $loc;
    }
    return $serviceSlug . '-in-' . $loc;
}

/**
 * Parse e.g. seo-in-edmonton → service + location.
 *
 * @param array<string, mixed> $locations
 * @return array{serviceSlug: string, locationSlug: string, urlSlug: string}|null
 */
function tml_parse_location_service_slug(string $slug, array $locations): ?array
{
    $locList = array_values($locations);
    usort($locList, static function ($a, $b) {
        $la = strlen((string) ($a['slug'] ?? ''));
        $lb = strlen((string) ($b['slug'] ?? ''));
        return $lb <=> $la;
    });
    foreach ($locList as $loc) {
        $ls = str_replace('_', '-', (string) $loc['slug']);
        $suffix = '-in-' . $ls;
        if (strlen($slug) > strlen($suffix) && str_ends_with($slug, $suffix)) {
            $prefix = substr($slug, 0, -strlen($suffix));
            $serviceSlug = $prefix === 'social-media-marketing' ? 'social-media' : $prefix;
            return [
                'serviceSlug' => $serviceSlug,
                'locationSlug' => (string) $loc['slug'],
                'urlSlug' => $slug,
            ];
        }
    }
    return null;
}

function tml_convert_price_range(string $range, string $country): string
{
    if ($country === 'India') {
        return $range;
    }
    $currencyMap = [
        'Canada' => ['symbol' => '$', 'rate' => 0.02],
        'New Zealand' => ['symbol' => 'NZ$', 'rate' => 0.02],
        'United Kingdom' => ['symbol' => '£', 'rate' => 0.0095],
        'United States' => ['symbol' => '$', 'rate' => 0.012],
        'Australia' => ['symbol' => 'A$', 'rate' => 0.018],
        'UAE' => ['symbol' => 'AED', 'rate' => 0.044],
    ];
    $curr = $currencyMap[$country] ?? ['symbol' => '$', 'rate' => 0.012];
    return preg_replace_callback('/₹([\d,]+)/', static function ($m) use ($curr) {
        $val = (int) str_replace(',', '', $m[1]);
        $converted = (int) round($val * $curr['rate']);
        return $curr['symbol'] . number_format($converted);
    }, $range) ?? $range;
}

/**
 * @param array<string, mixed>|null $v2
 * @param array<string, mixed>|null $legacy
 * @return array{name: string, description: string}|null
 */
function tml_resolve_industry(?array $v2, ?array $legacy): ?array
{
    if ($v2 !== null) {
        return [
            'name' => (string) ($v2['name'] ?? ''),
            'description' => (string) ($v2['metaDescription'] ?? ''),
        ];
    }
    if ($legacy !== null) {
        return [
            'name' => (string) ($legacy['name'] ?? ''),
            'description' => (string) ($legacy['description'] ?? ''),
        ];
    }
    return null;
}
