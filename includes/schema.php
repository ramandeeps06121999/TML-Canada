<?php

declare(strict_types=1);

const TML_SCHEMA_PROVIDER = [
    '@type' => 'Organization',
    'name' => 'TML Agency',
    'url' => 'https://townmedialabs.ca',
    'telephone' => '+14036048692',
    'email' => 'hello@townmedialabs.ca',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '11930 104 St NW',
        'addressLocality' => 'Edmonton',
        'addressRegion' => 'Alberta',
        'addressCountry' => 'CA',
        'postalCode' => 'T5G 2K1',
    ],
    'founder' => [
        '@type' => 'Person',
        'name' => 'Raman Makkar',
        'description' => 'Chief SEO Strategist & Founder',
    ],
    'sameAs' => [
        'https://www.instagram.com/tmlagency/',
        'https://www.facebook.com/tmlagency/',
        'https://www.linkedin.com/company/tmlagency/',
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
        $areaType = in_array($p['areaServed'], ['Canada', 'United States', 'USA', 'US'], true) ? 'Country' : 'City';
        $out['areaServed'] = ['@type' => $areaType, 'name' => $p['areaServed']];
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
 * @param array{name: string, description: string, url: string, city: string, state: string, services: string[], lat?: float, lng?: float, postalCode?: string} $p
 */
function tml_schema_local_business(array $p): array
{
    $lat = $p['lat'] ?? 53.5461;
    $lng = $p['lng'] ?? -113.4937;
    $postalCode = $p['postalCode'] ?? 'T5G 2K1';

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
            'postalCode' => $postalCode,
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => (string) $lat,
            'longitude' => (string) $lng,
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

/**
 * Generate comprehensive Organization schema with E-E-A-T signals
 */
function tml_schema_organization(): array
{
    return array_merge(TML_SCHEMA_PROVIDER, [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'description' => 'Full-service digital marketing and branding agency in Edmonton serving 1,000+ brands across Canada and North America. Expertise in SEO, web design, paid ads, content marketing, and brand strategy.',
        'knowsAbout' => [
            'Digital Marketing',
            'SEO',
            'Branding',
            'Web Design',
            'Content Marketing',
            'Paid Advertising',
            'Social Media Marketing',
            'Marketing Automation',
        ],
        'makesOffer' => [
            '@type' => 'AggregateOffer',
            'priceCurrency' => 'CAD',
            'availability' => 'http://schema.org/InStock',
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.9',
            'bestRating' => '5',
            'worstRating' => '1',
            'ratingCount' => '500',
            'reviewCount' => '127',
        ],
    ]);
}

/**
 * Generate Review schema from testimonials array.
 * @param array<int, array{quote: string, name: string, company: string}> $testimonials
 */
function tml_schema_reviews(array $testimonials): array
{
    $reviews = [];
    foreach ($testimonials as $t) {
        $reviews[] = [
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => $t['name'],
            ],
            'reviewBody' => $t['quote'],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => '5',
                'bestRating' => '5',
            ],
            'publisher' => ['@type' => 'Organization', 'name' => $t['company']],
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'TML Agency',
        'url' => 'https://townmedialabs.ca',
        'review' => $reviews,
    ];
}

function tml_json_ld_script(array $data): string
{
    $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);
    return '<script type="application/ld+json">' . ($json !== false ? $json : '{}') . '</script>';
}
