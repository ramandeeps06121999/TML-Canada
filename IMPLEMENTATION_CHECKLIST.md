# Implementation Checklist - Scalable Location Service Template

## Phase 1: Setup & Review (1-2 hours)

### Template Files
- [ ] Review `php-site/deploy/templates/location-service-scalable.php`
  - [ ] Verify 15 sections present
  - [ ] Check all variable usage
  - [ ] Validate HTML structure
  - [ ] Confirm responsive design

- [ ] Review `php-site/deploy/scripts/generate-location-service-pages.php`
  - [ ] Verify CLI argument parsing
  - [ ] Check function definitions
  - [ ] Validate data loading logic
  - [ ] Test error handling

- [ ] Review documentation
  - [ ] Read `SCALABLE_TEMPLATE_GUIDE.md` (full documentation)
  - [ ] Read `TEMPLATE_QUICK_REFERENCE.md` (quick lookup)

### Data Validation
- [ ] Check `php-site/deploy/data/locations.json`
  - [ ] Verify 1,488 entries present
  - [ ] Spot-check 5 entries: edmonton, toronto, vancouver, calgary, ottawa
  - [ ] Confirm structure: slug, name, state, country, region, industries, landmarks, uniqueContent
  - [ ] Validate all required fields populated

- [ ] Check `php-site/deploy/data/servicePages.json`
  - [ ] Verify all 48 services present
  - [ ] Spot-check 3 services: seo, web-design, branding
  - [ ] Confirm structure: title, description, features, stats, benefits
  - [ ] Validate features array (6-10 items)
  - [ ] Validate stats array (4 items)

- [ ] Check `php-site/deploy/data/enrichments.json`
  - [ ] Verify enrichment entries for 10 sample combinations
  - [ ] Check metaTitle, metaDescription, h1, heroBadge
  - [ ] Validate FAQs array structure
  - [ ] Check for missing entries (use defaults)

- [ ] Check `php-site/deploy/data/caseStudies.json`
  - [ ] Verify 50-100+ case studies present
  - [ ] Spot-check structure: company, industry, service, region, description, results
  - [ ] Confirm region/state matching
  - [ ] Validate results array format

---

## Phase 2: Test Single Page (30 minutes)

### Generate Test Page
- [ ] Run test command:
  ```bash
  php php-site/deploy/scripts/generate-location-service-pages.php \
      --service=seo --location=edmonton --dry-run --verbose
  ```
  - [ ] Script runs without errors
  - [ ] Output shows correct combination
  - [ ] Verbose output lists all variables

- [ ] Generate actual test page:
  ```bash
  php php-site/deploy/scripts/generate-location-service-pages.php \
      --service=seo --location=edmonton
  ```
  - [ ] File created: `public/services/seo-in-edmonton/index.php`
  - [ ] File size > 50KB (content-rich)
  - [ ] File readable

### Content Validation
- [ ] View generated page source
  ```bash
  head -100 public/services/seo-in-edmonton/index.php
  tail -100 public/services/seo-in-edmonton/index.php
  ```
  - [ ] Hero section present with city/service names
  - [ ] All variables substituted (no `$VARIABLE` remaining)
  - [ ] No template syntax visible
  - [ ] Schema markup at end

- [ ] Check variable substitution in generated HTML
  - [ ] `<title>Best SEO in Edmonton | TML Agency</title>`
  - [ ] `<h1>Best SEO...in Edmonton</h1>`
  - [ ] "Edmonton" appears in multiple places
  - [ ] "SEO" appears in multiple places
  - [ ] Case studies from region present
  - [ ] Industries for Edmonton displayed

### Structure Validation
- [ ] Count sections in output:
  ```bash
  grep -c "<section" public/services/seo-in-edmonton/index.php
  ```
  - [ ] 14+ sections present (excluding schema)

- [ ] Verify all key sections:
  - [ ] Hero section
  - [ ] Stats section
  - [ ] Gallery 1 (primary)
  - [ ] "Why Choose Us"
  - [ ] "Our Process"
  - [ ] Gallery 2 (mid-page)
  - [ ] Features section
  - [ ] Location-specific content
  - [ ] Case studies
  - [ ] FAQs
  - [ ] Gallery 3 (pre-footer)
  - [ ] Final CTA
  - [ ] Related services
  - [ ] Cross-location links

### SEO Validation
- [ ] Check meta tags:
  ```bash
  grep -E "<title>|<meta name=\"description\"" public/services/seo-in-edmonton/index.php
  ```
  - [ ] Unique title
  - [ ] Unique description
  - [ ] Both contain city + service

- [ ] Check schema markup:
  ```bash
  grep "application/ld+json" public/services/seo-in-edmonton/index.php
  ```
  - [ ] Service schema present
  - [ ] LocalBusiness schema present
  - [ ] Breadcrumb schema present
  - [ ] FAQ schema present

- [ ] Validate schema JSON:
  - [ ] Extract JSON blocks
  - [ ] Validate with https://jsonlint.com/
  - [ ] Check for required fields
  - [ ] Verify URL formats

- [ ] Check accessibility:
  - [ ] All images have alt text
  - [ ] H1-H6 hierarchy correct
  - [ ] Color contrast adequate
  - [ ] Keyboard navigation possible

---

## Phase 3: Generate Service Sample (1-2 hours)

### Generate One Service, All Locations
- [ ] Run command:
  ```bash
  php php-site/deploy/scripts/generate-location-service-pages.php --service=seo
  ```
  - [ ] Completes without errors
  - [ ] Shows progress statistics
  - [ ] Generated count = location count (~31 or custom)

- [ ] Verify output files:
  ```bash
  ls public/services/seo-in-*/index.php | wc -l
  ```
  - [ ] Count matches expected locations

- [ ] Sample 5 generated pages:
  - [ ] `seo-in-edmonton/index.php` - Alberta
  - [ ] `seo-in-toronto/index.php` - Ontario
  - [ ] `seo-in-vancouver/index.php` - British Columbia
  - [ ] `seo-in-calgary/index.php` - Alberta
  - [ ] `seo-in-montreal/index.php` - Quebec

- [ ] For each sample, verify:
  - [ ] Correct city name
  - [ ] Correct state name
  - [ ] Region-appropriate industries
  - [ ] Region-matched case studies
  - [ ] Unique content differs
  - [ ] Links to other cities in region

### Cross-Link Validation
- [ ] Check Edmonton page contains Toronto link:
  ```bash
  grep "seo-in-toronto" public/services/seo-in-edmonton/index.php
  ```
  - [ ] Link present in "Serving Your Region" section
  - [ ] Link format correct: `/services/seo-in-toronto`

- [ ] Check Toronto page contains Edmonton link:
  ```bash
  grep "seo-in-edmonton" public/services/seo-in-toronto/index.php
  ```
  - [ ] Link present

- [ ] Check Alberta pages link to each other:
  - [ ] Edmonton → Calgary, Red Deer, Lethbridge
  - [ ] Calgary → Edmonton, Red Deer
  - [ ] Etc.

---

## Phase 4: Full Generation (30-45 minutes)

### Generate All 1,488 Pages
- [ ] Run full generation:
  ```bash
  time php php-site/deploy/scripts/generate-location-service-pages.php \
      --regenerate-all --verbose
  ```
  - [ ] Process completes successfully
  - [ ] Generates 1,488+ pages
  - [ ] Shows elapsed time
  - [ ] Shows pages/second rate (150-200 expected)

- [ ] Verify total output:
  ```bash
  find public/services -name "index.php" -type f | wc -l
  ```
  - [ ] Count = 1,488 (or custom total)

- [ ] Check disk usage:
  ```bash
  du -sh public/services/
  ```
  - [ ] Expected: 500MB-1GB depending on content

- [ ] Verify file distribution:
  ```bash
  for service in seo web-design branding google-ads; do
    echo "$service: $(ls public/services/$service-in-*/index.php 2>/dev/null | wc -l)"
  done
  ```
  - [ ] Each service has ~31 location pages

### Performance Metrics
- [ ] Average page generation time: <10ms
- [ ] Generation rate: >150 pages/second
- [ ] Memory usage: <256MB
- [ ] No errors or warnings

---

## Phase 5: Quality Assurance (2-3 hours)

### Sample Pages for QA (Test 15-20 combinations)
- [ ] **Tier-1 Cities** (Major metros, multi-service)
  - [ ] Edmonton + SEO
  - [ ] Toronto + Web Design
  - [ ] Vancouver + Branding
  - [ ] Calgary + Google Ads

- [ ] **Tier-2 Cities** (Mid-size, regional hubs)
  - [ ] Ottawa + SEO
  - [ ] Montreal + Social Media
  - [ ] Winnipeg + Graphic Design

- [ ] **Tier-3 Cities** (Smaller, specific niches)
  - [ ] St. Albert + SEO
  - [ ] Red Deer + Web Design
  - [ ] Kelowna + Branding

### Content Quality (Per Sample Page)
- [ ] Word count: 3,000-4,000 words
  ```bash
  wc -w public/services/seo-in-edmonton/index.php
  ```

- [ ] No placeholder text ("Lorem ipsum", "[city]", "{service}")

- [ ] Natural language flow (manual review)
  - [ ] Intro feels customized
  - [ ] Case studies relevant to region
  - [ ] Industries match location
  - [ ] No awkward variable substitution

- [ ] Unique content across pages
  - [ ] Edmonton page != Toronto page
  - [ ] SEO page != Web Design page
  - [ ] At least 70% unique content per page

### SEO Quality (Per Sample Page)
- [ ] **Title Tag** (50-60 chars)
  - [ ] Contains service name
  - [ ] Contains city name
  - [ ] Contains "TML Agency"
  - [ ] No excessive keywords
  - [ ] Unique across all pages

- [ ] **Meta Description** (150-160 chars)
  - [ ] Compelling copy
  - [ ] Contains service and city
  - [ ] Includes CTA (consultation, quote, etc.)
  - [ ] Unique across pages

- [ ] **H1 Tag**
  - [ ] One per page
  - [ ] Describes page topic
  - [ ] Contains service + city
  - [ ] Natural language (not keyword-stuffed)

- [ ] **H2-H3 Hierarchy**
  - [ ] Logical structure
  - [ ] No skipped levels
  - [ ] Descriptive text
  - [ ] Include location/service keywords naturally

- [ ] **Keyword Distribution**
  - [ ] Primary keyword in title, H1, first paragraph
  - [ ] Secondary keywords in H2s
  - [ ] Natural keyword density (1-2%)
  - [ ] Related keywords (synonyms) distributed

- [ ] **Internal Links**
  - [ ] At least 5 internal links per page
  - [ ] Link text descriptive (not "click here")
  - [ ] Links to: other services, other cities, related industries
  - [ ] All links functional

- [ ] **Images**
  - [ ] 5-8 images per page
  - [ ] All have alt text with location/service
  - [ ] Descriptive filenames (.webp preferred)
  - [ ] Lazy loading (except hero)
  - [ ] Responsive sizing

### Schema Markup (Per Sample Page)
- [ ] **Service Schema**
  - [ ] @type = "Service"
  - [ ] Contains name, description, url
  - [ ] areaServed = city name
  - [ ] provider = "TML Agency"

- [ ] **LocalBusiness Schema**
  - [ ] @type = "LocalBusiness"
  - [ ] Contains name, description, url
  - [ ] address with city, state
  - [ ] areaServed = city name

- [ ] **Breadcrumb Schema**
  - [ ] @type = "BreadcrumbList"
  - [ ] 4+ items (Home, Services, Service, Location)
  - [ ] Correct order and URLs
  - [ ] position values correct (1, 2, 3, 4)

- [ ] **FAQ Schema**
  - [ ] @type = "FAQPage"
  - [ ] mainEntity array of Questions
  - [ ] Each Question has @type, name, acceptedAnswer
  - [ ] Answers have @type and text

### Responsive Design (Per Sample Page)
- [ ] **Mobile (320px)**
  - [ ] Text readable
  - [ ] Images scale properly
  - [ ] Buttons touch-friendly (44px+)
  - [ ] No horizontal scroll

- [ ] **Tablet (768px)**
  - [ ] 2-column layouts work
  - [ ] Images properly sized
  - [ ] Typography readable

- [ ] **Desktop (1024px+)**
  - [ ] 3-column layouts work
  - [ ] Image galleries display correctly
  - [ ] Spacing adequate

### Performance (Per Sample Page)
- [ ] **Page Size**
  - [ ] < 500KB total
  - [ ] Images optimized
  - [ ] No unused CSS/JS

- [ ] **Load Time** (test with DevTools)
  - [ ] < 2 seconds full load
  - [ ] LCP < 2.5s
  - [ ] CLS < 0.1

- [ ] **Images**
  - [ ] WebP format where possible
  - [ ] Lazy loading on non-hero
  - [ ] Responsive with srcset if needed

### Functionality (Per Sample Page)
- [ ] **Links**
  - [ ] "Get Free Quote" CTA links to contact form
  - [ ] Contact form pre-fills service/location
  - [ ] Cross-location links work
  - [ ] Related service links work
  - [ ] Related blog/industry links work

- [ ] **Interactivity**
  - [ ] FAQ accordions expand/collapse
  - [ ] Hover effects work
  - [ ] Buttons respond to clicks
  - [ ] Forms respond to input

---

## Phase 6: Data Consistency (1-2 hours)

### Location Data Validation
- [ ] Check 20 random locations in output:
  - [ ] State names match locations.json
  - [ ] Industry lists match locations.json
  - [ ] Landmarks appear in content

### Service Data Validation
- [ ] Check all 48 services in output:
  - [ ] Service features displayed
  - [ ] Service stats shown
  - [ ] Service description present

### Enrichment Data Validation
- [ ] Check enrichments applied:
  - [ ] Custom meta titles used (if provided)
  - [ ] Custom FAQs used (if provided)
  - [ ] Custom "Why Choose Us" used (if provided)
  - [ ] Fallbacks used for missing enrichments

### Case Study Validation
- [ ] Check 20 generated pages:
  - [ ] Case studies region-appropriate
  - [ ] Service-appropriate (seo page has seo cases)
  - [ ] 3-5 cases per page (or fallback if < 3)
  - [ ] Case study format correct (company, industry, story, results)

### Image Validation
- [ ] Check image references:
  - [ ] All referenced images exist in /media
  - [ ] No broken image links
  - [ ] Correct format (webp/jpg/png)
  - [ ] Alt text present and descriptive

---

## Phase 7: SEO Monitoring (Ongoing)

### Pre-Deployment
- [ ] Create robots.txt entries for /services paths
- [ ] Ensure canonical URLs are correct
- [ ] Prepare XML sitemap for 1,488+ URLs
- [ ] Set up Google Search Console property
- [ ] Set up Bing Webmaster Tools

### Deployment
- [ ] Deploy all 1,488 pages to production
- [ ] Verify pages accessible via HTTP(S)
- [ ] Test in browser: sample of 5 pages
- [ ] Submit sitemap to Google Search Console
- [ ] Submit sitemap to Bing
- [ ] Wait 24 hours for crawling

### Monitoring (Week 1)
- [ ] Check Google Search Console
  - [ ] Pages indexed: track daily growth
  - [ ] Coverage report: check for errors
  - [ ] Mobile usability: no errors
  - [ ] Core Web Vitals: all good

- [ ] Check Bing Webmaster
  - [ ] Crawl stats: verify crawling happening
  - [ ] Indexing: track growth
  - [ ] Keyword tracking: monitor impressions

### Monitoring (Month 1)
- [ ] Analyze search traffic:
  - [ ] Pages getting impressions
  - [ ] Click-through rate (CTR)
  - [ ] Average position in rankings
  - [ ] Identify top performers

- [ ] Monitor rankings:
  - [ ] Track 10-20 important keywords
  - [ ] Use SEMrush, Ahrefs, or Search Console
  - [ ] Note ranking improvements
  - [ ] Identify underperforming pages

### Ongoing
- [ ] **Weekly**
  - [ ] Check Google Search Console for errors
  - [ ] Monitor Core Web Vitals
  - [ ] Review new pages indexed

- [ ] **Monthly**
  - [ ] Analyze organic traffic
  - [ ] Review keyword rankings
  - [ ] Update enrichment data
  - [ ] Add case studies if needed

- [ ] **Quarterly**
  - [ ] Audit top 50 pages
  - [ ] Update content if needed
  - [ ] Refresh case studies
  - [ ] Add new locations if available

---

## Phase 8: Documentation & Handoff

### Documentation Complete
- [ ] `SCALABLE_TEMPLATE_GUIDE.md` - Full reference
- [ ] `TEMPLATE_QUICK_REFERENCE.md` - Quick lookup
- [ ] `IMPLEMENTATION_CHECKLIST.md` - This file
- [ ] Code comments in template file
- [ ] Code comments in generator script

### Knowledge Transfer
- [ ] Team trained on template system
- [ ] Administrators trained on generator script
- [ ] Content team trained on enrichment data
- [ ] Monitoring team trained on analytics

### Maintenance Plan
- [ ] Monthly enrichment updates documented
- [ ] Quarterly content refresh schedule
- [ ] Annual template refresh plan
- [ ] Escalation procedures for issues

---

## Success Criteria

### Must-Have (Non-negotiable)
- [ ] All 1,488 pages generated
- [ ] Zero errors during generation
- [ ] All pages contain unique content
- [ ] All variables substituted correctly
- [ ] All pages under 500KB
- [ ] All pages load under 2 seconds
- [ ] All schema markup valid
- [ ] All internal links working

### Should-Have (Important)
- [ ] 95%+ pages have unique content
- [ ] Average page size 150-200KB
- [ ] All case studies region-matched
- [ ] All FAQs location-customized
- [ ] Core Web Vitals all green
- [ ] Mobile-friendly design confirmed
- [ ] Search engines indexing properly

### Nice-to-Have (Optimization)
- [ ] Pages ranking for target keywords
- [ ] Organic traffic growing
- [ ] CTR above average
- [ ] Engagement metrics positive
- [ ] User feedback positive

---

## Rollback Plan (If Issues)

### Critical Issues
If generation has errors or output is corrupted:

1. Stop generation process
2. Delete corrupted output:
   ```bash
   rm -rf public/services/*/index.php
   ```
3. Verify data integrity:
   ```bash
   php scripts/validate-data.php
   ```
4. Fix issues in data files
5. Regenerate from clean state
6. Re-test sample pages
7. Redeploy

### Production Issues
If pages cause problems on live site:

1. Remove sitemap reference:
   - Edit `public/sitemap.xml`
   - Remove entries for affected paths

2. Robots.txt blacklist (temporary):
   ```
   Disallow: /services/
   ```

3. Revert to previous version:
   ```bash
   git revert HEAD
   ```

4. Investigate root cause
5. Fix in development
6. Test thoroughly
7. Redeploy with care

---

## Final Checklist

### Pre-Generation
- [ ] All data files validated
- [ ] Test page generated and approved
- [ ] Template reviewed by team
- [ ] Generator script tested
- [ ] Backup of current live site taken

### During Generation
- [ ] Monitor script execution
- [ ] Watch for errors/warnings
- [ ] Note final statistics
- [ ] Verify file permissions

### Post-Generation
- [ ] Spot-check 20 random pages
- [ ] Verify search console integration
- [ ] Monitor initial indexing
- [ ] Track first week of traffic
- [ ] Document any issues

### Ongoing
- [ ] Monthly maintenance schedule
- [ ] Quarterly content updates
- [ ] Annual template refresh
- [ ] Continuous monitoring

---

## Contact & Support

For questions or issues:
1. Review `SCALABLE_TEMPLATE_GUIDE.md` first
2. Check `TEMPLATE_QUICK_REFERENCE.md` for quick answers
3. Review generator error messages
4. Check implementation notes in template files
5. Escalate to development team if needed

---

**Generated**: 2025-03-31
**System**: Scalable Location Service Template v1.0
**Total Pages**: 1,488+
**Sections per Page**: 15
**Template Variables**: 50+
**Expected Generation Time**: 8-12 minutes (all pages)
**Expected Total Size**: 500MB-1GB
