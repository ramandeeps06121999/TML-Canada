export interface ServiceFeature {
  title: string;
  description: string;
}

export interface ServiceProcess {
  step: string;
  title: string;
  description: string;
}

export interface ServiceFAQ {
  q: string;
  a: string;
}

export interface DeepContentSection {
  heading: string;
  paragraphs: string[];
}

export interface ServicePageData {
  slug: string;
  title: string;
  tagline: string;
  description: string;
  heroDescription: string;
  metaTitle: string;
  metaDescription: string;
  metaKeywords: string[];
  seoContent: string[];
  deepContent?: DeepContentSection[];
  pricingNote?: string;
  features: ServiceFeature[];
  process: ServiceProcess[];
  stats: { label: string; value: string }[];
  faqs: ServiceFAQ[];
  relatedServices: string[];
}

export const servicePages: Record<string, ServicePageData> = {
  branding: {
    slug: "branding",
    title: "Branding",
    tagline: "Build a brand that people remember.",
    description: "Strategic brand identity design that resonates with your audience and creates lasting impressions. Our branding experts in Chandigarh craft compelling visual identities, develop brand strategies, and build cohesive brand systems that help businesses stand out in competitive markets across India and beyond.",
    heroDescription: "We create powerful brand identities that tell your story, connect with your audience, and set you apart from competitors. From logo design to complete brand systems, we build brands that stand the test of time.",
    metaTitle: "Best Branding Services in Chandigarh | TML Agency",
    metaDescription: "Professional branding services including logo design, brand identity, and brand strategy. TML Agency in Chandigarh helps businesses build memorable brands that drive growth.",
    metaKeywords: ["branding agency Chandigarh", "logo design India", "brand identity design", "brand strategy services", "corporate branding", "visual identity design", "brand guidelines"],
    seoContent: [
      "A strong brand is the foundation of every successful business. At TML Agency in Chandigarh, our branding services go beyond logo design to encompass complete brand identity systems. We combine market research, competitor analysis, and creative excellence to develop brands that connect emotionally with your target audience and drive long-term business growth across India.",
      "Our brand strategy process starts with understanding your business vision, values, and goals. We then define your brand positioning, develop messaging frameworks, and create visual identity elements including logos, colour palettes, and typography systems. Every brand we build is designed to maintain consistency across digital platforms, print materials, and physical touchpoints.",
      "Whether you are a startup launching your first brand or an established company looking to refresh your identity, TML Agency delivers branding solutions tailored to your needs. Our portfolio includes work for businesses across FMCG, technology, hospitality, healthcare, and real estate sectors, making us one of the most trusted branding agencies in Chandigarh and North India.",
    ],
    deepContent: [
      {
        heading: "How Strategic Branding Drives Business Growth",
        paragraphs: [
          "Consistent brand presentation across all platforms increases revenue by up to 23%, according to Lucidpress research. This is not a vanity metric — it reflects the compounding effect of recognition, trust, and recall. When a customer encounters a consistent visual identity, tone of voice, and messaging framework across your website, social media, packaging, and sales collateral, they form a mental shortcut that lowers the friction to purchase. At TML Agency, every branding project we deliver is built to create that consistency from day one.",
          "Strategic branding also directly impacts your ability to command premium pricing. Brands with clearly defined positioning and a professional identity are perceived as more valuable, allowing them to charge 20–30% more than generic competitors in the same category. We have seen this play out across our client portfolio — from D2C skincare brands in Chandigarh to SaaS companies selling globally. The investment in a well-crafted brand identity pays for itself within the first year through improved conversion rates and customer lifetime value.",
          "Beyond revenue, strong branding reduces customer acquisition costs. A recognisable, trusted brand generates organic referrals, earns higher click-through rates on paid ads, and converts cold traffic more efficiently. Our branding clients across India, UAE, and North America consistently report a 15–40% reduction in cost per acquisition after a rebrand or brand refresh, because every marketing dollar works harder when the brand behind it is clear and compelling.",
        ],
      },
      {
        heading: "Our Branding Process: From Research to Launch",
        paragraphs: [
          "Every TML branding engagement begins with a two-week discovery phase. We conduct stakeholder interviews, customer surveys, competitor audits (typically analysing 8–12 direct competitors), and market positioning workshops. We use tools like Brandwatch for sentiment analysis and SEMrush for search demand mapping to ground our creative decisions in real data. This research phase produces a Brand Strategy Document that defines your positioning, audience personas, messaging pillars, and creative direction before a single pixel is designed.",
          "The design phase spans three to four weeks and follows a structured concepting process. We develop three distinct creative directions, each presented as a full identity system — not just a logo, but logo, colour palette, typography, imagery style, and sample applications. Clients review these in a guided presentation where we explain the strategic rationale behind each direction. After selection, we refine through two rounds of feedback to arrive at a final identity that the entire team is aligned on.",
          "Delivery includes a comprehensive brand guidelines document (typically 30–50 pages), all logo files in vector and raster formats, colour codes for print (Pantone, CMYK) and digital (HEX, RGB), typography licenses and usage rules, social media templates, stationery designs, and a brand asset library organised for easy team access. We also offer a 90-minute brand training session for your marketing team to ensure confident, consistent application from launch day forward.",
        ],
      },
      {
        heading: "Brand Identity vs Brand Image: What You Actually Need",
        paragraphs: [
          "Brand identity is what you create — your logo, colours, typography, tone of voice, and visual system. Brand image is what your audience perceives based on their interactions with your business. Many companies invest heavily in identity design but neglect the touchpoints that shape image: customer service experiences, packaging quality, website speed, and social media responsiveness. Effective branding requires aligning both, and that is exactly what our process is designed to achieve.",
          "If you are a new business, you need a brand identity system built from scratch — this includes the strategic foundation (positioning, messaging, values) and the visual execution (logo, colour palette, typography, guidelines). If you are an established business with an outdated or inconsistent identity, you likely need a brand audit first. Our audit evaluates your current brand across 40+ touchpoints and produces a prioritised roadmap for strengthening both identity and image.",
          "The most common mistake we see businesses make is treating branding as a one-time logo project. A logo is one element of your brand identity, but without a supporting system of guidelines, templates, and strategic messaging, it quickly becomes inconsistent across channels. TML delivers complete brand systems — not isolated design deliverables — so your brand maintains its integrity whether it appears on a billboard in Chandigarh, a LinkedIn post seen in London, or a product label on a shelf in Dubai.",
        ],
      },
      {
        heading: "Industries We Have Branded Successfully",
        paragraphs: [
          "Our branding portfolio spans over 25 industries. In FMCG, we have designed brand identities for snack foods, beverages, and personal care products that compete on retail shelves across India and the Middle East. For technology companies, we have created brand systems for SaaS platforms, fintech startups, and IT services firms that need to project innovation and trustworthiness to global audiences. Our healthcare branding work includes hospital chains, diagnostic labs, and wellness brands where regulatory compliance and patient trust are paramount.",
          "In real estate, we have branded residential projects, commercial developments, and brokerage firms across Chandigarh, Delhi NCR, and Hyderabad. Our hospitality branding includes boutique hotels, restaurant chains, and cloud kitchen brands where the visual identity directly impacts footfall and online ordering rates. Each industry has its own design conventions, regulatory requirements, and audience expectations — and our experience across all of them means we bring cross-industry insights that create genuinely differentiated brands.",
        ],
      },
      {
        heading: "Branding for Startups vs Established Businesses",
        paragraphs: [
          "Startups need brand identities that are flexible enough to evolve as the business pivots, yet distinctive enough to create immediate recognition in a crowded market. We design startup brands with scalable systems — modular logo marks, adaptable colour palettes, and minimal but memorable visual elements that work across a pitch deck, a mobile app, and a trade show booth. Our startup branding packages are structured to deliver maximum impact within tighter budgets, typically completing in three to four weeks.",
          "Established businesses face a different challenge: evolving their brand without alienating existing customers. Our rebranding process for established companies includes a brand equity audit to identify which elements carry the most recognition and goodwill, ensuring we preserve what works while modernising what does not. We have managed rebrands for companies with 15+ years of market presence, transitioning them to contemporary identities that attract new audiences while retaining loyal customers.",
          "Whether you are pre-revenue or doing ₹100 crore annually, the branding fundamentals remain the same: clarity of positioning, consistency of execution, and authenticity of expression. The difference is in scope, complexity, and stakeholder management — and TML has the experience to navigate all of it.",
        ],
      },
    ],
    pricingNote: "Branding investments at TML start at ₹25,000 for a standalone logo design with basic guidelines, and scale to ₹2,00,000+ for comprehensive brand identity systems that include strategy, visual identity, messaging frameworks, brand guidelines, stationery, and social media templates. Most of our clients invest between ₹75,000 and ₹1,50,000 for a complete brand identity package. We offer a free 30-minute brand consultation where we assess your current positioning and recommend the right scope for your goals and budget. Payment plans are available for larger engagements.",
    features: [
      { title: "Brand Strategy", description: "Deep market research, competitor analysis, and positioning strategy to define your unique brand voice and direction. We map your audience segments and craft differentiation frameworks that give your brand a competitive edge in the marketplace." },
      { title: "Logo & Visual Identity", description: "Memorable logos, color palettes, typography systems, and visual elements that capture your brand essence. Each design is tested across multiple applications to ensure versatility and impact in both digital and print environments." },
      { title: "Brand Guidelines", description: "Comprehensive brand books ensuring consistency across every touchpoint — digital, print, and beyond. Our guidelines include detailed usage rules, spacing specifications, and real-world application examples that empower your team to maintain brand integrity." },
      { title: "Brand Messaging", description: "Crafting your tagline, mission, vision, and tone of voice that resonates with your ideal customers. We develop messaging hierarchies and communication frameworks that ensure every piece of content speaks with one clear, authentic brand voice." },
      { title: "Stationery Design", description: "Business cards, letterheads, envelopes, and all corporate stationery aligned with your brand identity. Each piece is designed with premium finishes and print specifications in mind, ensuring a professional impression at every interaction." },
      { title: "Brand Audit", description: "Evaluate your existing brand presence and identify opportunities for strengthening your market position. Our audits cover visual consistency, messaging alignment, competitor benchmarking, and audience perception to provide actionable recommendations for growth." },
    ],
    process: [
      { step: "01", title: "Discovery", description: "We dive deep into your business, audience, competitors, and goals to understand your brand DNA." },
      { step: "02", title: "Strategy", description: "Develop brand positioning, messaging framework, and creative direction based on insights." },
      { step: "03", title: "Design", description: "Create visual identity concepts including logo, colors, typography, and brand elements." },
      { step: "04", title: "Refine", description: "Iterate based on feedback until every element perfectly represents your brand vision." },
      { step: "05", title: "Deliver", description: "Hand over complete brand guidelines and assets ready for implementation across all channels." },
    ],
    stats: [
      { label: "Brands Built", value: "500+" },
      { label: "Client Retention", value: "98%" },
      { label: "Industries Served", value: "25+" },
      { label: "Years Experience", value: "15+" },
    ],
    faqs: [
      { q: "How long does a complete branding project take?", a: "A full branding project typically takes 4-6 weeks from discovery to final delivery, depending on the scope and complexity." },
      { q: "Do you offer rebranding services?", a: "Yes, we offer complete rebranding services including brand audits, strategy refresh, and new visual identity design." },
      { q: "What's included in brand guidelines?", a: "Our brand guidelines cover logo usage, color codes, typography, imagery style, tone of voice, and application examples across all media." },
      { q: "Can you help with naming?", a: "Absolutely. We offer brand naming services including research, brainstorming, trademark screening, and final recommendations." },
    ],
    relatedServices: ["graphic-design", "branding-packaging", "website-development"],
  },

  "google-ads": {
    slug: "google-ads",
    title: "Google Ads",
    tagline: "Turn clicks into customers.",
    description: "Expert Google Ads management that maximizes ROI and drives qualified traffic to your business. As a certified Google Partner agency in Chandigarh, we build data-driven PPC campaigns with a proven track record of delivering high ROAS across search, display, and shopping networks for businesses throughout India.",
    heroDescription: "Our certified Google Ads specialists create data-driven campaigns that put your business in front of the right people at the right time. From search to display to shopping — we maximize every rupee of your ad spend.",
    metaTitle: "Google Ads Agency in Chandigarh | PPC Experts | TML",
    metaDescription: "Certified Google Partner agency offering expert Google Ads and PPC management in Chandigarh. Maximize your ROAS with TML Agency's data-driven SEM campaigns across India.",
    metaKeywords: ["Google Ads agency Chandigarh", "PPC management India", "SEM services", "Google Partner agency", "ROAS optimization", "pay per click advertising", "search engine marketing"],
    seoContent: [
      "Google Ads is one of the most powerful tools for reaching customers who are actively searching for your products or services. At TML Agency, our certified PPC specialists in Chandigarh design and manage high-performance search engine marketing campaigns that deliver measurable returns. We focus on maximizing your ROAS while reducing wasted ad spend through precise targeting and continuous optimization.",
      "Our Google Ads management covers every campaign type including search ads, display advertising, shopping campaigns, Performance Max, and YouTube ads. We handle the complete process from keyword research and competitor analysis to ad copywriting, landing page optimization, and conversion tracking setup. Our data-driven approach ensures your budget works harder across every channel.",
      "As a certified Google Partner agency, TML meets the highest standards set by Google for campaign management expertise and performance. We have managed over five crore in ad spend for businesses across India, consistently achieving above-average ROAS for clients in e-commerce, real estate, education, healthcare, and professional services sectors based out of Chandigarh and beyond.",
    ],
    deepContent: [
      {
        heading: "How Google Ads Works: A Complete Guide for Indian Businesses",
        paragraphs: [
          "Google Ads operates on a real-time auction system. Every time someone searches on Google, an auction runs in milliseconds to determine which ads appear. Your ad's position depends on three factors: your maximum bid (what you are willing to pay per click), your Quality Score (Google's rating of your ad relevance, landing page experience, and expected click-through rate), and the expected impact of your ad extensions. This means you do not necessarily need the highest bid to win the top spot — a highly relevant ad with a strong Quality Score can outrank competitors spending significantly more.",
          "Quality Score is rated on a 1–10 scale and directly impacts your cost per click. An ad with a Quality Score of 8 can pay 30–50% less per click than an ad with a Quality Score of 5 for the same keyword. At TML, we obsess over Quality Score optimisation — writing tightly themed ad groups with 10–15 keywords each, crafting ad copy that mirrors search intent, and building landing pages with fast load times, relevant content, and clear conversion paths. This approach is how we consistently deliver above-average ROAS for our clients across India.",
          "For Indian businesses specifically, understanding the Google Ads landscape means accounting for regional language targeting, mobile-first user behaviour (over 75% of Google searches in India happen on mobile), and highly variable cost-per-click rates across industries. A real estate lead keyword in Delhi might cost ₹80–150 per click, while a local service keyword in Chandigarh might cost ₹15–40. We map these economics before launching any campaign to ensure your budget is allocated where it delivers the best returns.",
        ],
      },
      {
        heading: "Google Ads vs SEO: When to Use Which",
        paragraphs: [
          "Google Ads delivers immediate visibility — your ad can appear on page one within hours of launching a campaign. SEO, by contrast, typically takes three to six months to produce meaningful ranking improvements. This makes Google Ads the right choice when you need results quickly: launching a new product, running a time-sensitive promotion, testing demand for a new service, or generating leads while your SEO strategy matures. At TML, most of our clients run both simultaneously because they serve different stages of the buyer journey.",
          "The honest trade-off is cost structure. Google Ads requires ongoing ad spend — the moment you pause your campaigns, your traffic stops. SEO builds cumulative organic equity that continues generating traffic without per-click costs. A well-optimised blog post or landing page can drive traffic for years. We typically recommend allocating 60–70% of budget to Google Ads in the first six months while SEO gains traction, then gradually shifting the ratio as organic rankings improve and your cost per organic lead drops.",
          "There are also keywords where one channel clearly outperforms the other. High-commercial-intent keywords like 'buy', 'price', 'near me', and 'best [service] in [city]' tend to convert exceptionally well on Google Ads. Informational keywords like 'how to', 'what is', and 'guide to' are better served by SEO content that builds authority and captures users earlier in the decision journey. Our strategy team maps your keyword universe across both channels to ensure complete coverage without wasteful overlap.",
        ],
      },
      {
        heading: "Common Google Ads Mistakes That Waste Your Budget",
        paragraphs: [
          "The single biggest budget-waster we see when auditing accounts is broad match keywords without negative keyword lists. Broad match tells Google to show your ad for any search it deems related to your keyword — which often includes irrelevant queries that burn through budget without converting. We have audited accounts where 40–60% of ad spend went to irrelevant clicks. Our approach uses a combination of phrase match and exact match keywords with carefully maintained negative keyword lists that we update weekly based on search term reports.",
          "Poor landing page alignment is the second most common issue. Sending all ad clicks to your homepage instead of dedicated, keyword-specific landing pages kills your conversion rate and Quality Score simultaneously. Every campaign we build at TML includes custom landing pages that match the ad's promise, feature a single clear call-to-action, load in under three seconds on mobile, and include trust signals like testimonials, certifications, and client logos. This alone typically improves conversion rates by 30–50%.",
          "Other costly mistakes include not setting up proper conversion tracking (meaning you are optimising blind), ignoring ad scheduling (running ads 24/7 when your customers only convert during business hours), failing to use ad extensions (which improve CTR by 10–20% at no additional cost), and not testing ad copy variations. We set up comprehensive conversion tracking using Google Tag Manager, implement offline conversion imports for lead-gen businesses, and run continuous A/B tests on headlines, descriptions, and CTAs to improve performance month over month.",
        ],
      },
      {
        heading: "Google Ads for E-Commerce: Shopping Campaigns That Convert",
        paragraphs: [
          "Google Shopping campaigns are the highest-converting ad format for e-commerce businesses because they show your product image, price, title, and store name directly in search results. Shoppers can evaluate your product before clicking, which means the traffic you pay for is more qualified. At TML, we manage Shopping campaigns for e-commerce clients selling everything from fashion and electronics to home decor and health supplements, with average ROAS ranging from 4x to 12x depending on the product category and margins.",
          "The key to Shopping campaign success is product feed optimisation. Your Google Merchant Center feed is the foundation — product titles need to include relevant search terms (brand + product type + key attribute), descriptions should be detailed and keyword-rich, images must be high-quality with white backgrounds, and pricing needs to be competitive and accurate. We optimise feeds at the SKU level, rewriting titles, enriching descriptions, and fixing disapproved products to maximise your catalogue's visibility.",
          "Performance Max campaigns have largely replaced traditional Shopping campaigns and use Google's AI to serve ads across Search, Shopping, Display, YouTube, Gmail, and Maps from a single campaign. We structure Performance Max campaigns with detailed audience signals (your customer lists, website visitors, and in-market audiences), high-quality creative assets across all formats, and clear conversion goals. We then layer in manual Shopping campaigns for top-performing products to maintain direct bidding control where it matters most.",
        ],
      },
      {
        heading: "Measuring Google Ads ROI: Metrics That Actually Matter",
        paragraphs: [
          "Click-through rate (CTR) tells you how compelling your ads are — the industry average is 3–5% for search ads, and anything above 6% indicates strong ad-keyword alignment. But CTR alone does not tell you if your campaigns are profitable. Cost per acquisition (CPA) measures what you actually pay for each conversion, whether that is a purchase, a lead form submission, or a phone call. We benchmark CPA against your customer lifetime value to ensure every campaign is generating positive returns, not just clicks.",
          "For e-commerce, return on ad spend (ROAS) is the primary metric — it tells you how many rupees of revenue you generate for every rupee spent on ads. A ROAS of 4x means ₹4 in revenue for every ₹1 in ad spend. For lead generation businesses, we track cost per qualified lead (not just cost per form fill) by integrating CRM data back into Google Ads, allowing the algorithm to optimise for leads that actually convert into paying customers. This closed-loop reporting is what separates a professionally managed account from a self-managed one.",
          "We provide monthly reports that go beyond surface metrics. Our dashboards show CPA and ROAS by campaign, ad group, keyword, device, location, and time of day. We include search term analysis highlighting which actual queries drove conversions, competitive auction insights showing how you stack up against other advertisers, and a clear action plan for the next month's optimisations. Every client also gets access to a live Looker Studio dashboard for real-time performance monitoring between report cycles.",
        ],
      },
    ],
    pricingNote: "Google Ads management at TML starts at ₹15,000/month for the management fee, covering campaign setup, optimisation, reporting, and strategy. This is separate from your ad spend budget, which we recommend starting at a minimum of ₹30,000/month for meaningful data and results — though most competitive industries see optimal performance with ₹50,000–₹2,00,000/month in ad spend. We offer a free Google Ads account audit for businesses with existing campaigns, identifying wasted spend and quick-win optimisations before you commit. No lock-in contracts — our clients stay because of results, not obligations.",
    features: [
      { title: "Search Campaigns", description: "Target high-intent keywords to appear at the top of Google when customers are actively searching for your services. We craft compelling ad copy and use advanced bidding strategies to maximize visibility while keeping your cost per acquisition low." },
      { title: "Display Advertising", description: "Visually engaging banner ads across Google's Display Network reaching millions of websites and apps. Our team designs attention-grabbing creatives and uses precise audience targeting to build brand awareness and drive remarketing conversions." },
      { title: "Shopping Ads", description: "Product listing ads that showcase your products with images, prices, and reviews directly in search results. We optimize your product feed, manage bidding by SKU performance, and ensure your listings stand out against competitors." },
      { title: "Remarketing", description: "Re-engage visitors who've shown interest in your brand with targeted ads that bring them back to convert. We build segmented remarketing lists based on user behaviour and craft personalized messages that address specific objections and interests." },
      { title: "Performance Max", description: "AI-powered campaigns that optimize across all Google channels — Search, Display, YouTube, Gmail, and Maps. We structure audience signals, creative assets, and conversion goals to help Google's machine learning deliver the best possible results for your budget." },
      { title: "Analytics & Reporting", description: "Transparent, detailed reporting with conversion tracking, ROI analysis, and actionable optimization insights. Our monthly reports include clear dashboards, trend analysis, and strategic recommendations to keep your campaigns moving in the right direction." },
    ],
    process: [
      { step: "01", title: "Audit", description: "Review existing campaigns and competitors to identify opportunities and quick wins." },
      { step: "02", title: "Strategy", description: "Build campaign structure, keyword research, audience targeting, and budget allocation plan." },
      { step: "03", title: "Launch", description: "Set up campaigns with optimized ad copy, extensions, landing pages, and conversion tracking." },
      { step: "04", title: "Optimize", description: "Continuous A/B testing, bid management, and quality score improvement for peak performance." },
      { step: "05", title: "Scale", description: "Expand successful campaigns, explore new channels, and increase budget where ROI is proven." },
    ],
    stats: [
      { label: "Ad Spend Managed", value: "₹5Cr+" },
      { label: "Average ROAS", value: "4.2x" },
      { label: "Campaigns Running", value: "150+" },
      { label: "Google Certified", value: "Yes" },
    ],
    faqs: [
      { q: "What's the minimum budget for Google Ads?", a: "We recommend a minimum of ₹30,000/month for meaningful results, but we can work with various budgets based on your goals." },
      { q: "How soon will I see results?", a: "You can start seeing traffic within 24 hours. Meaningful conversion data usually develops within 2-4 weeks of optimization." },
      { q: "Do you manage the entire campaign?", a: "Yes — from keyword research and ad creation to bid management, optimization, and monthly reporting." },
      { q: "Are you a Google Partner?", a: "Yes, TML is a certified Google Partner, meaning we meet Google's highest standards for ad management expertise." },
    ],
    relatedServices: ["seo", "lead-generation", "social-media"],
  },

  seo: {
    slug: "seo",
    title: "SEO",
    tagline: "Dominate search. Own your market.",
    description: "Proven SEO strategies that boost your rankings, drive organic traffic, and grow your business sustainably. Our SEO team in Chandigarh specializes in technical SEO, on-page optimization, local SEO, and link building to help businesses across India achieve first-page rankings on Google for competitive keywords.",
    heroDescription: "We help businesses climb to the top of Google with white-hat SEO strategies. From technical optimization to content strategy and link building — we build organic growth engines that deliver results month after month.",
    metaTitle: "SEO Services in Chandigarh | Organic Growth | TML",
    metaDescription: "Expert SEO services in Chandigarh offering technical SEO, local SEO, and organic search optimization. Boost your Google rankings and drive traffic with TML Agency.",
    metaKeywords: ["SEO services Chandigarh", "organic search optimization", "local SEO India", "technical SEO audit", "Google rankings", "search engine optimization agency", "link building services"],
    seoContent: [
      "Search engine optimization is the most sustainable way to drive qualified traffic to your website. At TML Agency in Chandigarh, we implement white-hat SEO strategies that improve your organic search rankings and deliver long-term results. Our approach combines technical excellence, content marketing, and authoritative link building to help your business outrank competitors on Google.",
      "Our technical SEO services address the foundation of your website's search performance. We optimize site speed, fix crawlability issues, implement schema markup, improve Core Web Vitals, and ensure mobile-first indexing compliance. These technical improvements, combined with strategic on-page optimization of meta tags, content structure, and internal linking, create a solid base for ranking growth.",
      "Local SEO is essential for businesses targeting customers in specific regions. Our team optimizes your Google Business Profile, builds consistent local citations, manages online reviews, and implements location-specific content strategies. Whether you serve Chandigarh, the Tricity area, or clients across India, our local SEO expertise helps you dominate map pack results and local search queries.",
    ],
    deepContent: [
      {
        heading: "SEO in 2026: What Has Changed and What Still Works",
        paragraphs: [
          "The biggest shift in SEO over the past two years has been Google's AI Overviews (formerly SGE), which now appear for roughly 40% of informational queries. These AI-generated summaries pull content from top-ranking pages, meaning your content needs to be structured for both traditional rankings and AI citation. At TML, we optimise content with clear headings, direct answers to specific questions, and structured data markup that increases the likelihood of being cited in AI Overviews — keeping your brand visible even as the search results page evolves.",
          "E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness) has become the defining ranking framework. Google's quality raters now explicitly evaluate whether content demonstrates first-hand experience with the topic. For businesses, this means generic, AI-generated content without expert input will not rank. Our content strategy pairs subject matter experts from your team with our SEO writers to produce content that demonstrates genuine expertise — author bios with credentials, original data and case studies, and insights that only someone with real industry experience could provide.",
          "What still works and will always work: creating genuinely useful content that answers real questions better than anything else on page one, building a technically sound website that loads fast and provides excellent user experience, and earning links from relevant, authoritative sources. The tactics evolve — entity-based SEO, passage indexing, and video SEO are all more important now — but the fundamentals of relevance, quality, and authority remain the backbone of every successful SEO strategy we implement at TML.",
        ],
      },
      {
        heading: "Technical SEO Checklist: The Foundation of Rankings",
        paragraphs: [
          "Core Web Vitals are now a confirmed ranking factor, and Google measures three specific metrics: Largest Contentful Paint (LCP should be under 2.5 seconds), Interaction to Next Paint (INP should be under 200 milliseconds), and Cumulative Layout Shift (CLS should be under 0.1). Our technical audits use PageSpeed Insights, Lighthouse, and Chrome User Experience Report data to identify and fix performance bottlenecks. Common fixes include optimising image formats (WebP/AVIF), implementing lazy loading, reducing JavaScript bundle sizes, and configuring proper caching headers.",
          "Crawlability and indexation are prerequisites for ranking — if Google cannot find and understand your pages, nothing else matters. We audit your XML sitemaps, robots.txt, canonical tags, internal linking architecture, and server response codes using Screaming Frog and Google Search Console. For larger sites (1,000+ pages), we analyse crawl budget allocation to ensure Google is spending its time on your most valuable pages rather than crawling duplicate content, thin pages, or faceted navigation URLs.",
          "Schema markup (structured data) gives Google explicit context about your content and enables rich results like FAQs, reviews, how-to steps, and product details in search listings. Rich results typically improve click-through rates by 20–30%. We implement Organisation, LocalBusiness, Product, Article, FAQ, HowTo, and BreadcrumbList schemas as standard practice, validating every implementation through Google's Rich Results Test and monitoring performance through Search Console's enhancements reports.",
        ],
      },
      {
        heading: "Local SEO for Chandigarh Businesses: A Complete Guide",
        paragraphs: [
          "Local SEO determines which businesses appear when someone searches 'near me' or includes a city name in their query. For Chandigarh businesses, the competition in the local map pack is intensifying across sectors like restaurants, clinics, salons, coaching centres, and professional services. The three pillars of local ranking are: relevance (how well your Google Business Profile matches the search query), distance (how close you are to the searcher), and prominence (how well-known and trusted your business is online).",
          "Your Google Business Profile (GBP) is the single most important local SEO asset. We optimise every field — primary and secondary categories, business description with natural keyword integration, service areas, attributes, products/services listings, and Q&A sections. We post weekly GBP updates with photos, offers, and event announcements, which signals to Google that your business is active. For multi-location businesses in Chandigarh and the Tricity area, we create and optimise individual profiles for each location with unique descriptions and location-specific content.",
          "Online reviews are the most influential factor for both local rankings and customer decision-making. Businesses with 50+ Google reviews and a 4.5+ star rating consistently outrank competitors with fewer reviews. We implement review generation systems — automated post-service SMS/email requests, QR codes at physical locations, and staff training on asking for reviews — that help our clients build a steady stream of authentic reviews. We also manage review responses, turning negative feedback into opportunities to demonstrate excellent customer service publicly.",
        ],
      },
      {
        heading: "How Long Does SEO Take? Honest Timelines and Expectations",
        paragraphs: [
          "Month 1–3: This is the foundation phase. We complete the technical audit and fix critical issues (indexation errors, site speed, broken links), optimise your highest-priority existing pages, set up tracking and reporting, and begin content production. You may see early movement for low-competition long-tail keywords, but do not expect significant traffic changes yet. This phase is about building the infrastructure that rankings require — skipping it leads to wasted effort later.",
          "Month 4–6: This is where momentum builds. Technical improvements start reflecting in crawl stats and Core Web Vitals. New content begins indexing and appearing in search results for target keywords. Link building efforts gain traction as outreach campaigns generate backlinks from relevant sites. Most clients see a 30–50% increase in organic impressions and measurable ranking improvements for target keywords during this period. For local SEO, Google Business Profile optimisations typically show results faster — often within 8–12 weeks.",
          "Month 7–12: Compounding growth. Your content library is expanding, domain authority is strengthening, and Google's trust in your site is increasing. This is when you start ranking for more competitive head terms and seeing significant organic traffic growth — our clients average a 150–300% increase in organic traffic within the first year. Beyond 12 months, SEO becomes your most cost-effective acquisition channel, with the per-lead cost dropping every month as existing content continues generating traffic without additional investment.",
        ],
      },
      {
        heading: "SEO vs Paid Ads: Building a Sustainable Traffic Strategy",
        paragraphs: [
          "Paid ads (Google Ads, Meta Ads) are like renting visibility — you pay for every click, and when you stop paying, traffic stops immediately. SEO is like building equity — the traffic is earned through content, authority, and technical excellence, and it continues flowing even if you pause active optimisation for a period. The ideal strategy uses both: paid ads for immediate results and revenue while SEO builds long-term organic infrastructure that reduces your dependence on paid channels over time.",
          "We have tracked the economics across our client portfolio and the pattern is consistent: in month one, 90–100% of new traffic comes from paid ads. By month six with active SEO, organic traffic typically accounts for 25–35% of total visitors. By month twelve, organic often reaches 50–60%, and the blended cost per acquisition drops by 30–45% because organic leads are effectively free. The businesses that achieve the best ROI are those that commit to both channels simultaneously rather than choosing one or the other.",
          "The strategic advantage of running both channels is data sharing. Google Ads search term reports reveal which keywords actually convert into customers — this intelligence directly informs your SEO content strategy. Conversely, pages that rank well organically can be excluded from paid campaigns to avoid cannibalisation, redirecting that budget to keywords where you lack organic visibility. At TML, we manage both SEO and Google Ads for many clients specifically because this integrated approach delivers better results than siloed management.",
        ],
      },
    ],
    pricingNote: "SEO packages at TML start at ₹20,000/month for local businesses targeting a single city with up to 20 keywords, including technical optimisation, on-page SEO, Google Business Profile management, and monthly reporting. Mid-tier packages for regional or national campaigns range from ₹50,000 to ₹1,00,000/month, covering broader keyword targeting, content creation, and link building. Enterprise SEO for large websites or highly competitive industries starts at ₹1,50,000/month. All plans include a dedicated account manager, monthly performance reports with clear KPIs, and access to a live reporting dashboard. We offer a free comprehensive SEO audit — no strings attached — so you can see exactly where your site stands before committing.",
    features: [
      { title: "Technical SEO", description: "Site speed optimization, mobile-first indexing, schema markup, crawlability fixes, and Core Web Vitals improvement. We conduct thorough technical audits to identify and resolve every issue that could be holding your website back from achieving higher search rankings." },
      { title: "On-Page SEO", description: "Keyword optimization, meta tags, content structure, internal linking, and user experience enhancements. Our on-page specialists ensure every page on your website is perfectly optimized to rank for its target keywords while providing an excellent user experience." },
      { title: "Content Strategy", description: "Research-driven content calendars, blog strategy, pillar pages, and topic clusters that attract and convert. We identify content gaps in your niche and create comprehensive content plans that establish your website as an authoritative resource in your industry." },
      { title: "Link Building", description: "High-quality backlink acquisition from authoritative domains through outreach, PR, and content marketing. Our link building campaigns focus on earning relevant, high-authority links that strengthen your domain authority and improve search visibility over time." },
      { title: "Local SEO", description: "Google Business Profile optimization, local citations, reviews management, and map pack ranking strategies. We help brick-and-mortar businesses and service-area businesses dominate local search results in Chandigarh and across their target regions." },
      { title: "SEO Audits", description: "Comprehensive site audits identifying technical issues, content gaps, and competitive opportunities. Our detailed audit reports include prioritized action plans with clear recommendations that your team or ours can implement for measurable ranking improvements." },
    ],
    process: [
      { step: "01", title: "Audit", description: "Complete technical and content audit to identify issues and opportunities in your current SEO." },
      { step: "02", title: "Research", description: "In-depth keyword research, competitor analysis, and content gap analysis to build your strategy." },
      { step: "03", title: "Optimize", description: "Fix technical issues, optimize on-page elements, and improve site structure and performance." },
      { step: "04", title: "Create", description: "Develop and publish optimized content targeting high-value keywords in your niche." },
      { step: "05", title: "Build", description: "Acquire quality backlinks and monitor rankings, continuously refining strategy for growth." },
    ],
    stats: [
      { label: "Keywords Ranked", value: "3000+" },
      { label: "Avg Traffic Increase", value: "150%" },
      { label: "First Page Rankings", value: "500+" },
      { label: "Clients Served", value: "500+" },
    ],
    faqs: [
      { q: "How long does SEO take to show results?", a: "SEO is a long-term strategy. You'll typically see initial improvements in 3-4 months, with significant results in 6-12 months." },
      { q: "Do you guarantee #1 rankings?", a: "No ethical SEO agency can guarantee specific rankings. We guarantee our proven methodology and transparent reporting of progress." },
      { q: "What tools do you use?", a: "We use industry-leading tools like Ahrefs, SEMrush, Google Search Console, Screaming Frog, and proprietary analytics." },
      { q: "Do you handle content creation too?", a: "Yes, we have in-house content writers who create SEO-optimized, engaging content for your website and blog." },
    ],
    relatedServices: ["google-ads", "website-development", "lead-generation"],
  },

  "website-development": {
    slug: "website-development",
    title: "Website Development",
    tagline: "Websites that convert visitors into customers.",
    description: "Custom, high-performance websites built with modern technologies for speed, security, and conversions. Our web development team in Chandigarh specializes in Next.js, React, WordPress, and e-commerce solutions, delivering responsive websites that look stunning and drive measurable business results for clients across India.",
    heroDescription: "We build stunning, lightning-fast websites that don't just look great — they drive business results. From corporate websites to e-commerce platforms, our development team delivers pixel-perfect, conversion-optimized digital experiences.",
    metaTitle: "Website Development Company Chandigarh | TML Agency",
    metaDescription: "Custom website development in Chandigarh using Next.js, React, and WordPress. TML Agency builds fast, responsive, SEO-friendly websites and e-commerce stores across India.",
    metaKeywords: ["website development Chandigarh", "web design India", "Next.js development", "React website", "WordPress developer", "e-commerce website", "responsive web design", "custom web application"],
    seoContent: [
      "Your website is often the first interaction customers have with your business, and it needs to make a powerful impression. At TML Agency in Chandigarh, we build custom websites using modern technologies like Next.js, React, and WordPress that are fast, secure, and optimized for conversions. Every website we deliver is mobile-responsive, SEO-friendly, and designed to grow with your business.",
      "Our web development process begins with understanding your business goals and target audience. We create detailed wireframes, design high-fidelity mockups, and develop with clean, optimized code that ensures lightning-fast load times and excellent Core Web Vitals scores. Whether you need a corporate website, an e-commerce store on Shopify or WooCommerce, or a custom web application, our team delivers.",
      "We have delivered over three hundred websites for businesses across industries including real estate, healthcare, education, e-commerce, and hospitality. Our clients in Chandigarh, Delhi, Mumbai, and across India trust us for websites that not only look professional but also generate leads and revenue. Post-launch, we provide ongoing maintenance, security updates, and performance monitoring to keep your site running at its best.",
    ],
    deepContent: [
      {
        heading: "Why Website Speed Matters More Than Design in 2026",
        paragraphs: [
          "A one-second delay in page load time reduces conversions by 7% and increases bounce rate by 11%, according to Google's own research. In 2026, Core Web Vitals are not just an SEO ranking factor — they directly determine whether a visitor stays on your site or hits the back button. The threshold for Largest Contentful Paint (LCP) is 2.5 seconds, and for Interaction to Next Paint (INP) it is 200 milliseconds. Over 60% of Indian websites we audit fail at least one of these metrics, which means they are losing both rankings and customers to faster competitors.",
          "At TML, performance is baked into our development process, not bolted on after launch. We build with Next.js and React, which enable server-side rendering, automatic code splitting, and image optimisation out of the box. Our standard build achieves LCP under 1.5 seconds, INP under 100 milliseconds, and perfect CLS scores. We use Cloudflare or Vercel edge networks to serve content from the nearest server to your visitors — whether they are in Chandigarh, Dubai, London, or Sydney.",
          "The business impact of speed is measurable and significant. Our e-commerce clients who migrated from slow WordPress themes to optimised Next.js builds saw average conversion rate improvements of 25–40%. A real estate client in Chandigarh reduced their bounce rate from 68% to 31% after we rebuilt their property listing site with lazy-loaded images, optimised search filters, and server-side rendering. Speed is not a technical nicety — it is a revenue lever.",
        ],
      },
      {
        heading: "WordPress vs Next.js vs Shopify: Choosing the Right Platform",
        paragraphs: [
          "WordPress powers roughly 40% of the web and is the right choice when you need a content-heavy website with frequent updates, your team is non-technical and needs an intuitive admin panel, and your budget is modest. We build WordPress sites with lightweight themes (GeneratePress or Kadence), essential plugins only, and proper caching/CDN configuration to avoid the bloated, slow WordPress sites that give the platform a bad reputation. Best for: blogs, news sites, small business websites, directories, and membership sites. Typical budget: ₹50,000–₹2,00,000.",
          "Next.js (React-based) is our recommendation for businesses where performance, scalability, and custom functionality matter. It delivers significantly faster page loads through server-side rendering and static generation, supports complex interactive features, and scales effortlessly from 100 to 10 million monthly visitors. The trade-off is higher development cost and the need for developer involvement for content changes (unless paired with a headless CMS like Sanity or Strapi). Best for: SaaS products, high-traffic corporate sites, custom web applications, and businesses prioritising SEO and speed. Typical budget: ₹1,50,000–₹5,00,000+.",
          "Shopify is purpose-built for e-commerce and handles product management, inventory, payments, and shipping out of the box. It is the fastest path to a functional online store, with thousands of apps for extending functionality. The limitation is customisation — you are working within Shopify's framework, and highly custom designs or features may require workarounds. For businesses selling physical products with standard e-commerce needs, Shopify is often the most cost-effective choice. Best for: product-based businesses, D2C brands, and retailers. Typical budget: ₹75,000–₹3,00,000 for design and setup, plus Shopify's monthly subscription.",
        ],
      },
      {
        heading: "E-Commerce Website Development: What It Actually Costs",
        paragraphs: [
          "A basic Shopify or WooCommerce store with a premium theme, 50–100 products, standard payment gateway integration (Razorpay, PayU, or Stripe), and essential pages (home, shop, about, contact, policies) typically costs ₹75,000–₹1,50,000 at TML. This includes responsive design customisation, product upload, basic SEO setup, and training on managing your store. It is suitable for businesses just entering e-commerce or those with straightforward product catalogues.",
          "A mid-range e-commerce build — custom design, advanced filtering and search, multi-currency support, inventory management integration, customer accounts with order tracking, and integration with accounting or ERP software — ranges from ₹2,00,000 to ₹4,00,000. This tier is where most growing D2C brands and established retailers land. We typically recommend Shopify Plus or a custom WooCommerce build at this level, depending on your specific integration requirements and growth trajectory.",
          "Enterprise e-commerce projects with custom-built frontends (headless commerce using Next.js + Shopify or Medusa), complex product configuration tools, B2B pricing portals, marketplace features, or high-volume transaction handling start at ₹5,00,000 and can exceed ₹15,00,000 for fully custom solutions. These projects involve dedicated project managers, phased delivery over 3–6 months, and extensive testing. We provide transparent, itemised quotes for every project so you know exactly what you are paying for at each stage.",
        ],
      },
      {
        heading: "Website Maintenance: The Hidden Cost of Ignoring Your Site",
        paragraphs: [
          "An unmaintained website is a security liability. WordPress sites that skip updates are the most common target for malware injection — 90% of hacked CMS sites are WordPress, and the vast majority were running outdated core software, themes, or plugins. We have cleaned up dozens of hacked sites for businesses who came to us after their hosting provider suspended their account or Google flagged their site as dangerous. The cost of recovery (₹15,000–₹50,000) always exceeds the cost of prevention (₹5,000–₹15,000/month for a maintenance plan).",
          "Beyond security, websites degrade in performance over time. Database tables bloat, plugins conflict after updates, image libraries grow without optimisation, and SSL certificates expire. A website that loaded in 2 seconds at launch can slow to 5+ seconds within a year without active maintenance. Our maintenance plans include weekly backups, monthly software updates with staging environment testing, uptime monitoring, quarterly performance audits, and priority support for any issues that arise.",
          "For businesses relying on their website for lead generation or e-commerce revenue, downtime has a direct financial cost. If your site generates ₹5 lakh in monthly revenue and experiences 8 hours of downtime, that is roughly ₹2,200 in lost revenue — plus the SEO damage from Google encountering server errors during a crawl. Our maintenance clients enjoy 99.9% uptime guarantees, automated failover systems, and response times under 4 hours for critical issues.",
        ],
      },
      {
        heading: "Mobile-First Design: Why 70% of Your Traffic Is on Phone",
        paragraphs: [
          "In India, mobile devices account for over 75% of all internet traffic, and Google has fully transitioned to mobile-first indexing — meaning it evaluates the mobile version of your site for all ranking decisions. If your website is not designed and developed with mobile as the primary experience, you are building for the minority of your audience. At TML, every project starts with mobile wireframes and prototypes before we even consider the desktop layout.",
          "Mobile-first design is not simply making a desktop site responsive. It requires rethinking information architecture for smaller screens, designing touch-friendly navigation with adequate tap targets (minimum 48x48 pixels), optimising forms for mobile input (using appropriate keyboard types, autofill, and minimal fields), and ensuring that the most important content and calls-to-action are visible without scrolling. Our designs prioritise thumb-zone accessibility, ensuring key interactive elements fall within the natural reach of one-handed phone use.",
          "The conversion impact of proper mobile optimisation is substantial. Our clients who have undergone mobile-first redesigns see average improvements of 35–50% in mobile conversion rates. For an e-commerce client in Chandigarh selling fashion accessories, optimising the mobile checkout flow — reducing form fields from 12 to 6, adding UPI and wallet payment options, and implementing address auto-complete — increased mobile order completions by 62%. These are not design preferences; they are revenue decisions.",
        ],
      },
    ],
    pricingNote: "Website development at TML starts at ₹50,000 for single-page landing pages and simple brochure sites, ₹1,00,000–₹2,50,000 for multi-page business websites with CMS integration, and ₹2,50,000–₹5,00,000+ for custom web applications and e-commerce stores. Every project includes responsive design, basic SEO setup, performance optimisation, and 3 months of post-launch technical support. We provide detailed, itemised proposals after a free discovery consultation so there are no surprises. Hosting setup and domain registration assistance are included at no extra charge. For ongoing needs, our maintenance plans start at ₹5,000/month.",
    features: [
      { title: "Custom Web Design", description: "Bespoke UI/UX design tailored to your brand, optimized for user engagement and conversion rates. Our designers create intuitive interfaces that guide visitors toward key actions while delivering a visually compelling experience across all devices." },
      { title: "E-Commerce Development", description: "Shopify, WooCommerce, or custom e-commerce solutions with secure payments and inventory management. We build online stores that provide seamless shopping experiences, integrate with your fulfilment workflow, and scale as your product catalogue grows." },
      { title: "CMS Development", description: "WordPress, Webflow, or headless CMS solutions that make content management effortless for your team. We configure user-friendly admin panels with custom content types, media management, and role-based access controls tailored to your workflow." },
      { title: "Landing Pages", description: "High-converting landing pages designed for specific campaigns, products, or lead generation goals. Each landing page is built with persuasive copy structures, optimized forms, and A/B testing capabilities to maximize your conversion rates." },
      { title: "Web Applications", description: "Custom web apps built with React, Next.js, or other modern frameworks for complex business needs. We develop scalable, secure applications with robust backends, API integrations, and real-time features that solve real business problems." },
      { title: "Maintenance & Support", description: "Ongoing website maintenance, security updates, performance monitoring, and technical support. Our support plans include regular backups, uptime monitoring, plugin updates, and priority bug fixes to keep your website running smoothly around the clock." },
    ],
    process: [
      { step: "01", title: "Discovery", description: "Understand your business goals, target audience, and technical requirements through detailed consultation." },
      { step: "02", title: "Wireframe", description: "Create site architecture, user flows, and wireframes that map out the optimal user journey." },
      { step: "03", title: "Design", description: "Craft high-fidelity mockups with your brand aesthetics, ensuring responsive design across all devices." },
      { step: "04", title: "Develop", description: "Build with clean, optimized code — fast loading, SEO-friendly, and secure from day one." },
      { step: "05", title: "Launch", description: "Thorough QA testing, performance optimization, and smooth deployment with post-launch support." },
    ],
    stats: [
      { label: "Websites Delivered", value: "300+" },
      { label: "Avg Load Time", value: "1.8s" },
      { label: "Client Satisfaction", value: "99%" },
      { label: "Technologies Used", value: "20+" },
    ],
    faqs: [
      { q: "How long does it take to build a website?", a: "A standard website takes 3-6 weeks. Complex e-commerce or custom web applications may take 8-12 weeks." },
      { q: "Do you provide hosting?", a: "We can recommend and set up optimal hosting solutions, or work with your existing hosting provider." },
      { q: "Will my website be mobile responsive?", a: "Absolutely. Every website we build is fully responsive and optimized for mobile, tablet, and desktop." },
      { q: "Can I update content myself?", a: "Yes, we build with user-friendly CMS platforms and provide training so your team can easily manage content." },
    ],
    relatedServices: ["branding", "seo", "graphic-design"],
  },

  "social-media": {
    slug: "social-media",
    title: "Social Media Marketing",
    tagline: "Build community. Drive engagement.",
    description: "Strategic social media management that grows your audience, builds brand loyalty, and generates leads. Our social media team in Chandigarh creates scroll-stopping content for Instagram, Facebook, LinkedIn, and other platforms, combining organic content marketing with paid social campaigns to deliver real business results across India.",
    heroDescription: "We help brands stand out in the social media noise. Our team creates scroll-stopping content, manages communities, and runs data-driven paid campaigns across Instagram, Facebook, LinkedIn, Twitter, and YouTube.",
    metaTitle: "Social Media Marketing Agency Chandigarh | TML",
    metaDescription: "Expert social media marketing services in Chandigarh. Content creation, community management, and paid campaigns on Instagram, Facebook, and LinkedIn by TML Agency.",
    metaKeywords: ["social media marketing Chandigarh", "Instagram marketing India", "Facebook advertising", "LinkedIn marketing", "content marketing agency", "social media management", "influencer marketing"],
    seoContent: [
      "Social media is where your customers spend their time, and your brand needs to show up with purpose. At TML Agency in Chandigarh, we develop comprehensive social media marketing strategies that build engaged communities around your brand. Our content-first approach combines creative storytelling with data-driven targeting to grow your audience on Instagram, Facebook, LinkedIn, and other platforms.",
      "Our social media services cover everything from content creation and community management to paid advertising and influencer partnerships. We produce high-quality graphics, videos, reels, and carousel posts tailored for each platform's unique audience and algorithm. Our content calendars are built around strategic themes that align with your business goals while keeping your brand relevant and engaging.",
      "We have managed social media for over a hundred brands across industries in Chandigarh and throughout India. Our campaigns consistently deliver above-average engagement rates because we focus on creating genuine connections between brands and their audiences. From startups building their first social presence to established brands looking for growth, TML delivers social media strategies that translate into real business outcomes.",
    ],
    deepContent: [
      {
        heading: "Social Media Strategy That Actually Drives Revenue",
        paragraphs: [
          "Most social media agencies obsess over follower counts and likes — metrics that look good in reports but rarely show up in your bank account. At TML Agency, we build social media strategies anchored to revenue outcomes. Every content piece, every campaign, every engagement tactic ties back to a measurable business goal — whether that is lead generation, online sales, footfall, or brand equity that supports premium pricing.",
          "Our revenue-first approach starts with mapping your customer journey from social discovery to purchase. We identify which platforms your buyers actually use, what content triggers them to take action, and where the conversion friction points are. For a Chandigarh-based D2C skincare brand, this approach generated ₹18 lakh in tracked revenue from Instagram alone within four months — not from viral posts, but from a systematic content-to-conversion pipeline using shoppable posts, retargeting, and strategic DM automation.",
          "We track metrics that matter: cost per acquisition, revenue per follower segment, click-through to purchase rate, and customer lifetime value from social channels. Monthly reports include both engagement data and direct revenue attribution, so you always know exactly what your social media investment is returning.",
        ],
      },
      {
        heading: "Instagram vs LinkedIn vs Facebook: Which Platform Fits Your Business",
        paragraphs: [
          "Not every platform deserves your budget, and spreading thin across all of them is one of the most expensive mistakes businesses make. Instagram works best for visual-first brands — fashion, food, beauty, lifestyle, and real estate — where product aesthetics drive purchase decisions. With features like Reels, Stories, and Shopping, Instagram is ideal for D2C brands and local businesses targeting audiences aged 18-35. Our Instagram campaigns typically achieve 4-6% engagement rates, well above the industry average of 1.5%.",
          "LinkedIn is where B2B happens. If your customers are decision-makers at companies — CEOs, HR heads, procurement managers — LinkedIn's targeting by job title, company size, and industry is unmatched. We have seen SaaS companies and consulting firms generate qualified leads at ₹200-400 per lead on LinkedIn, compared to ₹800+ on other platforms for the same audience. Facebook remains powerful for hyperlocal targeting, community building, and reaching audiences above 35, particularly effective for real estate, education, healthcare, and event-based businesses.",
          "During our onboarding audit, we analyse your existing audience data, competitor platform presence, and customer demographics to recommend a focused platform strategy. Most businesses see better results from dominating one or two platforms than from maintaining a mediocre presence across five.",
        ],
      },
      {
        heading: "Content Calendar Planning: How We Keep Brands Consistent",
        paragraphs: [
          "Consistency is the single biggest predictor of social media success, yet it is where most businesses fail. Our content calendar process at TML starts with a monthly strategy session where we align content themes with your business calendar — product launches, seasonal campaigns, industry events, and sales cycles. We plan 30 days of content in advance, with built-in flexibility for trending topics and real-time marketing opportunities.",
          "Each calendar balances four content pillars: educational content that positions you as an expert (30%), engaging content that drives interaction and saves (30%), promotional content that drives sales (25%), and community content that builds brand personality (15%). This ratio, refined over managing 100+ brand accounts, prevents the common trap of either being too salesy or too entertainment-focused without business impact.",
          "We use tools like Later and Notion for collaborative planning, giving you full visibility into upcoming content with an approval workflow that respects your timeline. Content batching sessions — where we shoot and design 2-4 weeks of content in one sitting — keep production efficient and visually cohesive. The result is a feed that looks intentional, not improvised.",
        ],
      },
      {
        heading: "Social Media Advertising: ROI-Driven Paid Campaigns",
        paragraphs: [
          "Organic reach on social media has declined to under 5% on most platforms, making paid campaigns essential for any serious growth strategy. Our paid social team manages Meta Ads (Instagram and Facebook), LinkedIn Ads, and Twitter Ads with a focus on return on ad spend rather than impressions. We have managed over ₹2 crore in social ad spend, consistently delivering 3-5x ROAS for e-commerce clients and cost per leads under ₹150 for service businesses.",
          "Our campaign structure follows a full-funnel approach: awareness campaigns using video views and reach objectives build your audience, consideration campaigns using traffic and engagement objectives warm prospects, and conversion campaigns using lead forms or catalogue sales close the deal. Each layer is connected through custom audiences and retargeting, so your ad spend compounds rather than starting from scratch with each campaign.",
          "We test aggressively — typically running 8-12 ad variants per campaign across different creatives, copy angles, and audience segments. Within the first two weeks, we identify winning combinations and reallocate budget accordingly. Monthly creative refreshes prevent ad fatigue, and detailed UTM tracking ensures every rupee spent is attributable to specific results in your analytics.",
        ],
      },
    ],
    pricingNote: "Social media management from ₹15,000/month. Paid campaign management from ₹10,000/month + ad spend. Free social media audit.",
    features: [
      { title: "Content Creation", description: "Engaging posts, reels, stories, and carousels designed to stop the scroll and drive engagement. Our creative team produces platform-native content that aligns with trending formats and your brand voice to maximize reach and interaction." },
      { title: "Community Management", description: "Active engagement with your audience — responding to comments, DMs, and building authentic relationships. We maintain your brand's online reputation through timely, thoughtful interactions that turn followers into loyal advocates." },
      { title: "Paid Social Ads", description: "Targeted ad campaigns on Meta, LinkedIn, and Twitter that reach your ideal customers with precision. We design creative assets, build audience segments, and optimize campaigns continuously to deliver the best possible return on your advertising spend." },
      { title: "Influencer Partnerships", description: "Strategic influencer collaborations that amplify your brand message to relevant, engaged audiences. We identify, vet, and manage influencer relationships from outreach to campaign execution, ensuring authentic partnerships that drive measurable results." },
      { title: "Analytics & Strategy", description: "Data-driven strategy adjustments based on performance metrics, audience insights, and trend analysis. Our monthly reports break down what is working, what needs improvement, and what strategic shifts will accelerate your social media growth." },
      { title: "Profile Optimization", description: "Complete social media profile setup and optimization for maximum visibility and brand consistency. We optimize bios, highlight covers, link structures, and profile aesthetics to ensure every visitor gets a strong first impression of your brand." },
    ],
    process: [
      { step: "01", title: "Audit", description: "Analyze your current social presence, audience demographics, and competitor strategies." },
      { step: "02", title: "Strategy", description: "Develop a tailored content strategy with posting schedules, themes, and campaign roadmap." },
      { step: "03", title: "Create", description: "Produce high-quality content — graphics, videos, copy — aligned with your brand and strategy." },
      { step: "04", title: "Engage", description: "Manage daily posting, community engagement, and real-time trend leveraging." },
      { step: "05", title: "Report", description: "Monthly performance reviews with insights, learnings, and strategy refinements." },
    ],
    stats: [
      { label: "Followers Grown", value: "2M+" },
      { label: "Engagement Rate", value: "4.8%" },
      { label: "Brands Managed", value: "100+" },
      { label: "Content Pieces/Mo", value: "500+" },
    ],
    faqs: [
      { q: "Which platforms do you manage?", a: "We manage Instagram, Facebook, LinkedIn, Twitter/X, YouTube, and Pinterest based on where your audience is most active." },
      { q: "Do you create all the content?", a: "Yes, our creative team handles everything — graphics, videos, copy, hashtag research, and posting." },
      { q: "How often will you post?", a: "Posting frequency depends on your plan and platform, typically 4-7 times per week with daily story content." },
      { q: "Can you handle negative comments?", a: "Yes, we have crisis management protocols and respond professionally to maintain your brand reputation." },
    ],
    relatedServices: ["ai-influencer-management", "graphic-design", "video-editing"],
  },

  "ai-influencer-management": {
    slug: "ai-influencer-management",
    title: "AI Influencer Management",
    tagline: "The future of influence is AI-powered.",
    description: "Cutting-edge AI influencer creation and management for brands looking to lead the next wave of digital marketing. Our team in Chandigarh designs hyper-realistic virtual influencer personas, develops their content strategies, and manages their social media presence to deliver consistent, always-on brand representation for forward-thinking companies across India.",
    heroDescription: "We create and manage AI-generated virtual influencers that represent your brand 24/7 across social platforms. From concept to content strategy, our AI influencer solutions deliver consistent brand messaging with unlimited creative potential.",
    metaTitle: "AI Influencer Management Services | TML Agency",
    metaDescription: "Create and manage AI virtual influencers with TML Agency. Custom AI persona design, content generation, and social media management for brands in Chandigarh and India.",
    metaKeywords: ["AI influencer management", "virtual influencer creation", "AI persona design", "digital influencer marketing", "AI content generation", "virtual brand ambassador"],
    seoContent: [
      "AI-powered virtual influencers are transforming the way brands connect with digital audiences. At TML Agency, we are among the first agencies in India to offer comprehensive AI influencer creation and management services. Our team designs custom virtual personas with unique visual identities, compelling backstories, and distinct personalities that resonate with your target audience across social media platforms.",
      "Our AI influencer services cover the entire lifecycle from concept development to ongoing content management. We use advanced generative AI tools to create hyper-realistic virtual personas that maintain visual consistency across photos, videos, and stories. Each AI influencer is built with a detailed content strategy, narrative arc, and engagement plan that drives authentic audience connections and measurable brand awareness.",
      "Brands in Chandigarh and across India are turning to AI influencers for their unique advantages: they are always on-brand, available around the clock, and free from the unpredictability of human influencer partnerships. Whether you want a virtual brand ambassador, a product spokesperson, or a social media personality, TML delivers AI influencer solutions that push the boundaries of digital marketing innovation.",
    ],
    deepContent: [
      {
        heading: "What Are AI Influencers and Why Brands Are Investing",
        paragraphs: [
          "AI influencers are computer-generated virtual personas that exist and operate on social media platforms just like human influencers — posting content, engaging with followers, and representing brands — except they are entirely digital. Created using generative AI, 3D modelling, and advanced image synthesis tools like Midjourney, Stable Diffusion, and custom-trained models, these virtual personalities can look photorealistic or stylised depending on the brand's creative direction. Globally, the virtual influencer market is projected to cross $37 billion by 2027, and early-mover brands are already seeing engagement rates 3x higher than traditional influencer partnerships.",
          "The business case is compelling. AI influencers never have off-brand moments, never get caught in scandals, never demand renegotiated contracts, and can produce content at a pace no human can match. They can be placed in any location, wear any outfit, and adapt their look seasonally without a single flight or photoshoot. For brands in India, this eliminates the unpredictability and high costs of celebrity and macro-influencer partnerships while delivering consistent, controllable brand representation across platforms.",
          "At TML Agency, we have created over 25 AI personas for brands across fashion, beauty, tech, and lifestyle verticals. Our AI influencers are not just static images — they have defined personalities, evolving storylines, and authentic engagement patterns that build real audience connections. One virtual persona we created for a Chandigarh-based fashion label gained 50,000 followers in three months with a 6.2% engagement rate, outperforming the brand's previous human influencer collaborations at a fraction of the ongoing cost.",
        ],
      },
      {
        heading: "Creating an AI Influencer: Technology, Strategy, and Execution",
        paragraphs: [
          "Building a successful AI influencer is not just a technical exercise — it requires the same strategic foundation as building any brand. Our process starts with defining the persona's purpose: Who is the target audience? What brand values should the persona embody? What platforms will they operate on? We develop a detailed character bible covering appearance, personality traits, backstory, voice tone, content themes, and even a fictional biography that audiences can connect with emotionally.",
          "On the technical side, we use a combination of tools depending on the desired aesthetic. For photorealistic personas, we train custom AI models on curated reference datasets to maintain visual consistency across hundreds of images. Tools like ComfyUI, ControlNet, and custom LoRA models allow us to control pose, expression, clothing, and environment while keeping the face and body proportions identical in every output. For video content, we use AI video generation and lip-sync tools to create dynamic content including Reels and Stories that feel natural and engaging.",
          "The launch strategy is critical. We do not just post and hope — we build pre-launch buzz with teaser content, collaborate with real human creators to introduce the AI persona to existing audiences, and use paid promotion to accelerate initial follower growth. Post-launch, our team manages the content calendar, handles community engagement in the persona's voice, and tracks performance metrics weekly to refine the strategy. Most AI influencer accounts reach a sustainable growth trajectory within 60-90 days of consistent management.",
        ],
      },
      {
        heading: "AI Influencer vs Human Influencer: Costs, Control, and ROI",
        paragraphs: [
          "The question brands ask most is: should we invest in an AI influencer or stick with human influencer partnerships? The honest answer depends on your goals, budget, and timeline. Human influencers bring authentic audience trust, established followings, and the unpredictable creative spark that comes from real personality. A well-matched human influencer can generate immediate results — a single post from a macro influencer with 500K followers can drive thousands of website visits overnight. The downside is cost (₹50,000-5,00,000+ per post for established influencers), lack of content control, exclusivity limitations, and the risk of personal controversies affecting your brand.",
          "AI influencers offer a different value proposition: complete brand control, unlimited content production, zero risk of off-brand behaviour, and decreasing cost per content piece over time. The upfront investment is higher — creating a polished AI persona with a consistent visual identity typically costs ₹1-3 lakh — but the ongoing content production cost is significantly lower than continuous human influencer fees. For brands that need always-on social presence, product-focused content at scale, or a distinctive brand character that can operate across markets and languages, AI influencers deliver superior long-term ROI.",
          "Many of our clients at TML use a hybrid approach: AI influencers handle the consistent, high-volume brand presence — daily posts, product showcases, seasonal content — while human influencers are activated for specific campaign moments, events, and UGC-style content that benefits from genuine human connection. This combination gives brands the best of both worlds: the reliability and scalability of AI with the authenticity and social proof of human partnerships.",
        ],
      },
    ],
    pricingNote: "AI influencer creation from ₹1,00,000 for character design and initial content. Monthly management from ₹50,000 including content creation and campaign strategy. Free consultation.",
    features: [
      { title: "AI Persona Creation", description: "Design unique virtual influencer personas with custom looks, personalities, and brand-aligned backstories. We develop detailed character profiles including visual style guides, voice tone documentation, and personality traits that ensure consistency across all content." },
      { title: "Content Generation", description: "AI-powered content creation — photos, videos, and stories featuring your virtual influencer in any scenario. Our production pipeline delivers high-quality, visually consistent content at scale, placing your AI persona in diverse settings and contexts that engage audiences." },
      { title: "Campaign Strategy", description: "Strategic campaign planning leveraging AI influencers for product launches, brand awareness, and engagement. We design multi-platform campaign roadmaps with clear objectives, content calendars, and performance benchmarks tailored to your brand goals." },
      { title: "Cross-Platform Management", description: "Manage your AI influencer's presence across Instagram, TikTok, YouTube, and emerging platforms. We adapt content formats, posting strategies, and engagement approaches for each platform to maximize reach and build a cohesive cross-channel following." },
      { title: "Brand Collaborations", description: "Facilitate partnerships between AI influencers and brands, managing campaigns and deliverables. We handle negotiation, creative briefing, content production, and performance reporting for collaborations that deliver value to all parties involved." },
      { title: "Analytics & Growth", description: "Track engagement, audience growth, and campaign ROI with detailed performance dashboards. Our analytics reports identify top-performing content types, audience demographics, and growth opportunities to continuously refine your AI influencer strategy." },
    ],
    process: [
      { step: "01", title: "Concept", description: "Define the AI influencer persona, visual style, personality traits, and target audience." },
      { step: "02", title: "Create", description: "Design and generate the AI influencer using advanced generative AI tools and custom workflows." },
      { step: "03", title: "Strategy", description: "Build content calendar, narrative arcs, and engagement strategy for organic growth." },
      { step: "04", title: "Launch", description: "Launch across platforms with coordinated content drops and community engagement." },
      { step: "05", title: "Grow", description: "Scale presence with collaborations, trends, and data-driven content optimization." },
    ],
    stats: [
      { label: "AI Personas Created", value: "25+" },
      { label: "Combined Following", value: "500K+" },
      { label: "Engagement Rate", value: "6.2%" },
      { label: "Campaigns Delivered", value: "80+" },
    ],
    faqs: [
      { q: "What is an AI influencer?", a: "An AI influencer is a virtual persona created using AI technology that acts as a brand ambassador on social media — always on-brand, available 24/7, and fully customizable." },
      { q: "How realistic are AI influencers?", a: "Modern AI can create hyper-realistic virtual personas that are nearly indistinguishable from real people, with consistent appearance across all content." },
      { q: "What are the legal considerations?", a: "We ensure full transparency and disclosure compliance. AI influencers are clearly identified as virtual, following platform guidelines." },
      { q: "Can AI influencers interact with followers?", a: "Yes, we can set up AI-powered response systems for comments and DMs, maintaining the persona's voice and personality." },
    ],
    relatedServices: ["social-media", "video-editing", "graphic-design"],
  },

  "lead-generation": {
    slug: "lead-generation",
    title: "Lead Generation",
    tagline: "Fill your pipeline with qualified leads.",
    description: "Data-driven lead generation strategies that attract, capture, and convert high-quality prospects for your business. Our team in Chandigarh builds complete lead generation systems using landing pages, conversion optimization, CRM integration, and multi-channel campaigns to deliver qualified leads that fuel sustainable growth for businesses across India.",
    heroDescription: "We build lead generation machines that consistently deliver qualified prospects to your sales team. Through a mix of paid ads, landing pages, email marketing, and automation — we create systems that fill your pipeline and fuel growth.",
    metaTitle: "Lead Generation Services Chandigarh | TML Agency",
    metaDescription: "Expert lead generation services in Chandigarh. High-converting landing pages, CRM integration, and conversion optimization to fill your sales pipeline. Contact TML Agency.",
    metaKeywords: ["lead generation Chandigarh", "landing page optimization", "conversion rate optimization", "CRM integration services", "B2B lead generation India", "sales funnel optimization", "lead nurturing"],
    seoContent: [
      "Generating a steady stream of qualified leads is essential for business growth. At TML Agency in Chandigarh, we build end-to-end lead generation systems that combine high-converting landing pages, targeted advertising, email automation, and CRM integration. Our data-driven approach ensures you receive leads that are genuinely interested in your products or services, reducing wasted sales efforts and improving conversion rates.",
      "Our lead generation process starts with understanding your ideal customer profile and mapping out the buyer journey. We then design conversion-optimized landing pages with compelling offers and clear calls to action. Multi-channel campaigns across Google Ads, Meta, and LinkedIn drive targeted traffic, while automated email sequences nurture prospects until they are ready to engage with your sales team.",
      "We have generated over fifty thousand leads for businesses across Chandigarh and India, spanning industries like real estate, education, healthcare, SaaS, and professional services. Our clients see an average forty percent reduction in cost per lead through continuous A/B testing, funnel optimization, and audience refinement. Every lead generation system we build integrates seamlessly with your existing CRM and sales workflow for smooth handoff and tracking.",
    ],
    deepContent: [
      {
        heading: "Lead Generation Funnels That Convert: Our Proven Framework",
        paragraphs: [
          "Most lead generation fails because businesses treat it as a single step — run an ad, collect a form, hope for the best. At TML Agency, we build multi-stage funnels that guide prospects from initial awareness through to sales-ready conversion. Our framework has four layers: attention (ads and content that reach the right audience), capture (landing pages and lead magnets that collect contact information), nurture (email and WhatsApp sequences that build trust over 7-14 days), and convert (sales triggers and handoff workflows that close deals).",
          "Each layer is optimised independently. We A/B test ad creatives and targeting at the attention layer, test headlines, form lengths, and offer types at the capture layer, sequence timing and content at the nurture layer, and CTA placement and urgency triggers at the conversion layer. For a real estate client in Chandigarh, this layered approach reduced cost per qualified site visit from ₹1,200 to ₹340 within three months — a 72% improvement — because we identified that the bottleneck was not traffic but the nurture stage where prospects were going cold.",
          "Every funnel we build includes full analytics instrumentation. We track not just leads but lead-to-sale conversion rates, time-to-close, and revenue per lead source. This data feeds back into optimisation, creating a compounding improvement cycle where your lead generation system gets measurably better every month.",
        ],
      },
      {
        heading: "B2B vs B2C Lead Generation: Different Strategies for Different Goals",
        paragraphs: [
          "B2B and B2C lead generation require fundamentally different approaches, and using the wrong playbook is a guaranteed way to burn budget. B2B leads have longer decision cycles (30-90 days average), involve multiple stakeholders, and respond to logic-driven content like case studies, whitepapers, and ROI calculators. We generate B2B leads primarily through LinkedIn Ads, Google Search campaigns targeting high-intent keywords, and content marketing funnels that establish thought leadership before asking for contact details.",
          "B2C lead generation is faster-paced and emotion-driven. Prospects decide in minutes or hours, respond to social proof and urgency, and engage through Instagram, Facebook, and Google. For B2C campaigns, we use lead magnets like discount codes, free consultations, and quiz-style funnels that qualify prospects while keeping them engaged. A Chandigarh-based fitness brand we work with generates 800+ leads per month at ₹45 per lead using an Instagram quiz funnel that recommends personalised fitness plans — the quiz format pre-qualifies leads so the sales team only speaks with genuinely interested prospects.",
          "Regardless of B2B or B2C, we integrate every lead source with your CRM — HubSpot, Zoho, Salesforce, or even a simple Google Sheets setup for early-stage businesses. Lead scoring rules automatically prioritise hot leads, and automated notifications ensure your sales team responds within minutes, not hours. Speed to lead is one of the most overlooked factors in conversion — responding within 5 minutes increases conversion rates by 8x compared to responding within an hour.",
        ],
      },
      {
        heading: "Landing Page Optimization: Turning Traffic Into Leads",
        paragraphs: [
          "Your landing page is the single most important asset in your lead generation system — it is where traffic either converts or bounces. Our landing page optimization process at TML is built on testing over 200 landing pages across industries. We have found that pages loading under 2.5 seconds convert 2x better than slower pages, that reducing form fields from 7 to 3 increases submissions by 60%, and that social proof placed above the fold improves trust signals measurably.",
          "Every landing page we build follows a proven structure: a benefit-focused headline that matches the ad promise, a supporting subheadline with a specific outcome or statistic, three to four trust signals (client logos, testimonials, certifications), a clear and visible form with minimal fields, and a compelling CTA button with action-oriented copy. We create mobile-first designs because over 70% of ad traffic now comes from smartphones, and a page that looks perfect on desktop but clunky on mobile will lose the majority of your paid clicks.",
          "Post-launch, we run continuous A/B tests using tools like Google Optimize and VWO. We test one variable at a time — headline copy, CTA button colour, form placement, hero image, social proof format — and make data-driven decisions based on statistical significance, not gut feeling. Our average landing page converts at 12% compared to the industry average of 2-5%, and we aim to improve that further every month through systematic testing.",
        ],
      },
    ],
    pricingNote: "Lead generation packages from ₹25,000/month including landing pages, ad management, and CRM setup. Performance-based pricing available. Free funnel audit.",
    features: [
      { title: "Landing Page Design", description: "High-converting landing pages optimized for lead capture with compelling copy and clear CTAs. Each page is built with proven persuasion frameworks, mobile-responsive layouts, and fast load times to maximize the percentage of visitors who become leads." },
      { title: "Lead Magnets", description: "Create valuable resources — ebooks, webinars, templates — that attract your ideal customers. We develop lead magnets that address specific pain points in your audience's journey, ensuring high download rates and quality lead capture." },
      { title: "Email Marketing", description: "Automated nurture sequences that build trust and guide leads through your sales funnel. Our email campaigns feature personalized content, behavioural triggers, and strategic timing to keep prospects engaged and moving toward a purchase decision." },
      { title: "Paid Lead Gen", description: "Targeted ad campaigns on Google, Meta, and LinkedIn designed specifically for lead generation. We test multiple ad formats, audience segments, and offers simultaneously to identify the most cost-effective channels for acquiring qualified leads." },
      { title: "CRM Integration", description: "Seamless integration with your CRM to track, score, and manage leads efficiently. We connect your lead generation systems with tools like HubSpot, Salesforce, or Zoho to ensure every lead is captured, scored, and routed to the right sales representative." },
      { title: "Conversion Optimization", description: "Continuous A/B testing and funnel optimization to improve lead quality and reduce cost per lead. We test headlines, forms, CTAs, page layouts, and offers systematically, using data to make incremental improvements that compound into significant results." },
    ],
    process: [
      { step: "01", title: "Analyze", description: "Understand your ideal customer profile, sales process, and current lead generation efforts." },
      { step: "02", title: "Build", description: "Create landing pages, lead magnets, and nurture email sequences tailored to your audience." },
      { step: "03", title: "Launch", description: "Activate multi-channel lead gen campaigns with tracking and attribution in place." },
      { step: "04", title: "Nurture", description: "Automated follow-up sequences that qualify and warm leads before they reach your sales team." },
      { step: "05", title: "Optimize", description: "Analyze performance data, refine targeting, and scale winning campaigns for more qualified leads." },
    ],
    stats: [
      { label: "Leads Generated", value: "50K+" },
      { label: "Avg Cost Per Lead", value: "-40%" },
      { label: "Conversion Rate", value: "12%" },
      { label: "Funnels Built", value: "500+" },
    ],
    faqs: [
      { q: "What types of leads can you generate?", a: "We generate B2B and B2C leads across industries — from real estate and education to SaaS, healthcare, and e-commerce." },
      { q: "How do you ensure lead quality?", a: "We use precise targeting, lead scoring, and qualification workflows to ensure only high-quality leads reach your sales team." },
      { q: "Do you provide the leads or the system?", a: "Both. We build and manage the entire lead generation system, delivering qualified leads directly to your CRM or inbox." },
      { q: "What's the average cost per lead?", a: "CPL varies by industry and channel, typically ranging from ₹50-500. We continuously optimize to reduce your CPL." },
    ],
    relatedServices: ["google-ads", "seo", "social-media"],
  },

  "music-release": {
    slug: "music-release",
    title: "Music Release & Promotion",
    tagline: "Get your music heard by millions.",
    description: "End-to-end music release strategy covering distribution, promotion, playlist pitching, and audience growth. Based in Chandigarh, our team helps independent artists and labels distribute music on Spotify, Apple Music, and JioSaavn, with specialized expertise in Punjabi music promotion and playlist placements across India and globally.",
    heroDescription: "We help independent artists and labels launch their music with maximum impact. From distribution setup to social media campaigns, playlist pitching, and PR — we handle the business so you can focus on creating.",
    metaTitle: "Music Release & Promotion Services | TML Agency",
    metaDescription: "End-to-end music release and promotion services in Chandigarh. Spotify distribution, playlist pitching, and Punjabi music marketing by TML Agency. Get heard by millions.",
    metaKeywords: ["music release services", "Spotify playlist pitching", "music distribution India", "Punjabi music promotion", "music marketing Chandigarh", "artist promotion", "music PR services"],
    seoContent: [
      "Releasing music in today's streaming-first world requires more than just uploading tracks to a distributor. At TML Agency in Chandigarh, we provide complete music release strategies that cover distribution setup, playlist pitching, social media campaigns, and press outreach. Our team has helped launch over five hundred songs, generating more than fifty million streams for independent artists and labels across India.",
      "Our playlist pitching service is built on relationships with curators and a deep understanding of algorithmic discovery on Spotify, Apple Music, and YouTube Music. We prepare editorial-quality pitch packages, target genre-specific playlists, and time submissions strategically to maximize your chances of placement. For Punjabi music artists, we have specialized connections with regional playlist curators and media outlets that amplify reach within the community.",
      "From pre-release buzz building to sustained post-launch promotion, we manage every aspect of your music marketing. Our services include social media content creation, influencer partnerships, YouTube premiere strategies, and paid advertising campaigns. Based in the heart of India's Punjabi music scene in Chandigarh, TML understands the cultural nuances and audience behaviour that drive success in this vibrant and competitive industry.",
    ],
    deepContent: [
      {
        heading: "How to Release Music Professionally: Distribution to Promotion",
        paragraphs: [
          "Releasing music in 2026 is more accessible than ever — but standing out requires strategy. The process starts with choosing the right distributor (DistroKid, TuneCore, CD Baby) and ensuring your metadata, ISRC codes, and cover art meet platform specifications. At TML, we handle the entire distribution setup across 150+ platforms including Spotify, Apple Music, Amazon Music, YouTube Music, JioSaavn, and Gaana.",
          "Pre-release strategy is where most independent artists fall short. We build a 4-6 week pre-release campaign that includes teaser content, pre-save links, social media countdowns, and press outreach. For Punjabi music artists — which is our specialty given our Chandigarh base — we tap into regional media outlets, radio stations, and cultural communities that drive initial momentum.",
        ],
      },
      {
        heading: "Music Marketing: Getting Your Track Heard in a Crowded Market",
        paragraphs: [
          "Over 100,000 tracks are uploaded to Spotify every single day. Getting heard requires more than talent — it requires marketing. Our approach combines algorithmic playlist pitching (Release Radar, Discover Weekly triggers), editorial playlist submissions, and influencer seeding. We analyse your listener demographics and target playlists where your music fits naturally rather than forcing placements that don't convert.",
          "Beyond playlists, we run targeted social media campaigns using Meta Ads and YouTube Ads to reach listeners based on genre preferences, artist affinity, and geographic targeting. Our Chandigarh team has particular expertise in promoting Punjabi, Hindi, and regional Indian music, with connections to music bloggers, YouTube channels, and cultural influencers who amplify reach authentically.",
        ],
      },
      {
        heading: "Independent Artist vs Label: Making the Right Choice",
        paragraphs: [
          "The music industry has shifted dramatically in favour of independent artists. You keep 100% of your royalties, maintain creative control, and own your masters. However, labels offer funding, industry connections, and promotional machinery that independent artists must build themselves. TML bridges this gap — providing label-level marketing and distribution services while you retain full ownership.",
          "For artists in the early stages, we recommend starting independent and building a catalogue of 5-10 released tracks with consistent branding and marketing. This establishes your market presence and streaming history, which becomes valuable whether you choose to remain independent or negotiate from a position of strength with a label later.",
        ],
      },
    ],
    pricingNote: "Music release packages from ₹15,000 including distribution across 150+ platforms. Promotion and playlist pitching from ₹25,000. Complete release strategy with pre-release campaign, distribution, and 30-day post-launch promotion from ₹50,000. Free consultation for first-time artists.",
    features: [
      { title: "Distribution Setup", description: "Get your music on Spotify, Apple Music, YouTube Music, JioSaavn, and 150+ platforms worldwide. We handle metadata optimization, release scheduling, and platform-specific requirements to ensure your music is available everywhere your listeners are." },
      { title: "Playlist Pitching", description: "Strategic pitching to editorial, algorithmic, and independent playlists for maximum stream exposure. Our team crafts compelling pitch narratives and leverages curator relationships to secure placements that drive sustained listening growth." },
      { title: "Social Media Campaigns", description: "Pre-release buzz, launch day activation, and sustained promotion campaigns across all platforms. We create shareable content including teasers, behind-the-scenes clips, lyric videos, and fan engagement posts that build anticipation and drive streams." },
      { title: "Music Video Production", description: "Concept development, filming direction, and post-production for visually stunning music videos. Our creative team brings your musical vision to life with cinematic storytelling that enhances the listening experience and boosts audience engagement." },
      { title: "PR & Press Coverage", description: "Media outreach to music blogs, magazines, and online publications for reviews and features. We write professional press releases, pitch to relevant journalists, and secure coverage that builds your credibility and introduces your music to new audiences." },
      { title: "Artist Branding", description: "Complete artist identity development — visual branding, EPK creation, and social media aesthetics. We craft a cohesive artist image that tells your story, resonates with your target audience, and sets you apart in a crowded musical landscape." },
    ],
    process: [
      { step: "01", title: "Pre-Release", description: "Build anticipation with teasers, pre-save campaigns, and audience engagement 4-6 weeks before launch." },
      { step: "02", title: "Distribution", description: "Set up distribution across all major platforms with proper metadata and release scheduling." },
      { step: "03", title: "Launch", description: "Coordinated release day push across social media, playlists, PR outreach, and paid promotions." },
      { step: "04", title: "Promote", description: "Sustained promotion with content marketing, influencer partnerships, and targeted ad campaigns." },
      { step: "05", title: "Analyze", description: "Track streaming data, audience growth, and campaign performance to inform future releases." },
    ],
    stats: [
      { label: "Songs Released", value: "500+" },
      { label: "Total Streams", value: "50M+" },
      { label: "Playlist Placements", value: "1000+" },
      { label: "Artists Managed", value: "100+" },
    ],
    faqs: [
      { q: "Do you handle distribution?", a: "Yes, we partner with leading distributors to get your music on all major streaming platforms worldwide." },
      { q: "How far in advance should I plan a release?", a: "We recommend starting 6-8 weeks before your release date for maximum promotional impact." },
      { q: "Can you help with music video production?", a: "Absolutely. We handle everything from concept and storyboard to filming, editing, and distribution." },
      { q: "What genres do you work with?", a: "We work with all genres — Pop, Hip-Hop, Punjabi, EDM, Indie, Classical, and more." },
    ],
    relatedServices: ["video-editing", "social-media", "branding"],
  },

  "video-editing": {
    slug: "video-editing",
    title: "Video Editing & Production",
    tagline: "Stories that move people.",
    description: "Professional video editing and production services that bring your vision to life with cinematic quality. Our post-production team in Chandigarh delivers everything from social media reels and corporate videos to commercial productions, combining expert editing, motion graphics, and colour grading to create content that captivates audiences across India.",
    heroDescription: "From raw footage to polished masterpieces — our video editing team transforms your content into compelling visual stories. We handle everything from social media reels to corporate films, documentaries, and commercial productions.",
    metaTitle: "Video Editing & Production Services | TML Chandigarh",
    metaDescription: "Professional video editing and post-production services in Chandigarh. Reels, corporate videos, motion graphics, and colour grading by TML Agency. Fast 48-hour turnaround.",
    metaKeywords: ["video editing services Chandigarh", "post-production India", "social media reels editing", "corporate video production", "motion graphics", "colour grading", "video production agency"],
    seoContent: [
      "Video content drives more engagement than any other format across digital platforms. At TML Agency in Chandigarh, our professional video editing team transforms raw footage into polished, compelling visual stories. Whether you need scroll-stopping reels for Instagram, a corporate brand film, or a high-impact commercial, our post-production expertise ensures every frame serves your message and captivates your audience.",
      "Our video editing services include professional cutting and pacing, colour grading, sound design, motion graphics, subtitle creation, and format optimization for every distribution channel. We work with footage from any camera system and deliver in all required formats. Our editors understand platform-specific requirements for Instagram, YouTube, LinkedIn, and TikTok, ensuring your content performs at its best wherever it is published.",
      "With over two thousand videos produced and a hundred million views generated, TML is a trusted video production partner for businesses and creators across Chandigarh and India. Our standard turnaround of forty-eight hours for short-form content means you never miss a trend or deadline. From Punjabi music videos to corporate explainers and e-commerce product videos, we bring creative excellence and technical precision to every project.",
    ],
    deepContent: [
      { heading: "Video Marketing in 2026: Why Every Brand Needs Video Content", paragraphs: ["Video now accounts for over 82% of all consumer internet traffic. On Instagram, Reels get 22% more engagement than static posts. On LinkedIn, video posts generate 5x more engagement than text. YouTube remains the world's second-largest search engine. If your brand isn't creating video content, you're invisible to a massive portion of your audience.", "For Indian businesses, short-form video on Instagram Reels and YouTube Shorts is the highest-ROI content format available. Our Chandigarh-based team produces 15-60 second videos optimized for vertical viewing, with attention-grabbing hooks in the first 2 seconds, platform-native captions, and trending audio integration."] },
      { heading: "Types of Video Content That Drive Business Results", paragraphs: ["Different video formats serve different business goals. Product demo videos increase purchase confidence by 73%. Customer testimonial videos build trust faster than any written review. Explainer videos reduce support tickets and help users understand complex offerings. Behind-the-scenes content humanizes your brand and increases loyalty.", "For e-commerce brands, we create product showcase videos, unboxing content, and shoppable video ads. For service businesses, we produce case study videos, team introductions, and process explainers. Every video is formatted for its target platform — 9:16 for Reels/Shorts, 16:9 for YouTube, and 1:1 for feed posts."] },
      { heading: "Our Video Production Process: From Concept to Final Cut", paragraphs: ["Our process starts with a creative brief — understanding your message, audience, platform, and goals. We storyboard, script, and edit through rough cut, sound design, colour grading, graphics, and final delivery. Standard turnaround is 48 hours for short-form and 5-7 business days for long-form projects.", "We use Adobe Premiere Pro, After Effects, and DaVinci Resolve for professional-grade results. All projects include two rounds of revisions. We deliver in all required formats and resolutions, with separate versions optimized for each platform."] },
    ],
    pricingNote: "Video editing from ₹5,000 per video for social media reels and short-form content. Corporate videos and brand films from ₹25,000-₹50,000+. Motion graphics and animated explainers from ₹15,000. Monthly retainer packages from ₹20,000/month. Free sample edit for first-time clients.",
    features: [
      { title: "Social Media Videos", description: "Scroll-stopping reels, TikToks, and short-form content optimized for each platform's algorithm. We edit with trending formats, dynamic transitions, and attention-grabbing hooks that maximize watch time and drive shares across social platforms." },
      { title: "Corporate Videos", description: "Professional corporate films, brand documentaries, and company culture videos that build trust. We craft narratives that showcase your company's values, team, and expertise in a way that resonates with clients, partners, and prospective employees." },
      { title: "Commercial Production", description: "High-impact advertising videos for TV, YouTube, and social media campaigns. Our team combines creative storytelling with persuasive messaging to produce commercials that capture attention, communicate value, and drive conversions for your brand." },
      { title: "Motion Graphics", description: "Animated logos, infographics, explainer videos, and dynamic visual effects that captivate audiences. We create custom motion design elements that simplify complex ideas, add visual polish, and make your content stand out in crowded feeds." },
      { title: "Color Grading", description: "Professional color correction and grading that gives your footage a cinematic, polished look. Our colourists establish visual mood and consistency across your project, ensuring every shot looks its best and maintains your brand's visual identity." },
      { title: "Post-Production", description: "Sound design, voiceover integration, subtitle creation, and final mastering for any distribution format. We handle every technical detail of the finishing process to deliver broadcast-quality results that meet the standards of any platform or broadcaster." },
    ],
    process: [
      { step: "01", title: "Brief", description: "Understand your vision, objectives, target audience, and creative direction for the project." },
      { step: "02", title: "Review", description: "Analyze raw footage, select best takes, and plan the edit structure and storytelling flow." },
      { step: "03", title: "Edit", description: "Professional editing with transitions, pacing, music, and visual effects aligned with your brand." },
      { step: "04", title: "Refine", description: "Color grading, sound mixing, motion graphics, and fine-tuning based on your feedback." },
      { step: "05", title: "Deliver", description: "Export in all required formats optimized for your chosen platforms and distribution channels." },
    ],
    stats: [
      { label: "Videos Produced", value: "2000+" },
      { label: "Hours of Content", value: "5000+" },
      { label: "Views Generated", value: "100M+" },
      { label: "Turnaround Time", value: "48hrs" },
    ],
    faqs: [
      { q: "What formats do you deliver in?", a: "We deliver in any format needed — MP4, MOV, ProRes, plus optimized versions for each social platform." },
      { q: "How fast can you turn around a project?", a: "Standard turnaround is 48-72 hours for short-form content. Larger projects are scoped individually." },
      { q: "Do you provide raw footage?", a: "If we handle production, raw footage can be provided upon request. For editing-only projects, you retain all originals." },
      { q: "Can you add subtitles and translations?", a: "Yes, we offer subtitling in multiple languages and can handle full localization for international campaigns." },
    ],
    relatedServices: ["music-release", "social-media", "graphic-design"],
  },

  "branding-packaging": {
    slug: "branding-packaging",
    title: "Branding & Packaging Design",
    tagline: "Packaging that sells off the shelf.",
    description: "Eye-catching packaging design that communicates your brand story and drives purchase decisions at the point of sale. Our design studio in Chandigarh creates retail packaging, label designs, and unboxing experiences for product brands across India, combining print expertise with creative design to ensure your products stand out on every shelf.",
    heroDescription: "Great packaging doesn't just protect products — it sells them. Our design team creates packaging that tells your brand story, stands out on shelves, and creates unboxing experiences that customers share and remember.",
    metaTitle: "Packaging Design Services Chandigarh | TML Agency",
    metaDescription: "Professional packaging and label design services in Chandigarh. Product packaging, box design, and print coordination for brands across India by TML Agency.",
    metaKeywords: ["packaging design Chandigarh", "label design India", "product packaging services", "print design agency", "box design", "retail packaging", "packaging branding"],
    seoContent: [
      "Product packaging is often the final touchpoint before a purchase decision, making it one of the most important elements of your brand experience. At TML Agency in Chandigarh, our packaging design team creates visually compelling, structurally sound packaging that communicates your brand values and drives sales at the point of purchase. We design for shelf impact, ensuring your products command attention in competitive retail environments.",
      "Our packaging design services cover the complete spectrum from initial concept to print-ready files. We design custom packaging for food and beverages, cosmetics, health supplements, consumer electronics, and fashion products. Every design considers regulatory requirements, material specifications, and production feasibility alongside visual appeal. We also create detailed 3D mockups so you can visualize the final product before committing to print.",
      "Based in Chandigarh, we work with brands across India to deliver packaging that balances creativity with commercial effectiveness. Our team coordinates directly with printing partners to ensure colour accuracy, material quality, and production consistency. Whether you need a single product label or a complete packaging system for an entire product line, TML brings the design expertise and print knowledge to bring your vision to life.",
    ],
    deepContent: [
      { heading: "Packaging Design That Sells: The Psychology of Consumer Decisions", paragraphs: ["72% of consumers say packaging design influences their purchase decision. On a crowded retail shelf, your product has approximately 3 seconds to capture attention. Colour triggers emotional associations — red conveys urgency, blue signals trust, green communicates health. Typography, imagery, and structural shape all communicate quality and brand personality before a single word is read.", "At TML, we apply consumer psychology to every packaging project. We conduct shelf simulation tests to evaluate visibility against competitors, use eye-tracking principles to guide information hierarchy, and ensure your packaging's visual narrative aligns with your brand positioning."] },
      { heading: "Sustainable Packaging: Meeting Consumer Demand While Staying on Brand", paragraphs: ["73% of Indian consumers say they would change consumption habits to reduce environmental impact. Sustainable packaging is a competitive advantage. We design with eco-friendly materials, minimal waste principles, and recyclable structures without compromising visual impact.", "Our team works with kraft paper, sugarcane bagasse, recycled cardboard, and biodegradable films. We help brands communicate sustainability through earthy colour palettes, tactile textures, and clear recycling instructions that resonate with environmentally conscious consumers."] },
      { heading: "From Concept to Shelf: Our Packaging Design Process", paragraphs: ["Our process begins with market research — analysing competitors' shelf presence, identifying visual gaps, and understanding your target consumer. We develop 2-3 creative directions presented as photorealistic 3D mockups. After refinement, we prepare production files with exact colour specifications (Pantone/CMYK), dieline templates, and material callouts.", "We coordinate with your printing partner or recommend trusted printers from our network across India. Our team manages pre-press proofing, colour matching, and production sampling. From concept to shelf-ready packaging, typical timelines run 4-8 weeks."] },
    ],
    pricingNote: "Packaging design from ₹15,000 per SKU for label design, ₹30,000-₹60,000 for complete box or container design with structural dielines, and ₹1,00,000+ for comprehensive packaging systems. Bulk discounts for 5+ SKUs. 3D mockups included. Free consultation.",
    features: [
      { title: "Product Packaging", description: "Custom packaging design for retail products — from concept sketches to print-ready files. We consider shelf placement, competitor packaging, and consumer psychology to create designs that attract attention and communicate your product's unique value proposition." },
      { title: "Label Design", description: "Eye-catching labels for food, beverages, cosmetics, and consumer products that meet regulatory requirements. Our labels balance visual appeal with information hierarchy, ensuring compliance with FSSAI, BIS, and other regulatory standards while keeping your brand front and centre." },
      { title: "Box & Container Design", description: "Structural design and graphics for boxes, bottles, pouches, and custom container shapes. We work with dieline templates and structural engineers to create packaging forms that are visually distinctive, functionally practical, and cost-effective to produce at scale." },
      { title: "Unboxing Experience", description: "Design the complete unboxing journey — inner packaging, tissue paper, stickers, and thank-you cards. We create memorable unboxing moments that encourage customers to share their experience on social media, generating organic brand awareness and word-of-mouth referrals." },
      { title: "Mockup & Prototyping", description: "3D mockups and physical prototypes to visualize your packaging before going to print. Our realistic mockups help you evaluate design options, present concepts to stakeholders, and make confident decisions before investing in production runs." },
      { title: "Print Coordination", description: "Work directly with printers to ensure color accuracy, material quality, and perfect production. We manage pre-press file preparation, colour proofing, material sourcing, and production oversight to guarantee your final packaging matches the approved design exactly." },
    ],
    process: [
      { step: "01", title: "Research", description: "Study your product, market positioning, competitors, and retail environment." },
      { step: "02", title: "Concept", description: "Develop multiple design concepts exploring different visual directions and packaging structures." },
      { step: "03", title: "Design", description: "Refine the chosen concept with detailed graphics, typography, and regulatory information." },
      { step: "04", title: "Mockup", description: "Create realistic 3D mockups and physical prototypes for testing and stakeholder approval." },
      { step: "05", title: "Production", description: "Prepare print-ready files and coordinate with manufacturers for flawless production." },
    ],
    stats: [
      { label: "Packages Designed", value: "500+" },
      { label: "Product Categories", value: "30+" },
      { label: "Shelf Standout Rate", value: "85%" },
      { label: "Print Partners", value: "15+" },
    ],
    faqs: [
      { q: "Can you design for any product type?", a: "Yes, we design packaging for food, beverages, cosmetics, electronics, fashion, and more across all product categories." },
      { q: "Do you handle the printing too?", a: "We coordinate with trusted print partners to ensure quality, but printing costs are billed separately." },
      { q: "How many design concepts do I get?", a: "We typically present 3 initial concepts, then refine the chosen direction through 2-3 rounds of revision." },
      { q: "Can you work with existing brand guidelines?", a: "Absolutely. We'll work within your brand guidelines to ensure packaging is consistent with your overall identity." },
    ],
    relatedServices: ["branding", "graphic-design", "website-development"],
  },

  "graphic-design": {
    slug: "graphic-design",
    title: "Graphic Design",
    tagline: "Design that communicates. Visuals that convert.",
    description: "Professional graphic design services that bring your brand story to life across every visual touchpoint. Our design team in Chandigarh creates stunning social media graphics, print materials, presentations, and ad creatives that combine aesthetic excellence with strategic communication to help brands across India engage their audiences effectively.",
    heroDescription: "From social media creatives to print materials, presentations to brand collateral — our design team creates visuals that are not just beautiful but strategically designed to communicate, engage, and convert your audience.",
    metaTitle: "Graphic Design Services Chandigarh | TML Agency",
    metaDescription: "Professional graphic design services in Chandigarh. Social media graphics, print design, presentations, and ad creatives by TML Agency. Fast delivery, stunning results.",
    metaKeywords: ["graphic design services Chandigarh", "visual design India", "social media graphics", "print design agency", "presentation design", "ad creative design", "infographic design"],
    seoContent: [
      "Great graphic design is the visual language of your brand, and it speaks before a single word is read. At TML Agency in Chandigarh, our design team creates visuals that communicate your message clearly, engage your audience emotionally, and drive the actions that matter to your business. From social media creatives to print collateral and digital advertisements, every design we produce is strategically crafted for impact.",
      "Our graphic design services cover the full range of visual communication needs. We create social media post designs for Instagram, Facebook, and LinkedIn, as well as print materials including brochures, flyers, posters, and banners. Our presentation design service helps businesses close deals with professional pitch decks and investor presentations. Every project follows your brand guidelines to maintain visual consistency across all touchpoints.",
      "With over ten thousand designs created for two hundred brands, TML is a trusted graphic design partner for businesses across Chandigarh and India. Our subscription-based design plans offer predictable costs and fast turnaround, making professional design accessible for businesses of all sizes. Whether you need a single social media post or ongoing design support for your entire marketing operation, our team delivers quality and creativity on every brief.",
    ],
    deepContent: [
      { heading: "How Professional Graphic Design Impacts Brand Perception", paragraphs: ["First impressions form in 50 milliseconds, and 94% of those first impressions are design-related. Professional design signals credibility, competence, and attention to detail. Poor design — inconsistent fonts, low-resolution images, cluttered layouts — communicates that a business is untrustworthy, regardless of actual product quality.", "Consistent visual design across all touchpoints increases revenue by up to 23%. At TML, every design follows your established brand guidelines — or we help create them. From your Instagram grid to trade show graphics, we ensure consistency that builds recognition and trust."] },
      { heading: "Print Design vs Digital Design: What Modern Businesses Need", paragraphs: ["Digital assets need RGB colour profiles, interactive elements, and platform-specific dimensions. Print materials require CMYK colour profiles, bleed areas, and high-resolution files. Most businesses need both — a real estate developer needs Instagram carousel ads and premium brochures. A restaurant needs social media templates and physical menu designs.", "Our team at TML handles both disciplines with equal expertise, ensuring your brand looks polished whether encountered on a phone screen or in hand. We maintain organized asset libraries so your team can access any design file instantly."] },
      { heading: "Graphic Design for Social Media: Creating Scroll-Stopping Content", paragraphs: ["The average person scrolls 300 feet of content daily on social media. To stop the scroll, visuals need to be bold, clear, and instantly recognizable. We follow the 3-second rule — your key message must be understood within 3 seconds. This means high-contrast visuals, minimal text, strong focal points, and consistent brand elements.", "Our social media design service includes carousels, story templates, highlight covers, YouTube thumbnails, and ad creatives in all formats. We create reusable template systems that maintain quality while enabling rapid content production — essential for brands posting 3-5 times per week."] },
    ],
    pricingNote: "Individual designs from ₹3,000 for social media creatives to ₹15,000 for print materials. Monthly retainer packages from ₹20,000/month (10 designs) to ₹50,000/month (30+ designs with priority turnaround). Presentation design from ₹10,000 per deck. Source files and unlimited revisions included. Free trial design for new clients.",
    features: [
      { title: "Social Media Creatives", description: "Scroll-stopping graphics for Instagram, Facebook, LinkedIn, and all social platforms. We design platform-optimized visuals with the right dimensions, formats, and design trends to ensure maximum engagement and shareability across every channel." },
      { title: "Print Design", description: "Brochures, flyers, posters, banners, and all print materials designed for maximum impact. Our print designs are crafted with attention to colour profiles, bleed settings, and material specifications to ensure the final printed piece matches the digital design perfectly." },
      { title: "Presentation Design", description: "Professional pitch decks, investor presentations, and sales collateral that close deals. We transform complex information into clear, visually compelling slides with consistent formatting, data visualizations, and storytelling flow that keeps your audience engaged." },
      { title: "Infographic Design", description: "Complex data transformed into visually engaging infographics that are easy to understand and share. Our infographic designs combine information architecture with creative illustration to make statistics, processes, and comparisons instantly digestible for your audience." },
      { title: "Ad Creatives", description: "High-performing display ads, banner ads, and campaign creatives optimized for clicks and conversions. We design multiple variants for A/B testing across Google Display Network, social media platforms, and programmatic advertising channels to maximize your campaign results." },
      { title: "Illustration", description: "Custom illustrations, icons, and visual elements that add uniqueness to your brand communications. Our illustrators create bespoke artwork in styles ranging from minimalist line art to detailed digital paintings, giving your brand a distinctive visual signature." },
    ],
    process: [
      { step: "01", title: "Brief", description: "Understand your design needs, brand guidelines, target audience, and project objectives." },
      { step: "02", title: "Concept", description: "Explore creative directions with mood boards, style references, and initial concept sketches." },
      { step: "03", title: "Design", description: "Create polished designs with attention to typography, layout, color, and visual hierarchy." },
      { step: "04", title: "Revise", description: "Refine based on your feedback — we offer multiple revision rounds to get it perfect." },
      { step: "05", title: "Deliver", description: "Export in all required formats — web, print, social — with organized file delivery." },
    ],
    stats: [
      { label: "Designs Created", value: "10K+" },
      { label: "Brands Served", value: "500+" },
      { label: "On-Time Delivery", value: "99%" },
      { label: "Design Awards", value: "15+" },
    ],
    faqs: [
      { q: "What file formats do you deliver?", a: "We deliver in all formats needed — AI, PSD, PDF, PNG, JPG, SVG, and platform-specific sizes for digital use." },
      { q: "Do you offer subscription design plans?", a: "Yes, we offer monthly design retainers where you get a set number of design requests with quick turnaround." },
      { q: "Can you match our existing brand style?", a: "Absolutely. We work within your brand guidelines to maintain consistency across all design deliverables." },
      { q: "What's your typical turnaround time?", a: "Standard designs are delivered within 24-48 hours. Complex projects are scoped with custom timelines." },
    ],
    relatedServices: ["branding", "social-media", "branding-packaging"],
  },

  "link-building": {
    slug: "link-building",
    title: "Link Building",
    tagline: "Build authority. Earn trust. Rank higher.",
    description: "Strategic link building services that boost your domain authority and search rankings. We acquire high-quality backlinks from authoritative, relevant websites through ethical outreach, guest posting, and digital PR strategies that drive lasting SEO results.",
    heroDescription: "We build high-quality backlink profiles that search engines trust. Our link building strategies focus on earning genuine, relevant links that drive authority, referral traffic, and long-term ranking improvements.",
    metaTitle: "Best Link Building Services in Chandigarh | TML Agency",
    metaDescription: "Professional link building services to boost your domain authority and rankings. TML Agency provides ethical, white-hat link building strategies for businesses across India.",
    metaKeywords: ["link building services", "backlink building agency", "SEO link building Chandigarh", "white hat link building", "guest posting services", "digital PR India", "authority building"],
    seoContent: [
      "High-quality backlinks remain one of the top three ranking factors in Google's algorithm. At TML Agency, our link building services focus on acquiring genuine, editorially placed links from authoritative websites in your niche. We use ethical, white-hat strategies including guest posting, digital PR, broken link building, and resource page outreach to build backlink profiles that withstand algorithm updates.",
      "Our link building process begins with a thorough backlink audit of your current profile and competitor analysis. We identify link gaps, toxic links to disavow, and high-value opportunities in your industry. Every link we build is manually vetted for relevance, domain authority, and traffic quality — no PBNs, no link farms, no shortcuts.",
      "Whether you need to build authority for a new website or strengthen an established domain, TML Agency delivers link building campaigns that produce measurable improvements in rankings, organic traffic, and domain authority. Our clients across India, UAE, and North America consistently see 30-60% increases in organic traffic within 6 months of starting a link building campaign.",
    ],
    features: [
      { title: "Guest Posting", description: "High-quality guest posts on authoritative, niche-relevant websites that drive both links and referral traffic. Every placement is manually vetted for quality and relevance." },
      { title: "Digital PR", description: "Earn editorial backlinks from news outlets and industry publications through newsworthy content, data-driven stories, and expert commentary campaigns." },
      { title: "Broken Link Building", description: "Identify broken links on authoritative websites and offer your content as a replacement, earning natural backlinks while helping webmasters fix their sites." },
      { title: "Resource Page Outreach", description: "Get your content listed on curated resource pages in your industry, building relevant links from pages designed to link out to valuable resources." },
      { title: "Competitor Backlink Analysis", description: "Reverse-engineer your competitors' link profiles to uncover proven link opportunities and develop strategies to overtake them in search rankings." },
      { title: "Link Audit & Disavow", description: "Comprehensive audit of your existing backlink profile to identify and remove toxic links that may be holding back your rankings or risking penalties." },
    ],
    process: [
      { step: "01", title: "Audit", description: "Analyse your current backlink profile and identify gaps compared to top-ranking competitors." },
      { step: "02", title: "Strategy", description: "Develop a custom link building roadmap targeting high-authority, relevant opportunities." },
      { step: "03", title: "Outreach", description: "Execute targeted outreach campaigns to earn placements on vetted websites." },
      { step: "04", title: "Content", description: "Create compelling content for guest posts and digital PR that naturally attracts links." },
      { step: "05", title: "Report", description: "Monthly reporting on new links acquired, domain authority growth, and ranking improvements." },
    ],
    stats: [
      { label: "Links Built", value: "10K+" },
      { label: "Avg DA of Links", value: "40+" },
      { label: "Client Retention", value: "98%" },
      { label: "Industries Served", value: "25+" },
    ],
    faqs: [
      { q: "How long does it take to see results from link building?", a: "Most clients see measurable ranking improvements within 3-4 months, with significant traffic gains by month 6." },
      { q: "Do you use white-hat link building methods?", a: "100%. We only use ethical, Google-compliant strategies. No PBNs, link farms, or automated link schemes." },
      { q: "How many links do you build per month?", a: "Depending on the package, we typically build 10-30 high-quality links per month, prioritising quality over quantity." },
      { q: "Can link building help a new website?", a: "Absolutely. New websites benefit enormously from strategic link building to establish initial domain authority and accelerate indexing." },
    ],
    relatedServices: ["seo", "content-writing", "technical-seo"],
  },

  "meta-ads": {
    slug: "meta-ads",
    title: "Meta Ads",
    tagline: "Reach your ideal audience on Facebook & Instagram.",
    description: "Expert Meta advertising management that drives real results on Facebook and Instagram. We create, optimise, and scale ad campaigns that generate leads, sales, and brand awareness through precision targeting and compelling creative.",
    heroDescription: "We turn Meta's powerful advertising platform into your growth engine. From audience targeting to creative production to conversion optimisation, we manage every aspect of your Facebook and Instagram advertising.",
    metaTitle: "Best Meta Ads Agency in Chandigarh | Facebook & Instagram Ads | TML",
    metaDescription: "Expert Meta (Facebook & Instagram) advertising services. TML Agency creates high-performing ad campaigns that drive leads, sales, and growth for businesses across India.",
    metaKeywords: ["Meta ads agency", "Facebook ads Chandigarh", "Instagram advertising India", "social media advertising", "Facebook marketing agency", "Meta business partner", "paid social media"],
    seoContent: [
      "Meta platforms (Facebook and Instagram) reach over 3 billion people globally, making them essential channels for any business serious about growth. At TML Agency, our Meta advertising specialists create data-driven campaigns that connect your brand with the right audience at the right moment, driving measurable results in leads, sales, and brand awareness.",
      "Our approach to Meta advertising combines creative excellence with analytical rigour. We develop scroll-stopping ad creatives — static, carousel, video, and Stories formats — paired with precision audience targeting using Meta's advanced tools including Lookalike Audiences, Custom Audiences, and interest-based targeting. Every campaign is structured for scalable growth with clear attribution.",
      "From e-commerce brands looking to scale ROAS to service businesses generating qualified leads, TML Agency has managed over ₹50 crore in Meta ad spend across India, UAE, and North America. Our clients consistently achieve 3-8x return on ad spend through our systematic approach to testing, optimisation, and scaling.",
    ],
    features: [
      { title: "Campaign Strategy", description: "Full-funnel campaign architecture across awareness, consideration, and conversion objectives, tailored to your business goals and customer journey." },
      { title: "Audience Targeting", description: "Precision audience building using Custom Audiences, Lookalikes, interest targeting, and behavioural data to reach your ideal customers at every stage." },
      { title: "Ad Creative Production", description: "Scroll-stopping static, video, carousel, and Stories ad creatives designed and produced by our in-house team to maximise engagement and conversions." },
      { title: "A/B Testing", description: "Systematic testing of audiences, creatives, copy, and placements to identify winning combinations and continuously improve performance." },
      { title: "Retargeting Campaigns", description: "Strategic retargeting sequences that re-engage website visitors, cart abandoners, and past customers with personalised messaging that drives conversions." },
      { title: "Performance Reporting", description: "Transparent weekly and monthly reports with clear metrics on spend, reach, conversions, ROAS, and actionable insights for continuous improvement." },
    ],
    process: [
      { step: "01", title: "Audit", description: "Review your current Meta presence, pixel setup, audience data, and past campaign performance." },
      { step: "02", title: "Strategy", description: "Develop a full-funnel campaign plan with targeting, creative direction, and budget allocation." },
      { step: "03", title: "Create", description: "Produce ad creatives and copy variations optimised for each placement and audience segment." },
      { step: "04", title: "Launch & Test", description: "Launch campaigns with structured A/B tests to rapidly identify top-performing combinations." },
      { step: "05", title: "Optimise & Scale", description: "Continuously optimise based on data and scale winning campaigns for maximum growth." },
    ],
    stats: [
      { label: "Ad Spend Managed", value: "₹50Cr+" },
      { label: "Average ROAS", value: "5.2x" },
      { label: "Campaigns Run", value: "2000+" },
      { label: "Client Retention", value: "98%" },
    ],
    faqs: [
      { q: "What budget do I need for Meta ads?", a: "We recommend a minimum of ₹30,000/month for testing. Optimal results typically come at ₹1-5 lakh/month depending on your industry and goals." },
      { q: "Do you handle creative production?", a: "Yes, our in-house design and video team creates all ad creatives — static, video, carousel, and Stories formats included in our management fee." },
      { q: "How quickly can I expect results?", a: "Initial data comes within the first week. Most campaigns are optimised within 2-4 weeks, with consistent scaling from month 2 onwards." },
      { q: "Do you manage both Facebook and Instagram?", a: "Yes, we manage campaigns across all Meta placements including Facebook, Instagram, Messenger, and the Audience Network." },
    ],
    relatedServices: ["google-ads", "social-media", "lead-generation"],
  },

  "content-writing": {
    slug: "content-writing",
    title: "Content Writing",
    tagline: "Words that rank. Content that converts.",
    description: "Professional content writing services that drive organic traffic, engage your audience, and convert readers into customers. Our content team creates SEO-optimised blogs, website copy, articles, and marketing content that builds authority and delivers measurable business results.",
    heroDescription: "We create content that ranks on Google, engages your audience, and drives conversions. From blog posts and website copy to whitepapers and email sequences, every piece of content is strategically crafted to grow your business.",
    metaTitle: "Best Content Writing Services in Chandigarh | TML Agency",
    metaDescription: "Professional SEO content writing services for blogs, websites, and marketing. TML Agency in Chandigarh delivers content that ranks, engages, and converts.",
    metaKeywords: ["content writing services", "SEO content writing", "blog writing agency", "website copywriting", "content marketing Chandigarh", "article writing services", "content strategy"],
    seoContent: [
      "Content is the backbone of every successful digital marketing strategy. At TML Agency, our content writing services combine SEO expertise with compelling storytelling to create content that ranks on Google, resonates with your target audience, and drives measurable business outcomes. We write for both search engines and humans — because the best content does both.",
      "Our content team includes experienced writers, SEO specialists, and editors who collaborate on every piece. We use data-driven keyword research, competitor content analysis, and audience insights to develop content strategies that target high-value search terms and address your customers' real questions and pain points.",
      "From startups building their first content library to enterprises scaling their content marketing operations, TML Agency delivers consistent, high-quality content across all formats. Our clients see an average 40-80% increase in organic traffic within 6 months of implementing our content strategies.",
    ],
    features: [
      { title: "Blog Writing", description: "SEO-optimised blog posts that drive organic traffic and establish your brand as an industry thought leader. Research-backed, engaging, and formatted for maximum readability." },
      { title: "Website Copywriting", description: "Conversion-focused website copy that clearly communicates your value proposition, builds trust, and guides visitors toward taking action on every page." },
      { title: "SEO Content Strategy", description: "Data-driven content calendars built on keyword research, competitor gaps, and search intent analysis to systematically grow your organic presence." },
      { title: "Product Descriptions", description: "Compelling product and service descriptions that highlight benefits, address objections, and drive purchase decisions for e-commerce and service businesses." },
      { title: "Email Copywriting", description: "High-converting email sequences for nurturing leads, onboarding customers, and driving repeat purchases with persuasive, personalised messaging." },
      { title: "Social Media Content", description: "Platform-specific social media captions and post copy that drives engagement, builds community, and supports your broader content marketing goals." },
    ],
    process: [
      { step: "01", title: "Research", description: "Deep keyword research, competitor analysis, and audience insight gathering to inform content direction." },
      { step: "02", title: "Strategy", description: "Develop a content calendar with topics, keywords, formats, and publishing schedule aligned to your goals." },
      { step: "03", title: "Write", description: "Expert writers craft each piece with SEO best practices, brand voice consistency, and reader engagement in mind." },
      { step: "04", title: "Edit", description: "Professional editing for clarity, accuracy, SEO optimisation, and brand tone alignment before delivery." },
      { step: "05", title: "Publish & Track", description: "Support with publishing, on-page SEO, and performance tracking to measure content impact over time." },
    ],
    stats: [
      { label: "Articles Published", value: "5000+" },
      { label: "Avg Traffic Increase", value: "60%" },
      { label: "Client Retention", value: "98%" },
      { label: "Industries Covered", value: "25+" },
    ],
    faqs: [
      { q: "What types of content do you write?", a: "We write blogs, website copy, articles, whitepapers, case studies, email sequences, product descriptions, social media content, and more." },
      { q: "Do you handle SEO optimisation?", a: "Yes, every piece of content is SEO-optimised with target keywords, meta descriptions, headers, internal linking, and schema markup recommendations." },
      { q: "How do you maintain brand voice?", a: "We create a brand voice guide during onboarding and assign dedicated writers to your account who become fluent in your tone and messaging." },
      { q: "What's your turnaround time?", a: "Standard blog posts are delivered within 3-5 business days. Rush delivery and bulk content packages are available with custom timelines." },
    ],
    relatedServices: ["seo", "social-media", "link-building"],
  },

  "gmb-listing": {
    slug: "gmb-listing",
    title: "GMB Listing",
    tagline: "Dominate local search. Get found first.",
    description: "Expert Google My Business optimisation that puts your business at the top of local search results. We optimise, manage, and grow your GMB profile to drive foot traffic, calls, and local leads with proven local SEO strategies.",
    heroDescription: "We make your business the first thing people see in local search results. Our GMB optimisation services cover everything from profile setup and optimisation to review management and local SEO strategies that drive real-world customers to your door.",
    metaTitle: "Best GMB Listing & Local SEO Services in Chandigarh | TML Agency",
    metaDescription: "Expert Google My Business optimisation and local SEO services. TML Agency helps businesses dominate local search results and drive more calls, visits, and leads.",
    metaKeywords: ["GMB listing services", "Google My Business optimisation", "local SEO Chandigarh", "Google Business Profile management", "local search ranking", "GMB agency India", "local SEO services"],
    seoContent: [
      "46% of all Google searches have local intent. If your Google Business Profile isn't optimised, you're invisible to nearly half your potential customers. At TML Agency, our GMB optimisation services ensure your business appears prominently in Google Maps, the local pack, and local search results — driving phone calls, direction requests, and website visits from high-intent customers.",
      "Our GMB management goes beyond basic profile completion. We optimise every element of your Google Business Profile — from categories and attributes to photos, posts, Q&A, and review responses. We implement local SEO strategies that build your local authority including citation building, local link acquisition, and geo-targeted content creation.",
      "Whether you're a single-location business or a multi-location enterprise, TML Agency delivers GMB strategies that produce measurable results. Our clients consistently see 50-200% increases in profile views, calls, and direction requests within the first 3 months of optimisation.",
    ],
    features: [
      { title: "Profile Optimisation", description: "Complete GMB profile setup and optimisation including business info, categories, attributes, descriptions, and all fields that impact local ranking." },
      { title: "Photo & Video Management", description: "Regular uploads of high-quality photos and videos that showcase your business, products, and team — boosting engagement and trust with potential customers." },
      { title: "Review Management", description: "Strategic review generation campaigns and professional review response management that builds trust and improves your local search ranking." },
      { title: "GMB Posts", description: "Regular Google Business Profile posts including offers, events, updates, and products that keep your profile active and engaging for searchers." },
      { title: "Citation Building", description: "Consistent NAP (Name, Address, Phone) listings across 50+ directories and platforms to strengthen local search signals and improve rankings." },
      { title: "Local SEO Reporting", description: "Monthly reports tracking profile views, search queries, customer actions, ranking positions, and competitor comparisons for your local market." },
    ],
    process: [
      { step: "01", title: "Audit", description: "Comprehensive audit of your current GMB profile, local citations, and competitor landscape." },
      { step: "02", title: "Optimise", description: "Complete profile optimisation covering all ranking factors and customer-facing elements." },
      { step: "03", title: "Build Citations", description: "Create and clean up business listings across 50+ relevant directories and platforms." },
      { step: "04", title: "Engage", description: "Regular posts, photo updates, Q&A management, and review response to keep your profile active." },
      { step: "05", title: "Track & Grow", description: "Monitor rankings, track customer actions, and continuously optimise for improved local visibility." },
    ],
    stats: [
      { label: "GMB Profiles Managed", value: "300+" },
      { label: "Avg Views Increase", value: "150%" },
      { label: "Local Rankings Won", value: "1000+" },
      { label: "Client Retention", value: "98%" },
    ],
    faqs: [
      { q: "How long does GMB optimisation take to show results?", a: "Most businesses see noticeable improvements in local rankings and profile views within 4-8 weeks of optimisation." },
      { q: "Can you help with multiple locations?", a: "Yes, we manage multi-location GMB strategies with location-specific optimisation for businesses with 2 to 200+ locations." },
      { q: "Do you help get more Google reviews?", a: "Yes, we implement ethical review generation strategies and provide templates and systems to consistently earn authentic reviews from happy customers." },
      { q: "What if I don't have a GMB profile yet?", a: "We handle complete profile creation, verification, and optimisation from scratch for new businesses entering local search." },
    ],
    relatedServices: ["seo", "technical-seo", "content-writing"],
  },

  "technical-seo": {
    slug: "technical-seo",
    title: "Technical SEO",
    tagline: "Fix the foundation. Unlock your rankings.",
    description: "Expert technical SEO services that fix the hidden issues holding back your search rankings. We optimise site speed, crawlability, indexation, Core Web Vitals, and technical infrastructure to ensure search engines can properly discover, crawl, and rank your content.",
    heroDescription: "We fix the technical foundations that determine whether your content can rank. From site speed and Core Web Vitals to crawl optimisation and structured data, we handle the technical complexities so your SEO efforts deliver maximum results.",
    metaTitle: "Best Technical SEO Services in Chandigarh | TML Agency",
    metaDescription: "Expert technical SEO audits and implementation. TML Agency fixes site speed, crawlability, indexation, and Core Web Vitals to unlock your search ranking potential.",
    metaKeywords: ["technical SEO services", "technical SEO audit", "site speed optimisation", "Core Web Vitals", "crawlability SEO", "schema markup", "technical SEO agency Chandigarh"],
    seoContent: [
      "Great content and strong backlinks mean nothing if search engines can't properly crawl, index, and render your website. Technical SEO is the foundation that everything else is built on. At TML Agency, our technical SEO specialists identify and fix the hidden issues that prevent your site from reaching its full ranking potential.",
      "Our technical SEO audits cover over 200 checkpoints across site architecture, crawlability, indexation, page speed, Core Web Vitals, mobile usability, structured data, and security. We don't just identify issues — we prioritise them by impact and implement fixes that produce measurable ranking improvements.",
      "From fixing crawl budget waste on enterprise sites to optimising Core Web Vitals for small business websites, TML Agency has the technical expertise to handle any challenge. Our technical SEO clients consistently see 20-50% improvements in crawl efficiency and organic traffic after implementing our recommendations.",
    ],
    features: [
      { title: "Technical SEO Audit", description: "Comprehensive 200+ point audit covering crawlability, indexation, site speed, mobile usability, structured data, and security to identify every issue holding back your rankings." },
      { title: "Core Web Vitals", description: "Optimise Largest Contentful Paint, First Input Delay, and Cumulative Layout Shift to meet Google's performance thresholds and earn ranking advantages." },
      { title: "Site Speed Optimisation", description: "Image compression, code minification, caching strategies, CDN implementation, and server-side optimisation to deliver blazing-fast page loads." },
      { title: "Schema Markup", description: "Implementation of structured data (JSON-LD) for rich snippets, FAQ schemas, product markup, and other types that enhance your search result appearance." },
      { title: "Crawl Optimisation", description: "Fix crawl budget waste, resolve redirect chains, clean up orphan pages, and optimise internal linking to ensure search engines efficiently discover your content." },
      { title: "Migration Support", description: "Technical planning and implementation for site migrations, redesigns, and platform changes that preserve your SEO equity and prevent traffic loss." },
    ],
    process: [
      { step: "01", title: "Crawl & Audit", description: "Deep crawl analysis using Screaming Frog, Google Search Console, and custom tools to map every technical issue." },
      { step: "02", title: "Prioritise", description: "Score issues by SEO impact and implementation effort to create a prioritised action plan." },
      { step: "03", title: "Implement", description: "Fix critical issues directly or provide detailed specifications for your development team." },
      { step: "04", title: "Validate", description: "Verify fixes, re-crawl, and test to ensure all changes produce the expected improvements." },
      { step: "05", title: "Monitor", description: "Ongoing monitoring of technical health, Core Web Vitals, and crawl stats to catch new issues early." },
    ],
    stats: [
      { label: "Sites Audited", value: "500+" },
      { label: "Avg Speed Improvement", value: "60%" },
      { label: "Issues Fixed", value: "50K+" },
      { label: "Client Retention", value: "98%" },
    ],
    faqs: [
      { q: "What does a technical SEO audit include?", a: "Our audit covers 200+ checkpoints including crawlability, indexation, site speed, Core Web Vitals, mobile usability, structured data, security, and internal linking." },
      { q: "How long does a technical SEO audit take?", a: "A standard audit takes 5-7 business days. Enterprise sites with 10,000+ pages may take 2-3 weeks for a thorough analysis." },
      { q: "Do you implement the fixes or just provide recommendations?", a: "We can do both. We implement fixes directly where we have access, or provide detailed specifications for your development team." },
      { q: "How often should technical SEO be reviewed?", a: "We recommend quarterly audits as a minimum, with ongoing monitoring for larger sites that change frequently." },
    ],
    relatedServices: ["seo", "link-building", "content-writing"],
  },
};

export const allServiceSlugs = Object.keys(servicePages);
