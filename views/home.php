<?php
$title = 'TML Agency | #1 Digital Marketing Agency in Edmonton, Canada | SEO, Branding & Ads';
$description = 'TML Agency is Edmonton\'s top digital marketing agency. SEO, Google Ads, branding, web development & social media marketing. 500+ brands scaled. Get a free audit.';
$keywords = 'digital marketing agency Edmonton, SEO Edmonton, Google Ads Edmonton, branding agency Edmonton, web development Edmonton, social media marketing Edmonton, TML Agency, marketing company Canada, Edmonton marketing agency';
$canonicalPath = '/';

$homeFaqs = [
    ['q' => 'How do you tailor strategies for different businesses?', 'a' => 'We start with a deep-dive discovery session to understand your business, industry, competition, and goals. Every strategy we build is custom — no cookie-cutter templates. We combine data analysis with industry expertise to craft campaigns that align with your unique position in the market.'],
    ['q' => 'What makes TML different from other agencies?', 'a' => 'We combine branding expertise with performance marketing. Most agencies do one or the other — we do both under one roof. Our team has 15+ years of experience, we use an omni-channel approach, and we provide constant, proactive communication so you always know what\'s happening.'],
    ['q' => 'How long does it take to see results?', 'a' => 'It depends on the service. Paid ads (Google Ads, Meta Ads) can show results within days. SEO and content marketing typically take 3-6 months for significant impact. Branding and web development projects are delivered within 4-8 weeks depending on scope.'],
    ['q' => 'Do you work with small businesses or only large companies?', 'a' => 'We work with businesses of all sizes — from startups looking to establish their brand to established companies looking to scale. Our strategies are tailored to your budget and goals, ensuring maximum ROI regardless of company size.'],
    ['q' => 'What\'s your pricing model?', 'a' => 'We offer flexible pricing based on the scope of work. Whether you need a single service or a comprehensive marketing package, we\'ll create a custom proposal that fits your budget. Book a call with us to discuss your needs and get a detailed quote.'],
    ['q' => 'Is everything handled in-house or do you outsource?', 'a' => 'Everything is done in-house by our core team. We don\'t outsource to freelancers or offshore agencies. Every strategist, designer, developer, and marketer who touches your project is a full-time TML team member with years of experience.'],
    ['q' => 'What industries do you specialize in?', 'a' => 'We\'ve worked across e-commerce, SaaS, real estate, healthcare, hospitality, professional services, and more. Our process is built to adapt to any industry — we invest heavily in understanding your specific market before we touch a single campaign.'],
    ['q' => 'Do you offer monthly retainers or project-based pricing?', 'a' => 'Both. For ongoing services like SEO, ads, and social media we offer monthly retainers with clear deliverables. For one-off projects like branding, website builds, or launch campaigns, we scope and price on a per-project basis.'],
    ['q' => 'What does the onboarding process look like?', 'a' => 'After signing, we kick off with a 2-week onboarding sprint. Week one covers discovery — brand audit, competitor analysis, audience research. Week two is strategy — we present a detailed roadmap and get your sign-off before execution begins.'],
];

$faqSchema = tml_schema_faq($homeFaqs);
$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'TML Agency',
    'url' => TML_SITE_URL,
    'logo' => TML_SITE_URL . '/og-image.png',
    'description' => 'TML Agency is Edmonton\'s top digital marketing agency offering SEO, Google Ads, branding, web development, and social media marketing services.',
    'foundingDate' => '2010',
    'foundingLocation' => 'Edmonton, Canada',
    'numberOfEmployees' => ['@type' => 'QuantitativeValue', 'minValue' => 70, 'maxValue' => 100],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '11930 104 St NW',
        'addressLocality' => 'Edmonton',
        'addressRegion' => 'Alberta',
        'postalCode' => 'T5G 2K1',
        'addressCountry' => 'CA',
    ],
    'telephone' => '+14036048692',
    'sameAs' => [
        'https://www.instagram.com/tmlagency/',
        'https://www.facebook.com/tmlagency/',
        'https://www.linkedin.com/company/tmlagency/',
    ],
];
$webSiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => 'TML Agency',
    'url' => TML_SITE_URL,
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => ['@type' => 'EntryPoint', 'urlTemplate' => TML_SITE_URL . '/blog?q={search_term_string}'],
        'query-input' => 'required name=search_term_string',
    ],
];
$extraHead = [
    tml_json_ld_script($orgSchema),
    tml_json_ld_script($webSiteSchema),
    tml_json_ld_script($faqSchema),
];
require TML_VIEWS . '/partials/head.php';
?>
<main class="min-h-screen bg-[#0a0a0a]">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- HERO -->
<section class="relative w-full h-screen min-h-[600px] md:min-h-[800px] flex flex-col justify-end overflow-hidden pb-12 sm:pb-16 pt-24 sm:pt-32 bg-[#111]">
  <div class="absolute inset-0 z-0">
    <img src="/hero-background.webp" alt="TML Agency creative team" class="absolute inset-0 w-full h-full object-cover object-center opacity-50 mix-blend-screen" width="1920" height="1080" fetchpriority="high" />
  </div>
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[40%] w-[500px] md:w-[800px] lg:w-[1000px] h-[500px] md:h-[800px] lg:h-[1000px] rounded-full z-[2] opacity-70 mix-blend-color-dodge pointer-events-none" style="background: radial-gradient(circle, rgba(235, 60, 20, 0.4) 0%, rgba(200, 30, 0, 0.1) 50%, transparent 70%)"></div>
  <div class="absolute inset-0 z-[3] bg-gradient-to-t from-[#050505] via-[#050505]/80 to-transparent h-full"></div>
  <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-12 flex flex-col h-full">
    <div class="min-h-[200px] md:min-h-0 flex-1"></div>
    <div class="max-w-5xl mb-4 hero-fade-up">
      <h1 class="text-[2rem] sm:text-4xl md:text-5xl lg:text-7xl font-medium leading-[1.05] tracking-tight text-white mb-3 text-balance">Edmonton's <span class="text-[#ff4500]">#1</span> Digital Marketing Agency.</h1>
      <p class="hero-fade-up hero-delay-1 text-base sm:text-lg md:text-2xl lg:text-3xl text-white/90 tracking-tight leading-snug font-normal text-balance">Branding, SEO, Google Ads &amp; Web Development — helping Edmonton businesses dominate online.</p>
    </div>
    <div class="flex flex-row gap-3 sm:gap-4 mb-10 hero-fade-up hero-delay-2">
      <a href="/contact-us" class="glow-button relative inline-flex items-center gap-2 rounded-xl bg-[#ff4500] px-5 sm:px-8 py-4 text-sm font-semibold text-white text-center overflow-hidden active:scale-[0.97] transition-transform">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="hidden sm:block"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Say Hi, Don&apos;t Be Shy
      </a>
      <a href="#portfolio" class="inline-flex items-center gap-2 rounded-xl border border-white/[0.08] bg-white/[0.03] px-5 sm:px-8 py-4 text-sm font-semibold text-white/90 text-center hover:bg-white/[0.06] hover:border-white/[0.15] hover:text-white active:scale-[0.97] transition-all">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        See Our Work
      </a>
    </div>
    <div class="w-full h-[1px] bg-gradient-to-r from-white/30 to-transparent mb-8 origin-left hero-scale-x hero-delay-3"></div>
    <div class="flex flex-wrap items-center gap-6 md:gap-0 mb-6 hero-fade-up hero-delay-4">
      <?php
      $trustStats = [['500+', 'Brands Scaled'], ['15+', 'Years Experience'], ['98%', 'Client Retention'], ['4.9/5', 'Rating']];
      foreach ($trustStats as $i => $st) : ?>
      <span class="flex items-center gap-3 md:gap-0">
        <span class="flex items-center gap-3">
          <span class="w-1.5 h-1.5 rounded-full bg-[#ff4500] hidden sm:block hero-pulse-dot"></span>
          <span class="text-sm md:text-base font-bold text-white/90 tracking-tight"><?= tml_e($st[0]) ?></span>
          <span class="text-xs text-white/35 tracking-[0.1em] uppercase font-medium"><?= tml_e($st[1]) ?></span>
        </span>
        <?php if ($i < count($trustStats) - 1) : ?><span class="h-4 w-[1px] bg-white/10 mx-6 hidden md:block"></span><?php endif; ?>
      </span>
      <?php endforeach; ?>
    </div>
    <div class="hidden sm:grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 hero-fade-up hero-delay-5">
      <div class="border-l-2 border-[#ff4500]/30 pl-4">
        <p class="text-xs text-white/40 tracking-[0.15em] uppercase font-medium mb-1">Full-service agency</p>
        <p class="text-sm text-white/50 leading-relaxed">Strategy, design, and performance marketing — everything your brand needs to stand out and scale.</p>
      </div>
      <div class="border-l-2 border-white/10 pl-4">
        <p class="text-xs text-white/40 tracking-[0.15em] uppercase font-medium mb-1">How we work</p>
        <p class="text-sm text-white/50 leading-relaxed">No silos. No handoffs. Just one team driving real, measurable growth across every channel.</p>
      </div>
    </div>
  </div>
  <div class="hero-fade-up hero-delay-7 absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
    <div class="hero-bounce flex flex-col items-center gap-2">
      <span class="text-xs text-white/30 tracking-[0.2em] uppercase hidden sm:block">Scroll</span>
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="text-white/30"><path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
  </div>
</section>

<!-- CLIENT LOGOS MARQUEE -->
<section class="py-16 md:py-24 border-t border-white/[0.06] border-b border-b-white/[0.06] bg-[#080808] overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 mb-8 scroll-reveal">
    <div class="flex items-center justify-between">
      <p class="text-xs tracking-[0.25em] uppercase text-white/30">Trusted by ambitious brands</p>
      <span class="text-sm font-bold text-white/20"><span data-counter-target="12" data-counter-suffix="+">0</span> brands</span>
    </div>
  </div>
  <?php
  $logos = ['GOOGLE','MICROSOFT','AMAZON','SHOPIFY','HUBSPOT','META','SPOTIFY','STRIPE','SLACK','ADOBE','NETFLIX','AIRBNB'];
  $logoHtml = '';
  foreach ($logos as $name) {
      $logoHtml .= '<span class="whitespace-nowrap text-lg sm:text-2xl md:text-3xl font-semibold tracking-tight text-white/[0.08] hover:text-white/90 transition-colors duration-500 cursor-default">' . tml_e($name) . '</span>';
      $logoHtml .= '<span class="text-[#ff4500]/20 text-xs mx-4 select-none">&#9670;</span>';
  }
  ?>
  <div class="relative" style="mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);">
    <div class="flex items-center gap-0 marquee-track py-3"><?= $logoHtml ?><?= $logoHtml ?></div>
    <div class="flex items-center gap-0 marquee-track py-3" style="animation-direction: reverse;"><?= $logoHtml ?><?= $logoHtml ?></div>
    <div class="flex items-center gap-0 marquee-track py-3"><?= $logoHtml ?><?= $logoHtml ?></div>
  </div>
</section>

<!-- ABOUT -->
<section class="relative py-24 md:py-32 px-6 lg:px-12 bg-[#050505] overflow-hidden">
  <div class="pointer-events-none absolute inset-0 flex items-center justify-center select-none opacity-[0.02]">
    <div class="marquee-track whitespace-nowrap"><span class="text-[10rem] md:text-[16rem] font-black tracking-tighter text-white leading-none" aria-hidden="true">TML AGENCY&nbsp;&nbsp;&nbsp;TML AGENCY&nbsp;&nbsp;&nbsp;</span><span class="text-[10rem] md:text-[16rem] font-black tracking-tighter text-white leading-none" aria-hidden="true">TML AGENCY&nbsp;&nbsp;&nbsp;TML AGENCY&nbsp;&nbsp;&nbsp;</span></div>
  </div>
  <div class="relative max-w-7xl mx-auto">
    <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start">
      <div class="lg:w-1/2 scroll-reveal">
        <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">About TML</p>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-8 leading-tight">About TML — Edmonton's Full-Service Marketing Agency<span class="text-[#ff4500]">.</span></h2>
      </div>
      <div class="lg:w-1/2 space-y-6 scroll-reveal scroll-delay-1">
        <div class="border-l-2 border-[#ff4500]/30 pl-5">
          <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]">TML is a full-service branding and digital marketing agency built for businesses that want to move fast and look good doing it. From day one, we embed with your team — learning your market, your audience, and what makes you different.</p>
        </div>
        <div class="border-l-2 border-white/10 pl-5">
          <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]">We combine strategy, design, and performance marketing into one tight operation. No silos. No handoffs. No wasted time. Just sharp work that drives real growth — from branding and web development to SEO, paid ads, and everything in between.</p>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-16">
      <?php
      $aboutStats = [['target' => 500, 'suffix' => '+', 'label' => 'Brands scaled'], ['target' => 15, 'suffix' => '+', 'label' => 'Years experience'], ['target' => 12, 'suffix' => '', 'label' => 'Core services'], ['target' => 98, 'suffix' => '%', 'label' => 'Client retention']];
      foreach ($aboutStats as $i => $s) : ?>
      <div class="glass-card text-center p-6 rounded-2xl scroll-reveal scroll-delay-<?= $i + 2 ?>">
        <div class="text-2xl md:text-3xl font-bold text-white mb-1"><span data-counter-target="<?= $s['target'] ?>" data-counter-suffix="<?= tml_e($s['suffix']) ?>">0</span></div>
        <p class="text-xs text-white/35 tracking-wide uppercase"><?= tml_e($s['label']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- MEET THE TEAM -->
<section class="relative w-full h-[70vh] min-h-[500px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <video data-src="/team-bg.mp4" poster="/team-bg-poster.webp" autoplay muted loop playsinline aria-label="TML Agency creative team video" class="absolute inset-0 w-full h-full object-cover" style="filter: brightness(0.65);"></video>
  </div>
  <div class="absolute inset-0 bg-black/50 z-[1]"></div>
  <div class="absolute top-1/4 right-0 w-[700px] h-[700px] rounded-full blur-[80px] pointer-events-none z-[2] opacity-60" style="background: rgba(255,69,0,0.12); animation: breathe 8s ease-in-out infinite;"></div>
  <div class="absolute bottom-0 left-0 w-[600px] h-[600px] rounded-full blur-[100px] pointer-events-none z-[2] opacity-50" style="background: rgba(255,69,0,0.1); animation: breathe 10s ease-in-out infinite 2s;"></div>
  <div class="relative z-10 text-center px-6 max-w-4xl scroll-reveal">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase mb-6">Since 2010 &middot; TML Agency</p>
    <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium text-white leading-tight mb-8">Award-Winning<br><span class="italic bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">Ad Creative & Production.</span></h2>
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/40 backdrop-blur-sm border border-white/10 mb-8">
      <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
      <span class="text-xs text-white/70 font-medium">500+ Ads Shot</span>
    </div>
    <div class="block">
      <a href="/contact-us" class="glow-button inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm active:scale-[0.97] transition-transform">Get In Touch <span>&rarr;</span></a>
    </div>
  </div>
  <style>@keyframes breathe{0%,100%{transform:scale(1);opacity:.5}50%{transform:scale(1.1);opacity:.7}}</style>
</section>

<!-- SERVICES -->
<section id="services" class="py-24 md:py-32 px-6 lg:px-12 bg-[#050505]">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-12 scroll-reveal">
      <div>
        <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">What we do</p>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Our Digital Marketing Services<span class="text-[#ff4500]">.</span></h2>
      </div>
      <span class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/[0.06] text-xs text-white/30 font-medium">10 services</span>
    </div>
    <?php
    $serviceIcons = [
        'seo'                      => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
        'google-ads'               => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
        'branding'                 => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
        'website-development'      => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
        'social-media'             => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>',
        'graphic-design'           => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>',
        'ui-design'                => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
        'lead-generation'          => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
        'video-editing'            => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>',
        'branding-packaging'       => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
    ];
    // Show only the top 10 most searched services
    $top10Slugs = ['seo', 'google-ads', 'branding', 'website-development', 'social-media', 'graphic-design', 'ui-design', 'lead-generation', 'video-editing', 'branding-packaging'];
    $allServices = tml_service_pages();
    $idx = 0;
    foreach ($top10Slugs as $topSlug) :
        $sp = $allServices[$topSlug] ?? null;
        if (!$sp) continue;
        $idx++;
        $icon = $serviceIcons[$topSlug] ?? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>';
    ?>
    <div class="scroll-reveal scroll-delay-<?= min($idx, 6) ?>">
      <a href="/services/<?= tml_e($sp['slug']) ?>" class="group flex items-center gap-6 py-6 border-b border-white/[0.04] hover:border-[#ff4500]/20 transition-all duration-500 relative">
        <div class="absolute left-0 top-0 bottom-0 w-[2px] bg-[#ff4500] scale-y-0 group-hover:scale-y-100 transition-transform duration-500 origin-top rounded-full"></div>
        <span class="text-xs font-mono text-white/15 w-8 shrink-0 pl-3"><?= str_pad((string) $idx, 2, '0', STR_PAD_LEFT) ?></span>
        <span class="w-10 h-10 rounded-xl bg-white/[0.03] border border-white/[0.06] flex items-center justify-center text-white/30 group-hover:text-[#ff4500] group-hover:border-[#ff4500]/20 transition-colors shrink-0"><?= $icon ?></span>
        <span class="flex-1 min-w-0"><span class="text-lg font-semibold text-white group-hover:text-[#ff4500] transition-colors"><?= tml_e($sp['title']) ?></span></span>
        <span class="hidden md:block text-sm text-white/25 max-w-sm leading-relaxed"><?= tml_e($sp['description'] ?? $sp['tagline']) ?></span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/10 group-hover:text-[#ff4500] group-hover:translate-x-1 transition-all shrink-0"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
    <?php endforeach; ?>
    <div class="flex justify-center mt-10">
      <a href="/services" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/[0.08] bg-white/[0.03] text-white/90 font-semibold text-sm hover:bg-[#ff4500]/10 hover:border-[#ff4500]/30 hover:text-[#ff4500] transition-all duration-300">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        View All 37 Services
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- TECH STACK -->
<section class="py-20 md:py-28 px-6 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="max-w-7xl mx-auto mb-10 scroll-reveal">
    <div class="flex items-center justify-between">
      <div>
        <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our toolkit</p>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Our Marketing Technology Stack<span class="text-[#ff4500]">.</span></h2>
      </div>
      <span class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/[0.06] text-xs text-white/30 font-medium">15+ tools</span>
    </div>
  </div>
  <?php
  $tools = ['Figma','Adobe CC','After Effects','Illustrator','React','Next.js','WordPress','Shopify','Google Ads','Meta Ads','SEMrush','Ahrefs','Google Analytics 4','Hotjar','Google Tag Manager'];
  $toolHtml = '';
  foreach ($tools as $t) {
      $toolHtml .= '<span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-white/[0.06] bg-white/[0.03] text-sm text-white/50 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/[0.06] transition-all duration-300 whitespace-nowrap cursor-default"><span class="w-1.5 h-1.5 rounded-full bg-[#ff4500]/40"></span>' . tml_e($t) . '</span>';
  }
  ?>
  <div class="relative" style="mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);">
    <div class="flex items-center gap-3 marquee-track py-3"><?= $toolHtml ?><?= $toolHtml ?></div>
    <div class="flex items-center gap-3 marquee-track py-3" style="animation-direction: reverse;"><?= $toolHtml ?><?= $toolHtml ?></div>
  </div>
</section>

<!-- AWARDS & PARTNERS -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#050505] overflow-hidden">
  <div class="max-w-7xl mx-auto mb-14 scroll-reveal">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
      <div class="max-w-2xl">
        <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-5">Awards &amp; Certified Partners</p>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white leading-tight">Awards, Certifications &amp; Partnerships<span class="text-[#ff4500]">.</span></h2>
        <p class="mt-4 text-sm md:text-base text-white/35 leading-relaxed">Recognized by global platforms and backed by industry-leading certifications that reflect our commitment to excellence.</p>
      </div>
      <span class="hidden md:inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-white/[0.06] bg-white/[0.02] text-xs text-white/40 font-medium shrink-0"><span data-counter-target="20" data-counter-suffix="+">0</span>&nbsp;Awards &amp; Certifications</span>
    </div>
  </div>
  <?php
  $awards = [
      ['Clutch Top GenAI 2026', '/awards/Clutch-Top-GenerativeAI-Company2026.png'],
      ['ISO Certified', '/awards/ISO-icon.svg'], ['ISO 27001', '/awards/ISO-icon-1.svg'], ['ISO 9001', '/awards/ISO-icon-2.svg'],
      ['Flutter Service Award', '/awards/Service-Award-1-flutter.webp'], ['AWS Advanced Tier', '/awards/aws-advance-tier.svg'],
      ['AWS Security', '/awards/aws-security-1.png'], ['Google Developer', '/awards/google-developer.png'],
      ['Red Herring Winner', '/awards/red-hirring.webp'], ['SOC II Compliant', '/awards/socII-icon.svg'],
      ['Top Clutch App Dev', '/awards/top_clutch.co_app_development.webp'],
  ];
  $awardHtml = '';
  foreach ($awards as $aw) {
      $awardHtml .= '<div class="flex-shrink-0 w-36 h-36 md:w-40 md:h-40 rounded-2xl border border-white/[0.06] bg-white/[0.02] flex flex-col items-center justify-center gap-2.5 p-4 hover:scale-105 hover:border-[#ff4500]/20 hover:bg-white/[0.03] transition-all duration-300 grayscale hover:grayscale-0 group"><div class="w-16 h-16 flex items-center justify-center"><img src="' . tml_e($aw[1]) . '" alt="' . tml_e($aw[0]) . '" class="w-full h-full object-contain" loading="lazy" /></div><span class="text-[10px] text-white/25 group-hover:text-white/70 transition-colors duration-300 text-center leading-tight font-medium tracking-wide px-1">' . tml_e($aw[0]) . '</span></div>';
  }
  ?>
  <div class="relative mb-20" style="mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);">
    <div class="flex items-center gap-5 marquee-track py-3"><?= $awardHtml ?><?= $awardHtml ?></div>
    <div class="flex items-center gap-5 marquee-track py-3" style="animation-direction: reverse; animation-duration: 35s;"><?= $awardHtml ?><?= $awardHtml ?></div>
  </div>
  <div class="max-w-7xl mx-auto">
    <div class="w-full h-px bg-gradient-to-r from-[#ff4500]/20 via-white/10 to-transparent mb-12"></div>
    <div class="flex items-end justify-between mb-8">
      <p class="text-xs text-white/40 tracking-[0.2em] uppercase font-semibold scroll-reveal">Certified Partners</p>
      <span class="text-xs text-white/20 scroll-reveal"><?= count($partners ?? []) ?> verified partnerships</span>
    </div>
    <?php
    $partners = [
        ['Google Ads Partner', '/partner/google-ads-partner-badge.png', 'Certified Google Ads partner delivering data-driven marketing and growth solutions.'],
        ['Microsoft Partner', '/partner/microsoft.webp', 'Microsoft partner enabling digital transformation with secure cloud and enterprise solutions.'],
        ['Shopify Partner', '/partner/shopify-partner-logo.jpg', 'Certified Shopify partner building high-performance e-commerce experiences.'],
        ['WordPress Partner', '/partner/WordPress-Logo.png', 'Expert WordPress development and optimization for enterprise-scale web applications.'],
        ['Bing Ads Partner', '/partner/bing-advertising-certifications.webp', 'Certified Bing Advertising partner maximizing search reach and ROI.'],
        ['Google Cloud Partner', '/partner/Google-Partner.jpg', 'Verified Google Cloud partner specializing in scalable infrastructure and data solutions.'],
    ];
    ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <?php foreach ($partners as $i => $p) : ?>
      <div class="group glass-card rounded-2xl p-[1px] scroll-reveal scroll-delay-<?= $i + 1 ?> hover:-translate-y-1 transition-all duration-500">
        <div class="relative bg-[#0a0a0a] rounded-2xl p-6 h-full">
          <div class="flex items-start gap-4 mb-3">
            <div class="w-12 h-12 rounded-xl bg-white/[0.04] border border-white/[0.06] flex items-center justify-center shrink-0 p-2">
              <img src="<?= tml_e($p[1]) ?>" alt="<?= tml_e($p[0]) ?>" class="max-w-full max-h-full object-contain" loading="lazy" />
            </div>
            <div>
              <div class="flex items-center gap-2 mb-1">
                <span class="w-1.5 h-1.5 rounded-full bg-[#ff4500] animate-pulse"></span>
                <span class="text-[9px] text-[#ff4500]/60 uppercase tracking-[0.15em] font-semibold">Certified</span>
              </div>
              <h3 class="text-sm font-semibold text-white tracking-tight"><?= tml_e($p[0]) ?></h3>
            </div>
          </div>
          <p class="text-xs text-white/30 leading-relaxed group-hover:text-white/50 transition-colors duration-300"><?= tml_e($p[2]) ?></p>
          <div class="mt-4 h-px bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Our Creative Work — Grid Carousel with Dots Navigation -->
<section class="relative w-full py-16 md:py-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 mb-12 scroll-reveal">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Creative Work</p>
    <h2 class="text-3xl sm:text-4xl font-medium text-white leading-tight">Brand Identity &amp; Creative Work<span class="text-[#ff4500]">.</span></h2>
  </div>

  <?php
  $carouselImages = [
      ['brand-identity-design.webp', 'Brand Identity', 'Branding'],
      ['social-media-content-mockup.png', 'Social Media Design', 'Social Media'],
      ['web-design-landing-page.webp', 'Landing Page Design', 'Web Design'],
      ['product-branding-campaign.webp', 'Product Branding', 'Branding'],
      ['billboard-advertising-campaign.jpg', 'Billboard Campaign', 'Advertising'],
      ['beauty-product-photography.webp', 'Product Photography', 'Photography'],
      ['ux-design-illustration.webp', 'UX Illustration', 'UI/UX'],
      ['packaging-design-creative.webp', 'Packaging Design', 'Packaging'],
      ['instagram-feed-design.webp', 'Instagram Grid', 'Social Media'],
      ['ecommerce-branding-creative.webp', 'E-Commerce Branding', 'Branding'],
      ['creative-design-portfolio.webp', 'Creative Portfolio', 'Design'],
      ['saas-website-design.webp', 'SaaS Website', 'Web Design'],
  ];
  $itemsPerSlide = 3;
  $totalSlides = ceil(count($carouselImages) / $itemsPerSlide);
  ?>

  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    <!-- Carousel Container -->
    <div class="relative overflow-hidden">
      <div id="carouselTrack" class="flex transition-transform duration-500 ease-out" style="transform: translateX(0);">
        <?php for ($slide = 0; $slide < $totalSlides; $slide++) : ?>
        <div class="w-full flex-shrink-0 grid grid-cols-1 md:grid-cols-3 gap-6">
          <?php
          for ($i = 0; $i < $itemsPerSlide; $i++) {
            $index = ($slide * $itemsPerSlide) + $i;
            if ($index < count($carouselImages)) {
              $cc = $carouselImages[$index];
          ?>
          <div class="group">
            <div class="rounded-2xl overflow-hidden border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/30 transition-all duration-500 h-full flex flex-col">
              <div class="aspect-[4/3] relative overflow-hidden flex-shrink-0">
                <img src="/media/<?= tml_e($cc[0]) ?>" alt="<?= tml_e($cc[1]) ?> — TML Agency" loading="lazy" width="600" height="450" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-4">
                  <p class="text-sm text-white font-medium"><?= tml_e($cc[1]) ?></p>
                </div>
              </div>
              <div class="p-4 flex-grow flex flex-col justify-between">
                <span class="text-[10px] text-[#ff4500]/70 tracking-[0.15em] uppercase font-semibold"><?= tml_e($cc[2]) ?></span>
                <p class="text-xs text-white/60 mt-2"><?= tml_e($cc[1]) ?></p>
              </div>
            </div>
          </div>
          <?php
            }
          }
          ?>
        </div>
        <?php endfor; ?>
      </div>

      <!-- Navigation Buttons -->
      <?php if ($totalSlides > 1) : ?>
      <button onclick="slideCarousel(-1)" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-8 w-10 h-10 rounded-full border border-white/20 hover:border-[#ff4500]/50 hover:bg-[#ff4500]/10 flex items-center justify-center transition-all duration-300 z-10">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
      </button>
      <button onclick="slideCarousel(1)" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-8 w-10 h-10 rounded-full border border-white/20 hover:border-[#ff4500]/50 hover:bg-[#ff4500]/10 flex items-center justify-center transition-all duration-300 z-10">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
      </button>
      <?php endif; ?>
    </div>

    <!-- Dots Navigation -->
    <?php if ($totalSlides > 1) : ?>
    <div class="flex justify-center gap-2 mt-10">
      <?php for ($i = 0; $i < $totalSlides; $i++) : ?>
      <button onclick="goToSlide(<?= $i ?>)" class="dot-nav w-2 h-2 rounded-full transition-all duration-300 <?= $i === 0 ? 'bg-[#ff4500] w-8' : 'bg-white/20 hover:bg-white/40' ?>" data-slide="<?= $i ?>"></button>
      <?php endfor; ?>
    </div>
    <?php endif; ?>
  </div>

  <script>
  let currentSlide = 0;
  const totalSlides = <?= $totalSlides ?>;

  function slideCarousel(direction) {
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    updateCarousel();
  }

  function goToSlide(index) {
    currentSlide = index;
    updateCarousel();
  }

  function updateCarousel() {
    const track = document.getElementById('carouselTrack');
    if (track) {
      track.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    // Update dots
    document.querySelectorAll('.dot-nav').forEach((dot, index) => {
      if (index === currentSlide) {
        dot.className = 'dot-nav w-8 h-2 rounded-full bg-[#ff4500] transition-all duration-300';
      } else {
        dot.className = 'dot-nav w-2 h-2 rounded-full bg-white/20 hover:bg-white/40 transition-all duration-300';
      }
    });
  }

  // Keyboard navigation
  document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') slideCarousel(-1);
    if (e.key === 'ArrowRight') slideCarousel(1);
  });
  </script>
</section>

<!-- PORTFOLIO -->
<section id="portfolio" class="py-24 md:py-32 px-6 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 scroll-reveal">
      <div>
        <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-5">Selected work</p>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white leading-tight">Our Digital Marketing Portfolio<span class="text-[#ff4500]">.</span></h2>
      </div>
      <a href="/portfolio" class="hidden md:inline-flex items-center gap-2 text-sm text-[#ff4500] font-semibold hover:text-[#ff6a33] transition-colors shrink-0">View all projects <span class="ml-1">&rarr;</span></a>
    </div>
    <?php
    $allProjects = [
        ['CB Builders', 'Web Design', '/portfolio/cb-builders-web-design.webp'],
        ['Real Estate App', 'UI/UX Design', '/portfolio/real-estate-app-uiux-design.webp'],
        ['BYT Trucking', 'Web Design', '/portfolio/byt-trucking-web-design.webp'],
        ['NFT Marketplace', 'Web Design', '/portfolio/nft-marketplace-web-design.jpg'],
        ['Smart Home App', 'UI/UX Design', '/portfolio/smart-home-app-uiux-design.webp'],
        ['Win Asset Finance', 'Web Design', '/portfolio/win-asset-finance-web-design.png'],
        ['Custom Trucking & Baling', 'Branding & Web', '/portfolio/custom-trucking-baling-branding.jpg'],
        ['Zuri Beauty Academy', 'Web Design', '/portfolio/zuri-beauty-academy-web-design.png'],
        ['Virtual Healthcare', 'Branding & Web', '/portfolio/virtual-healthcare-branding.webp'],
        ['Advertisement Marketing', 'Web Design', '/portfolio/advertisement-marketing-web-design.png'],
    ];
    ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
      <?php foreach ($allProjects as $i => $proj) : ?>
      <div class="group relative rounded-xl overflow-hidden border border-white/[0.04] aspect-[4/3] hover:border-[#ff4500]/20 transition-all duration-500 cursor-pointer scroll-reveal" style="transition-delay: <?= ($i % 3) * 80 ?>ms;">
        <img src="<?= tml_e($proj[2]) ?>" alt="<?= tml_e($proj[0]) ?> - <?= tml_e($proj[1]) ?> project by TML Agency" class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700" loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="absolute top-4 left-4"><span class="text-[10px] text-white/15 font-mono tracking-wider"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span></div>
        <div class="absolute bottom-0 left-0 right-0 p-5">
          <span class="text-[9px] text-[#ff4500]/80 tracking-[0.2em] uppercase font-semibold opacity-0 -translate-x-3 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500 block mb-1"><?= tml_e($proj[1]) ?></span>
          <h3 class="text-sm md:text-base font-medium text-white tracking-tight translate-y-1 group-hover:translate-y-0 transition-transform duration-500"><?= tml_e($proj[0]) ?></h3>
          <div class="w-0 group-hover:w-8 h-0.5 bg-[#ff4500] mt-2.5 transition-all duration-500"></div>
        </div>
        <div class="absolute inset-0 rounded-xl ring-1 ring-inset ring-white/[0.04] group-hover:ring-[#ff4500]/20 transition-all duration-500 pointer-events-none"></div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="relative rounded-xl overflow-hidden border border-white/[0.04] mb-10 group cursor-pointer hover:border-[#ff4500]/15 transition-colors duration-500 scroll-reveal">
      <video data-src="/portfolio/tml-portfolio-showreel-2025.mp4" poster="/tml-showreel-poster.jpg" autoplay muted loop playsinline aria-label="TML Agency portfolio showreel 2025" class="w-full aspect-video bg-black group-hover:scale-[1.01] transition-transform duration-700"></video>
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent pointer-events-none"></div>
      <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12 pointer-events-none">
        <p class="text-[10px] text-[#ff4500]/80 tracking-[0.15em] uppercase font-semibold mb-2">Showreel 2025</p>
        <h3 class="text-2xl md:text-3xl font-medium text-white tracking-tight">A year of building brands that matter</h3>
        <div class="w-0 group-hover:w-12 h-0.5 bg-[#ff4500] mt-4 transition-all duration-700"></div>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 scroll-reveal">
      <?php
      $workStats = [['target' => 15, 'suffix' => '+', 'label' => 'Projects per quarter'], ['target' => 25, 'suffix' => '+', 'label' => 'Industries served'], ['target' => 100, 'suffix' => '%', 'label' => 'Client satisfaction'], ['target' => 48, 'suffix' => 'hr', 'label' => 'Avg. response time']];
      foreach ($workStats as $ws) : ?>
      <div class="text-center p-5 rounded-xl border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/15 hover:bg-white/[0.03] transition-all duration-500">
        <div class="text-2xl md:text-3xl font-bold text-[#ff4500]/80 tracking-tight mb-1"><span data-counter-target="<?= $ws['target'] ?>" data-counter-suffix="<?= tml_e($ws['suffix']) ?>">0</span></div>
        <div class="w-6 h-px bg-gradient-to-r from-[#ff4500]/40 to-transparent mx-auto my-2"></div>
        <p class="text-[10px] text-white/30 tracking-[0.12em] uppercase"><?= tml_e($ws['label']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-10 flex justify-center scroll-reveal">
      <a href="/portfolio" class="inline-flex items-center gap-2 rounded-xl border border-[#ff4500]/20 bg-[#ff4500]/5 px-8 py-3.5 text-sm font-semibold text-white/90 hover:text-white hover:border-[#ff4500]/40 transition-colors duration-300">
        View All Projects
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
      </a>
    </div>
  </div>
</section>

<!-- VIDEO SHOWCASE -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#050505] overflow-hidden">
  <div class="max-w-7xl mx-auto mb-10 scroll-reveal">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our work in motion</p>
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-3">Video Production &amp; Brand Films<span class="text-[#ff4500]">.</span></h2>
    <p class="text-sm text-white/35 max-w-lg">Short-form content, brand films, and animated visuals — crafted to stop the scroll.</p>
  </div>
  <div class="flex gap-4 overflow-x-auto pb-4 snap-x snap-mandatory cursor-grab" data-tml-video-scroll style="-webkit-overflow-scrolling: touch; scrollbar-width: none;">
    <?php
    $reels = [
        ['/brand-motion-luxe-interiors.mp4', '/brand-motion-luxe-interiors-poster.webp', 'Brand Motion', 'Luxe Interiors'],
        ['/visual-identity-nova-studios.mp4', '/visual-identity-nova-studios-poster.webp', 'Visual Identity', 'Nova Studios'],
        ['/ad-creative-techvault.mp4', '/ad-creative-techvault-poster.webp', 'Ad Creative', 'TechVault'],
        ['/social-content-meridian-co.mp4', '/social-content-meridian-co-poster.webp', 'Social Content', 'Meridian Co'],
        ['/campaign-film-atlas-digital.mp4', '/campaign-film-atlas-digital-poster.webp', 'Campaign Film', 'Atlas Digital'],
        ['/product-story-vero-fashion.mp4', '/product-story-vero-fashion-poster.webp', 'Product Story', 'Vero Fashion'],
    ];
    foreach ($reels as $reel) : ?>
    <div class="flex-shrink-0 w-[200px] sm:w-[260px] md:w-[340px] lg:w-[400px] snap-center">
      <div class="relative rounded-2xl overflow-hidden border border-white/[0.06] aspect-[9/16] group hover:border-[#ff4500]/20 transition-all duration-500">
        <video data-src="<?= tml_e($reel[0]) ?>" poster="<?= tml_e($reel[1]) ?>" autoplay muted loop playsinline aria-label="<?= tml_e($reel[2] . ' — ' . $reel[3]) ?>" class="absolute inset-0 w-full h-full object-cover"></video>
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4">
          <span class="text-[11px] text-[#ff4500] tracking-wider uppercase font-semibold"><?= tml_e($reel[2]) ?></span>
          <p class="text-white text-sm font-medium mt-1"><?= tml_e($reel[3]) ?></p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="max-w-7xl mx-auto mt-6 flex items-center justify-between text-xs text-white/20">
    <span>6 projects &middot; Drag to explore</span>
    <a href="/portfolio" class="text-[#ff4500] font-medium hover:underline">View all work &rarr;</a>
  </div>
</section>

<!-- PROCESS -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="mb-16 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our process</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Our Proven Marketing Process<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="relative">
      <div class="hidden md:block absolute left-8 top-0 bottom-0 w-[2px] bg-white/[0.06]"><div class="absolute inset-0 bg-gradient-to-b from-[#ff4500] to-[#ff4500]/20 origin-top" style="transform: scaleY(0.5);"></div></div>
      <?php
      $steps = [
          ['01', 'Discovery', 'Week 1-2', 'Deep-dive into your business, market, competitors, and audience. We learn what makes you different before we touch a single pixel.', ['Google Analytics', 'SEMrush', 'Hotjar']],
          ['02', 'Strategy', 'Week 2-3', 'A custom roadmap built around your goals, budget, and timeline. No templates. Every plan is built from scratch.', ['Figma', 'Google Docs', 'Ahrefs']],
          ['03', 'Execution', 'Week 3-8', 'Our team ships across every channel — branding, web, ads, content, SEO. Tight timelines. High standards. Zero fluff.', ['React', 'Adobe CC', 'Google Ads', 'Meta Ads']],
          ['04', 'Optimize', 'Ongoing', 'We monitor, test, and refine continuously. Your growth compounds because we never stop improving what\'s working.', ['GA4', 'GTM', 'Hotjar', 'A/B Testing']],
      ];
      foreach ($steps as $i => $step) : ?>
      <div class="relative md:pl-20 mb-12 last:mb-0 scroll-reveal scroll-delay-<?= $i + 1 ?>">
        <div class="hidden md:flex absolute left-[22px] top-2 w-[14px] h-[14px] rounded-full bg-[#ff4500] border-2 border-[#080808] z-10"><div class="absolute inset-0 rounded-full bg-[#ff4500]/30 animate-ping"></div></div>
        <div class="glass-card rounded-2xl p-6 md:p-8">
          <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-4">
              <span class="text-3xl font-bold text-[#ff4500]/10"><?= $step[0] ?></span>
              <div>
                <h3 class="text-xl font-semibold text-white"><?= tml_e($step[1]) ?></h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-[#ff4500]/10 text-xs text-[#ff4500] font-medium mt-1"><?= tml_e($step[2]) ?></span>
              </div>
            </div>
          </div>
          <p class="text-sm text-white/45 leading-relaxed mb-4"><?= tml_e($step[3]) ?></p>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($step[4] as $tool) : ?><span class="text-xs px-3 py-1.5 rounded-full border border-white/[0.06] text-white/25 bg-white/[0.02]"><?= tml_e($tool) ?></span><?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CAMPAIGN PLANS -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#050505] overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">Tailored strategies</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-3">Campaign Plans &amp; Pricing<span class="text-[#ff4500]">.</span></h2>
      <p class="text-sm text-white/35">Let us write a custom plan for you</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <?php
      $plans = [
          ['title' => 'Startup!', 'emoji' => "\xF0\x9F\x9A\x80", 'team' => '10-50', 'popular' => false, 'features' => ['Limited brand awareness & market penetration', 'Setting up realistic goals with TML', 'Budget & resource constraints', 'Making the product market fit', 'Boosting customer value & retention']],
          ['title' => 'Enterprise!', 'emoji' => "\xF0\x9F\x8F\xA2", 'team' => '200 & Hiring', 'popular' => true, 'features' => ['Maximising ROAS with TML Creative Agency', 'Market Saturation and Diminishing Growth', 'Innovation Stagnation and Competitive Edge', 'Safeguarding Brand Reputation and Trust']],
          ['title' => 'Growing Business!', 'emoji' => "\xF0\x9F\x93\x88", 'team' => '50-200', 'popular' => false, 'features' => ['Competing against already setup brands', 'Facing scalability challenges', 'Expanding with new markets/modules', 'Maximising customer lifetime value', 'Omni Channel customer experience']],
      ];
      foreach ($plans as $i => $plan) : ?>
      <div class="relative rounded-2xl p-6 md:p-8 <?= $plan['popular'] ? 'bg-[#ff4500]/[0.04] border-2 border-[#ff4500]/30' : 'bg-white/[0.02] border border-white/[0.06]' ?> scroll-reveal scroll-delay-<?= $i + 1 ?>">
        <?php if ($plan['popular']) : ?><span class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-[#ff4500] text-white text-[10px] font-bold tracking-wider uppercase">Most Popular</span><?php endif; ?>
        <div class="text-4xl mb-4"><?= $plan['emoji'] ?></div>
        <h3 class="text-xl font-semibold text-white mb-2"><?= tml_e($plan['title']) ?></h3>
        <div class="flex items-center gap-2 text-xs text-white/30 mb-6">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
          Team Size: <?= tml_e($plan['team']) ?>
        </div>
        <ul class="space-y-3 mb-8">
          <?php foreach ($plan['features'] as $feat) : ?>
          <li class="flex items-start gap-2 text-sm text-white/45"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="2" class="shrink-0 mt-0.5"><polyline points="20 6 9 17 4 12"/></svg><?= tml_e($feat) ?></li>
          <?php endforeach; ?>
        </ul>
        <a href="/contact-us" class="block text-center py-3 px-6 rounded-full <?= $plan['popular'] ? 'bg-[#ff4500] text-white glow-button' : 'border border-white/[0.08] text-white/70 hover:bg-white/[0.04]' ?> text-sm font-semibold transition-all active:scale-[0.97]">Get Started</a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center scroll-reveal">
      <a href="/contact-us" class="glow-button inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm active:scale-[0.97] transition-transform">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Talk to Industry Expert
      </a>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-16 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">Client stories</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-4">Client Testimonials &amp; Reviews<span class="text-[#ff4500]">.</span></h2>
      <p class="text-sm text-white/35 max-w-xl mx-auto">Real results from real businesses. Here's what our clients have to say about working with TML.</p>
    </div>
    <div class="flex md:grid md:grid-cols-3 gap-5 overflow-x-auto snap-x snap-mandatory pb-4 md:pb-0 md:overflow-visible" data-tml-testimonial-scroll style="scrollbar-width: none;">
      <?php
      $testimonials = [
          ['quote' => 'TML completely transformed our digital presence. Within 90 days we saw a 3x return on our ad spend and our brand finally felt like us.', 'name' => 'Sarah Mitchell', 'company' => 'Luxe Interiors', 'initial' => 'S'],
          ['quote' => 'Their team feels like an extension of ours. No hand-holding needed — they just get it and deliver, every single time.', 'name' => 'James Carter', 'company' => 'CB Builders', 'initial' => 'J'],
          ['quote' => 'We went from zero online presence to ranking on page one for 12 keywords in under 6 months. The ROI speaks for itself.', 'name' => 'Priya Sharma', 'company' => 'TechVault', 'initial' => 'P'],
      ];
      $gradients = ['from-[#ff4500] to-[#ff6b35]', 'from-[#6366f1] to-[#8b5cf6]', 'from-[#10b981] to-[#34d399]'];
      foreach ($testimonials as $i => $t) : ?>
      <div class="glass-card flex-shrink-0 w-[85vw] md:w-auto snap-center rounded-2xl p-6 md:p-8 scroll-reveal scroll-delay-<?= $i + 1 ?>">
        <div class="flex items-center gap-1 mb-4"><?php for ($s = 0; $s < 5; $s++) : ?><svg width="16" height="16" viewBox="0 0 24 24" fill="#ffcc00"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><?php endfor; ?></div>
        <div class="text-4xl text-[#ff4500]/20 font-serif mb-2">&ldquo;</div>
        <p class="text-sm md:text-[15px] text-white/70 leading-[1.8] mb-6"><?= tml_e($t['quote']) ?></p>
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-gradient-to-br <?= $gradients[$i] ?> flex items-center justify-center text-white font-bold text-sm"><?= $t['initial'] ?></div>
          <div><p class="text-sm font-semibold text-white"><?= tml_e($t['name']) ?></p><p class="text-xs text-white/30"><?= tml_e($t['company']) ?></p></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="flex md:hidden justify-center gap-2 mt-4"><?php for ($d = 0; $d < 3; $d++) : ?><button class="w-2 h-2 rounded-full <?= $d === 0 ? 'bg-[#ff4500]' : 'bg-white/20' ?>" data-tml-testimonial-dot></button><?php endfor; ?></div>
    <div class="flex items-center justify-center gap-2 mt-10 scroll-reveal">
      <div class="flex items-center gap-1"><?php for ($s = 0; $s < 5; $s++) : ?><svg width="14" height="14" viewBox="0 0 24 24" fill="#ffcc00"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><?php endfor; ?></div>
      <span class="text-sm font-bold text-white/70 ml-1">4.9/5</span>
      <span class="text-xs text-white/25 ml-2">Rated 4.9/5 across 500+ projects &middot; 98% client retention rate</span>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#050505] overflow-hidden">
  <div class="max-w-3xl mx-auto">
    <div class="text-center mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">FAQ</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Digital Marketing FAQ<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="space-y-3">
      <?php foreach ($homeFaqs as $i => $faq) : ?>
      <div class="border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors" data-tml-faq>
        <button type="button" class="w-full flex items-center justify-between p-5 md:p-6 text-left" data-tml-faq-toggle>
          <span class="flex items-center gap-4"><span class="text-xs font-mono text-[#ff4500]/40"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span><span class="text-white font-medium text-sm md:text-base pr-4"><?= tml_e($faq['q']) ?></span></span>
          <span class="text-white/30 text-xl flex-shrink-0 transition-transform" data-tml-faq-icon>+</span>
        </button>
        <div class="overflow-hidden transition-all duration-300 ease-out" style="max-height: 0;" data-tml-faq-body>
          <div class="px-5 pb-5 md:px-6 md:pb-6 pl-14 md:pl-16 text-sm text-white/45 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a']) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="glass-card mt-8 rounded-2xl p-6 md:p-8 text-center scroll-reveal">
      <p class="text-white font-medium mb-2">Still have questions?</p>
      <p class="text-sm text-white/35 mb-4">Book a free strategy call and we'll walk you through everything.</p>
      <a href="/contact-us" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#ff4500]/10 border border-[#ff4500]/20 text-sm text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors">Get in Touch &rarr;</a>
    </div>
  </div>
</section>

<!-- LIFE AT TML -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#080808] overflow-hidden relative">
  <div class="absolute top-0 left-6 right-6 lg:left-12 lg:right-12 h-px bg-gradient-to-r from-white/10 via-white/5 to-transparent"></div>
  <div class="max-w-7xl mx-auto">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-10 scroll-reveal">Life at TML</p>

    <!-- Two-column: Image left, Content right -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">
      <!-- LEFT: Image -->
      <div class="scroll-reveal">
        <div class="relative rounded-2xl overflow-hidden">
          <img src="/office.webp" alt="TML Agency modern creative workspace" class="w-full h-auto rounded-2xl" width="700" height="520" loading="lazy" />
          <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-[#080808] via-[#080808]/50 to-transparent pointer-events-none"></div>
          <div class="absolute bottom-5 left-5 bg-black/60 backdrop-blur-xl rounded-xl border border-white/10 px-4 py-3 flex items-center gap-3">
            <div class="flex -space-x-2">
              <div class="w-7 h-7 rounded-full border-2 border-[#080808] bg-gradient-to-br from-[#ff4500]/60 to-[#ff6b35]/40"></div>
              <div class="w-7 h-7 rounded-full border-2 border-[#080808] bg-gradient-to-br from-[#ff4500]/60 to-[#ff6b35]/40"></div>
              <div class="w-7 h-7 rounded-full border-2 border-[#080808] bg-gradient-to-br from-[#ff4500]/60 to-[#ff6b35]/40"></div>
              <div class="w-7 h-7 rounded-full border-2 border-[#080808] bg-gradient-to-br from-[#ff4500]/60 to-[#ff6b35]/40"></div>
            </div>
            <div>
              <p class="text-xs font-semibold text-white/90">50+ Creatives</p>
              <p class="text-[9px] text-white/50">Building brands daily</p>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: Content -->
      <div class="flex flex-col scroll-reveal scroll-delay-1">
        <!-- Heading -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl font-medium leading-tight tracking-tight text-white mb-4">
          Where Cool<br>
          <span class="italic bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">meets Culture.</span>
        </h2>

        <!-- Description -->
        <p class="text-sm md:text-base text-white/40 max-w-md leading-relaxed mb-8">
          Be a part of an <span class="font-semibold text-[#ff4500] italic">Award-Winning</span> workplace where creativity thrives and every voice matters.
        </p>

        <!-- Stats row -->
        <div class="flex gap-6 sm:gap-8 mb-8">
          <?php foreach ([['70+', 'Team Members'], ['4.9', 'Avg Rating'], ['92%', 'Stay 2+ Years']] as $cs) : ?>
          <div>
            <p class="text-2xl md:text-3xl font-bold text-white/90 tracking-tight"><?= tml_e($cs[0]) ?></p>
            <p class="text-[10px] text-white/30 tracking-[0.1em] uppercase mt-1"><?= tml_e($cs[1]) ?></p>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Separator -->
        <div class="w-full h-px bg-gradient-to-r from-white/15 via-white/5 to-transparent mb-6"></div>

        <!-- Perks grid 2x3 -->
        <div class="grid grid-cols-2 gap-3 mb-6">
          <?php
          $perks = [
              ['Team First', 'Collaboration over competition, always.', '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>'],
              ['Pet Friendly', 'Bring your furry friends to work.', '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="4" r="2"/><circle cx="18" cy="8" r="2"/><circle cx="4" cy="8" r="2"/><path d="M9 17s1 3 2 3 2-3 2-3"/><path d="M7 12c-1.5 1-3 3.5-3 5.5 0 2.5 2 4.5 5 4.5h6c3 0 5-2 5-4.5 0-2-1.5-4.5-3-5.5"/></svg>'],
              ['Food & Snacks', 'Fully stocked kitchen, all day.', '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 010 8h-1"/><path d="M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/><path d="M6 1v3M10 1v3M14 1v3"/></svg>'],
              ['Wellness Focus', 'Mental & physical health matters.', '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>'],
              ['Flexible Hours', 'Work when you\'re most productive.', '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>'],
              ['Fun Fridays', 'End the week with games & vibes.', '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>'],
          ];
          foreach ($perks as $i => $perk) : ?>
          <div class="group flex items-start gap-3 rounded-xl bg-white/[0.02] border border-white/[0.06] p-3.5 hover:bg-[#ff4500]/[0.03] hover:border-[#ff4500]/15 transition-all duration-300 cursor-default">
            <span class="text-white/40 group-hover:text-[#ff4500]/70 transition-colors duration-300 shrink-0 mt-0.5"><?= $perk[2] ?></span>
            <div>
              <span class="text-xs text-white/80 font-semibold tracking-wide block"><?= tml_e($perk[0]) ?></span>
              <span class="text-[10px] text-white/25 leading-snug block mt-0.5"><?= tml_e($perk[1]) ?></span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Ratings -->
        <div class="flex flex-wrap items-center gap-3 sm:gap-5 mb-8">
          <?php foreach ([['Glassdoor', '4.8'], ['Google', '4.9'], ['Clutch', '5.0']] as $ri => $plat) : ?>
          <div class="flex items-center gap-1.5">
            <span class="text-xs text-white/50"><?= tml_e($plat[0]) ?></span>
            <div class="flex gap-0.5"><?php for ($s = 0; $s < 5; $s++) : ?><span class="text-[#ffcc00] text-[10px]">&#9733;</span><?php endfor; ?></div>
            <span class="text-xs text-white/70 font-semibold"><?= tml_e($plat[1]) ?></span>
            <?php if ($ri < 2) : ?><span class="ml-3 w-px h-3 bg-white/10"></span><?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- CTA -->
        <a href="/careers" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#ff4500]/10 to-[#ff4500]/5 border border-[#ff4500]/20 px-8 py-4 text-sm font-semibold text-white/90 hover:text-white hover:border-[#ff4500]/40 transition-colors duration-300 w-fit">
          Join the Team
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="ml-1"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-24 md:py-32 px-6 lg:px-12 bg-[#050505] overflow-hidden relative">
  <div class="absolute top-0 left-6 right-6 lg:left-12 lg:right-12 h-px bg-gradient-to-r from-white/10 via-white/5 to-transparent"></div>
  <div class="max-w-7xl mx-auto">
    <!-- Showreel -->
    <div class="text-center mb-12 scroll-reveal">
      <p class="text-[10px] text-white/30 tracking-[0.25em] uppercase mb-4">Since 2010</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-2">Partner With TML Agency</h2>
      <p class="text-lg text-white/40 italic">Industry Titans</p>
    </div>
    <div class="relative rounded-2xl overflow-hidden border border-white/[0.06] mb-20 group scroll-reveal scroll-delay-1">
      <video data-src="/tml-showreel.mp4" poster="/tml-showreel-poster.jpg" autoplay muted loop playsinline aria-label="TML Agency brand showreel" class="w-full aspect-video bg-black"></video>
    </div>

    <!-- Say Hi — Image left, Content right -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
      <!-- LEFT: Image -->
      <div class="scroll-reveal scroll-delay-2">
        <div class="relative rounded-2xl overflow-hidden">
          <img src="/cta-image.webp" alt="TML Agency team collaborating" class="w-full h-auto rounded-2xl border border-white/[0.06]" loading="lazy" />
          <div class="absolute inset-x-0 bottom-0 h-1/4 bg-gradient-to-t from-[#050505] to-transparent pointer-events-none"></div>
        </div>
      </div>

      <!-- RIGHT: Content -->
      <div class="scroll-reveal scroll-delay-3">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-4 leading-tight">Get a Free<br><span class="italic bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">Marketing Consultation.</span></h2>
        <p class="text-sm md:text-base text-white/40 leading-relaxed mb-8 max-w-md">Book a free strategy call. We'll break down what's working, what's not, and exactly how we'd grow your brand — no pitch decks, no pressure.</p>

        <!-- Stats row -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
          <?php foreach ([['target'=>500,'suffix'=>'+','label'=>'Brands scaled'],['target'=>98,'suffix'=>'%','label'=>'Client retention'],['target'=>15,'suffix'=>'+','label'=>'Years in the game'],['target'=>49,'suffix'=>'/5','prefix'=>'4.','label'=>'Average rating']] as $cs) : ?>
          <div>
            <p class="text-2xl md:text-3xl font-bold text-white/90 tracking-tight"><span data-counter-target="<?= $cs['target'] ?>" data-counter-suffix="<?= tml_e($cs['suffix']) ?>" <?php if (!empty($cs['prefix'])) : ?>data-counter-prefix="<?= tml_e($cs['prefix']) ?>"<?php endif; ?>>0</span></p>
            <p class="text-[10px] text-white/30 tracking-[0.1em] uppercase mt-1"><?= tml_e($cs['label']) ?></p>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Separator -->
        <div class="w-full h-px bg-gradient-to-r from-white/15 via-white/5 to-transparent mb-8"></div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-start gap-4">
          <a href="/contact-us" class="glow-button inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5722] active:scale-[0.97] transition-all duration-300">
            Say Hi
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
          </a>
          <a href="#portfolio" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl border border-white/10 text-white/70 font-semibold text-sm hover:bg-white/[0.04] hover:text-white transition-all duration-300 active:scale-[0.97]">View Our Work</a>
        </div>

        <!-- Trust row -->
        <div class="flex items-center gap-3 mt-8">
          <div class="flex -space-x-2">
            <?php foreach ([['CB','from-[#ff4500] to-[#ff6b35]'],['AK','from-[#6366f1] to-[#8b5cf6]'],['RS','from-[#10b981] to-[#34d399]'],['MP','from-[#f59e0b] to-[#fbbf24]']] as $av) : ?>
            <div class="w-8 h-8 rounded-full bg-gradient-to-br <?= $av[1] ?> flex items-center justify-center text-white text-[10px] font-bold border-2 border-[#050505]"><?= $av[0] ?></div>
            <?php endforeach; ?>
          </div>
          <span class="text-xs text-white/30">500+ brands trust us</span>
        </div>
      </div>
    </div>

    <!-- Testimonial -->
    <div class="mt-16 p-6 rounded-2xl border border-white/[0.04] bg-white/[0.01] text-center scroll-reveal max-w-3xl mx-auto">
      <p class="text-sm text-white/50 italic">&ldquo;TML transformed our entire digital presence in 60 days.&rdquo;</p>
      <p class="text-xs text-white/25 mt-2">&mdash; CB Builders</p>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
