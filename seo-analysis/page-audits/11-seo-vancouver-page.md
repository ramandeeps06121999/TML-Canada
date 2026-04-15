# SEO Page Audit: SEO in Vancouver
**URL:** `/services/seo-in-vancouver`
**Date:** 2026-04-14
**Auditor:** Claude Code Agent

---

## 1. Routing & Template Architecture

The live page is served by the **template-based routing system** in `index.php` -> `views/location-service.php`, which pulls data from:
- `data/locations.json` (city: `vancouver`)
- `data/enrichments.json` (key: `seo-in-vancouver`)

There is also a **legacy standalone file** at `views/seo-in-vancouver.php` that is **NOT used by the live routing system**. This file contains hardcoded Edmonton content (wrong city) and should be deleted or archived to avoid confusion.

---

## 2. Target Keywords

| Keyword | Monthly Volume | KD | Currently Addressed? |
|---------|---------------|-----|---------------------|
| seo vancouver bc | 1,300 | 39 | NO - "bc" / "British Columbia" not in title/H1 |
| seo marketing vancouver | 1,600 | 43 | NO - "marketing" absent from title/H1/meta |
| vancouver seo agency | 1,000 | 39 | PARTIAL - "seo agency" in heroDescription only |
| seo company vancouver | 880 | 41 | NO - "company" absent from all on-page elements |
| search engine optimization vancouver | 880 | 42 | NO - full phrase never appears |
| vancouver search engine optimization | 1,000 | 33 | NO - full phrase never appears |
| digital marketing agency vancouver | 1,000 | 52 | NO - "digital marketing" absent entirely |

**Keyword coverage score: ~1/7 (14%) -- critically underoptimized.**

---

## 3. Title Tag

**Current (from enrichments):**
```
Best SEO in Vancouver | TML Agency
```

**Issues:**
- Missing "BC" or "British Columbia" -- loses "seo vancouver bc" (1,300 vol)
- Missing "Agency" or "Company" modifier -- loses "vancouver seo agency" (1,000 vol) and "seo company vancouver" (880 vol)
- Does not include "search engine optimization" variant
- Title is only 39 chars -- room to expand to ~55-60 chars

**Recommended:**
```
Best SEO Agency in Vancouver, BC | TML Agency
```
(48 chars -- covers "seo agency", "vancouver", "bc")

**Alternative for broader coverage:**
```
Vancouver SEO Agency & Search Engine Optimization | TML
```
(55 chars -- covers "vancouver seo agency", "search engine optimization")

---

## 4. Meta Description

**Current (from enrichments):**
```
TML is Vancouver's trusted seo agency. We help businesses across British Columbia grow with data-driven strategies. Contact us today.
```

**Issues:**
- Only 133 chars -- can expand to ~155 chars
- Missing "search engine optimization" full phrase
- Missing "seo company" variant
- Missing "digital marketing" to capture that keyword cluster
- Generic CTA "Contact us today" wastes space
- Lowercase "seo" (should be "SEO" for readability)

**Recommended:**
```
Vancouver's top-rated SEO company & search engine optimization agency. TML delivers proven SEO marketing results for BC businesses. Free consultation.
```
(151 chars -- covers "seo company vancouver", "search engine optimization", "seo marketing vancouver", "bc")

---

## 5. H1 Tag

**Current (from enrichments, rendered by template):**
```
Best SEO
in Vancouver
```
(Template splits on "in {City}" and renders city in gradient)

**Issues:**
- H1 is "Best SEO in Vancouver" -- very thin, missing modifiers
- No "agency", "company", "services", or "search engine optimization" variant
- Does not differentiate from hundreds of identical "Best SEO in X" pages

**Recommended:**
```
Best SEO Agency in Vancouver
```
or
```
Vancouver SEO & Search Engine Optimization Agency
```
(Template will render city part in gradient; keep the modifier before "in Vancouver")

---

## 6. Enrichment Content Audit

### 6a. Hero Badge
**Current:** `Vancouver's Trusted SEO Partner`
**Assessment:** OK, but could include "Agency" for keyword match. Consider: `Vancouver's Trusted SEO Agency`

### 6b. Hero Description
**Current:**
> Ready to dominate seo in Vancouver? TML combines local expertise with global best practices to deliver exceptional results. From strategy to execution, we're invested in your success. Partner with Vancouver's leading seo agency and watch your business accelerate.

**Issues:**
- Lowercase "seo" throughout (should be "SEO")
- Missing "search engine optimization" full phrase
- Missing "digital marketing" for that keyword cluster
- Missing "BC" / "British Columbia" geographic signal
- Generic language ("exceptional results", "watch your business accelerate") -- not specific enough

### 6c. Keywords Array
**Current:** `["seo Vancouver", "seo agency Vancouver", "best seo Vancouver", "seo company British Columbia", "TML Agency Vancouver", "Vancouver seo services"]`

**Missing from keyword array:**
- `seo vancouver bc`
- `seo marketing vancouver`
- `search engine optimization vancouver`
- `vancouver search engine optimization`
- `digital marketing agency vancouver`
- `seo company vancouver` (has "seo company British Columbia" instead)

### 6d. Why Choose Section
**Current 4 items:**
1. Vancouver Market Intelligence -- mentions tech, film, real estate, tourism (good local signals)
2. Proven Track Record in British Columbia -- good province signal
3. Local Presence, Global Standards -- good
4. Transparent, Results-Focused Partnership -- generic, no local signal

**Issues:**
- No mention of specific Vancouver neighborhoods (Gastown, Yaletown, Broadway Tech Corridor)
- No mention of Metro Vancouver sub-cities (Burnaby, Surrey, Richmond)
- Missing "search engine optimization" variant in any description
- All use lowercase "seo"

### 6e. FAQs
**Current FAQs:**
1. Why hire a Vancouver-based SEO agency...
2. How much does SEO cost for a Vancouver business...
3. How long to see results from seo in Vancouver...
4. Do you work across BC or just Vancouver...
5. What industries in Vancouver...

**Issues:**
- Only 5 FAQs -- too few for competitive SERP features
- No FAQ targeting "search engine optimization vancouver" keyword
- No FAQ targeting "seo company vancouver" keyword
- No FAQ mentioning "seo marketing" explicitly
- Missing FAQ about local SEO specifically for Vancouver
- Missing FAQ about Vancouver-specific industries (tech/film/gaming)

---

## 7. Local Vancouver Signals

### What IS present:
- City name "Vancouver" throughout enrichments
- Province "British Columbia" mentioned
- Industries listed: tech, film & TV production, real estate, tourism
- Region in locations.json: "Vancouver, Burnaby, Surrey, Richmond, and the Metro Vancouver area"
- Landmarks in locations.json: Stanley Park, Granville Island, Gastown, Robson Street, Science World

### What is MISSING from page content:
- **No Vancouver landmarks referenced** in enrichment content (Stanley Park, Granville Island, Gastown exist in locations.json but are never pulled into SEO page content)
- **No Vancouver neighborhoods** mentioned (Yaletown, Kitsilano, Mount Pleasant, Broadway Tech Corridor)
- **No Metro Vancouver sub-cities** mentioned in body content (Burnaby, Surrey, Richmond, North Vancouver, Coquitlam)
- **No Vancouver-specific business references** (Hootsuite, EA, Lululemon, Port of Vancouver)
- **No BC-specific regulatory/market signals** (BC business registration, BCIT, UBC)
- **No "BC" abbreviation** in meta title or description
- **No postal code prefix** (V5K, V6B, etc.) in schema or content
- **No phone number** with Vancouver area code (604 / 778)

### locations.json `uniqueContent` -- NOT used on SEO page:
The locations.json has 3 rich Vancouver-specific paragraphs mentioning Hootsuite, Slack, game development, Yaletown, Broadway Tech Corridor, Metro Vancouver real estate, port-driven logistics, and film industry. These appear to be **unused** by the location-service template for the hero/body sections -- a significant missed opportunity.

---

## 8. Schema Markup Assessment

The template generates schema automatically via helper functions:
- `ServiceSchema` -- names service "SEO in Vancouver", area served "Vancouver"
- `LocalBusinessSchema` -- "TML Agency - Vancouver" with city/state
- `BreadcrumbSchema` -- Home > Services > SEO > Vancouver
- `FAQSchema` -- from enrichment FAQs

**Issues:**
- No `GeoCoordinates` in LocalBusiness schema (lat/long for Vancouver)
- No `postalCode` for Vancouver
- No `areaServed` array covering Metro Vancouver sub-cities
- No `Review` or `AggregateRating` schema (the legacy standalone file had one)
- No `ProfessionalService` schema type (more specific than LocalBusiness for an agency)

---

## 9. Content Depth & E-E-A-T

### Current content from enrichments:
- ~4 Why Choose paragraphs (generic)
- ~4 Process steps (generic)
- 5 FAQs (thin)
- 1 market insight stat (72%)
- 1 local benchmark section

### Missing for competitive SERP (KD 33-52 keywords):
- **No case studies** specific to Vancouver businesses
- **No Vancouver-specific data** (population, business count, economic stats)
- **No competitive analysis** of Vancouver SEO market
- **No industry-specific SEO recommendations** for Vancouver's key sectors (tech, film, gaming)
- **No pricing context** specific to Vancouver market
- **No testimonials** from Vancouver clients
- **No author bio / E-E-A-T signals** beyond name

### The legacy `views/seo-in-vancouver.php` file has:
- 5 detailed case studies with metrics tables (but all reference Edmonton businesses)
- 10+ detailed FAQ answers
- Pricing breakdown with 3 tiers
- 5 client testimonials
- A 7-phase process description
- Vancouver market statistics (but uses Edmonton numbers: 1.24M population, 29,894 businesses)

This content could be adapted for the enrichments/template system but needs Vancouver-specific data.

---

## 10. Legacy File Issue (CRITICAL)

**File:** `views/seo-in-vancouver.php`

This file has a **CRITICAL city mismatch problem**:
- Comment says "EDMONTON SEO PAGE"
- `$pageTitle` = "Best SEO in Edmonton | TML Agency"
- `$city` = "Edmonton"
- `$province` = "Alberta"
- `$canonicalUrl` = "https://townmedialabs.ca/services/seo-edmonton/"
- All schema markup references Edmonton
- All case studies reference Edmonton businesses ("Plumber Edmonton", "Edmonton Realtor", "Dentist Edmonton", "CPA Edmonton")
- FAQ questions reference Edmonton
- OG image = "edmonton-seo-og.jpg"
- Population stats = 1.24M (Edmonton metro, not Vancouver)
- Business count = 29,894 (Edmonton, not Vancouver)
- Phone area code = 780 (Edmonton, not Vancouver 604/778)
- Testimonial references "B2B professional services firm in Edmonton"

**However**, the `<title>` tag in the HTML `<head>` is hardcoded to "Best SEO in Vancouver | TML Agency | SEO Experts" -- contradicting the PHP variables above it.

**Risk:** If this file is ever accidentally served (e.g., direct include), it would show Edmonton content on a Vancouver URL, causing severe ranking damage from geographic signal confusion.

**Recommendation:** Delete this file. The live routing uses `views/location-service.php` + enrichments.

---

## 11. Competitive Gap Analysis

For keywords with KD 33-52, competing pages likely have:
- 2,000-4,000 words of unique content
- Vancouver-specific case studies and testimonials
- Detailed local market data
- Schema with GeoCoordinates
- Internal links to related Vancouver service pages
- External links to Vancouver business resources

The current enrichment content is thin (~500 words of unique text) and relies heavily on generic template fill. This is insufficient for keywords with KD 39-52.

---

## 12. Action Items (Priority Order)

### P0 -- Critical
1. **Delete or archive `views/seo-in-vancouver.php`** -- contains wrong-city (Edmonton) content
2. **Update enrichments `metaTitle`** to: `Best SEO Agency in Vancouver, BC | TML Agency`
3. **Update enrichments `metaDescription`** to include "search engine optimization", "seo company", "BC"
4. **Update enrichments `h1`** to: `Best SEO Agency in Vancouver` or `Vancouver SEO & Search Engine Optimization`

### P1 -- High Priority
5. **Add "search engine optimization" phrase** to heroDescription and at least 1 FAQ
6. **Add "digital marketing" phrase** to heroDescription or a Why Choose section
7. **Fix lowercase "seo"** to "SEO" throughout enrichments
8. **Expand FAQs from 5 to 8-10**, targeting:
   - "What is search engine optimization and how does it work for Vancouver businesses?"
   - "How do I choose the best SEO company in Vancouver?"
   - "What does SEO marketing include for Vancouver businesses?"
   - "Does your SEO agency serve Burnaby, Surrey, and Richmond?"
9. **Add Vancouver landmarks and neighborhoods** to Why Choose or FAQ content (Gastown, Yaletown, Broadway Tech Corridor, Granville Island)
10. **Add Metro Vancouver sub-cities** to content (Burnaby, Surrey, Richmond, North Vancouver)

### P2 -- Medium Priority
11. **Create Vancouver-specific case studies** (adapt structure from legacy file but with Vancouver data)
12. **Add Vancouver market statistics** (population ~2.6M metro, business count, tech sector growth)
13. **Integrate `uniqueContent` from locations.json** into page body via template or enrichments
14. **Add GeoCoordinates to schema** (49.2827, -123.1207)
15. **Add `areaServed` array** covering Metro Vancouver cities
16. **Update enrichment keywords array** to match all 7 target keywords

### P3 -- Nice to Have
17. Add Vancouver client testimonials
18. Add Vancouver-specific pricing context
19. Add links to Vancouver business resources (Vancouver Economic Commission, etc.)
20. Consider Vancouver area code (604/778) in contact schema

---

## 13. Estimated Impact

| Action | Keywords Impacted | Est. Monthly Traffic Gain |
|--------|------------------|--------------------------|
| Fix title + H1 + meta | All 7 | +200-400 visits |
| Add "search engine optimization" content | 2 keywords (1,880 vol) | +100-200 visits |
| Add "digital marketing" content | 1 keyword (1,000 vol) | +50-100 visits |
| Expand FAQs + local signals | All 7 (SERP features) | +150-300 visits |
| Vancouver case studies + depth | All 7 (authority boost) | +100-250 visits |
| **Total estimated gain** | | **+600-1,250 visits/mo** |

Total addressable keyword volume: **7,660 searches/month** across 7 target keywords.
