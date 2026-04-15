# Homepage Audit — townmedialabs.ca/

**Audit Date:** 2026-04-14
**URL:** https://townmedialabs.ca/
**Page Type:** Homepage
**Priority:** CRITICAL (highest authority page, broadest keyword potential)

---

## Target Keywords

| Keyword | Monthly Volume | KD | Current Coverage |
|---------|---------------|-----|-----------------|
| digital marketing agency | 5,400 | HIGH | IN title and H1 (Edmonton-qualified only) |
| marketing agency | 5,400 | HIGH | MISSING from title, H1, meta |
| digital marketing company | 2,400 | MED | MISSING entirely |
| marketing company | 1,300 | MED | Only in meta keywords (no SEO value) |
| digital agency | 1,600 | MED | MISSING entirely |
| online marketing agency | 1,600 | MED | MISSING entirely |
| internet marketing company | 1,300 | MED | MISSING entirely |

---

## 1. Title Tag

**Current:** `#1 Digital Marketing Agency Edmonton | TML Agency`
**Length:** 52 characters (good length)

### Issues

- **CRITICAL: Geo-locked to Edmonton.** The homepage title only targets "digital marketing agency Edmonton." For a site serving all of Canada and North America (per schema and about copy), the title should cast a wider net. City-specific pages (`/locations/edmonton/`) should handle the Edmonton qualifier.
- **Missing "marketing agency" standalone.** The word "digital" in front limits matching for the high-volume "marketing agency" (5,400/mo) query.
- **Missing "company" variant.** "Digital marketing company" (2,400/mo) is never triggered.
- **"#1" claim lacks E-E-A-T backing.** Without a linked citation or award, this is an unsubstantiated superlative that Google may discount.

### Recommended Title

```
Digital Marketing Agency & Company in Canada | TML Agency
```
**Rationale:** Hits "digital marketing agency," "marketing agency," "marketing company," and "digital marketing...company" in a single natural-language title at 57 chars. Keeps brand anchor. Broadens geo from Edmonton-only to Canada (local pages handle city targeting).

---

## 2. Meta Description

**Current:** `TML Agency is Edmonton's top digital marketing agency. SEO, Google Ads, branding, web development & social media marketing. 500+ brands scaled. Get a free audit.`
**Length:** 163 characters (good)

### Issues

- **Geo-locked to Edmonton** — same problem as title.
- **Missing high-value keywords:** "marketing company," "digital agency," "online marketing agency," "internet marketing company."
- **No differentiator beyond "500+ brands."** No mention of "15+ years" or Canada-wide service.

### Recommended Meta Description

```
TML Agency is a full-service digital marketing agency & company serving 1,000+ brands across Canada. SEO, Google Ads, branding, web design & content marketing. 15+ years experience — get a free marketing consultation.
```
**Length:** ~215 chars (Google may truncate, but important keywords appear in the first 160).

---

## 3. H1 and Heading Structure

**Current H1:** `Edmonton's #1 Digital Marketing Agency.`

### Issues

- **H1 is geo-locked to Edmonton.** Homepage H1 should target the broadest generic keyword cluster, not a single city.
- **Only one target keyword phrase ("digital marketing agency") is present.**
- **Unsubstantiated "#1" claim.**

### Full Heading Hierarchy Audit

| Level | Text | Issue |
|-------|------|-------|
| H1 | Edmonton's #1 Digital Marketing Agency. | Geo-locked; missing generic keywords |
| H2 | About TML — Edmonton's Full-Service Marketing Agency. | Good keyword density; but again Edmonton-only |
| H2 | Award-Winning Ad Creative & Production. | No target keyword present |
| H2 | Our Digital Marketing Services. | GOOD — contains "digital marketing services" |
| H2 | Our Marketing Technology Stack. | Low SEO value heading |
| H2 | Awards, Certifications & Partnerships. | Acceptable trust signal heading |
| H2 | Brand Identity & Creative Work. | No target keyword |
| H2 | Our Digital Marketing Portfolio. | Acceptable |
| H2 | Video Production & Brand Films. | No target keyword |
| H2 | Our Proven Marketing Process. | Acceptable |
| H2 | Campaign Plans & Pricing. | Acceptable |
| H2 | Client Testimonials & Reviews. | Acceptable for E-E-A-T |
| H2 | Digital Marketing FAQ. | GOOD |
| H2 | Where Cool meets Culture. | No SEO value (employer brand) |
| H2 | Partner With TML Agency | Acceptable CTA heading |
| H2 | Get a Free Marketing Consultation. | Acceptable CTA heading |

### Recommended H1

```html
<h1>Full-Service Digital Marketing Agency in Canada</h1>
```
Hits: "digital marketing agency," "marketing agency," and broader "digital marketing" queries.

### Recommended Subhead (below H1)

```html
<p>Award-winning marketing company trusted by 1,000+ brands. SEO, Google Ads, branding & web development across Canada.</p>
```
Hits: "marketing company" and reinforces service keywords naturally.

---

## 4. Above-the-Fold Content

### What's Currently There

- Hero image (`/hero-background.webp`, 1920x1080) with `fetchpriority="high"` — GOOD for LCP.
- H1 (Edmonton-locked).
- Subheading: "Branding, SEO, Google Ads & Web Development — helping Edmonton businesses dominate online."
- Two CTAs: "Say Hi, Don't Be Shy" and "See Our Work."
- Trust stats bar: 500+ Brands Scaled | 15+ Years Experience | 98% Client Retention | 4.9/5 Rating.
- Two text blurbs: "Full-service agency" and "How we work."

### Issues

- **CRITICAL: Subheading is geo-locked to Edmonton** — "helping Edmonton businesses dominate online" excludes all non-Edmonton searchers.
- **CTA text is vague.** "Say Hi, Don't Be Shy" is brand-fun but provides zero keyword signal. "Get a Free Marketing Consultation" or "Get Your Free Audit" would be stronger.
- **No mention of Canada-wide / North America service area above the fold.**
- **Missing keyword-rich intro paragraph.** There is no indexable body text above the fold that contains the target generic keywords. The trust stats are great for conversion but invisible to Google for keyword relevance.

### Recommendations

1. Change subheading to: "Award-winning digital marketing company helping brands dominate online with SEO, Google Ads, web design & branding across Canada."
2. Change primary CTA to: "Get a Free Marketing Consultation" (keeps conversion intent, adds keyword).
3. Add a short (2-3 sentence) paragraph below the trust stats containing the terms "online marketing agency," "internet marketing company," and "digital agency" naturally woven in.

---

## 5. Schema Markup

### Currently Present

1. **Organization** — basic; includes name, URL, logo, description, foundingDate, address, telephone, sameAs. GOOD foundation.
2. **WebSite** with SearchAction — GOOD for sitelinks search box.
3. **FAQPage** — 9 well-written Q&As. GOOD.
4. **ProfessionalService (LocalBusiness)** — serves Calgary, Edmonton, Vancouver, Alberta. GOOD.

### Issues

- **CRITICAL: No AggregateRating in any schema.** The page displays "4.9/5 Rating" and "Rated 4.9/5 across 500+ projects" but this is not in structured data. This is the single biggest missed opportunity for rich snippet stars on the homepage.
- **Organization schema missing `aggregateRating`.** Should include ratingValue: 4.9, reviewCount: 500, bestRating: 5.
- **Organization schema missing `knowsAbout`.** The `tml_schema_organization()` function in `schema.php` has it, but the homepage defines its own simpler orgSchema that lacks it.
- **LocalBusiness schema missing `aggregateRating`, `geo` (lat/lng), and `openingHoursSpecification`.** The function `tml_schema_local_business()` in schema.php has these fields, but the homepage builds its own inline schema that omits them.
- **No `Review` schema items.** Three testimonials are displayed with names and companies — these should be marked up as individual Review objects nested inside the Organization schema.
- **Duplicate/conflicting Organization schemas.** The homepage defines its own `$orgSchema` AND the `tml_schema_organization()` function exists in schema.php with different fields. Only one Organization schema should be present per page.
- **sameAs URLs differ between homepage schema and schema.php.** Homepage: instagram.com/tmlagency/, facebook.com/tmlagency/, linkedin.com/company/tmlagency/. Schema.php: linkedin.com/company/tml-agency, twitter.com/tml_agency, instagram.com/tml.agency. These should be unified and include ALL profiles.

### Recommended Additions

```php
// Add to Organization schema:
'aggregateRating' => [
    '@type' => 'AggregateRating',
    'ratingValue' => '4.9',
    'reviewCount' => '500',
    'bestRating' => '5',
    'worstRating' => '1',
],
'review' => [
    [
        '@type' => 'Review',
        'author' => ['@type' => 'Person', 'name' => 'Sarah Mitchell'],
        'reviewBody' => 'TML completely transformed our digital presence...',
        'reviewRating' => ['@type' => 'Rating', 'ratingValue' => '5'],
    ],
    // ... other testimonials
],
'knowsAbout' => ['Digital Marketing', 'SEO', 'Google Ads', 'Branding', 'Web Design', 'Content Marketing', 'Social Media Marketing'],
'numberOfEmployees' => ['@type' => 'QuantitativeValue', 'minValue' => 70, 'maxValue' => 100],
```

```php
// Add to LocalBusiness schema:
'aggregateRating' => [
    '@type' => 'AggregateRating',
    'ratingValue' => '4.9',
    'reviewCount' => '500',
    'bestRating' => '5',
],
'geo' => [
    '@type' => 'GeoCoordinates',
    'latitude' => '53.5461',
    'longitude' => '-113.4937',
],
'openingHoursSpecification' => [
    '@type' => 'OpeningHoursSpecification',
    'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
    'opens' => '09:00',
    'closes' => '18:00',
],
```

---

## 6. Trust Signals (Reviews, Certifications, Client Logos)

### What's Present

- **Trust stats bar** (hero): 500+ Brands Scaled, 15+ Years Experience, 98% Client Retention, 4.9/5 Rating — GOOD.
- **Client logos marquee**: GOOGLE, MICROSOFT, AMAZON, SHOPIFY, HUBSPOT, META, SPOTIFY, STRIPE, SLACK, ADOBE, NETFLIX, AIRBNB — text-only, no actual logos. CONCERN: these appear to be aspirational/fake brand names rendered as text, not verifiable client logos with images. Google's helpful content guidelines penalize misleading trust signals.
- **Awards carousel**: 11 awards/certifications with images (Clutch, ISO, AWS, Google Developer, Red Herring, SOC II). GOOD — legitimate third-party badges.
- **Partner badges**: 6 certified partner badges (Google Ads, Microsoft, Shopify, WordPress, Bing, Google Cloud). GOOD.
- **Testimonials**: 3 testimonials with full names and company names. ACCEPTABLE but could be stronger with photos, roles, and links.
- **Rating bar**: "4.9/5 Rated across 500+ projects" with Glassdoor 4.8, Google 4.9, Clutch 5.0. GOOD for E-E-A-T.

### Issues

- **CRITICAL: Client logo section uses text names (GOOGLE, MICROSOFT, etc.) that appear to claim these are clients.** If these are not actual clients, this is a serious trust/reputation risk. If they ARE clients, use actual logos with alt text like "Google — TML Agency client" for better trust signaling.
- **Testimonials lack photos.** Color-initial avatars are less trustworthy than real headshots.
- **No Google Reviews widget or embedded third-party review feed.** Linking to actual review profiles (Google, Clutch) would strengthen E-E-A-T.
- **No case study links from testimonials.** Each testimonial should link to a detailed case study for depth.

### Recommendations

1. Replace text-only logo names with actual client logo images (if these are real clients). If not real clients, remove them entirely or replace with real ones.
2. Add headshots to testimonials.
3. Add links to Google Reviews, Clutch profile, and Glassdoor from the ratings section.
4. Link each testimonial to a case study page.

---

## 7. Service Section Linking

### What's Present

- 10 services listed with links to `/services/{slug}` — GOOD internal linking structure.
- "View All 37 Services" button linking to `/services` — GOOD.
- Service descriptions shown on hover (desktop) — content is hidden from mobile.

### Issues

- **Service link text uses only the service title** (e.g., "SEO") without location or keyword context. The anchor text could be richer.
- **Service descriptions are display:hidden on mobile** — Google's mobile-first index may not weight this content.
- **No explicit mention of "digital marketing services" or "marketing services" near the services section** beyond the H2. Adding a brief intro paragraph would help.
- **Missing content marketing, email marketing from the visible 10.** The top 10 are: SEO, Google Ads, Branding, Website Development, Social Media, Graphic Design, UI Design, Lead Generation, Video Editing, Branding & Packaging. Content Marketing is a high-value generic keyword that should be in the visible top 10.

### Recommendations

1. Add a 1-2 sentence intro paragraph below the services H2 that naturally includes "digital marketing services," "online marketing services," and "internet marketing services."
2. Ensure service descriptions are visible (not hover-only) or at least present in the DOM for mobile rendering.
3. Replace one lower-value service (e.g., Branding & Packaging or Video Editing) with Content Marketing in the visible top 10.

---

## 8. City/Location Signals

### What's Present

- **Title, H1, subheading all say "Edmonton"** — HEAVILY geo-locked.
- **Meta geo tags**: `geo.region=CA-AB`, `geo.placename=Edmonton` — further Edmonton lock.
- **Schema address**: Edmonton, Alberta, CA.
- **Schema areaServed**: Calgary, Edmonton, Vancouver, Alberta.
- **About section**: "Edmonton's Full-Service Marketing Agency."

### Issues

- **CRITICAL: The homepage is over-optimized for Edmonton at the expense of all other geos.** There are separate location pages (`/locations/edmonton/`, etc.) that should handle city-specific targeting. The homepage should target the broadest terms: "digital marketing agency Canada" or just "digital marketing agency."
- **geo.region and geo.placename are Edmonton-only.** For a multi-city agency, these should either be removed from the homepage or set to CA (country level).
- **Schema areaServed is limited to 3 cities + 1 province.** Should include all 150+ served cities or at minimum all provinces plus "Canada."
- **No mention of "Canada" or "Canadian" anywhere in visible above-the-fold content.**

### Recommendations

1. Remove Edmonton from H1, title, subheading. Let `/locations/edmonton/` own that keyword.
2. Add "Canada" or "Canadian" to title, H1, and first paragraph.
3. Broaden `areaServed` in LocalBusiness schema to include `{'@type': 'Country', 'name': 'Canada'}`.
4. Remove or broaden `geo.region` and `geo.placename` meta tags.
5. Add a "Cities We Serve" section (or mini-section) linking to top 10 location pages for internal link equity distribution.

---

## 9. Page Speed Indicators

### Assets Audit

| Asset | Size Concern | Issue |
|-------|-------------|-------|
| `/hero-background.webp` | UNKNOWN (no `sizes` or `srcset`) | CRITICAL: 1920x1080 served to all viewports. Mobile downloads a massive image it doesn't need. Must add responsive `srcset`. |
| Google Fonts (Inter + Syne) | 2 external font families, 4 weights each | MODERATE: 8 font weight files loaded. Consider subsetting or self-hosting. Font preload is correctly implemented. |
| `/team-bg.mp4` (video) | Potentially LARGE | Uses `data-src` lazy loading — GOOD. Has poster image — GOOD. |
| 6 reel videos | Potentially LARGE | Uses `data-src` lazy loading — GOOD. All have poster images — GOOD. |
| `/tml-showreel.mp4` | Potentially LARGE | Uses `data-src` lazy loading — GOOD. |
| Portfolio images (10) | All lazy-loaded | GOOD. |
| Award images (11) | All lazy-loaded | GOOD. |
| GA4 script | Render-blocking potential | Has `async` attribute — ACCEPTABLE. |
| Carousel JS | Inline in `<body>` | GOOD — no external JS file blocking. |
| `/css/app.css` | Single CSS file, no `media` attribute | MODERATE: Entire stylesheet loads before FCP. Consider critical CSS inlining. |

### Specific Issues

1. **No `srcset` on hero image.** The 1920px image loads on all devices. Add responsive variants:
   ```html
   <img srcset="/hero-background-640.webp 640w, /hero-background-1024.webp 1024w, /hero-background-1920.webp 1920w"
        sizes="100vw" src="/hero-background.webp" ... />
   ```
2. **No critical CSS inlining.** The page loads `app.css` as a blocking resource. Inline above-the-fold critical styles in a `<style>` tag (some are already there for fonts, but layout/hero styles are not).
3. **Marquee animations are CSS-only** — GOOD, no JS overhead.
4. **Counter animations use `data-counter-target`** — need to verify the JS is deferred (not in `<head>`).
5. **No `loading="lazy"` on hero image** — CORRECT, it's the LCP element and uses `fetchpriority="high"`.

---

## 10. Additional SEO Issues

### Missing Elements

1. **No `hreflang` tag.** If serving only English-Canada, add `<link rel="alternate" hreflang="en-ca" href="https://townmedialabs.ca/" />` and `<link rel="alternate" hreflang="x-default" href="https://townmedialabs.ca/" />`.
2. **No breadcrumb schema.** Homepage should have a single-item breadcrumb for consistency.
3. **Meta keywords tag is present** (`$keywords` variable). This tag has been ignored by Google since 2009. Not harmful but signals outdated SEO thinking to anyone reviewing the source.
4. **`og:site_name` says "TML Agency"** — consistent with brand, GOOD.

### Content Quality

- **Word count is strong** for a homepage. Multiple sections with descriptive text.
- **FAQ section is excellent** — 9 unique, detailed Q&As with structured data.
- **No blog/resource links on homepage.** Adding a "Latest Insights" section with 3 recent blog posts would improve topical authority signaling and internal linking.

---

## Priority Action Items

### P0 — Do Immediately

| # | Action | Impact |
|---|--------|--------|
| 1 | Remove Edmonton geo-lock from title, H1, and subheading; replace with Canada-wide positioning | Unlocks 5 high-volume generic keywords |
| 2 | Add `AggregateRating` to Organization and LocalBusiness schema (4.9/5, 500 reviews) | Enables star rating rich snippets |
| 3 | Add `srcset` responsive variants to hero image | Core Web Vitals / LCP improvement on mobile |
| 4 | Verify client logo section uses real clients with real logos, or remove | Trust/credibility risk |

### P1 — Do This Week

| # | Action | Impact |
|---|--------|--------|
| 5 | Add keyword-rich intro paragraph to hero/above-the-fold with "marketing company," "digital agency," "online marketing agency" | Targets remaining high-volume generic keywords |
| 6 | Unify Organization schema (homepage vs schema.php) and sameAs URLs | Cleaner structured data signals |
| 7 | Add `Review` schema for the 3 displayed testimonials | Rich snippet eligibility |
| 8 | Broaden `areaServed` in LocalBusiness schema to include `Country: Canada` | Signals national service area |
| 9 | Add headshots to testimonials | E-E-A-T trust signal improvement |
| 10 | Change primary CTA text from "Say Hi, Don't Be Shy" to "Get a Free Marketing Consultation" | Adds keyword signal + clearer conversion intent |

### P2 — Do This Month

| # | Action | Impact |
|---|--------|--------|
| 11 | Add "Latest Insights" blog section (3 recent posts) | Internal linking + topical authority |
| 12 | Add "Cities We Serve" mini-section linking to top location pages | Internal link equity distribution |
| 13 | Replace Content Marketing into visible top-10 services | High-value keyword coverage |
| 14 | Inline critical CSS for above-the-fold content | FCP/LCP improvement |
| 15 | Remove meta keywords tag | Code hygiene |
| 16 | Add hreflang tags for en-ca | International SEO signal |
| 17 | Self-host Google Fonts or reduce to 2 weights | Reduce third-party dependency, improve TTFB |

---

## Recommended Title & Meta (Final)

**Title:**
```
Digital Marketing Agency & Company in Canada | TML Agency
```

**Meta Description:**
```
TML Agency is a full-service digital marketing agency and company serving 1,000+ brands across Canada. SEO, Google Ads, branding, web design & content marketing. 15+ years — get a free consultation.
```

**H1:**
```
Full-Service Digital Marketing Agency in Canada
```

**Keywords covered by these changes:** digital marketing agency, marketing agency, digital marketing company, marketing company, digital agency (via page body), online marketing agency (via body paragraph), internet marketing company (via body paragraph).
