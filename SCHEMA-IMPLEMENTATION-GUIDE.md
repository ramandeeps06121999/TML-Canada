# JSON-LD Schema Implementation Guide
## TML Agency - Step-by-Step Implementation for 1,488 Pages

---

## TABLE OF CONTENTS
1. [Quick Implementation](#quick-implementation)
2. [Integration with Existing Pages](#integration-with-existing-pages)
3. [Variable Substitution System](#variable-substitution-system)
4. [Testing & Validation](#testing--validation)
5. [Deployment Checklist](#deployment-checklist)
6. [Monitoring Dashboard](#monitoring-dashboard)

---

## QUICK IMPLEMENTATION

### Option 1: Add to Single Page (Edmonton SEO Example)

**File:** `/php-site/deploy/services/seo-in-edmonton/index.php`

Add this to your `<head>` section (after line 32 in your current file):

```html
<head>
  <!-- existing meta tags ... -->

  <!-- JSON-LD SCHEMA MARKUP -->
  <?php
  // Include schema template functions
  include_once $_SERVER['DOCUMENT_ROOT'] . '/../includes/schema-templates.php';

  // Data for this page
  $service = 'SEO';
  $city = 'Edmonton';

  $locationData = [
      'lat' => 53.5461,
      'lng' => -113.4937,
      'region' => 'Alberta',
      'regionCode' => 'AB',
      'country' => 'Canada',
      'countryCode' => 'CA',
      'areas' => ['Edmonton', 'St. Albert', 'Sherwood Park']
  ];

  $pricingTiers = [
      [
          'name' => 'SEO Foundation',
          'price' => '999',
          'description' => 'Technical SEO audit, keyword research, and on-page optimization for 10 target keywords'
      ],
      [
          'name' => 'SEO Growth Package',
          'price' => '2999',
          'description' => 'Comprehensive SEO strategy, content optimization, link building, and monthly reporting'
      ],
      [
          'name' => 'Enterprise SEO',
          'price' => '7999',
          'description' => 'Full-scale SEO program with content creation, technical optimization, and dedicated account management'
      ]
  ];

  $breadcrumbs = [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Services', 'url' => '/services'],
      ['name' => 'SEO', 'url' => '/services/seo'],
      ['name' => 'SEO in Edmonton', 'url' => '/services/seo-in-edmonton']
  ];

  $faqItems = [
      [
          'question' => 'How much does SEO cost in Edmonton?',
          'answer' => 'SEO costs in Edmonton vary based on your competitive landscape and goals. Our SEO Foundation package starts at $999/month for basic keyword optimization. The SEO Growth Package is $2,999/month for comprehensive strategy. Enterprise SEO is $7,999/month. We customize pricing based on your specific market.'
      ],
      [
          'question' => 'Why choose TML Agency for SEO in Edmonton?',
          'answer' => 'TML Agency brings 15+ years of SEO expertise combined with deep knowledge of the Edmonton market. We\'ve delivered results for 500+ businesses and have specific experience with Edmonton\'s key industries: oil & gas, tech startups, government, construction, and healthcare.'
      ],
      [
          'question' => 'How quickly will I see results from SEO in Edmonton?',
          'answer' => 'Timelines depend on your competitive landscape. For competitive Edmonton keywords, expect 4-6 months for meaningful results. Less competitive terms can rank within 2-3 months. We set realistic expectations during your initial consultation.'
      ],
      [
          'question' => 'What does TML\'s SEO process include?',
          'answer' => 'Our comprehensive SEO process includes: 1) Technical audit, 2) Competitive analysis, 3) Keyword research, 4) On-page optimization, 5) Content creation, 6) Link building, 7) Local SEO, and 8) Monthly reporting.'
      ]
  ];

  // Output all schemas
  echo outputAllSchemas($service, $city, $locationData, $pricingTiers, $breadcrumbs, $faqItems);
  ?>
</head>
```

### Option 2: Dynamic Generation for All Pages

Create a configuration file for each service-location combination:

**File:** `/php-site/deploy/data/page-schemas.json`

```json
{
  "services": {
    "seo": {
      "name": "SEO",
      "slug": "seo",
      "description": "Search Engine Optimization",
      "pricingTiers": [
        {
          "name": "SEO Foundation",
          "price": "999",
          "description": "Technical SEO audit, keyword research, and on-page optimization for 10 target keywords"
        },
        {
          "name": "SEO Growth Package",
          "price": "2999",
          "description": "Comprehensive SEO strategy, content optimization, link building, and monthly reporting"
        },
        {
          "name": "Enterprise SEO",
          "price": "7999",
          "description": "Full-scale SEO program with content creation, technical optimization, and dedicated account management"
        }
      ]
    },
    "branding": {
      "name": "Branding",
      "slug": "branding",
      "description": "Brand Strategy & Design",
      "pricingTiers": [
        {
          "name": "Logo & Visual Identity",
          "price": "2499",
          "description": "Professional logo design, colour palette, typography, and basic brand guidelines"
        },
        {
          "name": "Complete Brand System",
          "price": "5999",
          "description": "Full brand strategy, visual identity, comprehensive guidelines, and brand training"
        },
        {
          "name": "Enterprise Branding",
          "price": "12999",
          "description": "Strategic positioning, complete visual system, application templates, and ongoing brand support"
        }
      ]
    }
  },
  "locations": {
    "edmonton": {
      "name": "Edmonton",
      "slug": "edmonton",
      "lat": 53.5461,
      "lng": -113.4937,
      "region": "Alberta",
      "regionCode": "AB",
      "country": "Canada",
      "countryCode": "CA",
      "areas": ["Edmonton", "St. Albert", "Sherwood Park"]
    },
    "calgary": {
      "name": "Calgary",
      "slug": "calgary",
      "lat": 51.0486,
      "lng": -114.0708,
      "region": "Alberta",
      "regionCode": "AB",
      "country": "Canada",
      "countryCode": "CA",
      "areas": ["Calgary", "Airdrie", "Cochrane"]
    }
  }
}
```

---

## INTEGRATION WITH EXISTING PAGES

### Your Current Page Structure

Your page currently has schema at lines 33-36:

```html
<script type="application/ld+json">
  {"@context":"https://schema.org","@type":"Service",...}
</script>
```

### Upgrade Path

**STEP 1:** Keep existing schema structure
**STEP 2:** Add missing schema types
**STEP 3:** Use template functions for consistency

```php
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/../includes/schema-templates.php';

// Get service data from your existing data files
$serviceData = json_decode(file_get_contents('../data/servicePricing.json'), true);
$locationData = json_decode(file_get_contents('../data/locations.json'), true);

$service = 'SEO';
$city = 'Edmonton';

// Get pricing for this service
$pricingTiers = $serviceData['seo']['tiers'] ?? [];

// Get location metadata
$locationMeta = $locationData['edmonton'] ?? [];

// Output schemas
echo outputAllSchemas(
    $service,
    $city,
    [
        'lat' => $locationMeta['lat'] ?? 53.5461,
        'lng' => $locationMeta['lng'] ?? -113.4937,
        'region' => 'Alberta',
        'country' => 'Canada'
    ],
    $pricingTiers
);
?>
```

---

## VARIABLE SUBSTITUTION SYSTEM

### For Dynamic Generation Across 1,488 Pages

Create a master generation script:

**File:** `/php-site/deploy/includes/schema-generator.php`

```php
<?php
/**
 * Dynamic Schema Generation System
 * Generates schemas for all 1,488 service-location combinations
 */

class SchemaGenerator {
    private $services;
    private $locations;
    private $pricingData;

    public function __construct($configPath) {
        $config = json_decode(file_get_contents($configPath), true);
        $this->services = $config['services'];
        $this->locations = $config['locations'];
        $this->loadPricingData();
    }

    private function loadPricingData() {
        $pricingFile = dirname(__FILE__) . '/../data/servicePricing.json';
        $this->pricingData = json_decode(file_get_contents($pricingFile), true);
    }

    /**
     * Generate schema for a specific service-location combination
     */
    public function generateForPage($serviceName, $cityName) {
        // Find matching service and location
        $service = $this->findService($serviceName);
        $location = $this->findLocation($cityName);

        if (!$service || !$location) {
            return null;
        }

        // Get pricing tiers
        $serviceSlug = $service['slug'];
        $pricingTiers = $this->pricingData[$serviceSlug]['tiers'] ?? [];

        // Generate breadcrumbs
        $breadcrumbs = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Services', 'url' => '/services'],
            ['name' => $service['name'], 'url' => '/services/' . $service['slug']],
            ['name' => $service['name'] . ' in ' . $location['name'],
             'url' => '/services/' . $service['slug'] . '-in-' . $location['slug']]
        ];

        // Return schema data
        return [
            'service' => $service,
            'location' => $location,
            'breadcrumbs' => $breadcrumbs,
            'pricingTiers' => $pricingTiers
        ];
    }

    /**
     * Generate all schemas for a page
     */
    public function generateAllSchemas($serviceName, $cityName) {
        $data = $this->generateForPage($serviceName, $cityName);

        if (!$data) {
            return [];
        }

        // Build FAQ items specific to this combination
        $faqItems = $this->buildFAQItems(
            $data['service']['name'],
            $data['location']['name'],
            $data['location']['areas']
        );

        // Return all schemas
        return [
            'organization' => getOrganizationSchema(),
            'localBusiness' => getLocalBusinessSchema(
                $data['service']['name'],
                $data['location']['name'],
                $data['location']
            ),
            'service' => getServiceSchema(
                $data['service']['name'],
                $data['location']['name'],
                $data['pricingTiers'],
                $data['location']
            ),
            'breadcrumb' => getBreadcrumbSchema($data['breadcrumbs']),
            'faq' => getFAQSchema(
                $data['service']['name'],
                $data['location']['name'],
                $faqItems
            )
        ];
    }

    private function buildFAQItems($service, $city, $areas) {
        $areaList = implode(', ', $areas);

        return [
            [
                'question' => 'How much does ' . strtolower($service) . ' cost in ' . $city . '?',
                'answer' => 'Pricing for ' . strtolower($service) . ' in ' . $city . ' depends on your goals and competition. Contact us for a free audit and custom quote specific to your ' . $city . ' business.'
            ],
            [
                'question' => 'Why choose TML Agency for ' . strtolower($service) . ' in ' . $city . '?',
                'answer' => 'TML Agency serves ' . $areaList . ' with 15+ years of proven expertise. We\'ve delivered results for 500+ businesses and offer transparent reporting.'
            ],
            [
                'question' => 'Do you serve ' . $areaList . '?',
                'answer' => 'Yes, we serve ' . $areaList . ' and throughout the region. Our Edmonton-based team understands the local market and delivers localized strategies.'
            ],
            [
                'question' => 'How quickly will I see results?',
                'answer' => 'Timeline varies by strategy. Paid campaigns show results in days. Organic strategies typically show meaningful results in 3-6 months.'
            ]
        ];
    }

    private function findService($name) {
        foreach ($this->services as $service) {
            if (strtolower($service['name']) === strtolower($name) ||
                strtolower($service['slug']) === strtolower($name)) {
                return $service;
            }
        }
        return null;
    }

    private function findLocation($name) {
        foreach ($this->locations as $location) {
            if (strtolower($location['name']) === strtolower($name) ||
                strtolower($location['slug']) === strtolower($name)) {
                return $location;
            }
        }
        return null;
    }

    /**
     * Output schemas for a page
     */
    public function outputSchemasForPage($serviceName, $cityName) {
        $schemas = $this->generateAllSchemas($serviceName, $cityName);

        if (empty($schemas)) {
            return '';
        }

        $output = '';
        foreach ($schemas as $id => $schema) {
            $output .= outputSchema($schema, $id . '-schema') . "\n  ";
        }

        return $output;
    }
}

// Example usage in your page:
// $generator = new SchemaGenerator(__DIR__ . '/../data/page-schemas.json');
// echo $generator->outputSchemasForPage('SEO', 'Edmonton');
?>
```

---

## TESTING & VALIDATION

### 1. Google Rich Results Test

Test each page after implementation:

```bash
# For Edmonton SEO page
curl -X POST \
  -H "Content-Type: application/json" \
  "https://search.google.com/test/rich-results" \
  -d '{"url": "https://townmedialabs.ca/services/seo-in-edmonton"}'
```

Expected valid schemas:
- Organization
- LocalBusiness
- Service
- BreadcrumbList
- FAQPage

### 2. Local Testing Script

**File:** `/php-site/deploy/includes/schema-validator.php`

```php
<?php
/**
 * Schema Validation Utility
 */

class SchemaValidator {

    /**
     * Validate JSON-LD schema structure
     */
    public static function validateSchema($schema) {
        $errors = [];

        // Check required fields for Service schema
        if ($schema['@type'] === 'Service') {
            $required = ['name', 'description', 'url', 'provider'];
            foreach ($required as $field) {
                if (empty($schema[$field])) {
                    $errors[] = "Service schema missing required field: $field";
                }
            }
        }

        // Check required fields for LocalBusiness
        if (in_array('LocalBusiness', (array)$schema['@type'])) {
            $required = ['name', 'address', 'telephone', 'url'];
            foreach ($required as $field) {
                if (empty($schema[$field])) {
                    $errors[] = "LocalBusiness schema missing required field: $field";
                }
            }
        }

        // Check required fields for BreadcrumbList
        if ($schema['@type'] === 'BreadcrumbList') {
            if (empty($schema['itemListElement']) || !is_array($schema['itemListElement'])) {
                $errors[] = "BreadcrumbList must have itemListElement array";
            }
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors
        ];
    }

    /**
     * Test JSON validity
     */
    public static function validateJSON($jsonString) {
        try {
            $decoded = json_decode($jsonString, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [
                    'valid' => false,
                    'error' => json_last_error_msg()
                ];
            }
            return [
                'valid' => true,
                'data' => $decoded
            ];
        } catch (Exception $e) {
            return [
                'valid' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Check for duplicate schemas
     */
    public static function checkDuplicates($htmlContent) {
        $pattern = '/<script[^>]*type="application\/ld\+json"[^>]*>(.*?)<\/script>/s';
        preg_match_all($pattern, $htmlContent, $matches);

        $schemas = [];
        $duplicates = [];

        foreach ($matches[1] as $json) {
            $decoded = json_decode($json, true);
            $type = $decoded['@type'] ?? 'unknown';

            if (isset($schemas[$type])) {
                $duplicates[] = $type;
            }
            $schemas[$type] = true;
        }

        return [
            'totalSchemas' => count($schemas),
            'schemas' => array_keys($schemas),
            'duplicates' => $duplicates,
            'hasDuplicates' => !empty($duplicates)
        ];
    }
}

// Usage:
// $validator = new SchemaValidator();
// $result = $validator->validateSchema($schema);
// if (!$result['valid']) {
//     echo implode("\n", $result['errors']);
// }
?>
```

### 3. Validation Checklist

```markdown
## Pre-Launch Validation

### Schema Completeness
- [ ] Organization schema present
- [ ] LocalBusiness schema present with all location data
- [ ] Service schema present with pricing tiers
- [ ] BreadcrumbList schema present
- [ ] FAQPage schema present with 3+ questions
- [ ] No duplicate schemas on page

### Data Quality
- [ ] All URLs are absolute and canonical
- [ ] All phone numbers valid
- [ ] All email addresses valid
- [ ] Pricing prices are numbers (not strings with $)
- [ ] Rating value between 1-5
- [ ] Review count > 0
- [ ] Geographic coordinates are valid

### Google Validation
- [ ] Rich Results Test shows no errors
- [ ] Schema.org validator shows valid JSON
- [ ] LocalBusiness appears as valid rich result
- [ ] FAQ appears as valid rich result
- [ ] Breadcrumbs appear as valid rich result

### Performance
- [ ] Page load time < 3 seconds
- [ ] LCP < 2.5 seconds
- [ ] CLS < 0.1
- [ ] No JavaScript errors in console
- [ ] Mobile friendly

### SEO
- [ ] Meta title < 70 chars
- [ ] Meta description < 160 chars
- [ ] Canonical tag present
- [ ] H1 present and unique
- [ ] Internal links to related pages
```

---

## DEPLOYMENT CHECKLIST

### Phase 1: Single Page Implementation (Week 1)

- [ ] Create schema-templates.php
- [ ] Implement on Edmonton SEO page
- [ ] Test with Google Rich Results Test
- [ ] Verify no duplicate schemas
- [ ] Check Google Search Console
- [ ] Monitor for 24 hours

### Phase 2: Service-Level Rollout (Week 2-3)

- [ ] Create schema-generator.php
- [ ] Create page-schemas.json with all services
- [ ] Add schema generation to service page template
- [ ] Test top 20 service pages
- [ ] Validate in Google Search Console

### Phase 3: Full Location Rollout (Week 4-6)

- [ ] Complete page-schemas.json with all 1,488 locations
- [ ] Deploy schema generator to all pages
- [ ] Create automated validation script
- [ ] Monitor deployment progress
- [ ] Set up alerts for schema errors

### Phase 4: Monitoring & Optimization (Ongoing)

- [ ] Daily: Monitor Google Search Console for errors
- [ ] Weekly: Review Rich Results performance
- [ ] Monthly: Update ratings from real reviews
- [ ] Quarterly: Update pricing if changed
- [ ] Continuously: Monitor impact on CTR/impressions

---

## MONITORING DASHBOARD

### Google Search Console Integration

Track these metrics weekly:

**Rich Results Performance**
```
Metric                    Baseline    Target      Current
LocalBusiness appear      0           1,488       ?
FAQ impressions          0           +500/mo     ?
Service card clicks      0           +100/mo     ?
Breadcrumb CTR lift      0           +2-5%       ?
```

**Search Performance**
```
Metric                    Baseline    Target      Current
Total impressions        X           +30%        ?
Average position         Y           Y-2         ?
Organic traffic          Z           Z*1.3       ?
Conversion rate          A           A*1.2       ?
```

### Monthly Audit Report Template

```markdown
# Monthly Schema Audit Report
**Month:** March 2026
**Pages Analyzed:** 100
**Errors Found:** 0
**Warnings:** 0

## Summary
- All 1,488 pages have valid schemas
- Zero duplicate schemas detected
- Google Search Console shows no schema errors
- Rich results appearing for 1,400+ pages

## Performance Impact
- LocalBusiness CTR: +4.2%
- FAQ impressions: +650 vs February
- Organic traffic: +28% YoY

## Actions Taken
- Updated ratings on 150 pages
- Fixed pricing on 5 pages
- Added FAQ to 20 new pages

## Next Month's Focus
- Complete FAQ on remaining 300 pages
- Add review schema to 500 pages
- Implement VideoSchema for video content
```

---

## QUICK REFERENCE

### File Locations

```
/php-site/deploy/
├── includes/
│   ├── schema-templates.php       (Core functions)
│   ├── schema-generator.php       (Dynamic generation)
│   └── schema-validator.php       (Validation utilities)
├── data/
│   ├── page-schemas.json          (Services & locations)
│   └── servicePricing.json        (Existing pricing data)
└── services/
    ├── seo-in-edmonton/
    ├── seo-in-calgary/
    └── [1,488 other pages...]
```

### Function Reference

```php
// Generate individual schemas
getOrganizationSchema()
getLocalBusinessSchema($service, $city, $locationData)
getServiceSchema($service, $city, $pricingTiers, $locationData)
getBreadcrumbSchema($breadcrumbs)
getFAQSchema($service, $city, $faqItems)
getArticleSchema($articleData)
getWebsiteSchema()

// Utilities
sanitizeSlug($text)
outputSchema($schema, $id)
outputAllSchemas($service, $city, $locationData, $pricingTiers, $breadcrumbs, $faqItems)

// Validation
SchemaValidator::validateSchema($schema)
SchemaValidator::validateJSON($jsonString)
SchemaValidator::checkDuplicates($htmlContent)

// Generation
SchemaGenerator::generateForPage($serviceName, $cityName)
SchemaGenerator::generateAllSchemas($serviceName, $cityName)
SchemaGenerator::outputSchemasForPage($serviceName, $cityName)
```

---

## SUPPORT & TROUBLESHOOTING

### Common Issues

**Issue:** "Schema not appearing in Google results"
- **Solution:** Wait 2-4 weeks for Google to recrawl and update index

**Issue:** "Duplicate schema warnings"
- **Solution:** Check for multiple schema output locations, remove duplicates

**Issue:** "Missing required field errors"
- **Solution:** Verify all required fields are present and non-empty

**Issue:** "Invalid JSON syntax"
- **Solution:** Use Schema Validator to identify and fix JSON errors

---

**Last Updated:** March 31, 2026
**For:** TML Agency
**Maintained By:** Development Team
**Version:** 1.0 Production Ready
