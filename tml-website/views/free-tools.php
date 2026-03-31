<?php
$title = 'Free Marketing Tools & Calculators | TML Agency';
$description = 'Use TML Agency\'s free marketing tools and calculators. SEO audit checklist, website speed calculator, social media post generator, Google Ads budget planner, ROI calculator, and meta tag generator. No signup required.';
$keywords = 'free SEO tools, marketing calculator, Google Ads budget planner, ROI calculator, meta tag generator, social media post generator, free marketing tools, website speed calculator';
$canonicalPath = '/free-tools';
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Free Tools', 'url' => TML_SITE_URL . '/free-tools'],
]);

$tools = [
    [
        'name' => 'SEO Audit Checklist',
        'category' => 'SEO',
        'description' => 'Score your website across 30 critical SEO factors and get actionable recommendations to improve your search rankings.',
    ],
    [
        'name' => 'Website Speed Impact Calculator',
        'category' => 'Performance',
        'description' => 'Find out how much a slow website is costing you in lost conversions, revenue, and search rankings.',
    ],
    [
        'name' => 'Social Media Post Generator',
        'category' => 'Social Media',
        'description' => 'Create engaging, platform-optimised social media posts in seconds with our AI-powered generator.',
    ],
    [
        'name' => 'Google Ads Budget Calculator',
        'category' => 'Paid Ads',
        'description' => 'Plan your Google Ads spend based on your industry, goals, and target CPA to maximise your return.',
    ],
    [
        'name' => 'Marketing ROI Calculator',
        'category' => 'Analytics',
        'description' => 'Measure the true return on your marketing investment across channels and campaigns.',
    ],
    [
        'name' => 'Meta Tag Generator',
        'category' => 'SEO',
        'description' => 'Create perfectly optimised meta titles and descriptions that drive clicks from search results.',
    ],
];

// Generate ItemList schema for free tools
$toolItems = [];
foreach ($tools as $i => $tool) {
    $toolItems[] = [
        '@type' => 'SoftwareApplication',
        'name' => $tool['name'],
        'description' => $tool['description'],
        'applicationCategory' => $tool['category'],
        'url' => TML_SITE_URL . '/free-tools',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'CAD',
        ],
    ];
}

$toolsListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Free Marketing Tools & Calculators',
    'description' => $description,
    'url' => TML_SITE_URL . '/free-tools',
    'mainEntity' => [
        '@type' => 'ItemList',
        'itemListElement' => array_map(static function ($item, $pos) {
            return array_merge($item, ['position' => $pos + 1]);
        }, $toolItems, array_keys($toolItems)),
    ],
];

$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($toolsListSchema),
];

require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Free Tools', 'href' => '/free-tools']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Resources</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Free <span class="text-[#ff4500]">Marketing</span> Tools<span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/90 max-w-2xl mx-auto">Powerful calculators and generators to help you make smarter marketing decisions. No signup required.</p>
  </div>
</section>

<section class="relative w-full px-6 pb-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 scroll-reveal scroll-delay-1">
      <?php
      $toolIcons = [
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
      ];
      ?>
      <?php foreach ($tools as $i => $tool) : ?>
      <div class="group relative p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $toolIcons[$i % count($toolIcons)] ?>
          </div>
        </div>
        <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/10 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-4"><?= tml_e($tool['category']) ?></span>
        <h3 class="text-xl font-semibold text-white mb-3"><?= tml_e($tool['name']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed mb-6"><?= tml_e($tool['description']) ?></p>
        <span class="inline-flex items-center gap-2 text-xs text-white/25 font-medium px-4 py-2 rounded-full border border-white/[0.06] bg-white/[0.02]">
          <span class="w-1.5 h-1.5 rounded-full bg-white/20"></span>
          Coming Soon
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Custom Marketing Tools & Dashboards<span class="text-[#ff4500]">.</span></h2>
    <p class="text-sm md:text-base text-white/90 leading-relaxed mb-10 max-w-xl mx-auto">We build custom marketing dashboards, calculators, and interactive tools for brands that want to stand out.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Talk to Us</a>
      <a href="/services" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">View Our Services</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
