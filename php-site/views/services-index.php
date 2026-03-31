<?php
$title = 'Our Services | TML Agency — Full-Service Digital Marketing';
$description = 'Explore TML Agency\'s full range of digital marketing services — Branding, SEO, Google Ads, Social Media, Web Development, AI Influencer Management, Lead Generation, and more.';
$canonicalPath = '/services';
$servicePages = tml_service_pages();
$categories = [
    ['category' => 'Branding & Design', 'services' => ['branding', 'graphic-design', 'branding-packaging']],
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
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Everything you need to<br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">grow your brand</span><span class="text-[#ff4500]">.</span></h1>
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
          ?>
      <a href="/services/<?= tml_e($slug) ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <div class="w-2.5 h-2.5 rounded-full bg-[#ff4500]"></div>
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
