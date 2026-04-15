# Quick Wins SEO Implementation Plan -- TML Agency

Generated: 2026-04-14

## Executive Summary

This plan targets 26 low-KD keywords (under 35) with a combined monthly search volume of ~27,000. These are the fastest ranking opportunities because they require only on-page optimizations to existing pages -- no new pages needed. Every keyword maps to a page that already exists on townmedialabs.ca.

**Total estimated implementation time: 6-8 hours**
**Expected traffic uplift: 800-2,400 organic visits/month within 60-90 days**

### How This Works

TML already has dedicated service pages (`/services/{slug}`) and location-service pages (`/services/{slug}-in-{city}`). Most current title tags follow generic patterns like "Best {Service} in {City} | TML Agency" or "{Service} | TML Agency" that do not match the exact keyword phrases people search. By aligning title tags, meta descriptions, and H1s to exact-match these low-KD keywords, we unlock ranking potential with minimal effort.

### Implementation Files

- **Service page titles**: Update `data/servicePages.json` (`metaTitle` and `metaDescription` fields)
- **Service page rendering**: Titles are generated in `views/service-detail.php` (line 25: `$title = 'Best ' . $titleName . ' Services in Canada | TML Agency'`)
- **Location-service enrichments**: Update `data/enrichments.json` (`metaTitle` and `metaDescription` fields per URL slug)
- **Location-service rendering**: Fallback logic in `views/location-service.php` (line 33)

---

## PRIORITY 1: KD Under 25, Volume 500+ (Do These First)

### 1. "google ads agency" (1,600 vol, KD 16)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/google-ads` |
| **Current Title** | `Google Ads \| TML Agency` (rendered as "Best Google Ads Services in Canada \| TML Agency" via service-detail.php) |
| **New Title** | `Google Ads Agency in Canada \| TML` |
| **Character Count** | 38 |
| **Current Meta Desc** | "Certified Google Partner agency offering expert Google Ads and PPC management in Edmonton..." |
| **New Meta Desc** | `Top Google Ads agency with certified experts. We manage PPC campaigns that deliver 3-5x ROAS for Canadian businesses. Free audit.` |
| **H1 Recommendation** | "Google Ads Agency That Delivers Results" |
| **Content Additions** | Add a section titled "Why Choose a Specialized Google Ads Agency?" with 300-400 words covering agency vs freelancer vs in-house, certification benefits, and account management methodology. |
| **Implementation** | Update `metaTitle` in `data/servicePages.json` under `google-ads` key. Override title logic in `views/service-detail.php` or add the slug to the `$shortTitles` map. |
| **Time** | 15 min meta + 30 min content = 45 min |

---

### 2. "content marketing services" (880 vol, KD 14)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/content-marketing` |
| **Current Title** | `Content Marketing \| TML Agency` (rendered as "Best Content Marketing Services in Canada \| TML Agency") |
| **New Title** | `Content Marketing Services Canada \| TML` |
| **Character Count** | 42 |
| **Current Meta Desc** | "Strategic content marketing services in Edmonton. TML Agency builds content strategies, creates high-value assets..." |
| **New Meta Desc** | `Content marketing services that drive organic traffic and leads. Strategy, creation, and distribution for Canadian businesses. Get your free content audit.` |
| **H1 Recommendation** | "Content Marketing Services That Drive Growth" |
| **Content Additions** | Add "Our Content Marketing Services Include" section listing blog writing, whitepapers, case studies, video content, infographics with 2-3 sentences each. |
| **Time** | 15 min meta + 25 min content = 40 min |

---

### 3. "local seo services" (2,400 vol, KD 21)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/local-seo` |
| **Current Title** | `Local SEO \| TML Agency` (rendered as "Best Local SEO Services in Canada \| TML Agency") |
| **New Title** | `Local SEO Services \| Rank in Map Pack \| TML` |
| **Character Count** | 44 |
| **Current Meta Desc** | "Local SEO for Canadian businesses -- Google Business Profile, map pack rankings, citations, reviews. Dominate local search." |
| **New Meta Desc** | `Local SEO services that get you into Google's map pack. GBP optimization, citations, reviews, and local rankings. Free local SEO audit.` |
| **H1 Recommendation** | "Local SEO Services for Canadian Businesses" |
| **Content Additions** | Add "What Our Local SEO Services Include" with bullets for GBP optimization, citation building, review management, local link building, geo-targeted content. Add a "Local SEO Results" mini case study (200 words). |
| **Time** | 15 min meta + 30 min content = 45 min |

---

### 4. "local seo company" (1,900 vol, KD 23)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/local-seo` (same page as #3 -- secondary keyword) |
| **Current Title** | See #3 above |
| **New Title** | Already handled by #3 -- include "local seo company" in body copy |
| **Action** | Add "local SEO company" naturally into the first paragraph of the page body and in an H2 like "Why TML Is the Local SEO Company Businesses Trust". |
| **Content Additions** | Work "local SEO company" into 2-3 body paragraphs and one subheading. Add a comparison table: "Local SEO Company vs DIY Local SEO". |
| **Time** | 20 min |

---

### 5. "seo services canada" (1,000 vol, KD 26)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo` |
| **Current Title** | `SEO \| TML Agency` (rendered as "Best SEO Services in Canada \| TML Agency") |
| **New Title** | `SEO Services Canada \| Proven Rankings \| TML` |
| **Character Count** | 46 |
| **Current Meta Desc** | "Expert SEO services in Edmonton offering technical SEO, local SEO, and organic search optimization..." |
| **New Meta Desc** | `SEO services in Canada that deliver page-one rankings. Technical SEO, content strategy, and link building. 500+ brands served. Free SEO audit.` |
| **H1 Recommendation** | "SEO Services in Canada" |
| **Content Additions** | Add an "SEO Services Across Canada" section with a city-link grid (Edmonton, Calgary, Toronto, Vancouver, etc.) to reinforce national coverage. 200 words intro. |
| **Time** | 15 min meta + 20 min content = 35 min |

---

### 6. "edmonton seo services" (1,000 vol, KD 26) & "search engine optimization edmonton" (1,600 vol, KD 21)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo-in-edmonton` |
| **Current Title** | `Best SEO in Edmonton \| TML Agency` |
| **New Title** | `Edmonton SEO Services \| Top Ranked \| TML` |
| **Character Count** | 43 |
| **Current Meta Desc** | "Looking for seo in Edmonton? TML Agency offers strategic solutions for Edmonton businesses. 500+ brands served..." |
| **New Meta Desc** | `Edmonton SEO services and search engine optimization experts. We rank Edmonton businesses on page one. 500+ clients. Free SEO consultation.` |
| **H1 Recommendation** | "Edmonton SEO Services" |
| **Content Additions** | Add "Search Engine Optimization in Edmonton" as an H2 section (300 words) covering the Edmonton market, local competition, and why businesses need SEO. Naturally include "search engine optimization edmonton" 2-3 times. |
| **Implementation** | Update `data/enrichments.json` key `seo-in-edmonton`. |
| **Time** | 15 min meta + 30 min content = 45 min |

---

### 7. "content creation services" (260 vol, KD 8)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/content-writing` |
| **Current Title** | `Content Writing \| TML Agency` (rendered as "Best Content Writing Services in Canada \| TML Agency") |
| **New Title** | `Content Creation Services Canada \| TML Agency` |
| **Character Count** | 47 |
| **Current Meta Desc** | "Professional SEO content writing services for blogs, websites, and marketing. TML Agency in Edmonton delivers content that ranks, engages, and converts." |
| **New Meta Desc** | `Content creation services for blogs, websites, and social media. SEO-optimized content that ranks and converts. Get a free content strategy session.` |
| **H1 Recommendation** | "Content Creation Services" |
| **Content Additions** | Rename/broaden scope references from "content writing" to "content creation services" in the intro. Add section on content types: blog posts, social content, video scripts, email copy, whitepapers. |
| **Time** | 15 min meta + 20 min content = 35 min |

---

### 8. "enterprise seo marketing company" (170 vol, KD 14)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo` (add as a section on the main SEO page) |
| **Current Title** | See #5 above |
| **Action** | Add an "Enterprise SEO" section to the existing SEO service page. |
| **Content Additions** | Add H2: "Enterprise SEO Marketing Company" with 400 words covering enterprise-specific challenges (multi-location, large site architecture, stakeholder management, migration support, international SEO). Include "enterprise SEO marketing company" in opening sentence. |
| **Time** | 30 min |

---

### 9. "ppc campaign management services" (140 vol, KD 10)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/ppc-management` |
| **Current Title** | `PPC Management \| TML Agency` (rendered as "Best PPC Management Services in Canada \| TML Agency") |
| **New Title** | `PPC Campaign Management Services \| TML` |
| **Character Count** | 42 |
| **Current Meta Desc** | "Expert PPC management across Google, Meta, LinkedIn, and YouTube. TML Agency in Edmonton delivers data-driven paid advertising..." |
| **New Meta Desc** | `PPC campaign management services across Google, Meta, and LinkedIn. Data-driven paid ads that maximize ROAS. Get a free PPC audit today.` |
| **H1 Recommendation** | "PPC Campaign Management Services" |
| **Content Additions** | Add "Our PPC Campaign Management Process" section with step-by-step methodology: audit, strategy, launch, optimize, report. 250 words. |
| **Time** | 15 min meta + 20 min content = 35 min |

---

### 10. "local seo edmonton" (590 vol, KD 13)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/local-seo-in-edmonton` |
| **Current Title** | `Best Local SEO in Edmonton \| TML Agency` |
| **New Title** | `Local SEO Edmonton \| Map Pack Experts \| TML` |
| **Character Count** | 46 |
| **Current Meta Desc** | "TML is Edmonton's trusted local seo agency. We help businesses across Alberta grow with data-driven strategies..." |
| **New Meta Desc** | `Local SEO in Edmonton that gets your business into Google's map pack. GBP optimization, citations, and reviews. Free local SEO audit.` |
| **H1 Recommendation** | "Local SEO Edmonton" |
| **Content Additions** | Add Edmonton-specific local SEO content: Edmonton neighbourhoods served, local directories that matter (Edmonton Chamber, YELP Edmonton), Edmonton business statistics. 300 words. |
| **Implementation** | Update `data/enrichments.json` key `local-seo-in-edmonton`. |
| **Time** | 15 min meta + 25 min content = 40 min |

---

### 11. "best seo company canada" (260 vol, KD 21)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo` (reinforce on main SEO page via #5 title) |
| **Action** | Already partially handled by #5. Add "best SEO company in Canada" into body copy. |
| **Content Additions** | Add testimonial/social proof section titled "Why Businesses Call Us the Best SEO Company in Canada" -- 200 words with client count, industries served, and results metrics. |
| **Time** | 20 min |

---

### 12. "best digital marketing firms" (390 vol, KD 17)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services` (services index page) OR create a dedicated landing page |
| **Current Title** | Services index page title (likely generic) |
| **New Title** | N/A -- optimize the services index page meta |
| **Action** | Update the services index page meta title to include "digital marketing" and add an intro paragraph. |
| **Recommended Services Index Title** | `Digital Marketing Services \| TML Agency Canada` |
| **Recommended Services Index Meta** | `One of Canada's best digital marketing firms. SEO, PPC, web design, content marketing, and social media. 500+ brands served. Get a free consultation.` |
| **H1 Recommendation** | "Digital Marketing Services" (with subheading: "One of Canada's Best Digital Marketing Firms") |
| **Content Additions** | Add 200-word intro on the services index page positioning TML as one of the best digital marketing firms in Canada. |
| **Implementation** | Update `views/services-index.php` meta tags. |
| **Time** | 20 min |

---

### 13. "seo agency near me" (1,300 vol, KD 19) & "seo services near me" (1,000 vol, KD 19)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo` and all city-specific SEO pages |
| **Action** | "Near me" queries are served by Google based on proximity + local signals. These require Local SEO optimization, not on-page keyword stuffing. |
| **Content Additions** | (1) Ensure `LocalBusiness` schema on the homepage includes full NAP (name, address, phone) and `areaServed` for all major Canadian cities. (2) Add a "Find SEO Services Near You" section on `/services/seo` with links to all city pages. (3) Optimize Google Business Profile with "SEO agency" and "SEO services" as primary categories. |
| **Implementation** | Update schema in homepage template + add internal link section on SEO page. |
| **Time** | 30 min |

---

### 14. "app development firms" (70 vol, KD 21)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/mobile-app-development` |
| **Current Title** | `Mobile App Development \| iOS & Android \| TML Agency` |
| **New Title** | `App Development Firm \| iOS & Android \| TML` |
| **Character Count** | 44 |
| **Current Meta Desc** | "Custom mobile app development for iOS and Android. Native apps, React Native, cross-platform solutions in Edmonton and Canada." |
| **New Meta Desc** | `App development firm building iOS and Android apps. Native, React Native, and cross-platform solutions in Canada. Get a free project estimate.` |
| **H1 Recommendation** | "App Development Firm" |
| **Content Additions** | Add "app development firm" and "app development firms" into body copy naturally. Add a "Why Choose Our App Development Firm" section (200 words). |
| **Time** | 15 min meta + 15 min content = 30 min |

---

## PRIORITY 2: KD 25-35, Volume 500+ (Do After Priority 1)

### 15. "edmonton seo" (2,400 vol, KD 35) & "seo edmonton" (1,900 vol, KD 30)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo-in-edmonton` |
| **Current Title** | `Best SEO in Edmonton \| TML Agency` |
| **New Title** | `Edmonton SEO Services \| Top Ranked \| TML` (same as #6 -- already optimized) |
| **Action** | Already handled by Priority 1 item #6. The title "Edmonton SEO Services" naturally targets both "edmonton seo" and "seo edmonton". |
| **Content Additions** | Ensure the page has 2,000+ words of Edmonton-specific content. Add H2s: "SEO in Edmonton: What You Need to Know" and "Edmonton SEO Pricing" (these are likely related long-tail searches). Add Edmonton business stats, competitive landscape, and industry-specific SEO tips for Edmonton's key verticals (oil & gas, tech, construction). |
| **Time** | 45 min (content depth) |

---

### 16. "edmonton seo agency" (1,000 vol, KD 33)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo-in-edmonton` (same page) |
| **Action** | Add "Edmonton SEO agency" as a secondary keyword. |
| **Content Additions** | Add H2: "Your Edmonton SEO Agency" with 200 words on what makes TML different as an Edmonton-based agency (local market knowledge, Alberta business experience, in-person meetings available). |
| **Time** | 15 min |

---

### 17. "website design calgary" (1,600 vol, KD 35)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/web-design-in-calgary` |
| **Current Title** | `Best Web Design in Calgary \| TML Agency` |
| **New Title** | `Website Design Calgary \| Custom Sites \| TML` |
| **Character Count** | 46 |
| **Current Meta Desc** | "TML is Calgary's trusted web design agency. We help businesses across Alberta grow with data-driven strategies..." |
| **New Meta Desc** | `Website design in Calgary by TML Agency. Custom, responsive websites that convert visitors into customers. Portfolio + free consultation available.` |
| **H1 Recommendation** | "Website Design Calgary" |
| **Content Additions** | Add Calgary-specific content: Calgary business environment, industries served in Calgary (energy, agriculture, tech), Calgary web design trends. 300 words. Add "Website Design Calgary Portfolio" section with 2-3 Calgary client examples. |
| **Implementation** | Update `data/enrichments.json` key `web-design-in-calgary`. |
| **Time** | 15 min meta + 30 min content = 45 min |

---

### 18. "seo agency calgary" (880 vol, KD 31)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo-in-calgary` |
| **Current Title** | `Best SEO in Calgary \| TML Agency` |
| **New Title** | `SEO Agency Calgary \| Proven Rankings \| TML` |
| **Character Count** | 45 |
| **Current Meta Desc** | "Expert seo in Calgary, Alberta. TML Agency combines local market knowledge with proven expertise to drive growth..." |
| **New Meta Desc** | `SEO agency in Calgary delivering page-one rankings for Alberta businesses. Technical SEO, local SEO, and content strategy. Free SEO audit.` |
| **H1 Recommendation** | "SEO Agency in Calgary" |
| **Content Additions** | Add Calgary SEO content: Calgary competitive landscape, Calgary-specific ranking factors, industries we serve in Calgary. 300 words. |
| **Implementation** | Update `data/enrichments.json` key `seo-in-calgary`. |
| **Time** | 15 min meta + 25 min content = 40 min |

---

### 19. "ppc agency" (1,000 vol, KD 32)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/ppc-management` |
| **Current Title** | See #9 -- already optimized for "PPC campaign management services" |
| **New Title** | `PPC Agency Canada \| Campaign Management \| TML` |
| **Character Count** | 48 |
| **Rationale** | Changed from #9's title to capture both "ppc agency" (1,000 vol) and "ppc campaign management services" (140 vol). The higher-volume keyword takes priority in the title. |
| **New Meta Desc** | `PPC agency managing Google Ads, Meta Ads, and LinkedIn campaigns. Data-driven paid advertising that maximizes ROAS. Free PPC audit.` |
| **H1 Recommendation** | "PPC Agency with Proven Campaign Results" |
| **Content Additions** | Add "What Makes a Great PPC Agency" section (300 words) covering agency selection criteria, certifications, and TML's PPC management methodology. |
| **Time** | 15 min meta + 25 min content = 40 min |

---

### 20. "best seo agency" (880 vol, KD 27)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo` |
| **Action** | Covered by the "02-best-top-modifier-strategy.md" plan for a dedicated "best" page. On the main SEO page, add social proof reinforcing "best SEO agency" positioning. |
| **Content Additions** | Add a "Results That Make Us the Best SEO Agency" section with metrics: number of keywords ranked, average ranking improvement, client retention rate. 200 words. |
| **Time** | 20 min |

---

### 21. "best seo company" (880 vol, KD 32)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo` |
| **Action** | Same approach as #20 -- secondary keyword handled through body content. |
| **Content Additions** | Work "best SEO company" into the social proof section from #20. Add a comparison section: "What the Best SEO Companies Do Differently" (250 words). |
| **Time** | 20 min |

---

### 22. "seo mississauga" (880 vol, KD 28)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo-in-mississauga` |
| **Current Title** | `Best SEO in Mississauga \| TML Agency` |
| **New Title** | `SEO Mississauga \| Top Ranked Agency \| TML` |
| **Character Count** | 44 |
| **Current Meta Desc** | "TML is Mississauga's trusted seo agency. We help businesses across Ontario grow with data-driven strategies..." |
| **New Meta Desc** | `SEO in Mississauga by TML Agency. We help Mississauga businesses rank on Google with proven SEO strategies. Free consultation available.` |
| **H1 Recommendation** | "SEO Mississauga" |
| **Content Additions** | Add Mississauga market content: GTA competitive landscape, Mississauga business sectors (logistics, pharma, tech corridor), proximity to Toronto advantage. 300 words. |
| **Implementation** | Update `data/enrichments.json` key `seo-in-mississauga`. |
| **Time** | 15 min meta + 25 min content = 40 min |

---

### 23. "vancouver search engine optimization" (1,000 vol, KD 33)

| Field | Value |
|-------|-------|
| **URL** | `townmedialabs.ca/services/seo-in-vancouver` |
| **Current Title** | `Best SEO in Vancouver \| TML Agency` |
| **New Title** | `Vancouver SEO \| Search Engine Optimization \| TML` |
| **Character Count** | 50 |
| **Current Meta Desc** | "TML is Vancouver's trusted seo agency. We help businesses across British Columbia grow with data-driven strategies..." |
| **New Meta Desc** | `Vancouver search engine optimization by TML Agency. We rank Vancouver businesses on Google with proven SEO strategies. Free audit.` |
| **H1 Recommendation** | "Vancouver Search Engine Optimization" |
| **Content Additions** | Add Vancouver-specific content: Vancouver tech scene, BC business environment, multilingual SEO for Vancouver's diverse market, Vancouver vs Toronto SEO competition. 300 words. |
| **Implementation** | Update `data/enrichments.json` key `seo-in-vancouver`. |
| **Time** | 15 min meta + 25 min content = 40 min |

---

## Implementation Checklist

### Phase 1: Meta Tag Updates (2-3 hours)

These are pure data file edits -- no template changes needed for location-service pages (enrichments.json overrides fallback titles). Service pages need a small code tweak.

#### Step 1: Update `data/enrichments.json` (location-service pages)

| Key | New `metaTitle` | New `metaDescription` |
|-----|-----------------|----------------------|
| `seo-in-edmonton` | `Edmonton SEO Services \| Top Ranked \| TML` | `Edmonton SEO services and search engine optimization experts. We rank Edmonton businesses on page one. 500+ clients. Free SEO consultation.` |
| `local-seo-in-edmonton` | `Local SEO Edmonton \| Map Pack Experts \| TML` | `Local SEO in Edmonton that gets your business into Google's map pack. GBP optimization, citations, and reviews. Free local SEO audit.` |
| `seo-in-calgary` | `SEO Agency Calgary \| Proven Rankings \| TML` | `SEO agency in Calgary delivering page-one rankings for Alberta businesses. Technical SEO, local SEO, and content strategy. Free SEO audit.` |
| `web-design-in-calgary` | `Website Design Calgary \| Custom Sites \| TML` | `Website design in Calgary by TML Agency. Custom, responsive websites that convert visitors into customers. Portfolio + free consultation available.` |
| `seo-in-mississauga` | `SEO Mississauga \| Top Ranked Agency \| TML` | `SEO in Mississauga by TML Agency. We help Mississauga businesses rank on Google with proven SEO strategies. Free consultation available.` |
| `seo-in-vancouver` | `Vancouver SEO \| Search Engine Optimization \| TML` | `Vancouver search engine optimization by TML Agency. We rank Vancouver businesses on Google with proven SEO strategies. Free audit.` |

#### Step 2: Update `data/servicePages.json` (service-level pages)

Update the `metaTitle` field for these service slugs:

| Service Slug | New `metaTitle` |
|-------------|-----------------|
| `google-ads` | `Google Ads Agency in Canada \| TML` |
| `content-marketing` | `Content Marketing Services Canada \| TML` |
| `local-seo` | `Local SEO Services \| Rank in Map Pack \| TML` |
| `seo` | `SEO Services Canada \| Proven Rankings \| TML` |
| `content-writing` | `Content Creation Services Canada \| TML Agency` |
| `ppc-management` | `PPC Agency Canada \| Campaign Management \| TML` |
| `mobile-app-development` | `App Development Firm \| iOS & Android \| TML` |

#### Step 3: Update `views/service-detail.php` title logic

The current code (line 25) generates titles as `Best {Service} Services in Canada | TML Agency`. The `metaTitle` field from `servicePages.json` is NOT used for the rendered title -- it is only stored as data. To use the custom titles, change line 25-27 to check for a custom `metaTitle` first:

```php
// Replace line 25:
$title = 'Best ' . $titleName . ' Services in Canada | TML Agency';

// With:
$title = $data['metaTitle'] ?? ('Best ' . $titleName . ' Services in Canada | TML Agency');
```

This single change lets all 7 service page title updates take effect via `servicePages.json`.

#### Step 4: Update `views/services-index.php` meta

Add meta title: `Digital Marketing Services | TML Agency Canada`
Add meta description referencing "best digital marketing firms".

### Phase 2: Content Additions (4-5 hours)

Prioritize by impact (volume x ease):

| Priority | Page | Content to Add | Words | Time |
|----------|------|----------------|-------|------|
| 1 | `/services/seo-in-edmonton` | Edmonton SEO depth content, "Search Engine Optimization in Edmonton" H2, agency section | 800 | 45 min |
| 2 | `/services/local-seo` | Services breakdown, mini case study, "local SEO company" H2 | 600 | 40 min |
| 3 | `/services/seo` | Enterprise SEO section, "Best SEO Company" proof, city link grid, "near me" link hub | 1,000 | 50 min |
| 4 | `/services/local-seo-in-edmonton` | Edmonton neighborhoods, local directories, business stats | 300 | 25 min |
| 5 | `/services/google-ads` | "Why Choose a Google Ads Agency" section | 400 | 30 min |
| 6 | `/services/ppc-management` | PPC agency methodology, campaign process | 500 | 35 min |
| 7 | `/services/content-marketing` | Services list with descriptions | 400 | 25 min |
| 8 | `/services/content-writing` | Broaden to "content creation", content types section | 300 | 20 min |
| 9 | `/services/web-design-in-calgary` | Calgary-specific content, portfolio section | 300 | 30 min |
| 10 | `/services/seo-in-calgary` | Calgary market content | 300 | 25 min |
| 11 | `/services/seo-in-mississauga` | Mississauga/GTA market content | 300 | 25 min |
| 12 | `/services/seo-in-vancouver` | Vancouver market content | 300 | 25 min |
| 13 | `/services/mobile-app-development` | "App development firm" positioning | 200 | 15 min |
| 14 | `Homepage schema` | LocalBusiness schema with areaServed | -- | 15 min |

### Phase 3: Validation (30 min)

- [ ] Check all title tags are under 60 characters
- [ ] Check all meta descriptions are under 160 characters
- [ ] Verify canonical URLs are correct
- [ ] Test enrichments.json renders correctly on each location-service page
- [ ] Test servicePages.json custom titles render via the updated service-detail.php
- [ ] Submit updated URLs to Google Search Console for re-crawl
- [ ] Monitor rankings for target keywords weekly for 90 days

---

## Expected Results Timeline

| Timeframe | Expected Outcome |
|-----------|-----------------|
| Week 1-2 | Google re-crawls updated pages, new titles appear in SERPs |
| Week 3-4 | Initial ranking movement for KD < 15 keywords (content creation services, ppc campaign management services, local seo edmonton, content marketing services) |
| Month 2 | Ranking improvements for KD 15-25 keywords (google ads agency, local seo services, edmonton seo services, seo services canada) |
| Month 3 | Ranking improvements for KD 25-35 keywords (edmonton seo, website design calgary, ppc agency, seo mississauga, vancouver search engine optimization) |
| Month 3+ | Compound effect as pages gain clicks, CTR improves, and engagement signals strengthen rankings |

## Traffic Projection (Conservative)

Assuming page-one rankings (positions 5-10) for Priority 1 keywords and page-one/two (positions 8-15) for Priority 2:

| Keyword Group | Combined Volume | Est. CTR | Monthly Traffic |
|---------------|----------------|----------|----------------|
| Priority 1 (KD < 25) | ~13,430 | 3-5% | 400-670 |
| Priority 2 (KD 25-35) | ~13,420 | 2-4% | 270-540 |
| **Total** | **~26,850** | -- | **670-1,210** |

With top-5 rankings (achievable within 6 months for low-KD terms):

| Keyword Group | Combined Volume | Est. CTR | Monthly Traffic |
|---------------|----------------|----------|----------------|
| Priority 1 | ~13,430 | 8-15% | 1,070-2,010 |
| Priority 2 | ~13,420 | 5-10% | 670-1,340 |
| **Total** | **~26,850** | -- | **1,740-3,350** |

---

## Notes on Title Tag Conflicts

Some keywords compete for the same page. Here is the resolution for each conflict:

1. **`/services/seo`**: Targets "seo services canada" (1,000 vol) in title. "best seo agency" (880), "best seo company" (880), "best seo company canada" (260), and "enterprise seo marketing company" (170) are handled via body content and H2s.

2. **`/services/local-seo`**: Targets "local seo services" (2,400 vol) in title. "local seo company" (1,900) is handled via body content and an H2.

3. **`/services/seo-in-edmonton`**: Targets "edmonton seo services" (1,000 vol) in title. "edmonton seo" (2,400), "seo edmonton" (1,900), "search engine optimization edmonton" (1,600), and "edmonton seo agency" (1,000) are all handled via H2s and body content. The title naturally contains "Edmonton SEO" which is the core phrase for all variants.

4. **`/services/ppc-management`**: Title changed from "PPC Campaign Management Services" to "PPC Agency Canada" to prioritize the higher-volume keyword (1,000 vs 140). "ppc campaign management services" handled via H1 and body content.
