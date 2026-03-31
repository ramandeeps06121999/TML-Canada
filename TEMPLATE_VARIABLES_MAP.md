# Template Variables Map - Location-Based Content Generation

## Overview
This document defines all 50+ variables that are substituted to generate location-specific SEO pages from the Edmonton template.

---

## LOCATION-SPECIFIC VARIABLES

### Core Location Data
```
{CITY}                    = "Edmonton"
{CITY_SLUG}               = "edmonton"
{STATE/PROVINCE}          = "Alberta"
{STATE_SLUG}              = "ab"
{COUNTRY}                 = "Canada"
{REGION_DESCRIPTOR}       = "Alberta's Capital" / "West Canada" / "Mountain Region"
```

### Market Statistics (Location-Specific)
```
{POPULATION_CITY}         = "1.24M" (Edmonton)
{POPULATION_METRO}        = "1.59M" (Edmonton CMA)
{ANNUAL_GROWTH}           = "3.0%"
{TOTAL_BUSINESSES}        = "29,894"
{SMALL_BUSINESS_PCT}      = "97%"
{TOP_INDUSTRY_1}          = "Healthcare" / "Oil & Gas" / "Technology"
{TOP_INDUSTRY_2}          = "Professional Services"
{TOP_INDUSTRY_3}          = "Trades & Construction"
{REAL_ESTATE_SALES_MONTH} = "1,606"
{AVG_HOME_PRICE}          = "$454,000"
{TECH_GROWTH_RATE}        = "26% since 2014"
{DENTAL_CLINICS}          = "141"
{TRADE_JOBS_COUNT}        = "X number"
```

### Competitive Landscape
```
{COMPETITOR_COUNT}        = Number of SEO companies in market
{MARKET_SATURATION}       = "Low" / "Medium" / "High"
{OPPORTUNITY_RATING}      = "High" / "Medium"
{COMPETITIVE_DIFFICULTY} = "Easy" / "Medium" / "Hard"
```

### Local Keywords
```
{CITY_KEYWORD}            = "SEO in Edmonton" / "SEO in Toronto"
{CITY_LOCATION_KEYWORD}   = "Edmonton" / "Toronto"
{SERVICE_CITY_KEYWORD}    = "SEO services Edmonton" / "Web design Toronto"
{NEAR_ME_VARIATION}       = "SEO near me Edmonton"
{NEIGHBORHOODS}           = "Downtown Edmonton, West Edmonton, South Edmonton, North Edmonton"
{SERVICE_AREA}            = "Serving Edmonton and surrounding areas"
```

### Page Meta Tags
```
{META_TITLE}              = "Best SEO in {CITY} | TML Agency"
{META_DESCRIPTION}        = "Specialized SEO services for {CITY} businesses. Rank higher on Google, get more customers. Free consultation. 200+ clients, proven results."
{H1_TAG}                  = "Best SEO in {CITY} | Get More Customers From Google"
{CANONICAL_URL}           = "https://townmedialabs.ca/services/seo-{CITY_SLUG}/"
{OG_IMAGE}                = "https://townmedialabs.ca/images/seo-{CITY_SLUG}-og.jpg"
```

### Dynamic Content Sections

#### Hero Section
```
{HERO_TAGLINE}            = "{CITY}'s Trusted SEO Experts"
{HERO_DESCRIPTION}        = "{CITY} is Canada's fastest-growing city with {POPULATION_CITY} residents and {TOTAL_BUSINESSES} businesses."
{PROMISE_1}               = "Rank in the top 3 on Google for your most important keywords"
{PROMISE_2}               = "Get 20-50+ qualified leads per month from organic search"
{PROMISE_3}               = "Spend less on paid advertising because organic search is generating customers"
```

#### Market Context
```
{MARKET_INTRO}            = "{CITY} isn't like other Canadian cities. Your market is unique. Your competition is different."
{MARKET_OPPORTUNITY}      = "There are {TOTAL_BUSINESSES} potential competitor websites in {CITY}."
{GROWTH_STATEMENT}        = "{CITY} is growing {ANNUAL_GROWTH} annually - fastest in Canada"
{INDUSTRY_FOCUS_1}        = "{TOP_INDUSTRY_1}: Industry stats and context"
{INDUSTRY_FOCUS_2}        = "{TOP_INDUSTRY_2}: Industry stats and context"
{INDUSTRY_FOCUS_3}        = "{TOP_INDUSTRY_3}: Industry stats and context"
```

#### Search Behavior
```
{MOBILE_SEARCH_PCT}       = "40.6% of searches happen on mobile"
{LOCAL_INTENT_PCT}        = "46% of searches have local intent"
{SAME_DAY_ACTION_PCT}     = "76% of mobile local searches result in visit within 24h"
{SEASONAL_PATTERNS}       = "Winter (Nov-Mar): snow removal, HVAC. Summer (May-Sept): construction."
```

---

## CASE STUDY VARIABLES (Region-Matched)

### Case Study Data Structure
Each case study gets location-matched examples:

```
{CS1_COMPANY}             = "Apex Plumbing Solutions" (Local Service - Plumbing/HVAC)
{CS1_INDUSTRY}            = "Plumbing & HVAC"
{CS1_CHALLENGE}           = "Virtually invisible on Google"
{CS1_BEFORE_RANKING}      = "#45" for main keyword
{CS1_AFTER_RANKING}       = "#3"
{CS1_BEFORE_TRAFFIC}      = "120 visits/month"
{CS1_AFTER_TRAFFIC}       = "2,400 visits/month"
{CS1_TRAFFIC_GROWTH}      = "+2000%"
{CS1_BEFORE_LEADS}        = "2-3/month"
{CS1_AFTER_LEADS}         = "35-40/month"
{CS1_LEAD_GROWTH}         = "+1200%"
{CS1_REVENUE_6_MONTHS}    = "$127,500"
{CS1_ROI}                 = "1,456%"
{CS1_TESTIMONIAL}         = "Within six months, my phone was ringing constantly..."

{CS2_COMPANY}             = "Westmount Real Estate Group" (Real Estate)
{CS2_INDUSTRY}            = "Real Estate / Brokerage"
{CS2_BEFORE_RANKING}      = "#12"
{CS2_AFTER_RANKING}       = "#4"
{CS2_REVENUE_4_MONTHS}    = "$220,000"
{CS2_ROI}                 = "5,280%"

{CS3_COMPANY}             = "Parkside Dental Excellence" (Healthcare)
{CS3_INDUSTRY}            = "Dental Practice"
{CS3_BEFORE_RANKING}      = "#18"
{CS3_AFTER_RANKING}       = "#2"
{CS3_NEW_PATIENTS}        = "25-30/month"
{CS3_AD_SPEND_SAVINGS}    = "$2,700/month"
{CS3_REVENUE_5_MONTHS}    = "$145,500"

{CS4_COMPANY}             = "Prairie Craft Supply Co." (E-Commerce)
{CS4_INDUSTRY}            = "E-Commerce / Retail"
{CS4_BEFORE_RANKING}      = "#35"
{CS4_AFTER_RANKING}       = "#2"
{CS4_MONTHLY_REVENUE}     = "$5,890-7,125"
{CS4_ROI}                 = "524%"

{CS5_COMPANY}             = "Beacon Accounting & Advisory" (B2B)
{CS5_INDUSTRY}            = "Accounting / CPA"
{CS5_BEFORE_RANKING}      = "Page 5+"
{CS5_AFTER_RANKING}       = "#6"
{CS5_REVENUE_7_MONTHS}    = "$199,500"
{CS5_ROI}                 = "2,895%"
```

---

## PRICING VARIABLES

```
{STARTER_PRICE}           = "$2,499/month"
{STARTER_DESCRIPTION}     = "Perfect for small businesses, single location"
{STARTER_FEATURES}        = "Quarterly audit, on-page optimization (5-10 keywords), 4 blog posts/month"

{GROWTH_PRICE}            = "$5,999/month"
{GROWTH_DESCRIPTION}      = "For growing businesses with moderate competition"
{GROWTH_FEATURES}         = "Monthly audits, on-page (15-25 keywords), 8 blog posts/month, link building"

{PREMIUM_PRICE}           = "$12,999/month"
{PREMIUM_DESCRIPTION}     = "For ambitious growth in competitive markets"
{PREMIUM_FEATURES}        = "Everything in Growth + aggressive link building + content hub + dedicated manager"

{STARTER_ROI_YEAR1}       = "300%"
{GROWTH_ROI_YEAR1}        = "500-700%"
{PREMIUM_ROI_YEAR1}       = "800-1,200%"

{STARTER_PAYBACK}         = "4-6 months"
{GROWTH_PAYBACK}          = "2-3 months"
{PREMIUM_PAYBACK}         = "1-2 months"
```

---

## FAQ VARIABLES (Location-Aware)

```
{CITY_FAQ_1}              = "How long does SEO take in {CITY}?"
{CITY_FAQ_2}              = "What's the best SEO strategy for {CITY} {INDUSTRY}?"
{CITY_FAQ_3}              = "How much does SEO cost in {CITY}?"
{CITY_FAQ_4}              = "Can you help my {INDUSTRY} business in {CITY}?"
{CITY_FAQ_5}              = "How many {CITY} businesses have you helped?"
{CITY_FAQ_6}              = "What's unique about {CITY}'s market?"
{CITY_FAQ_7}              = "How quickly will I see results in {CITY}?"
```

---

## SCHEMA MARKUP VARIABLES

```
{SCHEMA_LOCAL_CITY}       = "Edmonton"
{SCHEMA_LOCAL_PROVINCE}   = "Alberta"
{SCHEMA_LOCAL_COUNTRY}    = "Canada"
{SCHEMA_SERVICE_NAME}     = "SEO Services in Edmonton"
{SCHEMA_AREA_SERVED}      = {"@type": "City", "name": "Edmonton, Alberta"}
{SCHEMA_PRICE_RANGE}      = "$2,499 - $12,999"
{SCHEMA_OPENING_HOURS}    = "Mon-Fri 9:00-17:00"
```

---

## AUTHOR/ATTRIBUTION VARIABLES

```
{AUTHOR_NAME}             = "Raman Makkar"
{AUTHOR_ROLE}             = "Founder & Chief SEO Strategist"
{AUTHOR_BIO}              = "15+ years of SEO expertise, serving 200+ businesses across 8 industries"
{AUTHOR_URL}              = "https://townmedialabs.ca/about/raman-makkar/"
{BUSINESS_NAME}           = "TML Agency"
{BUSINESS_URL}            = "https://townmedialabs.ca"
{BUSINESS_FOUNDED}        = "2010"
{EMPLOYEES}               = "70-100"
{TOTAL_CLIENTS}           = "200+"
{INDUSTRIES_SERVED}       = "8"
```

---

## INTERNAL LINKING VARIABLES

```
{LINK_SERVICES_HUB}       = "/services/"
{LINK_SEO_HUB}            = "/services/seo/"
{LINK_SEO_CITY}           = "/services/seo-edmonton/"
{LINK_CASE_STUDIES}       = "/case-studies/"
{LINK_CONTACT}            = "/contact/"
{LINK_BLOG}               = "/blog/"
{LINK_TESTIMONIALS}       = "/testimonials/"
{RELATED_SERVICES}        = "/services/web-design-edmonton/" + "/services/google-ads-edmonton/" etc
{RELATED_CITIES}          = "/services/seo-calgary/" + "/services/seo-vancouver/" etc
```

---

## LOCATION-SPECIFIC NEIGHBORHOODS (FOR LOCAL TARGETING)

### Edmonton Neighborhoods
```
{NEIGHBORHOODS_MAIN}      = ["Downtown Edmonton", "West Edmonton", "South Edmonton", "North Edmonton"]
{NEIGHBORHOODS_INNER}     = ["Old Strathcona", "River Cree", "Whyte Avenue", "The Quarters"]
{NEIGHBORHOODS_OUTER}     = ["Windermere", "Castledowns", "Summerside", "Aspen Landing"]
```

### For Other Locations
```
{NEIGHBORHOODS_LIST}      = Auto-populate based on city data
{SERVICE_AREAS}           = Auto-populate based on location
{KEY_LANDMARKS}           = Auto-populate based on location
```

---

## TEMPORAL/SEASONAL VARIABLES

```
{PUBLICATION_DATE}        = "2026-03-31"
{LAST_UPDATED}            = "2026-03-31"
{YEARS_IN_BUSINESS}       = "15"
{FOUNDING_YEAR}           = "2010"
{CURRENT_YEAR}            = "2026"
{SEASONAL_FOCUS}          = "Winter demand (snow removal, HVAC), Summer demand (construction, outdoor services)"
```

---

## FILE PATH VARIABLES

```
{VIEW_FILE_PATH}          = "/php-site/deploy/views/seo-{CITY_SLUG}.php"
{CANONICAL_PATH}          = "services/seo-{CITY_SLUG}/"
{IMAGE_PATH}              = "/images/seo-{CITY_SLUG}/"
{SCHEMA_FILE}             = "schema-seo-{CITY_SLUG}.json"
```

---

## IMPLEMENTATION NOTES

1. **Batch Substitution**: All variables are replaced using PHP's `strtr()` function during generation
2. **Format**: Variables use {UPPERCASE_NAMES} format for easy identification
3. **Location Data**: Pull from LocationIndex or database based on city
4. **Case Studies**: Auto-select region-matched examples from master case study library
5. **Statistics**: Pull from LOCAL_DATA research files for accuracy
6. **Testimonials**: Use relevant testimonials based on industry match

---

## Example Substitution Map

```php
$variables = [
    '{CITY}' => 'Edmonton',
    '{CITY_SLUG}' => 'edmonton',
    '{PROVINCE}' => 'Alberta',
    '{POPULATION_CITY}' => '1.24M',
    '{TOTAL_BUSINESSES}' => '29,894',
    '{META_TITLE}' => 'Best SEO in Edmonton | TML Agency',
    '{META_DESCRIPTION}' => 'Specialized SEO services for Edmonton businesses...',
    // ... 50+ more mappings
];

$content = strtr($templateContent, $variables);
```

This map is used by the batch generation script to create 1,488 location-specific pages automatically.
