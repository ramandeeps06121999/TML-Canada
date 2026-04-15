# Page Audit #14: Web Design in Edmonton

**Audit Date:** 2026-04-14
**Page URL:** `/services/web-design-in-edmonton`
**Canonical:** `https://townmedialabs.ca/services/web-design-in-edmonton`
**View Files:**
- `views/web-design-in-edmonton.php` (legacy static file, identical content to non-"in" variant)
- `views/web-design-edmonton.php` (legacy static file, likely unused)
- Live page served by `views/location-service.php` using enrichments from `data/enrichments.json` key `web-design-in-edmonton`

---

## Target Keywords

| Keyword | Volume | KD | Currently in Page? | Location |
|---------|--------|----|---------------------|----------|
| edmonton web design | 1,000 | 62 | Partial ("web design in Edmonton") | Enrichment keywords list has "web design Edmonton" but NOT "edmonton web design" word order |
| website builder edmonton | 590 | 64 | NO | Missing entirely |
| website development edmonton | 590 | 65 | NO | Missing entirely (separate service page exists: website-development-in-edmonton) |
| web design companies edmonton | 480 | 46 | NO | Missing entirely |
| web development edmonton | 480 | 57 | NO | Missing entirely |
| edmonton web designer | 320 | 62 | NO | Missing entirely |
| edmonton web development | 390 | 55 | NO | Missing entirely |
| web design in edmonton | 210 | 54 | YES | H1, meta title, hero description, FAQ questions |
| website developers edmonton | 210 | 64 | NO | Missing entirely |
| website designers edmonton | 260 | 55 | NO | Missing entirely |
| web development company edmonton | 70 | 62 | NO | Missing entirely |

**Keyword Coverage Score: 1/11 (9%)**

---

## 1. Title Tag

**Current (from enrichments):** `Best Web Design in Edmonton | TML Agency`
**Character count:** 47 (good, under 60)

### Issues
- GOOD: Contains primary keyword "web design in Edmonton"
- GOOD: Includes brand name
- GOOD: Under 60 characters
- MISS: Does not contain "web designer" or "web development" variants
- MISS: No differentiator beyond "Best" (consider adding "Custom" or year)

### Recommendation
```
Edmonton Web Design & Development | TML Agency
```
(50 chars) -- captures "edmonton web design", "web design", "web development" in close proximity.

Alternative:
```
Edmonton Web Design Company | Custom Websites | TML Agency
```
(59 chars) -- captures "edmonton web design", "web design company edmonton".

---

## 2. Meta Description

**Current (from enrichments):** `TML is Edmonton's trusted web design agency. We help businesses across Alberta grow with data-driven strategies. Contact us today.`
**Character count:** 129 (acceptable, could be longer)

### Issues
- GOOD: Contains "Edmonton" and "web design agency"
- MISS: Does not mention "web development", "website designer", "website builder", or "web design company"
- MISS: No specific value proposition (no mention of pricing, results, or unique selling point)
- MISS: Could use full 155-160 characters for more keyword density

### Recommendation
```
Edmonton web design & development company. Custom websites, responsive design, and full website development for Alberta businesses. 500+ projects. Free consultation.
```
(165 chars) -- captures "edmonton web design", "web development company", "website development", "web design company".

---

## 3. H1 Tag

**Current (from enrichments):** `Best Web Design in Edmonton`
**Legacy view files (both):** `Best Web Design in Edmonton`

### Issues
- GOOD: Contains "web design in edmonton"
- MISS: Does not contain "web development", "web designer", or "website" variants
- CONCERN: "Best" is a subjective claim with no E-E-A-T backing

### Recommendation
```
Web Design & Development in Edmonton
```
Captures: "web design in edmonton", "web development in edmonton" -- two high-volume keywords in one H1.

---

## 4. Content Analysis

### 4a. Legacy View Files (web-design-edmonton.php / web-design-in-edmonton.php)

**CRITICAL PROBLEM: Both legacy view files contain CONTENT MARKETING copy, NOT web design copy.**

Evidence:
- Meta description says "Strategic content marketing in Edmonton. Blog writing, content strategy, copywriting."
- Meta keywords: "content marketing Edmonton, content strategy, blog writing, copywriting, content creation"
- Hero text: "Content is king. But not all content is created equal."
- Process section describes content planning, content creation, blog writing
- Case studies are all about blog content, email content, SEO blogs -- ZERO web design case studies
- Services listed: Blog Writing & Strategy, Website Copywriting, Content Strategy, Email Content, Guides & Whitepapers, Content Audit & Refresh
- Pricing: blog posts and content packages
- CTAs: "Get Your Content Strategy" -- NOT web design related
- FAQs ask about "content" not "web design"
- Footer: "15+ years of content strategy experience. 10,000+ articles written."

**These files are clearly templated from a content marketing page and the body copy was NEVER updated for web design.** The title and H1 say "Web Design" but 100% of the body content is about content marketing. This is a severe content mismatch that would hurt rankings.

**However:** The live site likely serves the page through `views/location-service.php` using enrichments data, not these legacy static files. The legacy files may be unused/orphaned.

### 4b. Enrichment Data (web-design-in-edmonton)

The enrichment data in `data/enrichments.json` is properly themed for web design:
- H1, tagline, hero description all reference web design
- WhyChoose sections reference web design strategy and results
- Process steps are about discovery, strategy, implementation, growth (generic but not wrong)
- FAQs are relevant to web design
- Local content references Edmonton market, oil & gas, tech startups, government

**However enrichment content has these keyword gaps:**

| Missing Keyword | Action Needed |
|-----------------|---------------|
| website builder edmonton | Add to FAQ or body content |
| web design companies edmonton | Add "web design company" / "web design companies" phrasing |
| web development edmonton | Add web development references throughout |
| edmonton web designer | Add "web designer" phrasing |
| website developers edmonton | Add "website developers" / "website developer" phrasing |
| website designers edmonton | Add "website designers" phrasing |
| web development company edmonton | Add "web development company" phrasing |

### 4c. Enrichment Keywords Array

**Current keywords in enrichments:**
```json
["web design Edmonton", "web design agency Edmonton", "best web design Edmonton", "web design company Alberta", "TML Agency Edmonton", "Edmonton web design services"]
```

**Missing from keywords array:**
- edmonton web designer
- edmonton web development
- website development edmonton
- website builder edmonton
- web design companies edmonton
- web development edmonton
- website developers edmonton
- website designers edmonton
- web development company edmonton

---

## 5. Schema Markup

### Enrichment-driven page (location-service.php):
- Service schema: name = "Web Design in Edmonton" -- GOOD
- LocalBusiness schema: name = "TML Agency - Edmonton" -- GOOD
- Breadcrumb schema: Home > Services > Web Design > Edmonton -- GOOD
- FAQ schema: auto-generated from enrichment FAQs -- GOOD

### Legacy view files:
- Organization schema: GOOD but generic
- LocalBusiness schema: description says "Expert content marketing and strategy in Edmonton" -- WRONG for a web design page
- Service schema: name = "Web Design & Development" but description says "Strategic content marketing services for Edmonton businesses" -- WRONG
- Article schema: headline says "Best Web Design in Edmonton - Strategic Content Services" -- MIXED (web design + content marketing)

---

## 6. Local Signals

### Strengths
- Edmonton mentioned throughout enrichment data (hero, why choose, FAQs, local content)
- Region referenced: "Edmonton, St. Albert, Sherwood Park, and the greater Edmonton metropolitan area"
- Local landmarks: Downtown Edmonton, Whyte Avenue, West Edmonton Mall, Ice District, 104 Street NW
- Local industries: oil & gas, tech startups, government, construction, agriculture, healthcare
- Local address: 11930 104 St NW (mentioned in location data)
- Province/state: Alberta -- mentioned in enrichments

### Weaknesses
- No Google Maps embed or directions
- No local phone number visible in enrichments
- No Edmonton-specific case studies in enrichment data (case studies in legacy files are generic/content marketing)
- No mention of Edmonton neighbourhoods beyond landmarks (e.g., Oliver, Strathcona, Garneau, Windermere)
- LocalBusiness schema in legacy files has wrong service description
- No NAP (Name, Address, Phone) block in visible content

---

## 7. Duplicate/Cannibalization Concerns

### CRITICAL: Two static view files + enrichment-driven page

| File | URL | Status |
|------|-----|--------|
| `views/web-design-edmonton.php` | Unknown routing | Likely orphaned/unused |
| `views/web-design-in-edmonton.php` | Unknown routing | Likely orphaned/unused |
| `views/location-service.php` + enrichments | `/services/web-design-in-edmonton` | LIVE page via router |

Both legacy files set canonical to `https://townmedialabs.ca/services/web-design-in-edmonton/` which is correct IF those files are still somehow accessible. However the router in `index.php` does not appear to serve these legacy view files -- it routes through the scalable template.

### Cross-page cannibalization

There is a separate enrichment entry `website-development-in-edmonton` with:
- H1: "Website Development Agency in Edmonton"
- metaTitle: "Best Website Development in Edmonton | TML Agency"

This means "website development edmonton" (590 vol) and "website developers edmonton" (210 vol) should likely be targeted on that page, NOT this one. However, "web development edmonton" (480 vol) and "edmonton web development" (390 vol) could go on EITHER page. A clear keyword split is needed.

**Recommended split:**
- `/services/web-design-in-edmonton` targets: edmonton web design, web design companies edmonton, edmonton web designer, web design in edmonton, website designers edmonton, website builder edmonton, web development company edmonton (as secondary)
- `/services/website-development-in-edmonton` targets: website development edmonton, web development edmonton, edmonton web development, website developers edmonton

---

## 8. Heading Structure (Enrichment-driven page via location-service.php)

The scalable template generates headings dynamically. Based on enrichment data:

- **H1:** Best Web Design in Edmonton -- GOOD
- **H2s (generated by template):** Why Choose TML for Web Design in Edmonton, Our Process, Market Insight, FAQs, Local Content sections
- **H3s:** "Edmonton Market Intelligence", "Proven Track Record in Alberta", "Local Presence, Global Standards", "Transparent, Results-Focused Partnership" (from whyChoose)

### Issues
- No H2 or H3 contains "web development", "website designer", "web design company", or "website builder"
- WhyChoose titles are generic marketing language, not keyword-rich

### Recommendation
Add keyword-rich H2s/H3s such as:
- "Edmonton Web Design Companies: How We Compare"
- "Web Development Services for Edmonton Businesses"
- "Why Edmonton Website Designers Choose TML"
- "Custom Website Builder Solutions in Edmonton"

---

## 9. Internal Linking

From enrichment `crossLinks` data: not visible in the excerpt, but the template typically generates cross-links to the same service in other cities (e.g., Calgary).

### Missing internal links
- No link to `/services/website-development-in-edmonton` (closely related service)
- No link to `/services/seo-in-edmonton` (complementary service)
- No links to Edmonton blog content
- No links to industry-specific pages for Edmonton sectors (oil & gas, tech, government)

---

## 10. Content Quality (E-E-A-T)

### Strengths
- Author identified: Raman Makkar, Founder & Chief SEO Strategist
- Local expertise claimed with specific Edmonton market knowledge
- Industry-specific references (oil & gas, tech startups, government)
- Pricing transparency ($2,500-$15,000/month)
- Benchmark data provided (3.5x ROI, 2.8% conversion rate)

### Weaknesses
- No real client names or verifiable case studies in enrichment data
- No portfolio links or screenshots of Edmonton web design work
- Testimonials only exist in legacy view files (and they are about content marketing, not web design)
- The "85%" market insight stat has no source citation
- "500+ businesses" claim is unverified
- No mention of specific technologies (WordPress, React, Shopify, etc.) in enrichment -- though the service data has features
- No mention of design process specifics (wireframing, prototyping, user testing)
- localContent paragraph has grammar issues: "As a Edmonton-based" should be "As an Edmonton-based"

---

## Priority Action Items

### P0 (Critical)
1. **Delete or redirect legacy view files** (`views/web-design-edmonton.php` and `views/web-design-in-edmonton.php`) -- they contain content marketing copy with web design title tags, creating massive content mismatch. If they are somehow accessible at any URL, they would confuse Google.
2. **Fix grammar in enrichment localContent:** "As a Edmonton-based" --> "As an Edmonton-based"

### P1 (High Impact)
3. **Update enrichment metaTitle** to include "web development" or "web designer" variant:
   - Suggested: `Edmonton Web Design & Development | TML Agency`
4. **Update enrichment metaDescription** to capture more target keywords:
   - Suggested: `Edmonton web design & development company. Custom websites, responsive design, and full website development for Alberta businesses. 500+ projects delivered. Free consultation.`
5. **Expand enrichment keywords array** to include all target keywords:
   ```json
   ["edmonton web design", "web design Edmonton", "web design companies edmonton", "edmonton web designer", "website designers edmonton", "web design in edmonton", "website builder edmonton", "web development company edmonton", "web design agency Edmonton", "best web design Edmonton", "Edmonton web design services"]
   ```
6. **Add keyword-rich FAQ questions** to enrichments:
   - "What do edmonton web design companies charge?"
   - "How do I choose a website designer in Edmonton?"
   - "Can TML build a custom website builder solution for my Edmonton business?"
7. **Define clear keyword split** between `web-design-in-edmonton` and `website-development-in-edmonton` to avoid cannibalization.

### P2 (Medium Impact)
8. **Add Edmonton-specific web design case studies** to enrichment data (with real metrics, industry, and outcomes)
9. **Add technology stack mentions** in enrichment content (WordPress, React, Shopify, etc.)
10. **Add neighbourhood references** in local content beyond landmarks (Oliver, Strathcona, Garneau, South Edmonton Common, etc.)
11. **Add internal links** in enrichment data to related Edmonton services (website-development, seo, branding)
12. **Add testimonials** relevant to web design (not content marketing)

### P3 (Lower Priority)
13. **Add a portfolio/showcase section** with Edmonton client websites
14. **Cite the "85%" market insight stat** or replace with verifiable data
15. **Add comparison content** (e.g., "Web Design vs Website Development" section) to help Google understand page scope
16. **Consider adding "website builder edmonton" (590 vol, KD 64)** as a dedicated content section -- this is a unique intent (DIY tools vs agency service) that could be addressed with a "Website Builder vs Professional Web Design" comparison

---

## Keyword Density Check (Enrichment Content Only)

| Term | Occurrences in Enrichment | Assessment |
|------|---------------------------|------------|
| web design | ~25+ | Good density |
| Edmonton | ~30+ | Strong local signal |
| web development | 0 | MISSING |
| website designer | 0 | MISSING |
| website builder | 0 | MISSING |
| web design company | 1 (in keywords only) | WEAK |
| web design companies | 0 | MISSING |
| website developers | 0 | MISSING |

---

## Summary Score

| Category | Score | Notes |
|----------|-------|-------|
| Title Tag | 6/10 | Contains primary keyword but misses secondary variants |
| Meta Description | 5/10 | Too short, misses keyword variants, weak CTA |
| H1 Tag | 6/10 | Good primary keyword, misses "web development" |
| Keyword Coverage | 2/10 | Only 1-2 of 11 target keywords present in content |
| Content Relevance | 3/10 (legacy) / 7/10 (enrichment) | Legacy files are catastrophically wrong; enrichment is on-topic but thin on keyword variants |
| Schema Markup | 7/10 | Good structure from template, legacy files have wrong descriptions |
| Local Signals | 7/10 | Strong Edmonton references, good landmark/industry data, missing NAP and neighbourhoods |
| Internal Linking | 4/10 | Cross-city links exist but no cross-service links for Edmonton |
| E-E-A-T | 5/10 | Author present, claims unverified, no portfolio, no real case studies |
| Technical | 6/10 | Canonical set correctly, potential legacy file orphan issue |

**Overall Page Score: 51/100**

The enrichment-driven live page has a decent foundation but critically underserves the target keyword set. The legacy view files are a liability that should be removed. Expanding keyword coverage in the enrichment data (meta tags, FAQs, headings, body content) and adding real Edmonton web design case studies would have the highest impact on rankings.
