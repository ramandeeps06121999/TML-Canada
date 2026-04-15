# SEO Audit: Social Media Marketing Service Page

**Audit Date:** 2026-04-14
**Page:** `social-media-marketing-edmonton.php` (primary) + 64 city variants
**URL:** `https://townmedialabs.ca/services/social-media-marketing-in-edmonton/`
**Target Keywords:**
- "social media marketing agency" (1,900 vol / KD 47) -- HIGH PRIORITY
- "social media agency" (880 vol / KD 58)

---

## CRITICAL ISSUE: Entire Page Is Content Marketing Copy on a Social Media Marketing URL

The most severe problem on this page is that **the body content is almost entirely about content marketing (blog writing, copywriting, whitepapers, email sequences) rather than social media marketing**. The URL, title, and H1 all say "Social Media Marketing" but the actual page content describes a content marketing service. This is a fundamental content-URL mismatch that will confuse both users and search engines, resulting in poor rankings for either keyword set.

This affects all 65 city variants.

---

## 1. Title Tag

**Current:** `Best Social Media Marketing in Edmonton | TML Agency | Content Strategy Experts`
**Character count:** ~75 (over 60-char recommendation; will truncate in SERPs)

**Issues:**
- "Content Strategy Experts" reinforces the wrong service -- this is a social media page
- Missing "Agency" which is part of both target keywords
- "Best" is filler that adds no ranking value
- Title is too long; Google will truncate after ~60 characters

**Recommended:** `Social Media Marketing Agency in Edmonton | TML Agency`
- 54 characters -- fits SERP display
- Contains "social media marketing agency" (1,900 vol target) naturally
- Contains "Edmonton" for local intent
- Clean brand mention

---

## 2. Meta Description

**Current:** `Strategic content marketing in Edmonton. Blog writing, content strategy, copywriting. 200+ brands. Proven ROI. $2,000-$12,000/month.`

**Issues:**
- Describes **content marketing**, not social media marketing -- completely wrong service
- "Blog writing, content strategy, copywriting" are irrelevant to social media
- Does not contain either target keyword ("social media marketing agency" or "social media agency")
- Price range ($2,000-$12,000) conflicts with JSON data ($15,000/month management)

**Recommended:** `Edmonton's trusted social media marketing agency. Instagram, Facebook, LinkedIn & TikTok management. Content creation, paid ads & community management. 100+ brands managed. Free audit.`
- ~178 characters (within 160 recommended; trim if needed)
- Contains "social media marketing agency" naturally
- Lists specific platforms (strong CTR signal)
- Includes CTA ("Free audit")

---

## 3. H1 Tag

**Current:** `Best Social Media Marketing in Edmonton`

**Issues:**
- Missing "Agency" -- does not match either target keyword phrase
- "Best" is subjective and adds no SEO value
- Does not differentiate from competitors

**Recommended:** `Social Media Marketing Agency in Edmonton`
- Exact match for primary keyword "social media marketing agency" + geo modifier
- Clean, professional, no filler words

---

## 4. Content Audit -- REWRITE REQUIRED

### 4a. Hero Section (lines 145-152)
**Current content talks about:**
- "Content is king"
- "10,000+ pieces of content"
- "Blog posts, whitepapers, case studies, email sequences, landing pages"

**Problem:** This is content marketing copy. None of this describes social media marketing services (Instagram management, community engagement, paid social ads, influencer partnerships, etc.).

**Fix:** Rewrite hero to discuss social media strategy, platform management, community building, paid social campaigns, content creation for social platforms. Use language from the `servicePages.json` data which correctly describes the service.

### 4b. "Why Social Media Marketing" Section (lines 155-184)
**Current content talks about:**
- "content marketing generates 3x more leads than paid advertising"
- SEO/Google ranking benefits

**Problem:** Statistics and benefits described are for content marketing, not social media. Social media value props should focus on brand awareness, community engagement, social commerce, audience growth, paid social ROI.

**Fix:** Replace with social-media-specific statistics (e.g., 4.9B social media users globally, average 2.5 hours/day on social, social commerce growth rates).

### 4c. Case Studies Section (lines 206-273)
**Current case studies describe:**
1. Blog content for B2B (organic traffic from blog posts)
2. SEO blog for local service business
3. Email content for e-commerce
4. Educational content for SaaS
5. Content audit & refresh

**Problem:** Zero case studies about social media. All five describe content marketing or email marketing outcomes. This is completely misaligned with the page topic.

**Fix:** Replace with actual social media case studies: follower growth, engagement rate improvements, social ad ROAS, Instagram/Facebook campaign results, influencer partnership outcomes. The JSON data references a D2C skincare brand generating $18 lakh from Instagram -- use case studies like that.

### 4d. Services Grid (lines 276-307)
**Current services listed:**
- Blog Writing & Strategy
- Website Copywriting
- Content Strategy
- Email Content
- Guides & Whitepapers
- Content Audit & Refresh

**Problem:** These are all content marketing services. None are social media services.

**Fix:** Replace with the actual social media services from `servicePages.json`:
- Content Creation (posts, reels, stories, carousels)
- Community Management
- Paid Social Ads (Meta, LinkedIn, Twitter)
- Influencer Partnerships
- Analytics & Strategy
- Profile Optimization

### 4e. Pricing Table (lines 310-343)
**Current:** References "social media campaigns" in the table but pricing ($3,000-$15,000) conflicts with JSON ($15,000/month management + $10,000/month paid).

**Fix:** Align pricing with actual social media service tiers. Include ad spend management as a separate line item.

### 4f. Keyword Usage
- "social media marketing agency" appears: **0 times** in body content
- "social media agency" appears: **0 times** in body content
- "content marketing" appears: **multiple times** (wrong keyword!)

**Fix:** Naturally integrate target keywords:
- Use "social media marketing agency" 3-5 times across the page
- Use "social media agency" 2-3 times
- Use LSI variants: "social media management", "social media services", "social media company", "social media experts"

---

## 5. Schema Markup

### 5a. Organization Schema (lines 56-76)
**Status:** Present, acceptable
**Issues:**
- `aggregateRating` on Organization type is technically valid but Google recommends it on LocalBusiness
- `"title"` is not a valid Schema.org property on Person; should be `"jobTitle"`

### 5b. LocalBusiness Schema (lines 79-89)
**Current:** `"description": "Expert content marketing and strategy in Edmonton"`
**Problem:** Description says "content marketing" -- wrong service
**Fix:** `"description": "Expert social media marketing agency in Edmonton offering content creation, community management, and paid social campaigns"`
**Missing fields:** address, telephone, geo coordinates, openingHours, sameAs (social profiles)

### 5c. Service Schema (lines 92-110)
**Current:** `"description": "Strategic content marketing services for Edmonton businesses"`
**Problem:** Again says "content marketing"
**Fix:** `"description": "Social media marketing services including content creation, community management, paid social advertising, and influencer partnerships for Edmonton businesses"`
**Missing:** `serviceType`, `hasOfferCatalog` for sub-services

### 5d. Article Schema (lines 113-133)
**Current:** `"headline": "Best Social Media Marketing in Edmonton - Strategic Content Services"`
**Issues:**
- "Strategic Content Services" -- wrong framing
- `"title"` property on Person should be `"jobTitle"`
- Consider using `ProfessionalService` or `ServicePage` instead of `Article` for a service page

### 5e. FAQPage Schema -- MISSING
**Problem:** The page has 5 FAQ items but NO FAQPage structured data. This is a missed opportunity for rich results.
**Fix:** Add FAQPage schema:
```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Which social media platforms do you manage?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We manage Instagram, Facebook, LinkedIn, Twitter/X, YouTube, and Pinterest..."
      }
    }
  ]
}
```

### 5f. BreadcrumbList Schema -- MISSING
**Fix:** Add breadcrumb schema: Home > Services > Social Media Marketing > Edmonton

---

## 6. FAQ Section

**Current FAQs (lines 346-395):**
1. "How much content do we need?" -- content marketing question
2. "How long until we see results?" -- generic
3. "Do you do SEO in the content?" -- content marketing question
4. "Can we approve content before publishing?" -- content marketing question
5. "How do we measure success?" -- generic

**Issues:**
- FAQs are about content marketing, not social media marketing
- Do not target any search queries users would ask about social media services
- Missing FAQPage schema (no rich result eligibility)
- Only 5 FAQs -- could expand to 8-10

**Recommended replacement FAQs (aligned with target keywords + search intent):**
1. "How much does a social media marketing agency charge?" -- high commercial intent
2. "Which social media platforms should my business be on?" -- informational, from JSON data
3. "How often will you post on our social media accounts?" -- from JSON data
4. "Do you handle paid social media advertising?" -- commercial intent
5. "How do you measure social media marketing ROI?" -- informational
6. "Can you handle negative comments and crisis management?" -- from JSON data
7. "Do you create all the social media content?" -- from JSON data
8. "How long before we see results from social media marketing?" -- informational
9. "What is the difference between organic and paid social media?" -- informational
10. "Why should we hire a social media agency instead of doing it in-house?" -- decision stage

---

## 7. Technical Issues

### 7a. Edmonton file missing favicon/apple-touch-icon
The Edmonton file (`social-media-marketing-edmonton.php`) is missing favicon links that are present in city variants like Toronto:
```html
<link rel="icon" type="image/x-icon" href="https://townmedialabs.ca/favicon.ico">
<link rel="apple-touch-icon" href="https://townmedialabs.ca/apple-touch-icon.png">
```

### 7b. OG Description mismatch
**Current:** `Strategic content marketing that attracts, engages, and converts customers.`
**Fix:** Should reference social media marketing, not content marketing.

### 7c. No OG:image tag
Missing `og:image` -- important for social sharing CTR.

### 7d. CTA buttons use onclick JS navigation
```html
<button class="cta-button" onclick="location.href='#contact'">
```
Should be `<a>` tags for accessibility and SEO (links are crawlable, onclick is not).

### 7e. FAQ answers hidden by default with `display: none`
Google can still index content in `display: none`, but the toggle uses inline JS which is fragile. Consider using `<details>/<summary>` HTML elements for native accordion behavior.

### 7f. No internal links
The page has zero internal links to related services (influencer management, graphic design, video editing) or to city variants. Internal linking is critical for distributing authority across the 65 city pages.

---

## 8. Content Quality & E-E-A-T

### 8a. Expertise signals
- Author credit (Raman Makkar) is present -- good
- Title "Chief Social Media Strategist" supports E-E-A-T
- Missing: author bio section, link to author page, credentials/certifications

### 8b. Experience signals
- Case studies are present but describe wrong service
- Testimonials reference blog content and email, not social media
- Fix: Replace with social-media-specific results and testimonials

### 8c. Currency references
- JSON deepContent references "$18 lakh" and "rupee" (Indian currency) -- must be converted to CAD for Canadian audience
- "$2 crore in social ad spend" -- same issue

---

## 9. Priority Action Items

### P0 -- Critical (do immediately)
1. **Rewrite entire page body** to be about social media marketing instead of content marketing. The URL-to-content mismatch is the single biggest issue.
2. **Fix title tag** to include "Agency": `Social Media Marketing Agency in Edmonton | TML Agency`
3. **Fix meta description** to describe social media services, not content marketing
4. **Fix H1** to `Social Media Marketing Agency in Edmonton`

### P1 -- High Priority
5. **Replace all 5 case studies** with social media marketing case studies
6. **Replace services grid** with actual social media services from JSON data
7. **Rewrite FAQs** to target social media marketing queries
8. **Add FAQPage schema** for rich results eligibility
9. **Fix all schema descriptions** from "content marketing" to "social media marketing"
10. **Fix currency references** from INR to CAD in deepContent

### P2 -- Medium Priority
11. **Add BreadcrumbList schema**
12. **Add internal links** to related services and city variants
13. **Add OG:image** meta tag
14. **Add favicon links** to Edmonton variant
15. **Replace button onclick** with proper anchor tags
16. **Expand FAQs** to 8-10 questions
17. **Fix `"title"` to `"jobTitle"`** in Person schema objects

### P3 -- Low Priority
18. Add author bio section with credentials
19. Add social proof specific to social media (follower counts managed, engagement rates)
20. Add comparison table (in-house vs agency) targeting "why hire social media agency"
21. Consider adding video embed showcasing social media work samples

---

## 10. Impact Estimate

The content-URL mismatch alone is likely costing this page all ranking potential for both target keywords. A page titled "Social Media Marketing" that talks about blog writing and email sequences will not rank for "social media marketing agency" (1,900 vol) or "social media agency" (880 vol).

After fixing P0 + P1 items, estimated ranking potential:
- "social media marketing agency" (KD 47): Page 2-3 within 3-4 months, page 1 within 6-8 months with link building
- "social media agency" (KD 58): Page 2-3 within 4-5 months
- Long-tail variants ("social media marketing agency Edmonton", "social media agency Edmonton"): Page 1 within 2-3 months

**All 65 city variant files need the same content rewrite** since they share the same template with city name substitution.
