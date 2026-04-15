<?php
$slug = $GLOBALS['tml_industry_slug'] ?? '';
$industryPages = tml_industry_pages();
$industries = tml_industries();

// Industry-specific image map (2 unique images per industry, no duplicates)
$_industryImgMap = [
    'real-estate'       => ['social-media-real-estate-posts-grid.webp', 'web-design-finance-hero.webp'],
    'healthcare'        => ['beauty-product-photography.webp', 'product-photography-skincare-set.webp'],
    'legal'             => ['creative-ad-legal-education-red.webp', 'commercial-photography.jpg'],
    'ecommerce'         => ['ecommerce-branding-creative.webp', 'product-photography-sneakers.webp'],
    'saas'              => ['saas-website-design.webp', 'web-design-productivity-tool.webp'],
    'construction'      => ['creative-ad-roofing-company.webp', 'architectural-photography.jpg'],
    'restaurants'       => ['product-photography-food-croissant.webp', 'graphic-design-fried-chicken-ad.webp'],
    'automotive'        => ['product-photography-bicycle-lifestyle.jpg', 'product-photography-bicycle-summer.jpg'],
    'education'         => ['creative-ad-back-to-school-cairo.webp', 'graphic-design-faber-castell.jpg'],
    'fitness'           => ['creative-ad-protein-fitness.webp', 'graphic-design-fitness-billboard.webp'],
    'insurance'         => ['brand-strategy-visual.webp', 'graphic-design-clean-minimal-ad.webp'],
    'fintech'           => ['web-design-web3-platform.jpg', 'graphic-design-3d-ux-concept.webp'],
    'immigration'       => ['graphic-design-brand-showcase.webp', 'professional-photography.jpg'],
    'hair-salons'       => ['product-photography-lipstick-beauty.webp', 'product-photography-luxury-skincare.webp'],
    'accountants'       => ['graphic-design-clarity-brand.jpg', 'minimalist-design.jpg'],
    'non-profits'       => ['graphic-design-brand-identity.webp', 'brand-photography.jpg'],
    'photographers'     => ['creative-photography.jpg', 'fashion-photography.jpg'],
    'interior-designers'=> ['graphic-design-creative-brand.webp', 'lifestyle-brand.jpg'],
    'wedding-planners'  => ['product-photography-fashion-editorial.webp', 'product-photography-perfume-shoot.jpg'],
    'florists'          => ['product-photography-styled-still-life.webp', 'product-photography-cocktails.webp'],
    'travel'            => ['web-design-travel-adventure.jpg', 'web-design-travel-app.webp'],
    'tattoo'            => ['graphic-design-denim-fashion.webp', 'graphic-design-creative-fashion-ad.jpg'],
    'daycare'           => ['packaging-design-kids-sandwich-box.webp', 'packaging-design-candy-characters.webp'],
    'moving-companies'  => ['creative-ad-dental-clinic-fly.webp', 'outdoor-advertising-billboard.webp'],
    'oil-gas'           => ['billboard-advertising-campaign.jpg', 'advertising-photography.jpg'],
    'cannabis'          => ['packaging-design-minimalist-cans.webp', 'packaging-design-moody-snacks.webp'],
    'agriculture'       => ['landscape-photography.jpg', 'product-photography-sunscreen.jpg'],
    'tourism'           => ['web-design-community-platform.webp', 'visual-storytelling.jpg'],
    'film'              => ['poster-design-netflix-induction.webp', 'poster-design-weeknd-blinding-lights.webp'],
    'clean-energy'      => ['graphic-design-ai-brand.webp', 'graphic-design-minimal-brand-ad.webp'],
    'logistics'         => ['graphic-design-product-layout.webp', 'graphic-design-product-showcase.webp'],
    'mining'            => ['product-photography-blue-brand.jpg', 'product-photography-brand-lifestyle.jpg'],
    'franchises'        => ['graphic-design-coca-cola-marvel.webp', 'graphic-design-coca-cola-billboard.jpg'],
    'property-management'=> ['web-design-creative-agency-dark.jpg', 'web-design-ai-design-tool.jpg'],
    'home-services'     => ['creative-ad-eyewear-fashion.webp', 'graphic-design-spice-sauce-ad.webp'],
    'dental'            => ['graphic-design-dental-creative.webp', 'graphic-design-colgate-creative.jpg'],
    'veterinary'        => ['product-photography-handbag-sunset.webp', 'product-photography-retro-brand.webp'],
    'cleaning'          => ['packaging-design-water-bottle-brand.webp', 'packaging-design-eskimo-ice-cream.webp'],
    'hvac'              => ['graphic-design-sneaker-creative.jpg', 'graphic-design-pepsi-billboard.jpg'],
    'plumbing'          => ['graphic-design-snickers-guerilla.jpg', 'creative-ad-durex-football.webp'],
    'roofing'           => ['graphic-design-food-ad.jpg', 'graphic-design-dark-story-ad.webp'],
];
$_indImg = $_industryImgMap[$slug] ?? ['digital-marketing-creative.webp', 'marketing-campaign-visual.webp'];
$v2 = $industryPages[$slug] ?? null;
$legacy = $industries[$slug] ?? null;

if (!$v2 && !$legacy) {
    require TML_VIEWS . '/404.php';
    exit;
}

$isTier1 = $v2 !== null;

if ($isTier1) {
    $name = (string) ($v2['name'] ?? '');
    $title = (string) ($v2['metaTitle'] ?? 'Digital Marketing for ' . $name . ' | TML Agency');
    $description = (string) ($v2['metaDescription'] ?? ('Best ' . $name . ' digital marketing services. SEO, ads, branding & web design for ' . $name . ' businesses. Get results with TML Agency.'));
    $keywords = (string) ($v2['metaKeywords'] ?? strtolower($name) . ' marketing, digital marketing ' . strtolower($name) . ', ' . strtolower($name) . ' advertising, ' . strtolower($name) . ' SEO, ' . strtolower($name) . ' branding, TML Agency ' . strtolower($name));
    $canonicalPath = '/industries/' . $slug;

    $breadcrumbSchema = tml_schema_breadcrumb([
        ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
        ['name' => 'Industries', 'url' => TML_SITE_URL . '/industries'],
        ['name' => $name, 'url' => TML_SITE_URL . '/industries/' . $slug],
    ]);

    $faqItems = [];
    foreach ($v2['faqItems'] ?? [] as $f) {
        $faqItems[] = ['question' => $f['q'] ?? $f['question'] ?? '', 'answer' => $f['a'] ?? $f['answer'] ?? ''];
    }

    $extraHead = [
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
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%);"></div>
  <div class="relative z-10 max-w-5xl mx-auto mb-8">
    <?php
    $items = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Industries', 'href' => '/industries'],
        ['label' => $name, 'href' => '/industries/' . $slug],
    ];
    require TML_VIEWS . '/partials/breadcrumbs.php';
    ?>
  </div>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <a href="/industries" class="inline-flex items-center gap-2 text-[11px] text-white/90 tracking-[0.2em] uppercase hover:text-white mb-8">&larr; All Industries</a>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6"><?= tml_e($v2['heroTitle'] ?? $name) ?><span class="text-[#ff4500]">.</span></h1>
    <p class="text-lg md:text-xl text-white/90 font-medium mb-4"><?= tml_e($v2['heroSubtitle'] ?? '') ?></p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="flex-shrink-0"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Get a Free Quote</a>
      <a href="/services" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="flex-shrink-0"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Our Services</a>
    </div>
  </div>
</section>

<!-- INDUSTRY VISUAL SHOWCASE -->
<section class="relative w-full px-6 py-10 md:py-14 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
      <div class="group aspect-video rounded-2xl overflow-hidden border border-white/[0.06] hover:border-white/[0.12] transition-all duration-500 relative">
        <img src="/media/<?= tml_e($_indImg[0]) ?>"
             alt="<?= tml_e($name) ?> marketing — TML Agency"
             loading="lazy"
             width="1920"
             height="1080"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
      </div>
      <div class="group aspect-video rounded-2xl overflow-hidden border border-white/[0.06] hover:border-white/[0.12] transition-all duration-500 relative">
        <img src="/media/<?= tml_e($_indImg[1]) ?>"
             alt="<?= tml_e($name) ?> strategy — TML Agency"
             loading="lazy"
             width="1920"
             height="1080"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($v2['stats'])) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
      <?php foreach ($v2['stats'] as $stat) :
          $val = $stat['value'];
          $isSimpleInt = preg_match('/^(\d+)([+%]?)$/', $val, $m);
          ?>
      <div class="text-center p-6 md:p-8 rounded-2xl border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/20 transition-colors duration-300">
        <div class="text-2xl md:text-3xl font-bold text-white mb-2">
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
<?php endif; ?>

<?php if (!empty($v2['challenges'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Challenges</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16"><?= tml_e($name) ?> Marketing Challenges<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 gap-5">
      <?php
      $challengeIcons = [
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
      ];
      ?>
      <?php foreach ($v2['challenges'] as $i => $challenge) : ?>
      <div class="group relative p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
          <?= $challengeIcons[$i % count($challengeIcons)] ?>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($challenge['title']) ?></h3>
        <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($challenge['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($v2['services'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">What We Offer</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Our Services for <?= tml_e($name) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php
      $svcIcons = [
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
      ];
      ?>
      <?php foreach ($v2['services'] as $i => $svc) : ?>
      <a href="<?= tml_e($svc['link'] ?? '/services') ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $svcIcons[$i % count($svcIcons)] ?>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] transition-colors"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors"><?= tml_e($svc['name']) ?></h3>
        <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($svc['description']) ?></p>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($v2['content'])) : ?>
<?php
// Split content into sections by h2/h3 tags for visual layout
$rawContent = (string) $v2['content'];
$contentSections = preg_split('/(?=<h[23][^>]*>)/', $rawContent, -1, PREG_SPLIT_NO_EMPTY);
$contentImages = [
    '/media/digital-marketing-creative.webp',
    '/media/brand-strategy-visual.webp',
    '/media/web-design-landing-page.webp',
    '/media/saas-website-design.webp',
    '/media/marketing-campaign-visual.webp',
    '/media/creative-design-portfolio.webp',
];
$sectionIcons = [
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
];
?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-6xl">
    <div class="flex items-center gap-4 mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase"><?= tml_e($name) ?> Marketing Guide</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <div class="space-y-16 md:space-y-24">
      <?php foreach ($contentSections as $si => $section) :
          $isEven = $si % 2 === 0;
          $img = $contentImages[$si % count($contentImages)];
          $icon = $sectionIcons[$si % count($sectionIcons)];
      ?>
      <div class="scroll-reveal">
        <div class="flex flex-col <?= $isEven ? 'md:flex-row' : 'md:flex-row-reverse' ?> gap-8 md:gap-12 items-start">
          <!-- Image side -->
          <div class="md:w-2/5 md:sticky md:top-32">
            <div class="relative rounded-2xl overflow-hidden aspect-[4/3] border border-white/[0.06]">
              <img src="<?= tml_e($img) ?>" alt="<?= tml_e($name) ?> digital marketing — section <?= $si + 1 ?>" loading="lazy" class="w-full h-full object-cover" width="600" height="450" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#ff4500]/20 backdrop-blur-sm flex items-center justify-center"><?= $icon ?></div>
                <span class="text-[10px] text-white/60 tracking-wider uppercase font-medium"><?= tml_e($name) ?></span>
              </div>
            </div>
          </div>
          <!-- Content side -->
          <div class="md:w-3/5">
            <div class="flex items-center gap-3 mb-6">
              <span class="text-xs font-mono text-[#ff4500]/50 font-bold"><?= str_pad((string) ($si + 1), 2, '0', STR_PAD_LEFT) ?></span>
              <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
            </div>
            <div class="prose prose-invert prose-sm md:prose-base max-w-none
                        prose-headings:font-semibold prose-headings:text-white prose-headings:tracking-tight
                        prose-h2:text-2xl prose-h2:md:text-3xl prose-h2:mt-0 prose-h2:mb-6
                        prose-h3:text-xl prose-h3:mt-6 prose-h3:mb-4
                        prose-p:text-white/50 prose-p:leading-[1.8]
                        prose-li:text-white/50 prose-li:leading-[1.8]
                        prose-strong:text-white/80 prose-strong:font-semibold
                        prose-a:text-[#ff4500] prose-a:no-underline hover:prose-a:underline
                        pl-5 border-l border-white/[0.06]">
              <?= $section ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($v2['faqItems'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4 text-center">FAQ</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 text-center"><?= tml_e($name) ?> Marketing FAQ<span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-3">
      <?php foreach ($v2['faqItems'] as $faq) : ?>
      <details class="group border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.12] hover:bg-white/[0.03] transition-all duration-300">
        <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer list-none text-white font-medium text-sm md:text-base">
          <span class="flex items-center gap-3 pr-4"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500] flex-shrink-0"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg><?= tml_e($faq['q'] ?? $faq['question'] ?? '') ?></span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/30 flex-shrink-0 transition-transform duration-300 group-open:rotate-180"><path d="M6 9l6 6 6-6"/></svg>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/70 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a'] ?? $faq['answer'] ?? '') ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to grow your <?= tml_e(strtolower($name)) ?> business<span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/90 leading-relaxed mb-10 max-w-xl mx-auto">Let&apos;s discuss how our marketing services can drive real results for your <?= tml_e(strtolower($name)) ?> brand.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Book a Free Strategy Call</a>
      <a href="/industries" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">View All Industries</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
<?php
} else {
    // Legacy industry
    $name = (string) ($legacy['name'] ?? '');
    $title = (string) ($legacy['metaTitle'] ?? 'Digital Marketing for ' . $name . ' | TML Agency');
    $description = (string) ($legacy['metaDescription'] ?? '');
    $keywords = (string) ($legacy['metaKeywords'] ?? strtolower($name) . ' marketing, digital marketing ' . strtolower($name) . ', ' . strtolower($name) . ' advertising, ' . strtolower($name) . ' SEO, TML Agency ' . strtolower($name));
    $canonicalPath = '/industries/' . $slug;

    $breadcrumbSchema = tml_schema_breadcrumb([
        ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
        ['name' => 'Industries', 'url' => TML_SITE_URL . '/industries'],
        ['name' => $name, 'url' => TML_SITE_URL . '/industries/' . $slug],
    ]);

    $legacyFaqItems = [];
    foreach ($legacy['faqs'] ?? [] as $f) {
        $legacyFaqItems[] = ['question' => $f['q'] ?? $f['question'] ?? '', 'answer' => $f['a'] ?? $f['answer'] ?? ''];
    }

    $extraHead = [
        tml_json_ld_script($breadcrumbSchema),
    ];
    if (count($legacyFaqItems) > 0) {
        $extraHead[] = tml_json_ld_script(tml_schema_faq($legacyFaqItems));
    }

    require TML_VIEWS . '/partials/head.php';
    ?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<section class="relative w-full px-6 pt-32 pb-16 md:pt-40 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%);"></div>
  <div class="relative z-10 max-w-5xl mx-auto mb-8">
    <?php
    $items = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Industries', 'href' => '/industries'],
        ['label' => $name, 'href' => '/industries/' . $slug],
    ];
    require TML_VIEWS . '/partials/breadcrumbs.php';
    ?>
  </div>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <a href="/industries" class="inline-flex items-center gap-2 text-[11px] text-white/90 tracking-[0.2em] uppercase hover:text-white mb-8">&larr; All Industries</a>
    <?php if (!empty($legacy['icon'])) : ?>
    <p class="text-4xl mb-4" aria-hidden="true"><?= $legacy['icon'] ?></p>
    <?php endif; ?>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Digital Marketing for <?= tml_e($name) ?><span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/90 leading-relaxed max-w-2xl mx-auto mb-10"><?= tml_e($legacy['description'] ?? '') ?></p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="flex-shrink-0"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Get a Free Quote</a>
      <a href="/services" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="flex-shrink-0"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Our Services</a>
    </div>
  </div>
</section>

<!-- INDUSTRY VISUAL SHOWCASE -->
<section class="relative w-full px-6 py-10 md:py-14 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
      <div class="group aspect-video rounded-2xl overflow-hidden border border-white/[0.06] hover:border-white/[0.12] transition-all duration-500 relative">
        <img src="/media/<?= tml_e($_indImg[0]) ?>"
             alt="<?= tml_e($name) ?> marketing — TML Agency"
             loading="lazy"
             width="1920"
             height="1080"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
      </div>
      <div class="group aspect-video rounded-2xl overflow-hidden border border-white/[0.06] hover:border-white/[0.12] transition-all duration-500 relative">
        <img src="/media/<?= tml_e($_indImg[1]) ?>"
             alt="<?= tml_e($name) ?> strategy — TML Agency"
             loading="lazy"
             width="1920"
             height="1080"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($legacy['stats'])) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
      <?php foreach ($legacy['stats'] as $stat) :
          $val = $stat['value'];
          $isSimpleInt = preg_match('/^(\d+)([+%]?)$/', $val, $m);
          ?>
      <div class="text-center p-6 md:p-8 rounded-2xl border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/20 transition-colors duration-300">
        <div class="text-2xl md:text-3xl font-bold text-white mb-2">
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
<?php endif; ?>

<?php if (!empty($legacy['painPoints'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Pain Points</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16"><?= tml_e($name) ?> Marketing Challenges We Solve<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php
      $painIcons = [
          '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
          '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
          '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
          '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
          '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
          '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
      ];
      ?>
      <?php foreach ($legacy['painPoints'] as $i => $point) : ?>
      <div class="group relative p-6 md:p-7 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="absolute top-5 right-5 text-3xl font-bold text-[#ff4500]/[0.06] select-none"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-9 h-9 rounded-lg bg-[#ff4500]/10 flex items-center justify-center mb-5">
          <?= $painIcons[$i % count($painIcons)] ?>
        </div>
        <p class="text-sm text-white/90 leading-relaxed"><?= tml_e($point) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($legacy['benefits'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Benefits</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Benefits of <?= tml_e($name) ?> Digital Marketing<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($legacy['benefits'] as $i => $benefit) : ?>
      <div class="group relative p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <p class="text-sm text-white/90 leading-relaxed"><?= tml_e($benefit) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
$servicePages = tml_service_pages();
$linkedServices = [];
foreach ($legacy['services'] ?? [] as $svcSlug) {
    if (isset($servicePages[$svcSlug])) {
        $linkedServices[] = ['slug' => $svcSlug, 'data' => $servicePages[$svcSlug]];
    }
}
?>
<?php if (count($linkedServices) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Recommended Services</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Services for <?= tml_e($name) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php
      $svcIcons = [
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
      ];
      $lsIdx = 0;
      ?>
      <?php foreach ($linkedServices as $ls) : ?>
      <a href="/services/<?= tml_e($ls['slug']) ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $svcIcons[$lsIdx % count($svcIcons)] ?>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] transition-colors"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500] transition-colors"><?= tml_e($ls['data']['title']) ?></h3>
        <p class="text-sm text-white/75 leading-relaxed mb-4 line-clamp-3"><?= tml_e($ls['data']['description']) ?></p>
        <span class="text-xs text-[#ff4500] font-medium">Learn More &rarr;</span>
      </a>
      <?php $lsIdx++; endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($legacy['content'])) : ?>
<?php
$rawContent = (string) $legacy['content'];
$contentSections = preg_split('/(?=<h[23][^>]*>)/', $rawContent, -1, PREG_SPLIT_NO_EMPTY);
$contentImages = [
    '/media/digital-marketing-creative.webp',
    '/media/brand-strategy-visual.webp',
    '/media/web-design-landing-page.webp',
    '/media/saas-website-design.webp',
    '/media/marketing-campaign-visual.webp',
    '/media/creative-design-portfolio.webp',
];
$sectionIcons = [
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
];
?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-6xl">
    <div class="flex items-center gap-4 mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase"><?= tml_e($name) ?> Marketing Guide</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <div class="space-y-16 md:space-y-24">
      <?php foreach ($contentSections as $si => $section) :
          $isEven = $si % 2 === 0;
          $img = $contentImages[$si % count($contentImages)];
          $icon = $sectionIcons[$si % count($sectionIcons)];
      ?>
      <div class="scroll-reveal">
        <div class="flex flex-col <?= $isEven ? 'md:flex-row' : 'md:flex-row-reverse' ?> gap-8 md:gap-12 items-start">
          <div class="md:w-2/5 md:sticky md:top-32">
            <div class="relative rounded-2xl overflow-hidden aspect-[4/3] border border-white/[0.06]">
              <img src="<?= tml_e($img) ?>" alt="<?= tml_e($name) ?> digital marketing — section <?= $si + 1 ?>" loading="lazy" class="w-full h-full object-cover" width="600" height="450" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#ff4500]/20 backdrop-blur-sm flex items-center justify-center"><?= $icon ?></div>
                <span class="text-[10px] text-white/60 tracking-wider uppercase font-medium"><?= tml_e($name) ?></span>
              </div>
            </div>
          </div>
          <div class="md:w-3/5">
            <div class="flex items-center gap-3 mb-6">
              <span class="text-xs font-mono text-[#ff4500]/50 font-bold"><?= str_pad((string) ($si + 1), 2, '0', STR_PAD_LEFT) ?></span>
              <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
            </div>
            <div class="prose prose-invert prose-sm md:prose-base max-w-none
                        prose-headings:font-semibold prose-headings:text-white prose-headings:tracking-tight
                        prose-h2:text-2xl prose-h2:md:text-3xl prose-h2:mt-0 prose-h2:mb-6
                        prose-h3:text-xl prose-h3:mt-6 prose-h3:mb-4
                        prose-p:text-white/50 prose-p:leading-[1.8]
                        prose-li:text-white/50 prose-li:leading-[1.8]
                        prose-strong:text-white/80 prose-strong:font-semibold
                        prose-a:text-[#ff4500] prose-a:no-underline hover:prose-a:underline
                        pl-5 border-l border-white/[0.06]">
              <?= $section ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($legacy['faqs'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4 text-center">FAQ</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 text-center"><?= tml_e($name) ?> Marketing FAQ<span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-3">
      <?php foreach ($legacy['faqs'] as $faq) : ?>
      <details class="group border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.12] hover:bg-white/[0.03] transition-all duration-300">
        <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer list-none text-white font-medium text-sm md:text-base">
          <span class="flex items-center gap-3 pr-4"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500] flex-shrink-0"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg><?= tml_e($faq['q'] ?? $faq['question'] ?? '') ?></span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/30 flex-shrink-0 transition-transform duration-300 group-open:rotate-180"><path d="M6 9l6 6 6-6"/></svg>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/70 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a'] ?? $faq['answer'] ?? '') ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to grow your <?= tml_e(strtolower($name)) ?> business<span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/90 leading-relaxed mb-10 max-w-xl mx-auto">Let&apos;s discuss how our marketing services can drive real results for your <?= tml_e(strtolower($name)) ?> brand.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Book a Free Strategy Call</a>
      <a href="/industries" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">View All Industries</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
<?php } ?>
