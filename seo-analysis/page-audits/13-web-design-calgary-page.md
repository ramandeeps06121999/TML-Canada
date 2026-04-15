# Page Audit: Web Design in Calgary

**URL:** `/services/web-design-in-calgary/`
**View file:** `views/web-design-in-calgary.php`
**Enrichment key:** `web-design-in-calgary` (exists in `data/enrichments.json`)
**Location key:** `calgary` (exists in `data/locations.json`)
**Audit date:** 2026-04-14

---

## Target Keywords

| Keyword | Monthly Volume | KD | Currently in Page? | Location |
|---------|---------------|-----|-------------------|----------|
| web design calgary ab | 1,600 | 44 | NO - "ab" / "AB" never appears | Nowhere |
| web page design calgary | 1,600 | 45 | NO - phrase "web page design" absent | Nowhere |
| website design calgary | 1,600 | 35 | NO - "website design" never appears | Nowhere |
| calgary web design | 1,300 | 47 | NO - only "Web Design in Calgary" (reversed) | H1 partial |
| web design calgary | 1,000 | 46 | Partial - appears in title, H1 as "Web Design in Calgary" | Title, H1 |
| website development calgary | 880 | 51 | NO - "website development" never appears | Nowhere |

**Keyword coverage score: 1/6 (partial match only)**

---

## 1. Title Tag

**Current:**
```
Best Web Design in Calgary | TML Agency | Content Strategy Experts
```

**Issues:**
- CRITICAL: "Content Strategy Experts" has nothing to do with web design -- this is leftover from a content-marketing template. Sends mixed signals to Google about the page topic.
- Missing "website design" variant (volume 1,600, KD 35 -- the easiest keyword).
- Missing province signal "AB" or "Alberta" (needed for "web design calgary ab" at 1,600 volume).
- Title is 68 characters -- close to the 60-char display limit; the useful part may get truncated.

**Recommended:**
```
Web Design Calgary AB | Website Design & Development | TML Agency
```
- Hits: "web design calgary", "web design calgary ab", "website design", "website development" (partial via "development").
- 66 characters -- within display range.

---

## 2. Meta Description

**Current:**
```
Strategic content marketing in Calgary. Blog writing, content strategy, copywriting. 200+ brands. Proven ROI. $5,000-$35,000/month.
```

**Issues:**
- CRITICAL: Describes content marketing, NOT web design. Completely wrong service. This is clearly copy-pasted from a content-marketing template without updating.
- Zero target keywords present ("web design", "website design", "website development" all absent).
- Price range "$5,000-$35,000/month" contradicts the pricing table in the page body ($3,000-$15,000/month) and the enrichment ($2,500-$15,000/month).

**Recommended:**
```
Calgary web design & website development agency. Custom websites built for conversions. 500+ projects. Free consultation. TML Agency.
```
- Hits: "calgary web design", "website development", "web design".
- 131 characters -- good length for SERP display.

---

## 3. H1 Tag

**Current:**
```
Best Web Design in Calgary
```

**Issues:**
- Matches enrichment H1 -- good.
- Does not contain "website design" or "website development" variants.
- Does not include "AB" or "Alberta" geo-qualifier.
- "Best" is a subjective superlative -- fine for CTR but does not add keyword value.

**Recommended:**
```
Best Web Design & Website Development in Calgary, AB
```
- Hits: "web design ... calgary", "website development calgary", "calgary ab".

---

## 4. H2 Subheadings Analysis

| Current H2 | Issue |
|------------|-------|
| Web Design & Development Experts Serving Calgary Businesses | OK -- contains "Web Design" + "Calgary" |
| Why Web Design & Development? Why Now? | Generic; no Calgary geo-signal |
| Our 4-Phase Web Design & Development Process | Generic; no Calgary |
| 5 Web Design & Development Success Stories | Generic; no Calgary |
| Web Design & Development Services We Provide | Generic; no Calgary |
| Transparent Web Design & Development Pricing | Generic; no Calgary |
| Web Design & Development FAQs | Generic; no Calgary |
| What Calgary Clients Say | Good -- has "Calgary" |
| Ready to Attract More Customers With Strategic Content? | WRONG -- says "Strategic Content" not "web design" |

**Issues:**
- None of the H2s contain "website design" or "website development" as standalone phrases.
- Most H2s use the exact same phrase "Web Design & Development" -- looks template-y and misses keyword variants.
- Final CTA H2 still references content marketing ("Strategic Content"), not web design.

**Recommendations:**
- Vary H2 phrasing: use "Website Design", "Calgary Web Design", "Website Development" across different sections.
- Fix CTA H2 to: "Ready to Launch Your New Calgary Website?"
- Add "Calgary" to at least 3-4 more H2s.

---

## 5. Body Content Analysis

### Content-Service Mismatch (CRITICAL)
The entire body is written for a **content marketing** service, not web design. Evidence:

- Hero paragraph: "Content is king. But not all content is created equal. Most businesses publish mediocre content that nobody reads."
- Hero paragraph: "We create strategic content that educates, engages, and converts customers."
- Hero paragraph: "TML Agency has created 10,000+ pieces of content for Calgary businesses. Blog posts, whitepapers, case studies, email sequences, landing pages."
- Section "Why Web Design & Development": "content marketing generates 3x more leads" -- this is a content marketing stat, not web design.
- Process phases describe content strategy, content calendars, blog posts -- NOT wireframing, UI/UX, development.
- Case studies describe blog writing, email sequences, content audits -- NOT website redesigns or web development projects.
- Services listed: "Blog Writing & Strategy", "Website Copywriting", "Content Strategy", "Email Content", "Guides & Whitepapers", "Content Audit & Refresh" -- these are ALL content services, ZERO web design services.
- Pricing describes blog post counts, not website deliverables.
- FAQs ask about content volume, content approval, content measurement -- not web design timelines, tech stacks, or responsive design.
- CTAs say "Get Your Content Strategy" -- should say something about web design.

**This page will NOT rank for any web design keyword because the content does not match search intent. Google will see this as a content-marketing page.**

### Keyword Density
- "web design" exact phrase: appears only in headings (via "Web Design & Development"), not meaningfully in body paragraphs.
- "website design": 0 occurrences.
- "website development": 0 occurrences.
- "web page design": 0 occurrences.
- "calgary ab": 0 occurrences.

### Word Count
Approximately 2,000 words -- adequate length, but the words are about the wrong topic.

---

## 6. Local Signals

### Present
- Calgary mentioned in testimonials (5x with names and city attribution).
- Local business schema with `areaServed: Calgary`.
- Case study mentions "plumber Calgary" as a keyword example.
- Location data in `locations.json` has landmarks (Downtown Calgary, Stephen Avenue, Kensington, Beltline, University District) and unique content paragraphs.

### Missing
- CRITICAL: None of the Calgary-specific enrichment content or `locations.json` content is rendered on the page. The view file is a static HTML file that does NOT pull from `enrichments.json` or `locations.json`. All that rich local content about Stephen Avenue, Beltline, oil & gas, Stampede marketing window, energy sector, Bow Tower, East Village -- none of it appears.
- No NAP (Name, Address, Phone) on the page.
- No Google Maps embed.
- No mention of specific Calgary neighborhoods, landmarks, or business districts in the body copy.
- No mention of "Alberta", "AB", or provincial geo-signals.
- No mention of nearby service areas from locations.json (Airdrie, Cochrane, southern Alberta).
- No GeoCoordinates in schema.
- LocalBusiness schema description says "content marketing and strategy" -- should say "web design and development".

---

## 7. Schema Markup

### Current (4 schemas)
1. **Organization** -- OK but generic (not Calgary-specific).
2. **LocalBusiness** -- Description says "Expert content marketing and strategy in Calgary" (WRONG -- should be web design). Missing address, phone, geo, openingHours.
3. **Service** -- Description says "Strategic content marketing services" (WRONG). Price range "3000-15000" OK.
4. **Article** -- Headline says "Best Web Design in Calgary - Strategic Content Services" (mixed messaging).

### Issues
- 3 of 4 schemas describe content marketing, not web design.
- LocalBusiness schema is missing required/recommended fields: address, telephone, geo, openingHoursSpecification.
- No FAQPage schema despite having 5 FAQs on the page (missed rich-result opportunity).
- No BreadcrumbList schema.
- No Review/AggregateRating on the LocalBusiness (it's only on Organization).

---

## 8. Technical SEO

| Element | Status | Notes |
|---------|--------|-------|
| Canonical | OK | Points to `https://townmedialabs.ca/services/web-design-in-calgary/` |
| OG tags | Partial | og:description says "Strategic content marketing" -- wrong service |
| Viewport | OK | `width=device-width, initial-scale=1.0` |
| Lang attribute | OK | `lang="en"` |
| Mobile responsive | OK | Media query at 768px breakpoint |
| Internal links | MISSING | Zero internal links to other service pages or blog posts |
| External links | MISSING | Zero outbound links |
| Images | MISSING | Page has zero images -- hurts engagement and SERP features |
| Header/Nav | MISSING | No site navigation; page is isolated |
| Footer links | MISSING | No footer navigation |

---

## 9. Enrichment vs. Rendered Content Gap

The `enrichments.json` entry for `web-design-in-calgary` contains well-optimized content that is NOT being used:

| Enrichment Field | Content Available | Rendered on Page? |
|-----------------|-------------------|-------------------|
| h1 | "Best Web Design in Calgary" | YES (matches) |
| metaTitle | "Best Web Design in Calgary \| TML Agency" | NO (page uses longer version with "Content Strategy Experts") |
| metaDescription | "TML is Calgary's trusted web design agency..." | NO (page uses content-marketing description) |
| heroDescription | Rich Calgary-specific paragraph mentioning Airdrie, Cochrane, southern Alberta | NO |
| whyChoose (4 items) | Calgary market intelligence, Alberta track record, local presence, transparent partnership | NO |
| processSteps (4 items) | Local Discovery, Strategy Development, Implementation, Growth & Scaling | NO |
| localContent (3 items) | Stephen Avenue, Beltline, energy sector, Stampede window, East Village, Bow Tower | NO |
| faqs (4 items) | Calgary-specific web design FAQs | NO |
| marketInsight | "85% of successful Calgary businesses..." | NO |
| keywords (6 items) | "web design Calgary", "web design agency Calgary", etc. | NO |
| crossLinks | Links to other Calgary services | NO |

**The enrichments are well-written and SEO-optimized for web design in Calgary. The page simply does not use them.**

---

## 10. Priority Fixes

### P0 -- Critical (Do Immediately)
1. **Rewrite the entire page body for web design**, or (preferred) convert the view to use the dynamic location-service template that renders `enrichments.json` data. The current content is for content marketing and will never rank for web design keywords.
2. **Fix meta description** -- currently describes content marketing.
3. **Fix title tag** -- remove "Content Strategy Experts", add "Website Design" and "AB".
4. **Fix OG description** -- currently describes content marketing.
5. **Fix LocalBusiness schema description** -- currently says "content marketing".
6. **Fix Service schema description** -- currently says "content marketing".

### P1 -- High Priority
7. **Integrate enrichment content** -- the `enrichments.json` has ready-to-use Calgary web design content. Wire it up or copy it in.
8. **Integrate `locations.json` content** -- add Calgary landmarks, neighborhoods, industries to build local relevance.
9. **Add FAQPage schema** for the 5 FAQs to enable FAQ rich results.
10. **Add target keyword variants** to body copy: "website design calgary", "web design calgary ab", "web page design calgary", "website development calgary", "calgary web design".
11. **Add internal links** to related service pages (SEO in Calgary, branding in Calgary, etc.) and blog posts.
12. **Add images** -- at minimum a hero image, team photo, or portfolio screenshots.

### P2 -- Medium Priority
13. **Add BreadcrumbList schema** (Home > Services > Web Design > Web Design in Calgary).
14. **Add site navigation** (header/footer) so the page is not isolated.
15. **Add NAP and Google Maps embed** for local SEO signals.
16. **Add GeoCoordinates** to LocalBusiness schema.
17. **Rewrite case studies** to be about web design projects (site redesigns, e-commerce builds, landing page optimization) instead of content marketing.
18. **Update pricing table** to describe website deliverables (custom website, e-commerce site, landing page package) not blog post counts.
19. **Add nearby-cities section** mentioning Airdrie, Cochrane, southern Alberta (from `locations.json` region data).

---

## Summary

**Overall SEO readiness: 15/100**

This page has a fundamental content-service mismatch. It was generated from a content-marketing template and the body copy, meta tags, schema descriptions, CTAs, case studies, pricing, and FAQs all describe content marketing services -- not web design. The well-optimized enrichment data in `enrichments.json` is not being rendered. Until the body content actually discusses web design and website development, this page has near-zero chance of ranking for any of the six target keywords (combined volume: 8,080/month).

The fix is either to (a) convert this view to use the dynamic location-service template that renders enrichment data, or (b) manually rewrite the page content to match the web design topic. Option (a) is strongly preferred as it would also fix all schema, meta, and local-signal issues simultaneously.
