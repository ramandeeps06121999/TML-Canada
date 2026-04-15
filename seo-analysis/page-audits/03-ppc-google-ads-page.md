# PPC & Google Ads Service Pages -- SEO Audit

**Date:** 2026-04-14
**Pages Audited:**
- `/services/google-ads`
- `/services/ppc-management`

**Target Keywords:**
| Keyword | Monthly Volume | KD | Priority |
|---------|---------------|-----|----------|
| google ads agency | 1,600 | 16 | HIGH -- quick win, low KD |
| ppc agency | 1,000 | 32 | HIGH |
| ppc campaign management services | 140 | 10 | MEDIUM -- low KD, quick win |

---

## PAGE 1: /services/google-ads

### Current State

| Element | Current Value | Issue |
|---------|--------------|-------|
| **Title tag** | `Best Google Ads Services in Canada \| TML Agency` | Missing "agency" keyword; "Services" is generic filler |
| **Meta description** | `Certified Google Partner agency offering expert Google Ads and PPC management in Edmonton. Maximize your ROAS with TML Agency's data-driven SEM campaigns acr...` | Truncated (likely >160 chars); starts with "Certified" not the primary keyword |
| **H1** | `Best Google Ads Services.` | Missing "agency"; "Services" dilutes keyword match for "google ads agency" |
| **H2s** | "Our Google Ads Services", "Why Your Business Needs Google Ads", deep content headings, FAQ, Process | No H2 contains "google ads agency" or "ppc agency" |
| **Schema** | Service + BreadcrumbList + FAQPage | Good foundation; missing AggregateRating, missing hasOfferCatalog |
| **FAQs** | 4 questions | Too few; none target "google ads agency" or "ppc campaign management services" as phrases |
| **Content** | ~1,800+ words across seoContent + deepContent | Good length; "google ads agency" appears 0 times as exact phrase in body; "ppc agency" appears 0 times |
| **Internal links** | Related services: seo, lead-generation, social-media | Missing cross-link to /services/ppc-management |

### Issues Found

1. **Title tag does not contain primary keyword.** "google ads agency" (1,600 vol, KD 16) is the #1 target but the title says "Best Google Ads Services in Canada". The word "agency" is completely absent from the title.

2. **H1 misses primary keyword.** Same problem -- "Best Google Ads Services." should be "Best Google Ads Agency in Canada." or similar.

3. **Meta description is truncated.** The stored value ends with "acr..." suggesting it exceeds the ~155-160 character limit. Google will rewrite it.

4. **Zero exact-match usage of "google ads agency" in body copy.** The phrase "Google Partner agency" appears but "google ads agency" as a standalone phrase does not appear once. This is the highest-volume, lowest-KD keyword.

5. **"ppc campaign management services" not referenced anywhere.** This KD-10 keyword is a free win but neither page targets it explicitly.

6. **Deep content heading has a typo: "Canadan" instead of "Canadian."** Line: "How Google Ads Works: A Complete Guide for Canadan Businesses". This affects perceived E-E-A-T quality.

7. **Currency inconsistency.** Body copy says "every rupee of your ad spend" and pricing uses INR (crore), but the page targets Canada/Edmonton. The pricing section mentions "$15,000/month" (CAD?) alongside "five crore". Mixed INR/CAD signals confuse both users and search engines about geo-relevance.

8. **FAQ schema has only 4 questions.** Competitors in the "google ads agency" SERP typically have 6-10 FAQ items. More FAQs = more SERP real estate via rich snippets.

9. **No AggregateRating in schema.** Adding review/rating structured data would enhance SERP snippet appearance.

10. **Missing cross-link to /services/ppc-management.** These two pages should interlink heavily since they share keyword topicality.

### Recommendations for /services/google-ads

#### Title Tag (CRITICAL)
```
Current:  Best Google Ads Services in Canada | TML Agency
Proposed: Google Ads Agency in Canada | Certified Google Partner | TML
```
- Puts exact-match "google ads agency" at the front
- Keeps under 60 characters
- "Certified Google Partner" is a trust differentiator

**Implementation:** In `servicePages.json`, the `metaTitle` field is not used -- the title is built in `service-detail.php` line 25 as `'Best ' . $titleName . ' Services in Canada | TML Agency'`. Either:
- Add `google-ads` to the `$shortTitles` array with a custom override, OR
- Better: add a title override mechanism in the JSON for pages where the formula does not work

#### Meta Description (CRITICAL)
```
Current:  Certified Google Partner agency offering expert Google Ads and PPC management in Edmonton...
Proposed: Top-rated Google Ads agency in Canada. We manage PPC campaigns that deliver 4.2x average ROAS. Free Google Ads audit. Certified Google Partner -- TML Agency.
```
- Exact-match "Google Ads agency" in first 5 words
- Includes "PPC campaigns" for secondary keyword
- Under 155 characters
- Includes social proof (4.2x ROAS) and CTA (Free audit)

#### H1 (CRITICAL)
```
Current:  Best Google Ads Services.
Proposed: Best Google Ads Agency in Canada.
```
- Change "Services" to "Agency in Canada" -- matches the #1 keyword exactly
- **Implementation:** Either override in `$shortTitles` map or add H1 override logic. The H1 is built on line 158: `'Best ' . $data['title'] . ' Services'`. Since `$data['title']` is "Google Ads", changing it to "Google Ads Agency" would break other references. Better to add an H1 override field in the JSON.

#### Body Content Keyword Integration (HIGH)
Add these exact phrases naturally into the seoContent paragraphs:
- "google ads agency" -- use 3-4 times across the page (currently 0)
- "ppc agency" -- use 2-3 times (currently 0)
- "ppc campaign management services" -- use 1-2 times (currently 0)

Suggested insertion points:
- seoContent paragraph 1: "As a leading **Google Ads agency** in Canada, TML Agency's certified PPC specialists..."
- seoContent paragraph 3: "As a certified Google Partner and trusted **PPC agency**, TML meets the highest standards..."
- Add a new seoContent paragraph or deepContent section specifically about "**PPC campaign management services**" covering what is included

#### Fix Typo (QUICK WIN)
```
Current:  "How Google Ads Works: A Complete Guide for Canadan Businesses"
Fix:      "How Google Ads Works: A Complete Guide for Canadian Businesses"
```
Also fix "Canadan" in the paragraph body (line 189).

#### Fix Currency/Geo Inconsistency (HIGH)
- Replace "every rupee of your ad spend" with "every dollar of your ad spend"
- Clarify pricing in consistent CAD: "five crore" is meaningless to Canadian businesses
- Ensure all pricing references use CAD with clear denominations

#### Expand FAQs (MEDIUM)
Add these keyword-rich FAQ items:
1. "How much does a Google Ads agency charge?" (targets "google ads agency" + commercial intent)
2. "What does PPC campaign management include?" (targets "ppc campaign management services")
3. "How do I choose the right PPC agency?" (targets "ppc agency")
4. "What is the difference between Google Ads management and PPC management?" (interlinks both pages conceptually)
5. "Can a Google Ads agency guarantee results?" (common search query)
6. "What industries do you manage Google Ads for?" (long-tail + E-E-A-T)

#### Schema Enhancements (MEDIUM)
- Add `AggregateRating` to Service schema (e.g., 4.9/5 based on 150+ client reviews)
- Add `hasOfferCatalog` with service tiers
- Add `areaServed` with `Country` type for Canada
- Consider adding `ProfessionalService` as additional @type

#### Internal Linking (MEDIUM)
- Add explicit cross-link to `/services/ppc-management` in body content
- Add cross-link to `/services/lead-generation` with anchor text mentioning PPC lead gen
- Add contextual links from deep content sections to relevant blog posts

---

## PAGE 2: /services/ppc-management

### Current State

| Element | Current Value | Issue |
|---------|--------------|-------|
| **Title tag** | `Best PPC Management Services in Canada \| TML Agency` | "PPC Management" is okay but misses "ppc agency" keyword |
| **Meta description** | `Expert PPC management across Google, Meta, LinkedIn, and YouTube. TML Agency in Edmonton delivers data-driven paid advertising that maximises your ROI across...` | Truncated; does not contain "ppc agency" |
| **H1** | `Best PPC Management Services.` | Misses "ppc agency" exact match |
| **H2s** | "Our PPC Management Services", "Why Your Business Needs PPC Management", deep content headings | No H2 contains "ppc agency" |
| **Schema** | Service + BreadcrumbList + FAQPage | Same gaps as google-ads page |
| **FAQs** | 5 questions | Slightly better than google-ads but still no keyword-targeted questions |
| **Content** | ~1,500+ words | Good; "ppc agency" appears in metaKeywords but not prominently in body |
| **Spelling** | Uses British spelling ("optimises", "maximises") | Inconsistent with Canadian English conventions; not a ranking issue but affects perceived quality |

### Issues Found

1. **"ppc agency" not in title or H1.** The page targets "PPC Management" but the higher-volume keyword "ppc agency" (1,000/mo) is absent from the title and H1.

2. **Meta description truncated.** Same issue as google-ads page.

3. **"ppc campaign management services" absent.** This exact phrase (140 vol, KD 10) does not appear anywhere on the page despite being a perfect semantic fit.

4. **No mention of "google ads agency" on this page.** Since this page covers Google Ads as part of multi-platform PPC, referencing this keyword with a link to the google-ads page would strengthen both pages.

5. **Currency/geo confusion persists.** "every rupee of your ad budget", "55 crore in total ad spend" -- same INR/Canada mismatch.

6. **Deep content has only 3 sections vs 5 on google-ads page.** Less content depth means fewer ranking signals.

### Recommendations for /services/ppc-management

#### Title Tag (CRITICAL)
```
Current:  Best PPC Management Services in Canada | TML Agency
Proposed: PPC Agency in Canada | Campaign Management Services | TML
```
- Leads with "PPC Agency" (1,000 vol keyword)
- Includes "Campaign Management Services" (captures "ppc campaign management services")
- Under 60 characters

#### Meta Description (CRITICAL)
```
Current:  Expert PPC management across Google, Meta, LinkedIn...
Proposed: Leading PPC agency managing Google, Meta, LinkedIn & YouTube ads. Our PPC campaign management services deliver 32% avg CPA reduction. Free PPC audit -- TML Agency.
```
- Contains "PPC agency" and "PPC campaign management services"
- Social proof (32% CPA reduction from their stats)
- Under 160 characters

#### H1 (CRITICAL)
```
Current:  Best PPC Management Services.
Proposed: Best PPC Agency in Canada.
```
Or: `PPC Campaign Management Services.` to hit the long-tail keyword.

#### Body Content Keyword Integration (HIGH)
- "ppc agency" -- add 3-4 exact-match uses across seoContent and deepContent
- "ppc campaign management services" -- add 2-3 uses, including once in the first seoContent paragraph
- "google ads agency" -- use once with a link to /services/google-ads

#### Expand Deep Content (MEDIUM)
Add 2 more deepContent sections to match depth of google-ads page:
1. "How to Choose the Right PPC Agency for Your Business" (directly targets "ppc agency")
2. "PPC Campaign Management Services: What's Included" (directly targets the long-tail keyword)

#### Fix Currency/Geo (HIGH)
Same fixes as google-ads page -- replace "rupee" with "dollar", convert "crore" to CAD-denominated figures.

#### Expand FAQs (MEDIUM)
Add:
1. "What makes a good PPC agency?" (targets "ppc agency")
2. "What are PPC campaign management services?" (exact-match long-tail)
3. "How much should I spend on PPC advertising?" (high search volume question)
4. "What is the difference between PPC management and Google Ads management?" (connects both pages)

#### Internal Linking (MEDIUM)
- Cross-link to `/services/google-ads` with "Google Ads agency" as anchor text
- Cross-link to `/services/meta-ads` and `/services/linkedin-ads`
- Link from deep content to relevant case studies or blog posts

---

## Cross-Page Strategy: Avoiding Cannibalization

These two pages risk keyword cannibalization. Define clear keyword ownership:

| Keyword | Owned By | Secondary Mention On |
|---------|----------|---------------------|
| google ads agency | /services/google-ads | /services/ppc-management (with link) |
| ppc agency | /services/ppc-management | /services/google-ads (with link) |
| ppc campaign management services | /services/ppc-management | -- |
| google ads management | /services/google-ads | -- |
| pay per click advertising | /services/ppc-management | -- |
| google partner agency | /services/google-ads | -- |

---

## Implementation Priority

| Priority | Task | Page | Impact | Effort |
|----------|------|------|--------|--------|
| 1 | Fix title tags with target keywords | Both | HIGH | LOW |
| 2 | Fix H1s with target keywords | Both | HIGH | LOW |
| 3 | Fix meta descriptions (length + keywords) | Both | HIGH | LOW |
| 4 | Fix "Canadan" typo | google-ads | MEDIUM | TRIVIAL |
| 5 | Add exact-match keywords to body copy | Both | HIGH | MEDIUM |
| 6 | Fix currency/geo inconsistency (rupee/crore) | Both | HIGH | MEDIUM |
| 7 | Add 5-6 keyword-targeted FAQ items per page | Both | MEDIUM | MEDIUM |
| 8 | Add cross-links between the two pages | Both | MEDIUM | LOW |
| 9 | Add 2 more deepContent sections to ppc-management | ppc-management | MEDIUM | MEDIUM |
| 10 | Enhance schema (AggregateRating, areaServed) | Both | MEDIUM | LOW |

---

## Technical Implementation Notes

### Title Tag Override
The title is generated on `service-detail.php` line 25:
```php
$title = 'Best ' . $titleName . ' Services in Canada | TML Agency';
```
The `$shortTitles` array (lines 13-23) only handles abbreviations, not full overrides. Options:
1. **Quick fix:** Add entries to `$shortTitles`: `'google-ads' => 'Google Ads Agency'` and `'ppc-management' => 'PPC Agency'` -- but this changes H1 too since H1 uses `$data['title']` not `$titleName`
2. **Better fix:** Add a `titleOverride` field in `servicePages.json` that bypasses the formula entirely when present. Check in `service-detail.php`: `$title = $data['titleOverride'] ?? ('Best ' . $titleName . ' Services in Canada | TML Agency');`

### H1 Override
H1 on line 158: `Best <?= tml_e($data['title']) ?> Services`
Since `$data['title']` feeds into multiple places (H2s, breadcrumbs, schema), do NOT change it. Instead add an `h1Override` field in JSON:
```php
$h1Text = $data['h1Override'] ?? ('Best ' . tml_e($data['title']) . ' Services');
```

### Meta Description Fix
The `metaDescription` field in `servicePages.json` is used directly. Simply update the JSON value for both entries to the proposed descriptions (ensure under 155 chars).

### FAQ Additions
Add to the `faqs` array in `servicePages.json` for each page. The template and FAQPage schema auto-generate from this array.
