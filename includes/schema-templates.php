<?php
/**
 * Complete JSON-LD Schema Template System for TML Agency
 *
 * This file contains reusable schema generation functions for:
 * - Organization
 * - LocalBusiness
 * - Service
 * - BreadcrumbList
 * - FAQPage
 * - Article
 * - AggregateRating
 *
 * Usage: Include this file and call schema generation functions
 * Version: 1.0
 * Last Updated: March 31, 2026
 */

// Global company data
const COMPANY_DATA = [
    'name' => 'TML Agency',
    'url' => 'https://townmedialabs.ca',
    'phone' => '+14036048692',
    'email' => 'hello@townmedialabs.ca',
    'founder' => 'Raman Makkar',
    'foundingYear' => '2010',
    'office_street' => '11930 104 St NW',
    'office_city' => 'Edmonton',
    'office_region' => 'Alberta',
    'office_postal' => 'T5G 2K1',
    'office_country' => 'CA',
    'rating' => '4.9',
    'reviewCount' => '127',
];

const SOCIAL_PROFILES = [
    'https://www.facebook.com/townmedialabs',
    'https://www.twitter.com/townmedialabs',
    'https://www.instagram.com/townmedialabs',
    'https://www.linkedin.com/company/town-media-labs',
    'https://www.youtube.com/townmedialabs',
];

const SERVICES_OFFERED = [
    'SEO' => 'Search Engine Optimization (SEO)',
    'SEM' => 'Search Engine Marketing (SEM)',
    'google-ads' => 'Google Ads',
    'social-media' => 'Social Media Marketing',
    'content-marketing' => 'Content Marketing',
    'email-marketing' => 'Email Marketing',
    'web-design' => 'Web Design',
    'web-development' => 'Web Development',
    'branding' => 'Branding',
    'graphic-design' => 'Graphic Design',
    'packaging' => 'Packaging Design',
    'lead-generation' => 'Lead Generation',
    'cro' => 'Conversion Rate Optimization',
];

/**
 * Generate Organization Schema (Global)
 * Use on every page
 *
 * @return array Organization schema
 */
function getOrganizationSchema() {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => COMPANY_DATA['name'],
        'url' => COMPANY_DATA['url'],
        'logo' => COMPANY_DATA['url'] . '/images/tml-logo-white.png',
        'description' => 'Full-service digital marketing and branding agency serving 500+ businesses across North America with expertise in SEO, web design, paid media, branding, and content marketing.',
        'founder' => [
            '@type' => 'Person',
            'name' => COMPANY_DATA['founder'],
            'title' => 'Founder & Chief SEO Strategist'
        ],
        'foundingDate' => COMPANY_DATA['foundingYear'],
        'foundingLocation' => [
            '@type' => 'Place',
            'name' => COMPANY_DATA['office_city'] . ', ' . COMPANY_DATA['office_region']
        ],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => COMPANY_DATA['office_street'],
            'addressLocality' => COMPANY_DATA['office_city'],
            'addressRegion' => COMPANY_DATA['office_region'],
            'postalCode' => COMPANY_DATA['office_postal'],
            'addressCountry' => COMPANY_DATA['office_country']
        ],
        'telephone' => COMPANY_DATA['phone'],
        'email' => COMPANY_DATA['email'],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'Customer Service',
            'telephone' => COMPANY_DATA['phone'],
            'email' => COMPANY_DATA['email'],
            'availableLanguage' => ['en', 'pa']
        ],
        'sameAs' => SOCIAL_PROFILES,
        'knowsAbout' => array_values(SERVICES_OFFERED),
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => COMPANY_DATA['rating'],
            'bestRating' => '5',
            'worstRating' => '1',
            'reviewCount' => COMPANY_DATA['reviewCount']
        ],
        'slogan' => 'Digital Marketing Agency Serving 500+ Brands Across North America',
    ];
}

/**
 * Generate LocalBusiness Schema (Location-Specific)
 * Use on service-location pages (e.g., seo-in-edmonton)
 *
 * @param string $service Service slug (e.g., 'seo')
 * @param string $city City name (e.g., 'Edmonton')
 * @param array $locationData Location metadata (lat, lng, region, etc.)
 * @return array LocalBusiness schema
 */
function getLocalBusinessSchema($service, $city, $locationData = []) {
    $serviceSlug = sanitizeSlug($service);
    $citySlug = sanitizeSlug($city);

    // Default location data if not provided
    $defaults = [
        'lat' => 53.5461,
        'lng' => -113.4937,
        'region' => 'Alberta',
        'regionCode' => 'AB',
        'country' => 'Canada',
        'countryCode' => 'CA',
        'areas' => [$city]
    ];

    $locationData = array_merge($defaults, $locationData);

    $areaServed = [];
    foreach ($locationData['areas'] as $area) {
        $areaServed[] = [
            '@type' => 'City',
            'name' => $area
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => ['LocalBusiness', 'ProfessionalService'],
        'name' => 'TML Agency - ' . $city,
        'image' => COMPANY_DATA['url'] . '/images/tml-office.jpg',
        'description' => 'Expert ' . strtolower($service) . ' services for ' . $city . ' businesses. TML Agency delivers proven digital marketing results.',
        'url' => COMPANY_DATA['url'] . '/services/' . $serviceSlug . '-in-' . $citySlug,
        'telephone' => COMPANY_DATA['phone'],
        'email' => COMPANY_DATA['email'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => COMPANY_DATA['office_street'],
            'addressLocality' => COMPANY_DATA['office_city'],
            'addressRegion' => COMPANY_DATA['office_region'],
            'postalCode' => COMPANY_DATA['office_postal'],
            'addressCountry' => COMPANY_DATA['office_country']
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => (float)$locationData['lat'],
            'longitude' => (float)$locationData['lng']
        ],
        'areaServed' => $areaServed,
        'serviceArea' => [
            '@type' => 'GeoShape',
            'box' => ($locationData['lat'] - 0.1) . ' ' . ($locationData['lng'] - 0.3) . ' ' . ($locationData['lat'] + 0.1) . ' ' . ($locationData['lng'] + 0.3)
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens' => '09:00',
            'closes' => '18:00'
        ],
        'priceRange' => '$$',
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => COMPANY_DATA['rating'],
            'reviewCount' => COMPANY_DATA['reviewCount'],
            'bestRating' => '5',
            'worstRating' => '1'
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'Customer Service',
            'telephone' => COMPANY_DATA['phone'],
            'email' => COMPANY_DATA['email'],
            'areaServed' => $city . ', ' . $locationData['region']
        ],
        'sameAs' => SOCIAL_PROFILES
    ];
}

/**
 * Generate Service Schema
 * Use on service-location pages
 *
 * @param string $service Service name (e.g., 'SEO')
 * @param string $city City name (e.g., 'Edmonton')
 * @param array $pricingTiers Service pricing tiers
 * @param array $locationData Location information
 * @return array Service schema
 */
function getServiceSchema($service, $city, $pricingTiers = [], $locationData = []) {
    $serviceSlug = sanitizeSlug($service);
    $citySlug = sanitizeSlug($city);

    // Default location data
    $defaults = [
        'region' => 'Alberta',
        'country' => 'Canada',
        'countryCode' => 'CA'
    ];
    $locationData = array_merge($defaults, $locationData);

    // Build offer catalog from pricing tiers
    $offerCatalog = [];
    if (!empty($pricingTiers)) {
        foreach ($pricingTiers as $tier) {
            $offerCatalog[] = [
                '@type' => 'Offer',
                'name' => $tier['name'] ?? 'Package',
                'description' => $tier['description'] ?? $service . ' service package',
                'price' => (string)($tier['price'] ?? '0'),
                'priceCurrency' => 'CAD',
                'priceValidUntil' => date('Y-m-d', strtotime('+1 year')),
                'availability' => 'https://schema.org/InStock',
                'eligibleRegion' => [
                    '@type' => 'Country',
                    'name' => $locationData['countryCode']
                ]
            ];
        }
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service . ' in ' . $city,
        'description' => 'Expert ' . strtolower($service) . ' services for ' . $city . ' businesses. TML Agency delivers proven results including higher rankings, increased visibility, and more qualified leads.',
        'url' => COMPANY_DATA['url'] . '/services/' . $serviceSlug . '-in-' . $citySlug,
        'image' => COMPANY_DATA['url'] . '/images/' . $serviceSlug . '-hero.jpg',
        'serviceType' => $service,
        'provider' => [
            '@type' => 'Organization',
            'name' => COMPANY_DATA['name'],
            'url' => COMPANY_DATA['url'],
            'telephone' => COMPANY_DATA['phone'],
            'email' => COMPANY_DATA['email'],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => COMPANY_DATA['office_street'],
                'addressLocality' => COMPANY_DATA['office_city'],
                'addressRegion' => COMPANY_DATA['office_region'],
                'postalCode' => COMPANY_DATA['office_postal'],
                'addressCountry' => COMPANY_DATA['office_country']
            ]
        ],
        'areaServed' => [
            [
                '@type' => 'City',
                'name' => $city,
                'containedInPlace' => [
                    '@type' => 'State',
                    'name' => $locationData['region']
                ]
            ],
            [
                '@type' => 'AdministrativeArea',
                'name' => $locationData['region'],
                'containedInPlace' => [
                    '@type' => 'Country',
                    'name' => $locationData['country']
                ]
            ]
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => $service . ' Packages',
            'itemListElement' => $offerCatalog
        ],
        'availableChannel' => [
            '@type' => 'ServiceChannel',
            'serviceUrl' => COMPANY_DATA['url'] . '/services/' . $serviceSlug . '-in-' . $citySlug,
            'availableLanguage' => ['en', 'pa']
        ],
        'potentialAction' => [
            '@type' => 'ReserveAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => COMPANY_DATA['url'] . '/contact',
                'actionPlatform' => [
                    'http://schema.org/DesktopWebPlatform',
                    'http://schema.org/MobileWebPlatform'
                ]
            ],
            'name' => 'Book a Free ' . $service . ' Consultation'
        ]
    ];
}

/**
 * Generate BreadcrumbList Schema
 * Use on every page
 *
 * @param array $breadcrumbs Array of breadcrumb items [['name' => 'Home', 'url' => '/']]
 * @return array BreadcrumbList schema
 */
function getBreadcrumbSchema($breadcrumbs = []) {
    // Default breadcrumbs if not provided
    if (empty($breadcrumbs)) {
        $breadcrumbs = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Services', 'url' => '/services']
        ];
    }

    $itemListElement = [];
    foreach ($breadcrumbs as $index => $crumb) {
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['name'],
            'item' => COMPANY_DATA['url'] . (strpos($crumb['url'], '/') === 0 ? $crumb['url'] : '/' . $crumb['url'])
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ];
}

/**
 * Generate FAQPage Schema
 * Use on location service pages
 *
 * @param string $service Service name
 * @param string $city City name
 * @param array $faqItems FAQ items [['question' => '...', 'answer' => '...']]
 * @return array FAQPage schema
 */
function getFAQSchema($service, $city, $faqItems = []) {
    // Default FAQ if not provided
    if (empty($faqItems)) {
        $faqItems = [
            [
                'question' => 'How much does ' . strtolower($service) . ' cost in ' . $city . '?',
                'answer' => $service . ' pricing in ' . $city . ' varies based on your competitive landscape and goals. Contact us for a free audit and custom quote.'
            ],
            [
                'question' => 'Why choose TML Agency for ' . strtolower($service) . ' in ' . $city . '?',
                'answer' => 'TML Agency has 15+ years of expertise and has delivered results for 500+ businesses. We offer transparent reporting and results-first methodology.'
            ],
            [
                'question' => 'How quickly will I see results from ' . strtolower($service) . ' in ' . $city . '?',
                'answer' => 'Timelines depend on your specific service and competitive landscape. Paid strategies show results in days. Organic strategies typically show results in 3-6 months.'
            ]
        ];
    }

    $mainEntity = [];
    foreach ($faqItems as $item) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $item['answer']
            ]
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $mainEntity
    ];
}

/**
 * Generate Article Schema
 * Use on blog posts and detailed service articles
 *
 * @param array $articleData Article information
 * @return array Article schema
 */
function getArticleSchema($articleData = []) {
    $defaults = [
        'headline' => 'Article',
        'description' => 'Read our latest article on digital marketing and SEO.',
        'url' => COMPANY_DATA['url'] . '/blog/article',
        'image' => COMPANY_DATA['url'] . '/images/og-image.png',
        'datePublished' => date('Y-m-d'),
        'dateModified' => date('Y-m-d'),
        'author' => 'Raman Makkar',
        'wordCount' => 1500,
        'articleSection' => 'Digital Marketing'
    ];

    $articleData = array_merge($defaults, $articleData);

    return [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $articleData['headline'],
        'description' => $articleData['description'],
        'image' => $articleData['image'],
        'datePublished' => $articleData['datePublished'],
        'dateModified' => $articleData['dateModified'],
        'author' => [
            '@type' => 'Person',
            'name' => $articleData['author'],
            'url' => COMPANY_DATA['url'] . '/about'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => COMPANY_DATA['name'],
            'logo' => [
                '@type' => 'ImageObject',
                'url' => COMPANY_DATA['url'] . '/images/tml-logo.png'
            ],
            'url' => COMPANY_DATA['url']
        ],
        'mainEntity' => [
            '@type' => 'WebPage',
            'url' => $articleData['url']
        ],
        'wordCount' => $articleData['wordCount'],
        'articleSection' => $articleData['articleSection']
    ];
}

/**
 * Generate Website Schema (Site-Level)
 * Use on homepage or global header
 *
 * @return array Website schema
 */
function getWebsiteSchema() {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => COMPANY_DATA['name'],
        'url' => COMPANY_DATA['url'],
        'description' => 'Full-service digital marketing and branding agency serving 500+ businesses across North America.',
        'image' => COMPANY_DATA['url'] . '/images/tml-logo.png',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => COMPANY_DATA['url'] . '/search?q={search_term_string}'
            ],
            'query-input' => 'required name=search_term_string'
        ],
        'author' => [
            '@type' => 'Organization',
            'name' => COMPANY_DATA['name']
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => COMPANY_DATA['name']
        ]
    ];
}

/**
 * Utility function to sanitize slugs
 *
 * @param string $text
 * @return string Sanitized slug
 */
function sanitizeSlug($text) {
    // Convert to lowercase
    $text = strtolower($text);

    // Replace spaces with hyphens
    $text = str_replace(' ', '-', $text);

    // Remove special characters
    $text = preg_replace('/[^a-z0-9\-]/', '', $text);

    // Remove multiple consecutive hyphens
    $text = preg_replace('/-+/', '-', $text);

    // Remove leading/trailing hyphens
    $text = trim($text, '-');

    return $text;
}

/**
 * Output schema as JSON-LD script tag
 *
 * @param array $schema Schema array
 * @param string $id Optional ID for the script tag
 * @return string HTML script tag
 */
function outputSchema($schema, $id = '') {
    $idAttr = !empty($id) ? ' id="' . htmlspecialchars($id) . '"' : '';
    return '<script type="application/ld+json"' . $idAttr . '>' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Output all schemas for a location-service page
 *
 * @param string $service Service name/slug
 * @param string $city City name
 * @param array $locationData Location metadata
 * @param array $pricingTiers Pricing information
 * @param array $breadcrumbs Breadcrumb trail
 * @param array $faqItems FAQ items
 * @return string All schema script tags concatenated
 */
function outputAllSchemas($service, $city, $locationData = [], $pricingTiers = [], $breadcrumbs = [], $faqItems = []) {
    $schemas = [];

    // Organization (global)
    $schemas[] = outputSchema(getOrganizationSchema(), 'org-schema');

    // LocalBusiness
    $schemas[] = outputSchema(getLocalBusinessSchema($service, $city, $locationData), 'local-business-schema');

    // Service
    $schemas[] = outputSchema(getServiceSchema($service, $city, $pricingTiers, $locationData), 'service-schema');

    // Breadcrumb
    $schemas[] = outputSchema(getBreadcrumbSchema($breadcrumbs), 'breadcrumb-schema');

    // FAQ
    $schemas[] = outputSchema(getFAQSchema($service, $city, $faqItems), 'faq-schema');

    return implode("\n  ", $schemas);
}

// Export functions for testing/API use
if (defined('EXPORT_SCHEMAS') && EXPORT_SCHEMAS) {
    return [
        'getOrganizationSchema' => 'getOrganizationSchema',
        'getLocalBusinessSchema' => 'getLocalBusinessSchema',
        'getServiceSchema' => 'getServiceSchema',
        'getBreadcrumbSchema' => 'getBreadcrumbSchema',
        'getFAQSchema' => 'getFAQSchema',
        'getArticleSchema' => 'getArticleSchema',
        'getWebsiteSchema' => 'getWebsiteSchema',
        'outputSchema' => 'outputSchema',
        'outputAllSchemas' => 'outputAllSchemas',
        'sanitizeSlug' => 'sanitizeSlug'
    ];
}
?>
