/**
 * Auto-content generation for location x service pages.
 *
 * Produces a unique CityServiceContent object by intelligently combining
 * city data (LocationInfo) with service data (ServicePageData).
 *
 * Every choice is **deterministic** — a simple hash of the composite key
 * selects the pattern, so the same page always renders the same content.
 */

import type { LocationInfo } from "./locations";
import { locations } from "./locations";
import type { ServicePageData } from "./servicePages";
import type { CityServiceContent } from "./cityServiceContent";

// ─── Deterministic hash ────────────────────────────────────────────────────────

function simpleHash(str: string): number {
  let hash = 0;
  for (let i = 0; i < str.length; i++) {
    hash = ((hash << 5) - hash) + str.charCodeAt(i);
    hash |= 0;
  }
  return Math.abs(hash);
}

/** Pick one element from an array using a deterministic hash. */
function pick<T>(arr: T[], seed: number): T {
  return arr[seed % arr.length];
}

/** Capitalise the first letter of every word. */
function titleCase(str: string): string {
  return str.replace(/\b\w/g, (c) => c.toUpperCase());
}

// ─── H1 patterns ───────────────────────────────────────────────────────────────

function generateH1(
  serviceName: string,
  cityName: string,
  state: string,
  seed: number,
): string {
  const patterns = [
    `Top ${serviceName} Agency for ${cityName} Businesses`,
    `Professional ${serviceName} Services in ${cityName}`,
    `${cityName}'s Premier ${serviceName} Partner`,
    `Expert ${serviceName} Solutions for ${cityName}`,
    `Trusted ${serviceName} Agency in ${cityName}, ${state}`,
    `${serviceName} That Drives Growth in ${cityName}`,
    `Results-Driven ${serviceName} for ${cityName} Brands`,
    `Leading ${serviceName} Agency in ${cityName}`,
    `${cityName}'s Top-Rated ${serviceName} Experts`,
    `Award-Winning ${serviceName} in ${cityName}`,
    `Elevate Your Brand with ${serviceName} in ${cityName}`,
    `Strategic ${serviceName} for ${cityName} Companies`,
    `Full-Service ${serviceName} Agency in ${cityName}`,
    `Growth-Focused ${serviceName} in ${cityName}`,
  ];
  return pick(patterns, seed);
}

// ─── Tagline patterns ──────────────────────────────────────────────────────────

function generateTagline(
  serviceName: string,
  location: LocationInfo,
  seed: number,
): string {
  const topIndustry = titleCase(location.industries[0] || "business");
  const secondIndustry = titleCase(location.industries[1] || "technology");
  const lm0 = location.landmarks[0] || location.name;
  const lm1 = location.landmarks[1] || location.state;

  const patterns = [
    `Strategic ${serviceName.toLowerCase()} for ${location.name}'s ${topIndustry} sector and beyond.`,
    `Helping ${location.name} businesses dominate their digital presence.`,
    `From ${lm0} to ${lm1}, we power ${location.name}'s growth.`,
    `${serviceName} strategies built for ${location.name}'s competitive market.`,
    `Your ${location.name} business deserves ${serviceName.toLowerCase()} that delivers results.`,
    `Unlock growth in ${location.name}'s ${topIndustry} and ${secondIndustry} markets.`,
    `${location.name}'s businesses trust us for measurable ${serviceName.toLowerCase()} results.`,
    `Data-driven ${serviceName.toLowerCase()} that moves the needle for ${location.name} brands.`,
    `Purpose-built ${serviceName.toLowerCase()} for ${location.name}'s dynamic economy.`,
    `Turning ${location.name} businesses into industry leaders through ${serviceName.toLowerCase()}.`,
    `Smart ${serviceName.toLowerCase()} solutions for ${location.name}'s ambitious brands.`,
    `${serviceName} that speaks to ${location.name}'s audience.`,
  ];
  return pick(patterns, seed);
}

// ─── Hero badge patterns ───────────────────────────────────────────────────────

function generateHeroBadge(
  serviceName: string,
  location: LocationInfo,
  seed: number,
): string {
  const patterns = [
    `Trusted in ${location.name}`,
    `${location.name}'s ${serviceName} Experts`,
    `Serving ${location.region}`,
    `Proven Results in ${location.name}`,
    `${location.name} Growth Partner`,
    `${location.name}'s Trusted Agency`,
    `${serviceName} Leaders in ${location.name}`,
    `Serving ${location.name} Businesses`,
  ];
  return pick(patterns, seed);
}

// ─── Hero description ──────────────────────────────────────────────────────────

function generateHeroDescription(
  serviceName: string,
  location: LocationInfo,
  serviceData: ServicePageData,
  seed: number,
): string {
  const industries3 = location.industries.slice(0, 3).join(", ");
  const snippet = location.uniqueContent?.[0]
    ? location.uniqueContent[0].split(". ").slice(0, 1).join(". ") + "."
    : "";

  const patterns = [
    `TML is a leading ${serviceName.toLowerCase()} agency serving businesses across ${location.region}. ${snippet || `${location.name} is ${location.description}, and its ${industries3} sectors demand marketing that delivers measurable results.`} We bring ${serviceName.toLowerCase()} expertise that drives real growth for ${location.name} brands.`,
    `Looking for expert ${serviceName.toLowerCase()} in ${location.name}? TML delivers proven results for businesses across ${location.region}. ${snippet || `With deep experience in ${industries3}, we craft strategies tailored to ${location.name}'s unique market dynamics.`} Partner with us and see the difference data-driven ${serviceName.toLowerCase()} makes.`,
    `${location.name} businesses choose TML for ${serviceName.toLowerCase()} because we understand the local market. ${snippet || `From ${location.landmarks[0] || location.name} to the wider ${location.state} region, our team delivers ${serviceName.toLowerCase()} strategies built on real market insight.`} We combine national-level expertise with ${location.name}-specific knowledge to deliver results.`,
  ];
  return pick(patterns, seed);
}

// ─── Meta title & description ──────────────────────────────────────────────────

function generateMetaTitle(serviceName: string, cityName: string): string {
  const base = `${serviceName} in ${cityName} | TML Agency`;
  return base.length <= 60 ? base : `${serviceName} ${cityName} | TML Agency`;
}

function generateMetaDescription(
  serviceName: string,
  location: LocationInfo,
  seed: number,
): string {
  const patterns = [
    `Professional ${serviceName.toLowerCase()} services in ${location.name}. TML Agency delivers results-driven strategies for ${location.industries.slice(0, 2).join(" & ")} businesses. Get a free consultation.`,
    `TML is ${location.name}'s trusted ${serviceName.toLowerCase()} agency. We help businesses across ${location.state} grow with data-driven strategies. Contact us today.`,
    `Expert ${serviceName.toLowerCase()} in ${location.name}, ${location.state}. TML Agency combines local market knowledge with proven expertise to drive growth. Free audit available.`,
    `Looking for ${serviceName.toLowerCase()} in ${location.name}? TML Agency offers strategic solutions for ${location.name} businesses. 500+ brands served. Get started today.`,
  ];
  const result = pick(patterns, seed);
  return result.length <= 160 ? result : result.slice(0, 157) + "...";
}

// ─── Keywords ──────────────────────────────────────────────────────────────────

function generateKeywords(
  serviceName: string,
  serviceSlug: string,
  location: LocationInfo,
): string[] {
  const sn = serviceName.toLowerCase();
  return [
    `${sn} ${location.name.toLowerCase()}`,
    `${sn} agency ${location.name.toLowerCase()}`,
    `${sn} services ${location.name.toLowerCase()}`,
    `${sn} company ${location.name.toLowerCase()}`,
    `best ${sn} ${location.name.toLowerCase()}`,
    `${serviceSlug} ${location.name.toLowerCase()}`,
    `${sn} ${location.state.toLowerCase()}`,
    `${sn} ${location.country.toLowerCase()}`,
    `${location.name.toLowerCase()} ${sn} agency`,
  ];
}

// ─── Why Choose (4 items) ──────────────────────────────────────────────────────

function generateWhyChoose(
  serviceName: string,
  location: LocationInfo,
  seed: number,
): { title: string; description: string }[] {
  const landmarks = location.landmarks;
  const industries = location.industries;
  const lmStr = landmarks.length >= 2
    ? `${landmarks[0]} to ${landmarks[1]}`
    : landmarks[0] || location.name;

  const industryStr = industries.slice(0, 3).map(titleCase).join(", ");

  // Multiple options for each slot, picked by seed
  const slot1Options = [
    { title: `Deep ${location.name} Market Knowledge`, description: `From ${lmStr}, we understand ${location.name}'s diverse business landscape. Our strategies are tailored to the local market dynamics that drive results in ${location.state}.` },
    { title: `Local Expertise in ${location.name}`, description: `We know ${location.name} inside and out — from the commercial hubs near ${landmarks[0] || location.name} to the emerging business districts. This local intelligence shapes every campaign we run.` },
    { title: `Rooted in ${location.name}'s Market`, description: `Our team studies the ${location.name} market continuously. From ${lmStr} and beyond, we build strategies grounded in how ${location.name} businesses actually operate and compete.` },
  ];

  const slot2Options = [
    { title: "Industry-Specific Strategies", description: `We specialise in ${location.name}'s core sectors: ${industryStr}. Each industry demands a unique ${serviceName.toLowerCase()} approach, and we bring that expertise.` },
    { title: `Built for ${location.name}'s Industries`, description: `${location.name}'s ${industryStr} sectors each have different audiences and buying cycles. We craft ${serviceName.toLowerCase()} campaigns that speak directly to each segment.` },
    { title: "Sector-Driven Approach", description: `Whether you are in ${industryStr} or another ${location.name} industry, our team tailors every ${serviceName.toLowerCase()} strategy to your sector's unique challenges and opportunities.` },
  ];

  const slot3Options = [
    { title: `${location.region} Coverage`, description: `We serve businesses across ${location.region}, giving you comprehensive market coverage while maintaining the personal attention of a dedicated agency partner.` },
    { title: "Regional Reach, Personal Touch", description: `TML covers ${location.region} with strategies designed for each micro-market. You get national-level expertise with a local partner who understands your region.` },
    { title: `Across ${location.state} and Beyond`, description: `Our ${serviceName.toLowerCase()} campaigns reach audiences across ${location.region}. Whether you serve a single city or the entire region, we scale your strategy accordingly.` },
  ];

  const slot4Options = [
    { title: "Data-Driven Results", description: `Every ${serviceName.toLowerCase()} decision we make is backed by data. Transparent reporting, real KPIs, and continuous optimisation ensure your investment delivers measurable returns.` },
    { title: "Proven Track Record", description: `500+ businesses trust TML for ${serviceName.toLowerCase()}. Our results-first approach means we focus on metrics that matter — revenue, leads, and growth for your business.` },
    { title: "Strategy-First Methodology", description: `We do not start executing until we have a strategy built on research, competitor analysis, and clear KPIs. This ${serviceName.toLowerCase()} approach consistently outperforms reactive tactics.` },
  ];

  return [
    pick(slot1Options, seed),
    pick(slot2Options, seed + 1),
    pick(slot3Options, seed + 2),
    pick(slot4Options, seed + 3),
  ];
}

// ─── Process Steps (4 steps) ───────────────────────────────────────────────────

function generateProcessSteps(
  serviceName: string,
  location: LocationInfo,
  serviceData: ServicePageData,
): { number: string; title: string; description: string }[] {
  // Use the service's actual process data as the base, adapted with city context
  const steps = serviceData.process;
  if (steps.length >= 4) {
    return [
      { number: "01", title: steps[0].title, description: `${steps[0].description.replace(/\.$/, "")} — with a specific focus on the ${location.name} market and your competitive landscape in ${location.state}.` },
      { number: "02", title: steps[1].title, description: `${steps[1].description.replace(/\.$/, "")} — customised for ${location.name}'s ${location.industries.slice(0, 2).join(" and ")} sectors and local audience behaviour.` },
      { number: "03", title: steps[2].title, description: `${steps[2].description.replace(/\.$/, "")} — our team delivers with the precision and quality that ${location.name} businesses demand.` },
      { number: "04", title: steps[3].title, description: `${steps[3].description.replace(/\.$/, "")} — tracking performance specific to ${location.name} and ${location.region} to ensure continuous improvement.` },
    ];
  }
  // Fallback if process has fewer than 4 steps
  return [
    { number: "01", title: "Discovery", description: `We start by understanding your ${location.name} business, audience, and goals to build a solid foundation.` },
    { number: "02", title: "Strategy", description: `Our team develops a ${serviceName.toLowerCase()} strategy tailored to ${location.name}'s market dynamics and your industry.` },
    { number: "03", title: "Execution", description: `We bring the strategy to life with expert execution — delivering results that ${location.name} businesses trust.` },
    { number: "04", title: "Optimisation", description: `Continuous monitoring and refinement ensure your ${serviceName.toLowerCase()} performance keeps improving in ${location.name}.` },
  ];
}

// ─── Local Content (3 paragraphs) ──────────────────────────────────────────────

function generateLocalContent(
  serviceName: string,
  location: LocationInfo,
  seed: number,
): string[] {
  // If uniqueContent exists, use those 3 paragraphs (they are already unique per city)
  if (location.uniqueContent && location.uniqueContent.length >= 3) {
    return location.uniqueContent.slice(0, 3);
  }

  const industries3 = location.industries.slice(0, 3).join(", ");
  const industries4 = location.industries.slice(0, 4).join(", ");
  const lm0 = location.landmarks[0] || location.name;
  const lm1 = location.landmarks[1] || location.state;
  const sn = serviceName.toLowerCase();

  // Paragraph 1: City's market
  const p1Options = [
    `${location.name} is ${location.description}, and its economy is powered by ${industries4} sectors. Businesses across ${location.region} are increasingly investing in digital strategies to stay competitive. TML helps ${location.name} businesses cut through the noise with ${sn} that delivers measurable results.`,
    `The ${location.name} market presents unique opportunities for businesses willing to invest in professional ${sn}. As ${location.description}, the city's ${industries3} sectors are growing rapidly, and digital-first strategies are no longer optional — they are essential for any business that wants to compete.`,
    `From the commercial hubs near ${lm0} to the business districts around ${lm1}, ${location.name} is a dynamic market with fierce competition. Businesses here need ${sn} that does more than look good on paper — they need strategies that produce real, trackable results in their local market.`,
  ];

  // Paragraph 2: Industries + how service helps
  const p2Options = [
    `TML has deep experience serving ${location.name}'s ${industries3} businesses. Each of these industries has distinct audience behaviours, competitive landscapes, and marketing cycles. Our ${sn} strategies are built around these realities — not generic templates — which is why ${location.name} businesses see consistent, measurable growth when they work with us.`,
    `Whether you are in ${industries3} or any other ${location.name} industry, our ${sn} approach is grounded in data and local market intelligence. We study your competitors, map your audience's behaviour, and build campaigns that position your brand exactly where it needs to be in the ${location.state} market.`,
    `${location.name}'s ${industries4} sectors each demand a different ${sn} playbook. A ${titleCase(location.industries[0] || "business")} company near ${lm0} has different needs than a ${titleCase(location.industries[2] || "technology")} startup across town. TML builds custom strategies for each, drawing on our cross-industry experience.`,
  ];

  // Paragraph 3: TML's approach for the region
  const p3Options = [
    `TML serves businesses across ${location.region}, combining the strategic thinking of a large agency with the agility and personal attention of a boutique firm. Our team is available for video calls, strategy sessions, and ongoing collaboration — ensuring your ${sn} campaigns are always aligned with your ${location.name} business goals.`,
    `Our approach for ${location.name} clients is simple: understand the market, build a data-backed strategy, execute with precision, and optimise relentlessly. We provide transparent reporting on every metric that matters, so you always know exactly how your ${sn} investment is performing.`,
    `As a ${sn} partner for ${location.name} businesses, TML brings both expertise and accountability. We set clear KPIs from day one, deliver regular performance updates, and continuously refine your campaigns to ensure maximum ROI in the ${location.state} market.`,
  ];

  return [
    pick(p1Options, seed),
    pick(p2Options, seed + 1),
    pick(p3Options, seed + 2),
  ];
}

// ─── Market Insight ────────────────────────────────────────────────────────────

interface MarketInsight {
  stat: string;
  headline: string;
  body: string;
}

function generateMarketInsight(
  serviceSlug: string,
  location: LocationInfo,
  seed: number,
): MarketInsight {
  const insightMap: Record<string, MarketInsight[]> = {
    seo: [
      { stat: "73%", headline: "of local searches lead to a visit within 24 hours", body: `For ${location.name} businesses, ranking on the first page of Google is not a luxury — it is a necessity. Local search drives foot traffic, phone calls, and online conversions at a rate unmatched by any other channel. TML's SEO strategies are designed to capture this intent-rich traffic for your ${location.name} business.` },
      { stat: "68%", headline: "of online experiences begin with a search engine", body: `Businesses in ${location.name} that invest in SEO capture the majority of digital traffic before competitors even enter the picture. Our data-driven approach ensures your website appears when ${location.name} customers are actively searching for your products or services.` },
    ],
    "google-ads": [
      { stat: "8:1", headline: "average ROI for well-managed Google Ads campaigns", body: `${location.name} businesses using Google Ads with expert management see returns of up to 8x their ad spend. TML optimises every element — keywords, bids, ad copy, and landing pages — to ensure your ${location.name} campaigns deliver maximum ROI.` },
      { stat: "4.2x", headline: "average ROAS our clients achieve across campaigns", body: `Our Google Ads management consistently delivers above-average returns for businesses in ${location.name}. By combining local keyword intelligence with advanced bidding strategies, we turn your ad budget into predictable revenue growth.` },
    ],
    branding: [
      { stat: "23%", headline: "revenue increase from consistent brand presentation", body: `Businesses in ${location.name} that invest in professional branding see measurable revenue growth through improved recognition, trust, and customer loyalty. TML builds brand systems that maintain consistency across every touchpoint in the ${location.state} market.` },
      { stat: "80%", headline: "of consumers say brand recognition drives purchase decisions", body: `In ${location.name}'s competitive market, a professionally crafted brand identity is your strongest differentiator. TML creates brands that resonate with your ${location.name} audience and build the trust that converts browsers into buyers.` },
    ],
    "website-development": [
      { stat: "88%", headline: "of users won't return to a website after a bad experience", body: `A fast, well-designed website is the foundation of every successful digital strategy in ${location.name}. TML builds websites that load in under 2 seconds, look stunning on every device, and convert visitors into customers for ${location.name} businesses.` },
      { stat: "53%", headline: "of mobile visitors abandon sites that take over 3 seconds to load", body: `Speed matters for ${location.name} businesses. Our websites are engineered for performance — fast load times, excellent Core Web Vitals, and mobile-first design ensure your ${location.name} audience stays engaged and converts.` },
    ],
    "social-media": [
      { stat: "71%", headline: "of consumers who have a positive social media experience recommend the brand", body: `Social media is where ${location.name} businesses build relationships with their audience. TML creates social strategies that drive engagement, build community, and convert followers into loyal customers across ${location.region}.` },
      { stat: "54%", headline: "of social browsers use social media to research products", body: `${location.name} consumers are actively researching products on social platforms before making purchase decisions. Our social media management ensures your brand shows up, stands out, and converts in this critical discovery phase.` },
    ],
    "ai-influencer-management": [
      { stat: "11x", headline: "higher ROI from AI influencer campaigns vs traditional ads", body: `AI influencers are reshaping digital marketing in ${location.name} and globally. TML creates and manages AI-powered virtual influencers that deliver consistent, brand-safe engagement at a fraction of the cost of traditional influencer partnerships.` },
      { stat: "3x", headline: "higher engagement rates for AI-generated influencer content", body: `${location.name} brands adopting AI influencer marketing are seeing engagement rates that far exceed traditional content. Our team creates hyper-realistic AI personas that resonate with your target audience and drive measurable results.` },
    ],
    "lead-generation": [
      { stat: "61%", headline: "of marketers say lead generation is their top challenge", body: `For ${location.name} businesses, generating qualified leads consistently is the difference between growth and stagnation. TML builds multi-channel lead generation systems that deliver a steady pipeline of prospects ready to buy.` },
      { stat: "50%", headline: "more sales-ready leads from nurtured prospects vs non-nurtured", body: `Our lead generation campaigns for ${location.name} businesses do not just capture contacts — they nurture them through automated sequences until they are ready to buy. This approach delivers higher-quality leads that your sales team loves.` },
    ],
    "music-release": [
      { stat: "80%", headline: "of music discovery now happens on streaming platforms", body: `For artists and labels in ${location.name}, a strategic release campaign across Spotify, Apple Music, and YouTube is essential. TML handles distribution, playlist pitching, and promotional campaigns that maximise streams and grow your audience.` },
      { stat: "40%", headline: "increase in streams from coordinated release campaigns", body: `${location.name} artists who work with TML see significantly higher stream counts and audience growth. Our release strategies combine pre-save campaigns, playlist pitching, social promotion, and targeted ads for maximum impact.` },
    ],
    "video-editing": [
      { stat: "86%", headline: "of businesses use video as a marketing tool", body: `Video content drives more engagement than any other format for ${location.name} businesses. TML's professional video editing transforms your raw footage into polished, scroll-stopping content that connects with your audience and drives action.` },
      { stat: "2x", headline: "more engagement on social posts with video vs static images", body: `${location.name} businesses using professional video content see dramatically higher engagement across every platform. Our editing team delivers broadcast-quality results on timelines that match the pace of digital marketing.` },
    ],
    "branding-packaging": [
      { stat: "72%", headline: "of consumers say packaging design influences their purchase decision", body: `For ${location.name} product brands, packaging is often the first physical interaction a customer has with your product. TML designs packaging that stands out on shelves, communicates your brand story, and drives purchase decisions.` },
      { stat: "30%", headline: "increase in sales from packaging redesigns", body: `${location.name} brands that invest in professional packaging design see measurable sales lifts. Our packaging team combines strategic brand thinking with shelf-ready design to ensure your products compete and win at the point of sale.` },
    ],
    "graphic-design": [
      { stat: "94%", headline: "of first impressions are design-related", body: `For ${location.name} businesses, professional graphic design is not a luxury — it is a business necessity. TML creates visuals that communicate your brand story, engage your audience, and drive the actions that grow your business.` },
      { stat: "10K+", headline: "designs delivered for brands across India and beyond", body: `TML's graphic design team has produced over 10,000 designs for businesses across ${location.state} and internationally. From social media creatives to print materials, we deliver quality and consistency that ${location.name} businesses depend on.` },
    ],
  };

  const insights = insightMap[serviceSlug] || insightMap["branding"]!;
  return pick(insights, seed);
}

// ─── FAQs (4 items) ────────────────────────────────────────────────────────────

function generateFaqs(
  serviceName: string,
  serviceSlug: string,
  location: LocationInfo,
  seed: number,
): { q: string; a: string }[] {
  const sn = serviceName.toLowerCase();
  const industries3 = location.industries.slice(0, 3).join(", ");
  const lm0 = location.landmarks[0] || location.name;

  // Service-specific first FAQ about cost/timeline
  const costFaqMap: Record<string, { q: string; a: string }> = {
    seo: { q: `How much does SEO cost in ${location.name}?`, a: `SEO packages for ${location.name} businesses start from affordable monthly plans. Pricing depends on your competitive landscape, number of target keywords, and geographic scope. Contact us for a free SEO audit and custom quote tailored to your ${location.name} market.` },
    "google-ads": { q: `What budget do I need for Google Ads in ${location.name}?`, a: `The ideal Google Ads budget depends on your industry and competition in ${location.name}. We recommend starting with a budget that allows meaningful data collection, then scaling based on performance. We provide transparent cost projections before any campaign launches.` },
    branding: { q: `How much does branding cost in ${location.name}?`, a: `Branding projects for ${location.name} businesses range from basic logo design to comprehensive brand identity systems. We offer packages at multiple price points and can recommend the right scope based on your business goals and competitive landscape in ${location.state}.` },
    "website-development": { q: `How much does a website cost in ${location.name}?`, a: `Website costs depend on scope, functionality, and design complexity. We build everything from simple business websites to complex e-commerce platforms for ${location.name} businesses. Contact us for a detailed quote based on your specific requirements.` },
    "social-media": { q: `How much does social media management cost in ${location.name}?`, a: `Social media packages for ${location.name} businesses are structured based on the number of platforms, posting frequency, and campaign scope. We offer flexible monthly plans designed to fit your budget while delivering meaningful engagement and growth.` },
    "ai-influencer-management": { q: `What does AI influencer management cost in ${location.name}?`, a: `AI influencer campaigns are priced based on the number of platforms, content volume, and campaign duration. We offer ${location.name} businesses transparent pricing with clear deliverables and ROI projections before any engagement begins.` },
    "lead-generation": { q: `What ROI can I expect from lead generation in ${location.name}?`, a: `ROI varies by industry and average deal value, but our ${location.name} clients typically see positive returns within the first 2-3 months. We set clear cost-per-lead targets during onboarding and optimise continuously to improve performance.` },
    "music-release": { q: `How much does a music release campaign cost in ${location.name}?`, a: `Music release packages depend on the scope — from basic distribution to full promotional campaigns with playlist pitching, social media promotion, and paid ads. Contact us for a custom plan tailored to your release goals and budget.` },
    "video-editing": { q: `What does video editing cost in ${location.name}?`, a: `Video editing is priced per project based on length, complexity, and required effects. We offer ${location.name} businesses both per-project and monthly retainer options. Fast turnaround is available for time-sensitive content.` },
    "branding-packaging": { q: `How much does packaging design cost in ${location.name}?`, a: `Packaging design costs depend on the number of products, structural complexity, and design revisions. We provide detailed quotes for ${location.name} businesses after understanding your product range and retail requirements.` },
    "graphic-design": { q: `What does graphic design cost in ${location.name}?`, a: `We offer ${location.name} businesses both per-project pricing and monthly design retainers. Retainer plans provide predictable costs and fast turnaround, making professional design accessible for businesses of all sizes.` },
  };

  const costFaq = costFaqMap[serviceSlug] || costFaqMap["branding"]!;

  return [
    costFaq,
    {
      q: `Why choose TML for ${sn} in ${location.name}?`,
      a: `TML combines deep ${sn} expertise with genuine understanding of the ${location.name} market. We have delivered results for 500+ businesses and bring specific experience in ${industries3} — the sectors that drive ${location.name}'s economy. Our transparent reporting and results-first approach set us apart from generic agencies.`,
    },
    {
      q: `Do you serve businesses across ${location.region}?`,
      a: `Yes. While we have deep expertise in the ${location.name} market specifically, we serve businesses throughout ${location.region}. Whether you are based near ${lm0} or anywhere in ${location.state}, our team delivers the same level of strategic insight and execution quality.`,
    },
    {
      q: `How quickly will I see results from ${sn} in ${location.name}?`,
      a: `Timelines depend on the specific ${sn} service. Paid campaigns can generate results within days, while organic strategies like SEO typically show meaningful impact in 3-6 months. We set realistic expectations during our initial consultation and provide regular progress updates so you can track performance.`,
    },
  ];
}

// ─── Cross-links ───────────────────────────────────────────────────────────────

function generateCrossLinks(
  location: LocationInfo,
): { label: string; slug: string }[] {
  const sameCountry = Object.values(locations).filter(
    (loc) => loc.country === location.country && loc.slug !== location.slug,
  );

  // Pick up to 5 from same country (prioritise those with uniqueContent)
  const withContent = sameCountry.filter((l) => l.uniqueContent && l.uniqueContent.length > 0);
  const withoutContent = sameCountry.filter((l) => !l.uniqueContent || l.uniqueContent.length === 0);

  const samePicks = [...withContent.slice(0, 4), ...withoutContent.slice(0, 2)].slice(0, 5);

  // Pick up to 3 from other countries
  const otherCountry = Object.values(locations).filter(
    (loc) => loc.country !== location.country,
  );
  const otherWithContent = otherCountry.filter((l) => l.uniqueContent && l.uniqueContent.length > 0);
  const otherPicks = otherWithContent.slice(0, 3);

  return [...samePicks, ...otherPicks].map((loc) => ({
    label: loc.name,
    slug: loc.slug,
  }));
}

// ─── Industries (10-12 items) ──────────────────────────────────────────────────

function generateIndustries(
  location: LocationInfo,
  serviceSlug: string,
): string[] {
  const base = [...location.industries.map(titleCase)];

  // Service-relevant additions
  const serviceIndustries: Record<string, string[]> = {
    seo: ["E-commerce", "SaaS", "Professional Services", "Legal", "Healthcare", "Education", "Real Estate", "Finance"],
    "google-ads": ["E-commerce", "SaaS", "Lead Generation", "Professional Services", "Healthcare", "Real Estate", "Education", "Automotive"],
    branding: ["FMCG", "Luxury & Retail", "Hospitality", "Healthcare", "Real Estate", "Fashion", "Food & Beverage", "Technology"],
    "website-development": ["E-commerce", "SaaS", "Healthcare", "Real Estate", "Education", "Hospitality", "Finance", "Professional Services"],
    "social-media": ["Fashion", "Food & Beverage", "Hospitality", "Retail", "Fitness", "Beauty", "Entertainment", "E-commerce"],
    "ai-influencer-management": ["Fashion", "Beauty", "Lifestyle", "Technology", "Entertainment", "Fitness", "Travel", "E-commerce"],
    "lead-generation": ["Real Estate", "SaaS", "Education", "Healthcare", "Finance", "Legal", "Insurance", "Professional Services"],
    "music-release": ["Independent Artists", "Record Labels", "Film & Media", "Entertainment", "Events", "Content Creators", "Podcasting", "Advertising"],
    "video-editing": ["Advertising", "E-commerce", "Real Estate", "Education", "Entertainment", "Corporate", "Hospitality", "Events"],
    "branding-packaging": ["FMCG", "Food & Beverage", "Cosmetics", "Pharmaceuticals", "Agriculture", "Retail", "Luxury Goods", "Health & Wellness"],
    "graphic-design": ["Fashion", "Food & Beverage", "Retail", "Technology", "Healthcare", "Education", "Real Estate", "Events"],
  };

  const additions = serviceIndustries[serviceSlug] || serviceIndustries["branding"]!;

  // Combine, de-duplicate (case-insensitive)
  const seen = new Set(base.map((i) => i.toLowerCase()));
  for (const ind of additions) {
    if (!seen.has(ind.toLowerCase())) {
      base.push(ind);
      seen.add(ind.toLowerCase());
    }
    if (base.length >= 12) break;
  }

  // Ensure at least 10
  if (base.length < 10) {
    const fillers = ["Startups", "Manufacturing", "Logistics", "Government", "Non-Profit", "Media"];
    for (const f of fillers) {
      if (!seen.has(f.toLowerCase())) {
        base.push(f);
        seen.add(f.toLowerCase());
      }
      if (base.length >= 10) break;
    }
  }

  return base.slice(0, 12);
}

// ─── Main generator ────────────────────────────────────────────────────────────

export function generateAutoContent(
  location: LocationInfo,
  serviceSlug: string,
  serviceData: ServicePageData,
): CityServiceContent {
  const key = `${serviceSlug}:${location.slug}`;
  const seed = simpleHash(key);
  const serviceName = serviceData.title;
  const cityName = location.name;

  return {
    h1: generateH1(serviceName, cityName, location.state, seed),
    tagline: generateTagline(serviceName, location, seed + 100),
    heroBadge: generateHeroBadge(serviceName, location, seed + 200),
    heroDescription: generateHeroDescription(serviceName, location, serviceData, seed + 300),
    metaTitle: generateMetaTitle(serviceName, cityName),
    metaDescription: generateMetaDescription(serviceName, location, seed + 400),
    keywords: generateKeywords(serviceName, serviceSlug, location),
    whyChoose: generateWhyChoose(serviceName, location, seed + 500),
    processSteps: generateProcessSteps(serviceName, location, serviceData),
    localContent: generateLocalContent(serviceName, location, seed + 600),
    marketInsight: generateMarketInsight(serviceSlug, location, seed + 700),
    faqs: generateFaqs(serviceName, serviceSlug, location, seed + 800),
    crossLinks: generateCrossLinks(location),
    industries: generateIndustries(location, serviceSlug),
  };
}
