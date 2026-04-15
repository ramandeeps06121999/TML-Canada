# Page Audit: Digital Marketing in Toronto

**URL:** `/services/seo-in-toronto`
**Audit Date:** 2026-04-14
**Template:** `views/location-service.php` (dynamic, data-driven)
**Enrichment Key:** `seo-in-toronto` (in `data/enrichments.json`)
**Location Data Key:** `toronto` (in `data/locations.json`)
**Service Data Key:** `seo` (in `data/servicePages.json`)

---

## Target Keywords

| Keyword | Monthly Volume | KD | Currently Targeted? |
|---------|---------------|-----|---------------------|
| digital marketing agency toronto | 1,900 | 65 | NO |
| digital marketing company toronto | 1,300 | 41 | NO |
| marketing agencies toronto | 880 | 35 | NO |
| toronto internet marketing company | 390 | 56 | NO |

---

## CRITICAL FINDING: No Dedicated Page Exists

There is **no "digital-marketing" service** in `servicePages.json`. The 39 service slugs do not include `digital-marketing`. The URL `/services/digital-marketing` is configured as a **301 redirect to `/services/seo`** (see `index.php` line 107).

Consequently, there is no `/services/digital-marketing-in-toronto` page. The URL would **404** because:
1. The router parses `digital-marketing-in-toronto` as `serviceSlug = "digital-marketing"`, `locationSlug = "toronto"`
2. `servicePages["digital-marketing"]` does not exist
3. The check on line 43 of `index.php` fails, serving the 404 page

The keyword mapping document (`seo-analysis/keywords/02-keyword-url-mapping.md`, line 33) currently maps "digital marketing agency toronto" (1,900 vol) to `/services/seo-in-toronto` as a workaround.

---

## Current State: SEO-in-Toronto Page Analysis

Since all four target keywords are being funneled to `/services/seo-in-toronto`, here is how that page performs against them:

### Title Tag
- **Current:** `Best SEO in Toronto | TML Agency`
- **Character Count:** 37
- **Issue:** Does NOT contain "digital marketing" anywhere. Zero keyword coverage for all four target terms.
- **Recommendation:** Either create a dedicated page or rework the title to: `Best Digital Marketing & SEO Agency in Toronto | TML` (52 chars)

### Meta Description
- **Current:** `TML is Toronto's trusted seo agency. We help businesses across Ontario grow with data-driven strategies. Contact us today.`
- **Character Count:** 120
- **Issue:** No mention of "digital marketing", "marketing agency", or "internet marketing". Lowercase "seo" is a minor quality issue.
- **Recommendation:** `Toronto's trusted digital marketing agency. SEO, PPC, social media & content marketing for Ontario businesses. Free consultation.` (131 chars)

### H1 Tag
- **Current:** `Best SEO in Toronto` (split across two lines via template: "Best SEO" + "in Toronto")
- **Issue:** No "digital marketing" in H1. All four target keywords are completely unaddressed.
- **Recommendation:** If retaining single page: `Best Digital Marketing Agency in Toronto`

### Meta Keywords
- **Current enrichment keywords:** `seo Toronto`, `seo agency Toronto`, `best seo Toronto`, `seo company Ontario`, `TML Agency Toronto`, `Toronto seo services`
- **Issue:** All six keywords are SEO-specific. None of the four target digital marketing keywords appear.

---

## Content Analysis

### Hero Section
- **Badge:** "Toronto's Trusted SEO Partner"
- **Tagline:** References search experiences, not digital marketing broadly
- **Hero Description:** "Ready to dominate seo in Toronto?" -- narrowly scoped to SEO
- **Issue:** A searcher for "digital marketing agency toronto" would find no relevance signal in the above-the-fold content

### Local Content Section
- **Source:** `enrichment['localContent']` -- a single string (not array) with 3 paragraphs
- **Content:** Mentions "seo" repeatedly, references Toronto's economy (finance, tech, media, real estate)
- **Issue:** "Digital marketing" does not appear once in localContent. The phrase "internet marketing" does not appear either.

### Unique Content (from locations.json)
The three `uniqueContent` paragraphs for Toronto do mention "digital marketing" in paragraphs 1 and 3:
- "TML Agency brings an outside-the-echo-chamber perspective...offering Toronto businesses data-driven SEO, paid media, and branding strategies"
- "TML Agency delivers the digital infrastructure -- from technical SEO to conversion-optimized landing pages"
- However: The phrase "digital marketing agency" or "digital marketing company" does not appear as an exact match

### SEO Content Block (`serviceSeoContent.json["seo"]`)
- Focuses entirely on SEO services (Technical SEO, On-Page SEO, Content Strategy, Link Building, Local SEO, SEO Audits)
- No coverage of broader digital marketing services like PPC, social media, email marketing

### FAQ Section
- 5 custom FAQs from enrichment, all SEO-focused
- No FAQ addresses "digital marketing" or "internet marketing"

### Word Count Estimate
- Template generates substantial content (local content, unique content, SEO content block, FAQs, features, process steps)
- Estimated 2,500-3,000 words rendered
- But keyword relevance for "digital marketing" is near zero

---

## Local Signals Assessment

### Positive
- City name "Toronto" appears in title, H1, meta, hero, breadcrumbs, schema, FAQ, and body content
- `locations.json` provides Toronto-specific landmarks: CN Tower, Distillery District, Kensington Market, Bay Street Financial District, Harbourfront Centre
- Industries listed: finance, tech, media & entertainment, real estate, healthcare, retail, manufacturing, professional services
- Region coverage: Toronto, Mississauga, Brampton, Vaughan, and the Greater Toronto Area
- LocalBusiness schema includes city and state (Ontario)
- Cross-linking to same service in other cities
- Cross-linking to other services in Toronto

### Negative
- No physical Toronto address in NAP (TML is Edmonton-based)
- `enrichment['localContent']` says "TML's Toronto office" -- this may be inaccurate if there is no actual Toronto office
- `locations.json` does not include lat/long coordinates
- No Google Maps embed or directions link
- No Toronto-specific testimonials (generic "500+ businesses" placeholder quote)

---

## Schema Markup

- **ServiceSchema:** `name: "SEO in Toronto"` -- does not mention digital marketing
- **LocalBusinessSchema:** `name: "TML Agency - Toronto"`, `description: "Leading seo agency in Toronto, Ontario."`
- **BreadcrumbSchema:** Home > Services > SEO > Toronto
- **FAQSchema:** 5 SEO-specific Q&As
- **Issue:** Service name in schema is "SEO", not "Digital Marketing". Google's understanding of the page will be narrowly SEO.

---

## Recommendations

### Option A: Create a Dedicated Digital Marketing Service Page (Recommended)

1. **Add `"digital-marketing"` to `servicePages.json`** with:
   - Title: "Digital Marketing"
   - Features: SEO, PPC/Google Ads, Social Media Marketing, Content Marketing, Email Marketing, Conversion Optimization
   - Stats: umbrella metrics across all channels
   - PricingNote: comprehensive digital marketing packages

2. **Remove the redirect** from `index.php` line 107 (`'services/digital-marketing' => '/services/seo'`)

3. **Add enrichment for `digital-marketing-in-toronto`** to `enrichments.json`:
   - `h1`: "Best Digital Marketing Agency in Toronto"
   - `metaTitle`: "Digital Marketing Agency Toronto | Top-Rated | TML" (49 chars)
   - `metaDescription`: "Award-winning digital marketing company in Toronto. SEO, PPC, social media & content marketing that drives revenue. Free strategy session." (139 chars)
   - `keywords`: all four target keywords plus variants
   - Custom FAQs addressing "digital marketing company vs agency", pricing, services included

4. **Estimated keyword coverage:**
   - digital marketing agency toronto (1,900) -- title, H1, body
   - digital marketing company toronto (1,300) -- meta desc, body, FAQ
   - marketing agencies toronto (880) -- body copy, schema
   - toronto internet marketing company (390) -- FAQ, body copy

### Option B: Expand the SEO-in-Toronto Page (Quick Fix)

If creating a new service is too large a change:

1. **Update `seo-in-toronto` enrichment:**
   - `metaTitle`: "Best SEO & Digital Marketing Agency in Toronto | TML" (52 chars)
   - `metaDescription`: "Toronto's top digital marketing company. Expert SEO, PPC & content marketing strategies. 500+ clients across Ontario. Free consultation."
   - `h1`: "Best SEO & Digital Marketing Agency in Toronto"

2. **Add target keywords to enrichment `keywords` array:**
   - "digital marketing agency toronto"
   - "digital marketing company toronto"
   - "marketing agencies toronto"
   - "toronto internet marketing company"

3. **Rewrite `localContent`** to include "digital marketing" phrasing naturally 3-5 times

4. **Add FAQ entries:**
   - "What digital marketing services do you offer in Toronto?"
   - "How do I choose a digital marketing company in Toronto?"

**Limitation:** This approach forces one page to rank for both "seo toronto" (2,900 vol) and "digital marketing agency toronto" (1,900 vol), which have different search intents. Dedicated pages would perform better.

### Option C: Content Marketing Support (Both Options)

Regardless of page strategy, create supporting blog content:
- "How to Choose a Digital Marketing Agency in Toronto (2026 Guide)" -- target long-tail variants
- "Toronto Digital Marketing Trends: What Local Businesses Need to Know" -- topical authority
- Internal link these to whichever page targets the digital marketing keywords

---

## Priority Actions

| Priority | Action | Impact | Effort |
|----------|--------|--------|--------|
| P0 | Fix `/services/digital-marketing-in-toronto` 404 -- currently broken URL | High | Low |
| P1 | Create `digital-marketing` service in `servicePages.json` | High | Medium |
| P1 | Add `digital-marketing-in-toronto` enrichment | High | Medium |
| P1 | Remove line 107 redirect in `index.php` | High | Trivial |
| P2 | Add Toronto-specific digital marketing FAQs | Medium | Low |
| P2 | Create supporting blog content | Medium | Medium |
| P3 | Add Toronto testimonial (real client quote) | Low | Low |
| P3 | Add lat/long to Toronto location data | Low | Trivial |

---

## Score Summary

| Category | Score | Notes |
|----------|-------|-------|
| Target Keyword Coverage | 1/10 | None of the 4 target keywords appear in title, H1, or meta |
| Title Tag Optimization | 3/10 | Good for "SEO Toronto", zero for digital marketing keywords |
| Meta Description | 3/10 | Decent CTA but wrong keyword focus |
| H1 Tag | 3/10 | Clean H1 but wrong topic for target keywords |
| Content Relevance | 2/10 | 3,000 words of SEO content, near-zero digital marketing relevance |
| Local Signals | 7/10 | Strong Toronto signals, landmarks, industries, schema |
| Schema Markup | 6/10 | Four schema types present but all SEO-branded |
| Internal Linking | 6/10 | Cross-city and cross-service links working well |
| User Experience | 7/10 | Clean template, clear CTAs, visual hierarchy |
| **Overall** | **3.5/10** | Page does not target any of the 4 keywords; needs new page or major rework |

---

## Files Referenced

- `index.php` -- routing, line 107 has digital-marketing redirect
- `views/location-service.php` -- template rendering all location-service pages
- `includes/helpers.php` -- URL parsing logic
- `data/servicePages.json` -- no `digital-marketing` service exists
- `data/locations.json` -- Toronto entry at key `toronto`
- `data/enrichments.json` -- `seo-in-toronto` enrichment (no `digital-marketing-in-toronto`)
- `data/serviceSeoContent.json` -- `seo` block only covers SEO services
- `seo-analysis/keywords/02-keyword-url-mapping.md` -- confirms keyword-to-URL mapping gap
