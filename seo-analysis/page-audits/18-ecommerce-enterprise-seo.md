# E-Commerce SEO & Enterprise SEO Page Audit

**Audit Date:** 2026-04-14
**Page Type:** Gap Analysis — Dedicated Pages Do NOT Exist
**Priority:** HIGH (low-KD keywords with strong commercial intent)

---

## Executive Summary

TML currently has NO dedicated pages for "ecommerce SEO" or "enterprise SEO" keywords. These terms are being partially covered by:

- `/services/seo` — mentions "Enterprise SEO" once in the pricing note (line 385 of servicePages.json)
- `/services/ecommerce-marketing` — mentions "E-Commerce SEO" as a feature card (line 3213) and within deepContent (line 3178)

Neither page is optimised to rank for these specific keyword clusters. The existing `/services/seo` page targets general SEO terms; `/services/ecommerce-marketing` targets broad e-commerce marketing terms. Creating two dedicated pages would capture 1,240+ combined monthly searches at very low keyword difficulty (KD 14-23).

---

## CLUSTER 1: E-Commerce SEO

### Target Keywords

| Keyword | Monthly Volume | KD | Current Coverage |
|---------|---------------|-----|-----------------|
| ecommerce seo expert | 260 | 23 | MISSING — no page targets this |
| ecommerce seo experts | 170 | ~23 | MISSING |
| ecommerce seo firm | 170 | ~23 | MISSING |
| ecommerce seo service | 170 | ~23 | MISSING |
| e-commerce seo | 90 | ~25 | Mentioned in ecommerce-marketing deepContent but NOT in title, H1, URL, or meta |
| seo for ecommerce | 90 | ~25 | MISSING |
| **Total addressable volume** | **950/mo** | | |

### Current State

**`/services/ecommerce-marketing`:**
- Title: `Best E-Commerce Marketing Services in Canada | TML Agency`
- H1: Generated from title field "E-Commerce Marketing"
- Meta description: "Comprehensive e-commerce marketing services for Shopify and WooCommerce stores..."
- The word "SEO" appears buried in deepContent and as one feature card out of six
- URL slug is `ecommerce-marketing` — does not contain "seo"

**`/services/seo`:**
- Title: `Best SEO Services in Canada | TML Agency`
- Zero mentions of "ecommerce" in the title, meta, or H1
- deepContent discusses general SEO, local SEO, and technical SEO — not e-commerce-specific SEO

**Assessment:** Neither page can realistically rank for "ecommerce seo" queries. Google will not match a general SEO page or a broad e-commerce marketing page to a user searching specifically for "ecommerce seo expert." A dedicated page is required.

### Recommendation: Create `/services/ecommerce-seo`

#### Title Tag
```
Ecommerce SEO Services | Ecommerce SEO Experts | TML
```
- 53 characters
- Covers: ecommerce seo service, ecommerce seo experts, ecommerce seo expert (singular via stemming)
- "TML" brand anchor

**Alternative:**
```
Ecommerce SEO Experts | #1 E-Commerce SEO Firm | TML
```
- 54 characters
- Covers: ecommerce seo experts, ecommerce seo expert, e-commerce seo, ecommerce seo firm

#### Meta Description
```
Trusted ecommerce SEO experts helping online stores rank higher on Google. Our ecommerce SEO service covers product page optimisation, category SEO, technical fixes & link building. Get a free audit.
```
- 198 characters (will truncate at ~160 in SERP but front-loads keywords)
- Contains: ecommerce seo experts, ecommerce seo service, "online stores", "product page", "category SEO"
- CTA: "Get a free audit"

#### H1
```
Ecommerce SEO Experts That Drive Revenue, Not Just Rankings
```
- Contains primary keyword "ecommerce seo experts" naturally
- Benefit-driven ("drive revenue") differentiates from competitors

#### Target URL
```
https://townmedialabs.ca/services/ecommerce-seo
```
- Slug: `ecommerce-seo`
- Exact-match URL for "ecommerce seo" queries
- Hyphenated, lowercase, follows existing `/services/{slug}` pattern

#### Content Outline (Target: 2,500-3,500 words)

**Section 1: Hero + Intro (200-300 words)**
- H1 as above
- Brief positioning paragraph: TML as ecommerce SEO specialists
- Key stats: number of stores optimised, average organic traffic growth
- Primary CTA: Free ecommerce SEO audit

**Section 2: "Why Ecommerce SEO Is Different from General SEO" (400-500 words)**
- H2: `Why Ecommerce SEO Requires Specialist Expertise`
- Product page optimisation at scale (hundreds/thousands of SKUs)
- Category page SEO and faceted navigation challenges
- Product schema markup and rich results
- Crawl budget management for large catalogues
- Duplicate content from product variants, filters, sorting
- Seasonal and inventory-driven content strategies

**Section 3: "Our Ecommerce SEO Services" (500-600 words)**
- H2: `Ecommerce SEO Services That Scale With Your Store`
- Feature cards (6-8 services):
  - Technical ecommerce SEO (site architecture, crawl budget, Core Web Vitals)
  - Product page SEO (title tags, descriptions, schema, images)
  - Category page optimisation (keyword mapping, content, internal linking)
  - Ecommerce content marketing (buying guides, comparison content)
  - Ecommerce link building (product PR, resource link building)
  - Platform-specific SEO (Shopify, WooCommerce, Magento)
- Use "ecommerce seo service" and "seo for ecommerce" naturally in this section

**Section 4: "Our Process" (300-400 words)**
- H2: `How We Deliver Ecommerce SEO Results`
- 5-step process matching existing service page pattern:
  1. Ecommerce SEO audit
  2. Keyword research and mapping
  3. Technical and on-page optimisation
  4. Content creation and link building
  5. Reporting and scaling

**Section 5: "Results and Case Studies" (300-400 words)**
- H2: `Ecommerce SEO Results Our Clients Achieve`
- Stats grid (organic traffic growth %, revenue from organic, keyword rankings)
- 1-2 anonymised mini case studies

**Section 6: "Ecommerce SEO vs Paid Ads" (300-400 words)**
- H2: `Ecommerce SEO vs Paid Ads: Why You Need Both`
- Supports "seo for ecommerce" keyword
- Economics comparison, compounding value of SEO

**Section 7: Pricing (150-200 words)**
- H2: `Ecommerce SEO Pricing`
- Transparent pricing tiers matching TML's pattern

**Section 8: FAQ (200-300 words)**
- H2: `Frequently Asked Questions About Ecommerce SEO`
- 5-6 questions targeting long-tail variations:
  - "How long does ecommerce SEO take to show results?"
  - "What makes a good ecommerce SEO firm?"
  - "Do you work with Shopify and WooCommerce?"
  - "How is ecommerce SEO different from regular SEO?"
  - "What does an ecommerce SEO expert actually do?"
  - "How much does ecommerce SEO cost?"

#### Schema Markup

```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Ecommerce SEO Services",
  "description": "Specialist ecommerce SEO services for online stores including product page optimisation, category SEO, technical SEO, and ecommerce link building.",
  "provider": {
    "@type": "Organization",
    "name": "TML Agency",
    "url": "https://townmedialabs.ca"
  },
  "serviceType": "Ecommerce Search Engine Optimization",
  "areaServed": {
    "@type": "Country",
    "name": "Canada"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Ecommerce SEO Packages",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Ecommerce SEO Audit"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Product Page SEO"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Category Page Optimisation"
        }
      }
    ]
  }
}
```

Also add **FAQPage** schema for the FAQ section:

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How long does ecommerce SEO take to show results?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most ecommerce stores see measurable ranking improvements within 3-4 months, with significant organic traffic growth by month 6-9. Product pages targeting specific product queries often rank faster than category pages targeting competitive head terms."
      }
    },
    {
      "@type": "Question",
      "name": "What makes a good ecommerce SEO firm?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A strong ecommerce SEO firm has specific experience with online stores, understands product schema markup, knows how to handle crawl budget for large catalogues, and can optimise across product pages, category pages, and supporting content simultaneously."
      }
    },
    {
      "@type": "Question",
      "name": "How is ecommerce SEO different from regular SEO?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ecommerce SEO deals with unique challenges like optimising hundreds or thousands of product pages at scale, managing faceted navigation and duplicate content from filters, implementing product schema for rich results, and handling seasonal inventory changes — none of which apply to standard business websites."
      }
    }
  ]
}
```

**BreadcrumbList** schema:

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://townmedialabs.ca/" },
    { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://townmedialabs.ca/services" },
    { "@type": "ListItem", "position": 3, "name": "Ecommerce SEO", "item": "https://townmedialabs.ca/services/ecommerce-seo" }
  ]
}
```

#### Internal Linking Strategy

- **From `/services/seo`:** Add a paragraph or callout linking to `/services/ecommerce-seo` for stores needing specialised e-commerce SEO
- **From `/services/ecommerce-marketing`:** Replace/supplement the "E-Commerce SEO" feature card with a link to the dedicated page
- **From `/services/shopify-development`:** Cross-link to ecommerce SEO as a complementary service
- **From location-service pages:** All `ecommerce-marketing-in-{city}` pages should link to the national ecommerce-seo page
- **From blog articles:** Any blog content mentioning e-commerce SEO should link to this page

---

## CLUSTER 2: Enterprise SEO

### Target Keywords

| Keyword | Monthly Volume | KD | Current Coverage |
|---------|---------------|-----|-----------------|
| enterprise seo marketing company | 170 | 14 | MISSING — no page targets this |
| enterprise seo service | 170 | 19 | MISSING |
| enterprise seo agencies | 140 | ~20 | MISSING |
| **Total addressable volume** | **480/mo** | | |

### Current State

**`/services/seo`:**
- "Enterprise SEO" appears exactly once, in the pricingNote: "Enterprise SEO for large websites or highly competitive industries starts at $1,50,000/month"
- Not in the title, H1, meta description, metaKeywords, or any heading
- No deepContent section addresses enterprise SEO specifically

**No other page mentions "enterprise SEO" in any meaningful way.**

**Assessment:** The single mention in a pricing paragraph cannot rank for enterprise SEO queries. Google needs a dedicated, topically focused page to rank for these terms. The extremely low KD (14 for "enterprise seo marketing company") means a well-optimised page can rank quickly with minimal link building.

### Recommendation: Create `/services/enterprise-seo`

#### Title Tag
```
Enterprise SEO Services | Enterprise SEO Agency | TML
```
- 54 characters
- Covers: enterprise seo service, enterprise seo agencies (via "agency"), enterprise seo marketing company (partial, augmented by body content)

**Alternative:**
```
Enterprise SEO Agency & Marketing Company | TML
```
- 48 characters
- Directly covers: enterprise seo agencies, enterprise seo marketing company
- Tighter keyword density

#### Meta Description
```
Enterprise SEO services for large-scale websites and multi-location businesses. TML is an enterprise SEO agency managing 10,000+ page sites with proven strategies for complex technical SEO, content at scale, and cross-team coordination. Free enterprise SEO audit.
```
- Front-loads "enterprise SEO services" and "enterprise SEO agency"
- Contains: enterprise seo service, enterprise seo agency
- Differentiator: "10,000+ page sites", "cross-team coordination"
- CTA: "Free enterprise SEO audit"

#### H1
```
Enterprise SEO Services for Large-Scale Businesses
```
- Contains "enterprise seo services" as exact match
- "Large-scale businesses" qualifies the audience and adds semantic relevance

#### Target URL
```
https://townmedialabs.ca/services/enterprise-seo
```
- Slug: `enterprise-seo`
- Clean, follows existing pattern

#### Content Outline (Target: 2,500-3,500 words)

**Section 1: Hero + Intro (200-300 words)**
- H1 as above
- Position TML as an enterprise SEO marketing company
- Key differentiators: experience with large sites, cross-department coordination, technical depth
- Stats: pages managed, enterprise clients served
- CTA: Free enterprise SEO audit

**Section 2: "What Is Enterprise SEO?" (400-500 words)**
- H2: `What Is Enterprise SEO and Why Does It Require a Specialist Agency?`
- Naturally uses "enterprise seo agencies" and "enterprise seo marketing company"
- Define enterprise SEO: sites with 10,000+ pages, multi-location businesses, complex tech stacks
- Why it differs from SMB SEO:
  - Crawl budget management at scale
  - Cross-team stakeholder management (dev, content, product, legal)
  - CMS limitations and custom development requirements
  - International and multi-language SEO
  - Brand protection and SERP ownership
  - Migration planning for large sites

**Section 3: "Our Enterprise SEO Services" (500-600 words)**
- H2: `Enterprise SEO Services We Deliver`
- Feature cards:
  - Enterprise technical SEO (site architecture, crawl budget, JavaScript rendering)
  - Enterprise content strategy (content at scale, editorial workflows, content governance)
  - Enterprise link building (digital PR, brand mentions, authority building)
  - SEO for multi-location enterprises (location page management, local + national strategy)
  - Enterprise SEO migration (platform migrations, URL restructuring, traffic preservation)
  - SEO analytics and reporting (executive dashboards, revenue attribution, forecasting)
  - Cross-team SEO training (developer SEO guidelines, content team training)

**Section 4: "Enterprise SEO Challenges We Solve" (400-500 words)**
- H2: `Common Enterprise SEO Challenges and How We Solve Them`
- Slow implementation cycles and dev queue bottlenecks
- Duplicate content from CMS templates and product variants
- Cannibalisation across hundreds of similar pages
- Maintaining SEO during site redesigns and platform migrations
- Aligning SEO KPIs with business revenue metrics
- Managing SEO across multiple domains, subdomains, or international sites

**Section 5: "Our Process" (300-400 words)**
- H2: `Our Enterprise SEO Process`
- 5-step process:
  1. Enterprise SEO audit (technical, content, competitive)
  2. Strategy and stakeholder alignment
  3. Prioritised implementation roadmap
  4. Execution with dev team coordination
  5. Reporting, forecasting, and quarterly business reviews

**Section 6: "Who Enterprise SEO Is For" (200-300 words)**
- H2: `Is Enterprise SEO Right for Your Business?`
- Qualification criteria:
  - Websites with 5,000+ pages
  - Multi-location businesses (10+ locations)
  - E-commerce sites with 1,000+ SKUs
  - SaaS companies with complex site architectures
  - Businesses with in-house marketing teams needing specialist SEO support
  - Companies planning major site migrations or redesigns

**Section 7: Pricing (150-200 words)**
- H2: `Enterprise SEO Pricing`
- Starting at $1,50,000/month (consistent with existing /services/seo pricing note)
- Custom scoping based on site size, complexity, and goals
- Dedicated account manager and dev liaison

**Section 8: FAQ (200-300 words)**
- H2: `Enterprise SEO Frequently Asked Questions`
- 5-6 questions:
  - "What is enterprise SEO?"
  - "How is enterprise SEO different from regular SEO?"
  - "How do you work with our internal dev and content teams?"
  - "What enterprise SEO tools do you use?"
  - "How long does enterprise SEO take to show ROI?"
  - "Do you offer enterprise SEO audits?"

#### Schema Markup

```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Enterprise SEO Services",
  "description": "Enterprise SEO services for large-scale websites, multi-location businesses, and complex organisations requiring specialist technical SEO, content strategy at scale, and cross-team coordination.",
  "provider": {
    "@type": "Organization",
    "name": "TML Agency",
    "url": "https://townmedialabs.ca"
  },
  "serviceType": "Enterprise Search Engine Optimization",
  "areaServed": {
    "@type": "Country",
    "name": "Canada"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Enterprise SEO Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Enterprise Technical SEO"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Enterprise Content Strategy"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Enterprise SEO Migration"
        }
      }
    ]
  }
}
```

**FAQPage** schema:

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is enterprise SEO?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Enterprise SEO is search engine optimisation for large-scale websites with thousands of pages, complex technical architectures, and multiple stakeholder teams. It requires specialist tools, processes, and cross-team coordination that standard SEO agencies cannot provide."
      }
    },
    {
      "@type": "Question",
      "name": "How is enterprise SEO different from regular SEO?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Enterprise SEO deals with challenges unique to large organisations: crawl budget management across tens of thousands of pages, coordinating with dev teams on implementation queues, managing content governance at scale, handling site migrations without traffic loss, and aligning SEO strategy with complex business objectives across multiple departments."
      }
    },
    {
      "@type": "Question",
      "name": "How long does enterprise SEO take to show ROI?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Enterprise SEO typically shows measurable improvements within 3-6 months, with significant revenue impact by month 6-12. The timeline depends on the starting state of the site, the complexity of technical issues, and how quickly implementation can be executed through the organisation's development processes."
      }
    }
  ]
}
```

**BreadcrumbList** schema:

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://townmedialabs.ca/" },
    { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://townmedialabs.ca/services" },
    { "@type": "ListItem", "position": 3, "name": "Enterprise SEO", "item": "https://townmedialabs.ca/services/enterprise-seo" }
  ]
}
```

#### Internal Linking Strategy

- **From `/services/seo`:** Replace the passing mention of "Enterprise SEO" in the pricing note with a proper callout + link to the dedicated page
- **From `/services/technical-seo`:** Cross-link for enterprises needing large-scale technical SEO
- **From `/services/local-seo`:** Cross-link for multi-location enterprise local SEO
- **From `/services/content-marketing`:** Link from any content-at-scale discussion
- **From blog articles:** Any content mentioning large sites or enterprise should link here

---

## Implementation Priority

| Page | Combined Volume | Avg KD | Priority | Estimated Effort |
|------|----------------|--------|----------|-----------------|
| `/services/ecommerce-seo` | 950/mo | ~23 | **P1 — HIGH** | 1 day (JSON entry + content) |
| `/services/enterprise-seo` | 480/mo | ~17 | **P1 — HIGH** | 1 day (JSON entry + content) |

Both pages are **HIGH priority** because:
1. **Very low keyword difficulty** (KD 14-23) — these can rank with minimal link building
2. **High commercial intent** — users searching "ecommerce seo expert" or "enterprise seo agency" are ready to hire
3. **No cannibalisation risk** — neither existing page targets these terms specifically
4. **Leverages existing infrastructure** — both pages can be created by adding entries to `servicePages.json` and they will automatically render via `service-detail.php`

---

## Implementation Steps

### Step 1: Add to `servicePages.json`

Add two new entries with slugs `ecommerce-seo` and `enterprise-seo` following the exact structure of existing entries (see `seo`, `ecommerce-marketing`, or `technical-seo` as templates). Each entry needs:
- `slug`, `title`, `tagline`, `description`, `heroDescription`
- `metaTitle` (note: currently overridden by service-detail.php template — see Step 2)
- `metaDescription`, `metaKeywords`
- `seoContent` (3 paragraphs)
- `deepContent` (4-5 heading+paragraphs sections matching the outlines above)
- `pricingNote`
- `features` (6-8 feature cards)
- `process` (5 steps)
- `stats` (3-4 stat cards)
- `relatedServices` (link to seo, ecommerce-marketing, technical-seo, etc.)

### Step 2: Add Title Overrides in `service-detail.php`

The default title pattern is `"Best {Service} Services in Canada | TML Agency"`. Add overrides in the `$titleOverrides` map (or create one if following audit 01 recommendation):

```php
$titleOverrides = [
    // ... existing overrides ...
    'ecommerce-seo'  => 'Ecommerce SEO Services | Ecommerce SEO Experts | TML',
    'enterprise-seo' => 'Enterprise SEO Services | Enterprise SEO Agency | TML',
];
```

### Step 3: Add Image Mappings in `service-detail.php`

Add entries to the `$serviceImageMap` array (around line 53):

```php
'ecommerce-seo'   => ['web-design-landing-page.webp', 'saas-website-design.webp', 'digital-marketing-creative.webp'],
'enterprise-seo'  => ['web-design-landing-page.webp', 'brand-strategy-visual.webp', 'marketing-campaign-visual.webp'],
```

### Step 4: Internal Linking Updates

- Update `relatedServices` arrays in `seo`, `ecommerce-marketing`, `technical-seo`, `shopify-development` entries to include the new slugs
- Add cross-links in deepContent where natural

### Step 5: Submit to Google

- Add both new URLs to the XML sitemap
- Submit via Google Search Console for immediate indexing
- If using the IndexNow/Google Indexing API (see `scripts/google-indexing-api.php`), submit both URLs

---

## Quick Wins on Existing Pages

While the dedicated pages are being created, make these immediate improvements:

### `/services/seo` — Quick Fix
Add "enterprise seo" to the `metaKeywords` array and add a brief enterprise SEO callout in the deepContent that links to the future dedicated page.

### `/services/ecommerce-marketing` — Quick Fix
Add "ecommerce seo" keyword variants to the `metaKeywords` array:
```json
"ecommerce seo expert",
"ecommerce seo service",
"seo for ecommerce"
```

These will not rank the pages for these terms (the pages are not topically focused enough), but they signal relevance and support the internal linking strategy once dedicated pages exist.

---

## Competitive Advantage Note

The KD 14 for "enterprise seo marketing company" is exceptionally low for a commercial keyword. Most competitors targeting this term are national agencies with strong domain authority — but they often have generic pages that try to cover everything. A well-structured, deeply focused 3,000-word page on enterprise SEO, combined with TML's existing domain authority from 1,550+ location pages and 30+ service pages, should be sufficient to rank on page 1 within 3-6 months without aggressive link building.

Similarly, "ecommerce seo expert" at KD 23 with 260 monthly volume represents a straightforward ranking opportunity. The search intent is clearly hire-ready (someone looking for an expert to hire), making these high-converting keywords despite moderate volume.
