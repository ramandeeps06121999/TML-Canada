<?php
$title = 'Our Services | TML Agency — Full-Service Digital Marketing';
$description = 'Explore TML Agency\'s full range of digital marketing services — Branding, SEO, Google Ads, Social Media, Web Development, AI Influencer Management, Lead Generation, and more.';
$keywords = 'digital marketing services Edmonton, SEO services, Google Ads management, branding services, web development services, social media marketing, lead generation, PPC management, content marketing Edmonton';
$canonicalPath = '/services';
$servicePages = tml_service_pages();
$categories = [
    ['category' => 'Branding & Design', 'services' => ['branding', 'graphic-design', 'branding-packaging', 'ui-design']],
    ['category' => 'Performance Marketing', 'services' => ['google-ads', 'seo', 'lead-generation']],
    ['category' => 'Digital & Social', 'services' => ['website-development', 'social-media', 'ai-influencer-management']],
    ['category' => 'Media Production', 'services' => ['video-editing', 'music-release']],
];
$stats = [['label' => 'Services', 'value' => '12+'], ['label' => 'Brands Served', 'value' => '500+'], ['label' => 'Team Members', 'value' => '70+'], ['label' => 'Years Experience', 'value' => '15+']];
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
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Our Services</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Our Digital Marketing<br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">Services</span><span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/90 max-w-2xl mx-auto mb-10">From brand strategy to AI-powered marketing — we offer a complete suite of services to help you stand out, attract customers, and scale your business.</p>
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
];
?>
<?php foreach ($categories as $catIndex => $cat) : ?>
<section class="relative w-full px-6 py-16 md:py-20 lg:px-12 overflow-hidden <?= $catIndex % 2 === 1 ? 'bg-[#080808]' : '' ?>">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-10 scroll-reveal">
      <h2 class="text-2xl md:text-3xl font-medium text-white"><?= tml_e($cat['category']) ?></h2>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono"><?= str_pad((string) ($catIndex + 1), 2, '0', STR_PAD_LEFT) ?></span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 scroll-reveal scroll-delay-1">
      <?php foreach ($cat['services'] as $slug) :
          $service = $servicePages[$slug] ?? null;
          if (!$service) {
              continue;
          }
          $svcIcon = $serviceIcons[$slug] ?? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>';
          ?>
      <a href="/services/<?= tml_e($slug) ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $svcIcon ?>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500]"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors"><?= tml_e($service['title']) ?></h3>
        <p class="text-sm text-white/90 leading-relaxed mb-5"><?= tml_e($service['description']) ?></p>
        <div class="flex flex-wrap gap-2">
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

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
