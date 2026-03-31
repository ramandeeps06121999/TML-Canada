<?php

declare(strict_types=1);

const TML_SCHEMA_PROVIDER = [
    '@type' => 'Organization',
    'name' => 'TML Agency',
    'url' => 'https://townmedialabs.ca',
    'telephone' => '+14036048692',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '11930 104 St NW',
        'addressLocality' => 'Edmonton',
        'addressRegion' => 'Alberta',
        'addressCountry' => 'CA',
        'postalCode' => 'T5G 2K1',
    ],
];

/**
 * @param array<int, array{q: string, a: string}|array{question: string, answer: string}> $items
 */
function tml_schema_faq(array $items): array
{
    $main = [];
    foreach ($items as $faq) {
        $q = $faq['q'] ?? $faq['question'] ?? '';
        $a = $faq['a'] ?? $faq['answer'] ?? '';
        $main[] = [
            '@type' => 'Question',
            'name' => $q,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $a,
            ],
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $main,
    ];
}

/**
 * @param array<int, array{name: string, url: string}> $items
 */
function tml_schema_breadcrumb(array $items): array
{
    $els = [];
    foreach ($items as $i => $item) {
        $els[] = [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $item['name'],
            'item' => $item['url'],
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $els,
    ];
}

/**
 * @param array{name: string, description: string, url: string, areaServed?: string, category?: string, pricingTiers?: array<int, array{name: string, price: string, currency?: string, description?: string}>, dateModified?: string} $p
 */
function tml_schema_service(array $p): array
{
    $out = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $p['name'],
        'description' => $p['description'],
        'url' => $p['url'],
        'provider' => TML_SCHEMA_PROVIDER,
    ];
    if (!empty($p['areaServed'])) {
        $out['areaServed'] = ['@type' => 'City', 'name' => $p['areaServed']];
    }
    if (!empty($p['category'])) {
        $out['category'] = $p['category'];
    }
    if (!empty($p['dateModified'])) {
        $out['dateModified'] = $p['dateModified'];
    }

    // Add pricing tiers if provided
    if (!empty($p['pricingTiers']) && is_array($p['pricingTiers'])) {
        $offers = [];
        foreach ($p['pricingTiers'] as $tier) {
            $offer = [
                '@type' => 'Offer',
                'name' => $tier['name'],
                'price' => $tier['price'],
                'priceCurrency' => $tier['currency'] ?? 'CAD',
            ];
            if (!empty($tier['description'])) {
                $offer['description'] = $tier['description'];
            }
            $offers[] = $offer;
        }
        if (!empty($offers)) {
            $out['hasOfferCatalog'] = [
                '@type' => 'OfferCatalog',
                'name' => 'Service Packages',
                'itemListElement' => $offers,
            ];
        }
    }

    return $out;
}

/**
 * @param array{name: string, description: string, url: string, city: string, state: string, services: string[]} $p
 */
function tml_schema_local_business(array $p): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => $p['name'],
        'description' => $p['description'],
        'url' => $p['url'],
        'telephone' => '+14036048692',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => $p['city'],
            'addressRegion' => $p['state'],
            'addressCountry' => 'CA',
            'postalCode' => 'T5G 2K1',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => '53.5461',
            'longitude' => '-113.4937',
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'opens' => '09:00',
            'closes' => '18:00',
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Services',
            'itemListElement' => array_map(static function ($s) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => ['@type' => 'Service', 'name' => $s],
                ];
            }, $p['services']),
        ],
    ];
}

function tml_json_ld_script(array $data): string
{
    $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);
    return '<script type="application/ld+json">' . ($json !== false ? $json : '{}') . '</script>';
}
