# SEO Service Page Audit — townmedialabs.ca/services/seo

**Audit Date:** 2026-04-14
**URL:** https://townmedialabs.ca/services/seo
**Page Type:** Service Landing Page
**Priority:** HIGH (core revenue page)

---

## Target Keywords

| Keyword | Monthly Volume | KD | Current Coverage |
|---------|---------------|-----|-----------------|
| seo agency | 5,400 | 53 | MISSING from title, H1, meta |
| seo services | 5,400 | 41 | MISSING from title, H1; partial in meta |
| seo company | 4,400 | 65 | MISSING entirely |
| seo canada | 1,300 | 45 | MISSING entirely |
| seo services canada | 1,000 | 26 | MISSING entirely |
| seo agency canada | 880 | 77 | MISSING entirely |
| seo company canada | 880 | 64 | MISSING entirely |
| best seo company | 880 | 32 | MISSING entirely |
| seo service | 1,000 | 48 | MISSING from title, H1 |
| seo consultant | 1,300 | 47 | MISSING entirely |
| seo expert | 1,300 | 68 | MISSING entirely |

---

## 1. Title Tag

**Current:** `Best SEO Services in Canada | TML Agency`
- Generated dynamically in `service-detail.php` line 25: `'Best ' . $titleName . ' Services in Canada | TML Agency'`
- For the "seo" slug, `$titleName` = "SEO" (no short title override), so output = **"Best SEO Services in Canada | TML Agency"**
- Character count: **43 characters** (under 60 limit)

### Assessment: 6/10
**Strengths:**
- Contains "Best", "SEO Services", "Canada" — covers `seo services`, `best seo` partially
- Under 60 characters with room to spare

**Weaknesses:**
- Does not contain "agency" or "company" — misses `seo agency` (5,400 vol), `seo company` (4,400 vol), `best seo company` (880 vol)
- The `metaTitle` field in JSON ("SEO | TML Agency") is completely ignored — the code overrides it with the template pattern on line 25

### Recommendation:
Change the title to include "agency" which covers `seo agency`, `seo agency canada`, and signals authority:

**Proposed title:** `Best SEO Agency in Canada | SEO Services | TML`
- 49 characters
- Covers: seo agency, seo services, canada, best seo
- Pipe-separated for SERP readability

**Alternative:** `SEO Services Canada | #1 SEO Agency & Company | TML`
- 53 characters
- Covers: seo services, canada, seo agency, seo company

**Implementation:** Add an override in the `$shortTitles` array or add a `$titleOverrides` map in `service-detail.php`:

```php
// In service-detail.php, add a full title override map:
$titleOverrides = [
    'seo' => 'Best SEO Agency in Canada | SEO Services | TML',
];
$title = $titleOverrides[$slug] ?? ('Best ' . $titleName . ' Services in Canada | TML Agency');
```

---

## 2. Meta Description

**Current:** `Expert SEO services in Edmonton offering technical SEO, local SEO, and organic search optimization. Boost your Google rankings and drive traffic with TML Age...`
- Source: `servicePages.json` line 328, `metaDescription` field
- The description appears **truncated in the JSON** — ends with "TML Age..." which means it was stored truncated at ~160 chars

### Assessment: 3/10
**Critical Issues:**
- **Truncated/broken text** — ends with "TML Age..." instead of complete text
- Geo-limited to "Edmonton" — does not target national "Canada" keywords
- Missing CTA (no "Get a free audit", "Contact us", etc.)
- Missing `seo agency`, `seo company`, `seo consultant`, `seo expert`
- No urgency or differentiation signals

### Recommendation:
**Proposed meta description:**
`Top-rated SEO agency in Canada. Our SEO experts deliver proven SEO services — technical audits, link building, local SEO & content strategy. Get a free SEO audit today.`
- 166 characters (within 160 visible, Google may show up to 170)
- Keywords covered: seo agency, canada, seo experts, seo services, seo audit
- Contains CTA: "Get a free SEO audit today"
- Differentiator: "Top-rated", "proven"

**Alternative (155 chars):**
`Canada's best SEO company. Expert SEO services including technical SEO, local SEO, link building & content strategy. Free audit — call TML Agency today.`

**Implementation:** Update `metaDescription` in `servicePages.json`:
```json
"metaDescription": "Top-rated SEO agency in Canada. Our SEO experts deliver proven SEO services — technical audits, link building, local SEO & content strategy. Get a free SEO audit today."
```

---

## 3. H1 Tag

**Current:** `Best SEO Services.` (with orange period)
- Generated in `service-detail.php` line 158: `Best <?= tml_e($data['title']) ?> Services.`
- For SEO slug, renders as: **"Best SEO Services."**

### Assessment: 5/10
**Strengths:**
- Contains "SEO Services" and "Best"
- Clean, short, bold

**Weaknesses:**
- Missing "Canada" or "Agency" — does not match national intent
- Does not target `seo agency`, `seo company`, or `seo expert`
- No geographic qualifier hurts local intent signals

### Recommendation:
**Proposed H1:** `Best SEO Agency in Canada.`
- Directly targets: `seo agency` (5,400), `seo canada` (1,300), `best seo` 
- The subheadline/tagline ("Dominate search. Own your market.") and hero description provide supporting context

**Alternative H1:** `Best SEO Services & SEO Agency in Canada.`
- Covers more keywords but slightly long for H1

**Implementation:** Either:
1. Add H1 override map in `service-detail.php` (preferred):
```php
$h1Overrides = [
    'seo' => 'Best SEO Agency in Canada',
];
$h1Text = $h1Overrides[$slug] ?? ('Best ' . $data['title'] . ' Services');
```
2. Or change the template to include "in Canada" for all services (line 158)

---

## 4. Content Depth Analysis

### Word Count Estimate
| Section | Approx. Words |
|---------|--------------|
| Hero (tagline + description) | ~60 |
| seoContent (3 paragraphs) | ~250 |
| deepContent (5 sections x 3 paragraphs each) | ~2,400 |
| Features (6 items) | ~180 |
| Process (5 steps) | ~80 |
| Pricing note | ~120 |
| FAQs (4 items) | ~100 |
| **Total** | **~3,190 words** |

### Assessment: 7/10
**Strengths:**
- Excellent content depth at ~3,200 words — competitive for head terms
- deepContent sections cover timely topics: AI Overviews, E-E-A-T, technical SEO, local SEO, timelines, SEO vs PPC
- E-E-A-T signals present: author attribution ("By Raman Makkar, Founder & Chief SEO Strategist"), specific data points, tool names
- Good topical coverage with LSI keywords: Core Web Vitals, AI Overviews, link building, crawlability, schema markup, domain authority

**Weaknesses:**
- **Missing "seo company" completely** — this phrase (4,400 vol) does not appear anywhere in the content
- **Missing "seo consultant"** — 1,300 monthly volume, not mentioned
- **Missing "seo expert"** — 1,300 monthly volume, used only in author tagline context but not in body copy
- **"Canada" appears only once** in the seoContent — all deepContent references "Edmonton" or generic
- No comparison content (e.g., "SEO agency vs SEO consultant vs in-house")
- No case study or specific results data embedded in the page (stats section has numbers but no narrative)
- FAQ section has only 4 questions — competitors typically have 8-12

### Keyword Density Issues
- "SEO" appears frequently (good)
- "agency" appears ~3 times — needs more instances
- "company" appears 0 times in SEO context — critical gap
- "Canada" appears ~2 times — needs 5-8 mentions naturally
- "consultant" / "expert" — 0 mentions

### Recommendations:

**A. Add "seo company" and "seo consultant" references to seoContent:**
Update the first seoContent paragraph to include:
> "...At TML Agency, a leading **SEO company in Canada**, we implement white-hat SEO strategies..."

Update the third paragraph:
> "...Whether you serve Edmonton, the Tricity area, or clients across Canada, our team of **SEO consultants** and **SEO experts** helps you dominate..."

**B. Add a new deepContent section targeting comparison/consultant keywords:**
New section heading: **"How to Choose the Right SEO Company in Canada"**
Content covering:
- What to look for in an SEO agency vs freelance SEO consultant vs in-house
- Red flags when hiring an SEO company
- Why TML is the best SEO company for Canadian businesses

**C. Expand FAQ section from 4 to 8-10 questions** (see Section 7 below)

**D. Add "Canada" mentions naturally throughout deepContent sections**, especially in the local SEO section and the timelines section.

---

## 5. Schema Markup

### Currently Implemented:
1. **Service schema** (`tml_schema_service`) — name, description, url, provider (Organization), category, pricing tiers (if set), dateModified
2. **BreadcrumbList schema** (`tml_schema_breadcrumb`) — Home > Services > SEO
3. **FAQPage schema** (`tml_schema_faq`) — 4 FAQ items

### Assessment: 7/10
**Strengths:**
- Three schema types implemented — good baseline
- Service schema includes provider Organization with full address, sameAs, founder
- Pricing tiers support exists (if pricing data is configured for this service)
- BreadcrumbList properly structured

**Weaknesses:**
- **No `areaServed` on Service schema** — the `areaServed` field is only populated if explicitly passed, and the service-detail.php does NOT pass it (line 114-121). This is a missed opportunity for geo-targeting.
- **No aggregate rating / review schema** — no `AggregateRating` which could generate star ratings in SERPs
- **Service schema `name` is just "SEO"** — should be "SEO Services" or "SEO Services in Canada" for better SERP display
- **No `hasOfferCatalog` / pricing for SEO** — need to verify if `tml_service_pricing()` has data for 'seo' slug
- **Organization schema not output on this page** — only used as nested provider
- **No WebPage or Article schema** — could add WebPage schema with `speakable` property for voice search

### Recommendations:

**A. Add `areaServed` to Service schema for SEO page:**
```php
$serviceSchema = tml_schema_service([
    'name' => $data['title'] . ' Services in Canada',
    'description' => $data['description'],
    'url' => TML_SITE_URL . '/services/' . $slug,
    'category' => $data['title'],
    'areaServed' => 'Canada',  // ADD THIS
    'pricingTiers' => $pricingTiers,
    'dateModified' => $lastUpdated,
]);
```

Note: The `areaServed` currently only supports a single `City` type (line 91 of schema.php). For a national service page, this should be updated to support `Country`:
```php
if (!empty($p['areaServed'])) {
    // Support both city and country
    $out['areaServed'] = [
        '@type' => 'Country',
        'name' => $p['areaServed']
    ];
}
```

**B. Add AggregateRating to Service schema** (if reviews exist):
```json
"aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "127",
    "bestRating": "5"
}
```

**C. Update Service name from "SEO" to "SEO Services in Canada"**

---

## 6. Internal Linking

### Current Internal Links FROM this page:
| Link | Destination |
|------|------------|
| Breadcrumbs | Home, Services index |
| "Get a Free Quote" CTA | /contact-us |
| "Talk to an Expert" CTA | mailto:info@townmedialabs.ca |
| Related Services (3) | /services/google-ads, /services/website-development, /services/lead-generation |
| Related Blog articles | Depends on `tml_service_related_blogs()` mapping for 'seo' |
| Related Industries | Depends on `tml_service_related_industries()` mapping for 'seo' |
| Navbar links | Standard sitewide navigation |

### Assessment: 5/10
**Strengths:**
- Related services section links to 3 complementary services
- Blog articles section (if populated) provides topical relevance
- Breadcrumbs provide hierarchical structure

**Weaknesses:**
- **No links to city-specific SEO pages** — there are 63 `seo-in-{city}.php` view files (Toronto, Vancouver, Calgary, Edmonton, etc.) but ZERO links from the main SEO service page to any of them. This is a massive internal linking gap.
- **No anchor text optimization** — related service links use generic "Learn More" text
- **No contextual internal links within body content** — the seoContent and deepContent paragraphs contain no inline links to other service pages, blog posts, or city pages
- **No link to local SEO service page** — there appears to be a separate `/services/local-seo` page that should be cross-linked
- **No link to technical SEO page** — `/services/technical-seo` exists and should be linked

### Recommendations:

**A. Add "SEO Services by City" section** after the FAQ section:
A grid/list linking to at least the top 10 city pages:
- /seo-in-toronto
- /seo-in-vancouver
- /seo-in-calgary
- /seo-in-edmonton
- /seo-in-montreal
- /seo-in-ottawa
- /seo-in-winnipeg
- /seo-in-mississauga
- /seo-in-brampton
- /seo-in-hamilton

This creates a hub-and-spoke internal linking architecture with the main /services/seo page as the hub.

**B. Add contextual links in deepContent paragraphs:**
- In the "Technical SEO Checklist" section, link "technical SEO" to `/services/technical-seo`
- In the "Local SEO for Edmonton" section, link "local SEO" to `/services/local-seo`
- In the "SEO vs Paid Ads" section, link "Google Ads" to `/services/google-ads`
- In the "What Still Works" section, link "content marketing" to `/services/content-marketing`
- Link "link building" mentions to `/services/link-building`

**C. Add related services that share SEO topic cluster:**
Current related: google-ads, website-development, lead-generation
Suggested additions: local-seo, technical-seo, link-building, content-marketing, geo-optimization

---

## 7. FAQ Section

### Current FAQs (4 items):
1. "How long does SEO take to show results?"
2. "Do you guarantee #1 rankings?"
3. "What tools do you use?"
4. "Do you handle content creation too?"

### Assessment: 4/10
**Strengths:**
- FAQPage schema is properly generated
- Questions are relevant

**Weaknesses:**
- Only 4 FAQs — too few. Competitors typically have 8-12
- **None target "seo company", "seo agency", "seo consultant", or "seo expert"** keywords
- **No PAA (People Also Ask) alignment** — common PAA questions for "seo services" are not addressed
- Answers are too short (1-2 sentences) — longer answers (3-4 sentences) perform better for featured snippets and AI Overviews
- No pricing FAQ despite having a pricing section

### Recommended FAQs to ADD (targeting PAA + keywords):

```json
{
    "q": "What does an SEO agency do?",
    "a": "An SEO agency like TML improves your website's visibility in search engines through technical optimization, content creation, link building, and local SEO. We conduct keyword research to identify what your customers are searching for, optimize your pages to rank for those terms, build authoritative backlinks to strengthen your domain, and track performance through detailed analytics. The goal is to increase organic traffic and generate leads without relying solely on paid advertising."
},
{
    "q": "How much do SEO services cost in Canada?",
    "a": "SEO services in Canada typically range from $20,000 to $150,000+ per month depending on the scope. At TML Agency, local SEO packages targeting a single city start at $20,000/month, regional and national campaigns range from $50,000 to $100,000/month, and enterprise SEO for large or highly competitive websites starts at $150,000/month. We offer a free comprehensive SEO audit so you can understand your current position before making any investment."
},
{
    "q": "What is the difference between an SEO company and an SEO consultant?",
    "a": "An SEO company like TML Agency provides a full team of specialists — technical SEO engineers, content strategists, link builders, and analytics experts — working together on your campaign. An SEO consultant is typically an individual who advises on strategy but may not handle execution. For businesses needing comprehensive, ongoing SEO management, an SEO company delivers better results because you get diverse expertise and dedicated resources rather than relying on a single person."
},
{
    "q": "How do I choose the best SEO company in Canada?",
    "a": "Look for an SEO company with transparent reporting, proven case studies with measurable results, no guaranteed rankings promises (a red flag), and expertise in your industry. Check their own search visibility — a strong SEO company should rank well for their own keywords. At TML, we provide detailed monthly reports, have helped over 500 businesses across Canada improve their search rankings, and offer a free audit so you can evaluate our expertise before committing."
},
{
    "q": "Can SEO work for small businesses in Canada?",
    "a": "Absolutely. SEO is one of the most cost-effective marketing channels for small businesses because organic traffic is essentially free once rankings are achieved. Local SEO in particular helps small businesses compete with larger companies in their city or region. Our SEO experts at TML have helped hundreds of small businesses in Edmonton, Calgary, Toronto, Vancouver, and other Canadian cities achieve first-page rankings and grow their customer base through organic search."
},
{
    "q": "What is the difference between SEO and Google Ads?",
    "a": "SEO (search engine optimization) generates free organic traffic by improving your website's rankings in search results, while Google Ads is paid advertising where you pay per click. SEO takes 3-6 months to show results but builds compounding value over time. Google Ads delivers immediate visibility but stops when you stop paying. Most businesses benefit from both — using Google Ads for instant leads while SEO builds long-term organic growth. At TML, we manage both and use data from each to optimize the other."
}
```

### Implementation:
Update the `faqs` array in `servicePages.json` under the `seo` key to include all 10 FAQs (existing 4 + new 6).

---

## 8. Additional Issues

### 8A. metaTitle Field is Ignored
The `metaTitle` field in `servicePages.json` (line 327: `"SEO | TML Agency"`) is **never used**. The code on line 25 of `service-detail.php` always generates the title from the template pattern. Either:
- Remove `metaTitle` from JSON to avoid confusion, OR
- Use it as the primary title with the template as fallback

### 8B. metaKeywords Field
The `metaKeywords` array is rendered as a `<meta name="keywords">` tag. While Google has confirmed they don't use this tag for ranking, the current keywords are Edmonton-focused and miss all target keywords. If keeping the tag (for Bing/Yandex), update to:
```json
"metaKeywords": [
    "seo agency canada",
    "seo services canada",
    "seo company canada",
    "best seo company",
    "seo consultant",
    "seo expert",
    "search engine optimization",
    "technical seo",
    "local seo canada"
]
```

### 8C. deepContent HTML Escaping
Line 285 in `service-detail.php` outputs deepContent paragraphs with `<?= $p ?>` (no escaping), while seoContent uses `<?= tml_e($paragraph) ?>`. This is a potential XSS vector if the JSON data is ever modified to include HTML entities, but it also means deepContent paragraphs could include inline `<a>` tags for internal linking (useful for Recommendation 6B above).

### 8D. Missing Open Graph Enhancements
- `og:image` defaults to a generic `/media/web-design-landing-page.webp` — should be an SEO-specific image
- No `og:image:type` specified

### 8E. Pricing Typos
The `pricingNote` in JSON (line 385) contains formatting issues:
- "$1,00,000/month" should be "$100,000/month" (Indian numeral formatting, not North American)
- "$1,50,000/month" should be "$150,000/month"
These formatting errors hurt credibility for a Canadian audience.

---

## Priority Action Items

### Critical (Do First)
1. **Fix truncated meta description** — update in `servicePages.json` with keyword-rich, CTA-included description (155 chars)
2. **Fix pricing typos** — change "$1,00,000" to "$100,000" and "$1,50,000" to "$150,000" in pricingNote
3. **Add title tag override** for SEO page to include "Agency" keyword

### High Priority
4. **Expand FAQ section** from 4 to 10 questions targeting PAA keywords and "seo company/agency/consultant" terms
5. **Add city-page internal links** section — link to top 10-15 city SEO pages
6. **Add contextual internal links** in deepContent to related service pages
7. **Add "seo company" and "seo consultant" keyword variations** to body content

### Medium Priority
8. **Update Service schema** — add areaServed: Canada, change name to "SEO Services in Canada"
9. **Add AggregateRating** to schema if review data is available
10. **Add a new deepContent section** on "Choosing the Right SEO Company in Canada"

### Low Priority
11. Update metaKeywords array to target national terms
12. Create a custom OG image for the SEO service page
13. Fix the `metaTitle` field either being used or removed from JSON

---

## Expected Impact

If all recommendations are implemented:
- **Title tag** will target 6 of 11 keywords (currently 3)
- **Meta description** will target 5 of 11 keywords (currently 1-2)
- **H1** will target 3 of 11 keywords (currently 2)
- **Body content** will cover all 11 keywords (currently 6)
- **FAQ schema** will triple in size, targeting 4+ additional PAA queries
- **Internal linking** will create a proper hub-and-spoke model with 60+ city pages
- Estimated organic traffic increase: 40-80% within 6 months for target keyword cluster
