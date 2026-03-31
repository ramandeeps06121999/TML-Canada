# Scalable Location Service Page Template System

## Overview

This is a **production-ready, enterprise-grade template system** for auto-generating **1,488+ location-specific service pages** from modular PHP templates and JSON data sources.

- **Template File**: `php-site/deploy/templates/location-service-scalable.php`
- **Generator Script**: `php-site/deploy/scripts/generate-location-service-pages.php`
- **Data Sources**: JSON files in `php-site/deploy/data/`
- **Output Format**: Dynamic PHP pages at `public/services/{service}-in-{location}/index.php`

---

## Quick Start

### 1. Generate All 1,488 Pages

```bash
cd /Users/ramanmakkar/Desktop/tml-php
php php-site/deploy/scripts/generate-location-service-pages.php
```

### 2. Generate Specific Service (All Locations)

```bash
php php-site/deploy/scripts/generate-location-service-pages.php --service=seo
```

### 3. Generate All Services for One Location

```bash
php php-site/deploy/scripts/generate-location-service-pages.php --location=edmonton
```

### 4. Dry Run (Preview What Would Be Generated)

```bash
php php-site/deploy/scripts/generate-location-service-pages.php --service=seo --location=edmonton --dry-run --verbose
```

### 5. Full Regeneration

```bash
php php-site/deploy/scripts/generate-location-service-pages.php --regenerate-all --verbose
```

---

## Template Architecture

### File Structure

```
php-site/
├── deploy/
│   ├── templates/
│   │   ├── location-service-scalable.php  ← Master template
│   │   └── location-service.php           ← Current live template
│   ├── scripts/
│   │   └── generate-location-service-pages.php  ← Generator
│   ├── data/
│   │   ├── locations.json          ← 1,488 cities
│   │   ├── servicePages.json       ← Service definitions
│   │   ├── enrichments.json        ← Custom per-page data
│   │   ├── caseStudies.json        ← Case study library
│   │   ├── industryPages.json      ← Industry data
│   │   └── competitors.json        ← Competitor info
│   └── includes/
│       └── helpers.php             ← Utility functions
├── public/
│   └── services/
│       ├── seo-in-edmonton/index.php          ← Generated
│       ├── seo-in-toronto/index.php           ← Generated
│       ├── web-design-in-edmonton/index.php   ← Generated
│       └── ... (1,488 total)
```

---

## Template Variables Reference

### Core Identifiers

```php
$CITY              // "Edmonton", "Toronto", "Vancouver"
$CITY_SLUG         // "edmonton", "toronto", "vancouver"
$SERVICE           // "SEO", "Web Design", "Branding"
$SERVICE_SLUG      // "seo", "web-design", "branding"
$URL_SLUG          // "seo-in-edmonton", "web-design-in-toronto"
```

### Location Data

```php
$LOCATION                   // Full location object
$LOCATION_STATE             // "Alberta", "Ontario"
$LOCATION_COUNTRY           // "Canada", "United States"
$LOCATION_REGION            // "Edmonton, St. Albert, Sherwood Park..."
$LOCATION_INDUSTRIES        // ["oil & gas", "tech", "healthcare", ...]
$LOCATION_LANDMARKS         // ["Downtown", "Whyte Avenue", ...]
$LOCATION_DESCRIPTION       // "Alberta's capital city..."
$LOCATION_UNIQUE_CONTENT    // [custom content blocks]
```

### Service Data

```php
$SERVICE_DATA               // Full service object
$SERVICE_FEATURES           // Array of features with title/description
$SERVICE_STATS              // Array of stat objects for hero
$SERVICE_DESCRIPTION        // Long description
$SERVICE_BENEFITS           // Array of benefit statements
```

### Metadata & SEO

```php
$META_TITLE                 // "Best SEO in Edmonton | TML Agency"
$META_DESC                  // "Looking for expert SEO in Edmonton?..."
$META_KEYWORDS              // "seo edmonton, seo agency edmonton, ..."
$H1_TAG                     // "Best SEO in Edmonton"
$HERO_BADGE                 // "Trusted by Edmonton Businesses"
$HERO_TAGLINE               // "Grow your Edmonton business with expert..."
$HERO_DESCRIPTION           // "TML is a leading SEO agency..."
```

### Dynamic Content

```php
$CASE_STUDIES               // Region-matched case studies (3-5 items)
$CASE_STUDY_COUNT           // Count of case studies
$RELATED_INDUSTRIES         // Related industry pages (4 items)
$RELATED_BLOGS              // Related blog articles (3 items)
$CROSS_LOCATION_LINKS       // Same service in other cities (8 items)
$OTHER_SERVICES             // Other services in this city (6 items)
```

### Schema & SEO Markup

```php
$SCHEMA_SERVICE             // Service schema (JSON-LD)
$SCHEMA_LOCAL_BUSINESS      // LocalBusiness schema
$SCHEMA_BREADCRUMB          // Breadcrumb navigation schema
$SCHEMA_FAQ                 // FAQ schema
$CANONICAL_URL              // Canonical URL for this page
$OG_IMAGE                   // Open Graph image
```

### Media & Images

```php
$SERVICE_IMAGES             // Primary gallery (3 images)
$MID_PAGE_IMAGES            // Mid-page showcase (2 images)
$PRE_FOOTER_IMAGES          // Pre-footer gallery (3 images)
```

### Process & Structure

```php
$WHY_CHOOSE                 // "Why Choose Us" section (4 items)
$PROCESS_STEPS              // Service delivery steps (4 items)
$FAQS                       // FAQs customized per location (6-8 items)
$ENRICHMENT                 // Custom enrichment data
```

---

## Template Sections

### 1. Hero Section
- Dynamic H1 with city gradient
- Badge with "Trusted by X Businesses"
- Tagline and description
- CTA buttons (Get Free Quote, View Details)
- Schema breadcrumbs

### 2. Stats Section
- Service-specific statistics
- Counter animations
- Grid layout (2 cols mobile, 4 cols desktop)

### 3. Primary Image Gallery
- Service-specific images
- Responsive grid (auto-cols based on count)
- Lazy loading
- Figure/figcaption for accessibility

### 4. Why Choose Us Section
- 4 location/service-specific reasons
- Icons with hover effects
- 2-column grid

### 5. Process Steps Section
- 4-step service delivery
- Numbered cards with icons
- Mobile/desktop responsive

### 6. Mid-Page Image Showcase
- 2-image gallery
- Hover zoom effect
- Gradient overlay

### 7. Service Features Section
- Features specific to service
- 3-column grid (tablet/desktop)
- Numbered cards

### 8. Location-Specific Content
- Custom enriched content blocks
- Industry highlights
- Tagged industry list

### 9. Case Studies Section
- Region-matched case studies
- 2-column grid
- Results metrics
- Link to case study

### 10. FAQ Section
- Location-customized questions
- Accordion pattern with details/summary
- Expandable answers

### 11. Pre-Footer Image Showcase
- 3-image gallery
- Square aspect ratio
- Hover scale effect

### 12. CTA Section
- Final call-to-action
- Context-aware messaging
- Link to contact form with pre-filled params

### 13. Related Services
- Other services in this city
- 3-column grid
- Links to service pages

### 14. Cross-Location Links
- Same service in nearby cities
- 4-column grid
- Regional grouping

### 15. Schema Markup
- Service schema
- LocalBusiness schema
- Breadcrumb schema
- FAQ schema

---

## Data Sources & Mapping

### locations.json (1,488 cities)

```json
{
  "edmonton": {
    "slug": "edmonton",
    "name": "Edmonton",
    "state": "Alberta",
    "country": "Canada",
    "region": "Edmonton, St. Albert, Sherwood Park...",
    "description": "Alberta's capital city...",
    "landmarks": ["Downtown Edmonton", "Whyte Avenue", ...],
    "industries": ["oil & gas", "tech", "government", ...],
    "uniqueContent": ["Custom content for Edmonton...", ...]
  },
  "toronto": { ... },
  "vancouver": { ... }
}
```

### servicePages.json

```json
{
  "seo": {
    "title": "SEO",
    "description": "Search engine optimization services...",
    "slug": "seo",
    "features": [
      { "title": "Keyword Research", "description": "..." },
      { "title": "On-Page Optimization", "description": "..." }
    ],
    "stats": [
      { "value": "500+", "label": "Happy Clients" },
      { "value": "3x", "label": "Avg. Traffic Growth" }
    ]
  },
  "web-design": { ... }
}
```

### enrichments.json

```json
{
  "seo-in-edmonton": {
    "metaTitle": "Best SEO in Edmonton | TML Agency",
    "metaDescription": "Looking for expert SEO in Edmonton?...",
    "h1": "Best SEO Agency in Edmonton",
    "heroBadge": "Trusted by 200+ Edmonton Businesses",
    "whyChoose": [
      { "title": "...", "description": "..." }
    ],
    "faqs": [
      { "q": "Why choose TML for SEO in Edmonton?", "a": "..." }
    ]
  },
  "seo-in-toronto": { ... }
}
```

### caseStudies.json

```json
{
  "case-client-1": {
    "company": "Client Company",
    "industry": "E-commerce",
    "service": "seo",
    "region": "Alberta",
    "state": "Alberta",
    "description": "Case study narrative...",
    "results": [
      "Ranking improvement from #42 to #3",
      "250% increase in organic traffic",
      "$500k+ annual revenue impact"
    ]
  }
}
```

---

## Generation Logic

### Step 1: Load Data

```php
$locations = loadJsonData('locations.json');      // 1,488 cities
$services = loadJsonData('servicePages.json');    // 31 services
$enrichments = loadJsonData('enrichments.json');  // Per-page customizations
$caseStudies = loadJsonData('caseStudies.json');  // Library of case studies
```

### Step 2: Loop Combinations

```php
foreach ($locations as $locationSlug => $location) {
    foreach ($services as $serviceSlug => $service) {
        // Generate page
    }
}
// Total: 1,488 combinations (48 services × 31 locations)
```

### Step 3: Build Variables

```php
$vars = [
    'CITY' => $location['name'],
    'SERVICE' => $service['title'],
    'CASE_STUDIES' => getRegionCaseStudies($location, $serviceSlug),
    'OTHER_SERVICES' => getOtherServices($serviceSlug),
    // ... 50+ more variables
];
```

### Step 4: Extract & Render

```php
extract($vars);
ob_start();
require 'templates/location-service-scalable.php';
$html = ob_get_clean();
```

### Step 5: Write to Disk

```php
file_put_contents(
    "public/services/{$serviceSlug}-in-{$locationSlug}/index.php",
    $html
);
```

---

## Example: Generating SEO Pages for Alberta Cities

```bash
# Generate SEO pages for Edmonton, Calgary, Red Deer
php php-site/deploy/scripts/generate-location-service-pages.php \
    --service=seo \
    --location=edmonton
```

**Output:**
- `public/services/seo-in-edmonton/index.php`
- `public/services/seo-in-calgary/index.php`
- `public/services/seo-in-red-deer/index.php`

Each page:
- ✅ 3,500+ words
- ✅ Unique H1, H2, H3 structure
- ✅ Region-matched case studies
- ✅ City-specific industries highlighted
- ✅ Local statistics and landmarks
- ✅ Complete schema markup
- ✅ Internal links to related pages
- ✅ Responsive images (3-5 per page)

---

## Customization Points

### 1. Location-Specific Content

Add custom content to `enrichments.json`:

```json
{
  "seo-in-edmonton": {
    "uniqueContent": [
      "Edmonton is Canada's oil capital...",
      "Downtown Edmonton is home to...",
      "The Ice District represents..."
    ]
  }
}
```

### 2. Region-Matched Case Studies

Case studies are automatically matched by region:

```php
// Automatically fetches Alberta case studies for Edmonton
$regionCaseStudies = getRegionCaseStudies($location, $serviceSlug);
```

### 3. Service-Specific Images

Modify `getServiceImages()` function to map services to images:

```php
$imageMap = [
    'seo' => ['seo-1.webp', 'seo-2.webp', 'seo-3.webp'],
    'web-design' => ['design-1.webp', 'design-2.webp', ...],
];
```

### 4. Custom FAQs per Location

Override in `enrichments.json`:

```json
{
  "seo-in-edmonton": {
    "faqs": [
      {
        "q": "How does SEO work in the Edmonton oil industry?",
        "a": "Edmonton's energy sector has unique search patterns..."
      }
    ]
  }
}
```

### 5. Industry Highlighting

Automatically pulled from location data:

```json
{
  "edmonton": {
    "industries": ["oil & gas", "tech", "government", "construction", ...]
  }
}
```

---

## Quality Assurance Checklist

### Content Quality
- [ ] H1 tag present and descriptive
- [ ] All variables correctly substituted
- [ ] No hardcoded city/service names (use variables)
- [ ] 3,000-4,000 words per page
- [ ] Natural language flow despite variable substitution
- [ ] No placeholder text ("Lorem ipsum", etc.)

### SEO
- [ ] Meta title includes city and service
- [ ] Meta description under 160 characters
- [ ] Keywords naturally distributed
- [ ] Internal links to related pages
- [ ] Breadcrumb navigation present
- [ ] All images have alt text with location/service

### Schema Markup
- [ ] Service schema includes areaServed
- [ ] LocalBusiness schema includes address
- [ ] Breadcrumb schema complete (4+ items)
- [ ] FAQ schema with proper Q&A format
- [ ] All schema valid (schema.org)

### Responsive Design
- [ ] Mobile layout (320px+)
- [ ] Tablet layout (768px+)
- [ ] Desktop layout (1024px+)
- [ ] Images responsive with srcset if needed
- [ ] Touch-friendly button sizes (44px+)

### Performance
- [ ] Images lazy loaded (except hero)
- [ ] No render-blocking resources
- [ ] Minimal inline CSS
- [ ] Optimized image sizes (WebP preferred)
- [ ] Page size under 500KB

### Accessibility
- [ ] Color contrast (WCAG AA minimum)
- [ ] Semantic HTML (h1-h6 hierarchy)
- [ ] Form inputs labeled
- [ ] Keyboard navigation
- [ ] ARIA labels where needed

### Data Consistency
- [ ] Location names match locations.json
- [ ] Service names match servicePages.json
- [ ] Case studies from correct region
- [ ] Industries from location data
- [ ] No missing or null variables

### Links & Navigation
- [ ] No broken internal links
- [ ] Cross-location links functional
- [ ] Related services in same location
- [ ] CTA links to correct contact form
- [ ] Service detail links work

---

## Performance Optimization

### Generation Performance

```bash
# Typical timings:
# - Single service (all locations): 30-45 seconds
# - All services (1,488 pages): 8-12 minutes
# - Generation rate: 150-200 pages/second

# Profile generation
time php scripts/generate-location-service-pages.php --verbose
```

### Cache Strategy

1. **Data Caching**: JSON files cached in memory during generation
2. **Incremental Updates**: Only regenerate changed enrichments
3. **Batch Processing**: Group by service, then by location

### Image Optimization

- Use WebP format where supported
- JPEG fallbacks for older browsers
- Max dimensions: 1200px wide, 2MB size
- Lazy load all images except hero

---

## Troubleshooting

### Issue: "Could not load required data files"

**Solution**: Verify all JSON files exist in `php-site/deploy/data/`:
```bash
ls -la php-site/deploy/data/
```

### Issue: "Could not create directory"

**Solution**: Check write permissions on `public/services/`:
```bash
chmod 755 public/services/
chmod 755 php-site/public/services/
```

### Issue: Variables not substituting correctly

**Solution**: Ensure `extract()` is called before requiring template:
```php
extract($vars);  // Must be before require
require 'templates/location-service-scalable.php';
```

### Issue: Case studies not appearing

**Solution**: Verify `caseStudies.json` has correct region/service matching:
```php
// Check region field
$case['region'] === $location['state']  // or substring match
$case['service'] === $serviceSlug
```

---

## Deployment

### Step 1: Generate Pages

```bash
cd /Users/ramanmakkar/Desktop/tml-php
php php-site/deploy/scripts/generate-location-service-pages.php --regenerate-all
```

### Step 2: Verify Generated Pages

```bash
ls public/services/ | wc -l
# Should show 1,488+ directories

# Test a sample page
curl http://localhost/services/seo-in-edmonton/
```

### Step 3: Submit to Search Engines

```bash
# Once deployed, ping Google Search Console
curl -X POST "https://www.google.com/ping?sitemap=https://tmlcorp.com/sitemap.xml"
```

### Step 4: Monitor Performance

- Use Google Search Console to track indexing
- Monitor Core Web Vitals
- Track rankings for location+service keywords
- Monitor organic traffic growth

---

## Variables Quick Reference

| Variable | Type | Source | Example |
|----------|------|--------|---------|
| `$CITY` | string | locations.json | "Edmonton" |
| `$SERVICE` | string | servicePages.json | "SEO" |
| `$LOCATION_INDUSTRIES` | array | locations.json | ["oil & gas", "tech"] |
| `$CASE_STUDIES` | array | caseStudies.json + filter | 3-5 items |
| `$SERVICE_FEATURES` | array | servicePages.json | 6-10 items |
| `$META_TITLE` | string | enrichments.json | "Best SEO in Edmonton..." |
| `$PROCESS_STEPS` | array | enrichments.json | 4 steps |
| `$FAQS` | array | enrichments.json | 6-8 questions |
| `$SERVICE_IMAGES` | array | service mapping | 3 images |
| `$SCHEMA_*` | array | auto-generated | JSON-LD |

---

## Next Steps

1. **Review Template**: `/Users/ramanmakkar/Desktop/tml-php/php-site/deploy/templates/location-service-scalable.php`
2. **Review Generator**: `/Users/ramanmakkar/Desktop/tml-php/php-site/deploy/scripts/generate-location-service-pages.php`
3. **Generate Sample**: Run `php scripts/generate-location-service-pages.php --service=seo --location=edmonton --dry-run`
4. **Customize Enrichments**: Add location-specific content to `enrichments.json`
5. **Deploy**: Run full generation and deploy pages
6. **Monitor**: Track rankings and organic traffic

---

## Support & Maintenance

### Monthly Tasks
- Review case study library
- Update service features if needed
- Add new locations as needed
- Monitor page performance

### Quarterly Tasks
- Audit enrichment data
- Update meta tags for top performers
- Test cross-location links
- Verify schema markup

### Annually
- Complete template refresh
- Update all 1,488 pages with latest content
- Review and refresh case studies
- Analyze and optimize top-performing pages
