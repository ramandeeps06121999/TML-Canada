<?php
/** @var array{type: string, slug: string}|null */
$r = $GLOBALS['tml_route'] ?? null;
$slug = $r['slug'] ?? '';
$servicePages = tml_service_pages();
$data = $servicePages[$slug] ?? null;
if (!$data) {
    require TML_VIEWS . '/404.php';
    exit;
}

// Title pattern: "Best {Service} Services in Canada | TML Agency" (max 60 chars)
$shortTitles = [
    'ai-influencer-management' => 'AI Influencer',
    'music-release' => 'Music Release',
    'video-editing' => 'Video Editing',
    'branding-packaging' => 'Packaging Design',
    'online-reputation-management' => 'ORM',
    'conversion-rate-optimization' => 'CRO',
    'geo-optimization' => 'GEO',
    'ai-automation' => 'AI Automation',
    'custom-software-development' => 'Custom Software',
];
$titleName = $shortTitles[$slug] ?? $data['title'];
$generatedTitle = 'Best ' . $titleName . ' Services in Canada | TML Agency';
$title = !empty($data['metaTitle']) ? $data['metaTitle'] : (!empty($data['titleOverride']) ? $data['titleOverride'] : $generatedTitle);
// Unique meta description with service + CTA
$description = $data['metaDescription'] ?? ('Expert ' . strtolower($data['title']) . ' services by TML Agency. We help businesses grow with proven strategy and creative execution. Get a free quote today.');
$keywords = is_array($data['metaKeywords'] ?? null)
    ? implode(', ', $data['metaKeywords'])
    : ($data['metaKeywords'] ?? strtolower($data['title']) . ' services Edmonton, ' . strtolower($data['title']) . ' agency, ' . strtolower($data['title']) . ' company Canada, best ' . strtolower($data['title']) . ' Edmonton, TML Agency ' . strtolower($data['title']) . ', professional ' . strtolower($data['title']) . ' Alberta');
$canonicalPath = '/services/' . $slug;

$related = [];
foreach ($data['relatedServices'] ?? [] as $rs) {
    if (isset($servicePages[$rs])) {
        $related[] = $servicePages[$rs];
    }
}
$blogs = tml_blog_articles();
$relatedBlogSlugs = tml_service_related_blogs()[$slug] ?? [];
$industryPages = tml_industry_pages();
$industries = tml_industries();
$indSlugs = tml_service_related_industries()[$slug] ?? [];
$resolvedInd = [];
foreach ($indSlugs as $is) {
    $row = tml_resolve_industry($industryPages[$is] ?? null, $industries[$is] ?? null);
    if ($row) {
        $resolvedInd[] = ['slug' => $is, 'name' => $row['name'], 'description' => $row['description']];
    }
}

// Service → media image mapping (5 UNIQUE images per service — each page section uses a different image)
// Index 0: Features section | Index 1: SEO Content section | Index 2-4: Deep Content sections
$serviceImageMap = [
    'branding'                    => ['brand-identity-design.webp',             'branding-shoot.jpg',                       'graphic-design-brand-identity.webp',       'brand-identity-design-2.webp',             'brand-strategy-visual.webp'],
    'google-ads'                  => ['billboard-advertising-campaign.jpg',      'creative-ad-roofing-company.webp',         'creative-ad-back-to-school-cairo.webp',    'creative-ad-dental-clinic-fly.webp',       'creative-ad-legal-education-red.webp'],
    'seo'                         => ['web-design-landing-page.webp',           'digital-marketing-creative.webp',          'web-design-finance-hero.webp',             'saas-website-design.webp',                 'graphic-design-brand-showcase.webp'],
    'website-development'         => ['web-design-creative-agency-dark.jpg',    'web-design-community-platform.webp',       'web-design-travel-app.webp',               'web-design-productivity-tool.webp',        'web-design-ai-design-tool.jpg'],
    'social-media'                => ['social-media-content-mockup.png',        'social-media-brand-feed.webp',             'social-media-real-estate-posts-grid.webp', 'social-media-chupa-chups.webp',            'social-media-instagram-mockup.webp'],
    'graphic-design'              => ['graphic-design-coca-cola-marvel.webp',   'graphic-design-pepsi-billboard.jpg',       'graphic-design-snickers-guerilla.jpg',     'graphic-design-faber-castell.jpg',          'graphic-design-colgate-creative.jpg'],
    'lead-generation'             => ['marketing-campaign-visual.webp',         'creative-ad-protein-fitness.webp',         'creative-ad-eyewear-fashion.webp',         'creative-ad-durex-football.webp',          'brand-photography.jpg'],
    'video-editing'               => ['creative-photography.jpg',               'visual-storytelling.jpg',                  'campaign-photography.jpg',                 'fashion-editorial.jpg',                    'studio-photography.jpg'],
    'branding-packaging'          => ['packaging-design-creative.webp',         'packaging-design-water-bottle-brand.webp', 'packaging-design-candy-characters.webp',   'packaging-design-eskimo-ice-cream.webp',   'packaging-design-minimalist-cans.webp'],
    'ai-influencer-management'    => ['social-media-influencer-content.webp',   'social-media-instagram-lifestyle.jpg',     'social-media-promo-grid.jpg',              'social-media-podcast-grid.jpg',            'social-media-turkish-agency.jpg'],
    'music-release'               => ['poster-design-weeknd-blinding-lights.webp', 'visual-content-design.webp',           'portrait-photography.jpg',                 'art-direction.jpg',                        'artistic-photography.jpg'],
    'shopify-development'         => ['ecommerce-branding-creative.webp',       'product-photography-skincare-set.webp',    'product-photography-retro-brand.webp',     'product-photography-skincare-toner.webp',  'product-branding-campaign.webp'],
    'tiktok-ads'                  => ['social-media-agency-grid.jpg',           'instagram-feed-design.webp',               'social-media-instagram-mockup.webp',       'graphic-design-social-media-story.webp',   'graphic-design-social-story-1.webp'],
    'web-design'                  => ['saas-website-design.webp',               'web-design-travel-adventure.jpg',          'web-design-web3-platform.jpg',             'creative-design-portfolio.webp',           'web-design-landing-page.webp'],
    'wordpress-development'       => ['web-design-productivity-tool.webp',      'web-design-ai-design-tool.jpg',            'ux-design-illustration.webp',              'web-design-finance-hero.webp',             'web-design-community-platform.webp'],
    'linkedin-ads'                => ['commercial-photography.jpg',             'professional-photography.jpg',             'graphic-design-clean-minimal-ad.webp',     'graphic-design-3d-ux-concept.webp',        'graphic-design-ai-brand.webp'],
    'marketing-automation'        => ['graphic-design-brand-story-layout.webp', 'graphic-design-brand-typography.webp',     'graphic-design-product-layout.webp',       'graphic-design-product-showcase.webp',     'graphic-design-illustration.webp'],
    'amazon-marketing'            => ['product-photography-sneakers.webp',      'product-photography-lifestyle-drinks.webp','product-photography-handbag-sunset.webp',  'product-photography-jewelry.webp',         'product-photography-luxury-skincare.webp'],
    'geo-optimization'            => ['graphic-design-creative.webp',           'graphic-design-minimal-brand-ad.webp',     'graphic-design-creative-brand.webp',       'graphic-design-denim-fashion.webp',        'graphic-design-dark-story-ad.webp'],
    'ux-ui-design'                => ['ux-design-illustration.webp',            'graphic-design-product-layout.webp',       'graphic-design-product-showcase.webp',     'minimalist-design.jpg',                    'typography-design.jpg'],
    'mobile-app-development'      => ['graphic-design-illustration.webp',       'graphic-design-minimal-story.webp',        'graphic-design-creative-story-ad.webp',    'graphic-design-story-brand-post.webp',     'graphic-design-story-social-post.webp'],
    'video-production'            => ['fashion-photography.jpg',                'landscape-photography.jpg',                'magazine-photography.jpg',                 'content-photography.jpg',                  'editorial-photography.jpg'],
    'microsoft-ads'               => ['outdoor-advertising-billboard.webp',     'advertising-photography.jpg',              'graphic-design-fitness-billboard.webp',    'graphic-design-spice-sauce-ad.webp',       'graphic-design-food-ad.jpg'],
    'local-seo'                   => ['graphic-design-fried-chicken-ad.webp',   'graphic-design-dental-creative.webp',      'graphic-design-sneaker-creative.jpg',      'lifestyle-brand.jpg',                      'lifestyle-photography.jpg'],
    'ui-design'                   => ['graphic-design-social-media-story.webp', 'graphic-design-social-story-3.webp',       'graphic-design-social-story-4.webp',       'graphic-design-minimal-brand-ad.webp',     'graphic-design-clean-minimal-ad.webp'],
    'ai-automation'               => ['graphic-design-creative-photography.webp','graphic-design-clarity-brand.jpg',        'graphic-design-creative-fashion-ad.jpg',   'graphic-design-denim-heels.jpg',           'architectural-photography.jpg'],
    'custom-software-development' => ['web-design-travel-app.webp',             'web-design-creative-agency-dark.jpg',      'graphic-design-brand-story-creative.webp', 'poster-design-netflix-induction.webp',     'graphic-design-food-ad.jpg'],
    'content-marketing'           => ['content-photography.jpg',                'editorial-photography.jpg',                'magazine-photography.jpg',                 'visual-content-design.webp',               'brand-strategy-visual.webp'],
    'content-writing'             => ['typography-design.jpg',                  'minimalist-design.jpg',                    'landscape-photography.jpg',                'artistic-photography.jpg',                 'portrait-photography.jpg'],
    'email-marketing'             => ['graphic-design-social-story-1.webp',     'graphic-design-social-story-3.webp',       'graphic-design-social-story-4.webp',       'graphic-design-social-media-story.webp',   'graphic-design-minimal-story.webp'],
    'link-building'               => ['graphic-design-colgate-creative.jpg',    'graphic-design-faber-castell.jpg',          'graphic-design-sneaker-creative.jpg',      'graphic-design-coca-cola-billboard.jpg',   'graphic-design-pepsi-billboard.jpg'],
    'meta-ads'                    => ['instagram-feed-design.webp',             'social-media-agency-grid.jpg',             'social-media-turkish-agency.jpg',          'social-media-influencer-content.webp',     'social-media-brand-feed.webp'],
    'influencer-marketing'        => ['product-photography-fashion-editorial.webp','product-photography-fashion-night.webp','product-photography-cinematic-portrait.webp','product-photography-perfume-shoot.jpg',  'product-photography-sunscreen.jpg'],
    'ppc-management'              => ['creative-ad-protein-fitness.webp',        'creative-ad-eyewear-fashion.webp',        'billboard-advertising-campaign.jpg',        'outdoor-advertising-billboard.webp',       'advertising-photography.jpg'],
    'online-reputation-management'=> ['brand-photography.jpg',                  'lifestyle-brand.jpg',                      'lifestyle-photography.jpg',                'commercial-photography.jpg',               'professional-photography.jpg'],
    'conversion-rate-optimization'=> ['graphic-design-clarity-brand.jpg',       'graphic-design-creative-fashion-ad.jpg',   'graphic-design-denim-heels.jpg',           'product-photography-blue-brand.jpg',       'product-photography-brand-lifestyle.jpg'],
    'ecommerce-marketing'         => ['product-branding-campaign.webp',         'product-photography-jewelry.webp',         'product-photography-luxury-skincare.webp', 'product-photography-cocktails.webp',       'product-photography-food-croissant.webp'],
    'gmb-listing'                 => ['graphic-design-creative-photography.webp','beauty-product-photography.webp',         'product-photography-styled-still-life.webp','product-photography-lipstick-beauty.webp','product-photography-facial-cream.jpg'],
    'technical-seo'               => ['graphic-design-brand-story-creative.webp','poster-design-netflix-induction.webp',    'artistic-photography.jpg',                 'graphic-design-brand-showcase.webp',       'graphic-design-brand-story-layout.webp'],
    'digital-marketing'           => ['brand-identity-design-2.webp',           'creative-ad-durex-football.webp',          'architectural-photography.jpg',            'digital-marketing-creative.webp',          'marketing-campaign-visual.webp'],
    'enterprise-seo'              => ['product-photography-blue-brand.jpg',     'product-photography-brand-lifestyle.jpg',  'product-photography-facial-cream.jpg',     'product-photography-bicycle-lifestyle.jpg','product-photography-bicycle-summer.jpg'],
    'ecommerce-seo'               => ['product-photography-sneaker-sky.webp',   'product-photography-yellow-sneakers.jpg',  'product-photography-styled-still-life.webp','product-photography-skincare-set.webp',  'ecommerce-branding-creative.webp'],
];
$serviceImages = $serviceImageMap[$slug] ?? ['digital-marketing-creative.webp', 'brand-identity-design.webp', 'creative-design-portfolio.webp'];
$ogImageOverride = TML_SITE_URL . '/media/' . $serviceImages[0];

// Load pricing tiers and last updated date for schema
$servicePricingData = tml_service_pricing();
$serviceLastUpdatedData = tml_service_last_updated();
$pricingTiers = [];
if (isset($servicePricingData[$slug])) {
    $pricing = $servicePricingData[$slug];
    foreach ($pricing['tiers'] ?? [] as $tier) {
        $pricingTiers[] = [
            'name' => $tier['name'],
            'price' => $tier['price'],
            'currency' => $pricing['currency'] ?? 'CAD',
            'description' => $tier['description'] ?? '',
        ];
    }
}
$lastUpdated = $serviceLastUpdatedData[$slug] ?? null;

$serviceSchema = tml_schema_service([
    'name' => $data['title'],
    'description' => $data['description'],
    'url' => TML_SITE_URL . '/services/' . $slug,
    'areaServed' => 'Canada',
    'category' => $data['title'],
    'pricingTiers' => $pricingTiers,
    'dateModified' => $lastUpdated,
]);
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Services', 'url' => TML_SITE_URL . '/services'],
    ['name' => $data['title'], 'url' => TML_SITE_URL . '/services/' . $slug],
]);
$faqItems = [];
foreach ($data['faqs'] ?? [] as $f) {
    $faqItems[] = ['question' => $f['q'] ?? $f['question'] ?? '', 'answer' => $f['a'] ?? $f['answer'] ?? ''];
}
$extraHead = [
    tml_json_ld_script($serviceSchema),
    tml_json_ld_script($breadcrumbSchema),
];
if (count($faqItems) > 0) {
    $extraHead[] = tml_json_ld_script(tml_schema_faq($faqItems));
}

require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<section class="relative w-full px-6 pt-32 pb-16 md:pt-40 md:pb-24 lg:px-12 overflow-hidden">
  <!-- Grid Background (behind everything, faded at edges) -->
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%);"></div>
  <div class="relative z-10 max-w-5xl mx-auto mb-8">
    <?php
    $items = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Services', 'href' => '/services'],
        ['label' => $data['title'], 'href' => '/services/' . $slug],
    ];
    require TML_VIEWS . '/partials/breadcrumbs.php';
    ?>
  </div>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none z-[2]"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <a href="/services" class="inline-flex items-center gap-2 text-[11px] text-white/90 tracking-[0.2em] uppercase hover:text-white mb-8">← All Services</a>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Best <?= tml_e($data['title']) ?> Services<span class="text-[#ff4500]">.</span></h1>
    <p class="text-lg md:text-xl text-white/90 font-medium mb-4"><?= tml_e($data['tagline']) ?></p>
    <p class="text-sm md:text-base text-white/80 leading-relaxed max-w-2xl mx-auto mb-8"><?= tml_e($data['heroDescription']) ?></p>
    <!-- Author Attribution -->
    <p class="text-xs text-white/40 tracking-wide mb-10">By <span class="text-white/70 font-semibold">Raman Makkar</span> • Founder & Chief SEO Strategist at TML Agency</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Get a Free Quote</a>
      <a href="mailto:info@townmedialabs.ca" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>Talk to an Expert</a>
    </div>
  </div>
</section>

<section class="relative w-full px-6 py-12 md:py-16 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
      <?php foreach ($data['stats'] ?? [] as $stat) :
          $val = $stat['value'];
          // Only use counter for simple integer values like "200+", "94%", "500+"
          // Values like "4.8/5", "3x", "48hr" should display as-is
          $isSimpleInt = preg_match('/^(\d+)([+%]?)$/', $val, $m);
          ?>
      <div class="text-center p-6 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="text-2xl md:text-3xl font-bold text-white mb-1">
          <?php if ($isSimpleInt && (int) $m[1] > 0) : ?>
            <span data-counter-target="<?= (int) $m[1] ?>" data-counter-suffix="<?= tml_e($m[2]) ?>">0</span>
          <?php else : ?>
            <span class="text-[#ff4500]"><?= tml_e($val) ?></span>
          <?php endif; ?>
        </div>
        <p class="text-xs text-white/90 tracking-wide"><?= tml_e($stat['label']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php /* Images integrated into each section below */ ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">What We Offer</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Our <?= tml_e($data['title']) ?> Agency Services in Canada<span class="text-[#ff4500]">.</span></h2>
    <?php
    $featureIcons = [
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>',
    ];
    ?>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
      <!-- Left: Image -->
      <figure class="group relative overflow-hidden rounded-2xl border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500 min-h-[400px]">
        <img src="/media/<?= tml_e($serviceImages[0]) ?>" alt="<?= tml_e($data['title']) ?> services by TML Agency Canada" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
      </figure>
      <!-- Right: Feature cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 content-start">
        <?php foreach ($data['features'] ?? [] as $i => $feature) : ?>
        <div class="group p-5 rounded-2xl glass-card">
          <div class="w-9 h-9 rounded-lg bg-[#ff4500]/10 flex items-center justify-center mb-4 group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $featureIcons[$i % count($featureIcons)] ?>
          </div>
          <h3 class="text-base font-semibold text-white mb-2"><?= tml_e($feature['title']) ?></h3>
          <p class="text-xs text-white/60 leading-relaxed"><?= tml_e($feature['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($data['seoContent'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-5xl">
    <div class="scroll-reveal grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
      <!-- Left: Text content -->
      <div>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-8">Why Your Business Needs a <?= tml_e($data['title']) ?> Company<span class="text-[#ff4500]">.</span></h2>
        <div class="space-y-4">
          <?php foreach ($data['seoContent'] as $i => $paragraph) :
            $trimmed = strlen(strip_tags($paragraph)) > 250 ? substr(strip_tags($paragraph), 0, 250) . '...' : $paragraph;
          ?>
          <p class="text-sm text-white/75 leading-[1.75]"><?= $trimmed ?></p>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- Right: Image -->
      <figure class="group relative overflow-hidden rounded-2xl border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500 min-h-[400px]">
        <img src="/media/<?= tml_e($serviceImages[1] ?? $serviceImages[0]) ?>" alt="Why your business needs <?= tml_e(strtolower($data['title'])) ?> — TML Agency" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
      </figure>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($data['deepContent'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-5xl space-y-16 md:space-y-24">
    <?php foreach ($data['deepContent'] as $sectionIndex => $section) : ?>
    <div class="relative">
      <div class="flex items-center gap-4 mb-8">
        <span class="text-xs font-mono text-[#ff4500]/50 font-bold"><?= str_pad((string) ($sectionIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
        <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch <?= $sectionIndex % 2 === 1 ? 'direction-rtl' : '' ?>">
        <?php if ($sectionIndex % 2 === 0) : ?>
        <!-- Text Left, Image Right -->
        <div>
          <h2 class="text-2xl sm:text-3xl md:text-[2rem] font-medium text-white leading-tight mb-6"><?= tml_e($section['heading']) ?><span class="text-[#ff4500]">.</span></h2>
          <div class="space-y-3">
            <?php foreach (array_slice($section['paragraphs'], 0, 2) as $p) :
              // Trim long paragraphs to ~200 chars for cleaner layout
              $trimmed = strlen(strip_tags($p)) > 250 ? substr(strip_tags($p), 0, 250) . '...' : $p;
            ?>
              <p class="text-sm text-white/75 leading-[1.75]"><?= $trimmed ?></p>
            <?php endforeach; ?>
          </div>
        </div>
        <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
          <img src="/media/<?= tml_e(($sectionIndex + 2 < count($serviceImages) ? $serviceImages[$sectionIndex + 2] : (['packaging-design-goody-candy-sour-sweet.webp','packaging-design-kids-sandwich-box.webp','packaging-design-moody-snacks.webp','product-photography-cocktails.webp','product-photography-food-croissant.webp','product-photography-lipstick-beauty.webp','product-photography-fine-art.webp','social-media-real-estate-posts-grid.webp','creative-ad-back-to-school-cairo.webp','poster-design-weeknd-blinding-lights.webp'])[($sectionIndex - 3) % 10])) ?>" alt="<?= tml_e($section['heading']) ?> — <?= tml_e($data['title']) ?> by TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </figure>
        <?php else : ?>
        <!-- Image Left, Text Right -->
        <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
          <img src="/media/<?= tml_e(($sectionIndex + 2 < count($serviceImages) ? $serviceImages[$sectionIndex + 2] : (['packaging-design-goody-candy-sour-sweet.webp','packaging-design-kids-sandwich-box.webp','packaging-design-moody-snacks.webp','product-photography-cocktails.webp','product-photography-food-croissant.webp','product-photography-lipstick-beauty.webp','product-photography-fine-art.webp','social-media-real-estate-posts-grid.webp','creative-ad-back-to-school-cairo.webp','poster-design-weeknd-blinding-lights.webp'])[($sectionIndex - 3) % 10])) ?>" alt="<?= tml_e($section['heading']) ?> — <?= tml_e($data['title']) ?> by TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </figure>
        <div>
          <h2 class="text-2xl sm:text-3xl md:text-[2rem] font-medium text-white leading-tight mb-6"><?= tml_e($section['heading']) ?><span class="text-[#ff4500]">.</span></h2>
          <div class="space-y-3">
            <?php foreach (array_slice($section['paragraphs'], 0, 2) as $p) :
              // Trim long paragraphs to ~200 chars for cleaner layout
              $trimmed = strlen(strip_tags($p)) > 250 ? substr(strip_tags($p), 0, 250) . '...' : $p;
            ?>
              <p class="text-sm text-white/75 leading-[1.75]"><?= $trimmed ?></p>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($data['pricingNote'])) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 bg-[#080808]">
  <div class="relative mx-auto max-w-4xl">
    <div class="gradient-border relative p-[1px] rounded-2xl overflow-hidden">
      <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#ff4500]/30 via-[#ff4500]/5 to-[#ff4500]/20 opacity-60"></div>
      <div class="relative bg-[#0a0a0a] rounded-2xl p-8 md:p-10">
        <p class="text-[10px] text-[#ff4500]/60 tracking-[0.2em] uppercase font-semibold mb-2">Transparent Pricing</p>
        <h2 class="scroll-reveal text-xl md:text-2xl font-semibold text-white mb-4"><?= tml_e($data['title']) ?> Services Pricing &amp; Investment</h2>
        <p class="text-sm md:text-[15px] text-white/75 leading-[1.8] mb-6"><?= tml_e($data['pricingNote']) ?></p>
        <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Get a Custom Quote</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- PROCESS — Timeline style -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-6xl">
    <div class="text-center mb-14 scroll-reveal">
      <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Our Process</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">How Our <?= tml_e($data['title']) ?> Expert Process Works<span class="text-[#ff4500]">.</span></h2>
    </div>
    <?php
    $processIcons = [
        '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
        '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
        '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/></svg>',
        '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
        '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    ];
    $stepCount = count($data['process'] ?? []);
    ?>
    <!-- Connecting line behind cards (desktop only) -->
    <div class="relative">
      <div class="hidden lg:block absolute top-10 left-[10%] right-[10%] h-[2px] bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent z-0"></div>
      <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 sm:grid-cols-2 <?= $stepCount <= 4 ? 'lg:grid-cols-4' : 'lg:grid-cols-5' ?> gap-6 relative z-10">
        <?php foreach ($data['process'] ?? [] as $i => $step) : ?>
        <div class="group text-center">
          <div class="mx-auto w-20 h-20 rounded-2xl bg-gradient-to-br from-[#ff4500]/20 to-[#ff4500]/5 border border-[#ff4500]/20 flex flex-col items-center justify-center mb-6 group-hover:from-[#ff4500]/30 group-hover:to-[#ff4500]/10 group-hover:border-[#ff4500]/40 transition-all duration-300">
            <div class="text-[#ff4500]"><?= $processIcons[$i % count($processIcons)] ?></div>
            <span class="text-[10px] font-mono text-[#ff4500]/50 mt-1"><?= tml_e($step['step'] ?? $step['title'] ?? '') ?></span>
          </div>
          <h3 class="text-lg font-semibold text-white mb-2"><?= tml_e($step['title'] ?? $step['step'] ?? '') ?></h3>
          <p class="text-sm text-white/75 leading-relaxed max-w-[220px] mx-auto"><?= tml_e($step['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- FAQ — Numbered accordion -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <div class="text-center mb-12 scroll-reveal">
      <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">FAQ</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white"><?= tml_e($data['title']) ?> Services — Questions Answered<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="space-y-3">
      <?php foreach ($data['faqs'] ?? [] as $fi => $faq) : ?>
      <div class="border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors" data-tml-faq>
        <button type="button" class="w-full flex items-center gap-4 p-5 md:p-6 text-left" data-tml-faq-toggle>
          <span class="w-8 h-8 rounded-lg bg-[#ff4500]/10 flex items-center justify-center flex-shrink-0">
            <span class="text-xs font-mono text-[#ff4500] font-bold"><?= str_pad((string) ($fi + 1), 2, '0', STR_PAD_LEFT) ?></span>
          </span>
          <span class="flex-1 text-white font-medium text-sm md:text-base"><?= tml_e($faq['q'] ?? $faq['question'] ?? '') ?></span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/80 flex-shrink-0 transition-transform duration-200" data-tml-faq-icon><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="overflow-hidden transition-all duration-300 ease-out" style="max-height: 0;" data-tml-faq-body>
          <div class="px-5 pb-5 md:px-6 md:pb-6 pl-[3.75rem] md:pl-[4.25rem] text-sm text-white/50 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a'] ?? $faq['answer'] ?? '') ?></div>
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
    <h2 class="text-2xl sm:text-3xl font-medium text-white">Brand Identity &amp; Creative Work<span class="text-[#ff4500]">.</span></h2>
  </div>

  <?php
  // Service-specific creative work images + general portfolio
  $serviceCarouselMap = [
      'branding' => [
          ['brand-identity-design.webp', 'Brand Identity System', 'Branding'], ['brand-identity-design-2.webp', 'Brand Identity Design', 'Branding'], ['brand-strategy-visual.webp', 'Brand Strategy Visual', 'Strategy'],
          ['graphic-design-brand-identity.webp', 'Brand Identity Package', 'Branding'], ['graphic-design-brand-showcase.webp', 'Brand Showcase', 'Branding'], ['graphic-design-brand-typography.webp', 'Brand Typography', 'Design'],
      ],
      'graphic-design' => [
          ['graphic-design-coca-cola-marvel.webp', 'Coca-Cola x Marvel Creative', 'Graphic Design'], ['graphic-design-pepsi-billboard.jpg', 'Pepsi Billboard', 'Graphic Design'], ['graphic-design-snickers-guerilla.jpg', 'Snickers Guerilla Ad', 'Graphic Design'],
          ['graphic-design-faber-castell.jpg', 'Faber-Castell Creative', 'Graphic Design'], ['graphic-design-fitness-billboard.webp', 'Fitness Billboard', 'Advertising'], ['poster-design-netflix-induction.webp', 'Netflix Poster Design', 'Design'],
          ['graphic-design-colgate-creative.jpg', 'Colgate Creative', 'Graphic Design'], ['graphic-design-sneaker-creative.jpg', 'Sneaker Creative', 'Design'], ['graphic-design-food-ad.jpg', 'Food Ad Design', 'Advertising'],
      ],
      'social-media' => [
          ['social-media-content-mockup.png', 'Social Media Mockup', 'Social Media'], ['instagram-feed-design.webp', 'Instagram Grid Design', 'Social Media'], ['social-media-brand-feed.webp', 'Brand Feed Design', 'Social Media'],
          ['social-media-real-estate-posts-grid.webp', 'Real Estate Social', 'Social Media'], ['social-media-chupa-chups.webp', 'Chupa Chups Social', 'Social Media'], ['social-media-influencer-content.webp', 'Influencer Content', 'Social Media'],
          ['social-media-instagram-mockup.webp', 'Instagram Mockup', 'Social Media'], ['social-media-instagram-lifestyle.jpg', 'Lifestyle Content', 'Social Media'], ['social-media-turkish-agency.jpg', 'Agency Social Design', 'Social Media'],
      ],
      'web-design' => [
          ['web-design-landing-page.webp', 'Landing Page Design', 'Web Design'], ['saas-website-design.webp', 'SaaS Website', 'Web Design'], ['web-design-creative-agency-dark.jpg', 'Dark Agency Website', 'Web Design'],
          ['web-design-finance-hero.webp', 'Finance Website', 'Web Design'], ['web-design-web3-platform.jpg', 'Web3 Platform', 'Web Design'], ['web-design-community-platform.webp', 'Community Platform', 'Web Design'],
          ['web-design-travel-app.webp', 'Travel App Design', 'UI/UX'], ['web-design-productivity-tool.webp', 'Productivity Tool', 'Web Design'], ['web-design-ai-design-tool.jpg', 'AI Design Tool', 'Web Design'],
      ],
      'branding-packaging' => [
          ['packaging-design-creative.webp', 'Packaging Design', 'Packaging'], ['packaging-design-water-bottle-brand.webp', 'Water Bottle Branding', 'Packaging'], ['packaging-design-candy-characters.webp', 'Candy Characters', 'Packaging'],
          ['packaging-design-eskimo-ice-cream.webp', 'Ice Cream Packaging', 'Packaging'], ['packaging-design-minimalist-cans.webp', 'Minimalist Cans', 'Packaging'], ['packaging-design-character-cups.webp', 'Character Cups', 'Packaging'],
          ['packaging-design-moody-snacks.webp', 'Snack Packaging', 'Packaging'], ['packaging-design-kids-sandwich-box.webp', 'Kids Sandwich Box', 'Packaging'], ['packaging-design-goody-candy-sour-sweet.webp', 'Candy Packaging', 'Packaging'],
      ],
      'google-ads' => [
          ['billboard-advertising-campaign.jpg', 'Billboard Campaign', 'Advertising'], ['outdoor-advertising-billboard.webp', 'Outdoor Billboard', 'Advertising'], ['creative-ad-protein-fitness.webp', 'Fitness Ad', 'Advertising'],
          ['creative-ad-roofing-company.webp', 'Roofing Company Ad', 'Advertising'], ['creative-ad-dental-clinic-fly.webp', 'Dental Clinic Ad', 'Advertising'], ['creative-ad-eyewear-fashion.webp', 'Eyewear Fashion Ad', 'Advertising'],
      ],
  ];
  // Use service-specific images if available, otherwise use a general mix
  // IMPORTANT: Exclude images already used on this page ($serviceImages) to prevent duplicates
  $allCarouselPool = [
      ['packaging-design-water-bottle-brand.webp', 'Water Bottle Branding', 'Packaging'],
      ['product-photography-fashion-shoes.webp', 'Fashion Shoes Editorial', 'Photography'],
      ['social-media-real-estate-posts-grid.webp', 'Real Estate Social', 'Social Media'],
      ['web-design-travel-app.webp', 'Travel App Design', 'Web Design'],
      ['graphic-design-brand-story-creative.webp', 'Brand Story Creative', 'Branding'],
      ['product-photography-cocktails.webp', 'Cocktail Photography', 'Photography'],
      ['packaging-design-minimalist-cans.webp', 'Minimalist Cans', 'Packaging'],
      ['creative-ad-back-to-school-cairo.webp', 'Back to School Campaign', 'Advertising'],
      ['social-media-podcast-grid.jpg', 'Podcast Social Grid', 'Social Media'],
      ['web-design-productivity-tool.webp', 'Productivity Tool', 'Web Design'],
      ['graphic-design-colgate-creative.jpg', 'Colgate Creative', 'Graphic Design'],
      ['product-photography-lipstick-beauty.webp', 'Lipstick Beauty Shoot', 'Photography'],
      ['packaging-design-character-cups.webp', 'Character Cups', 'Packaging'],
      ['graphic-design-social-story-1.webp', 'Social Story Design', 'Design'],
      ['product-photography-handbag-sunset.webp', 'Handbag Sunset Shot', 'Photography'],
      ['web-design-travel-adventure.jpg', 'Travel Adventure Site', 'Web Design'],
      ['graphic-design-denim-fashion.webp', 'Denim Fashion Creative', 'Fashion'],
      ['product-photography-cinematic-portrait.webp', 'Cinematic Portrait', 'Photography'],
      ['packaging-design-moody-snacks.webp', 'Moody Snack Packaging', 'Packaging'],
      ['social-media-instagram-lifestyle.jpg', 'Instagram Lifestyle', 'Social Media'],
      ['graphic-design-minimal-brand-ad.webp', 'Minimal Brand Ad', 'Design'],
      ['product-photography-food-croissant.webp', 'Croissant Food Shoot', 'Photography'],
      ['poster-design-weeknd-blinding-lights.webp', 'Weeknd Poster Design', 'Design'],
      ['graphic-design-creative-brand.webp', 'Creative Brand Design', 'Branding'],
  ];
  // Filter out ANY image already used in sections above — prevents ALL duplicates on page
  $usedOnPage = $serviceImages;
  $rawCarousel = $serviceCarouselMap[$slug] ?? $allCarouselPool;
  $carouselImages = array_values(array_filter($rawCarousel, function ($img) use ($usedOnPage) {
      return !in_array($img[0], $usedOnPage, true);
  }));
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
                <img src="/media/<?= tml_e($cc[0]) ?>" alt="<?= tml_e($cc[1]) ?> — <?= tml_e($data['title']) ?> by TML Agency" loading="lazy" width="600" height="450" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
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

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to elevate your <?= tml_e(strtolower($data['title'])) ?><span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/75 leading-relaxed mb-10 max-w-xl mx-auto">Let&apos;s discuss how our <?= tml_e(strtolower($data['title'])) ?> services can help grow your business.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)] inline-flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Book a Free Strategy Call</a>
      <a href="tel:+14036048692" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors inline-flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Call +1 (403) 604-8692</a>
    </div>
    <p class="text-xs text-white/80 mt-6">Or email us at <a href="mailto:info@townmedialabs.ca" class="text-[#ff4500]/70 hover:text-[#ff4500] transition-colors">info@townmedialabs.ca</a></p>
  </div>
</section>

<?php if (count($related) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <h2 class="scroll-reveal text-2xl sm:text-3xl font-medium text-white mb-10">Services Related to <?= tml_e($data['title']) ?></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($related as $rel) : ?>
      <a href="/services/<?= tml_e($rel['slug']) ?>" class="group block p-6 md:p-8 rounded-2xl glass-card">
        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500]"><?= tml_e($rel['title']) ?></h3>
        <p class="text-sm text-white/90 leading-relaxed mb-4"><?= tml_e($rel['description']) ?></p>
        <span class="text-xs text-[#ff4500] font-medium">Learn More →</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
$rb = [];
foreach ($relatedBlogSlugs as $bs) {
    if (isset($blogs[$bs])) {
        $rb[] = ['slug' => $bs, 'article' => $blogs[$bs]];
    }
}
?>
<?php if (count($rb) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">From Our Blog</p>
    <h2 class="scroll-reveal text-2xl sm:text-3xl font-medium text-white mb-10"><?= tml_e($data['title']) ?> Insights &amp; Articles<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($rb as $b) :
          $a = $b['article'];
          ?>
      <a href="/blog/<?= tml_e($b['slug']) ?>" class="group block p-6 md:p-8 rounded-2xl glass-card h-full">
        <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/10 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-4"><?= tml_e($a['category']) ?></span>
        <h3 class="text-base font-semibold text-white mb-3 group-hover:text-[#ff4500] leading-snug"><?= tml_e($a['title']) ?></h3>
        <p class="text-sm text-white/35 leading-relaxed mb-4 line-clamp-2"><?= tml_e($a['metaDescription']) ?></p>
        <?php if (!empty($a['date']) || !empty($a['readTime'])) : ?>
        <div class="flex items-center gap-4 text-xs text-white/80 mb-4">
          <?php if (!empty($a['date'])) : ?>
          <span class="inline-flex items-center gap-1"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/40"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><?= tml_e($a['date']) ?></span>
          <?php endif; ?>
          <?php if (!empty($a['readTime'])) : ?>
          <span class="inline-flex items-center gap-1"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/40"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?= tml_e($a['readTime']) ?></span>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <span class="text-xs text-[#ff4500] font-medium">Read Article →</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (count($resolvedInd) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Industries We Serve</p>
    <h2 class="scroll-reveal text-2xl sm:text-3xl font-medium text-white mb-10"><?= tml_e($data['title']) ?> for Your Industry<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($resolvedInd as $ind) : ?>
      <a href="/industries/<?= tml_e($ind['slug']) ?>" class="group block p-6 md:p-8 rounded-2xl glass-card h-full">
        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500]"><?= tml_e($ind['name']) ?></h3>
        <p class="text-sm text-white/90 leading-relaxed mb-4 line-clamp-3"><?= tml_e($ind['description']) ?></p>
        <span class="text-xs text-[#ff4500] font-medium">View Industry →</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
$locations = tml_locations();
$cityLinks = [];
foreach ($locations as $loc) {
    $cityLinks[] = [
        'name' => (string) ($loc['name'] ?? ''),
        'country' => (string) ($loc['country'] ?? ''),
        'href' => '/services/' . tml_location_service_slug($slug, (string) ($loc['slug'] ?? '')),
    ];
}
// Sort: Canada first, then alphabetical
usort($cityLinks, static function ($a, $b) {
    $aCA = $a['country'] === 'Canada' ? 0 : 1;
    $bCA = $b['country'] === 'Canada' ? 0 : 1;
    if ($aCA !== $bCA) {
        return $aCA <=> $bCA;
    }
    return strcmp($a['name'], $b['name']);
});
?>
<?php if (count($cityLinks) > 0) : ?>
<section class="relative w-full py-16 md:py-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 mb-10 scroll-reveal">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Available In</p>
        <h2 class="text-2xl sm:text-3xl font-medium text-white"><?= tml_e($data['title']) ?> Services by City<span class="text-[#ff4500]">.</span></h2>
      </div>
      <span class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/[0.06] text-xs text-white/25 font-medium">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/60"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <?= count($cityLinks) ?> cities
      </span>
    </div>
  </div>
  <?php
  // Split cities into two rows for the marquee
  $half = (int) ceil(count($cityLinks) / 2);
  $row1 = array_slice($cityLinks, 0, $half);
  $row2 = array_slice($cityLinks, $half);
  ?>
  <div class="space-y-4" style="mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);">
    <!-- Row 1 — scrolls right -->
    <div class="flex items-center gap-3 marquee-track" style="animation-duration: 60s;">
      <?php foreach (array_merge($row1, $row1) as $cl) : ?>
      <a href="<?= tml_e($cl['href']) ?>" class="flex-shrink-0 inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-white/[0.06] bg-white/[0.02] text-sm text-white/70 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/5 transition-all duration-300 whitespace-nowrap">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/50 flex-shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <?= tml_e($cl['name']) ?>
      </a>
      <?php endforeach; ?>
    </div>
    <!-- Row 2 — scrolls left -->
    <div class="flex items-center gap-3 marquee-track" style="animation-duration: 55s; animation-direction: reverse;">
      <?php foreach (array_merge($row2, $row2) as $cl) : ?>
      <a href="<?= tml_e($cl['href']) ?>" class="flex-shrink-0 inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-white/[0.06] bg-white/[0.02] text-sm text-white/70 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/5 transition-all duration-300 whitespace-nowrap">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/50 flex-shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <?= tml_e($cl['name']) ?>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
