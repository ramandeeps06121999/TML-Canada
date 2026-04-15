# TML Canada SEO Domination - Executive Summary
**Generated: 2026-04-14 | 35 analysis files | 790KB of strategic documentation**

---

## THE BIG PICTURE

Your keyword list of 457 keywords was analyzed against your site's 62 cities, 39 services, 1,488+ location-service pages, 74 blog articles, and 42 industry pages. Here's what we found:

### Your Keyword List: 40% Noise
- **457 total keywords** in the spreadsheet
- **~175 removed** as noise (other brands, generic tools, branded platforms, irrelevant topics)
- **~282 actionable keywords** retained across 44 topic clusters
- **197,000 total addressable monthly searches** across all clusters
- **65 P1 (high priority)** keywords with strong volume + manageable KD + commercial intent

### What's Missing (Bigger Than What You Have)
| Gap | Scale | Est. Monthly Searches |
|-----|-------|----------------------|
| 54 of 62 cities have ZERO keyword research | 87% of cities blind | ~3,510 keywords to research |
| 27 of 39 services have ZERO keyword coverage | 69% of services blind | 120,000-160,000/mo untapped |
| Zero industry+service+city keywords | 100% gap | 13,500-42,000/mo |
| Missing "best/top" modifier content | No listicle strategy | 6,510/mo |
| No video content strategy | 77% of SERPs show video | Unknown but massive |

---

## CRITICAL BUGS FOUND (Fix Immediately)

### P0 - Site-Breaking Issues

| # | Bug | Impact | Pages Affected |
|---|-----|--------|---------------|
| 1 | **`metaTitle` dead code** - `service-detail.php` line 25 always generates generic title, ignores JSON `metaTitle` | No service page has target keywords in title tag | ALL 39 service pages |
| 2 | **Edmonton clone city SEO pages** - `$city = "Edmonton"` hardcoded, canonical URLs point to Edmonton | Google told to ignore these pages; zero keyword coverage | Calgary, Ottawa, Vancouver, Montreal, Mississauga (likely more) |
| 3 | **Hardcoded Edmonton coordinates in schema** - `schema.php` uses `53.5461, -113.4937` for ALL cities | Google thinks every city page is in Edmonton; kills "near me" rankings | ALL 62 city location-service pages |
| 4 | **FAQ key mismatch** - JSON uses `question`/`answer`, template reads `q`/`a` | FAQs render blank; FAQ schema outputs empty strings | Web Design, Local SEO (likely all service pages) |
| 5 | **Toronto localContent is string, not array** - Template `foreach` iterates characters | Hundreds of `<p>` tags each containing ONE letter | SEO-in-Toronto (highest value page) |
| 6 | **Content-service mismatch** - Social Media page has content marketing content; Web Design Calgary has content marketing | Completely wrong content for the URL/service | Social Media national + Calgary web design + Edmonton web design |
| 7 | **Indian currency formatting** - "$1,00,000", "rupee", "crore", "lakh" | Destroys Canadian geo-relevance signals | SEO, Content Marketing, Branding, PPC, others |

### P1 - High-Priority SEO Issues

| # | Issue | Impact |
|---|-------|--------|
| 8 | No `digital-marketing` service page (redirects to `/services/seo`) | 4,470/mo keywords unaddressed |
| 9 | Homepage over-optimized for Edmonton instead of national keywords | 5,400+/mo generic keywords wasted |
| 10 | Orphaned Edmonton SEO content file (5,000+ words) not deployed | 9,460/mo opportunity at KD 26 |
| 11 | Zero internal links from hub service pages to 1,488 spoke pages | Broken hub-and-spoke architecture |
| 12 | Hardcoded 11-service list in location-service.php instead of using relatedServices data | Bad cross-linking on 1,488+ pages |
| 13 | AggregateRating not in schema despite "4.9/5" displayed on homepage | Missing rich snippet stars |
| 14 | 20 of 42 industries have no `industryPages.json` entry | Thin industry pages |
| 15 | Truncated meta descriptions (cut mid-word) | Broken SERP snippets |

---

## QUICK WINS (6-8 Hours, ~27,000 Monthly Search Volume)

**26 low-KD keywords** that can be captured with title/meta/H1 changes alone:

| Keyword | Volume | KD | Page to Optimize |
|---------|--------|-----|-----------------|
| google ads agency | 1,600 | 16 | /services/google-ads |
| content marketing services | 880 | 14 | /services/content-marketing |
| local seo services | 2,400 | 21 | /services/local-seo |
| local seo company | 1,900 | 23 | /services/local-seo |
| search engine optimization edmonton | 1,600 | 21 | /services/seo-in-edmonton |
| seo services canada | 1,000 | 26 | /services/seo |
| edmonton seo services | 1,000 | 26 | /services/seo-in-edmonton |
| content creation services | 260 | 8 | /services/content-marketing |
| enterprise seo marketing company | 170 | 14 | NEW: /services/enterprise-seo |
| ppc campaign management services | 140 | 10 | /services/ppc-management |
| local seo edmonton | 590 | 13 | /services/local-seo-in-edmonton |
| best seo company canada | 260 | 21 | /blog/best-seo-companies-canada |
| best digital marketing firms | 390 | 17 | /blog/best-digital-marketing-agencies |
| seo agency near me | 1,300 | 19 | GBP + /services/seo |
| seo services near me | 1,000 | 19 | GBP + /services/seo |
| sherwood park digital marketing | 110 | 5 | /services/seo-in-sherwood-park |
| edmonton seo | 2,400 | 35 | /services/seo-in-edmonton |
| seo edmonton | 1,900 | 30 | /services/seo-in-edmonton |
| edmonton seo agency | 1,000 | 33 | /services/seo-in-edmonton |
| website design calgary | 1,600 | 35 | /services/web-design-in-calgary |
| seo agency calgary | 880 | 31 | /services/seo-in-calgary |
| ppc agency | 1,000 | 32 | /services/ppc-management |
| best seo agency | 880 | 27 | /blog/best-seo-companies-canada |
| best seo company | 880 | 32 | /blog/best-seo-companies-canada |
| seo mississauga | 880 | 28 | /services/seo-in-mississauga |
| vancouver search engine optimization | 1,000 | 33 | /services/seo-in-vancouver |

**Projected impact:** 670-1,210 monthly visits initially, scaling to 1,740-3,350 with top-5 rankings.
**One code change unlocks all:** Fix `service-detail.php` line 25 to read `metaTitle` from JSON.

---

## 12-WEEK MASTER ROADMAP

### Weeks 1-2: Bug Fixes + Quick Wins
- Fix P0 bugs (metaTitle dead code, Edmonton clones, schema coordinates, FAQ keys, currency)
- Update title/meta/H1 for 26 quick-win keywords
- Deploy orphaned Edmonton SEO content
- **Expected: +200-400 clicks/month**

### Weeks 3-4: Keyword Research Expansion
- Research keywords for top 25 uncovered cities
- Research keywords for 27 uncovered services
- Research industry+service+city keywords for top 10 industries
- **Target: 600+ new keyword targets**

### Weeks 5-6: Content Sprint 1
- 8 "Best/Top" listicle blog posts
- 7 city marketing guides (Toronto, Calgary, Vancouver, Edmonton, Ottawa, Montreal, Winnipeg)
- Create /services/digital-marketing service page
- Create /services/ecommerce-seo and /services/enterprise-seo pages
- **Target: 30 new pages**

### Weeks 7-8: Technical Optimization
- Internal linking overhaul (fix hardcoded service list, add hub-to-spoke links)
- Schema markup fixes (city coordinates, AggregateRating, FAQ keys, areaServed)
- AI Overview content optimization for top 14 keywords
- Page speed / Core Web Vitals audit
- **Expected: +15-25% crawl efficiency improvement**

### Weeks 9-10: Content Sprint 2
- 10 industry-specific landing pages (legal, healthcare, real estate, e-commerce, SaaS, restaurants)
- 5 service deep-dive guides
- 8 competitor comparison posts
- **Target: 28 new pages**

### Weeks 11-12: Authority Building
- 200+ Canadian directory submissions (35 high-priority directories)
- 30 guest post pitches to Canadian publications
- GBP optimization for top 10 cities
- Review acquisition campaign (target: 15-20 Google reviews)
- **Target: 150-220 new backlinks, DR 35-45**

### Projected 12-Week Impact
- **58 new pages** created
- **~600 hours** total work
- **+65-85% organic traffic growth**
- **1,740-3,350 new monthly visits** from quick wins alone
- **197,000 monthly searches** addressable across all keyword clusters

---

## COMPLETE DELIVERABLES INDEX

### Keywords (3 files)
- `keywords/01-cleaned-keywords.md` - 282 actionable keywords, categorized by service, priority tiered
- `keywords/02-keyword-url-mapping.md` - Every keyword mapped to target URL
- `keywords/03-keyword-clusters.md` - 44 topic clusters with total volumes and recommendations

### Page Audits (19 files)
- `page-audits/01-seo-service-page.md` - National SEO page audit
- `page-audits/02-web-design-service-page.md` - Web design service audit (broken FAQs found)
- `page-audits/03-ppc-google-ads-page.md` - PPC/Google Ads audit (KD 16 quick win)
- `page-audits/04-content-marketing-page.md` - Content marketing audit (metaTitle bug discovered)
- `page-audits/05-social-media-page.md` - Social media audit (wrong content!)
- `page-audits/06-local-seo-page.md` - Local SEO audit (KD 21 opportunity)
- `page-audits/07-branding-page.md` - Branding audit
- `page-audits/08-seo-toronto-page.md` - Toronto SEO (localContent string bug)
- `page-audits/09-seo-edmonton-page.md` - Edmonton SEO (orphaned 5K-word file)
- `page-audits/10-seo-calgary-page.md` - Calgary SEO (Edmonton clone - score 1/10)
- `page-audits/11-seo-vancouver-page.md` - Vancouver SEO (Edmonton clone legacy)
- `page-audits/12-seo-ottawa-page.md` - Ottawa SEO (Edmonton clone - score 5/100)
- `page-audits/13-web-design-calgary-page.md` - Web Design Calgary (content mismatch - score 15/100)
- `page-audits/14-web-design-edmonton-page.md` - Web Design Edmonton (content mismatch legacy)
- `page-audits/15-digital-marketing-toronto-page.md` - Digital Marketing Toronto (no page exists!)
- `page-audits/16-montreal-mississauga-pages.md` - Montreal + Mississauga (both Edmonton clones)
- `page-audits/17-homepage.md` - Homepage (over-optimized for Edmonton)
- `page-audits/18-ecommerce-enterprise-seo.md` - E-commerce + Enterprise SEO (no pages exist)
- `page-audits/19-app-development-page.md` - App Development (zero keyword coverage)

### Gap Analysis (5 files)
- `gap-analysis/01-city-coverage-gaps.md` - 54 cities with zero keyword data
- `gap-analysis/02-service-keyword-gaps.md` - 27 services with zero coverage (120K-160K/mo untapped)
- `gap-analysis/03-blog-content-gaps.md` - Blog gaps + 16-article content plan
- `gap-analysis/04-industry-keyword-opportunities.md` - 42 industries, 13.5K-42K/mo untapped
- `gap-analysis/05-competitor-serp-analysis.md` - SERP feature strategy matrix

### Strategy (8 files)
- `strategy/01-near-me-optimization.md` - "Near me" plan + 40+ Canadian directories
- `strategy/02-best-top-modifier-strategy.md` - 8 listicle posts targeting 6,510/mo
- `strategy/03-ai-overview-geo-strategy.md` - GEO optimization for 14 AI Overview keywords
- `strategy/04-internal-linking-strategy.md` - Hub-and-spoke + 10-week rollout
- `strategy/05-backlink-strategy.md` - 6-month plan targeting 150-220 backlinks
- `strategy/06-content-calendar.md` - 24 articles across 6 months
- `strategy/07-quick-wins-plan.md` - 26 keywords, 6-8 hours implementation
- `strategy/08-master-roadmap.md` - 12-week implementation plan

---

## TOP 5 ACTIONS TO START TOMORROW

1. **Fix `service-detail.php` line 25** to read `metaTitle` from JSON - unlocks custom titles for all 39 service pages (30 min)

2. **Fix `schema.php` hardcoded Edmonton coordinates** - add lat/lng to locations.json and read dynamically (2 hrs)

3. **Fix FAQ key mismatch** - change JSON `question`/`answer` to `q`/`a` across all services OR update template to read both (1 hr)

4. **Fix Edmonton clone city SEO pages** - update $city, $province, canonical, schema for Calgary, Ottawa, Vancouver, Montreal, Mississauga (4 hrs)

5. **Deploy orphaned Edmonton SEO content** - the 5,000+ word file is ready to go, targets 9,460/mo at KD 26 (1 hr)

**Total: ~8 hours of work to fix the most critical issues and unlock thousands of monthly searches.**
