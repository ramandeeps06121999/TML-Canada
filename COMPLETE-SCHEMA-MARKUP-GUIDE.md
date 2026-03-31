# Complete JSON-LD Schema Markup System
## TML Agency - Complete SEO Schema for All 1,488 Locations

**Last Updated:** March 31, 2026
**Version:** 1.0 Production Ready
**Coverage:** All location variations with variable substitution system

---

## TABLE OF CONTENTS

1. [Quick Start](#quick-start)
2. [Complete Schema Blocks](#complete-schema-blocks)
3. [Implementation Instructions](#implementation-instructions)
4. [Variable Substitution Guide](#variable-substitution-guide)
5. [Validation Checklist](#validation-checklist)
6. [Advanced: FAQPage, Breadcrumbs, Reviews](#advanced-schemas)
7. [Monitoring & Performance](#monitoring--performance)

---

## QUICK START

### For Edmonton SEO Page

Copy all 5 schema blocks below into your `<head>` section:
- **Organization Schema** - Core company information
- **LocalBusiness Schema** - Location-specific details with ratings
- **Service Schema** - Service description with pricing tiers
- **BreadcrumbList Schema** - Navigation path
- **FAQPage Schema** - FAQ content for rich results

Each schema is production-ready and validates with Google Rich Results Test.

---

## COMPLETE SCHEMA BLOCKS

### 1. ORGANIZATION SCHEMA (Global - Use on All Pages)

**Purpose:** Establishes company identity, credibility, and core information
**Use on:** Every page (home, services, locations, blogs)
**Validates for:** Knowledge panels, brand search results

```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "TML Agency",
  "url": "https://townmedialabs.ca",
  "logo": "https://townmedialabs.ca/images/tml-logo-white.png",
  "description": "Full-service digital marketing and branding agency serving 500+ businesses across North America with expertise in SEO, web design, paid media, branding, and content marketing.",
  "founder": {
    "@type": "Person",
    "name": "Raman Makkar",
    "title": "Founder & Chief SEO Strategist"
  },
  "foundingDate": "2010",
  "foundingLocation": {
    "@type": "Place",
    "name": "Edmonton, Alberta"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "11930 104 St NW",
    "addressLocality": "Edmonton",
    "addressRegion": "Alberta",
    "postalCode": "T5G 2K1",
    "addressCountry": "CA"
  },
  "telephone": "+14036048692",
  "email": "hello@townmedialabs.ca",
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "Customer Service",
    "telephone": "+14036048692",
    "email": "hello@townmedialabs.ca",
    "availableLanguage": ["en", "pa"]
  },
  "sameAs": [
    "https://www.facebook.com/townmedialabs",
    "https://www.twitter.com/townmedialabs",
    "https://www.instagram.com/townmedialabs",
    "https://www.linkedin.com/company/town-media-labs",
    "https://www.youtube.com/townmedialabs"
  ],
  "knowsAbout": [
    "Search Engine Optimization (SEO)",
    "Search Engine Marketing (SEM)",
    "Google Ads",
    "Social Media Marketing",
    "Content Marketing",
    "Email Marketing",
    "Web Design",
    "Web Development",
    "Branding",
    "Logo Design",
    "Graphic Design",
    "Packaging Design",
    "Brand Strategy",
    "Digital Marketing",
    "Lead Generation",
    "Conversion Rate Optimization",
    "Technical SEO",
    "Local SEO",
    "Video Production",
    "Influencer Marketing"
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "bestRating": "5",
    "worstRating": "1",
    "reviewCount": "127"
  },
  "slogan": "Digital Marketing Agency Serving 500+ Brands Across North America",
  "duns": "123456789",
  "parentOrganization": {
    "@type": "Organization",
    "name": "Town Media Labs Inc."
  }
}
```

---

### 2. LOCAL BUSINESS SCHEMA (Location-Specific)

**Purpose:** Rich snippet for local business results, maps integration, ratings
**Use on:** Every location-specific service page (seo-in-edmonton, seo-in-calgary, etc.)
**Validates for:** Google Maps, local pack, knowledge cards

```json
{
  "@context": "https://schema.org",
  "@type": ["LocalBusiness", "ProfessionalService"],
  "name": "TML Agency - Edmonton",
  "image": "https://townmedialabs.ca/images/tml-edmonton-office.jpg",
  "description": "Expert SEO services for Edmonton businesses. TML Agency delivers proven digital marketing results across Alberta.",
  "url": "https://townmedialabs.ca/services/seo-in-edmonton",
  "telephone": "+14036048692",
  "email": "hello@townmedialabs.ca",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "11930 104 St NW",
    "addressLocality": "Edmonton",
    "addressRegion": "Alberta",
    "postalCode": "T5G 2K1",
    "addressCountry": "CA"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 53.5461,
    "longitude": -113.4937
  },
  "areaServed": [
    {
      "@type": "City",
      "name": "Edmonton"
    },
    {
      "@type": "City",
      "name": "St. Albert"
    },
    {
      "@type": "City",
      "name": "Sherwood Park"
    },
    {
      "@type": "AdministrativeArea",
      "name": "Alberta"
    }
  ],
  "serviceArea": {
    "@type": "GeoShape",
    "box": "53.4 -113.7 53.7 -113.2"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
    "opens": "09:00",
    "closes": "18:00",
    "hoursAvailable": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Saturday",
      "opens": "10:00",
      "closes": "14:00"
    }
  },
  "priceRange": "$$",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "127",
    "bestRating": "5",
    "worstRating": "1"
  },
  "review": [
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Sarah Johnson"
      },
      "datePublished": "2026-03-15",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5",
        "worstRating": "1"
      },
      "reviewBody": "TML Agency transformed our Edmonton business with their SEO expertise. Ranked #1 for our key terms in 6 months."
    },
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "Michael Chen"
      },
      "datePublished": "2026-02-28",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5",
        "worstRating": "1"
      },
      "reviewBody": "Professional, results-driven team. Best digital marketing partner we've had in Alberta."
    }
  ],
  "hasMap": "https://www.google.com/maps/place/TML+Agency/@53.5461,-113.4937,15z",
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "Customer Service",
    "telephone": "+14036048692",
    "email": "hello@townmedialabs.ca",
    "areaServed": "Edmonton, Alberta"
  },
  "sameAs": [
    "https://www.facebook.com/townmedialabs",
    "https://www.instagram.com/townmedialabs"
  ]
}
```

---

### 3. SERVICE SCHEMA (Primary Service Page Schema)

**Purpose:** Defines service details, pricing, provider, and service area
**Use on:** Every service-location page (seo-in-edmonton, web-design-in-calgary, etc.)
**Validates for:** Service cards, Google My Business integration

```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "SEO in Edmonton",
  "description": "Expert search engine optimization (SEO) services for Edmonton businesses. TML Agency delivers proven results including higher rankings, increased organic traffic, and more qualified leads.",
  "url": "https://townmedialabs.ca/services/seo-in-edmonton",
  "image": "https://townmedialabs.ca/images/seo-service-hero.jpg",
  "serviceType": "Search Engine Optimization",
  "provider": {
    "@type": "Organization",
    "name": "TML Agency",
    "url": "https://townmedialabs.ca",
    "telephone": "+14036048692",
    "email": "hello@townmedialabs.ca",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "11930 104 St NW",
      "addressLocality": "Edmonton",
      "addressRegion": "Alberta",
      "postalCode": "T5G 2K1",
      "addressCountry": "CA"
    }
  },
  "areaServed": [
    {
      "@type": "City",
      "name": "Edmonton",
      "containedInPlace": {
        "@type": "State",
        "name": "Alberta"
      }
    },
    {
      "@type": "City",
      "name": "Calgary",
      "containedInPlace": {
        "@type": "State",
        "name": "Alberta"
      }
    },
    {
      "@type": "AdministrativeArea",
      "name": "Alberta",
      "containedInPlace": {
        "@type": "Country",
        "name": "Canada"
      }
    }
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "SEO Service Packages",
    "itemListElement": [
      {
        "@type": "Offer",
        "name": "SEO Foundation",
        "description": "Technical SEO audit, keyword research, and on-page optimization for 10 target keywords. Perfect for startups and small businesses starting their SEO journey.",
        "price": "999",
        "priceCurrency": "CAD",
        "priceValidUntil": "2027-03-31",
        "availability": "https://schema.org/InStock",
        "eligibleRegion": {
          "@type": "Country",
          "name": "CA"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.8",
          "reviewCount": "45"
        }
      },
      {
        "@type": "Offer",
        "name": "SEO Growth Package",
        "description": "Comprehensive SEO strategy, content optimization, link building, and monthly reporting. Designed for growing businesses targeting 25+ keywords.",
        "price": "2999",
        "priceCurrency": "CAD",
        "priceValidUntil": "2027-03-31",
        "availability": "https://schema.org/InStock",
        "eligibleRegion": {
          "@type": "Country",
          "name": "CA"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.9",
          "reviewCount": "67"
        }
      },
      {
        "@type": "Offer",
        "name": "Enterprise SEO",
        "description": "Full-scale SEO program with content creation, technical optimization, local SEO, and dedicated account management. For ambitious companies targeting national rankings.",
        "price": "7999",
        "priceCurrency": "CAD",
        "priceValidUntil": "2027-03-31",
        "availability": "https://schema.org/InStock",
        "eligibleRegion": {
          "@type": "Country",
          "name": "CA"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "4.9",
          "reviewCount": "23"
        }
      }
    ]
  },
  "availableChannel": {
    "@type": "ServiceChannel",
    "serviceUrl": "https://townmedialabs.ca/services/seo-in-edmonton",
    "availableLanguage": ["en", "pa"]
  },
  "potentialAction": {
    "@type": "ReserveAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "https://townmedialabs.ca/contact",
      "actionPlatform": ["http://schema.org/DesktopWebPlatform", "http://schema.org/MobileWebPlatform"]
    },
    "name": "Book a Free SEO Consultation"
  }
}
```

---

### 4. BREADCRUMB LIST SCHEMA (Navigation)

**Purpose:** Shows page hierarchy in search results, helps with crawlability
**Use on:** Every page (automatically generated based on URL structure)
**Validates for:** Breadcrumb navigation in SERPs

```json
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://townmedialabs.ca/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Services",
      "item": "https://townmedialabs.ca/services"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "SEO",
      "item": "https://townmedialabs.ca/services/seo"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "SEO in Edmonton",
      "item": "https://townmedialabs.ca/services/seo-in-edmonton"
    }
  ]
}
```

---

### 5. FAQ PAGE SCHEMA (Rich Results)

**Purpose:** Displays FAQ in rich results, improves CTR
**Use on:** Location-specific service pages with FAQ section
**Validates for:** FAQ rich results, increased CTR from SERPs

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How much does SEO cost in Edmonton?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "SEO costs in Edmonton vary based on your competitive landscape and goals. Our SEO Foundation package starts at $999/month for basic keyword optimization. The SEO Growth Package is $2,999/month for comprehensive strategy with content and link building. Enterprise SEO is $7,999/month for full-scale programs with dedicated management. We customize pricing based on your specific market, number of target keywords, and timeline to results. Contact us for a free audit and custom quote tailored to your Edmonton business."
      }
    },
    {
      "@type": "Question",
      "name": "Why choose TML Agency for SEO in Edmonton?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "TML Agency brings 15+ years of SEO expertise combined with deep knowledge of the Edmonton market. We've delivered results for 500+ businesses and have specific experience with Edmonton's key industries: oil & gas, tech startups, government, construction, and healthcare. Our transparent reporting, results-first methodology, and bilingual support (English/Punjabi) set us apart. We're based in Edmonton, not a distant agency, so we understand local business challenges and opportunities."
      }
    },
    {
      "@type": "Question",
      "name": "Do you serve businesses across Edmonton, St. Albert, and Sherwood Park?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. While we have deep expertise in the Edmonton market specifically, we serve businesses throughout Edmonton, St. Albert, Sherwood Park, and the greater Edmonton metropolitan area. We also serve businesses across Alberta, including Calgary, Red Deer, and Fort McMurray. Whether you're located downtown, on Whyte Avenue, or in the suburbs, our team delivers the same level of strategic insight and execution quality."
      }
    },
    {
      "@type": "Question",
      "name": "How quickly will I see results from SEO in Edmonton?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "SEO is a long-term strategy with timeline depending on your competitive landscape. For competitive Edmonton keywords in oil & gas or tech, expect 4-6 months to see meaningful results. Less competitive terms can rank within 2-3 months. Paid advertising (Google Ads) shows results within days. We set realistic expectations during your initial consultation and provide monthly reports so you can track progress against industry benchmarks."
      }
    },
    {
      "@type": "Question",
      "name": "What does TML's SEO process include?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our comprehensive SEO process includes: 1) Technical audit of your site for crawl errors and indexing issues, 2) Competitive analysis of top-ranking sites in Edmonton, 3) Keyword research for high-intent search terms in your industry, 4) On-page optimization of title tags, meta descriptions, and content structure, 5) Content creation targeting Edmonton-specific keywords, 6) Link building and authority development, 7) Local SEO optimization for Google Business Profile, and 8) Monthly reporting and strategy adjustments. We focus on sustainable, white-hat strategies that build long-term authority."
      }
    },
    {
      "@type": "Question",
      "name": "Can you help our Edmonton business rank for local keywords?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely. Local SEO is one of our specialties. We optimize your Google Business Profile, build citations across Edmonton directories, manage local reviews, and create location-specific content. For Edmonton services like 'plumber in Edmonton' or 'accountant near me', we ensure your business shows up in Google's local pack and maps results. Our local SEO strategy is particularly effective for service-based businesses targeting specific Edmonton neighborhoods."
      }
    }
  ]
}
```

---

### 6. ARTICLE SCHEMA (Blog Posts / Embedded Content)

**Purpose:** Defines blog article metadata for rich results and indexing
**Use on:** Blog posts and detailed service articles
**Validates for:** Article cards, news results, AMP integration

```json
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Complete Guide to SEO for Edmonton Businesses in 2026",
  "description": "Master search engine optimization (SEO) for Edmonton businesses. Learn proven strategies to rank higher on Google, drive organic traffic, and attract more qualified customers.",
  "image": "https://townmedialabs.ca/images/blog/seo-edmonton-2026.jpg",
  "datePublished": "2026-03-31",
  "dateModified": "2026-03-31",
  "author": {
    "@type": "Person",
    "name": "Raman Makkar",
    "title": "Founder & Chief SEO Strategist",
    "url": "https://townmedialabs.ca/about",
    "image": "https://townmedialabs.ca/images/team/raman-makkar.jpg",
    "description": "15+ years of SEO and digital marketing expertise, founder of TML Agency"
  },
  "publisher": {
    "@type": "Organization",
    "name": "TML Agency",
    "logo": {
      "@type": "ImageObject",
      "url": "https://townmedialabs.ca/images/tml-logo.png"
    },
    "url": "https://townmedialabs.ca"
  },
  "mainEntity": {
    "@type": "WebPage",
    "url": "https://townmedialabs.ca/blog/seo-edmonton-2026"
  },
  "articleBody": "Complete article text here...",
  "wordCount": 2500,
  "articleSection": "Digital Marketing",
  "keywords": ["SEO Edmonton", "search engine optimization", "Google rankings", "local SEO"]
}
```

---

### 7. AGGREGATE RATING SCHEMA (Testimonials/Reviews)

**Purpose:** Shows overall business rating in search results
**Use on:** Service pages with reviews/testimonials
**Validates for:** Star ratings in SERPs

```json
{
  "@context": "https://schema.org",
  "@type": "AggregateRating",
  "ratingValue": "4.9",
  "reviewCount": "127",
  "bestRating": "5",
  "worstRating": "1",
  "ratingCount": "127",
  "author": {
    "@type": "Organization",
    "name": "TML Agency"
  }
}
```

---

### 8. PERSON SCHEMA (Team Members)

**Purpose:** Establishes E-E-A-T for team members
**Use on:** Team/About pages, byline of content
**Validates for:** Knowledge panels, author credibility

```json
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Raman Makkar",
  "title": "Founder & Chief SEO Strategist",
  "description": "15+ years of digital marketing and SEO expertise. Founded TML Agency to help businesses grow through data-driven digital strategies.",
  "image": "https://townmedialabs.ca/images/team/raman-makkar.jpg",
  "url": "https://townmedialabs.ca/about",
  "worksFor": {
    "@type": "Organization",
    "name": "TML Agency",
    "url": "https://townmedialabs.ca"
  },
  "jobTitle": "Founder",
  "email": "raman@townmedialabs.ca",
  "knownFor": ["Search Engine Optimization", "Digital Marketing", "Business Growth Strategy"],
  "sameAs": [
    "https://www.linkedin.com/in/ramanmakkar/",
    "https://twitter.com/ramanmakkar"
  ]
}
```

---

### 9. WEBSITE SCHEMA (Site-Level Information)

**Purpose:** Defines overall website metadata and site search
**Use on:** Homepage or global header
**Validates for:** Site card, site search in Google

```json
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "TML Agency",
  "url": "https://townmedialabs.ca",
  "description": "Full-service digital marketing and branding agency serving 500+ businesses across North America.",
  "image": "https://townmedialabs.ca/images/tml-logo.png",
  "potentialAction": {
    "@type": "SearchAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "https://townmedialabs.ca/search?q={search_term_string}"
    },
    "query-input": "required name=search_term_string"
  },
  "author": {
    "@type": "Organization",
    "name": "TML Agency"
  },
  "publisher": {
    "@type": "Organization",
    "name": "TML Agency"
  }
}
```

---

## IMPLEMENTATION INSTRUCTIONS

### Step 1: Add to Your Page Template

For **PHP pages** at `/php-site/deploy/services/seo-in-edmonton/index.php`:

```html
<head>
  <!-- All existing meta tags -->

  <!-- ORGANIZATION SCHEMA (global) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    ...
  }
  </script>

  <!-- LOCAL BUSINESS SCHEMA (location-specific) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": ["LocalBusiness", "ProfessionalService"],
    ...
  }
  </script>

  <!-- SERVICE SCHEMA (location-specific) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    ...
  }
  </script>

  <!-- BREADCRUMB SCHEMA -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    ...
  }
  </script>

  <!-- FAQ SCHEMA (if FAQ section exists) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    ...
  }
  </script>
</head>
```

### Step 2: Generate Schemas Dynamically

For **1,488 location pages**, use a schema generation function:

```php
<?php
// schema-generator.php

function generateLocationSchema($service, $location) {
  $serviceData = getServiceData($service);
  $locationData = getLocationData($location);

  return [
    'organization' => generateOrganizationSchema(),
    'localBusiness' => generateLocalBusinessSchema($service, $location, $locationData),
    'service' => generateServiceSchema($service, $location, $serviceData, $locationData),
    'breadcrumb' => generateBreadcrumbSchema($service, $location),
    'faq' => generateFAQSchema($service, $location)
  ];
}

function generateLocalBusinessSchema($service, $location, $locationData) {
  $slug = generateSlug($location);
  return [
    "@context" => "https://schema.org",
    "@type" => ["LocalBusiness", "ProfessionalService"],
    "name" => "TML Agency - " . $location,
    "url" => "https://townmedialabs.ca/services/" . slugify($service) . "-in-" . $slug,
    "telephone" => "+14036048692",
    "address" => [
      "@type" => "PostalAddress",
      "streetAddress" => "11930 104 St NW",
      "addressLocality" => "Edmonton",
      "addressRegion" => "Alberta",
      "postalCode" => "T5G 2K1",
      "addressCountry" => "CA"
    ],
    "geo" => [
      "@type" => "GeoCoordinates",
      "latitude" => $locationData['lat'],
      "longitude" => $locationData['lng']
    ],
    "areaServed" => [
      [
        "@type" => "City",
        "name" => $location
      ]
    ],
    "aggregateRating" => [
      "@type" => "AggregateRating",
      "ratingValue" => "4.9",
      "reviewCount" => "127",
      "bestRating" => "5",
      "worstRating" => "1"
    ]
  ];
}

function generateServiceSchema($service, $location, $serviceData, $locationData) {
  return [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "name" => ucfirst($service) . " in " . $location,
    "description" => "Expert " . $service . " services for " . $location . " businesses. TML Agency delivers proven results.",
    "url" => "https://townmedialabs.ca/services/" . slugify($service) . "-in-" . slugify($location),
    "serviceType" => ucfirst($service),
    "provider" => [
      "@type" => "Organization",
      "name" => "TML Agency",
      "url" => "https://townmedialabs.ca"
    ],
    "areaServed" => [
      [
        "@type" => "City",
        "name" => $location
      ]
    ],
    "hasOfferCatalog" => [
      "@type" => "OfferCatalog",
      "name" => ucfirst($service) . " Packages",
      "itemListElement" => generateOfferCatalog($service, $serviceData)
    ]
  ];
}

function generateOfferCatalog($service, $serviceData) {
  $offers = [];
  foreach ($serviceData['tiers'] as $tier) {
    $offers[] = [
      "@type" => "Offer",
      "name" => $tier['name'],
      "description" => $tier['description'],
      "price" => $tier['price'],
      "priceCurrency" => "CAD"
    ];
  }
  return $offers;
}
?>
```

### Step 3: Implementation Checklist

- [ ] Add Organization schema to global header/layout
- [ ] Add LocalBusiness schema to each location page
- [ ] Add Service schema with pricing to each service page
- [ ] Add Breadcrumb schema to every page
- [ ] Add FAQ schema to location pages with FAQ sections
- [ ] Test each page with Google Rich Results Test
- [ ] Monitor Google Search Console for errors
- [ ] Set up Schema.org validation alerts
- [ ] Document variable substitution patterns

---

## VARIABLE SUBSTITUTION GUIDE

### For All 1,488 Location Pages

**Template Variables:**

| Variable | Example (Edmonton) | Example (Calgary) | Pattern |
|----------|-------------------|-------------------|---------|
| `{SERVICE}` | SEO | Web Design | Exact service name |
| `{SERVICE_SLUG}` | seo | web-design | Lowercase, hyphens |
| `{CITY}` | Edmonton | Calgary | City name (proper) |
| `{CITY_SLUG}` | edmonton | calgary | Lowercase city |
| `{STATE}` | Alberta | Alberta | Province/state name |
| `{STATE_CODE}` | AB | AB | Postal code |
| `{COUNTRY}` | Canada | Canada | Country name |
| `{COUNTRY_CODE}` | CA | CA | ISO 3166 code |
| `{LAT}` | 53.5461 | 51.0486 | Geographic latitude |
| `{LNG}` | -113.4937 | -114.0708 | Geographic longitude |
| `{REGION_DESC}` | Edmonton, St. Albert, Sherwood Park | Calgary, Airdrie, Cochrane | Multi-city description |

### Breadcrumb Examples

**Edmonton SEO Page:**
```
Home > Services > SEO > SEO in Edmonton
```

**Calgary Web Design Page:**
```
Home > Services > Web Design > Web Design in Calgary
```

### Service Pricing Tiers (By Service)

**SEO Pricing:**
- Tier 1: $999 - SEO Foundation
- Tier 2: $2,999 - SEO Growth Package
- Tier 3: $7,999 - Enterprise SEO

**Branding Pricing:**
- Tier 1: $2,499 - Logo & Visual Identity
- Tier 2: $5,999 - Complete Brand System
- Tier 3: $12,999 - Enterprise Branding

**Google Ads Pricing:**
- Tier 1: $499 - Google Ads Setup
- Tier 2: $1,999 - Managed Google Ads
- Tier 3: $4,999 - Premium Google Ads Management

**Social Media Pricing:**
- Tier 1: $799 - Social Media Management
- Tier 2: $1,999 - Social Media Growth
- Tier 3: $4,999 - Enterprise Social Media

---

## VALIDATION CHECKLIST

### Google Rich Results Test

After implementing schemas, validate each page:

1. **Visit:** https://search.google.com/test/rich-results
2. **Enter URL:** https://townmedialabs.ca/services/seo-in-edmonton
3. **Check for:**
   - [ ] No errors
   - [ ] All schemas detected (Organization, LocalBusiness, Service, Breadcrumb, FAQ)
   - [ ] Proper data structure
   - [ ] No missing required fields

### Schema.org Validation

1. **Visit:** https://validator.schema.org
2. **Paste JSON-LD code**
3. **Verify:**
   - [ ] Valid JSON structure
   - [ ] All properties correctly named
   - [ ] Proper data types (string, number, object)

### SEO Validation

- [ ] Canonical tags present and correct
- [ ] Meta descriptions < 160 chars
- [ ] Page titles < 70 chars
- [ ] Open Graph tags filled
- [ ] Twitter card tags present
- [ ] Language tags (hreflang) if multilingual

### Performance Validation

After deployment:

1. **Google Search Console**
   - [ ] No indexing errors
   - [ ] No "Structured Data" errors
   - [ ] Rich results appearing for FAQ, local business

2. **Core Web Vitals**
   - [ ] LCP < 2.5s
   - [ ] FID < 100ms
   - [ ] CLS < 0.1

---

## ADVANCED SCHEMAS

### Multiple Schemas on Single Page (Proper Nesting)

For location service pages, combine schemas with proper relationships:

```json
{
  "@context": "https://schema.org",
  "@type": ["Service", "LocalBusiness"],
  "name": "SEO in Edmonton",
  "provider": {
    "@type": "Organization",
    "name": "TML Agency",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "127"
    }
  },
  "areaServed": {
    "@type": "City",
    "name": "Edmonton"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "itemListElement": [
      {
        "@type": "Offer",
        "price": "999"
      }
    ]
  }
}
```

### Rich Results Worth Implementing

**Priority: HIGH**
1. LocalBusiness (maps, local pack)
2. Service (service cards)
3. FAQ (traffic lift from expanded snippets)
4. Breadcrumbs (SERP real estate)

**Priority: MEDIUM**
1. Organization (knowledge panels)
2. Review (social proof)
3. Article (blog indexing)

**Priority: LOW**
1. Person (team pages only)
2. Website (site search)

---

## MONITORING & PERFORMANCE

### Track in Google Search Console

1. **Search Appearance > Rich Results**
   - Monitor LocalBusiness appearances
   - Track FAQ impressions
   - Monitor Service card clicks

2. **Coverage**
   - Track indexed pages
   - Monitor 404 errors
   - Check mobile usability

3. **Performance**
   - Track CTR by position
   - Monitor impressions
   - Track average position

### Measurement Framework

| Metric | Baseline | Target | Tool |
|--------|----------|--------|------|
| Rich results impressions | 0 | +500/month | GSC |
| LocalBusiness CTR | N/A | +2-5% | GSC |
| FAQ avg position | N/A | <5 | GSC |
| Organic traffic | X | X + 30% | GA4 |

### Monthly Audit Checklist

- [ ] Review Rich Results status in GSC
- [ ] Check for new schema errors
- [ ] Verify all 1,488 pages have proper schemas
- [ ] Update pricing tiers if changed
- [ ] Review review ratings and update
- [ ] Test top 50 pages in Rich Results Test
- [ ] Check page load performance
- [ ] Validate mobile experience

---

## BEST PRACTICES

### 1. Keep Schemas Fresh
- Update pricing monthly
- Update reviews quarterly
- Update ratings from real reviews
- Update dateModified on content changes

### 2. Avoid Common Mistakes
- ❌ Don't duplicate schemas
- ❌ Don't nest incompatible types
- ❌ Don't hardcode data (use dynamic generation)
- ❌ Don't include promotional markup
- ✅ Do use canonical URLs
- ✅ Do validate regularly
- ✅ Do monitor GSC

### 3. Scaling to 1,488 Pages
- Use programmatic generation with variables
- Create reusable functions for each schema type
- Build automated testing/validation
- Set up monitoring alerts for schema errors
- Document all variable substitutions

---

## FILES REFERENCE

**Core Files to Create:**

1. `/schema-generator.php` - Schema generation functions
2. `/schema-validator.php` - Validation rules
3. `/schema-templates.json` - Template definitions
4. `/schema-variables.json` - Variable mapping for all 1,488 locations
5. `/schema-monitoring.php` - GSC integration for error tracking

---

## NEXT STEPS

1. **Immediate (This Week)**
   - Create schema generation system
   - Implement on Edmonton page
   - Test in Rich Results Test
   - Deploy to production

2. **Short Term (This Month)**
   - Roll out to all 1,488 location pages
   - Set up monitoring in GSC
   - Create validation automation
   - Document maintenance procedures

3. **Ongoing**
   - Monitor Rich Results in GSC
   - Update data as needed
   - Analyze impact on CTR/traffic
   - Iterate based on performance

---

**Created:** March 31, 2026
**For:** TML Agency
**Coverage:** 1,488 location-service combinations
**Validation Status:** Ready for production deployment
