# SEO Calgary Page Audit

**URL:** `/services/seo-in-calgary`
**View File:** `views/seo-in-calgary.php`
**Enrichment Key:** `seo-in-calgary` (in `data/enrichments.json`)
**Location Key:** `calgary` (in `data/locations.json`)
**Audit Date:** 2026-04-14

---

## Target Keywords

| Keyword | Volume | KD | Present in Title | Present in Meta | Present in H1 | Present in Body |
|---------|--------|----|-----------------|-----------------|---------------|-----------------|
| seo calgary | 1,900 | 45 | No | No | No | No |
| calgary seo | 1,600 | 43 | No | No | No | No |
| seo services calgary | 1,600 | 52 | No | No | No | No |
| calgary seo company | 1,000 | 42 | No | No | No | No |
| seo company calgary | 1,000 | 54 | No | No | No | No |
| calgary seo expert | 1,000 | 41 | No | No | No | No |
| seo agency calgary | 880 | 31 | No | No | No | No |
| seo expert calgary | 880 | 31 | No | No | No | No |
| calgary seo services | 880 | 52 | No | No | No | No |
| search engine optimization calgary | 1,000 | 36 | No | No | No | No |
| seo services in calgary | 1,300 | 53 | No | No | No | No |
| expert seo calgary | 1,000 | 27 | No | No | No | No |

**Total addressable search volume: ~13,060/month**

---

## CRITICAL ISSUE: Entire Page is an Edmonton Clone

The `seo-in-calgary.php` view file is a copy of the Edmonton SEO page with Edmonton hardcoded throughout the PHP variables and body content. **The page does NOT use data from `enrichments.json` or `locations.json` at all.** It relies entirely on PHP variables set at the top of the file -- and those variables are set to Edmonton values.

### What renders for the user

The `<title>` tag is hardcoded in the HTML to "Best SEO in Calgary | TML Agency | SEO Experts" -- this is the ONE correct element. But everything else renders Edmonton content because the PHP variables are Edmonton:

- `$city = "Edmonton"` -- so the H1 renders as "Best SEO in **Edmonton**"
- `$province = "Alberta"` (correct, but only by coincidence)
- `$citySlug = "edmonton"`
- `$canonicalUrl` points to `seo-edmonton/`
- `$metaDescription` says "Edmonton businesses"
- `$pageKeywords` says "SEO Edmonton"
- `$businessPhone` uses a 780 area code (Edmonton, not Calgary's 403/587)
- `$businessAddress` says "Edmonton, Alberta, Canada"

---

## Element-by-Element Audit

### 1. Title Tag

**Rendered:** `Best SEO in Calgary | TML Agency | SEO Experts`
**Source:** Hardcoded in HTML at line 246 (does NOT use `$pageTitle` variable).

| Issue | Severity |
|-------|----------|
| Missing primary keyword "seo calgary" or "calgary seo" as a phrase | High |
| "SEO Experts" is generic filler; replace with a keyword variant | Medium |
| Does not contain "services" or "company" or "agency" | Medium |

**Recommended:**
`Calgary SEO Services | SEO Agency Calgary | TML Agency`

This hits: "calgary seo", "seo services", "seo agency calgary" naturally.

### 2. Meta Description

**Rendered:** `Specialized SEO services for Edmonton businesses. Rank higher on Google, get more customers. Free consultation. 200+ clients, proven results.`
**Problem:** Says "Edmonton" -- completely wrong city. Variable `$metaDescription` is never updated.

**Recommended:**
`Calgary SEO services that deliver results. TML Agency helps Calgary businesses rank higher on Google with proven SEO strategies. 500+ clients. Free audit.`

Hits: "calgary seo", "seo services", "calgary businesses".

### 3. H1 Tag

**Rendered:** `Best SEO in Edmonton | Get More Customers From Google`
**Problem:** Says "Edmonton" because `$city = "Edmonton"`. The H1 is on the Calgary page but displays the wrong city.

**Recommended:**
`Best SEO Agency in Calgary | Get More Customers From Google`

Hits: "seo agency in calgary", close match to "seo calgary".

### 4. Canonical URL

**Rendered:** `https://townmedialabs.ca/services/seo-edmonton/`
**Problem:** Points to the Edmonton page. This tells Google to ignore this page entirely and credit Edmonton. This is the most damaging single issue.

**Fix:** `https://townmedialabs.ca/services/seo-in-calgary/`

### 5. Open Graph Image

**Rendered:** `/images/edmonton-seo-og.jpg`
**Problem:** References an Edmonton-specific image.

**Fix:** Use `/images/calgary-seo-og.jpg` or a generic SEO image.

### 6. Schema Markup (All Wrong)

Every schema block references Edmonton:

| Schema Type | Problem |
|-------------|---------|
| Organization | `areaServed` = "Edmonton, Alberta" |
| LocalBusiness | `name` = "TML Agency - SEO Services Edmonton", `addressLocality` = "Edmonton", `postalCode` = "T5J" (Edmonton postal code) |
| Service | `name` = "SEO Services in Edmonton", `areaServed` = "Edmonton, Alberta" |
| Breadcrumb | Final item = "SEO in Edmonton" pointing to `seo-edmonton/` |
| Article | `image` = `edmonton-seo-hero.jpg` |
| FAQ | All questions reference "Edmonton" (e.g., "How much does SEO cost in Edmonton?") |

**Fix:** All schema blocks must reference Calgary. PostalCode should be T2P (Calgary downtown). Area served should reference Calgary, Airdrie, Cochrane, and southern Alberta per `locations.json`.

### 7. Body Content -- Local Signals

| Signal | Current State | Should Be |
|--------|--------------|-----------|
| City name | "Edmonton" throughout (via `$city` variable) | "Calgary" |
| Population stat | 1.24M (Edmonton metro, roughly correct for Calgary too, but labeled Edmonton context) | 1.34M (Calgary CMA) |
| Business count | 29,894 | Should use Calgary-specific data |
| Growth rate | 3.0% | Should use Calgary-specific data |
| Case studies | All 5 reference Edmonton businesses (e.g., "Plumber Edmonton" ranking, "Edmonton Realtor", "Dentist Edmonton", "CPA Edmonton") | Need Calgary-specific case studies or at minimum city-neutral ones |
| Testimonials | One testimonial explicitly says "B2B professional services firm in Edmonton" | Must reference Calgary |
| Phone number | 780 area code (Edmonton) | Should be 403 or 587 (Calgary) |
| Footer | "Best SEO Services in Edmonton" | "Best SEO Services in Calgary" |

### 8. Enrichments.json -- Calgary Data Exists but Is Unused

The enrichments file has rich Calgary-specific content under key `seo-in-calgary` that the view file completely ignores:

- **h1:** "Best SEO Agency in Calgary" (good, not used)
- **tagline:** "From Downtown Calgary to Stephen Avenue, we power Calgary's growth." (good, not used)
- **heroBadge:** "Serving Calgary, Airdrie, Cochrane, and southern Alberta" (good, not used)
- **heroDescription:** Rich Calgary-specific copy mentioning energy sector, Stephen Avenue, Beltline (not used)
- **keywords:** Includes "seo calgary", "seo agency calgary", "seo services calgary", "calgary seo agency" (not used)
- **whyChoose:** 4 Calgary-specific selling points (not used)
- **processSteps:** 4 steps with Calgary-specific language (not used)
- **localContent:** 3 paragraphs about Calgary's energy sector, Stephen Avenue, Kensington, Beltline, Bow Tower, East Village, Stampede (not used)
- **marketInsight:** "73% of local searches lead to a visit within 24 hours" with Calgary copy (not used)
- **FAQs:** 4 Calgary-specific FAQs (not used)
- **industries:** Oil & Gas, Finance, Tech, Agriculture, Tourism, Construction, Film, etc. (not used)

### 9. Locations.json -- Calgary Data Exists but Is Unused

Under key `calgary`:
- Region: "Calgary, Airdrie, Cochrane, and southern Alberta"
- Landmarks: Downtown Calgary, Stephen Avenue, Kensington, Beltline, University District
- Industries: oil & gas, finance, tech, agriculture, tourism, construction, film
- 3 unique content paragraphs about Calgary's market

None of this is pulled into the view.

---

## Keyword Gap Analysis

### Keywords Missing From All On-Page Elements

Every single target keyword is absent because the page renders Edmonton content. Specifically missing:

1. **"seo calgary" / "calgary seo"** -- The #1 and #2 priority keywords (1,900 + 1,600 vol) appear nowhere in rendered content
2. **"seo services calgary" / "calgary seo services"** -- High volume (1,600 + 880) with no presence
3. **"calgary seo company" / "seo company calgary"** -- 1,000 vol each, zero mentions
4. **"calgary seo expert" / "seo expert calgary" / "expert seo calgary"** -- Combined 2,880 vol, zero mentions
5. **"seo agency calgary"** -- 880 vol, zero mentions
6. **"search engine optimization calgary"** -- 1,000 vol, zero mentions. The full phrase "search engine optimization" does not appear anywhere on the page
7. **"seo services in calgary"** -- 1,300 vol, zero mentions

### Keywords in Enrichments but Not in View

The enrichments.json `keywords` array contains: "seo calgary", "seo agency calgary", "seo services calgary", "seo company calgary", "best seo calgary", "calgary seo agency". These would serve as the page's keyword targets if the view actually consumed the enrichments data.

---

## Priority Fixes

### P0 -- Critical (Page is effectively broken for Calgary SEO)

| # | Fix | Impact |
|---|-----|--------|
| 1 | **Change canonical URL** from `seo-edmonton/` to `seo-in-calgary/` | Without this, Google indexes this as a duplicate of Edmonton and ignores it entirely |
| 2 | **Change `$city` variable** from "Edmonton" to "Calgary" | Fixes H1, all body copy, FAQ headings, footer -- every `$city` reference |
| 3 | **Change `$metaDescription`** to Calgary-specific copy with target keywords | Currently tells Google this page is about Edmonton |
| 4 | **Change `$pageTitle`** to include "Calgary SEO" keywords | OG title and schema use this variable |
| 5 | **Change `$citySlug`** from "edmonton" to "calgary" | Affects URL references |
| 6 | **Change `$pageKeywords`** to Calgary keyword list | Currently all Edmonton keywords |

### P1 -- High (Schema and local signals wrong)

| # | Fix | Impact |
|---|-----|--------|
| 7 | **Fix all schema markup** -- Organization, LocalBusiness, Service, Breadcrumb, Article, FAQ -- to reference Calgary | Structured data sends entirely wrong geographic signals |
| 8 | **Fix LocalBusiness postal code** from T5J to T2P (Calgary) | Wrong city in address schema |
| 9 | **Fix phone number** from 780 to 403/587 area code | Wrong local signal |
| 10 | **Fix OG image** from `edmonton-seo-og.jpg` to Calgary variant | Wrong city in social shares |
| 11 | **Update case studies** to use Calgary business names and keywords (e.g., "Plumber Calgary" not "Plumber Edmonton") | Entire case study section references wrong city |

### P2 -- Medium (Use enrichments data, add missing keywords)

| # | Fix | Impact |
|---|-----|--------|
| 12 | **Refactor view to consume enrichments.json** data instead of hardcoded variables, or at minimum update all hardcoded values to Calgary equivalents | Enrichments has excellent Calgary-specific content sitting unused |
| 13 | **Add "search engine optimization" phrase** in full at least once in body copy | Covers "search engine optimization calgary" (1,000 vol, KD 36) |
| 14 | **Add "seo expert" or "seo experts" phrase** in H1, subheadings, or body | Covers "calgary seo expert" (1,000), "seo expert calgary" (880), "expert seo calgary" (1,000) |
| 15 | **Add "seo company" phrase** in body or subheading | Covers "calgary seo company" (1,000), "seo company calgary" (1,000) |
| 16 | **Add "seo services in Calgary" phrase** naturally in intro or service section | Covers exact match "seo services in calgary" (1,300) |
| 17 | **Update market data** (population, business count, growth rate) to Calgary-specific figures | Current stats are Edmonton-sourced |
| 18 | **Add Calgary neighborhood/landmark references** from enrichments: Stephen Avenue, Kensington, Beltline, University District, Bow Tower, East Village | Strong local signals completely absent |
| 19 | **Add Calgary industry references** from enrichments: energy sector, Stampede marketing window, boom-and-bust cycles | Differentiates from generic content |
| 20 | **Update testimonials** -- at least remove explicit "Edmonton" reference in Beacon Accounting testimonial | Contradicts page location |

---

## Recommended Title/Meta/H1

**Title:** `Calgary SEO Services | Expert SEO Company in Calgary | TML Agency`
- Hits: "calgary seo", "seo services", "seo company in calgary", "expert seo"

**Meta Description:** `Looking for expert SEO services in Calgary? TML Agency is a Calgary SEO company delivering proven results for 500+ businesses. Free SEO audit. Call today.`
- Hits: "seo services in calgary", "calgary seo company", "expert seo", "seo services in calgary"

**H1:** `Best SEO Agency in Calgary` (matches enrichments.json)
- Hits: "seo agency in calgary", close match "seo calgary"

**H2 suggestions to work in keywords:**
- "Calgary SEO Services That Drive Real Business Growth" (hits "calgary seo services")
- "Why Calgary Businesses Choose TML as Their SEO Company" (hits "seo company", "calgary businesses")
- "Our Calgary SEO Experts Deliver Measurable Results" (hits "calgary seo experts")
- "Search Engine Optimization in Calgary: Our Proven Process" (hits "search engine optimization calgary")

---

## Score Summary

| Category | Score | Notes |
|----------|-------|-------|
| Title Tag | 3/10 | Hardcoded correctly for Calgary but missing key phrases |
| Meta Description | 0/10 | Says "Edmonton" -- completely wrong |
| H1 | 0/10 | Renders "Edmonton" -- completely wrong |
| Canonical | 0/10 | Points to Edmonton page -- tells Google to ignore this page |
| Schema | 0/10 | All 6 schema blocks reference Edmonton |
| Local Signals | 0/10 | Zero Calgary landmarks, neighborhoods, or market data |
| Keyword Coverage | 0/12 | Zero of 12 target keywords present in rendered output |
| Content Quality | 4/10 | Content itself is well-written and comprehensive but is for the wrong city |
| Enrichments Usage | 0/10 | Rich Calgary data in enrichments.json is completely unused |

**Overall Page Score: 1/10** -- The page is fundamentally broken. It is an Edmonton page wearing a Calgary filename. Google will either ignore it (canonical points to Edmonton) or penalize it as thin/duplicate content. No target keyword is present in the rendered output. The fix is straightforward: update all PHP variables to Calgary values, fix the canonical, update schemas, and ideally refactor to consume the enrichments.json data that already contains excellent Calgary-specific content.
