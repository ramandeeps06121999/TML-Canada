<?php
$title = 'Our Portfolio | TML Agency — Digital Marketing & Branding Work';
$description = 'Explore TML Agency\'s portfolio — web design, branding, UI/UX, social media, advertising campaigns, and product photography for 500+ brands.';
$keywords = 'digital marketing portfolio, web design examples, branding portfolio Edmonton, UI UX design work, social media campaign examples, TML Agency portfolio, creative agency work Canada';
$canonicalPath = '/portfolio';

$projects = [
    ['title' => 'CB Builders', 'category' => 'Web Design', 'image' => '/portfolio/cb-builders-web-design.webp', 'desc' => 'A clean, responsive construction company website designed to generate leads and showcase completed projects.'],
    ['title' => 'Real Estate App', 'category' => 'UI/UX', 'image' => '/portfolio/real-estate-app-uiux-design.webp', 'desc' => 'Mobile-first real estate platform with property search, maps integration, and agent dashboard.'],
    ['title' => 'BYT Trucking', 'category' => 'Web Design', 'image' => '/portfolio/byt-trucking-web-design.webp', 'desc' => 'Full-service trucking company website with fleet showcase and quote request system.'],
    ['title' => 'NFT Marketplace', 'category' => 'Web Design', 'image' => '/portfolio/nft-marketplace-web-design.jpg', 'desc' => 'Blockchain-powered digital art marketplace with wallet integration and auction system.'],
    ['title' => 'Smart Home App', 'category' => 'UI/UX', 'image' => '/portfolio/smart-home-app-uiux-design.webp', 'desc' => 'IoT dashboard for smart home control — lights, security, climate in one elegant interface.'],
    ['title' => 'Win Asset Finance', 'category' => 'Web Design', 'image' => '/portfolio/win-asset-finance-web-design.png', 'desc' => 'Financial services website with calculator tools and application portal.'],
    ['title' => 'Custom Trucking', 'category' => 'Branding', 'image' => '/portfolio/custom-trucking-baling-branding.jpg', 'desc' => 'Complete brand identity from logo to fleet wraps for a baling and trucking company.'],
    ['title' => 'Zuri Beauty Academy', 'category' => 'Web Design', 'image' => '/portfolio/zuri-beauty-academy-web-design.png', 'desc' => 'Beauty school website with course catalog, booking system, and student portal.'],
    ['title' => 'Virtual Healthcare', 'category' => 'Branding', 'image' => '/portfolio/virtual-healthcare-branding.webp', 'desc' => 'Telemedicine platform branding — logo, UI kit, and marketing collateral.'],
    ['title' => 'Advertisement Marketing', 'category' => 'Web Design', 'image' => '/portfolio/advertisement-marketing-web-design.png', 'desc' => 'Marketing agency website with case studies, service pages, and lead capture.'],
];

// Creative/media work from /media/ folder
$creativeWork = [
    ['title' => 'Brand Identity System', 'category' => 'Branding', 'image' => '/media/brand-identity-design.webp', 'desc' => 'Complete visual identity — logo, typography, color system, and brand guidelines.'],
    ['title' => 'Social Media Strategy', 'category' => 'Social Media', 'image' => '/media/social-media-content-mockup.png', 'desc' => 'Content grid, story templates, and engagement strategy for Instagram growth.'],
    ['title' => 'SaaS Landing Page', 'category' => 'Web Design', 'image' => '/media/saas-website-design.webp', 'desc' => 'High-conversion SaaS landing page with waitlist capture and social proof.'],
    ['title' => 'Billboard Campaign', 'category' => 'Advertising', 'image' => '/media/billboard-advertising-campaign.jpg', 'desc' => 'Large-format outdoor advertising campaign for a global FMCG brand.'],
    ['title' => 'Product Branding', 'category' => 'Branding', 'image' => '/media/product-branding-campaign.webp', 'desc' => 'Product launch branding — packaging, photography, and campaign creative.'],
    ['title' => 'UX Design System', 'category' => 'UI/UX', 'image' => '/media/ux-design-illustration.webp', 'desc' => 'User-facing experience design system for a transportation platform.'],
    ['title' => 'E-Commerce Creative', 'category' => 'Branding', 'image' => '/media/ecommerce-branding-creative.webp', 'desc' => 'E-commerce brand launch — packaging, social ads, and product photography.'],
    ['title' => 'Instagram Feed Design', 'category' => 'Social Media', 'image' => '/media/instagram-feed-design.webp', 'desc' => 'Curated Instagram feed with cohesive brand aesthetic and content pillars.'],
    ['title' => 'Beauty Product Shoot', 'category' => 'Photography', 'image' => '/media/beauty-product-photography.webp', 'desc' => 'Studio product photography for a skincare brand — clean, vibrant, shelf-ready.'],
    ['title' => 'Outdoor Advertising', 'category' => 'Advertising', 'image' => '/media/outdoor-advertising-billboard.webp', 'desc' => 'Attention-grabbing outdoor billboard creative for brand awareness campaign.'],
    ['title' => 'Packaging Design', 'category' => 'Packaging', 'image' => '/media/packaging-design-creative.webp', 'desc' => 'Consumer packaging design — shelf impact, print-ready artwork, and mockups.'],
    ['title' => 'Product Photography', 'category' => 'Photography', 'image' => '/media/product-photography-sneakers.webp', 'desc' => 'Lifestyle product photography — vibrant colors, dynamic angles, social-ready.'],
    ['title' => 'Influencer Content', 'category' => 'Social Media', 'image' => '/media/social-media-influencer-content.webp', 'desc' => 'Influencer-style branded content for social media campaigns.'],
    ['title' => 'Food Photography', 'category' => 'Photography', 'image' => '/media/food-photography.jpg', 'desc' => 'Artisan food photography for restaurant and bakery marketing.'],
    ['title' => 'Fashion Editorial', 'category' => 'Photography', 'image' => '/media/fashion-photography.jpg', 'desc' => 'High-fashion editorial photography for brand campaigns and lookbooks.'],
    ['title' => 'Creative Direction', 'category' => 'Branding', 'image' => '/media/creative-design-portfolio.webp', 'desc' => 'Art direction and creative strategy for multi-channel brand campaigns.'],
];

$allWork = array_merge($projects, $creativeWork);
$categories = array_values(array_unique(array_column($allWork, 'category')));

$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Portfolio', 'url' => TML_SITE_URL . '/portfolio'],
]);

// Generate CreativeWork schema for portfolio projects
$portfolioWorks = [];
foreach ($allWork as $project) {
    $portfolioWorks[] = [
        '@type' => 'CreativeWork',
        'name' => $project['title'],
        'description' => $project['desc'],
        'image' => TML_SITE_URL . $project['image'],
        'creator' => [
            '@type' => 'Organization',
            'name' => 'TML Agency',
        ],
        'dateCreated' => '2023-01-01',
        'keywords' => $project['category'],
    ];
}

$portfolioSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'TML Agency Portfolio',
    'description' => $description,
    'url' => TML_SITE_URL . '/portfolio',
    'mainEntity' => [
        '@type' => 'ItemList',
        'itemListElement' => array_map(static function ($item, $pos) {
            return array_merge($item, ['position' => $pos + 1]);
        }, $portfolioWorks, array_keys($portfolioWorks)),
    ],
];

$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($portfolioSchema),
];
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Portfolio', 'href' => '/portfolio']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<!-- HERO -->
<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] rounded-full bg-[#ff4500]/[0.04] blur-[180px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Our Work</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Our Portfolio<span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/45 max-w-2xl mx-auto mb-10">From pixel-perfect websites to bold brand identities and scroll-stopping campaigns — explore the work that has helped 500+ brands grow.</p>
    <div class="flex items-center justify-center gap-6">
      <div class="text-center">
        <p class="text-2xl md:text-3xl font-bold text-white"><span data-counter-target="500" data-counter-suffix="+">0</span></p>
        <p class="text-[10px] text-white/30 tracking-[0.1em] uppercase mt-1">Projects</p>
      </div>
      <div class="w-px h-8 bg-white/10"></div>
      <div class="text-center">
        <p class="text-2xl md:text-3xl font-bold text-white"><span data-counter-target="25" data-counter-suffix="+">0</span></p>
        <p class="text-[10px] text-white/30 tracking-[0.1em] uppercase mt-1">Industries</p>
      </div>
      <div class="w-px h-8 bg-white/10"></div>
      <div class="text-center">
        <p class="text-2xl md:text-3xl font-bold text-white"><span data-counter-target="100" data-counter-suffix="%">0</span></p>
        <p class="text-[10px] text-white/30 tracking-[0.1em] uppercase mt-1">Satisfaction</p>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED PROJECT — Full width hero card -->
<section class="relative w-full px-6 pb-12 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="group relative rounded-2xl overflow-hidden border border-white/[0.06] aspect-[21/9] cursor-pointer hover:border-[#ff4500]/20 transition-all duration-500 scroll-reveal">
      <img src="/media/brand-identity-design.webp" alt="Featured project — Brand Identity System by TML Agency" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
      <div class="absolute bottom-0 left-0 p-8 md:p-12 max-w-lg">
        <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/20 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-4">Featured</span>
        <h2 class="text-2xl md:text-3xl font-semibold text-white mb-3">Brand Identity System</h2>
        <p class="text-sm text-white/60 leading-relaxed mb-4">Complete visual identity — logo, typography, color system, and brand guidelines for a premium brand launch.</p>
        <div class="w-0 group-hover:w-12 h-[2px] bg-[#ff4500] transition-all duration-500"></div>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORY FILTER TABS -->
<section class="relative w-full px-6 py-8 lg:px-12">
  <div class="relative mx-auto max-w-7xl">
    <?php
    $filterIcons = [
        'all' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>',
        'web-design' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
        'uiux' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
        'branding' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
        'social-media' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>',
        'advertising' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>',
        'photography' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"/><circle cx="12" cy="13" r="4"/></svg>',
        'packaging' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>',
    ];
    ?>
    <div class="flex flex-wrap items-center gap-2" id="portfolio-filters">
      <button class="portfolio-filter active px-4 py-2 rounded-full text-xs font-semibold border transition-all duration-300 bg-[#ff4500]/10 border-[#ff4500]/30 text-[#ff4500]" data-filter="all"><span class="inline-flex items-center gap-1.5"><?= $filterIcons['all'] ?> All Work</span></button>
      <?php foreach ($categories as $cat) :
          $filterKey = strtolower(str_replace([' ', '&', '/'], ['-', '', ''], $cat));
          $fIcon = $filterIcons[$filterKey] ?? '';
      ?>
      <button class="portfolio-filter px-4 py-2 rounded-full text-xs font-semibold border transition-all duration-300 bg-white/[0.02] border-white/[0.08] text-white/50 hover:text-white hover:border-white/20" data-filter="<?= tml_e(strtolower(str_replace([' ', '&'], ['-', ''], $cat))) ?>"><span class="inline-flex items-center gap-1.5"><?php if ($fIcon) echo $fIcon . ' '; ?><?= tml_e($cat) ?></span></button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- MAIN PORTFOLIO GRID — Card grid -->
<section class="relative w-full px-6 pb-20 md:pb-28 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" id="portfolio-grid">
      <?php foreach ($allWork as $i => $project) :
          $filterClass = strtolower(str_replace([' ', '&'], ['-', ''], $project['category']));
          ?>
      <div class="portfolio-item scroll-reveal" data-category="<?= tml_e($filterClass) ?>">
        <div class="group rounded-2xl overflow-hidden border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/20 hover:-translate-y-1 transition-all duration-500">
          <div class="relative aspect-[4/3] overflow-hidden">
            <img src="<?= tml_e($project['image']) ?>" alt="<?= tml_e($project['title']) ?> — <?= tml_e($project['category']) ?> by TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" width="600" height="450" loading="lazy" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <div class="absolute top-3 left-4">
              <span class="text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
            </div>
            <div class="absolute top-3 right-4">
              <span class="text-[9px] tracking-[0.12em] uppercase bg-white/10 backdrop-blur-sm text-white/70 rounded-full px-2.5 py-1 font-medium"><?= tml_e($project['category']) ?></span>
            </div>
          </div>
          <div class="p-5">
            <h3 class="text-sm font-semibold text-white mb-2 group-hover:text-[#ff4500] transition-colors"><?= tml_e($project['title']) ?></h3>
            <p class="text-xs text-white/40 leading-relaxed line-clamp-2"><?= tml_e($project['desc']) ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SHOWREEL -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-6xl">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6 scroll-reveal">
      <div>
        <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Showreel</p>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Our Video & <span class="italic text-white/90">Motion Design</span><span class="text-[#ff4500]">.</span></h2>
      </div>
      <p class="text-sm text-white/30 max-w-sm">Brand films, ad creatives, and motion design — crafted to stop the scroll.</p>
    </div>
    <div class="scroll-reveal scroll-delay-1 relative rounded-2xl overflow-hidden border border-white/[0.06] group">
      <video data-src="/tml-showreel.mp4" poster="/tml-showreel-poster.jpg" autoplay muted loop playsinline aria-label="TML Agency showreel" class="w-full h-auto block rounded-2xl"></video>
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>
      <div class="absolute bottom-6 left-8">
        <p class="text-[10px] text-[#ff4500]/80 tracking-[0.15em] uppercase font-semibold mb-1">Showreel 2025</p>
        <p class="text-lg font-medium text-white">A year of building brands that matter</p>
      </div>
    </div>
  </div>
</section>

<!-- STATS STRIP -->
<section class="relative w-full px-6 py-16 lg:px-12 bg-[#050505]">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <?php
      $stats = [
          ['n' => 500, 's' => '+', 'l' => 'Projects Delivered'],
          ['n' => 98, 's' => '%', 'l' => 'Client Retention'],
          ['n' => 15, 's' => '+', 'l' => 'Years Experience'],
          ['n' => 25, 's' => '+', 'l' => 'Industries Served'],
      ];
      foreach ($stats as $st) : ?>
      <div class="text-center p-5 rounded-xl border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/15 transition-colors duration-500 scroll-reveal">
        <p class="text-2xl md:text-3xl font-bold text-[#ff4500]/80"><span data-counter-target="<?= $st['n'] ?>" data-counter-suffix="<?= tml_e($st['s']) ?>">0</span></p>
        <div class="w-6 h-px bg-gradient-to-r from-[#ff4500]/40 to-transparent mx-auto my-2"></div>
        <p class="text-[10px] text-white/30 tracking-[0.12em] uppercase"><?= tml_e($st['l']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
    <div class="w-[600px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px]"></div>
  </div>
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Start Your Next Marketing Project<span class="text-[#ff4500]">.</span></h2>
    <p class="text-sm md:text-base text-white/45 leading-relaxed mb-10 max-w-xl mx-auto">Let's bring your vision to life. Tell us about your project and we'll craft a plan that delivers results.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] shadow-[0_0_30px_rgba(255,69,0,0.3)]">Start a Conversation</a>
      <a href="tel:+14036048692" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Call +1 (403) 604-8692</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>

<script>
(function() {
  var filters = document.querySelectorAll('.portfolio-filter');
  var items = document.querySelectorAll('.portfolio-item');
  filters.forEach(function(btn) {
    btn.addEventListener('click', function() {
      filters.forEach(function(b) {
        b.classList.remove('active', 'bg-[#ff4500]/10', 'border-[#ff4500]/30', 'text-[#ff4500]');
        b.classList.add('bg-white/[0.02]', 'border-white/[0.08]', 'text-white/50');
      });
      btn.classList.add('active', 'bg-[#ff4500]/10', 'border-[#ff4500]/30', 'text-[#ff4500]');
      btn.classList.remove('bg-white/[0.02]', 'border-white/[0.08]', 'text-white/50');
      var filter = btn.getAttribute('data-filter');
      items.forEach(function(item) {
        if (filter === 'all' || item.getAttribute('data-category') === filter) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
})();
</script>
