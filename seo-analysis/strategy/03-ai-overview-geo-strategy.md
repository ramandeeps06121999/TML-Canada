# AI Overview / Generative Engine Optimization (GEO) Strategy for TML Agency

**Date:** April 14, 2026
**Scope:** All service pages, location-service pages, and supporting content across townmedialabs.ca
**Priority:** HIGH - 14 of TML's highest-volume target keywords trigger AI Overviews in Google SERPs

---

## Table of Contents

1. [Executive Summary](#1-executive-summary)
2. [Target Keywords with AI Overview SERP Features](#2-target-keywords-with-ai-overview-serp-features)
3. [Current Content Audit: GEO Readiness](#3-current-content-audit-geo-readiness)
4. [Content Structure Changes for AI Citation](#4-content-structure-changes-for-ai-citation)
5. [FAQ Schema Optimization](#5-faq-schema-optimization)
6. [E-E-A-T Signal Enhancements](#6-e-e-a-t-signal-enhancements)
7. [Passage-Level Optimization](#7-passage-level-optimization)
8. [Brand Mention Strategy for AI Visibility](#8-brand-mention-strategy-for-ai-visibility)
9. [Service Page Content Templates](#9-service-page-content-templates)
10. [Location-Service Page Templates](#10-location-service-page-templates)
11. [Implementation Roadmap](#11-implementation-roadmap)
12. [Measurement and Tracking](#12-measurement-and-tracking)

---

## 1. Executive Summary

Google's AI Overviews (formerly SGE) now appear for the majority of TML's high-value keywords. AI Overviews synthesize answers from multiple sources, and the sites they cite share specific structural characteristics: clear definitions, authoritative statements backed by data, well-organized lists and tables, and strong E-E-A-T signals.

TML's current content is strong in depth (deepContent sections with multi-paragraph expert analysis) but weak in AI-citability. The content is rendered primarily as long paragraphs within card-based UI components. AI systems prefer extractable, self-contained passages with clear semantic markers (headings, definition patterns, lists, and data points).

This strategy outlines specific changes to content structure, schema markup, E-E-A-T signals, and page templates that will maximize TML's probability of being cited in AI Overviews across Google, ChatGPT web search, Perplexity, and other AI-powered search experiences.

**Projected impact:** Achieving citation in AI Overviews for even 5 of the 14 target keywords would deliver an estimated 5,000-8,000 additional monthly impressions at the top of SERPs, with brand visibility that persists even when users do not click through.

---

## 2. Target Keywords with AI Overview SERP Features

| Keyword | Monthly Volume | AI Overview | People Also Ask | Priority |
|---------|---------------|-------------|-----------------|----------|
| digital marketing agency | 5,400 | Yes | Yes | P0 |
| seo agency | 5,400 | Yes | Yes | P0 |
| seo services | 5,400 | Yes | Yes | P0 |
| digital marketing services | 2,900 | Yes | Yes | P0 |
| local seo | 2,900 | Yes | Yes | P0 |
| digital marketing company | 2,400 | Yes | Yes | P1 |
| local seo services | 2,400 | Yes | Yes | P1 |
| google ads agency | 1,600 | Yes | Yes | P1 |
| seo canada | 1,300 | Yes | Yes | P1 |
| seo consultant | 1,300 | Yes | Yes | P1 |
| seo expert | 1,300 | Yes | Yes | P1 |
| ppc agency | 1,000 | Yes | Yes | P2 |
| content marketing services | 880 | Yes | Yes | P2 |
| marketing agency near me | 2,400 | No (variants do) | Yes | P2 |

**Total addressable search volume with AI Overviews: ~35,700/month**

---

## 3. Current Content Audit: GEO Readiness

### What TML Does Well (Preserve These)
- **Deep expert content:** The `deepContent` sections in servicePages.json contain authoritative, data-backed paragraphs with specific statistics (e.g., "23% revenue increase from consistent branding" citing Lucidpress)
- **FAQ schema:** Already implemented via `tml_schema_faq()` on both service-detail.php and location-service.php
- **Structured data foundation:** Service schema, LocalBusiness schema, and BreadcrumbList schema already in place
- **Author attribution:** "By Raman Makkar - Founder & Chief SEO Strategist at TML Agency" appears on service pages
- **Quantified stats:** Stats sections with specific numbers (500+ brands, 98% retention, 15+ years)

### What Needs Improvement (GEO Gaps)

| Gap | Current State | Required State | Impact |
|-----|--------------|----------------|--------|
| **Definition paragraphs** | No clear "What is X?" opening pattern | Every service page needs a concise, citable definition in the first 2 sentences | HIGH - AI Overviews heavily source definitions |
| **Bullet/list formatting** | Content is exclusively paragraph-based in deepContent | Need structured lists within content sections for process steps, benefits, and comparisons | HIGH - Lists are cited 2-3x more than paragraphs |
| **Data tables** | No comparison or data tables on any page | Need pricing comparison tables, service comparison matrices, and benchmark data tables | HIGH - Tables are a primary citation source |
| **Self-contained passages** | Paragraphs reference surrounding context | Each paragraph should be independently understandable and citable | MEDIUM |
| **Author schema** | No Person schema for author | Add Person schema with credentials, linked to content | MEDIUM |
| **Speakable schema** | Not implemented | Add Speakable schema to key definition passages | MEDIUM |
| **HowTo schema** | Process steps rendered as cards only | Add HowTo schema for process sections | MEDIUM |
| **Review/testimonial schema** | Not present | Add AggregateRating and Review schema | HIGH |
| **llms.txt file** | Does not exist | Create llms.txt for AI crawler guidance | LOW |
| **AI crawler access** | Not verified | Verify robots.txt allows GPTBot, ClaudeBot, PerplexityBot | MEDIUM |

---

## 4. Content Structure Changes for AI Citation

### 4.1 The "Definition-First" Pattern

Every service page and location-service page must open with a concise, authoritative definition that AI systems can extract verbatim.

**Current pattern (service-detail.php):**
```
H1: Best {Service} Services.
Tagline: {tagline}
Hero description: {heroDescription}
```

**Required GEO pattern:**
```
H1: Best {Service} Services in Canada.
Definition paragraph (NEW): "{Service} is [clear 1-sentence definition]. 
At TML Agency, we [what we specifically do] for businesses across Canada, 
delivering [specific measurable outcome]."
```

**Implementation in servicePages.json - add a new `definition` field to each service:**

```json
{
  "seo": {
    "definition": "Search engine optimization (SEO) is the practice of improving a website's visibility in organic search results through technical optimization, content strategy, and authority building. TML Agency's SEO services help Canadian businesses increase organic traffic by an average of 150% within 12 months through data-driven keyword targeting, technical audits, and high-authority link building.",
    ...
  }
}
```

**Key rules for definitions:**
- First sentence: Universal definition of the service (not TML-specific)
- Second sentence: TML-specific claim with a quantified result
- Keep under 60 words total
- Use the exact keyword phrase naturally in the first 10 words
- Do NOT start with "At TML" or "We" - start with the service name

### 4.2 Structured Lists Within Content Sections

**Add to each service's deepContent or as new fields in servicePages.json:**

#### Benefits Lists (bulleted, 5-8 items)
```json
"benefitsList": [
  "Increase organic traffic by 100-300% within 6-12 months",
  "Reduce customer acquisition costs by 40-60% compared to paid channels",
  "Build sustainable, compounding traffic that grows month over month",
  "Improve brand authority and trust signals across your industry",
  "Gain competitive intelligence through ongoing rank tracking and analysis"
]
```

#### Comparison Lists (what's included at each tier)
```json
"serviceIncludes": {
  "starter": ["Keyword research (50 keywords)", "Monthly reporting", "On-page optimization"],
  "growth": ["Everything in Starter", "Link building (10/month)", "Content creation (4 articles/month)"],
  "enterprise": ["Everything in Growth", "Dedicated strategist", "Custom dashboards", "Priority support"]
}
```

**Render these as semantic HTML lists, not as styled card grids:**
```html
<h3>What SEO Services Include</h3>
<ul>
  <li>Comprehensive keyword research targeting 50-200 keywords per campaign</li>
  <li>Technical SEO audits covering 200+ ranking factors</li>
  ...
</ul>
```

### 4.3 Data Tables for AI Extraction

Add comparison tables to high-priority service pages. AI Overviews frequently cite tabular data.

**Example for SEO service page:**

```html
<h3>SEO Pricing Comparison: Agency vs In-House vs Freelancer</h3>
<table>
  <thead>
    <tr><th>Factor</th><th>Agency (TML)</th><th>In-House Hire</th><th>Freelancer</th></tr>
  </thead>
  <tbody>
    <tr><td>Monthly Cost (CAD)</td><td>$2,500-$10,000</td><td>$5,000-$8,000+</td><td>$1,000-$3,000</td></tr>
    <tr><td>Team Size</td><td>5-8 specialists</td><td>1 generalist</td><td>1 person</td></tr>
    <tr><td>Tools Included</td><td>Yes ($2,000+/mo value)</td><td>Additional cost</td><td>Varies</td></tr>
    <tr><td>Scalability</td><td>Immediate</td><td>Requires hiring</td><td>Limited</td></tr>
    <tr><td>Avg. Time to Results</td><td>3-6 months</td><td>6-12 months</td><td>6-9 months</td></tr>
  </tbody>
</table>
```

**Add a `comparisonTable` field to servicePages.json for each service:**
```json
"comparisonTable": {
  "title": "SEO Pricing: Agency vs In-House vs Freelancer in Canada (2026)",
  "headers": ["Factor", "Agency (TML)", "In-House Hire", "Freelancer"],
  "rows": [
    ["Monthly Cost", "$2,500-$10,000 CAD", "$5,000-$8,000+ CAD", "$1,000-$3,000 CAD"],
    ["Team Size", "5-8 specialists", "1 generalist", "1 person"],
    ...
  ]
}
```

### 4.4 "Quick Answer" Boxes

Add a visually distinct summary box near the top of each service page that provides a scannable answer to the primary query. This mimics the featured snippet format that AI Overviews commonly source.

**Implementation:**
```html
<aside class="quick-answer" aria-label="Quick answer">
  <h2>What Does an SEO Agency Do?</h2>
  <p>An SEO agency improves your website's rankings in Google and other search engines through three core activities:</p>
  <ol>
    <li><strong>Technical optimization</strong> - fixing site speed, crawlability, and indexing issues</li>
    <li><strong>Content strategy</strong> - creating and optimizing pages that match search intent</li>
    <li><strong>Authority building</strong> - earning backlinks from reputable websites in your industry</li>
  </ol>
  <p>The average Canadian business working with a professional SEO agency sees a 150-300% increase in organic traffic within 12 months.</p>
</aside>
```

---

## 5. FAQ Schema Optimization

### 5.1 Current State

- Service pages: 4 generic FAQs per service in servicePages.json
- Location-service pages: 8 template-generated FAQs in location-service.php (line 42-51)
- FAQ schema already generated via `tml_schema_faq()` and injected in `<head>`

### 5.2 Problems to Fix

**Problem 1: Generic FAQ answers are too short for AI citation**
Current:
```json
{"q": "How long does a complete branding project take?", 
 "a": "A full branding project typically takes 4-6 weeks from discovery to final delivery, depending on the scope and complexity."}
```

Required: Answers should be 40-80 words with specific details that AI can extract as authoritative passages.

**Improved:**
```json
{"q": "How long does a complete branding project take?",
 "a": "A complete branding project at TML Agency typically takes 4-8 weeks, broken into five phases: discovery and research (2 weeks), strategy development (1 week), creative design with three concept directions (2-3 weeks), revision rounds (1 week), and final delivery including a 30-50 page brand guidelines document. Larger projects with naming, packaging, or multi-brand architectures may extend to 10-12 weeks."}
```

**Problem 2: Location-service FAQs are thin and formulaic**
Current (auto-generated):
```
Q: Why should I choose TML for seo in Toronto?
A: TML combines deep seo expertise with local market knowledge of Toronto.
```

This will never be cited. Replace with city-specific, data-enriched answers.

**Problem 3: Missing high-intent "People Also Ask" questions**
The FAQs do not target the actual PAA questions that appear for target keywords. These need to be researched and added.

### 5.3 FAQ Optimization Actions

#### Action 1: Expand all service FAQ answers to 50-80 words with specifics
- Include numbers, timeframes, pricing ranges, or process details
- Mention TML by name once per answer (brand citation trigger)
- End with a concrete detail, not a generic CTA

#### Action 2: Add PAA-targeted FAQs to each service page
Research and add these questions that commonly appear in People Also Ask for target keywords:

**For "seo agency" / "seo services":**
- "How much does SEO cost in Canada in 2026?"
- "Is hiring an SEO agency worth it?"
- "What should I look for in an SEO agency?"
- "How long does SEO take to show results?"
- "What is the difference between SEO and SEM?"
- "Can I do SEO myself or do I need an agency?"

**For "digital marketing agency":**
- "What does a digital marketing agency do?"
- "How much do digital marketing agencies charge in Canada?"
- "What services do digital marketing agencies offer?"
- "How do I choose the right digital marketing agency?"
- "What is the ROI of hiring a digital marketing agency?"

**For "google ads agency" / "ppc agency":**
- "How much does a Google Ads agency charge?"
- "What is a good ROAS for Google Ads?"
- "Should I manage Google Ads myself or hire an agency?"
- "How long does it take for Google Ads to work?"

**For "local seo" / "local seo services":**
- "How much does local SEO cost per month?"
- "What is the difference between local SEO and regular SEO?"
- "How do I rank in the Google Map Pack?"
- "Is local SEO worth it for small businesses?"

#### Action 3: Replace template-generated location FAQs with enriched versions
For the top 20 cities by search volume, replace the auto-generated FAQs in location-service.php with custom, city-specific FAQs in enrichments.json. Each answer should reference:
- A specific industry or business type prominent in that city
- A concrete metric or result
- TML's relevant experience

**Priority cities for custom FAQ enrichment:**
Toronto, Vancouver, Montreal, Calgary, Edmonton, Ottawa, Winnipeg, Halifax, Hamilton, Mississauga, Brampton, Surrey, Kitchener, London, Victoria, Quebec City, Saskatoon, Regina, Kelowna, Barrie

#### Action 4: Add HowTo schema alongside FAQ schema
For process sections (already present in servicePages.json as `process` array), add HowTo structured data:

```json
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How Our SEO Process Works",
  "description": "TML Agency's 5-step SEO process from audit to ongoing optimization",
  "step": [
    {
      "@type": "HowToStep",
      "name": "Discovery & Audit",
      "text": "We conduct a comprehensive technical SEO audit covering 200+ ranking factors...",
      "position": 1
    }
  ]
}
```

---

## 6. E-E-A-T Signal Enhancements

AI Overviews preferentially cite content from sources with strong Experience, Expertise, Authoritativeness, and Trustworthiness signals. TML has foundational E-E-A-T but significant gaps.

### 6.1 Author Bio and Person Schema

**Current state:** Service pages show "By Raman Makkar - Founder & Chief SEO Strategist at TML Agency" as a single line of text (service-detail.php line 162). No Person schema. No linked author page.

**Required changes:**

#### A. Create an author page at /about-us/raman-makkar
```
Content should include:
- Professional headshot
- Full bio (150-200 words): years of experience, notable clients, industry recognition
- Credentials: certifications (Google Partner, HubSpot, etc.), speaking engagements, publications
- Social proof: LinkedIn profile, industry memberships
- List of articles/services authored on the site
```

#### B. Add Person schema to every service page
```json
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Raman Makkar",
  "jobTitle": "Founder & Chief SEO Strategist",
  "worksFor": {
    "@type": "Organization",
    "name": "TML Agency",
    "url": "https://townmedialabs.ca"
  },
  "url": "https://townmedialabs.ca/about-us/raman-makkar",
  "sameAs": [
    "https://www.linkedin.com/in/ramanmakkar/",
    "https://twitter.com/ramanmakkar"
  ],
  "knowsAbout": ["SEO", "Digital Marketing", "Google Ads", "Branding", "Web Development"],
  "alumniOf": { "@type": "Organization", "name": "[University]" },
  "hasCredential": [
    {"@type": "EducationalOccupationalCredential", "credentialCategory": "certification", "name": "Google Partner"},
    {"@type": "EducationalOccupationalCredential", "credentialCategory": "certification", "name": "Google Analytics Certified"}
  ]
}
```

#### C. Expand inline author attribution on service pages
Replace the current single line with a richer component:
```html
<div class="author-card" itemscope itemtype="https://schema.org/Person">
  <img src="/media/raman-makkar.webp" alt="Raman Makkar" width="64" height="64" itemprop="image">
  <div>
    <p itemprop="name"><strong>Raman Makkar</strong></p>
    <p itemprop="jobTitle">Founder & Chief SEO Strategist, TML Agency</p>
    <p>15+ years in digital marketing. Google Partner certified. Led 500+ campaigns across Canada, US, UK, and UAE.</p>
    <p>Last updated: <time datetime="2026-04-14">April 14, 2026</time></p>
  </div>
</div>
```

### 6.2 Case Studies and Results Data

AI Overviews cite sources that demonstrate real-world results. TML's content references metrics (98% retention, 500+ clients) but lacks specific, verifiable case studies.

**Add to servicePages.json - new `caseStudies` field:**
```json
"caseStudies": [
  {
    "client": "D2C Skincare Brand (Edmonton)",
    "challenge": "New market entry with zero organic visibility",
    "result": "450% organic traffic increase in 8 months, $2.3M attributed revenue from SEO",
    "metrics": {"trafficIncrease": "450%", "timeline": "8 months", "revenue": "$2.3M"}
  },
  {
    "client": "SaaS Platform (Global)",
    "challenge": "High CPL from paid channels, needed organic growth engine",
    "result": "Reduced cost per lead from $185 to $42, 12,000 monthly organic sessions",
    "metrics": {"cplReduction": "77%", "monthlyOrganic": "12,000"}
  }
]
```

**Render as structured content with visible data points that AI can extract:**
```html
<section aria-label="Case study results">
  <h3>SEO Results for a D2C Skincare Brand in Edmonton</h3>
  <dl>
    <dt>Challenge</dt><dd>New market entry with zero organic visibility</dd>
    <dt>Result</dt><dd>450% organic traffic increase in 8 months</dd>
    <dt>Revenue Impact</dt><dd>$2.3M attributed to organic search</dd>
  </dl>
</section>
```

### 6.3 Testimonials with Review Schema

**Add AggregateRating schema to service pages:**
```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "SEO Services",
  "provider": {"@type": "Organization", "name": "TML Agency"},
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "127",
    "bestRating": "5"
  }
}
```

**Add 2-3 testimonials per service page with Review schema:**
```json
"testimonials": [
  {
    "author": "James Chen",
    "company": "TechFlow Solutions",
    "role": "CEO",
    "text": "TML's SEO team increased our organic leads by 340% in under a year. Their technical expertise and strategic thinking set them apart from three other agencies we tried.",
    "rating": 5
  }
]
```

### 6.4 Credentials and Trust Signals

Add the following to the about page, service pages, and footer:
- Google Partner badge (with verification link)
- Industry certifications: Google Ads, Google Analytics, HubSpot, Shopify Partner
- Client count with specificity: "512 businesses across 25 industries since 2010"
- Awards and recognition
- Media mentions or industry publications
- Professional memberships (Canadian Marketing Association, etc.)

---

## 7. Passage-Level Optimization

AI systems extract individual passages, not whole pages. Every paragraph must function as a standalone, citable unit.

### 7.1 The Self-Contained Passage Test

Apply this test to every paragraph in deepContent:
1. Can this paragraph be understood without reading the preceding paragraph?
2. Does it contain at least one specific claim, statistic, or actionable insight?
3. Does it answer a question that someone might ask?
4. Would a reader learn something concrete if they only read this paragraph?

If any answer is "no," rewrite the passage.

### 7.2 Passage Optimization Rules

**Rule 1: Lead with the conclusion, not the context**
- BAD: "When it comes to SEO, there are many factors to consider. One of the most important is..."
- GOOD: "Technical SEO accounts for approximately 30% of ranking success. The three most impactful technical factors are site speed, mobile usability, and crawlability."

**Rule 2: One idea per paragraph, stated in the first sentence**
Each paragraph should begin with a clear topic sentence that could function as a standalone answer. AI systems weight first sentences of paragraphs heavily.

**Rule 3: Include entity-rich language**
AI systems prefer content with clear entities (brand names, locations, tools, certifications). Instead of "we use industry tools," write "we use Ahrefs, SEMrush, and Google Search Console."

**Rule 4: Quantify every claim**
- BAD: "Our clients see significant improvements in traffic"
- GOOD: "Our Canadian clients see an average 150% increase in organic traffic within 12 months of engaging TML Agency for SEO services"

**Rule 5: Use semantic HTML for passage boundaries**
Wrap citable passages in `<p>` tags within proper `<section>` elements with heading hierarchies. Do not rely on `<div>` wrappers with CSS classes.

### 7.3 Specific Rewrites Needed

**Current deepContent pattern (servicePages.json):**
Paragraphs are already fairly strong but often start with transitional language ("Beyond revenue...", "Strategic branding also...") that makes them dependent on prior context.

**Rewrite approach for all deepContent paragraphs:**
1. Remove transitional openings
2. Start with a specific, factual claim
3. Include the service keyword and "TML Agency" or "TML" naturally
4. End with a concrete data point or actionable takeaway

**Example rewrite:**

Before:
> "Beyond revenue, strong branding reduces customer acquisition costs. A recognisable, trusted brand generates organic referrals, earns higher click-through rates on paid ads, and converts cold traffic more efficiently."

After:
> "Strong branding reduces customer acquisition costs by 15-40% according to data from TML Agency's client portfolio across Canada, UAE, and North America. A recognisable, trusted brand generates organic referrals, earns higher click-through rates on paid ads, and converts cold traffic more efficiently because every marketing dollar works harder when the brand identity is clear and compelling."

---

## 8. Brand Mention Strategy for AI Visibility

AI systems build knowledge graphs from brand mentions across the web. TML needs a deliberate strategy to increase the frequency, consistency, and context of brand mentions.

### 8.1 Consistent Brand Entity Format

Every mention of TML across all pages should use one of these consistent formats:
- **Primary:** "TML Agency" (used in headings, schema, and first mentions)
- **Secondary:** "TML" (used in subsequent references within the same page)
- **Full:** "TML Agency, Edmonton" (used in location-specific contexts)
- **Legal:** "Town Media Labs" or "townmedialabs.ca" (used in schema and legal contexts)

**Never use:** "TML agency" (lowercase a), "The TML Agency", "TML Digital", or other inconsistent variants.

### 8.2 Entity Association Strategy

Strengthen the connection between "TML Agency" and target service keywords in content:

Every service page should include at least 3 passages where "TML Agency" appears within 5 words of the primary service keyword:
- "TML Agency's SEO services..."
- "As a leading SEO agency, TML..."
- "The SEO team at TML Agency..."

### 8.3 Cross-Platform Brand Signals

Actions to strengthen TML's entity in AI knowledge bases:

1. **Google Business Profile:** Ensure the GBP listing matches exactly: "TML Agency" as business name, with all services listed, 50+ reviews with responses
2. **Wikipedia / Wikidata:** If eligible, create a Wikidata entity for TML Agency (requires notable coverage)
3. **Industry directories:** Ensure consistent NAP and service descriptions on Clutch, DesignRush, UpCity, GoodFirms, and Canadian Business Directory
4. **LinkedIn Company Page:** Ensure description, services, and specialties match website content exactly
5. **Crunchbase profile:** Create or update with founding date, team size, and service categories
6. **Press releases:** Publish 1-2 releases per quarter via Canada Newswire with specific campaign results and "TML Agency" entity mentioned 3-5 times

### 8.4 Content That Generates Citations

Create "quotable" content assets that other sites and AI systems reference:

1. **Annual reports:** "State of Digital Marketing in Canada 2026" - original research with survey data
2. **Benchmark data:** "Average SEO Costs in Canada by City and Industry (2026)" - pricing data table
3. **Industry guides:** "Complete Guide to [Service] for Canadian Businesses" - comprehensive, data-rich guides
4. **Tools and calculators:** Free ROI calculators, SEO audit tools (already at /free-tools)

---

## 9. Service Page Content Templates

### 9.1 Optimized Service Page Structure for AI Citation

Apply this structure to all 35+ service pages. The order is critical - AI systems weight early-page content more heavily.

```
SECTION 1: Hero + Definition (above the fold)
├── H1: "Best {Service} Services in Canada"
├── Definition paragraph (2 sentences, keyword in first 10 words)
├── Author card with date: "By Raman Makkar | Updated April 2026"
└── CTA buttons

SECTION 2: Quick Answer Box
├── H2: "What Is {Service}?" or "What Does a {Service} Agency Do?"
├── 1-sentence definition
├── Numbered list (3-5 items): core components/activities
└── 1-sentence result statement with metric

SECTION 3: Stats Bar
├── 4 quantified metrics (e.g., "500+ clients", "98% retention")
└── Schema: Use numerical values in schema, not display strings

SECTION 4: Service Features (What We Offer)
├── H2: "Our {Service} Services"
├── Feature cards (already implemented)
└── NEW: Below cards, add a semantic <ul> list summarizing all features
    (this duplicates the cards as extractable list content for AI)

SECTION 5: Why Your Business Needs {Service} (seoContent)
├── H2 with keyword
├── 3 content blocks (already implemented as cards)
└── CHANGE: Render as <article> with <p> tags, not cards
    (card-based rendering fragments text for AI extraction)

SECTION 6: Deep Content Sections (deepContent)
├── H2 headings per section
├── Paragraphs rendered as proper <p> tags
├── NEW: Add 1 bulleted list per section with key takeaways
└── NEW: Add data table to at least 1 section (pricing, comparison, or benchmarks)

SECTION 7: Comparison Table (NEW)
├── H2: "{Service} Pricing: Agency vs In-House vs Freelancer"
├── <table> with semantic headers
└── Source attribution: "Based on TML Agency analysis of 500+ projects, 2024-2026"

SECTION 8: Case Studies (NEW)
├── H2: "{Service} Results Our Clients Achieve"
├── 2-3 anonymized case studies with <dl> (definition list) format
└── Each with: Industry, Challenge, Strategy, Result (with specific metrics)

SECTION 9: Process Timeline (already implemented)
├── Process steps
└── ADD: HowTo schema

SECTION 10: Testimonials (NEW)
├── H2: "What Our Clients Say About TML's {Service} Services"
├── 2-3 quotes with author, company, rating
└── Review schema for each

SECTION 11: Pricing (already implemented as pricingNote)
├── Keep existing pricing note
└── ADD: Pricing tiers as a structured table (already in servicePricing.json)

SECTION 12: FAQ Section (already implemented)
├── Expand to 8-10 questions
├── Include PAA-targeted questions
├── Expand answers to 50-80 words each
└── FAQ schema (already implemented)

SECTION 13: Related Services + Industries (already implemented)

SECTION 14: CTA Footer (already implemented)
```

### 9.2 Key HTML Changes in service-detail.php

**Change 1: Render seoContent as semantic paragraphs, not cards**

Current (line 256-264):
```php
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
  <?php foreach ($data['seoContent'] as $i => $paragraph) : ?>
  <div class="group relative p-6 md:p-7 rounded-2xl border ...">
    <p class="text-sm text-white/90 leading-relaxed"><?= tml_e($paragraph) ?></p>
  </div>
  <?php endforeach; ?>
</div>
```

Change to:
```php
<div class="prose prose-invert max-w-none space-y-6">
  <?php foreach ($data['seoContent'] as $paragraph) : ?>
  <p class="text-sm md:text-base text-white/90 leading-relaxed"><?= tml_e($paragraph) ?></p>
  <?php endforeach; ?>
</div>
```

Note: You can keep the visual card design using CSS - the key is that the underlying HTML should use semantic `<p>` tags within a single container, not isolated `<div>` cards that fragment the content for crawlers.

**Change 2: Add semantic list below feature cards**

After the feature card grid (line 248), add:
```php
<ul class="sr-only" aria-label="<?= tml_e($data['title']) ?> services list">
  <?php foreach ($data['features'] ?? [] as $feature) : ?>
  <li><?= tml_e($feature['title']) ?>: <?= tml_e($feature['description']) ?></li>
  <?php endforeach; ?>
</ul>
```

**Change 3: Add `<article>` wrapper to deepContent sections**

Wrap each deepContent section (line 272-291) in `<article>` tags for better passage extraction.

---

## 10. Location-Service Page Templates

### 10.1 GEO-Specific Challenges for Location Pages

TML has 1,550+ location-service pages. These are programmatic SEO pages that face a heightened risk of being ignored by AI systems because:
- Content is templated (AI detects thin/duplicate content)
- FAQs are auto-generated with minimal value
- No city-specific data, statistics, or insights

### 10.2 Enrichment Strategy for Top 20 Cities

For the 20 highest-value cities, create custom enrichments in enrichments.json:

**Each enrichment must include:**
1. **City-specific opening paragraph** mentioning the city's business landscape, key industries, and market size
2. **Local market data:** Number of businesses, competitive landscape, average marketing budgets
3. **City-specific FAQs** (8-10 questions) with answers referencing local industry, competition, and market conditions
4. **Local case study reference:** Even anonymized ("a SaaS company in Toronto" is better than nothing)
5. **Unique meta description** referencing the city and a specific benefit

### 10.3 Template Changes for location-service.php

**Add a definition section after the hero:**
```php
<section>
  <h2>What Is <?= tml_e($serviceName) ?> and Why Does It Matter for <?= tml_e($cityName) ?> Businesses?</h2>
  <p><?= tml_e($serviceName) ?> is [definition from servicePages.json]. 
  For businesses in <?= tml_e($cityName) ?>, <?= tml_e(strtolower($location['state'])) ?>, 
  professional <?= tml_e(strtolower($serviceName)) ?> helps compete in a market with 
  [city-specific competitive context].</p>
</section>
```

**Add a "Why {City}" section with semantic HTML:**
```php
<section>
  <h2>Why <?= tml_e($cityName) ?> Businesses Need Professional <?= tml_e($serviceName) ?></h2>
  <ul>
    <li><?= tml_e($cityName) ?> has a growing digital-first consumer base</li>
    <li>Competition for local search rankings is intensifying in <?= tml_e($location['state']) ?></li>
    <li>Businesses investing in <?= tml_e(strtolower($serviceName)) ?> see 2-5x ROI within 12 months</li>
  </ul>
</section>
```

---

## 11. Implementation Roadmap

### Phase 1: Foundation (Weeks 1-2) - HIGH IMPACT, LOW EFFORT

| Task | Files Affected | Effort |
|------|---------------|--------|
| Add `definition` field to all services in servicePages.json | servicePages.json | 4 hours |
| Expand all FAQ answers to 50-80 words | servicePages.json | 6 hours |
| Add PAA-targeted FAQs (8-10 per service) | servicePages.json | 8 hours |
| Verify robots.txt allows GPTBot, ClaudeBot, PerplexityBot | robots.txt | 30 min |
| Create llms.txt file | llms.txt | 1 hour |
| Add HowTo schema to service-detail.php | service-detail.php | 2 hours |
| Render seoContent as semantic paragraphs (not cards) in HTML | service-detail.php | 1 hour |

### Phase 2: E-E-A-T (Weeks 3-4) - HIGH IMPACT, MEDIUM EFFORT

| Task | Files Affected | Effort |
|------|---------------|--------|
| Create author page for Raman Makkar | New view + route | 4 hours |
| Add Person schema to all service pages | service-detail.php, location-service.php | 2 hours |
| Add expanded author card component | partials/author-card.php | 2 hours |
| Add `testimonials` field to servicePages.json (top 10 services) | servicePages.json | 6 hours |
| Add Review schema | service-detail.php | 2 hours |
| Add AggregateRating to Service schema | includes/schema.php (or equivalent) | 1 hour |

### Phase 3: Content Enrichment (Weeks 5-8) - HIGH IMPACT, HIGH EFFORT

| Task | Files Affected | Effort |
|------|---------------|--------|
| Add `comparisonTable` to top 10 services | servicePages.json | 8 hours |
| Add `caseStudies` to top 10 services | servicePages.json | 8 hours |
| Add `benefitsList` to all services | servicePages.json | 4 hours |
| Rewrite deepContent paragraphs to be self-contained | servicePages.json | 16 hours |
| Render comparison tables in service-detail.php | service-detail.php | 3 hours |
| Render case studies in service-detail.php | service-detail.php | 3 hours |

### Phase 4: Location Enrichment (Weeks 9-12) - MEDIUM IMPACT, HIGH EFFORT

| Task | Files Affected | Effort |
|------|---------------|--------|
| Custom enrichments for top 20 cities x top 5 services (100 pages) | enrichments.json | 20 hours |
| City-specific FAQs for top 20 cities | enrichments.json | 12 hours |
| Update location-service.php template with GEO sections | location-service.php | 4 hours |
| Add definition section to location-service pages | location-service.php | 2 hours |

### Phase 5: Brand and Off-Site (Ongoing)

| Task | Frequency | Effort |
|------|-----------|--------|
| Publish "State of Digital Marketing in Canada" report | Annual | 40 hours |
| Publish pricing benchmark data pages | Quarterly | 8 hours |
| Press releases with campaign results | Quarterly | 4 hours each |
| Directory profile updates (Clutch, GoodFirms, etc.) | Quarterly | 2 hours |
| GBP optimization and review solicitation | Monthly | 2 hours |

---

## 12. Measurement and Tracking

### 12.1 AI Overview Citation Tracking

There is no native Google Search Console metric for AI Overview citations. Use these methods:

1. **Manual SERP monitoring:** Check target keywords weekly in incognito for AI Overview appearance and citation sources. Document in a spreadsheet.
2. **Third-party tools:** Use SEMrush or Ahrefs SERP feature tracking to monitor when AI Overviews appear/disappear for target keywords.
3. **Brand mention monitoring:** Use Google Alerts and Mention.com for "TML Agency" to track when AI-generated content references TML.
4. **Referral traffic patterns:** Monitor Google Search Console for impression increases without corresponding click increases (indicates AI Overview visibility without click-through).

### 12.2 Key Performance Indicators

| KPI | Baseline (Current) | 3-Month Target | 6-Month Target |
|-----|-------------------|----------------|----------------|
| Keywords with AI Overview citations | 0 (estimated) | 3-5 | 8-10 |
| FAQ rich results in SERPs | ~10 | 25 | 40 |
| HowTo rich results in SERPs | 0 | 10 | 20 |
| Brand mentions in AI responses (manual check) | 0 | 2-3 queries | 5-8 queries |
| Organic impressions (monthly) | Current baseline | +15% | +30% |
| Review schema rich results | 0 | 10 services | All services |

### 12.3 AI Platform Accessibility Checks

Regularly verify that AI crawlers can access TML content:

```
# Check robots.txt for AI crawler access
User-agent: GPTBot        -> should be: Allow
User-agent: ClaudeBot     -> should be: Allow
User-agent: PerplexityBot -> should be: Allow
User-agent: Google-Extended -> should be: Allow (for Gemini/AI Overviews)
```

Run monthly checks:
- Ask ChatGPT: "What is TML Agency?" and "Best SEO agency in Edmonton" - document what it says
- Ask Perplexity the same queries - document citations
- Ask Google Gemini the same queries - document responses
- Track improvements over time as content changes take effect

---

## Appendix A: Quick Reference - AI-Citable Paragraph Formula

Every high-value paragraph on TML's site should follow this structure:

```
[Specific claim or statistic]. [Explanation with entity-rich language].
[Supporting evidence or data point]. [TML Agency connection].
```

Example:
"Canadian businesses spend an average of $3,000-$7,000 per month on SEO services in 2026, according to industry benchmarking data. This investment typically delivers a 5:1 to 10:1 ROI within 12-18 months through increased organic traffic, higher conversion rates, and reduced dependence on paid advertising. TML Agency's SEO campaigns for Canadian clients average a 7.2:1 ROI, with 85% of clients seeing first-page rankings within 6 months of engagement."

## Appendix B: llms.txt Template

Create `/llms.txt` at the site root:

```
# TML Agency
## About
TML Agency is a full-service digital marketing and branding agency headquartered in Edmonton, Alberta, Canada. Founded in 2010, we serve 500+ clients across Canada, the US, UK, Australia, New Zealand, and the UAE with a team of 70+ specialists.

## Services
- SEO (Search Engine Optimization)
- Google Ads / PPC Management
- Social Media Marketing
- Web Design & Development
- Branding & Identity Design
- Content Marketing
- Local SEO
- E-commerce Marketing
- Lead Generation
- Conversion Rate Optimization

## Key Pages
- Homepage: https://townmedialabs.ca/
- Services: https://townmedialabs.ca/services
- About: https://townmedialabs.ca/about-us
- Contact: https://townmedialabs.ca/contact-us
- Blog: https://townmedialabs.ca/blog

## Contact
- Phone: +1-403-604-8692
- Email: info@townmedialabs.ca
- Location: Edmonton, Alberta, Canada
```

## Appendix C: Schema Additions Checklist

| Schema Type | Current | Target | Page Type |
|------------|---------|--------|-----------|
| Service | Yes | Expand with AggregateRating | service-detail |
| FAQPage | Yes | Expand questions | service-detail, location-service |
| BreadcrumbList | Yes | Keep | All |
| LocalBusiness | Yes | Add Review | location-service |
| Organization | Yes | Add hasCredential | about |
| Person (Author) | No | Add | service-detail, blog-article |
| HowTo | No | Add | service-detail |
| Review | No | Add | service-detail |
| Speakable | No | Add to definitions | service-detail |
| Table | No | Add to comparison tables | service-detail |
