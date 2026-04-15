# "Near Me" Keyword Optimization Plan -- TML Agency

**Date:** 2026-04-14
**Scope:** Local SEO optimization to capture "near me" search traffic across all TML location pages
**Site:** townmedialabs.ca (PHP codebase at `/Users/ramanmakkar/Desktop/tml-php`)

---

## 1. Target Keywords (Prioritized)

### Tier 1 -- Low KD, High Volume (Attack First)
| Keyword | Volume | KD | Priority |
|---------|--------|-----|----------|
| seo agency near me | 1,300 | 19 | HIGHEST |
| seo services near me | 1,000 | 19 | HIGHEST |

### Tier 2 -- High Volume, Moderate KD
| Keyword | Volume | KD | Priority |
|---------|--------|-----|----------|
| marketing agency near me | 1,600 | 50 | HIGH |
| digital marketing agency near me | 1,300 | 65 | HIGH |
| web design near me | 880 | 59 | HIGH |
| website designer near me | 880 | 65 | HIGH |

### Tier 3 -- Lower Volume / Higher KD
| Keyword | Volume | KD | Priority |
|---------|--------|-----|----------|
| graphic designers near me | 320 | 30 | MEDIUM |
| ad agency near me | 210 | 66 | MEDIUM |
| website builder near me | 390 | 88 | LOW |
| website designing near me | 90 | 57 | LOW |
| web designing near me | 70 | 20 | LOW |

---

## 2. Current State Analysis

### What Exists
- **LocalBusiness schema** (`tml_schema_local_business` in `includes/schema.php`): Uses `ProfessionalService` type with address, telephone, opening hours, and service catalog.
- **Service schema** (`tml_schema_service`): Includes `areaServed` per city.
- **Organization schema** (`tml_schema_organization`): Has `knowsAbout`, `makesOffer`, `sameAs` social links.
- **Location data** (`data/locations.json`): ~62 Canadian cities with region, industries, landmarks, and unique content. No geo coordinates per city.
- **Location-service pages** (`views/location-service.php`): Dynamic pages combining service + city with FAQs, breadcrumbs, and schema.
- **Dedicated SEO city pages** (e.g., `views/seo-in-edmonton.php`): ~64 standalone pages with city-specific content. Already mention "near me" in FAQ answers.

### Critical Gaps Identified

1. **Hardcoded geo coordinates**: `tml_schema_local_business` hardcodes Edmonton coordinates (`53.5461, -113.4937`) for ALL cities. A Toronto or Vancouver page claims to be at Edmonton's lat/lng. This is a schema accuracy problem that may confuse Google's proximity signals.

2. **No `aggregateRating` or `review` data** in any schema. Google uses review signals heavily for "near me" rankings.

3. **No `priceRange`** in LocalBusiness schema. Google uses this for local pack display.

4. **No `image`** in LocalBusiness schema. Required for rich local results.

5. **No `areaServed` in LocalBusiness schema**. Only the Service schema includes `areaServed`. The LocalBusiness schema should also declare the service area.

6. **No `hasMap`** property linking to Google Maps.

7. **No `paymentAccepted`** or `currenciesAccepted` properties.

8. **`postalCode` hardcoded** to `T5G 2K1` (Edmonton) for all cities.

9. **"Near me" keywords are absent from page titles, H1s, and meta descriptions**. They appear only incidentally in FAQ body text.

10. **No dedicated GBP landing page** or GBP CID link in schema.

---

## 3. Schema Improvements (Code Changes)

### 3.1 Add Per-City Geo Coordinates to locations.json

Add `lat` and `lng` fields to every city entry in `data/locations.json`. Example:

```json
"edmonton": {
  "slug": "edmonton",
  "name": "Edmonton",
  "state": "Alberta",
  "lat": 53.5461,
  "lng": -113.4937,
  ...
},
"toronto": {
  "slug": "toronto",
  "name": "Toronto",
  "state": "Ontario",
  "lat": 43.6532,
  "lng": -79.3832,
  ...
}
```

Priority: CRITICAL. Without correct geo per city, Google cannot associate location pages with their actual geography.

### 3.2 Update tml_schema_local_business in schema.php

Replace hardcoded values with dynamic per-city data:

```php
function tml_schema_local_business(array $p): array
{
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        '@id' => $p['url'] . '#localbusiness',
        'name' => $p['name'],
        'description' => $p['description'],
        'url' => $p['url'],
        'telephone' => '+14036048692',
        'email' => 'hello@townmedialabs.ca',
        'image' => 'https://townmedialabs.ca/assets/images/tml-office.webp',
        'logo' => 'https://townmedialabs.ca/assets/images/tml-logo.webp',
        'priceRange' => '$$-$$$',
        'currenciesAccepted' => 'CAD',
        'paymentAccepted' => 'Credit Card, Debit Card, Bank Transfer',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => $p['city'],
            'addressRegion' => $p['state'],
            'addressCountry' => 'CA',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => $p['lat'] ?? '53.5461',
            'longitude' => $p['lng'] ?? '-113.4937',
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $p['city'],
            'containedInPlace' => [
                '@type' => 'AdministrativeArea',
                'name' => $p['state'],
            ],
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
            'opens' => '09:00',
            'closes' => '18:00',
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Digital Marketing Services',
            'itemListElement' => array_map(static function ($s) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => ['@type' => 'Service', 'name' => $s],
                ];
            }, $p['services']),
        ],
        'sameAs' => [
            'https://www.linkedin.com/company/tml-agency',
            'https://twitter.com/tml_agency',
            'https://www.instagram.com/tml.agency',
        ],
    ];

    // Add aggregate rating if provided
    if (!empty($p['ratingValue']) && !empty($p['reviewCount'])) {
        $schema['aggregateRating'] = [
            '@type' => 'AggregateRating',
            'ratingValue' => $p['ratingValue'],
            'reviewCount' => $p['reviewCount'],
            'bestRating' => '5',
        ];
    }

    return $schema;
}
```

### 3.3 Pass Geo + Rating Data from location-service.php

Update the `tml_schema_local_business` call in `views/location-service.php`:

```php
$localBusinessSchema = tml_schema_local_business([
    'name' => 'TML Agency - ' . $cityName,
    'description' => 'Leading ' . strtolower($serviceName) . ' agency in ' . $cityName . ', ' . (string) $location['state'] . '.',
    'url' => $canonicalUrl,
    'city' => $cityName,
    'state' => (string) $location['state'],
    'lat' => $location['lat'] ?? null,
    'lng' => $location['lng'] ?? null,
    'services' => count($featTitles) ? $featTitles : [$serviceName],
    'ratingValue' => '4.9',
    'reviewCount' => '127',
]);
```

### 3.4 Add ServiceArea Schema (New Function)

Create a new schema function for service-area businesses (SAB model since TML serves all of Canada from Edmonton):

```php
function tml_schema_service_area(array $cities): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'serviceType' => 'Digital Marketing',
        'provider' => TML_SCHEMA_PROVIDER,
        'areaServed' => array_map(static function ($city) {
            return ['@type' => 'City', 'name' => $city];
        }, $cities),
    ];
}
```

---

## 4. On-Page "Near Me" Content Signals

### 4.1 Add "Near Me" FAQ to Every Location-Service Page

Add 2-3 "near me" specific FAQs to the generated FAQ array in `views/location-service.php`:

```php
$nearMeFaqs = [
    [
        'q' => 'How do I find a ' . strtolower($serviceName) . ' agency near me in ' . $cityName . '?',
        'a' => 'TML Agency serves ' . $cityName . ' and the surrounding ' . (string) $location['region'] . ' area. Search "' . strtolower($serviceName) . ' near me" and you\'ll find us ranking for ' . $cityName . ' businesses. Contact us at hello@townmedialabs.ca for a free consultation.',
    ],
    [
        'q' => 'Is TML the best ' . strtolower($serviceName) . ' company near me?',
        'a' => 'TML Agency has served 1,000+ brands across Canada. For ' . $cityName . ' businesses, we provide local market expertise combined with national-scale capabilities in ' . strtolower($serviceName) . '.',
    ],
];
```

### 4.2 Add Location Signals in Page Body Content

Each location-service page should include (in the template):

1. **City + Province in H1** (already done: "Best {Service} Agency in {City}")
2. **Region mention in intro paragraph**: Reference the `region` field from locations.json (e.g., "serving Edmonton, St. Albert, Sherwood Park, and the greater Edmonton metropolitan area")
3. **Landmarks/neighborhoods section**: Use the `landmarks` array -- "Our {service} clients in {City} include businesses near {landmark1}, {landmark2}, and {landmark3}"
4. **Industries section**: Use the `industries` array -- "We work with {City}'s {industry1}, {industry2}, and {industry3} businesses"
5. **Driving directions or "How to reach us" snippet** for Edmonton (HQ city):
   - "Visit our office at 11930 104 St NW, Edmonton, AB T5G 2K1"
   - For non-Edmonton cities: "We serve {City} remotely from our Edmonton headquarters with regular virtual consultations"

### 4.3 Embed Google Map on Edmonton Pages

For the Edmonton location pages specifically (HQ city), embed a Google Maps iframe:

```html
<iframe
  src="https://www.google.com/maps/embed?pb=!1m18!...YOUR_EMBED_CODE..."
  width="100%" height="300" style="border:0;" allowfullscreen=""
  loading="lazy" referrerpolicy="no-referrer-when-downgrade"
  title="TML Agency Edmonton Office Location">
</iframe>
```

This strengthens the local entity signal for the physical office location.

---

## 5. Google Business Profile (GBP) Optimization Checklist

### 5.1 Profile Completeness
- [ ] Verify business name is exactly "TML Agency" (match schema and NAP)
- [ ] Set primary category to "Marketing Agency"
- [ ] Add secondary categories: "SEO Agency", "Web Design Agency", "Graphic Designer", "Advertising Agency"
- [ ] Complete business description (750 chars) with target keywords: "digital marketing agency", "SEO services", "web design", "graphic design"
- [ ] Add all service areas (every city in locations.json) under the Service Area settings
- [ ] Set business hours: Mon-Fri 9:00 AM - 6:00 PM (match schema)
- [ ] Add phone number: +1 (403) 604-8692 (match schema exactly)
- [ ] Add website URL: https://townmedialabs.ca
- [ ] Add appointment link: https://townmedialabs.ca/contact
- [ ] Enable messaging

### 5.2 GBP Categories (Mapped to Target Keywords)
| GBP Category | Target "Near Me" Keyword |
|---|---|
| Marketing Agency | marketing agency near me |
| Internet Marketing Service | digital marketing agency near me |
| Search Engine Optimization Service | seo agency near me, seo services near me |
| Web Designer | web design near me, website designer near me |
| Graphic Designer | graphic designers near me |
| Advertising Agency | ad agency near me |

### 5.3 GBP Posts Strategy
- Publish 2-3 Google Posts per week
- Alternate between: Offer posts, Update posts, and Event posts
- Include target city names in post text (rotate through top 10 cities)
- Include CTA button linking to the relevant location-service page
- Use service-specific images (from the `$serviceImageMap` in the codebase)

### 5.4 GBP Photos
- Upload 30+ photos across categories:
  - Logo (1)
  - Cover photo (1)
  - Office interior/exterior (5-10)
  - Team photos (5-10)
  - Work samples / portfolio pieces (10+)
  - Client results / screenshots (5+)
- Add geotag metadata to all photos with Edmonton coordinates
- Rename files with keywords before upload (e.g., `seo-agency-edmonton-office.jpg`)

### 5.5 GBP Products & Services
Add all services as GBP Products with:
- Name matching service page titles
- Description (150-300 chars)
- Price range where applicable
- Link to the corresponding service page on townmedialabs.ca
- Photo for each service

### 5.6 GBP Q&A
- Seed 15-20 questions using the FAQ content from location-service pages
- Focus on "near me" intent questions:
  - "Do you serve businesses outside Edmonton?"
  - "What digital marketing services do you offer near me?"
  - "How much does SEO cost for a local business?"
- Monitor and answer all user-submitted questions within 24 hours

---

## 6. NAP Consistency & Citation Building Strategy

### 6.1 NAP Standard (Use Everywhere, Exactly)

```
TML Agency
11930 104 St NW
Edmonton, AB T5G 2K1
Canada
+1 (403) 604-8692
hello@townmedialabs.ca
https://townmedialabs.ca
```

IMPORTANT: The phone number format must be identical across all citations. Pick one format and never deviate.

### 6.2 Tier 1 -- Core Canadian Directories (Do First)
These are the highest-authority Canadian business directories. Submit within Week 1.

| Directory | URL | DA | Priority |
|---|---|---|---|
| Google Business Profile | google.com/business | 100 | DONE (verify) |
| Bing Places | bingplaces.com | 95 | CRITICAL |
| Apple Maps Connect | mapsconnect.apple.com | 100 | CRITICAL |
| Yelp Canada | yelp.ca | 94 | CRITICAL |
| Yellow Pages Canada | yellowpages.ca | 82 | CRITICAL |
| Canada411 | canada411.ca | 76 | HIGH |
| BBB (Better Business Bureau) | bbb.org | 93 | HIGH |
| Facebook Business | facebook.com | 96 | HIGH |
| LinkedIn Company | linkedin.com | 98 | DONE (verify) |

### 6.3 Tier 2 -- Canadian Business Directories (Week 2-3)

| Directory | URL | Notes |
|---|---|---|
| Canadian Business Directory | canadianbusinessdirectory.ca | General |
| Canpages | canpages.ca | General |
| iBegin | ibegin.com | Local |
| Hotfrog Canada | hotfrog.ca | General |
| Cylex Canada | cylex.ca | General |
| Tupalo | tupalo.com | General |
| Profile Canada | profilecanada.com | General |
| 411.ca | 411.ca | General |
| Kompass Canada | ca.kompass.com | B2B |
| Manta | manta.com | B2B |

### 6.4 Tier 3 -- Industry-Specific Directories (Week 3-4)

| Directory | Notes |
|---|---|
| Clutch.co | Agency reviews platform -- HIGH priority |
| UpCity | Agency directory with reviews |
| DesignRush | Agency directory |
| GoodFirms | Agency directory |
| Agency Spotter | Agency reviews |
| Digital Agency Network | Digital marketing specific |
| SEO Tribunal | SEO-specific directory |
| The Manifest | Agency directory (Clutch sister site) |
| Sortlist | Agency marketplace |
| Bark | Service marketplace |

### 6.5 Tier 4 -- Alberta/Edmonton Local Directories

| Directory | Notes |
|---|---|
| Edmonton Chamber of Commerce | Local authority |
| Alberta Business Directory | Provincial |
| Edmonton Economic Development | Local |
| Explore Edmonton | Tourism/business |
| Alberta Venture | Business publication |
| Edmonton Journal Business Directory | Local media |

### 6.6 Citation Management Rules
1. **Audit existing citations** using BrightLocal, Moz Local, or Whitespark before creating new ones
2. **Fix inconsistencies first** -- any variation in name/address/phone hurts rankings
3. **Claim all existing unclaimed listings** before creating new ones
4. **Use the same business description** (first 150 characters) across all directories
5. **Add photos** to every directory that allows them
6. **Track all citations** in a spreadsheet: URL, date submitted, date live, NAP verified

---

## 7. Review Acquisition Strategy

### 7.1 Review Platforms (Prioritized)
1. **Google Reviews** (most important for "near me" rankings)
2. **Clutch.co** (most important for agency credibility)
3. **Facebook Reviews**
4. **Yelp**
5. **BBB**

### 7.2 Review Generation Tactics

**Systematic Ask Process:**
1. After every project milestone or completion, send a personalized review request email
2. Include a direct link to the Google Review page (use the short URL from GBP)
3. Follow up once after 7 days if no review submitted
4. Never offer incentives for reviews (violates Google policy)

**Email Template Sequence:**
- Day 0 (project complete): Thank-you email with subtle review mention
- Day 3: Direct review request with Google link
- Day 10: Gentle follow-up if no review

**Target Metrics:**
- Current baseline: Audit existing Google review count (unknown)
- Goal: 50+ Google reviews within 6 months
- Ongoing: 4-6 new reviews per month
- Maintain 4.5+ star average

### 7.3 Review Response Protocol
- Respond to ALL reviews within 24 hours
- Positive reviews: Thank by name, reference specific project/service, mention city
- Negative reviews: Acknowledge, offer to resolve offline, provide contact info
- Include keywords naturally: "Thank you for choosing TML Agency for your {service} needs in {city}"

### 7.4 Review Schema Integration
Once you have 10+ Google reviews, add `aggregateRating` to the LocalBusiness schema (see Section 3.2 above). This enables review stars in search results.

---

## 8. Local Content Signal Additions

### 8.1 Location Page Content Enhancements

For each location-service page, add the following content blocks to the template (`views/location-service.php` and `templates/location-service-scalable.php`):

**Block 1: "Why {City} Businesses Choose TML"**
- Use the `uniqueContent` array from locations.json (already exists, verify it renders)
- Reference 2-3 entries from the `landmarks` array
- Mention 3-4 entries from the `industries` array

**Block 2: "{City} Market Overview"**
- Brief paragraph about the local business landscape
- Reference the `region` field to mention surrounding areas
- Natural inclusion of "near me" phrasing: "Businesses searching for {service} near me in {city} find that..."

**Block 3: "Serving the Greater {Region} Area"**
- List surrounding cities/neighborhoods from the `region` field
- Creates relevance for "near me" searches from adjacent areas
- Example: "TML serves SEO clients across Edmonton, St. Albert, Sherwood Park, and the greater Edmonton metropolitan area"

### 8.2 Blog Content Strategy for "Near Me" Keywords

Create city-specific blog posts targeting the low-KD "near me" keywords:

**Tier 1 posts (target "seo agency near me" and "seo services near me"):**
- "How to Choose the Best SEO Agency Near You in [City] (2026 Guide)"
- "SEO Services Near Me: What [City] Businesses Should Look For"
- "Local SEO vs National SEO: What [City] Businesses Need"
- Write for top 10 cities first (Edmonton, Calgary, Toronto, Vancouver, Montreal, Ottawa, Winnipeg, Halifax, Hamilton, Mississauga)

**Tier 2 posts (target "marketing agency near me", "digital marketing agency near me"):**
- "Finding a Digital Marketing Agency Near Me in [City]: The Complete Guide"
- "Top Marketing Services Every [City] Business Needs in 2026"

**Tier 3 posts (target "web design near me", "graphic designers near me"):**
- "Web Design Near Me: What [City] Small Businesses Should Expect"
- "Graphic Design Services in [City]: Pricing, Portfolio, and What to Look For"

### 8.3 Internal Linking Improvements

Add internal links between related location-service pages to build topical clusters:

1. Each city's SEO page should link to that city's web-design, google-ads, and social-media pages
2. Each service page should link to the top 5 city variants
3. Blog posts about "near me" topics should link to the corresponding location-service page
4. Add a "Nearby cities we serve" section at the bottom of each location page linking to adjacent city pages

---

## 9. Implementation Roadmap

### Week 1: Schema Fixes (CRITICAL)
- [ ] Add lat/lng coordinates to all 62 cities in `data/locations.json`
- [ ] Update `tml_schema_local_business` to use dynamic geo coordinates
- [ ] Remove hardcoded postal code; only include for Edmonton pages
- [ ] Add `@id`, `image`, `logo`, `priceRange`, `email`, `sameAs` to LocalBusiness schema
- [ ] Add `areaServed` to LocalBusiness schema
- [ ] Verify schema with Google Rich Results Test on 5 sample pages

### Week 2: GBP Optimization
- [ ] Audit current GBP profile completeness
- [ ] Add all secondary categories
- [ ] Add all service areas
- [ ] Upload 30+ geotagged photos
- [ ] Add all services as GBP Products
- [ ] Seed 15 Q&A entries
- [ ] Begin GBP posting schedule (3x/week)

### Week 3-4: Citation Building
- [ ] Audit existing citations with Whitespark or BrightLocal
- [ ] Fix any NAP inconsistencies found
- [ ] Submit to all Tier 1 directories
- [ ] Submit to all Tier 2 directories
- [ ] Submit to 5+ industry-specific directories

### Week 5-6: On-Page Content
- [ ] Add "near me" FAQs to location-service template
- [ ] Add region/landmarks/industries content blocks to template
- [ ] Embed Google Map on Edmonton-specific pages
- [ ] Add "Serving the Greater {Region} Area" section
- [ ] Publish first 5 "near me" blog posts for top cities

### Week 7-8: Reviews & Internal Linking
- [ ] Set up review request email sequence
- [ ] Send review requests to 20 most recent/happiest clients
- [ ] Implement cross-linking between location pages
- [ ] Add "Nearby cities" section to location pages

### Ongoing (Monthly)
- [ ] 3 GBP posts per week
- [ ] 4-6 new Google reviews per month
- [ ] 2-4 new city-specific blog posts per month
- [ ] Monitor citation accuracy quarterly
- [ ] Track "near me" rankings for all 11 keywords weekly

---

## 10. Tracking & KPIs

| Metric | Baseline | 3-Month Target | 6-Month Target |
|---|---|---|---|
| Google Reviews | Audit needed | 25+ | 50+ |
| GBP Profile Score | Audit needed | 95%+ | 100% |
| Citations (accurate) | Audit needed | 30+ | 50+ |
| "seo agency near me" rank | Not ranking | Top 20 | Top 10 |
| "seo services near me" rank | Not ranking | Top 20 | Top 10 |
| "marketing agency near me" rank | Not ranking | Top 30 | Top 15 |
| Local pack appearances | Audit needed | 5+ keywords | 8+ keywords |
| Organic traffic from "near me" queries | 0 | 100+/mo | 500+/mo |

---

## Key Files to Modify

| File | Change |
|---|---|
| `data/locations.json` | Add `lat`, `lng` per city |
| `includes/schema.php` | Upgrade `tml_schema_local_business`; add `tml_schema_service_area` |
| `views/location-service.php` | Pass lat/lng/rating to schema; add "near me" FAQs; add region content blocks |
| `templates/location-service-scalable.php` | Mirror the same changes for scalable template |
| 64 `views/seo-in-*.php` files | Ensure schema uses correct per-city geo coordinates |
