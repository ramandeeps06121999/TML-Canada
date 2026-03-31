# Template System Quick Reference

## Files Location

| File | Purpose | Path |
|------|---------|------|
| **Template** | Master template for all pages | `php-site/deploy/templates/location-service-scalable.php` |
| **Generator** | Script to generate 1,488+ pages | `php-site/deploy/scripts/generate-location-service-pages.php` |
| **Data** | JSON files for content | `php-site/deploy/data/*.json` |
| **Output** | Generated pages | `php-site/public/services/{service}-in-{location}/` |

---

## Common Commands

```bash
# Generate everything (1,488 pages)
php php-site/deploy/scripts/generate-location-service-pages.php

# Test single combination
php php-site/deploy/scripts/generate-location-service-pages.php \
    --service=seo --location=edmonton --dry-run --verbose

# Generate one service, all locations
php php-site/deploy/scripts/generate-location-service-pages.php --service=seo

# Generate one location, all services
php php-site/deploy/scripts/generate-location-service-pages.php --location=edmonton

# Full regeneration with progress
php php-site/deploy/scripts/generate-location-service-pages.php --regenerate-all --verbose
```

---

## Template Variables (50+ injected)

### Must-Haves
- `$CITY` - City name
- `$SERVICE` - Service name
- `$CITY_SLUG` - URL-safe city
- `$SERVICE_SLUG` - URL-safe service
- `$LOCATION_INDUSTRIES` - Array of industries
- `$CASE_STUDIES` - Region-matched cases
- `$META_TITLE` - SEO title
- `$META_DESC` - SEO description

### Full List
```php
// Core
$CITY, $CITY_SLUG, $SERVICE, $SERVICE_SLUG, $URL_SLUG

// Location
$LOCATION, $LOCATION_STATE, $LOCATION_COUNTRY, $LOCATION_REGION,
$LOCATION_INDUSTRIES, $LOCATION_LANDMARKS, $LOCATION_DESCRIPTION,
$LOCATION_UNIQUE_CONTENT

// Service
$SERVICE_DATA, $SERVICE_FEATURES, $SERVICE_STATS, $SERVICE_DESCRIPTION

// SEO
$META_TITLE, $META_DESC, $META_KEYWORDS, $H1_TAG, $HERO_BADGE,
$HERO_TAGLINE, $HERO_DESCRIPTION

// Content
$CASE_STUDIES, $RELATED_INDUSTRIES, $RELATED_BLOGS,
$CROSS_LOCATION_LINKS, $OTHER_SERVICES

// Schema
$SCHEMA_SERVICE, $SCHEMA_LOCAL_BUSINESS, $SCHEMA_BREADCRUMB,
$SCHEMA_FAQ, $CANONICAL_URL, $OG_IMAGE

// Media
$SERVICE_IMAGES, $MID_PAGE_IMAGES, $PRE_FOOTER_IMAGES

// Structure
$WHY_CHOOSE, $PROCESS_STEPS, $FAQS, $ENRICHMENT
```

---

## Page Structure (15 Sections)

1. **Hero** - H1, badge, tagline, CTAs
2. **Stats** - Service KPIs
3. **Primary Gallery** - Service images (3)
4. **Why Choose Us** - 4 reasons
5. **Process** - 4-step workflow
6. **Mid Gallery** - 2 images
7. **Features** - Service details (6-10)
8. **Location Content** - City-specific info
9. **Case Studies** - 2-4 region-matched
10. **FAQs** - 6-8 questions
11. **Pre-Footer Gallery** - 3 images
12. **Final CTA** - Call-to-action
13. **Related Services** - Other offerings
14. **Cross-Location** - Same service nearby
15. **Schema Markup** - JSON-LD tags

---

## Data Source Map

| Source | Contains | Count | Updates |
|--------|----------|-------|---------|
| **locations.json** | Cities, states, industries, landmarks | 1,488 | Quarterly |
| **servicePages.json** | Service titles, features, stats, descriptions | 48 | As needed |
| **enrichments.json** | Custom per-page content, FAQs, titles | 1,488 | Monthly |
| **caseStudies.json** | Client success stories with metrics | 50-100 | Monthly |
| **industryPages.json** | Industry details for cross-links | 20+ | Quarterly |
| **blogArticles.json** | Blog articles for related content | 100+ | Weekly |

---

## Variable Substitution Examples

### Simple Text
```php
echo tml_e($CITY);  // "Edmonton"
echo tml_e($SERVICE);  // "SEO"
```

### Arrays (Loop)
```php
foreach ($LOCATION_INDUSTRIES as $industry) {
    echo tml_e($industry);  // "oil & gas", "tech", etc.
}
```

### Conditional
```php
<?php if (!empty($CASE_STUDIES)) : ?>
    // Show case studies
<?php endif; ?>
```

### Fallback
```php
$count = $CASE_STUDY_COUNT ?? 0;
```

---

## SEO Checklist Per Page

- [ ] Unique H1 with city/service
- [ ] Meta title under 60 chars
- [ ] Meta description under 160 chars
- [ ] Keywords naturally distributed
- [ ] Breadcrumb schema
- [ ] LocalBusiness schema with address
- [ ] Service schema with areaServed
- [ ] FAQ schema
- [ ] 3+ internal links to related pages
- [ ] All images have alt text
- [ ] Canonical URL set

---

## Image Mapping

```php
// Service → Images mapping
$serviceImages = [
    'seo' => ['seo-1.webp', 'seo-2.webp', 'seo-3.webp'],
    'web-design' => ['design-1.webp', 'design-2.webp', 'design-3.webp'],
    'branding' => ['brand-1.webp', 'brand-2.webp', 'brand-3.webp'],
    // Add more...
];

// 3 galleries per page:
$SERVICE_IMAGES[0..2]        // Hero/primary
$MID_PAGE_IMAGES[0..1]       // Mid-page
$PRE_FOOTER_IMAGES[0..2]     // Pre-footer
```

---

## Performance Targets

| Metric | Target | Tool |
|--------|--------|------|
| Page Size | <500KB | DevTools |
| Load Time | <2s | PageSpeed |
| LCP | <2.5s | Core Web Vitals |
| CLS | <0.1 | Core Web Vitals |
| Generation Rate | 150-200 pages/sec | Script timer |

---

## Troubleshooting Quick Fix

| Issue | Solution |
|-------|----------|
| Variables show as `$VARIABLE` | Check `extract($vars)` called before template |
| Missing case studies | Verify `caseStudies.json` has matching region/service |
| Broken links | Check `$CROSS_LOCATION_LINKS`, `$OTHER_SERVICES` arrays |
| No images | Verify `getServiceImages()` has service slug mapping |
| Permissions error | Run `chmod 755 public/services/` |

---

## Customization Points

### Add Custom FAQ
Edit `enrichments.json`:
```json
{
  "seo-in-edmonton": {
    "faqs": [
      { "q": "Custom question?", "a": "Custom answer." }
    ]
  }
}
```

### Change Hero Badge
```json
{
  "seo-in-edmonton": {
    "heroBadge": "Trusted by 250+ Edmonton Businesses"
  }
}
```

### Add Location-Specific Content
```json
{
  "edmonton": {
    "uniqueContent": [
      "Edmonton is Canada's oil capital...",
      "The tech scene is rapidly growing..."
    ]
  }
}
```

### Highlight Different Industries
```json
{
  "edmonton": {
    "industries": ["oil & gas", "tech", "government", "construction", ...]
  }
}
```

---

## Generation Flow

```
Load JSON data
    ↓
Loop 1,488 combinations
    ↓
For each combination:
  1. Fetch location metadata
  2. Fetch service details
  3. Get region-matched case studies
  4. Build 50+ template variables
  5. Extract variables
  6. Render template
  7. Write to public/services/{service}-in-{location}/index.php
    ↓
Output: 1,488 unique pages
```

---

## Testing Single Page

```bash
# Generate sample
php php-site/deploy/scripts/generate-location-service-pages.php \
    --service=seo --location=edmonton --dry-run --verbose

# View generated file
cat public/services/seo-in-edmonton/index.php | head -50

# Test in browser (if deployed)
curl http://localhost/services/seo-in-edmonton/
```

---

## Update Workflow

### Monthly Enrichment Updates
```bash
# Edit enrichments.json with new data
# Regenerate affected pages
php php-site/deploy/scripts/generate-location-service-pages.php --service=seo --regenerate-all
```

### Add New Location
```bash
# 1. Add to locations.json
# 2. Run generator for existing services
php php-site/deploy/scripts/generate-location-service-pages.php --location=new-city
```

### Add New Service
```bash
# 1. Add to servicePages.json
# 2. Generate all combinations
php php-site/deploy/scripts/generate-location-service-pages.php --service=new-service
```

---

## Key Functions in Generator

```php
function buildTemplateVariables()  // Build all 50+ variables
function getRegionCaseStudies()   // Match cases by region
function getCrossLocationLinks()  // Get other cities
function getOtherServices()       // Get related services
function buildSchemaService()     // Service schema
function buildSchemaLocalBusiness() // LocalBusiness schema
function buildSchemaBreadcrumb()  // Breadcrumb schema
function buildSchemaFaq()         // FAQ schema
function tml_location_service_slug() // URL slug generator
```

---

## Performance Checklist

- [ ] Images optimized (WebP, <2MB each)
- [ ] Lazy loading on all images except hero
- [ ] Minimal inline CSS
- [ ] No render-blocking scripts
- [ ] Fonts optimized and system fonts as fallback
- [ ] Gzip compression enabled
- [ ] Cache headers set (1 week for static assets)
- [ ] CDN for images (optional)

---

## Deployment Checklist

- [ ] Generate all 1,488 pages
- [ ] Verify directory structure
- [ ] Check file permissions (644 for files, 755 for dirs)
- [ ] Deploy to web server
- [ ] Test sample pages in browser
- [ ] Verify all links work
- [ ] Submit sitemap to Google Search Console
- [ ] Monitor indexing status
- [ ] Check Core Web Vitals
- [ ] Track organic traffic growth

---

## Files Modified/Created

| File | Status | Description |
|------|--------|-------------|
| `php-site/deploy/templates/location-service-scalable.php` | **NEW** | Master template (15 sections, 50+ variables) |
| `php-site/deploy/scripts/generate-location-service-pages.php` | **NEW** | Generator script with CLI options |
| `SCALABLE_TEMPLATE_GUIDE.md` | **NEW** | Full documentation |
| `TEMPLATE_QUICK_REFERENCE.md` | **NEW** | This file |
| `php-site/deploy/templates/location-service.php` | EXISTING | Current live template (unchanged) |
| `php-site/deploy/data/*.json` | EXISTING | Data files (no changes needed) |

---

## Next Steps

1. Review `/Users/ramanmakkar/Desktop/tml-php/php-site/deploy/templates/location-service-scalable.php`
2. Review `/Users/ramanmakkar/Desktop/tml-php/php-site/deploy/scripts/generate-location-service-pages.php`
3. Run test: `php scripts/generate-location-service-pages.php --service=seo --location=edmonton --dry-run --verbose`
4. Customize `enrichments.json` with your data
5. Generate all 1,488 pages: `php scripts/generate-location-service-pages.php`
6. Deploy and monitor
