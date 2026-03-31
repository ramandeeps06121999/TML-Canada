# JSON-LD Schema Quick Start
## Copy-Paste Ready Implementation for TML Agency

**Date:** March 31, 2026
**Status:** Production Ready
**Coverage:** All 1,488 location variations

---

## 5-MINUTE QUICK START

### Step 1: Copy Schema Functions (30 seconds)

Copy the entire file:
```
/php-site/deploy/includes/schema-templates.php
```

This file contains all schema generation functions. No modifications needed.

### Step 2: Add to Your Page Header (2 minutes)

In your page file (e.g., `/php-site/deploy/services/seo-in-edmonton/index.php`):

```php
<?php
// At the top of your <head> section, right after line 32:

include_once $_SERVER['DOCUMENT_ROOT'] . '/../includes/schema-templates.php';

// Output all schemas for this page
echo outputAllSchemas(
    'SEO',                          // Service name
    'Edmonton',                     // City name
    [                               // Location data
        'lat' => 53.5461,
        'lng' => -113.4937,
        'region' => 'Alberta',
        'country' => 'Canada'
    ],
    [                               // Pricing tiers
        [
            'name' => 'SEO Foundation',
            'price' => '999',
            'description' => 'Technical SEO audit, keyword research, and on-page optimization for 10 target keywords'
        ],
        [
            'name' => 'SEO Growth Package',
            'price' => '2999',
            'description' => 'Comprehensive SEO strategy, content optimization, link building, and monthly reporting'
        ],
        [
            'name' => 'Enterprise SEO',
            'price' => '7999',
            'description' => 'Full-scale SEO program with content creation, technical optimization, and dedicated account management'
        ]
    ],
    [                               // Breadcrumbs
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Services', 'url' => '/services'],
        ['name' => 'SEO', 'url' => '/services/seo'],
        ['name' => 'SEO in Edmonton', 'url' => '/services/seo-in-edmonton']
    ]
);
?>
```

### Step 3: Test (1-2 minutes)

1. Visit: https://search.google.com/test/rich-results
2. Enter your URL: https://townmedialabs.ca/services/seo-in-edmonton
3. Verify you see:
   - ✅ Organization schema
   - ✅ LocalBusiness schema
   - ✅ Service schema
   - ✅ BreadcrumbList schema
   - ✅ FAQPage schema

Done! All schemas are now live.

---

## WHAT YOU JUST ENABLED

After implementation, your page will show:

| Feature | Benefit |
|---------|---------|
| **LocalBusiness in Maps** | Shows address, phone, hours in Google Maps pack |
| **FAQ Rich Results** | Displays FAQ questions directly in search results (CTR +15%) |
| **Breadcrumb Navigation** | Shows page hierarchy in search results (SERP real estate) |
| **Service Cards** | Displays service details with pricing in search results |
| **Star Ratings** | Shows 4.9/5 rating with 127 reviews |

---

## COMPLETE SETUP FOR ALL 1,488 PAGES

### For Automation (Recommended)

Create a configuration file with all services and locations:

**File:** `/php-site/deploy/data/page-schemas.json`

```json
{
  "services": {
    "seo": {"name": "SEO", "slug": "seo", ...},
    "branding": {"name": "Branding", "slug": "branding", ...},
    ...
  },
  "locations": {
    "edmonton": {"name": "Edmonton", "lat": 53.5461, "lng": -113.4937, ...},
    "calgary": {"name": "Calgary", "lat": 51.0486, "lng": -114.0708, ...},
    ...
  }
}
```

Then use the `SchemaGenerator` class to dynamically generate schemas:

```php
<?php
$generator = new SchemaGenerator(__DIR__ . '/../data/page-schemas.json');
echo $generator->outputSchemasForPage('SEO', 'Edmonton');
?>
```

---

## VARIABLE SUBSTITUTION REFERENCE

For all 1,488 location pages, use these variables:

| Variable | Example | Purpose |
|----------|---------|---------|
| `{SERVICE}` | SEO | Service display name |
| `{SERVICE_SLUG}` | seo | Service URL slug |
| `{CITY}` | Edmonton | City name (proper case) |
| `{CITY_SLUG}` | edmonton | City URL slug |
| `{LAT}` | 53.5461 | Geographic latitude |
| `{LNG}` | -113.4937 | Geographic longitude |
| `{REGION}` | Alberta | Province/state name |
| `{COUNTRY}` | Canada | Country name |

---

## PRICING BY SERVICE

Copy the appropriate pricing tiers for each service:

### SEO
- **Foundation:** $999 - 10 keywords, audit, on-page
- **Growth:** $2,999 - 25 keywords, content, links
- **Enterprise:** $7,999 - 50+ keywords, full service

### Branding
- **Identity:** $2,499 - Logo, colors, fonts
- **System:** $5,999 - Full brand system + guidelines
- **Enterprise:** $12,999 - Complete brand + support

### Web Design
- **Starter:** $3,999 - Single page, responsive
- **Professional:** $7,999 - 5-10 pages, CMS
- **Enterprise:** $15,999 - Full site, custom features

### Google Ads
- **Setup:** $499 - Campaign setup, keywords
- **Managed:** $1,999 - Daily optimization, testing
- **Premium:** $4,999 - Advanced strategies, dedicated

### Social Media
- **Basic:** $799 - 2 platforms, content
- **Growth:** $1,999 - 3-4 platforms, analytics
- **Enterprise:** $4,999 - All channels, influencers

---

## VALIDATION CHECKLIST

After implementation, verify:

- [ ] No JSON errors in console
- [ ] Google Rich Results Test shows 0 errors
- [ ] Organization schema appears
- [ ] LocalBusiness schema appears
- [ ] Service schema appears with pricing
- [ ] BreadcrumbList appears
- [ ] FAQPage appears with 3+ questions
- [ ] No duplicate schemas
- [ ] All URLs are absolute (https://...)
- [ ] Phone number is valid
- [ ] Email address is valid
- [ ] Pricing is numbers (not "$ 999")
- [ ] Rating is 4.9 (between 1-5)
- [ ] Review count is 127 (> 0)

---

## COMMON QUESTIONS

### Q: How long before Google shows rich results?
A: 2-4 weeks. Google needs to recrawl and index your pages.

### Q: Do I need to do anything else?
A: No. The schemas are complete. Just submit sitemap to Google Search Console and monitor for errors.

### Q: Can I customize the schemas?
A: Yes. Each function returns an array that you can modify before outputting:

```php
$schema = getServiceSchema('SEO', 'Edmonton');
$schema['name'] = 'Custom Service Name'; // modify
echo outputSchema($schema);
```

### Q: Will this improve my rankings?
A: Schemas don't directly improve rankings, but they can:
- Increase CTR by 2-5% (rich results visibility)
- Improve user experience (people see what they need)
- Build trust (ratings, reviews visible)

### Q: What about mobile?
A: Schemas work on mobile and desktop. Google Rich Results Test validates both.

---

## FILE MANIFEST

| File | Purpose | Size | Status |
|------|---------|------|--------|
| `schema-templates.php` | Core functions | 15KB | Ready to use |
| `COMPLETE-SCHEMA-MARKUP-GUIDE.md` | Full documentation | 50KB | Reference |
| `SCHEMA-IMPLEMENTATION-GUIDE.md` | Step-by-step guide | 40KB | Implementation |
| `EDMONTON-SCHEMA-COMPLETE.json` | Example schemas | 30KB | Copy-paste |
| `SCHEMA-QUICK-START.md` | This file | 10KB | Quick reference |

---

## PRODUCTION DEPLOYMENT

### Phase 1: Test (Today)
- [ ] Add to Edmonton page
- [ ] Test in Rich Results Test
- [ ] Verify no errors
- [ ] Check Google Search Console

### Phase 2: Rollout (This Week)
- [ ] Add to all service pages (15 pages)
- [ ] Verify all pass validation
- [ ] Monitor GSC for errors

### Phase 3: Scale (This Month)
- [ ] Add to all 1,488 location pages
- [ ] Create automation system
- [ ] Set up monitoring

### Phase 4: Monitor (Ongoing)
- [ ] Track Rich Results impressions
- [ ] Monitor CTR improvements
- [ ] Update ratings monthly
- [ ] Fix any schema errors

---

## SUPPORT MATRIX

| Issue | Solution | Time |
|-------|----------|------|
| Schema not appearing | Wait 2-4 weeks, resubmit sitemap | 2-4 weeks |
| Duplicate schemas | Remove duplicates from page | 10 mins |
| JSON errors | Use JSON validator, check syntax | 15 mins |
| Wrong pricing | Update in PHP code, redeploy | 5 mins |
| Missing FAQ | Add FAQ section to page HTML | 30 mins |

---

## NEXT STEPS

1. **Now:** Copy `schema-templates.php` to your deploy folder
2. **Next 5 minutes:** Add to Edmonton page
3. **Today:** Validate in Google Rich Results Test
4. **Tomorrow:** Deploy to all service pages
5. **This week:** Add to all 1,488 location pages
6. **Next month:** Monitor impact on traffic/CTR

---

## MONITORING DASHBOARD

Track these metrics in Google Search Console:

**Week 1-2:** Verify schemas are detected
- [ ] 0 schema errors
- [ ] Organization schema detected
- [ ] LocalBusiness schema detected

**Week 3-4:** Wait for Google to index
- [ ] LocalBusiness appearing in search
- [ ] FAQ starting to show

**Month 2:** Measure impact
- [ ] LocalBusiness CTR increase
- [ ] FAQ impressions (target: +500/month)
- [ ] Organic CTR increase (target: +2-5%)

**Month 3+:** Optimize
- [ ] Update ratings monthly
- [ ] Add more FAQs
- [ ] Expand to more services

---

## TROUBLESHOOTING

### Schema shows but no rich results
- Likely waiting for Google recrawl (2-4 weeks)
- Submit URL to Google Search Console for faster indexing

### "Missing required field" errors
- Check all required fields are present:
  - Service: name, description, url, provider
  - LocalBusiness: name, address, telephone
  - Offer: name, price, priceCurrency

### Duplicate schema warnings
- Remove redundant schemas
- Keep one Organization, one LocalBusiness per page

### Price showing as string instead of number
- Ensure price in JSON is quoted as string: `"999"`
- Not as number: `999` (they're the same in JSON)

---

## RESOURCES

- **Google Rich Results Test:** https://search.google.com/test/rich-results
- **Schema.org Validator:** https://validator.schema.org
- **Google Search Console:** https://search.google.com/search-console
- **Complete Spec:** https://schema.org/Service
- **Breadcrumb Spec:** https://schema.org/BreadcrumbList

---

## FINAL CHECKLIST

Before going live:

- [ ] All files copied to correct directories
- [ ] schema-templates.php included in page header
- [ ] Variables match your actual data
- [ ] Google Rich Results Test shows 0 errors
- [ ] Breadcrumbs appear in search
- [ ] Rating (4.9) displays
- [ ] FAQ shows with 3+ questions
- [ ] Pricing tiers display correctly
- [ ] All URLs are absolute (https://...)
- [ ] Google Search Console has no schema errors
- [ ] Mobile version also shows schemas
- [ ] No duplicate schemas on page

---

## SUCCESS METRICS

After 30 days, you should see:

| Metric | Baseline | Target | Status |
|--------|----------|--------|--------|
| LocalBusiness impressions | 0 | 1,488 | ? |
| FAQ impressions | 0 | +500/month | ? |
| Service card clicks | 0 | +100/month | ? |
| Organic CTR | X% | X% + 2-5% | ? |
| Total organic traffic | Y | Y + 15-30% | ? |

---

**Ready to implement?** Start with Step 1 above. You'll be done in 5 minutes.

**Questions?** Refer to the full documentation files included.

---

**Last Updated:** March 31, 2026
**For:** TML Agency - All 1,488 Location Pages
**Version:** 1.0 Production Ready
**Maintenance:** No ongoing updates needed (auto-generates)
