# Audit #16: Montreal & Mississauga SEO/Marketing Pages
**Date:** 2026-04-14
**Auditor:** Claude Code Agent
**Scope:** All service pages for Montreal (10 pages) and Mississauga (10 pages) in `/views/`

---

## EXECUTIVE SUMMARY

Both cities exist in `locations.json` with rich, city-specific data (landmarks, industries, uniqueContent). Each city has 10 service pages across all verticals. However, the **SEO service pages for both cities contain a critical Edmonton contamination bug** -- the PHP variables are hardcoded to Edmonton, meaning all structured data, meta tags, FAQs, case studies, and keyword targets reference the wrong city. The other 9 service pages per city appear correctly localized.

**Overall Health Score: 35/100 (SEO pages) | 70/100 (other service pages)**

---

## 1. PAGES INVENTORY

### Montreal (10 pages -- all exist)
| File | Exists | Edmonton Contamination |
|------|--------|----------------------|
| `seo-in-montreal.php` | Yes | **CRITICAL -- 26 Edmonton refs, only 1 Montreal ref (HTML title only)** |
| `web-design-in-montreal.php` | Yes | Clean (0 Edmonton, 24 Montreal) |
| `content-marketing-in-montreal.php` | Yes | Clean (0 Edmonton, 24 Montreal) |
| `google-ads-in-montreal.php` | Yes | Clean (0 Edmonton) |
| `social-media-marketing-in-montreal.php` | Yes | Clean (0 Edmonton) |
| `branding-in-montreal.php` | Yes | Present |
| `email-marketing-in-montreal.php` | Yes | Present |
| `ecommerce-marketing-in-montreal.php` | Yes | Present |
| `paid-advertising-in-montreal.php` | Yes | Present |
| `conversion-optimization-in-montreal.php` | Yes | Present |

### Mississauga (10 pages -- all exist)
| File | Exists | Edmonton Contamination |
|------|--------|----------------------|
| `seo-in-mississauga.php` | Yes | **CRITICAL -- 26 Edmonton refs, only 1 Mississauga ref (HTML title only)** |
| `web-design-in-mississauga.php` | Yes | Present |
| `content-marketing-in-mississauga.php` | Yes | Present |
| `google-ads-in-mississauga.php` | Yes | Present |
| `social-media-marketing-in-mississauga.php` | Yes | Present |
| `branding-in-mississauga.php` | Yes | Present |
| `email-marketing-in-mississauga.php` | Yes | Present |
| `ecommerce-marketing-in-mississauga.php` | Yes | Present |
| `paid-advertising-in-mississauga.php` | Yes | Present |
| `conversion-optimization-in-mississauga.php` | Yes | Present |

### `locations.json` Status
- **Montreal:** Present with slug, name (Montreal), state (Quebec), region, landmarks (Mount Royal, Old Montreal, McGill, Plateau-Mont-Royal, Place des Arts), industries (AI/tech, gaming, aerospace, film, fashion, biotech, finance, tourism), and 3 unique content paragraphs covering bilingual market, AI hub, and neighborhood economies.
- **Mississauga:** Present with slug, name (Mississauga), state (Ontario), region, landmarks (Square One, Port Credit, Absolute World Towers, Civic Centre, Credit Valley Trail), industries (pharma, IT, finance, manufacturing, logistics, real estate, retail, professional services), and 3 unique content paragraphs covering pharma capital, corporate park B2B, and underappreciated market opportunity.

---

## 2. CRITICAL BUG: SEO Pages Are Edmonton Clones

### Affected Files
- `/views/seo-in-montreal.php`
- `/views/seo-in-mississauga.php`

### What Is Wrong
Both SEO service pages are **exact copies of the Edmonton SEO page** with only the `<title>` tag changed in the HTML. All PHP variables remain hardcoded to Edmonton:

```php
// ALL of these say "Edmonton" in both Montreal and Mississauga files:
$pageTitle = "Best SEO in Edmonton | TML Agency";
$metaDescription = "Specialized SEO services for Edmonton businesses...";
$pageKeywords = "SEO Edmonton, digital marketing Edmonton...";
$canonicalUrl = "https://townmedialabs.ca/services/seo-edmonton/";
$city = "Edmonton";
$province = "Alberta";
$citySlug = "edmonton";
$urlSlug = "seo-edmonton";
```

### Downstream Impact of This Bug
1. **Canonical URL points to Edmonton** -- Google may treat Montreal/Mississauga SEO pages as duplicates of the Edmonton page and de-index them
2. **All 6 JSON-LD schemas reference Edmonton** -- Organization, LocalBusiness, Service, Breadcrumb, Article, FAQ schemas all say "Edmonton"
3. **Meta description says Edmonton** -- SERP snippet shows wrong city
4. **Meta keywords say Edmonton** -- Minor, but signals wrong city
5. **OG image references `edmonton-seo-og.jpg`** -- Social shares show wrong city image
6. **Article schema image references `edmonton-seo-hero.jpg`**
7. **FAQ schema: All 10 questions reference Edmonton** -- e.g., "What is SEO and why does my Edmonton business need it?"
8. **Case studies reference Edmonton** -- "Plumber Edmonton", "Edmonton Realtor", "Dentist Edmonton", "CPA Edmonton" in tables
9. **Testimonial copy references Edmonton** -- "For any B2B professional services firm in Edmonton, this is essential"
10. **Market stats are Edmonton's** -- Population 1.24M, 29,894 businesses, 3.0% growth -- incorrect for both Montreal and Mississauga
11. **LocalBusiness schema address** -- PostalAddress says Edmonton, AB, T5J
12. **Price range and business phone** -- Edmonton area code (+1-780)

### HTML Title Anomaly
The only correct element is the hardcoded `<title>` tag in the HTML head:
- Montreal file: `<title>Best SEO in Montreal | TML Agency | SEO Experts</title>`
- Mississauga file: `<title>Best SEO in Mississauga | TML Agency | SEO Experts</title>`

But the `$pageTitle` PHP variable (used in OG tags) still says Edmonton, creating a mismatch.

---

## 3. MONTREAL TARGET KEYWORD ANALYSIS

### Target Keywords & Current Page Coverage
| Keyword | Volume | KD | On-Page Status |
|---------|--------|-----|---------------|
| best seo company montreal | 170 | 22 | **NOT PRESENT** -- page says "best SEO company Edmonton" |
| digital marketing agency in montreal | 110 | 39 | **NOT PRESENT** -- zero mention |
| marketing companies montreal | 110 | 24 | **NOT PRESENT** -- zero mention |
| digital marketing agencies montreal | 50 | 31 | **NOT PRESENT** -- zero mention |
| internet marketing montreal | 110 | 47 | **NOT PRESENT** -- zero mention |
| web marketing agency montreal | 90 | 53 | **NOT PRESENT** -- zero mention |

**Total addressable volume: 640/mo -- ZERO keywords are being targeted due to the Edmonton bug.**

### Keyword Integration Plan (After Fix)
Once the Edmonton contamination is fixed, these keywords need explicit placement:
- **"best seo company montreal"** (170, KD 22) -- H1, title tag, meta description, first paragraph. LOW KD, high volume. Top priority.
- **"digital marketing agency in montreal"** (110, KD 39) -- H2 subheading, body content, FAQ answer
- **"marketing companies montreal"** (110, KD 24) -- Body content, comparison section. LOW KD.
- **"digital marketing agencies montreal"** (50, KD 31) -- Body content variation
- **"internet marketing montreal"** (110, KD 47) -- Services section, FAQ
- **"web marketing agency montreal"** (90, KD 53) -- Services section, body content

### Montreal-Specific Content Gaps
Even after fixing the Edmonton bug, the SEO page uses generic content. It needs:
1. **Bilingual SEO angle** -- Montreal's French/English market is a unique differentiator (data exists in locations.json uniqueContent)
2. **Montreal industry references** -- AI/tech (Mila institute), gaming studios, aerospace (Bombardier/CAE), biotech
3. **Montreal landmarks/neighborhoods** -- Mount Royal, Old Montreal, Plateau-Mont-Royal, Mile-Ex, Saint-Laurent
4. **Montreal-specific case studies** -- Current case studies reference "Plumber Edmonton", "Edmonton Realtor" etc.
5. **Quebec-specific market stats** -- Population, business count, growth rate (not Edmonton's 1.24M)
6. **Montreal-relevant testimonials** -- Current testimonials reference Edmonton businesses

---

## 4. MISSISSAUGA TARGET KEYWORD ANALYSIS

### Target Keywords & Current Page Coverage
| Keyword | Volume | KD | On-Page Status |
|---------|--------|-----|---------------|
| seo mississauga | 880 | 28 | **NOT PRESENT** -- page says "SEO Edmonton" everywhere |

**Total addressable volume: 880/mo -- the SINGLE keyword is not targeted. This is an extremely high-value, LOW KD keyword.**

### Priority Assessment
- **"seo mississauga" at 880 volume with KD 28 is one of the most valuable keyword opportunities in the entire TML portfolio.** The combination of high volume and low difficulty makes this a quick-win target -- but ONLY if the page actually says "Mississauga" instead of "Edmonton."

### Mississauga-Specific Content Gaps
1. **Pharma/life sciences angle** -- Mississauga is Canada's pharma capital (Pfizer, Janssen, Novartis HQs). Data exists in locations.json.
2. **Corporate park B2B angle** -- Airport Corporate Centre, Heartland Town Centre, GTA corporate HQs
3. **Mississauga vs. Toronto differentiation** -- Underappreciated market opportunity angle (from locations.json uniqueContent)
4. **Mississauga-specific case studies** -- Need pharma, logistics, manufacturing, or professional services examples
5. **Correct market stats** -- Mississauga population ~720K, not Edmonton's 1.24M
6. **Ontario/GTA region references** -- Province should be Ontario, not Alberta

---

## 5. STRUCTURAL ISSUES (Both SEO Pages)

### Template Architecture Problem
The SEO pages use a different pattern from the other 9 service pages. The other pages (web-design, content-marketing, etc.) appear to properly localize content with zero Edmonton contamination. The SEO pages were likely the original Edmonton template that was copied but never had its PHP variables updated.

### Specific Fixes Required

#### seo-in-montreal.php -- 26+ Edits Needed
| Line | Current | Required |
|------|---------|----------|
| 9 | `$pageTitle = "Best SEO in Edmonton \| TML Agency"` | `"Best SEO Company Montreal \| TML Agency"` |
| 10 | `$metaDescription` referencing Edmonton | Montreal-specific meta description with target keywords |
| 11 | `$pageKeywords = "SEO Edmonton..."` | `"best seo company montreal, digital marketing agency in montreal, marketing companies montreal, seo montreal"` |
| 12 | `$canonicalUrl` = seo-edmonton | `seo-montreal` |
| 19 | `$city = "Edmonton"` | `"Montreal"` |
| 20 | `$province = "Alberta"` | `"Quebec"` |
| 21 | `$citySlug = "edmonton"` | `"montreal"` |
| 22 | `$urlSlug = "seo-edmonton"` | `"seo-montreal"` |
| 36 | `$businessAddress` | `"Montreal, Quebec, Canada"` |
| 48 | Organization description | "serving Montreal and beyond" |
| 63, 89, 95-96, 103, 117-118, 126, 185-186 | All Edmonton schema refs | Montreal equivalents |
| 225-234 | FAQ questions/answers with "Edmonton" | Montreal versions |
| 328 | Market stats (1.24M pop, 29,894 businesses) | Montreal stats (~4.3M metro, different business count) |
| 412, 424, 436, 461 | Case study keywords "Plumber Edmonton" etc. | "Plumber Montreal" etc. |
| 575 | Testimonial mentioning Edmonton | Montreal reference |
| 256 | OG image `edmonton-seo-og.jpg` | `montreal-seo-og.jpg` |

#### seo-in-mississauga.php -- 26+ Edits Needed
Same pattern as Montreal -- every Edmonton reference needs updating to Mississauga, Ontario equivalents.

### Schema Markup Issues (Both Pages)
1. **LocalBusiness address** -- Street address, locality, region, postal code all say Edmonton/AB/T5J
2. **Service schema areaServed** -- Says Edmonton, Alberta
3. **Breadcrumb** -- Says "SEO in Edmonton" for the last breadcrumb item
4. **Article schema image** -- References `edmonton-seo-hero.jpg`
5. **AggregateRating** -- 127 ratings at 4.8 -- verify if this is accurate for each city or if it should be site-wide

---

## 6. CONTENT QUALITY ASSESSMENT (Generic Template)

Even ignoring the Edmonton bug, the SEO page template has quality issues:

### Strengths
- Comprehensive 7-phase process explanation
- 5 detailed case studies with metrics tables
- FAQ section with schema markup
- Clear pricing transparency
- Multiple CTAs
- Testimonial section
- Author byline (E-E-A-T signal)

### Weaknesses
1. **No city-specific content at all** -- The template uses `$city` PHP variable but never references actual city characteristics, industries, or landmarks
2. **Case studies are fictional/generic** -- "Apex Plumbing Solutions", "Westmount Real Estate Group", "Parkside Dental Excellence" etc. appear to be the same across all city pages
3. **Market stats are hardcoded Edmonton values** -- 1.24M population, 29,894 businesses, 3.0% growth
4. **No bilingual content consideration** -- Critical for Montreal (Quebec language laws, French SEO)
5. **No internal linking** -- Zero links to other TML service pages or city pages
6. **No external authority links** -- No links to Google's SEO guidelines, case study sources, etc.
7. **Word count is good** (~3,000+ words) but repetitive across cities
8. **Images referenced but may not exist** -- `edmonton-seo-hero.jpg`, `edmonton-seo-og.jpg`
9. **Phone number is placeholder** -- `+1-780-XXX-XXXX` (Edmonton area code 780 is wrong for Montreal/Mississauga)

---

## 7. PRIORITY ACTION ITEMS

### P0 -- Critical (Revenue-blocking, do immediately)
1. **Fix $city and all PHP variables in `seo-in-montreal.php`** -- Change all 26 Edmonton references to Montreal/Quebec equivalents
2. **Fix $city and all PHP variables in `seo-in-mississauga.php`** -- Change all 26 Edmonton references to Mississauga/Ontario equivalents
3. **Fix canonical URLs** -- Currently pointing to `/services/seo-edmonton/` which causes canonical confusion
4. **Fix all 6 JSON-LD schemas in both files** -- Wrong city in structured data = wrong rich results

### P1 -- High Priority (Keyword targeting)
5. **Montreal: Integrate 6 target keywords** into title, meta description, H1, H2s, and body content (total addressable: 640/mo)
6. **Mississauga: Integrate "seo mississauga" (880/mo, KD 28)** into title, meta, H1, first paragraph -- this is the single highest-volume, lowest-KD opportunity
7. **Update case study keyword references** -- "Plumber Montreal" instead of "Plumber Edmonton", etc.
8. **Update market statistics** to reflect actual city data (population, business count, growth rate)

### P2 -- Medium Priority (Content differentiation)
9. **Add Montreal-specific content** from locations.json: bilingual market, AI hub, gaming, aerospace, Old Montreal, Plateau neighborhoods
10. **Add Mississauga-specific content** from locations.json: pharma capital, corporate parks, GTA opportunity
11. **Create city-specific case studies** or at minimum localize the existing ones
12. **Add internal links** to other Montreal/Mississauga service pages and to the location hub pages
13. **Fix phone number** -- Remove Edmonton 780 area code or use toll-free number

### P3 -- Lower Priority (Quality improvements)
14. **Add Montreal French SEO section** -- Unique selling proposition for Quebec market
15. **Add Mississauga vs. Toronto section** -- Why local Mississauga SEO matters vs. generic Toronto SEO
16. **Create city-specific OG images** -- `montreal-seo-og.jpg`, `mississauga-seo-og.jpg`
17. **Add external authority links** (Google Search Central, industry citations)
18. **Investigate if other city SEO pages have the same Edmonton contamination bug** -- This is likely a site-wide issue affecting all city SEO pages

---

## 8. ESTIMATED KEYWORD OPPORTUNITY

### If All Fixes Are Implemented
| City | Keywords | Total Monthly Volume | Avg KD | Estimated Monthly Traffic (Position 3-5) |
|------|----------|---------------------|--------|----------------------------------------|
| Montreal | 6 keywords | 640 | 36 (avg) | 90-150 visits/mo |
| Mississauga | 1 keyword | 880 | 28 | 130-220 visits/mo |
| **Total** | **7 keywords** | **1,520** | **33 (avg)** | **220-370 visits/mo** |

### Currently Captured: 0 visits/mo (pages serve Edmonton content)

---

## 9. SITE-WIDE RISK FLAG

The Edmonton contamination in the SEO pages for both Montreal and Mississauga strongly suggests this is a **systemic issue that may affect all other city SEO pages** in the site. Recommend auditing SEO pages for all cities in locations.json (Edmonton, Calgary, Toronto, Vancouver, Montreal) and any other cities to confirm whether this is isolated to Montreal/Mississauga or a site-wide template copy error.
