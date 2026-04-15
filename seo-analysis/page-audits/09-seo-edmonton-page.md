# SEO Edmonton Page Audit

**Date:** 2026-04-14
**Page:** `/services/seo-in-edmonton/` (live production page)
**View files:** `views/seo-in-edmonton.php` (template), `views/edmonton-seo.php` (standalone long-form)
**Enrichments key:** `seo-in-edmonton` in `data/enrichments.json`
**Locations key:** `edmonton` in `data/locations.json`

---

## Target Keywords & Opportunity

| Keyword | Volume | KD | Priority |
|---------|--------|-----|----------|
| edmonton seo | 2,400 | 35 | HIGH - Low KD |
| seo edmonton | 1,900 | 30 | HIGH - Low KD |
| edmonton seo services | 1,000 | 26 | HIGH - Very Low KD |
| edmonton seo agency | 1,000 | 33 | HIGH - Low KD |
| search engine optimization edmonton | 1,600 | 21 | CRITICAL - Very Low KD |
| local seo edmonton | 590 | 13 | CRITICAL - Very Low KD |
| seo companies in edmonton | 140 | 25 | MEDIUM |
| best seo company in edmonton | 210 | 26 | MEDIUM |
| edmonton local seo | 210 | -- | MEDIUM |
| edmonton local seo services | 210 | -- | MEDIUM |

**Total addressable search volume: ~9,460/month**
**Average KD: ~26 -- this is one of the lowest-competition high-volume markets in Canada.**

---

## Architecture Issue: Two Competing Pages

There are TWO view files targeting Edmonton SEO:

1. **`views/seo-in-edmonton.php`** -- Template-based page, serves the live URL `/services/seo-in-edmonton/`
   - Canonical: `https://townmedialabs.ca/services/seo-in-edmonton/`
   - Title: "SEO in Edmonton | TML Agency" (hardcoded in live index.php) / "Best SEO in Edmonton | TML Agency | SEO Experts" (in view file title tag)
   - H1: "Leading SEO Agency in Edmonton"

2. **`views/edmonton-seo.php`** -- Standalone long-form page (608 lines, ~5,000 words)
   - Canonical: `https://townmedialabs.ca/services/seo-edmonton/` (no matching directory exists)
   - Title: "Best SEO in Edmonton | TML Agency"
   - H1: "Best SEO in Edmonton | Get More Customers From Google"

**CRITICAL ISSUE:** `edmonton-seo.php` has a canonical pointing to `/services/seo-edmonton/` but there is NO `services/seo-edmonton/` directory. This file is orphaned -- it is not deployed. All the rich content (5 case studies, 27 FAQs, detailed pricing, 7-phase process) in this file is NOT being served to users or search engines.

**Recommendation:** Either:
- (A) Deploy `edmonton-seo.php` at `/services/seo-edmonton/` as a separate long-form content piece, OR
- (B) Merge the best content from `edmonton-seo.php` into the live `seo-in-edmonton` page, OR
- (C) If both URLs will exist, set proper canonical and cross-link them

---

## Live Page Audit: `/services/seo-in-edmonton/`

### Title Tag
**Current:** `SEO in Edmonton | TML Agency`
**Length:** 33 characters (too short, wasting real estate)
**Issues:**
- Does NOT contain the #1 keyword "edmonton seo" -- it has "SEO in Edmonton" which is an awkward word order
- Missing power words ("Best", "Services", "Agency")
- Does not front-load the primary keyword

**Recommended:** `Edmonton SEO Services | Top SEO Agency in Edmonton | TML`
- 58 chars, contains: "edmonton seo services", "seo agency in edmonton", "edmonton seo"

### Meta Description
**Current:** `Looking for seo in Edmonton? TML Agency offers strategic solutions for Edmonton businesses. 500+ brands served. Get started today.`
**Length:** 131 characters
**Issues:**
- "seo" not capitalized -- looks unprofessional in SERPs
- Generic template copy -- not Edmonton-specific enough
- Missing keywords: "edmonton seo services", "local seo edmonton", "search engine optimization"
- No mention of specific services or differentiators

**Recommended:** `Edmonton SEO services that drive real results. Local SEO, technical SEO, and search engine optimization for Edmonton businesses. 500+ clients served. Free SEO audit.`
- 165 chars, hits: "edmonton seo services", "local seo", "search engine optimization", "edmonton businesses"

### H1 Tag
**Current:** `Leading SEO Agency in Edmonton`
**Issues:**
- Does not match the #1 target keyword "edmonton seo"
- "Leading" is a weak claim word without proof
- Missing "services" which is a high-volume modifier

**Recommended:** `Edmonton SEO Services -- Grow Your Business with Expert SEO`
- Contains: "edmonton seo services", "edmonton seo"

### H2 Structure (Live Page)
| H2 | Keyword Alignment |
|----|-------------------|
| Why Edmonton businesses choose us | Weak -- no target keywords |
| Our SEO Process in Edmonton | OK -- "seo" + "edmonton" |
| Our SEO Services in Edmonton | GOOD -- close to "seo services edmonton" |
| Why Edmonton Businesses Trust Our SEO | Weak -- generic trust signal |
| SEO in Edmonton | OK but thin H2 |
| SEO Investment in Edmonton | OK -- pricing context |
| Industries We Serve in Edmonton | Weak -- no SEO keywords |
| Trusted by Edmonton Businesses | Weak -- no SEO keywords |
| Unlock Your Business Potential with Comprehensive SEO Services in Edmonton | Too long but good keyword density |
| SEO in Edmonton -- FAQs | OK |
| SEO Insights & Articles | Weak |
| Industries We Serve in Edmonton (duplicate) | DUPLICATE H2 -- bad for SEO |
| Ready to grow in Edmonton? | Weak CTA H2 |

**Issues:**
- DUPLICATE H2: "Industries We Serve in Edmonton" appears twice
- Missing H2s for high-value keywords: "Local SEO Edmonton", "Search Engine Optimization Edmonton", "Edmonton SEO Agency", "Best SEO Company in Edmonton"
- Too many H2s (13) -- dilutes topical focus

### Content Depth
**Live page (`/services/seo-in-edmonton/`):**
- Template-generated page with enrichments data
- Thin content -- mostly short paragraphs from enrichments.json
- No case studies, no detailed process, no pricing tiers
- FAQ section has only 4 generic questions (from enrichments)
- No word count depth -- estimated 800-1,200 words of unique content

**Orphaned page (`edmonton-seo.php`):**
- ~5,000+ words of deep content
- 5 detailed Edmonton-specific case studies with metrics
- 27 FAQ questions (10 in schema)
- 7-phase process breakdown
- Transparent pricing with 3 tiers
- 5 client testimonials
- Market opportunity data (1.24M population, 29,894 businesses)
- **This content is NOT live -- massive waste**

---

## Keyword Coverage Analysis

| Target Keyword | In Title? | In H1? | In H2s? | In Body? | In Schema? |
|----------------|-----------|--------|---------|----------|------------|
| edmonton seo | NO | NO | NO | Partial | NO |
| seo edmonton | Partial | Partial | YES | YES | YES |
| edmonton seo services | NO | NO | Partial | NO | NO |
| edmonton seo agency | NO | NO | NO | NO | YES (enrichments) |
| search engine optimization edmonton | NO | NO | NO | NO | NO |
| local seo edmonton | NO | NO | NO | NO | NO |
| seo companies in edmonton | NO | NO | NO | NO | NO |
| best seo company in edmonton | NO | NO | NO | NO | NO |
| edmonton local seo | NO | NO | NO | NO | NO |
| edmonton local seo services | NO | NO | NO | NO | NO |

**Keyword coverage is TERRIBLE for a page that should dominate a low-KD market.**

---

## Enrichments Data Issues

The `seo-in-edmonton` enrichments entry has:
- **H1:** "Best SEO Agency in Edmonton" -- better than live H1 but still missing "services"
- **Meta title:** "Best SEO in Edmonton | TML Agency" -- better than live but missing "services"
- **Meta description:** Generic template copy
- **Keywords list:** `["seo edmonton", "seo agency edmonton", "seo services edmonton", "seo company edmonton", "best seo edmonton", "seo edmonton", "seo alberta", "seo canada", "edmonton seo agency"]`
  - Has "edmonton seo agency" but missing: "edmonton seo services", "search engine optimization edmonton", "local seo edmonton"
  - Duplicate "seo edmonton" in the list
- **FAQs:** Only 4 generic questions -- the orphaned `edmonton-seo.php` has 27

---

## Schema Markup

### Live page schemas:
1. **Service** -- name: "SEO in Edmonton" (should be "Edmonton SEO Services")
2. **ProfessionalService** -- has address with 11930 104 St NW, geo coordinates (53.5461, -113.4937) -- GOOD
3. **BreadcrumbList** -- proper hierarchy Home > Services > SEO > Edmonton -- GOOD
4. **FAQPage** -- only 4 questions, should have 10-15+

### Orphaned page schemas (NOT live):
1. Organization with AggregateRating (4.8/5, 127 reviews)
2. LocalBusiness with pricing ($2,499-$12,999)
3. Service with OfferCatalog (3 pricing tiers)
4. BreadcrumbList
5. Article with author
6. FAQPage with 10 questions

**Missing from live page:**
- No AggregateRating/Review schema
- No pricing/Offer schema
- No Article schema with author (E-E-A-T signal)
- FAQPage too thin (4 vs. 10+ questions)

---

## Local Edmonton Signals

### Present:
- TML office address: 11930 104 St NW, Edmonton
- Geo coordinates: 53.5461, -113.4937
- Service area mentions: St. Albert, Sherwood Park, greater Edmonton metro
- Local landmarks: Downtown Edmonton, Whyte Avenue, West Edmonton Mall, Ice District, 104 Street NW
- Local industries: oil & gas, tech startups, government, construction, agriculture, healthcare, education, logistics
- Bilingual support mention (English/Punjabi)

### Missing:
- Edmonton neighborhood-specific content (Windermere, Summerside, Rutherford, Oliver, Strathcona)
- Edmonton-specific statistics or market data on the live page
- Local case studies (exist in orphaned file but NOT on live page)
- References to Edmonton business organizations (Edmonton Chamber of Commerce, EEDC)
- Nearby city service area pages linking (Calgary, Red Deer, Fort McMurray)
- Edmonton Google Business Profile link
- Map embed

---

## Pricing Discrepancy

- **Live page:** $500/month starter, $1,200-$2,500 mid-tier, $4,000+ enterprise
- **Orphaned page:** $2,499/month starter, $5,999 growth, $12,999 premium
- **Enrichments/schema:** References $2,499-$12,999

**This is a significant inconsistency.** The live page shows much lower pricing. Need to decide which pricing is accurate and ensure consistency.

---

## Priority Fixes (Ranked by Impact)

### P0 -- Critical (Do This Week)

1. **Deploy the orphaned content.** The `edmonton-seo.php` file has 5,000+ words of rich, Edmonton-specific content including case studies, detailed FAQs, process documentation, and testimonials. This content is sitting unused. Either:
   - Merge the best elements into the live `/services/seo-in-edmonton/` page
   - Deploy it at `/services/seo-edmonton/` as a complementary page (with cross-links)

2. **Fix the title tag.** Change from "SEO in Edmonton | TML Agency" to something like "Edmonton SEO Services | Top SEO Agency in Edmonton | TML" to capture "edmonton seo", "edmonton seo services", and "seo agency in edmonton".

3. **Fix the H1.** Change from "Leading SEO Agency in Edmonton" to include "Edmonton SEO Services" -- the exact-match keyword with 1,000 volume and KD 26.

4. **Fix the meta description.** Rewrite to include "edmonton seo", "seo services", "local seo", and "search engine optimization" naturally.

### P1 -- High Priority (This Sprint)

5. **Add "search engine optimization edmonton" content section.** This is 1,600 volume with KD 21 -- extremely easy to rank for. Add a dedicated H2 section explaining what search engine optimization means for Edmonton businesses.

6. **Add "local SEO edmonton" content section.** 590 volume, KD 13 -- one of the easiest keywords. Create a dedicated section about local SEO services for Edmonton with GBP optimization, local citations, map pack ranking.

7. **Expand FAQ section.** Move from 4 generic FAQs to 10-15 Edmonton-specific FAQs. The orphaned file already has 10 in schema and 27 in content -- use those.

8. **Add case studies to live page.** The orphaned file has 5 detailed Edmonton case studies. Add at least 2-3 to the live page.

9. **Fix duplicate H2.** "Industries We Serve in Edmonton" appears twice on the live page.

### P2 -- Medium Priority (Next Sprint)

10. **Add AggregateRating schema** to the live page (currently only on orphaned file).

11. **Add Article schema with author** for E-E-A-T signals.

12. **Add pricing/Offer schema** with structured pricing data.

13. **Resolve pricing discrepancy** between live page ($500-$4,000) and orphaned page ($2,499-$12,999).

14. **Add Edmonton neighborhood content** -- mention specific neighborhoods to capture hyper-local searches.

15. **Update enrichments.json keywords** to include missing targets: "edmonton seo services", "search engine optimization edmonton", "local seo edmonton", "edmonton local seo services".

### P3 -- Nice to Have

16. **Add comparison content** -- "Edmonton SEO vs DIY SEO" or "Why Edmonton Businesses Need Local SEO" sections.

17. **Internal linking** -- Link to related service pages (Google Ads in Edmonton, Web Dev in Edmonton, Branding in Edmonton) and nearby city SEO pages (Calgary, Red Deer).

18. **Add map embed** showing Edmonton office location.

---

## Estimated Traffic Impact

With KD scores this low (13-35), proper optimization should yield:

| Keyword | Volume | Realistic Rank | Est. CTR | Monthly Clicks |
|---------|--------|---------------|----------|----------------|
| edmonton seo | 2,400 | Top 5 | 8% | 192 |
| seo edmonton | 1,900 | Top 5 | 8% | 152 |
| edmonton seo services | 1,000 | Top 3 | 12% | 120 |
| edmonton seo agency | 1,000 | Top 5 | 8% | 80 |
| search engine optimization edmonton | 1,600 | Top 3 | 12% | 192 |
| local seo edmonton | 590 | Top 3 | 15% | 89 |
| seo companies in edmonton | 140 | Top 5 | 8% | 11 |
| best seo company in edmonton | 210 | Top 5 | 8% | 17 |
| edmonton local seo | 210 | Top 3 | 12% | 25 |
| edmonton local seo services | 210 | Top 3 | 12% | 25 |
| **TOTAL** | **9,260** | | | **~903/month** |

Current estimated organic traffic for this page: likely under 100/month given the thin content and poor keyword targeting.

**Potential uplift: 800-900% increase in organic traffic from this single page.**

---

## Summary

This is the **single biggest SEO opportunity in the TML portfolio** based on keyword difficulty scores. A market with 9,460/month search volume and average KD of 26 is remarkably soft for a major Canadian city. The live page is severely underperforming because:

1. The title, H1, and meta description miss the primary keywords
2. 5,000+ words of rich content (case studies, FAQs, pricing, process) sit in an orphaned file that is NOT deployed
3. Zero coverage for "search engine optimization edmonton" (KD 21, 1,600 vol) and "local seo edmonton" (KD 13, 590 vol)
4. Template-generated thin content vs. competitors who likely have dedicated long-form pages

Fixing the P0 and P1 items should be the top SEO priority for TML right now.
