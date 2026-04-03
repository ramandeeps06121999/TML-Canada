<?php
$title = 'Industries We Serve | TML Agency';
$description = 'TML Agency provides digital marketing across dozens of industries. Real estate, healthcare, SaaS, hospitality — we understand your market.';
$keywords = 'industry marketing Edmonton, healthcare marketing, real estate marketing, e-commerce marketing, SaaS marketing, construction marketing, legal marketing, hospitality marketing, TML Agency industries';
$canonicalPath = '/industries';
$industryPages = tml_industry_pages();
$industries = tml_industries();
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Industries', 'url' => TML_SITE_URL . '/industries'],
]);

// Generate ItemList schema for industries
$industryItems = [];
foreach ($industryPages as $slug => $page) {
    $industryItems[] = [
        '@type' => 'Thing',
        'name' => $page['name'],
        'description' => $page['metaDescription'],
        'url' => TML_SITE_URL . '/industries/' . $slug,
    ];
}

$industriesListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Industries We Serve',
    'description' => $description,
    'url' => TML_SITE_URL . '/industries',
    'mainEntity' => [
        '@type' => 'ItemList',
        'itemListElement' => array_map(static function ($item, $pos) {
            return array_merge($item, ['position' => $pos + 1]);
        }, $industryItems, array_keys($industryItems)),
    ],
];

$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($industriesListSchema),
];
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Industries', 'href' => '/industries']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Industry Expertise</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Industries We <span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">Serve</span><span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/90 max-w-2xl mx-auto mb-10">We bring deep domain knowledge and proven marketing strategies to every industry we work with. Your market is unique — your marketing should be too.</p>
    <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Discuss Your Industry</a>
  </div>
</section>

<?php if (count($industryPages) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-10 scroll-reveal">
      <h2 class="text-2xl md:text-3xl font-medium text-white">Digital Marketing for Major Industries</h2>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono px-3 py-1 rounded-full border border-white/[0.06]"><?= count($industryPages) ?></span>
    </div>
    <?php
    $industryIcons = [
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
    ];
    $industryIdx = 0;
    ?>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($industryPages as $slug => $page) : ?>
      <a href="/industries/<?= tml_e($slug) ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $industryIcons[$industryIdx % count($industryIcons)] ?>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] transition-colors"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors"><?= tml_e($page['name']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed line-clamp-3"><?= tml_e($page['metaDescription']) ?></p>
      </a>
      <?php $industryIdx++; endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (count($industries) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-10 scroll-reveal">
      <h2 class="text-2xl md:text-3xl font-medium text-white">Specialized Industry Marketing Services</h2>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono px-3 py-1 rounded-full border border-white/[0.06]"><?= count($industries) ?></span>
    </div>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($industries as $slug => $ind) : ?>
      <a href="/industries/<?= tml_e($slug) ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="flex items-start justify-between mb-4">
          <?php if (!empty($ind['icon'])) : ?>
          <span class="text-2xl" aria-hidden="true"><?= $ind['icon'] ?></span>
          <?php else : ?>
          <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <div class="w-2 h-2 rounded-full bg-[#ff4500]"></div>
          </div>
          <?php endif; ?>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] transition-colors"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500] transition-colors"><?= tml_e($ind['name']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed line-clamp-3"><?= tml_e($ind['description']) ?></p>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Don&apos;t see your industry<span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/90 leading-relaxed mb-10 max-w-xl mx-auto">We work with businesses across every sector. Tell us about your industry and we&apos;ll show you how we can help you grow.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Book a Free Strategy Call</a>
      <a href="/services" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">View Our Services</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
