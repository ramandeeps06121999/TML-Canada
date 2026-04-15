# SEO Audit: Branding Service Page

**URL:** `/services/branding`
**Date:** 2026-04-14
**Target Keyword:** branding agency (1,300 vol / KD 60)

---

## 1. Title Tag

**Current:** `Best Branding Services in Canada | TML Agency`
**Character count:** 49

### Issues
- Missing target keyword "branding agency" -- the title uses "Branding Services" instead.
- "Best" is a subjective superlative that Google may ignore or penalize in rankings.
- No geographic modifier beyond "Canada" (Edmonton is TML's home market).

### Recommendation
Change to: `Branding Agency in Edmonton | Brand Identity Services | TML`
- Places exact-match "branding agency" at the front (highest weight position).
- Includes "Edmonton" for local intent capture.
- "Brand Identity Services" adds secondary keyword coverage.
- 61 characters -- within safe limit.

**Implementation:** In `views/service-detail.php` line 13, add an entry to `$shortTitles`:
```php
'branding' => 'Branding Agency',
```
Then update the title pattern on line 25 to use a custom override for branding, or change `$data['metaTitle']` in `servicePages.json` and add conditional logic to prefer it when present.

Preferred approach -- add a `titleOverride` field in `servicePages.json` for branding:
```json
"titleOverride": "Branding Agency in Edmonton | Brand Identity Services | TML"
```

---

## 2. Meta Description

**Current:** `Professional branding services including logo design, brand identity, and brand strategy. TML Agency in Edmonton helps businesses build memorable brands that...`
**Character count:** ~160 (truncated with "...")

### Issues
- Truncated with ellipsis -- Google will show its own snippet or cut off awkwardly.
- Reads generically; no differentiator, stat, or CTA.
- Missing "branding agency" exact match.

### Recommendation
Change to: `TML is a branding agency in Edmonton that builds brand identities for 500+ businesses across Canada. Logo design, brand strategy & guidelines. Free consultation.`
- 163 characters -- within limit.
- Exact-match "branding agency" included.
- Social proof ("500+ businesses").
- CTA ("Free consultation").
- Keyword-rich service list.

**File:** `data/servicePages.json`, update `metaDescription` field for the `branding` entry.

---

## 3. H1 Tag

**Current:** `Best Branding Services.`
**Source:** `views/service-detail.php` line 158 -- `Best <?= tml_e($data['title']) ?> Services.`

### Issues
- Uses "Branding Services" not "Branding Agency" -- misses exact target keyword.
- "Best" is filler that dilutes keyword weight.
- The period and dot span are decorative but the visible text ends with a period, which is unusual for an H1.

### Recommendation
Change H1 to: `Branding Agency in Canada`
- Exact-match "branding agency" in H1.
- Geographic qualifier for relevance.

**Implementation:** Add an `h1Override` field in `servicePages.json`:
```json
"h1Override": "Branding Agency in Canada"
```
Then in `views/service-detail.php` line 158, add conditional:
```php
<h1 class="...">
  <?= tml_e($data['h1Override'] ?? ('Best ' . $data['title'] . ' Services')) ?>
  <span class="text-[#ff4500]">.</span>
</h1>
```

---

## 4. Content Audit

### Strengths
- Substantial deep content: 5 sections with multiple paragraphs each (estimated 1,500+ words).
- Good topical coverage: strategic branding, process, identity vs image, industry experience, startups vs established.
- Includes real stats and data points (Lucidpress research, 23% revenue increase, 20-30% premium pricing).
- Pricing transparency section present.
- 6 feature cards covering core service offerings.
- 5-step process section with clear descriptions.

### Issues

1. **Target keyword density is low.** "Branding agency" appears only a handful of times across all content. Most mentions use "branding services" or just "branding." The exact phrase "branding agency" should appear 3-5 times naturally across the page.

2. **H2 headings do not contain target keywords.** Current H2s:
   - "Why Your Business Needs Branding" -- good but missing "agency"
   - "Our Branding Services" -- good
   - "How Strategic Branding Drives Business Growth" -- informational, no commercial intent keyword
   - "Our Branding Process: From Research to Launch" -- good
   - "Brand Identity vs Brand Image: What You Actually Need"
   - "Industries We Have Branded Successfully"
   - "Branding for Startups vs Established Businesses"
   - "Branding Pricing & Investment"
   - "Branding Questions Answered"

   **Recommendation:** Rework at least one H2 to include "branding agency":
   - Change "Why Your Business Needs Branding" to "Why Hire a Professional Branding Agency"
   - Change "Industries We Have Branded Successfully" to "Industries Our Branding Agency Has Served"

3. **No internal links within body content.** The deep content paragraphs are plain text with no links to related service pages (graphic-design, branding-packaging, website-development). Internal linking from within body text is a strong ranking signal.

   **Recommendation:** Add 3-5 contextual internal links:
   - Link "logo design" to `/services/graphic-design`
   - Link "packaging" mentions to `/services/branding-packaging`
   - Link "website" mentions to `/services/website-development`
   - Link "social media" mentions to `/services/social-media`

4. **seoContent paragraphs are rendered as plain `<p>` inside cards with no heading structure.** These three introductory paragraphs are in a grid layout but Google sees them as orphaned text without semantic connection to the rest. Consider wrapping with an introductory H2 or using them as the page intro below the hero.

5. **No author/expertise signals in the body.** The byline "By Raman Makkar" is in the hero but there is no bio section, credentials, or author schema. For E-E-A-T on a service page, adding a brief expert bio or linking to an about/team page strengthens trust signals.

6. **Content mentions Indian currency ("$100 crore") which is inconsistent** with the Canadian market positioning. Replace with "$10M annually" or similar.

---

## 5. Schema / Structured Data

### Current Schema (3 blocks)
1. **Service schema** -- `@type: Service` with name, description, URL, provider (Organization), category. Pricing tiers are empty (no pricing data file found for branding).
2. **BreadcrumbList** -- Home > Services > Branding. Correct.
3. **FAQPage** -- 4 questions. Correct structure.

### Issues

1. **Service schema `name` is just "Branding"** -- should be "Branding Services" or "Branding Agency Services" to match search queries.

2. **No `areaServed` in Service schema.** The function supports it but no value is passed. Add:
   ```php
   'areaServed' => 'Edmonton',
   ```
   Or better, use an array for multiple areas:
   ```json
   {"@type": "Country", "name": "Canada"}
   ```

3. **No `hasOfferCatalog` / pricing.** The `tml_service_pricing()` function returns nothing for branding. Either add pricing tiers data or add a `priceRange` field:
   ```json
   "priceRange": "$25,000 - $200,000"
   ```

4. **No `aggregateRating` or `review` schema.** If TML has Google reviews or testimonials, adding review schema would enable rich star ratings in SERPs.

5. **Missing `serviceType` property** -- should be "Branding" or "Brand Identity Design" for better categorization.

6. **No `image` property in Service schema.** Add the hero image URL.

### Recommendations
Update `tml_schema_service()` call in `service-detail.php` or the function itself:
```php
$serviceSchema = tml_schema_service([
    'name' => 'Branding Agency Services',
    'description' => $data['description'],
    'url' => TML_SITE_URL . '/services/' . $slug,
    'category' => 'Branding',
    'areaServed' => 'Canada',
    'image' => TML_SITE_URL . '/media/brand-identity-design.webp',
    'pricingTiers' => $pricingTiers,
    'dateModified' => $lastUpdated,
]);
```

---

## 6. FAQs

### Current FAQs (4 items)
1. "How long does a complete branding project take?" -- 4-6 weeks
2. "Do you offer rebranding services?" -- Yes
3. "What's included in brand guidelines?" -- logo usage, color codes, etc.
4. "Can you help with naming?" -- Yes

### Issues

1. **Only 4 FAQs.** Competitors targeting "branding agency" typically have 6-10. More FAQs = more SERP real estate via rich results.

2. **Answers are too short.** Each is 1-2 sentences. Google favors answers of 40-60 words for FAQ rich results. Short answers reduce the chance of earning the FAQ snippet.

3. **No FAQ targets the primary keyword.** None mention "branding agency" in either question or answer.

4. **Missing high-intent questions:**
   - "How much does a branding agency charge?"
   - "What does a branding agency do?"
   - "How do I choose the right branding agency?"
   - "What is the difference between a branding agency and a design agency?"
   - "Do I need a branding agency for a small business?"

### Recommended New FAQs
Add these to `data/servicePages.json` under `branding.faqs`:

```json
{
  "q": "How much does a branding agency charge in Canada?",
  "a": "Branding agency fees in Canada typically range from $5,000 for a basic logo and guidelines package to $200,000 or more for a comprehensive brand identity system that includes strategy, visual design, messaging frameworks, and brand guidelines. At TML Agency, most clients invest between $75,000 and $150,000 for a complete brand identity package. We offer a free 30-minute consultation to assess your needs and recommend the right scope."
},
{
  "q": "What does a branding agency actually do?",
  "a": "A branding agency develops the strategic foundation and visual identity that defines how your business is perceived. This includes market research, competitor analysis, brand positioning, logo design, colour palette and typography selection, messaging frameworks, tone of voice guidelines, stationery design, and a comprehensive brand guidelines document. At TML, we also provide a 90-minute brand training session so your team can apply the brand consistently from day one."
},
{
  "q": "How do I choose the right branding agency for my business?",
  "a": "Look for an agency with experience in your industry, a portfolio that demonstrates range and quality, a clearly defined process from discovery to delivery, and transparent pricing. Ask about their research methodology, how many concept directions they present, and what deliverables are included. TML Agency has branded 500+ businesses across 25 industries, and we offer a free consultation where we assess your current positioning before you commit."
},
{
  "q": "What is the difference between a branding agency and a graphic design agency?",
  "a": "A graphic design agency creates visual assets like flyers, social media graphics, and marketing materials. A branding agency goes deeper — starting with strategic research to define your market positioning, audience personas, and messaging framework before designing the visual identity. Branding agencies deliver a complete system (logo, colours, typography, guidelines, and templates) that ensures consistency across every touchpoint, while graphic design agencies typically handle individual design projects."
},
{
  "q": "Do startups need a branding agency?",
  "a": "Yes. A strong brand identity from the start helps startups stand out in crowded markets, build investor confidence, and establish credibility with early customers. Startup branding does not need to be expensive — TML offers scaled packages that deliver a flexible, distinctive identity within tighter budgets, typically completing in three to four weeks. Many of our startup clients report that their branding investment paid for itself within the first year through improved conversion rates."
},
{
  "q": "How long does it take to work with a branding agency?",
  "a": "A full branding engagement at TML takes 6-10 weeks from discovery to final delivery. The first two weeks are dedicated to research — stakeholder interviews, competitor audits, and market analysis. The design phase spans three to four weeks with three creative directions and two rounds of refinement. Final delivery includes a 30-50 page brand guidelines document, all asset files, and a training session for your team."
}
```

---

## 7. Additional Technical Issues

### 7a. Missing `dateModified` / `lastUpdated`
No pricing data or last-updated date is being set for branding. The `$lastUpdated` variable is null, meaning the Service schema has no `dateModified`. Create entries in the pricing/last-updated data files.

### 7b. Deep content paragraphs are not HTML-escaped
Line 285 in `service-detail.php`: `<?= $p ?>` outputs raw HTML. While this enables rich formatting, if the JSON data ever contains user-generated content this is an XSS vector. More importantly for SEO, the deep content paragraphs contain no links, bold tags, or any HTML formatting -- they are plain strings rendered without escaping. Consider using `$p` to allow inline `<a>` tags for internal links, and add those links to the JSON data.

### 7c. No `hreflang` tag
The page targets Canada but has no `hreflang="en-CA"` declaration. Since OG locale is set to `en_CA`, adding a corresponding hreflang link tag would be consistent:
```html
<link rel="alternate" hreflang="en-CA" href="https://townmedialabs.ca/services/branding" />
```

### 7d. Image alt text is generic
Current: "Branding creative work by TML Agency" and "Branding portfolio example by TML Agency"
Recommendation: "Brand identity design project by TML Agency Edmonton" and "Branding agency portfolio - logo and visual identity system"

---

## 8. Priority Action Items

| # | Action | Impact | Effort | File(s) |
|---|--------|--------|--------|---------|
| 1 | Update title tag to include "Branding Agency" | High | Low | `servicePages.json` or `service-detail.php` |
| 2 | Rewrite meta description with target keyword + CTA + social proof | High | Low | `servicePages.json` |
| 3 | Update H1 to include "Branding Agency" | High | Low | `servicePages.json` + `service-detail.php` |
| 4 | Add 6 new keyword-rich FAQs with 40-60 word answers | High | Medium | `servicePages.json` |
| 5 | Add internal links within deep content paragraphs | High | Medium | `servicePages.json` (deepContent) |
| 6 | Add `areaServed`, `image`, and `serviceType` to Service schema | Medium | Low | `service-detail.php` or `includes/schema.php` |
| 7 | Increase "branding agency" keyword density (3-5 natural mentions) | Medium | Medium | `servicePages.json` (seoContent, deepContent) |
| 8 | Fix "$100 crore" to Canadian dollar equivalent | Low | Low | `servicePages.json` |
| 9 | Add pricing tiers data for branding service | Medium | Medium | New pricing data file |
| 10 | Improve image alt text with keyword-rich descriptions | Low | Low | `service-detail.php` |

---

## Summary

The branding service page has strong content depth and good structural elements (schema, FAQs, breadcrumbs, pricing section). The primary gap is **keyword alignment** -- the target keyword "branding agency" (1,300 vol / KD 60) is barely present in the title, H1, meta description, H2 headings, or FAQ questions. The page currently optimizes for "branding services" which is a different (and less commercially valuable) query. Fixing the title, H1, and meta description alone should produce a meaningful ranking improvement. Expanding the FAQs from 4 to 10 with keyword-rich questions and longer answers would improve both rich result eligibility and topical authority.
