<?php
$title = 'Digital Marketing Services Canada | TML Agency';
$description = 'Explore 42+ digital marketing services — SEO, Google Ads, branding, web development, social media & AI automation. Trusted by 500+ brands across Canada.';
$keywords = 'digital marketing services Canada, SEO services, Google Ads management, branding services, web development services, social media marketing, lead generation, PPC management, content marketing Canada';
$canonicalPath = '/services';
$servicePages = tml_service_pages();
$categories = [
    ['category' => 'Branding & Design Services in Canada', 'services' => ['branding', 'graphic-design', 'branding-packaging', 'ui-design', 'ux-ui-design']],
    ['category' => 'Web Development Services in Canada', 'services' => ['website-development', 'web-design', 'wordpress-development', 'shopify-development', 'ecommerce-marketing']],
    ['category' => 'SEO & Search Engine Optimization Services', 'services' => ['seo', 'local-seo', 'technical-seo', 'link-building', 'geo-optimization']],
    ['category' => 'Performance Marketing & PPC Services Canada', 'services' => ['google-ads', 'meta-ads', 'microsoft-ads', 'linkedin-ads', 'tiktok-ads', 'amazon-marketing', 'ppc-management']],
    ['category' => 'Content Marketing & Email Services', 'services' => ['content-marketing', 'content-writing', 'email-marketing', 'marketing-automation']],
    ['category' => 'Lead Generation & CRO Agency', 'services' => ['lead-generation', 'conversion-rate-optimization', 'gmb-listing', 'online-reputation-management']],
    ['category' => 'Social Media Marketing Services Canada', 'services' => ['social-media', 'ai-influencer-management', 'influencer-marketing']],
    ['category' => 'AI & Software Development Services', 'services' => ['ai-automation', 'custom-software-development', 'mobile-app-development']],
    ['category' => 'Media Production Services in Canada', 'services' => ['video-editing', 'video-production', 'music-release']],
];
$stats = [['label' => 'Services', 'value' => '42+'], ['label' => 'Brands Served', 'value' => '500+'], ['label' => 'Team Members', 'value' => '70+'], ['label' => 'Years Experience', 'value' => '15+']];
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Services', 'url' => TML_SITE_URL . '/services'],
]);
$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
];
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Services', 'href' => '/services']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>
<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%);"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Our Services</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Digital Marketing Services Canada<br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">Full-Service Agency</span><span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/90 max-w-2xl mx-auto mb-10">Explore 42+ digital marketing services in Canada — from SEO, Google Ads &amp; branding to web development, social media marketing &amp; AI automation. Trusted by 500+ brands.</p>
    <div class="flex flex-wrap items-center justify-center gap-8 md:gap-12">
      <?php foreach ($stats as $i => $stat) : ?>
        <div class="flex items-center gap-3">
          <?php if ($i > 0) : ?><div class="hidden sm:block w-[1px] h-6 bg-white/[0.08] -ml-4 mr-1"></div><?php endif; ?>
          <div class="text-center">
            <p class="text-xl md:text-2xl font-bold text-white"><?= tml_e($stat['value']) ?></p>
            <p class="text-[10px] text-white/30 tracking-wide uppercase"><?= tml_e($stat['label']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
$serviceIcons = [
    'branding' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
    'website-development' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
    'graphic-design' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>',
    'lead-generation' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    'social-media' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>',
    'google-ads' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
    'seo' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
    'video-editing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>',
    'music-release' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>',
    'branding-packaging' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>',
    'ai-influencer-management' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 2a4 4 0 014 4v1a4 4 0 01-8 0V6a4 4 0 014-4z"/><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/></svg>',
    'web-design' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    'wordpress-development' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2v20"/></svg>',
    'shopify-development' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 01-8 0"/></svg>',
    'ecommerce-marketing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>',
    'local-seo' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    'technical-seo' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>',
    'link-building' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>',
    'geo-optimization' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
    'meta-ads' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
    'microsoft-ads' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="2" width="9" height="9"/><rect x="13" y="2" width="9" height="9"/><rect x="2" y="13" width="9" height="9"/><rect x="13" y="13" width="9" height="9"/></svg>',
    'linkedin-ads' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
    'tiktok-ads' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/></svg>',
    'amazon-marketing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>',
    'ppc-management' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
    'content-marketing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    'content-writing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M17 3a2.828 2.828 0 114 4L7.5 20.5 2 22l1.5-5.5L17 3z"/></svg>',
    'email-marketing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'marketing-automation' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>',
    'conversion-rate-optimization' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
    'gmb-listing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    'online-reputation-management' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'influencer-marketing' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>',
    'ux-ui-design' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
    'video-production' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"/><circle cx="12" cy="13" r="4"/></svg>',
    'ui-design' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
    'ai-automation' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
    'custom-software-development' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    'mobile-app-development' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
];
?>
<!-- Category quick-nav -->
<div class="w-full px-6 lg:px-12 pb-8 -mt-4 overflow-x-auto scrollbar-hide">
  <div class="flex items-center gap-3 max-w-7xl mx-auto">
    <?php foreach ($categories as $navIdx => $navCat) :
        $anchorId = strtolower(str_replace(['&', ' '], ['', '-'], $navCat['category']));
    ?>
    <a href="#<?= tml_e($anchorId) ?>" class="shrink-0 text-xs px-4 py-2 rounded-full border border-white/[0.08] text-white/50 hover:text-white hover:border-[#ff4500]/40 hover:bg-[#ff4500]/10 transition-all duration-200"><?= tml_e($navCat['category']) ?></a>
    <?php endforeach; ?>
  </div>
</div>

<?php
$categoryImages = [
    'Branding & Design Services in Canada' => '/media/brand-identity-design.webp',
    'Web Development Services in Canada' => '/media/web-design-creative-agency-dark.jpg',
    'SEO & Search Engine Optimization Services' => '/media/digital-marketing-creative.webp',
    'Performance Marketing & PPC Services Canada' => '/media/marketing-campaign-visual.webp',
    'Content Marketing & Email Services' => '/media/graphic-design-brand-story-layout.webp',
    'Lead Generation & CRO Agency' => '/media/creative-design-portfolio.webp',
    'Social Media Marketing Services Canada' => '/media/social-media-brand-feed.webp',
    'AI & Software Development Services' => '/media/graphic-design-ai-brand.webp',
    'Media Production Services in Canada' => '/media/visual-content-design.webp',
];
$categoryDescriptions = [
    'Branding & Design Services in Canada' => 'Build a memorable brand identity with our Canadian branding agency. Logo design, packaging, and UI/UX services.',
    'Web Development Services in Canada' => 'Custom websites, WordPress, Shopify, and e-commerce stores built for performance and conversions across Canada.',
    'SEO & Search Engine Optimization Services' => 'Dominate Google search results with data-driven SEO strategies — local SEO, technical SEO, and link building.',
    'Performance Marketing & PPC Services Canada' => 'Google Ads, Meta Ads, LinkedIn, TikTok, and Amazon PPC campaigns that maximize your ROI across every platform.',
    'Content Marketing & Email Services' => 'Engage your audience with compelling content marketing, copywriting, and automated email campaigns.',
    'Lead Generation & CRO Agency' => 'Turn traffic into leads and leads into customers with optimized funnels, GMB listings, and reputation management.',
    'Social Media Marketing Services Canada' => 'Grow your brand presence and community with social media management and influencer marketing across Canada.',
    'AI & Software Development Services' => 'Custom software development, mobile apps, and AI-powered marketing automation solutions for Canadian businesses.',
    'Media Production Services in Canada' => 'Professional video production, editing, and music release services for brands across Canada.',
];
?>
<?php foreach ($categories as $catIndex => $cat) : ?>
<section id="<?= tml_e(strtolower(str_replace(['&', ' '], ['', '-'], $cat['category']))) ?>" class="relative w-full px-6 py-16 md:py-20 lg:px-12 overflow-hidden <?= $catIndex % 2 === 1 ? 'bg-[#080808]' : '' ?>">
  <div class="relative mx-auto max-w-7xl">
    <!-- Category header with image -->
    <div class="relative mb-12 rounded-2xl overflow-hidden scroll-reveal" style="height: 180px;">
      <img src="<?= tml_e($categoryImages[$cat['category']] ?? '/media/digital-marketing-creative.webp') ?>" alt="<?= tml_e($cat['category']) ?>" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
      <div class="absolute inset-0 bg-gradient-to-r from-[#050505] via-[#050505]/80 to-transparent"></div>
      <div class="absolute inset-0 bg-[#050505]/40"></div>
      <div class="relative h-full flex items-center px-8 md:px-12">
        <div>
          <span class="text-xs text-[#ff4500] font-mono tracking-wider mb-2 block"><?= str_pad((string) ($catIndex + 1), 2, '0', STR_PAD_LEFT) ?> / <?= str_pad((string) count($categories), 2, '0', STR_PAD_LEFT) ?></span>
          <h2 class="text-2xl md:text-3xl lg:text-4xl font-medium text-white"><?= tml_e($cat['category']) ?></h2>
          <p class="text-sm text-white/60 mt-2 max-w-lg"><?= tml_e($categoryDescriptions[$cat['category']] ?? '') ?></p>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 scroll-reveal scroll-delay-1">
      <?php foreach ($cat['services'] as $slug) :
          $service = $servicePages[$slug] ?? null;
          if (!$service) {
              continue;
          }
          $svcIcon = $serviceIcons[$slug] ?? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>';
          ?>
      <a href="/services/<?= tml_e($slug) ?>" class="group flex flex-col h-full p-6 md:p-8 rounded-2xl glass-card hover:border-[#ff4500]/20 hover:shadow-[0_0_30px_rgba(255,69,0,0.06)] transition-all duration-300">
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 group-hover:scale-110 transition-all duration-300">
            <?= $svcIcon ?>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all duration-300"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors"><?= tml_e($service['title']) ?></h3>
        <p class="text-sm text-white/90 leading-relaxed mb-5 flex-1"><?= tml_e($service['description']) ?></p>
        <div class="flex flex-wrap gap-2 mt-auto">
          <?php foreach (array_slice($service['features'], 0, 3) as $f) : ?>
            <span class="text-[10px] px-3 py-1.5 rounded-full border border-white/[0.06] text-white/30 bg-white/[0.02]"><?= tml_e($f['title']) ?></span>
          <?php endforeach; ?>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endforeach; ?>

<!-- CTA -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-[#050505] via-[#ff4500]/[0.03] to-[#050505] pointer-events-none"></div>
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black 20%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black 20%, transparent 70%);"></div>
  <div class="relative mx-auto max-w-3xl text-center scroll-reveal">
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to Grow Your Business with a Digital Marketing Agency<span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/75 leading-relaxed mb-10 max-w-xl mx-auto">Tell us about your goals and we'll build a custom marketing strategy that drives real, measurable results for your brand.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] shadow-[0_0_30px_rgba(255,69,0,0.3)] inline-flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Get a Free Consultation</a>
      <a href="tel:+14036048692" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors inline-flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Call +1 (403) 604-8692</a>
    </div>
    <p class="text-xs text-white/30 mt-6">Or email us at <a href="mailto:info@townmedialabs.ca" class="text-[#ff4500]/70 hover:text-[#ff4500] transition-colors">info@townmedialabs.ca</a></p>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
