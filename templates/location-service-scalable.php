<?php
/**
 * SCALABLE LOCATION SERVICE PAGE TEMPLATE
 *
 * This is the master template for auto-generating location-specific service pages.
 * Variables are injected via PHP extract() from a data array.
 *
 * VARIABLES AVAILABLE (from $templateVars array):
 * ================================================
 * Core Identifiers:
 * - $CITY (string): "Edmonton", "Toronto", "Vancouver", etc.
 * - $CITY_SLUG (string): "edmonton", "toronto", "vancouver", etc.
 * - $SERVICE (string): "SEO", "Web Design", "Branding", etc.
 * - $SERVICE_SLUG (string): "seo", "web-design", "branding", etc.
 * - $URL_SLUG (string): "seo-in-edmonton", "web-design-in-toronto", etc.
 *
 * Location Data:
 * - $LOCATION (array): Full location object with state, country, industries, etc.
 * - $LOCATION_REGION (string): "Alberta", "Ontario", "British Columbia", etc.
 * - $LOCATION_STATE (string): "Alberta", "Ontario", etc.
 * - $LOCATION_COUNTRY (string): "Canada", "United States", "United Kingdom", etc.
 * - $LOCATION_INDUSTRIES (array): ["oil & gas", "tech", "healthcare", ...]
 * - $LOCATION_DESCRIPTION (string): Marketing-ready description of city
 * - $LOCATION_LANDMARKS (array): Key areas/landmarks in city
 * - $LOCATION_UNIQUE_CONTENT (array): Custom content snippets for this location
 *
 * Service Data:
 * - $SERVICE_DATA (array): Full service object with features, stats, pricing, etc.
 * - $SERVICE_FEATURES (array): Array of feature objects with title/description
 * - $SERVICE_STATS (array): Array of stat objects for hero section
 * - $SERVICE_DESCRIPTION (string): Service description
 * - $SERVICE_BENEFITS (array): Key benefits of the service
 *
 * Content & Enrichment:
 * - $ENRICHMENT (array): Custom enrichments (FAQs, case studies, etc.)
 * - $META_TITLE (string): Custom meta title (auto-generated if not provided)
 * - $META_DESC (string): Custom meta description (auto-generated if not provided)
 * - $META_KEYWORDS (string): Custom keywords
 * - $H1_TAG (string): Custom H1 (auto-generated if not provided)
 * - $HERO_BADGE (string): "Trusted by X Businesses" badge
 * - $HERO_TAGLINE (string): Tagline for hero
 * - $HERO_DESCRIPTION (string): Extended hero description
 *
 * Dynamic Content:
 * - $CASE_STUDIES (array): Region-relevant case studies
 * - $CASE_STUDY_COUNT (int): Number of case studies
 * - $RELATED_INDUSTRIES (array): Related industry pages
 * - $RELATED_BLOGS (array): Related blog articles
 * - $CROSS_LOCATION_LINKS (array): Links to same service in other cities
 * - $OTHER_SERVICES (array): Links to other services in this city
 *
 * Schema & SEO:
 * - $SCHEMA_SERVICE (array): Service schema markup
 * - $SCHEMA_LOCAL_BUSINESS (array): LocalBusiness schema
 * - $SCHEMA_BREADCRUMB (array): Breadcrumb schema
 * - $SCHEMA_FAQ (array): FAQ schema
 * - $CANONICAL_URL (string): Canonical URL
 * - $OG_IMAGE (string): Open Graph image URL
 *
 * Media:
 * - $SERVICE_IMAGES (array): Primary service images for gallery
 * - $MID_PAGE_IMAGES (array): Mid-page visual showcase
 * - $PRE_FOOTER_IMAGES (array): Pre-footer gallery
 *
 * Process & Structure:
 * - $WHY_CHOOSE (array): "Why Choose Us" section points
 * - $PROCESS_STEPS (array): Service delivery process steps
 * - $FAQS (array): Location-specific FAQs
 *
 * USAGE:
 * ======
 * $vars = [
 *     'CITY' => 'Edmonton',
 *     'CITY_SLUG' => 'edmonton',
 *     'SERVICE' => 'SEO',
 *     'SERVICE_SLUG' => 'seo',
 *     // ... more vars
 * ];
 * extract($vars);
 * require 'templates/location-service-scalable.php';
 */

// Fallback values if variables not provided
$CITY = $CITY ?? 'Unknown City';
$SERVICE = $SERVICE ?? 'Unknown Service';
$CITY_SLUG = $CITY_SLUG ?? 'unknown-city';
$SERVICE_SLUG = $SERVICE_SLUG ?? 'unknown-service';
$URL_SLUG = $URL_SLUG ?? ($SERVICE_SLUG . '-in-' . $CITY_SLUG);

// Location data with sensible defaults
$LOCATION = $LOCATION ?? [];
$LOCATION_STATE = $LOCATION_STATE ?? $LOCATION['state'] ?? 'Unknown State';
$LOCATION_COUNTRY = $LOCATION_COUNTRY ?? $LOCATION['country'] ?? 'Unknown Country';
$LOCATION_REGION = $LOCATION_REGION ?? $LOCATION['region'] ?? $CITY;
$LOCATION_INDUSTRIES = $LOCATION_INDUSTRIES ?? $LOCATION['industries'] ?? [];
$LOCATION_LANDMARKS = $LOCATION_LANDMARKS ?? $LOCATION['landmarks'] ?? [];
$LOCATION_DESCRIPTION = $LOCATION_DESCRIPTION ?? $LOCATION['description'] ?? "A thriving business hub";
$LOCATION_UNIQUE_CONTENT = $LOCATION_UNIQUE_CONTENT ?? $LOCATION['uniqueContent'] ?? [];

// Service data
$SERVICE_DATA = $SERVICE_DATA ?? [];
$SERVICE_FEATURES = $SERVICE_FEATURES ?? $SERVICE_DATA['features'] ?? [];
$SERVICE_STATS = $SERVICE_STATS ?? $SERVICE_DATA['stats'] ?? [];
$SERVICE_DESCRIPTION = $SERVICE_DESCRIPTION ?? $SERVICE_DATA['description'] ?? "Professional {$SERVICE} services";
$SERVICE_BENEFITS = $SERVICE_BENEFITS ?? $SERVICE_DATA['benefits'] ?? [];

// Enrichment & metadata
$ENRICHMENT = $ENRICHMENT ?? [];
$META_TITLE = $META_TITLE ?? "Best {$SERVICE} in {$CITY} | TML Agency";
$META_DESC = $META_DESC ?? "Looking for expert {$SERVICE} in {$CITY}? TML Agency delivers proven results for {$CITY} businesses. Get a free consultation today.";
$META_KEYWORDS = $META_KEYWORDS ?? strtolower($SERVICE) . " {$CITY}, {$SERVICE} agency {$CITY}, best {$SERVICE} {$CITY}";
$H1_TAG = $H1_TAG ?? "Best {$SERVICE} in {$CITY}";
$HERO_BADGE = $HERO_BADGE ?? "Trusted by {$CITY} Businesses";
$HERO_TAGLINE = $HERO_TAGLINE ?? "Grow your {$CITY} business with expert {$SERVICE} services";
$HERO_DESCRIPTION = $HERO_DESCRIPTION ?? "TML is a leading {$SERVICE} agency serving businesses across {$LOCATION_REGION}.";

// Dynamic content
$CASE_STUDIES = $CASE_STUDIES ?? [];
$CASE_STUDY_COUNT = $CASE_STUDY_COUNT ?? count($CASE_STUDIES);
$RELATED_INDUSTRIES = $RELATED_INDUSTRIES ?? [];
$RELATED_BLOGS = $RELATED_BLOGS ?? [];
$CROSS_LOCATION_LINKS = $CROSS_LOCATION_LINKS ?? [];
$OTHER_SERVICES = $OTHER_SERVICES ?? [];

// Schema & SEO
$SCHEMA_SERVICE = $SCHEMA_SERVICE ?? [];
$SCHEMA_LOCAL_BUSINESS = $SCHEMA_LOCAL_BUSINESS ?? [];
$SCHEMA_BREADCRUMB = $SCHEMA_BREADCRUMB ?? [];
$SCHEMA_FAQ = $SCHEMA_FAQ ?? [];
$CANONICAL_URL = $CANONICAL_URL ?? "/services/{$URL_SLUG}";
$OG_IMAGE = $OG_IMAGE ?? "/media/default-service-{$SERVICE_SLUG}.webp";

// Media/Images
$SERVICE_IMAGES = $SERVICE_IMAGES ?? [];
$MID_PAGE_IMAGES = $MID_PAGE_IMAGES ?? [];
$PRE_FOOTER_IMAGES = $PRE_FOOTER_IMAGES ?? [];

// Process & Structure
$WHY_CHOOSE = $WHY_CHOOSE ?? [
    [
        'title' => $CITY . ' Market Expertise',
        'description' => "We understand {$CITY}'s market dynamics and what resonates locally across {$LOCATION_REGION}."
    ],
    [
        'title' => 'Proven Track Record',
        'description' => "500+ successful projects delivered for businesses in {$LOCATION_STATE}."
    ],
    [
        'title' => 'Industry Specialization',
        'description' => "Deep experience with " . implode(', ', array_slice($LOCATION_INDUSTRIES, 0, 4)) . " — sectors that drive {$CITY}'s economy."
    ],
    [
        'title' => 'End-to-End Solutions',
        'description' => "From strategy to execution so you can focus on running your {$CITY} business."
    ]
];

$PROCESS_STEPS = $PROCESS_STEPS ?? [
    ['step' => 1, 'title' => 'Consultation', 'description' => "We align on goals, audience, and the {$CITY} competitive landscape."],
    ['step' => 2, 'title' => 'Planning', 'description' => "We build a tailored " . strtolower($SERVICE) . " strategy for your market."],
    ['step' => 3, 'title' => 'Implementation', 'description' => "We execute campaigns and assets optimized for {$CITY}."],
    ['step' => 4, 'title' => 'Growth', 'description' => "We monitor, analyze, and optimize for sustained growth."]
];

$FAQS = $FAQS ?? [
    [
        'q' => "Why should I choose TML for " . strtolower($SERVICE) . " in {$CITY}?",
        'a' => "TML combines deep " . strtolower($SERVICE) . " expertise with local market knowledge of {$CITY}."
    ],
    [
        'q' => "How much does " . strtolower($SERVICE) . " cost in {$CITY}?",
        'a' => "Our packages are customized for each business. Contact us for a free consultation and custom quote."
    ],
    [
        'q' => "Do you work with {$CITY} businesses remotely?",
        'a' => "Yes — we work seamlessly with {$CITY} businesses through video calls, dashboards, and regular reporting."
    ],
    [
        'q' => "How quickly can I see results?",
        'a' => "Timelines vary by channel. Paid campaigns can show results quickly; organic strategies typically compound over months."
    ],
    [
        'q' => "What industries do you serve in {$CITY}?",
        'a' => "We serve major industries in {$CITY} including " . implode(', ', array_slice($LOCATION_INDUSTRIES, 0, 6)) . "."
    ],
    [
        'q' => "What makes {$CITY} a good market?",
        'a' => "{$CITY} is " . strtolower($LOCATION_DESCRIPTION) . " — strong demand for professional marketing."
    ]
];

// Helper function for escaping HTML
if (!function_exists('tml_e')) {
    function tml_e(?string $s): string {
        return htmlspecialchars((string) $s, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}

// Helper for creating JSON-LD script tags
if (!function_exists('tml_json_ld_script')) {
    function tml_json_ld_script($data): string {
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}

?>
<!-- NOTE: This is a template partial. It should be included within a full page context with proper DOCTYPE, head, etc. -->

<main class="bg-[#050505] text-white min-h-screen">

  <!-- ========== HERO SECTION ========== -->
  <section class="relative w-full px-6 pt-32 pb-16 md:pt-40 md:pb-24 lg:px-12 overflow-hidden">
    <div class="relative z-10 max-w-5xl mx-auto mb-8">
      <!-- Breadcrumbs would go here -->
    </div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] rounded-full bg-[#ff4500]/[0.05] blur-[180px] pointer-events-none"></div>
    <div class="relative mx-auto max-w-5xl text-center">
      <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[#ff4500]/20 bg-[#ff4500]/5 mb-8">
        <div class="w-2 h-2 rounded-full bg-[#ff4500] animate-pulse"></div>
        <span class="text-[11px] text-[#ff4500] tracking-wide font-medium"><?= tml_e($HERO_BADGE) ?></span>
      </div>
      <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-medium tracking-tight mb-6">
        <?php
        $h1main = $H1_TAG;
        // Remove redundant "in {City}" if already present
        $h1main = preg_replace('/\s+in\s+' . preg_quote($CITY, '/') . '$/i', '', $h1main);
        echo tml_e(trim($h1main));
        ?>
        <br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">in <?= tml_e($CITY) ?></span>
      </h1>
      <p class="text-lg md:text-xl text-white/90 font-medium mb-4"><?= tml_e($HERO_TAGLINE) ?></p>
      <p class="text-sm md:text-base text-white/30 leading-relaxed max-w-2xl mx-auto mb-10"><?= tml_e($HERO_DESCRIPTION) ?></p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          Get a Free Quote
        </a>
        <a href="/services/<?= tml_e($SERVICE_SLUG) ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">
          View Full Service Details
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ========== STATS SECTION ========== -->
  <?php if (!empty($SERVICE_STATS)) : ?>
  <section class="relative w-full px-6 py-12 md:py-16 lg:px-12" data-tml-stats>
    <div class="relative mx-auto max-w-5xl">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <?php foreach ($SERVICE_STATS as $stat) : ?>
        <div class="text-center p-6 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
          <div class="text-2xl md:text-3xl font-bold text-white mb-1">
            <span class="text-[#ff4500]"><?= tml_e($stat['value'] ?? '0') ?></span>
          </div>
          <p class="text-xs text-white/45"><?= tml_e($stat['label'] ?? '') ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== PRIMARY IMAGE GALLERY ========== -->
  <?php if (!empty($SERVICE_IMAGES)) : ?>
  <section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <div class="grid grid-cols-<?= count($SERVICE_IMAGES) >= 3 ? '3' : count($SERVICE_IMAGES) ?> gap-4 md:gap-6">
        <?php foreach ($SERVICE_IMAGES as $imgIdx => $imgFile) : ?>
        <figure class="relative overflow-hidden rounded-2xl aspect-video bg-white/[0.03]">
          <img
            src="/media/<?= tml_e($imgFile) ?>"
            alt="<?= tml_e($SERVICE . ' in ' . $CITY) ?> — TML Agency<?= $imgIdx > 0 ? ' portfolio ' . ($imgIdx + 1) : '' ?>"
            class="w-full h-full object-cover"
            loading="<?= $imgIdx === 0 ? 'eager' : 'lazy' ?>"
            width="800"
            height="450"
          />
          <figcaption class="sr-only"><?= tml_e($SERVICE . ' in ' . $CITY . ' — TML Agency') ?></figcaption>
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== WHY CHOOSE US SECTION ========== -->
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Why Choose TML</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        Why <?= tml_e($CITY) ?> businesses choose us<span class="text-[#ff4500]">.</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <?php
        $icons = [
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
          '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        ];
        ?>
        <?php foreach ($WHY_CHOOSE as $i => $item) : ?>
        <div class="group p-6 md:p-8 rounded-2xl glass-card">
          <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $icons[$i % count($icons)] ?>
          </div>
          <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($item['title']) ?></h3>
          <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($item['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========== PROCESS STEPS SECTION ========== -->
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Process</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        Our <?= tml_e($SERVICE) ?> Process in <?= tml_e($CITY) ?><span class="text-[#ff4500]">.</span>
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <?php foreach ($PROCESS_STEPS as $item) : ?>
        <div class="relative p-6 md:p-8 rounded-2xl glass-card">
          <div class="text-4xl md:text-5xl font-bold text-[#ff4500]/10 absolute top-4 right-4"><?= str_pad((string) $item['step'], 2, '0', STR_PAD_LEFT) ?></div>
          <div class="w-10 h-10 rounded-full bg-[#ff4500]/10 flex items-center justify-center mb-5">
            <span class="text-sm font-bold text-[#ff4500]"><?= (int) $item['step'] ?></span>
          </div>
          <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($item['title']) ?></h3>
          <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($item['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========== MID-PAGE IMAGE SHOWCASE ========== -->
  <?php if (!empty($MID_PAGE_IMAGES)) : ?>
  <section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        <?php foreach ($MID_PAGE_IMAGES as $mi => $mImg) : ?>
        <figure class="relative overflow-hidden rounded-2xl aspect-[16/10] bg-white/[0.03] group">
          <img src="/media/<?= tml_e($mImg) ?>" alt="<?= tml_e($SERVICE) ?> work for <?= tml_e($CITY) ?> businesses — TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="500" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute bottom-4 left-5">
            <span class="text-[10px] text-white/60 tracking-wider uppercase font-medium"><?= tml_e($SERVICE) ?> &middot; <?= tml_e($CITY) ?></span>
          </div>
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== SERVICE FEATURES SECTION ========== -->
  <?php if (!empty($SERVICE_FEATURES)) : ?>
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">What We Offer</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        Our <?= tml_e($SERVICE) ?> Services in <?= tml_e($CITY) ?><span class="text-[#ff4500]">.</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach ($SERVICE_FEATURES as $idx => $f) : ?>
        <div class="p-6 md:p-8 rounded-2xl glass-card">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-8 h-8 rounded-lg bg-[#ff4500]/10 flex items-center justify-center">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <span class="text-[10px] text-white/20 font-mono"><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></span>
          </div>
          <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($f['title'] ?? '') ?></h3>
          <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($f['description'] ?? '') ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== LOCATION-SPECIFIC CONTENT SECTION ========== -->
  <?php if (!empty($LOCATION_UNIQUE_CONTENT)) : ?>
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-5xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Why <?= tml_e($CITY) ?></p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        Why <?= tml_e($SERVICE) ?> Matters for <?= tml_e($CITY) ?> Businesses<span class="text-[#ff4500]">.</span>
      </h2>

      <div class="space-y-6">
        <?php foreach ($LOCATION_UNIQUE_CONTENT as $content) : ?>
        <div class="p-6 md:p-8 rounded-2xl border border-white/10 bg-white/[0.02]">
          <p class="text-white/80 leading-relaxed"><?= tml_e($content) ?></p>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Location Industries Highlight -->
      <?php if (!empty($LOCATION_INDUSTRIES)) : ?>
      <div class="mt-12 p-6 md:p-8 rounded-2xl border border-white/10 bg-white/[0.02]">
        <h3 class="text-lg font-semibold text-white mb-4">Key Industries in <?= tml_e($CITY) ?></h3>
        <div class="flex flex-wrap gap-3">
          <?php foreach (array_slice($LOCATION_INDUSTRIES, 0, 8) as $industry) : ?>
          <span class="inline-block px-4 py-2 rounded-full bg-[#ff4500]/10 text-[#ff4500] text-sm font-medium">
            <?= tml_e($industry) ?>
          </span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== CASE STUDIES SECTION ========== -->
  <?php if (!empty($CASE_STUDIES)) : ?>
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Success Stories</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        <?= tml_e($SERVICE) ?> Success Stories in <?= tml_e($CITY) ?><span class="text-[#ff4500]">.</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($CASE_STUDIES as $case) : ?>
        <article class="p-6 md:p-8 rounded-2xl border border-white/10 bg-white/[0.02]">
          <div class="mb-4">
            <h3 class="text-lg font-semibold text-white mb-2"><?= tml_e($case['company'] ?? 'Client') ?></h3>
            <p class="text-sm text-[#ff4500]"><?= tml_e($case['industry'] ?? 'Industry') ?></p>
          </div>
          <p class="text-sm text-white/70 leading-relaxed mb-4"><?= tml_e($case['story'] ?? '') ?></p>
          <?php if (!empty($case['results'])) : ?>
          <div class="space-y-2 pt-4 border-t border-white/5">
            <?php foreach ((array) $case['results'] as $result) : ?>
            <p class="text-xs text-white/50"><span class="text-[#ff4500] font-semibold"><?= tml_e($result) ?></span></p>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== FAQ SECTION ========== -->
  <?php if (!empty($FAQS)) : ?>
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-3xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Questions?</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        Common Questions About <?= tml_e($SERVICE) ?> in <?= tml_e($CITY) ?><span class="text-[#ff4500]">.</span>
      </h2>

      <div class="space-y-4">
        <?php foreach ($FAQS as $faq) : ?>
        <details class="group p-6 rounded-2xl border border-white/10 bg-white/[0.02] cursor-pointer">
          <summary class="flex justify-between items-center font-semibold text-white">
            <span><?= tml_e($faq['q'] ?? '') ?></span>
            <span class="group-open:rotate-180 transition-transform">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
            </span>
          </summary>
          <p class="mt-4 text-white/70 leading-relaxed"><?= tml_e($faq['a'] ?? '') ?></p>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== PRE-FOOTER IMAGE SHOWCASE ========== -->
  <?php if (!empty($PRE_FOOTER_IMAGES)) : ?>
  <section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <?php foreach ($PRE_FOOTER_IMAGES as $pfi => $pfImg) : ?>
        <figure class="relative overflow-hidden rounded-2xl aspect-square bg-white/[0.03] group">
          <img src="/media/<?= tml_e($pfImg) ?>" alt="<?= tml_e($SERVICE) ?> portfolio — TML Agency" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy" width="500" height="500" />
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== CTA SECTION ========== -->
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#ff4500]/10 via-transparent to-[#ff4500]/10"></div>
    <div class="relative mx-auto max-w-4xl text-center">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">
        Ready to Grow Your <?= tml_e($CITY) ?> Business?
      </h2>
      <p class="text-lg text-white/70 mb-8 max-w-2xl mx-auto">
        Let's discuss your <?= tml_e($SERVICE) ?> goals and create a strategy tailored to your market.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="/contact-us?service=<?= tml_e($SERVICE_SLUG) ?>&location=<?= tml_e($CITY_SLUG) ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">
          Schedule Your Free Consultation
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ========== RELATED SERVICES SECTION ========== -->
  <?php if (!empty($OTHER_SERVICES)) : ?>
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Related Services</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        Other Services in <?= tml_e($CITY) ?><span class="text-[#ff4500]">.</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach (array_slice($OTHER_SERVICES, 0, 6) as $svc) : ?>
        <a href="/services/<?= tml_e($svc['slug']) ?>-in-<?= tml_e($CITY_SLUG) ?>" class="group p-6 rounded-2xl border border-white/10 bg-white/[0.02] hover:border-[#ff4500]/50 transition-colors">
          <h3 class="text-lg font-semibold text-white group-hover:text-[#ff4500] transition-colors mb-2">
            <?= tml_e($svc['title'] ?? '') ?>
          </h3>
          <p class="text-sm text-white/50 group-hover:text-white/70 transition-colors"><?= tml_e($svc['description'] ?? '') ?></p>
          <div class="mt-4 inline-flex items-center gap-2 text-[#ff4500] font-semibold text-sm">
            Learn More
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ========== CROSS-LOCATION LINKS ========== -->
  <?php if (!empty($CROSS_LOCATION_LINKS)) : ?>
  <section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
    <div class="relative mx-auto max-w-7xl">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Serving Your Region</p>
      <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">
        <?= tml_e($SERVICE) ?> in <?= tml_e($LOCATION_REGION) ?><span class="text-[#ff4500]">.</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <?php foreach (array_slice($CROSS_LOCATION_LINKS, 0, 8) as $loc) : ?>
        <a href="/services/<?= tml_e($SERVICE_SLUG) ?>-in-<?= tml_e($loc['slug']) ?>" class="p-6 rounded-2xl border border-white/10 bg-white/[0.02] hover:border-[#ff4500]/50 transition-colors text-center">
          <h3 class="text-lg font-semibold text-white mb-2"><?= tml_e($loc['name']) ?></h3>
          <p class="text-xs text-white/50"><?= tml_e($loc['state'] ?? $loc['country'] ?? '') ?></p>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

</main>

<!-- ========== SCHEMA MARKUP ========== -->
<?php if (!empty($SCHEMA_SERVICE)) : ?>
<?= tml_json_ld_script($SCHEMA_SERVICE) ?>
<?php endif; ?>

<?php if (!empty($SCHEMA_LOCAL_BUSINESS)) : ?>
<?= tml_json_ld_script($SCHEMA_LOCAL_BUSINESS) ?>
<?php endif; ?>

<?php if (!empty($SCHEMA_BREADCRUMB)) : ?>
<?= tml_json_ld_script($SCHEMA_BREADCRUMB) ?>
<?php endif; ?>

<?php if (!empty($SCHEMA_FAQ)) : ?>
<?= tml_json_ld_script($SCHEMA_FAQ) ?>
<?php endif; ?>
