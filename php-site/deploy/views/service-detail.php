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

// Title pattern: "{Service} Services | TML Agency — Top {Service} Company"
$title = $data['metaTitle'] ?? ($data['title'] . ' Services | TML Agency — Top ' . $data['title'] . ' Company');
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

// Service → media image mapping (3 images per service)
$serviceImageMap = [
    'branding'                 => ['brand-identity-design.webp',          'branding-shoot.jpg',                    'creative-design-portfolio.webp'],
    'google-ads'               => ['billboard-advertising-campaign.jpg',   'outdoor-advertising-billboard.webp',    'advertising-photography.jpg'],
    'seo'                      => ['web-design-landing-page.webp',         'saas-website-design.webp',              'digital-marketing-creative.webp'],
    'website-development'      => ['web-design-landing-page.webp',         'ux-design-illustration.webp',           'saas-website-design.webp'],
    'social-media'             => ['social-media-content-mockup.png',      'instagram-feed-design.webp',            'social-media-influencer-content.webp'],
    'graphic-design'           => ['creative-design-portfolio.webp',       'graphic-design-creative.webp',          'art-direction.jpg'],
    'lead-generation'          => ['digital-marketing-creative.webp',      'marketing-campaign-visual.webp',        'brand-strategy-visual.webp'],
    'video-editing'            => ['creative-photography.jpg',             'visual-storytelling.jpg',               'campaign-photography.jpg'],
    'branding-packaging'       => ['packaging-design-creative.webp',       'product-branding-campaign.webp',        'food-photography.jpg'],
    'ai-influencer-management' => ['social-media-influencer-content.webp', 'ecommerce-branding-creative.webp',      'social-media-content-mockup.png'],
    'music-release'            => ['brand-strategy-visual.webp',           'visual-content-design.webp',            'portrait-photography.jpg'],
    'shopify-development'      => ['ecommerce-branding-creative.webp',     'web-design-landing-page.webp',          'product-branding-campaign.webp'],
    'tiktok-ads'               => ['social-media-influencer-content.webp', 'social-media-content-mockup.png',       'instagram-feed-design.webp'],
    'web-design'               => ['web-design-landing-page.webp',         'saas-website-design.webp',              'ux-design-illustration.webp'],
    'wordpress-development'    => ['web-design-landing-page.webp',         'saas-website-design.webp',              'ux-design-illustration.webp'],
    'linkedin-ads'             => ['digital-marketing-creative.webp',      'marketing-campaign-visual.webp',        'brand-strategy-visual.webp'],
    'marketing-automation'     => ['digital-marketing-creative.webp',      'brand-strategy-visual.webp',            'marketing-campaign-visual.webp'],
    'amazon-marketing'         => ['ecommerce-branding-creative.webp',     'product-photography-sneakers.webp',     'product-branding-campaign.webp'],
    'geo-optimization'         => ['saas-website-design.webp',             'digital-marketing-creative.webp',       'brand-strategy-visual.webp'],
    'ux-ui-design'             => ['ux-design-illustration.webp',          'web-design-landing-page.webp',          'saas-website-design.webp'],
    'mobile-app-development'   => ['ux-design-illustration.webp',          'saas-website-design.webp',              'creative-design-portfolio.webp'],
    'video-production'         => ['creative-photography.jpg',             'visual-storytelling.jpg',               'campaign-photography.jpg'],
    'microsoft-ads'            => ['billboard-advertising-campaign.jpg',   'outdoor-advertising-billboard.webp',    'advertising-photography.jpg'],
    'local-seo'                => ['web-design-landing-page.webp',         'digital-marketing-creative.webp',       'saas-website-design.webp'],
    'ui-design'                => ['ux-design-illustration.webp',          'web-design-landing-page.webp',          'saas-website-design.webp'],
];
$serviceImages = $serviceImageMap[$slug] ?? ['digital-marketing-creative.webp', 'brand-identity-design.webp', 'creative-design-portfolio.webp'];
$ogImageOverride = TML_SITE_URL . '/media/' . $serviceImages[0];

$serviceSchema = tml_schema_service([
    'name' => $data['title'],
    'description' => $data['description'],
    'url' => TML_SITE_URL . '/services/' . $slug,
    'category' => $data['title'],
]);
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Services', 'url' => TML_SITE_URL . '/services'],
    ['name' => $data['title'], 'url' => TML_SITE_URL . '/services/' . $slug],
]);
$faqItems = [];
foreach ($data['faqs'] ?? [] as $f) {
    $faqItems[] = ['question' => $f['q'], 'answer' => $f['a']];
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
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <a href="/services" class="inline-flex items-center gap-2 text-[11px] text-white/90 tracking-[0.2em] uppercase hover:text-white mb-8">← All Services</a>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6"><?= tml_e($data['title']) ?> Services<span class="text-[#ff4500]">.</span></h1>
    <p class="text-lg md:text-xl text-white/90 font-medium mb-4"><?= tml_e($data['tagline']) ?></p>
    <p class="text-sm md:text-base text-white/30 leading-relaxed max-w-2xl mx-auto mb-10"><?= tml_e($data['heroDescription']) ?></p>
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
          $isNum = preg_match('/^\d/', $val);
          $num = $isNum ? (int) preg_replace('/\D/', '', $val) : 0;
          $suffix = $isNum ? preg_replace('/\d/', '', $val) : '';
          ?>
      <div class="text-center p-6 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="text-2xl md:text-3xl font-bold text-white mb-1">
          <?php if ($isNum && $num > 0) : ?>
            <span data-counter-target="<?= (int) $num ?>" data-counter-suffix="<?= tml_e($suffix) ?>">0</span>
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

<?php if (!empty($serviceImages)) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 gap-4 md:gap-6">
      <?php foreach (array_slice($serviceImages, 0, 2) as $imgIdx => $imgFile) :
          $altText = $imgIdx === 0
              ? tml_e($data['title'] . ' creative work by TML Agency')
              : tml_e($data['title'] . ' portfolio example by TML Agency');
          ?>
      <figure class="relative overflow-hidden rounded-2xl aspect-video bg-white/[0.03]">
        <img
          src="/media/<?= tml_e($imgFile) ?>"
          alt="<?= $altText ?>"
          class="w-full h-full object-cover"
          loading="<?= $imgIdx === 0 ? 'eager' : 'lazy' ?>"
          width="800"
          height="450"
        />
        <figcaption class="sr-only"><?= $altText ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">What We Offer</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Our <?= tml_e($data['title']) ?> Services<span class="text-[#ff4500]">.</span></h2>
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
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($data['features'] ?? [] as $i => $feature) : ?>
      <div class="group relative p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
          <?= $featureIcons[$i % count($featureIcons)] ?>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($feature['title']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($feature['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if (!empty($data['seoContent'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-5xl">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12">Why Your Business Needs <?= tml_e($data['title']) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($data['seoContent'] as $i => $paragraph) : ?>
      <div class="group relative p-6 md:p-7 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="absolute top-5 right-5 text-3xl font-bold text-[#ff4500]/[0.06] select-none"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-8 h-[2px] bg-[#ff4500]/40 rounded-full mb-5"></div>
        <p class="text-sm text-white/90 leading-relaxed"><?= tml_e($paragraph) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($data['deepContent'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-5xl space-y-16 md:space-y-24">
    <?php foreach ($data['deepContent'] as $sectionIndex => $section) : ?>
    <div class="relative">
      <div class="flex items-center gap-4 mb-6">
        <span class="text-xs font-mono text-[#ff4500]/50 font-bold"><?= str_pad((string) ($sectionIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
        <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
      </div>
      <div class="flex flex-col <?= $sectionIndex % 2 === 1 ? 'md:flex-row-reverse' : 'md:flex-row' ?> gap-8 md:gap-12 items-start">
        <div class="md:w-2/5 md:sticky md:top-32">
          <h2 class="text-2xl sm:text-3xl md:text-[2rem] font-medium text-white leading-tight"><?= tml_e($section['heading']) ?><span class="text-[#ff4500]">.</span></h2>
        </div>
        <div class="md:w-3/5">
          <div class="space-y-5 pl-5 border-l border-white/[0.06]">
            <?php foreach ($section['paragraphs'] as $p) : ?>
              <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]"><?= $p ?></p>
            <?php endforeach; ?>
          </div>
        </div>
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
        <h2 class="scroll-reveal text-xl md:text-2xl font-semibold text-white mb-4"><?= tml_e($data['title']) ?> Pricing &amp; Investment</h2>
        <p class="text-sm md:text-[15px] text-white/45 leading-[1.8] mb-6"><?= tml_e($data['pricingNote']) ?></p>
        <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Get a Custom Quote</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Our Process</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">How Our <?= tml_e($data['title']) ?> Process Works<span class="text-[#ff4500]">.</span></h2>
    <?php
    $processIcons = [
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/60"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/60"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/60"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 012-3.95A12.88 12.88 0 0122 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 01-4 2z"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/60"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]/60"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    ];
    ?>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-6">
      <?php foreach ($data['process'] ?? [] as $i => $step) : ?>
      <div class="relative z-10">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-16 h-16 rounded-2xl bg-[#ff4500]/10 border border-[#ff4500]/20 flex items-center justify-center text-[#ff4500] font-bold text-lg"><?= tml_e($step['step']) ?></div>
        </div>
        <div class="mt-2 opacity-60"><?= $processIcons[$i % count($processIcons)] ?></div>
        <h3 class="text-xl font-semibold text-white mb-2"><?= tml_e($step['title']) ?></h3>
        <p class="text-sm text-white/90 leading-relaxed"><?= tml_e($step['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4 text-center">FAQ</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 text-center"><?= tml_e($data['title']) ?> Questions Answered<span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-3">
      <?php foreach ($data['faqs'] ?? [] as $faq) : ?>
      <details class="group border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors">
        <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer list-none text-white font-medium text-sm md:text-base">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500] flex-shrink-0 mr-3"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          <span class="pr-4"><?= tml_e($faq['q']) ?></span>
          <span class="text-white/30 text-xl flex-shrink-0">+</span>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/90 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a']) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if (!empty($serviceImages)) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="grid grid-cols-3 gap-4 md:gap-5">
      <?php
          $stripAltVariants = [
              tml_e($data['title'] . ' project showcase — TML Agency'),
              tml_e($data['title'] . ' design example — TML Agency'),
              tml_e($data['title'] . ' creative campaign — TML Agency'),
          ];
          foreach (array_slice($serviceImages, 0, 3) as $stripIdx => $stripFile) :
          $stripAlt = $stripAltVariants[$stripIdx];
          ?>
      <figure class="relative overflow-hidden rounded-xl aspect-[4/3] bg-white/[0.03] group">
        <img
          src="/media/<?= tml_e($stripFile) ?>"
          alt="<?= $stripAlt ?>"
          class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          loading="lazy"
          width="600"
          height="450"
        />
        <figcaption class="sr-only"><?= $stripAlt ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to elevate your <?= tml_e(strtolower($data['title'])) ?><span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/90 leading-relaxed mb-10 max-w-xl mx-auto">Let&apos;s discuss how our <?= tml_e(strtolower($data['title'])) ?> services can help grow your business.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Book a Free Strategy Call</a>
      <a href="mailto:info@townmedialabs.ca" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">info@townmedialabs.ca</a>
    </div>
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
        <div class="flex items-center gap-4 text-xs text-white/30 mb-4">
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
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Available In</p>
    <h2 class="scroll-reveal text-2xl sm:text-3xl font-medium text-white mb-10"><?= tml_e($data['title']) ?> Services by City<span class="text-[#ff4500]">.</span></h2>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <?php foreach ($cityLinks as $cl) : ?>
      <a href="<?= tml_e($cl['href']) ?>" class="px-5 py-2.5 rounded-full border border-white/[0.08] bg-white/[0.02] text-sm text-white/90 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/5 transition-all duration-300"><?= tml_e($data['title']) ?> in <?= tml_e($cl['name']) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
