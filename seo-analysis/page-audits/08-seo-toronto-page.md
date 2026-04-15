# SEO Toronto Page Audit

**URL:** `https://townmedialabs.ca/services/seo-in-toronto`
**Date:** 2026-04-14
**Target cluster volume:** ~22,000/mo (13 keywords)
**Highest-volume keyword:** "seo toronto" (2,900/mo, KD 56)

---

## 1. CRITICAL BUG: `localContent` is a String, Not an Array

**File:** `/data/enrichments.json`, key `seo-in-toronto`, field `localContent`

The template at `views/location-service.php` line 506 iterates `localContent` with `foreach`:

```php
<?php foreach ($enrichment['localContent'] as $p) : ?>
  <p class="..."><?= tml_e($p) ?></p>
<?php endforeach; ?>
```

However, the `seo-in-toronto` entry stores `localContent` as a **single string** (3 paragraphs joined by `\n\n`), while every other enrichment entry uses an **array of strings**. When PHP iterates a string with `foreach`, it iterates over each character, producing hundreds of `<p>` tags each containing a single letter.

**Fix:** Convert the `localContent` value from a single string to an array of 3 strings (split on `\n\n`).

**Severity:** CRITICAL -- the "Local Expertise" section is completely broken on this page.

---

## 2. DUPLICATE VIEW FILE (seo-in-toronto.php) IS DEAD CODE

**File:** `/views/seo-in-toronto.php`

This is a 609-line standalone page hardcoded entirely for **Edmonton** (not Toronto). It appears to be a leftover copy of an Edmonton-specific page and is NOT used by the routing system, which serves all location-service pages through `views/location-service.php` + enrichments data.

Evidence the file is dead code:
- Line 8: `$pageTitle = "Best SEO in Edmonton | TML Agency";`
- Line 18: `$city = "Edmonton";`
- All case studies reference Edmonton businesses (Apex Plumbing, Westmount Real Estate, etc.)
- All stats reference Edmonton population (1.24M, 29,894 businesses)
- The router serves `/services/seo-in-toronto` through `location-service.php`

**Recommendation:** Delete `views/seo-in-toronto.php`. It serves no purpose and could cause confusion.

---

## 3. TITLE TAG AUDIT

**Current:** `Best SEO in Toronto | TML Agency`
**Source:** `enrichments.json` field `metaTitle`

### Issues
- Does not contain "SEO Toronto" or "Toronto SEO" as a phrase -- uses "SEO in Toronto" instead, which splits the target keyword with a stop word.
- At 37 characters, significantly underutilizes the ~55-60 character budget.
- Does not include "Agency" or "Services" in the title despite those being high-volume modifiers (2,400/mo each).
- Does not differentiate from competitors who also use "Best SEO in Toronto."

### Recommendation
```
Toronto SEO Agency | Data-Driven SEO Services | TML Agency
```
(59 characters)

**Why:** Front-loads "Toronto SEO" (1,600/mo, KD 39 -- lowest difficulty), includes "SEO Agency" and "SEO Services" as partial matches for "seo agency toronto" (2,400/mo) and "seo services toronto" (1,600/mo). "Data-Driven" adds differentiating value language.

**Alternative:**
```
SEO Toronto | #1 Rated SEO Agency & Services | TML Agency
```
(58 characters) -- front-loads "SEO Toronto" (2,900/mo) directly.

---

## 4. META DESCRIPTION AUDIT

**Current:** `TML is Toronto's trusted seo agency. We help businesses across Ontario grow with data-driven strategies. Contact us today.`
**Length:** 121 characters

### Issues
- Severely underutilizes the ~155 character budget (34 characters wasted).
- Generic and thin -- "Contact us today" is a weak CTA occupying premium character space.
- Does not mention specific outcomes, numbers, or proof points.
- Missing high-value keyword phrases: "seo company toronto," "seo services," "search engine optimization."
- Lowercase "seo" throughout (not a ranking factor, but affects click-through perception).

### Recommendation
```
Toronto's top-rated SEO agency. TML delivers search engine optimization services that drive real revenue -- 500+ projects, 3.5x avg ROI. Free SEO consultation for Toronto businesses.
```
(183 characters -- Google may truncate to ~155, but the key content is front-loaded)

**Keyword coverage:** "SEO agency," "search engine optimization," "SEO services," "Toronto businesses" -- matches 5+ target keywords.

---

## 5. H1 TAG AUDIT

**Current rendered H1:** `Best SEO` (line break) `in Toronto`

The template strips "in Toronto" from the enrichment H1 ("Best SEO in Toronto") and re-appends it as a styled gradient span. The actual H1 text content reads: "Best SEO in Toronto."

### Issues
- Does not contain "SEO Toronto" or "Toronto SEO" as a contiguous phrase.
- "Best SEO" is a generic superlative that every competitor uses.
- Does not include "Agency," "Company," or "Services" despite these being the highest-volume modifiers.
- Missing the word "Company" which was the original pattern ("Best {Service} Company in {City}").

### Recommendation

Update `enrichments.json` field `h1` to:
```
Best SEO Agency in Toronto
```

This renders as "Best SEO Agency" + styled "in Toronto" and covers:
- "seo agency toronto" (2,400/mo) as a phrase match
- "best seo company toronto" (590/mo) as a semantic match
- Maintains the site-wide "Best {Service} {Type} in {City}" H1 pattern

**Alternative (more aggressive):**
```
Toronto SEO Agency — Search Engine Optimization That Delivers
```
Front-loads "Toronto SEO Agency" and includes "search engine optimization" (1,300/mo). Note: this would break the template's "in {City}" split logic and would need template adjustment or a custom override.

---

## 6. CONTENT DEPTH AUDIT

### Current content sections (from location-service.php template + enrichments data):
1. Hero + badge + tagline
2. Stats bar (from service data -- generic, not Toronto-specific)
3. Image gallery (generic stock images)
4. Why Choose TML (4 items -- reasonably Toronto-specific)
5. Our Process (4 steps -- generic with Toronto name-dropped)
6. Mid-page image gallery
7. Service features (from service data -- generic)
8. Expertise stats (500+ projects, 98% retention, 5x ROI -- generic)
9. Local Expertise section (**BROKEN** -- see bug #1)
10. Market Insight (72% stat)
11. Industries served
12. Trust/testimonial (single generic quote)
13. SEO content block (if `seoBlock['seo']` exists -- offerings, pricing, benefits)
14. Cross-city links
15. Other services in Toronto
16. FAQs (5 questions)

### Issues

**A. Estimated word count: ~800-1,000 words (visible text)**
For a keyword cluster worth 22,000 monthly searches with KD 56-74, competing pages will have 2,500-4,000+ words. This page is critically thin.

**B. No case studies or proof points specific to Toronto**
The dead `seo-in-toronto.php` file had 5 detailed case studies (though they were Edmonton-focused). The live template has a single generic testimonial quote that is the same across all locations.

**C. No Toronto-specific statistics**
- No mention of Toronto's population (2.9M metro), number of businesses, or digital market size
- No local market data (e.g., "Toronto businesses spend $X billion on digital marketing annually")

**D. No long-form educational content**
The page lacks the depth Google expects for informational+transactional queries like "search engine optimization toronto" (1,300/mo) or "seo marketing toronto" (1,000/mo). There is no explanation of what SEO involves, how it works for Toronto businesses, or what makes the Toronto market unique from an SEO perspective.

**E. The "Local Expertise" section is broken (bug #1)**, eliminating the only Toronto-specific prose content.

### Recommendations

1. **Fix the localContent bug** (critical, immediate).

2. **Add 1,500-2,000 words** of Toronto-specific SEO content. Suggested sections:
   - "What Makes SEO in Toronto Different" (cover Toronto's competitive landscape, multicultural audience, bilingual considerations)
   - "Toronto SEO Case Study" (real or realistic case study with Toronto industry context)
   - "Toronto SEO Pricing" (Toronto-specific pricing context with market comparison)
   - "How We Approach SEO for Toronto Businesses" (reference Toronto-specific strategies)

3. **Add a dedicated Toronto market stats section** with real data:
   - 2.9M+ metro population
   - Most competitive digital market in Canada
   - Key industries: finance (Bay Street), tech (MaRS Discovery District), media (CBC, Rogers)

---

## 7. LOCAL SIGNALS AUDIT

### Current local mentions in enrichments data:
- "Toronto" mentioned frequently (good)
- "Ontario" mentioned
- Industries listed: finance, tech, media & entertainment, real estate, healthcare, retail, manufacturing, professional services

### Missing local signals:

**Neighborhoods:** ZERO mentions of Toronto neighborhoods. Should include:
- Downtown Core / Financial District / Bay Street
- Queen Street West
- Yorkville
- Liberty Village
- King West
- Leslieville
- The Beaches
- Scarborough
- North York
- Etobicoke
- Midtown (Yonge & Eglinton)

**Landmarks / Business Districts:** Only `locations.json` has landmarks (CN Tower, Distillery District, Kensington Market, Bay Street Financial District, Harbourfront Centre) but these appear only in the `uniqueContent` paragraphs, which render in a separate section. The enrichment content does not reference them.

**Local businesses / institutions to mention:**
- MaRS Discovery District (tech hub)
- Bay Street (financial district)
- Toronto Stock Exchange
- University of Toronto / Ryerson (TMU)
- Shopify Toronto office
- Rogers Centre / Scotiabank Arena (event venues)
- PATH (underground walkway system)
- Toronto Pearson International Airport businesses

**GTA suburbs to reference:**
- Mississauga, Brampton, Vaughan, Markham, Richmond Hill, Oakville, Burlington, Pickering

### Recommendation
The `localContent` field (once fixed to array format) should be expanded from 3 to 5-6 paragraphs with explicit neighborhood, landmark, and institution references. This strengthens topical relevance for "toronto seo" and local intent signals.

---

## 8. SCHEMA MARKUP AUDIT

### Current schemas (from location-service.php template):
1. **Service** schema -- generic, names service as "SEO in Toronto"
2. **LocalBusiness** schema -- names business as "TML Agency - Toronto"
3. **BreadcrumbList** schema -- Home > Services > SEO > Toronto
4. **FAQPage** schema -- 5 questions (from enrichment FAQs)

### Issues

**A. No `Organization` schema** -- The dead view file had one, but the live template does not include it.

**B. No `Article` / `WebPage` schema** -- No `datePublished`, `dateModified`, or `author` information in structured data, despite the enrichment having these fields.

**C. LocalBusiness schema is thin:**
- No `geo` coordinates for Toronto
- No `areaServed` listing GTA cities
- No `aggregateRating`
- No `review` markup

**D. Service schema missing `offers`** -- No pricing tiers in schema despite pricing being shown on-page.

**E. FAQ schema has only 5 questions** -- Competitors targeting this cluster will have 10-15+ FAQs. The 5 current FAQs are generic and not Toronto-SEO-specific.

### Recommendations
1. Add `WebPage` schema with author, dates, and publisher
2. Add geo coordinates to LocalBusiness (Toronto: 43.6532, -79.3832)
3. Add `Offer` items to Service schema matching pricing tiers
4. Expand FAQ schema to 10+ Toronto-specific questions (see Section 9)

---

## 9. FAQ AUDIT

### Current FAQs (5):
1. "Why should I hire a Toronto-based SEO agency instead of working with a freelancer or national firm?"
2. "How much does SEO cost for a Toronto business?"
3. "How long does it take to see results from seo in Toronto?"
4. "Do you work with businesses across Ontario or just Toronto?"
5. "What industries does TML have experience with in Toronto?"

### Issues
- Only 5 FAQs for a 22,000-volume cluster is far too few.
- None target PAA (People Also Ask) queries specific to "seo toronto."
- FAQ #3 answer discusses "paid advertising" and "branding and web design" -- irrelevant to an SEO-specific FAQ.
- Answers are brief (2-4 sentences) and lack depth for featured snippet capture.

### Missing Toronto-specific PAA-targeting FAQs to add:
1. "What is the best SEO company in Toronto?" -- targets "best seo company toronto" (590/mo)
2. "How do I find a good SEO agency in Toronto?" -- targets "seo agency toronto" (2,400/mo)
3. "What SEO services do Toronto businesses need?" -- targets "seo services toronto" (1,600/mo)
4. "Is SEO worth it for small businesses in Toronto?" -- targets local commercial intent
5. "How much should a Toronto business spend on SEO?" -- more specific than current pricing FAQ
6. "What is the difference between local SEO and national SEO for Toronto companies?" -- targets "toronto seo services" (1,300/mo)
7. "How competitive is SEO in Toronto compared to other Canadian cities?" -- unique angle
8. "Can SEO help my Toronto business rank in the Google Map Pack?" -- targets local SEO intent
9. "What Toronto industries benefit most from SEO?" -- targets industry-specific queries
10. "How do I know if my Toronto SEO agency is delivering results?" -- trust/transparency angle

---

## 10. KEYWORD COVERAGE MATRIX

| Target Keyword | Vol | KD | In Title? | In Meta? | In H1? | In Body? | In FAQs? | In Schema? |
|---|---|---|---|---|---|---|---|---|
| seo toronto | 2,900 | 56 | Partial ("SEO in Toronto") | No exact | Partial | Yes | No | No |
| seo agency toronto | 2,400 | 68 | No | Yes ("seo agency") | No | Yes | Yes | No |
| seo company toronto | 2,400 | 72 | No | No | No | No | No | No |
| digital marketing agency toronto | 1,900 | 65 | No | No | No | No | No | No |
| seo services toronto | 1,600 | 56 | No | No | No | Yes | No | No |
| seo firm toronto | 1,600 | 70 | No | No | No | No | No | No |
| seo optimization company toronto | 1,900 | 66 | No | No | No | No | No | No |
| toronto seo | 1,600 | 39 | No | No | No | Yes | No | No |
| toronto seo services | 1,300 | 54 | No | No | No | Partial | No | No |
| seo marketing toronto | 1,000 | 74 | No | No | No | No | No | No |
| toronto seo agency | 880 | 54 | No | No | No | No | No | No |
| best seo company toronto | 590 | 56 | Partial ("Best SEO") | No | Partial | No | No | No |
| search engine optimization toronto | 1,300 | 60 | No | No | No | No | No | No |

**Coverage score: 2/13 keywords have acceptable coverage.** This is critically low for a 22,000-volume cluster.

### Priority keyword gaps to close:
1. **"seo company toronto"** (2,400/mo) -- not mentioned ANYWHERE. Add to H2, body content, and FAQ.
2. **"digital marketing agency toronto"** (1,900/mo) -- completely absent. Add to body content.
3. **"seo firm toronto"** (1,600/mo) -- completely absent. Add as synonym in body.
4. **"search engine optimization toronto"** (1,300/mo) -- the full phrase is never spelled out. Add to an H2 or intro paragraph.
5. **"toronto seo"** (1,600/mo, KD 39) -- lowest difficulty keyword, should be in title tag.

---

## 11. SUMMARY OF PRIORITY FIXES

### P0 -- Critical (do immediately)
1. **Fix `localContent` data type bug** in `enrichments.json`: convert from string to array of 3 strings. Without this fix, the entire Local Expertise section renders as gibberish characters.

### P1 -- High Priority (within 1 week)
2. **Update `metaTitle`** to: `Toronto SEO Agency | Data-Driven SEO Services | TML Agency`
3. **Update `metaDescription`** to: `Toronto's top-rated SEO agency. TML delivers search engine optimization services that drive real revenue -- 500+ projects, 3.5x avg ROI. Free SEO consultation for Toronto businesses.`
4. **Update `h1`** to: `Best SEO Agency in Toronto`
5. **Expand FAQs** from 5 to 10-12 Toronto-specific questions targeting PAA queries.
6. **Add 1,500+ words** of Toronto-specific content covering neighborhoods, landmarks, market stats, and local case studies.

### P2 -- Medium Priority (within 2 weeks)
7. **Add keyword coverage** for "seo company," "seo firm," "search engine optimization," and "digital marketing agency" throughout body copy.
8. **Add Toronto neighborhoods and landmarks** to `localContent` paragraphs.
9. **Add `WebPage` schema** with author/dates and geo coordinates to `LocalBusiness`.
10. **Delete dead file** `views/seo-in-toronto.php`.

### P3 -- Low Priority
11. Add `aggregateRating` to LocalBusiness schema.
12. Add pricing `Offer` items to Service schema.
13. Create Toronto-specific case study content.
