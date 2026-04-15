# SEO Page Audit: SEO in Ottawa
**File:** `views/seo-in-ottawa.php`
**Date:** 2026-04-14
**Auditor:** Claude Code Agent

---

## Target Keywords

| Keyword | Monthly Volume | KD | Status |
|---------|---------------|-----|--------|
| ottawa seo | 1,000 | 38 | NOT in title tag, NOT in H1, NOT in meta description, NOT in keywords meta |
| seo ottawa | 1,000 | 41 | Present in enrichments keywords list; NOT in view file PHP variables |
| seo ottawa canada | 1,000 | 32 | MISSING everywhere |
| web design ottawa | 1,000 | 59 | MISSING (different service page exists: `web-design-in-ottawa.php`) |
| online marketing ottawa | 170 | 36 | MISSING everywhere |
| web marketing ottawa | 90 | 52 | MISSING everywhere |

---

## CRITICAL ISSUE: Edmonton Content Serving as Ottawa Page

**Severity: CRITICAL**

The entire `seo-in-ottawa.php` view file is a copy of the Edmonton SEO page with only the `<title>` tag hardcoded to Ottawa. Every single PHP variable is set to Edmonton:

- **Line 3:** Comment says `EDMONTON SEO PAGE`
- **Line 4:** Comment says `Best SEO Services in Edmonton`
- **Line 9:** `$pageTitle = "Best SEO in Edmonton | TML Agency"`
- **Line 10:** `$metaDescription` references "Edmonton businesses"
- **Line 11:** `$pageKeywords` = "SEO Edmonton, digital marketing Edmonton..."
- **Line 12:** `$canonicalUrl` = `https://townmedialabs.ca/services/seo-edmonton/`
- **Line 19:** `$city = "Edmonton"`
- **Line 20:** `$province = "Alberta"` (Ottawa is in Ontario)
- **Line 24:** `$urlSlug = "seo-edmonton"`

**The hardcoded `<title>` tag on line 246 reads:**
```
Best SEO in Ottawa | TML Agency | SEO Experts
```

**But every `$city` variable outputs "Edmonton"**, so the rendered H1, body content, FAQ questions, case studies, testimonials, schema markup, canonical URL, and footer all say "Edmonton" -- not Ottawa.

---

## Title Tag Audit

**Rendered:** `Best SEO in Ottawa | TML Agency | SEO Experts`
**Characters:** ~49 (good length)

| Check | Result |
|-------|--------|
| Contains "ottawa seo" | NO -- word order is "SEO in Ottawa" |
| Contains "seo ottawa" | NO -- same issue |
| Contains "seo ottawa canada" | NO |
| Brand name present | YES ("TML Agency") |
| Length under 60 chars | YES |

**Issues:**
- Title is hardcoded on line 246, creating a mismatch with `$pageTitle` on line 9 (Edmonton)
- Does not front-load the primary keyword "Ottawa SEO"
- Missing "Canada" modifier for the 1,000-volume "seo ottawa canada" keyword

**Recommendation:** `Ottawa SEO Services | SEO Agency Ottawa Canada | TML Agency`

---

## Meta Description Audit

**Rendered (from $metaDescription, line 10):**
> "Specialized SEO services for Edmonton businesses. Rank higher on Google, get more customers. Free consultation. 200+ clients, proven results."

| Check | Result |
|-------|--------|
| Mentions Ottawa | NO -- says "Edmonton" |
| Contains target keywords | NO |
| Contains CTA | YES ("Free consultation") |
| Length 150-160 chars | YES (~147) |

**Recommendation:**
> "Ottawa SEO services that deliver results. Our SEO Ottawa Canada experts help businesses rank higher on Google and get more customers. Free strategy call."

---

## H1 Tag Audit

**Rendered (line 316, using $city variable):**
> "Best SEO in Edmonton | Get More Customers From Google"

| Check | Result |
|-------|--------|
| Mentions Ottawa | NO -- outputs "Edmonton" |
| Contains primary keyword | NO |
| Single H1 on page | YES |

**Recommendation:** `Best SEO in Ottawa | Ottawa SEO Experts | Get More Customers`

---

## Canonical URL

**Rendered:** `https://townmedialabs.ca/services/seo-edmonton/`

**CRITICAL:** The canonical points to the Edmonton page, not Ottawa. This tells Google this page is a duplicate of the Edmonton page. Google will likely ignore the Ottawa page entirely.

**Fix:** `https://townmedialabs.ca/services/seo-in-ottawa/`

---

## Schema Markup Audit

All schema blocks use PHP variables set to Edmonton values:

| Schema Type | Issue |
|-------------|-------|
| Organization | `areaServed` = "Edmonton, Alberta" |
| LocalBusiness | `addressLocality` = "Edmonton", `addressRegion` = "AB", `postalCode` = "T5J" (Edmonton postal code) |
| Service | `areaServed` = "Edmonton, Alberta" |
| Breadcrumb | Final item = "SEO in Edmonton" linking to seo-edmonton URL |
| Article | Image URL references "edmonton-seo-hero.jpg" |
| FAQ | All 10 questions mention "Edmonton" (e.g., "What is SEO and why does my Edmonton business need it?") |

**Every schema block is wrong for Ottawa.** Ottawa postal codes start with K, province is ON, not AB.

---

## Local Ottawa Signals Audit

| Signal | Present | Details |
|--------|---------|---------|
| Ottawa city name in body | NO | All `$city` outputs = "Edmonton" |
| Ontario province | NO | Outputs "Alberta" |
| Ottawa neighborhoods | NO | No mention of ByWard Market, Kanata, Centretown, etc. |
| Ottawa landmarks | NO | No Parliament Hill, Rideau Canal, etc. |
| Ottawa industries | NO | No government, defence, tech corridor mentions |
| Ottawa population/stats | NO | Shows Edmonton stats (1.24M pop, 29,894 businesses) |
| Ottawa postal code in schema | NO | Shows T5J (Edmonton) |
| Ottawa phone number | NO | Shows 780 area code (Edmonton) |
| Bilingual market mention | NO | Ottawa is English/French bilingual -- no mention |
| National Capital Region | NO | Not referenced |
| Kanata North Technology Park | NO | Not referenced |

---

## Enrichments Data Quality (enrichments.json)

The enrichments entry for `seo-in-ottawa` (line 12156) IS correctly Ottawa-focused:

**Good:**
- H1: "Best SEO in Ottawa"
- Keywords include "seo Ottawa", "Ottawa seo services"
- whyChoose mentions Ottawa market, government/tech/defence industries
- localContent references "Canada's national capital", government, tech, defence, telecommunications
- FAQs mention Ottawa-specific context
- Industries: government, tech, defence, telecommunications, healthcare

**Issues in enrichments:**
- Grammar error: "a Ottawa-based" should be "an Ottawa-based" (FAQ line 12224, localContent line 12215)
- Keywords list missing: "ottawa seo", "seo ottawa canada", "online marketing ottawa", "web marketing ottawa"
- `heroDescription` says "500+ businesses across Ontario" -- inflated vs. the view file's 200+ claim
- `localContent` has incomplete sentence: "Canada's national capital and a thriving hub for tech, government, and defence With a diverse economy..." -- missing period/transition
- Generic benchmark data (3.5x ROI, 2.8% conversion) -- same across all cities

---

## Locations.json Data (Ottawa entry)

Correctly populated with Ottawa-specific data:
- Region: "Ottawa, Gatineau, Kanata, and the National Capital Region"
- Landmarks: Parliament Hill, ByWard Market, Rideau Canal, Kanata North Technology Park, National Gallery
- Industries: government, tech, defence, telecommunications, healthcare, education, public service, cybersecurity
- uniqueContent: 3 strong paragraphs covering B2G marketing, Kanata tech corridor (Shopify, Nokia), bilingual requirements

**This data is NOT being used by the view file** because the view is hardcoded to Edmonton.

---

## Content Quality Issues

### Case Studies (lines 402-467)
All 5 case studies reference Edmonton businesses:
1. "Plumber Edmonton" ranking
2. "Edmonton Realtor" ranking
3. "Dentist Edmonton" ranking
4. Prairie Craft Supply Co. (Edmonton context)
5. "CPA Edmonton" ranking

**None reference Ottawa.** Should reference Ottawa-specific businesses and keywords like "Plumber Ottawa", "Ottawa Realtor", etc.

### Testimonials (lines 549-577)
All testimonials are from the Edmonton case studies. No Ottawa-specific social proof.

### Market Statistics (lines 353-372)
- Population: 1.24M (this is Edmonton's metro population; Ottawa metro is ~1.49M)
- Businesses: 29,894 (Edmonton figure)
- Annual Growth: 3.0% (Edmonton figure)

### Missing Ottawa-Specific Content
- No mention of government procurement / B2G opportunities
- No mention of Kanata tech corridor
- No bilingual (English/French) SEO considerations
- No Ottawa-Gatineau cross-border market dynamics
- No reference to federal government as major employer/client base
- No Ottawa-specific seasonal patterns (e.g., Tulip Festival, Winterlude)

---

## Open Graph Tags

- `og:title`: Uses `$pageTitle` = "Best SEO in Edmonton | TML Agency"
- `og:description`: Uses `$metaDescription` referencing Edmonton
- `og:image`: Points to `edmonton-seo-og.jpg`

All wrong for Ottawa.

---

## Keyword Placement Summary

| Location | "ottawa seo" | "seo ottawa" | "seo ottawa canada" | "online marketing ottawa" | "web marketing ottawa" |
|----------|:---:|:---:|:---:|:---:|:---:|
| Title tag | NO | NO | NO | NO | NO |
| Meta description | NO | NO | NO | NO | NO |
| H1 | NO | NO | NO | NO | NO |
| H2 subheads | NO | NO | NO | NO | NO |
| Body copy | NO | NO | NO | NO | NO |
| Schema | NO | NO | NO | NO | NO |
| URL/canonical | NO | NO | NO | NO | NO |
| Image alt text | NO | NO | NO | NO | NO |

**Zero keyword presence for all 6 target keywords.** The page currently has zero Ottawa SEO relevance.

---

## Priority Fix List

### P0 -- Immediate (page is fundamentally broken)
1. **Replace all Edmonton PHP variables with Ottawa values:**
   - `$city` = "Ottawa"
   - `$province` = "Ontario"
   - `$citySlug` = "ottawa"
   - `$urlSlug` = "seo-ottawa"
   - `$pageTitle` = "Ottawa SEO Services | Best SEO Agency in Ottawa Canada | TML Agency"
   - `$metaDescription` = "Ottawa SEO agency serving 200+ businesses. Expert SEO Ottawa Canada services -- rank higher on Google, get more leads. Government, tech, defence sectors. Free strategy call."
   - `$canonicalUrl` = "https://townmedialabs.ca/services/seo-in-ottawa/"
   - `$businessPhone` = "+1-613-XXX-XXXX" (613 is Ottawa area code)
   - `$businessAddress` = "Ottawa, Ontario, Canada"
2. **Fix schema markup:** PostalCode to K-prefix, addressRegion to "ON", all areaServed to Ottawa
3. **Fix canonical URL** -- currently points to Edmonton page
4. **Fix OG image** -- change from edmonton-seo-og.jpg to ottawa-seo-og.jpg

### P1 -- High Priority (keyword targeting)
5. **Rewrite title tag** to include "Ottawa SEO" and "SEO Ottawa Canada"
6. **Rewrite H1** to front-load "Ottawa SEO"
7. **Add keyword meta** with all 6 target keywords
8. **Update FAQ schema** -- replace all Edmonton references with Ottawa-specific questions
9. **Rewrite market stats section** with Ottawa data (pop ~1.49M metro, provincial capital, etc.)

### P2 -- Content Differentiation
10. **Rewrite case studies** with Ottawa-specific businesses (government contractor, Kanata tech company, Ottawa law firm, bilingual service provider, ByWard Market retailer)
11. **Add Ottawa local signals:** Parliament Hill, ByWard Market, Rideau Canal, Kanata North, National Capital Region, Gatineau cross-border market
12. **Add bilingual SEO section** -- unique differentiator for Ottawa (English/French federal requirements)
13. **Add government/B2G SEO section** -- Ottawa's #1 differentiator from other Canadian cities
14. **Add Ottawa industry-specific content** covering cybersecurity, defence, telecommunications sectors
15. **Update testimonials** to reference Ottawa businesses

### P3 -- Secondary Keywords
16. **Add "online marketing ottawa" content** -- could be a section about integrated digital marketing
17. **Add "web marketing ottawa" content** -- related section or internal link to web-design-in-ottawa.php
18. **Cross-link** to web-design-in-ottawa.php for the "web design ottawa" keyword (1,000 vol, KD 59)
19. **Add internal links** to other Ottawa service pages (10 Ottawa pages exist in views/)

---

## Enrichments vs. View File Alignment

The enrichments.json has Ottawa-correct data that the view file completely ignores. The view file appears to be a static Edmonton template that was given an Ottawa title tag but never had its PHP variables or content updated.

**The view file does NOT consume enrichments.json data.** It is fully self-contained with hardcoded Edmonton values. Either:
1. The view file needs to be rewritten to pull from enrichments.json, OR
2. All PHP variables and content in the view file need manual Ottawa replacement

---

## Score: 5/100

This page is functionally an Edmonton SEO page with an Ottawa title tag. It has zero Ottawa keyword presence, wrong canonical URL, wrong schema markup, wrong location data, and no local Ottawa signals. It needs a complete rewrite of all PHP variables and content sections before it can rank for any Ottawa keyword.
