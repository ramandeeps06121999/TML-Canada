# 🚀 INTEGRATION GUIDE - LIVE WEBSITE
## TML Agency SEO Location Pages (62 pages ready to deploy)

---

## ✅ CURRENT STATUS

**URL Structure Used:**
- `https://townmedialabs.ca/services/seo-in-edmonton/`
- `https://townmedialabs.ca/services/seo-in-calgary/`
- `https://townmedialabs.ca/services/seo-in-vancouver/`
- etc.

**Files Generated:** 62 location pages
- Location: `/Users/ramanmakkar/Desktop/tml-php/php-site/deploy/views/`
- Format: `seo-in-{city}.php`
- Size: ~35KB per file
- Total: 2.2 MB

---

## 🔧 DEPLOYMENT STEPS

### Step 1: Identify Your Current Website Structure

**Question: How is your website currently hosted?**

Your existing pages are at:
- URL: `https://townmedialabs.ca/services/seo-in-edmonton/`
- Server path: `?`

To find out where files should go, check:

```bash
# Option A: If you have SSH/FTP access
# Look for the web root directory
ls -la /var/www/townmedialabs.ca/
# or
ls -la /home/username/public_html/townmedialabs.ca/

# Option B: Check your hosting control panel (cPanel, Plesk, etc.)
# Look for "File Manager" or "Public HTML"
```

---

### Step 2: Determine How URLs Map to Files

**Question: Does your website use:**
- [ ] A. PHP files with routing? (`/services/seo-in-edmonton/` → `/services/seo-in-edmonton.php`)
- [ ] B. A PHP framework like Laravel? (routes.php or similar)
- [ ] C. A CMS with custom pages?
- [ ] D. Something else?

**To check, look for:**
```bash
# Does /services/seo-in-edmonton/ physically exist as a folder?
# Or does /services/seo-in-edmonton.php exist?

# Check in your hosting
ls -la /path/to/website/services/ | grep seo
```

---

### Step 3: Copy Files to Correct Location

**Assuming standard PHP structure** (most likely):

```bash
# 1. Copy all 62 generated pages to your services directory
scp -r /Users/ramanmakkar/Desktop/tml-php/php-site/deploy/views/seo-in-*.php user@townmedialabs.ca:/var/www/townmedialabs.ca/services/

# OR if using local development:
cp /Users/ramanmakkar/Desktop/tml-php/php-site/deploy/views/seo-in-*.php /path/to/your/website/services/

# 2. Verify files are in correct location
ls -la /path/to/your/website/services/ | grep seo-in-
# Should show all 62 files
```

**Or using your hosting control panel:**
1. Login to hosting (cPanel, Plesk, etc.)
2. Open File Manager
3. Navigate to `/public_html/services/` or `/services/`
4. Upload all `seo-in-*.php` files from `/Users/ramanmakkar/Desktop/tml-php/php-site/deploy/views/`

---

### Step 4: Test Pages Locally First

**Before uploading to live site**, test locally:

```bash
# Start local PHP server
cd /Users/ramanmakkar/Desktop/tml-php/php-site/deploy/views/
php -S localhost:8000

# Visit in browser:
http://localhost:8000/seo-in-edmonton.php
http://localhost:8000/seo-in-calgary.php

# Check:
✓ Page loads without errors
✓ Text displays correctly
✓ Location name appears (Edmonton, Calgary, etc.)
✓ No PHP errors in console
✓ Schema markup in source code
```

---

### Step 5: Verify on Live Website

Once files are uploaded to `/services/` directory:

```bash
# Test each main city page
curl -I https://townmedialabs.ca/services/seo-in-edmonton.php
curl -I https://townmedialabs.ca/services/seo-in-calgary.php

# Should return:
# HTTP/1.1 200 OK (NOT 404)

# Visit in browser to verify:
https://townmedialabs.ca/services/seo-in-edmonton.php
https://townmedialabs.ca/services/seo-in-calgary.php
https://townmedialabs.ca/services/seo-in-vancouver.php
https://townmedialabs.ca/services/seo-in-toronto.php
https://townmedialabs.ca/services/seo-in-montreal.php
```

---

## 📋 DEPLOYMENT CHECKLIST

- [ ] **Identify server path** where `/services/` files are stored
- [ ] **Copy all 62 files** to correct location
- [ ] **Test locally** with PHP server
- [ ] **Test on live site** - verify pages load
- [ ] **Check schema markup** - view page source, find `<script type="application/ld+json">`
- [ ] **Verify location names** - Edmonton, Calgary, etc. appear in content
- [ ] **Test mobile** - visit on phone or Chrome DevTools
- [ ] **Check internal links** - click a few links to verify they work

---

## 🔍 WHAT HAPPENS AFTER DEPLOYMENT

### Day 1-2: Files Live
- Pages are now accessible online
- Users can visit `https://townmedialabs.ca/services/seo-in-edmonton/` directly
- Pages appear in browser

### Day 3-7: Google Crawling
- Google crawls new pages
- Pages appear in "URL Inspection" tool in Google Search Console
- You'll see "Discovered" status

### Week 2-4: Indexing
- Pages indexed into Google's database
- Pages appear in search results
- Initial keywords rank (positions 15-50 typically)

### Month 2+: Growth
- Rankings improve for target keywords
- Organic traffic increases
- Lead generation begins

---

## 📊 SITEMAP UPDATE (Critical!)

**Update your sitemap.xml** to include all 62 new pages:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <!-- Existing URLs in your sitemap... -->

  <!-- NEW: Add all 62 SEO location pages -->
  <url>
    <loc>https://townmedialabs.ca/services/seo-in-edmonton/</loc>
    <lastmod>2026-03-31</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <url>
    <loc>https://townmedialabs.ca/services/seo-in-calgary/</loc>
    <lastmod>2026-03-31</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <url>
    <loc>https://townmedialabs.ca/services/seo-in-vancouver/</loc>
    <lastmod>2026-03-31</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <url>
    <loc>https://townmedialabs.ca/services/seo-in-toronto/</loc>
    <lastmod>2026-03-31</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <url>
    <loc>https://townmedialabs.ca/services/seo-in-montreal/</loc>
    <lastmod>2026-03-31</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <!-- Continue for all 62 cities... -->
  <url>
    <loc>https://townmedialabs.ca/services/seo-in-abbotsford/</loc>
    <lastmod>2026-03-31</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>

  <!-- ... (56 more entries for remaining cities) ... -->

</urlset>
```

**All 62 Cities in Sitemap:**
Abbotsford, Airdrie, Barrie, Brampton, Brandon, Brantford, Burlington, Burnaby, Calgary, Cambridge, Charlottetown, Chatham, Chilliwack, Coquitlam, Corner Brook, Edmonton, Fredericton, Gatineau, Grande Prairie, Guelph, Halifax, Hamilton, Kamloops, Kelowna, Kingston, Kitchener, Langley, Lethbridge, London (ON), Markham, Medicine Hat, Mississauga, Moncton, Montreal, Moose Jaw, Nanaimo, New Westminster, Oakville, Oshawa, Ottawa, Peterborough, Prince Albert, Prince George, Quebec City, Red Deer, Regina, Richmond Hill, Saint John, Saskatoon, Sherbrooke, St. Catharines, St. John's, Sudbury, Surrey, Thunder Bay, Toronto, Vaughan, Victoria, Waterloo, Whitehorse, Windsor, Winnipeg

---

## 🔗 GOOGLE SEARCH CONSOLE SETUP (Critical!)

### Step 1: Update Sitemap in GSC

1. Go to: https://search.google.com/search-console
2. Select your property (townmedialabs.ca)
3. Left menu → **Sitemaps**
4. Your current sitemap URL (likely `sitemap.xml`)
5. **Delete old sitemap** (optional - for clean slate)
6. **Add new sitemap** → Enter: `https://townmedialabs.ca/sitemap.xml`
7. Click **Submit**
8. Wait for **Success** message

### Step 2: Request Indexing for Top Pages

1. Left menu → **URL Inspection**
2. Test these 5 URLs first:
   - `https://townmedialabs.ca/services/seo-in-edmonton/`
   - `https://townmedialabs.ca/services/seo-in-calgary/`
   - `https://townmedialabs.ca/services/seo-in-vancouver/`
   - `https://townmedialabs.ca/services/seo-in-toronto/`
   - `https://townmedialabs.ca/services/seo-in-montreal/`

3. For each URL:
   - Paste URL in search box
   - Click **Request indexing**
   - Wait for confirmation

### Step 3: Monitor Coverage Report

1. Left menu → **Coverage**
2. Look for your new pages in the list
3. Initially they'll show as "Discovered" (normal)
4. Over 1-2 weeks they should move to "Indexed"

---

## 📈 MONITORING (Week-by-Week)

### Week 1: Crawling Phase
- [ ] Check GSC daily
- [ ] Look for crawl activity
- [ ] Verify no 404 errors

### Week 2-3: Initial Indexing
- [ ] Check Coverage report
- [ ] Should see pages being indexed
- [ ] Look for any errors

### Week 4: First Rankings
- [ ] Check Performance tab in GSC
- [ ] See which keywords are appearing
- [ ] Check average position (likely 20-50 range)

### Month 2: Growth Phase
- [ ] Monitor ranking improvements
- [ ] Track organic traffic in Analytics
- [ ] Look for lead generation

### Month 3+: Optimization
- [ ] Pages ranking top 10-20 for main keywords
- [ ] Continue monitoring
- [ ] Adjust strategy if needed

---

## 🆘 TROUBLESHOOTING

### Problem: Pages return 404

**Solution:**
1. Verify files are in correct directory
2. Check file permissions: `chmod 644 seo-in-*.php`
3. Verify URL structure matches your website
4. Check if your site uses routing (may need routes file update)

### Problem: Schema markup missing

**Solution:**
1. View page source (Ctrl+U / Cmd+U in browser)
2. Search for `schema.org`
3. If found - schema is present
4. If not found - check file uploaded correctly

### Problem: Pages not indexing

**Solution:**
1. Check robots.txt allows `/services/`
2. Verify sitemap submitted in GSC
3. Check for crawl errors in GSC
4. Ensure pages have no `noindex` tags

### Problem: No traffic after 4 weeks

**Solution:**
1. Check if pages are indexed (Google Search Console)
2. Check rankings for target keywords
3. Very competitive keywords may take 6+ months
4. Consider building links to boost rankings

---

## 📞 QUICK REFERENCE

### Commands for Verification

```bash
# Count total files
ls -1 seo-in-*.php | wc -l
# Should show: 62

# Verify file names
ls -1 seo-in-*.php | head -20
# Should show: seo-in-abbotsford.php, seo-in-airdrie.php, etc.

# Check canonical URLs were updated
grep "seo-in-" seo-in-edmonton.php | head -5
# Should show seo-in-edmonton in canonical URL

# Test if files are valid PHP
php -l seo-in-edmonton.php
# Should show: No syntax errors detected
```

### Critical URLs to Test
```
https://townmedialabs.ca/services/seo-in-edmonton/
https://townmedialabs.ca/services/seo-in-calgary/
https://townmedialabs.ca/services/seo-in-vancouver/
https://townmedialabs.ca/services/seo-in-toronto/
https://townmedialabs.ca/services/seo-in-montreal/
```

### Files to Update on Website
```
1. Sitemap.xml - Add all 62 URLs
2. Navigation menu - Add links to location pages
3. Services page - Link to new location pages
4. Homepage - Consider adding link to top cities
```

---

## ✨ SUMMARY

**What You Have:**
- ✅ 62 production-ready location pages
- ✅ All schema markup complete
- ✅ All URLs match your existing structure (seo-in-city)
- ✅ Ready for immediate deployment

**What You Need to Do:**
1. Copy files to `/services/` directory on your website
2. Update sitemap.xml with all 62 new URLs
3. Submit updated sitemap to Google Search Console
4. Request indexing for top 5 cities
5. Monitor GSC for crawling and indexing

**Timeline:**
- Day 1: Deploy files
- Week 1: Google crawls pages
- Week 2-4: Pages indexed and ranking
- Month 2+: Growth begins

---

## 🎯 SUCCESS METRICS

Track these to measure success:

```
GSC Metrics:
✓ Impressions increase (pages being shown in search)
✓ Clicks increase (users clicking from search results)
✓ CTR improves (more people clicking)
✓ Average position improves (ranking higher)

Analytics Metrics:
✓ Organic traffic from Google increases
✓ New sessions from location-based keywords
✓ Lead form submissions increase
✓ Lead quality improves

Business Metrics:
✓ Calls from organic search
✓ Consultations booked from organic
✓ Conversion rate improves
✓ Revenue from organic channel increases
```

---

**Generated:** 2026-03-31
**Status:** READY FOR DEPLOYMENT
**Files:** 62 location pages
**URL Pattern:** `/services/seo-in-{city}/`
