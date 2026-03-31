<?php
$r = $GLOBALS['tml_route']['parsed'] ?? null;
if (!$r) {
    require TML_VIEWS . '/404.php';
    exit;
}
$serviceSlug = $r['serviceSlug'];
$locationSlug = $r['locationSlug'];
$urlSlug = $r['urlSlug'];

$locations = tml_locations();
$servicePages = tml_service_pages();
$enrichments = tml_enrichments();
$blogs = tml_blog_articles();
$seoBlock = tml_service_seo_content();
$industryPages = tml_industry_pages();
$industries = tml_industries();

$location = $locations[$locationSlug] ?? null;
$serviceData = $servicePages[$serviceSlug] ?? null;
$enrichment = $enrichments[$urlSlug] ?? [];

if (!$location || !$serviceData) {
    require TML_VIEWS . '/404.php';
    exit;
}

$serviceName = $serviceData['title'];
$cityName = $location['name'];
$canonicalUrl = TML_SITE_URL . '/services/' . $urlSlug;

// Title pattern: "{Service} in {City} | TML Agency | Top {Service} Company"
$metaTitle = $enrichment['metaTitle'] ?? ($serviceName . ' in ' . $cityName . ' | TML Agency | Top ' . $serviceName . ' Company');
// Meta description: unique per page — city + service + CTA
$metaDesc = $enrichment['metaDescription'] ?? ('Looking for expert ' . strtolower($serviceName) . ' in ' . $cityName . '? TML Agency delivers proven results for ' . $cityName . ' businesses. Get a free consultation today.');

$title = $metaTitle;
$description = $metaDesc;
$canonicalPath = '/services/' . $urlSlug;

$genFaqs = [
    ['q' => 'Why should I choose TML for ' . strtolower($serviceName) . ' in ' . $cityName . '?', 'a' => 'TML combines deep ' . strtolower($serviceName) . ' expertise with local market knowledge of ' . $cityName . '.'],
    ['q' => 'How much does ' . strtolower($serviceName) . ' cost in ' . $cityName . '?', 'a' => 'Our packages are customized for each business. Contact us for a free consultation and custom quote.'],
    ['q' => 'Do you work with ' . $cityName . ' businesses remotely?', 'a' => 'Yes — we work seamlessly with ' . $cityName . ' businesses through video calls, dashboards, and regular reporting.'],
    ['q' => 'How quickly can I see results?', 'a' => 'Timelines vary by channel. Paid campaigns can show results quickly; organic strategies typically compound over months.'],
    ['q' => 'What industries do you serve in ' . $cityName . '?', 'a' => 'We serve major industries in ' . $cityName . ' including ' . implode(', ', array_slice($location['industries'], 0, 6)) . '.'],
    ['q' => 'What makes ' . $cityName . ' a good market?', 'a' => $cityName . ' is ' . strtolower((string) $location['description']) . ' — strong demand for professional marketing.'],
    ['q' => 'Do you provide reporting?', 'a' => 'Yes — monthly reports with KPIs, performance, ROI, and recommendations.'],
    ['q' => 'Can you handle multi-location campaigns?', 'a' => 'Yes — we run multi-location campaigns across ' . (string) $location['state'] . ' with location-specific strategy.'],
];
$locationFaqs = !empty($enrichment['faqs']) ? $enrichment['faqs'] : $genFaqs;
foreach ($locationFaqs as &$fq) {
    if (!isset($fq['q']) && isset($fq['question'])) {
        $fq['q'] = $fq['question'];
    }
    if (!isset($fq['a']) && isset($fq['answer'])) {
        $fq['a'] = $fq['answer'];
    }
}
unset($fq);

$serviceSchema = tml_schema_service([
    'name' => $serviceName . ' in ' . $cityName,
    'description' => 'TML is a leading ' . strtolower($serviceName) . ' agency serving businesses across ' . (string) $location['region'] . '.',
    'url' => $canonicalUrl,
    'areaServed' => $cityName,
    'category' => $serviceName,
]);
$featTitles = array_map(static fn ($f) => $f['title'], $serviceData['features'] ?? []);
$localBusinessSchema = tml_schema_local_business([
    'name' => 'TML Agency - ' . $cityName,
    'description' => 'Leading ' . strtolower($serviceName) . ' agency in ' . $cityName . ', ' . (string) $location['state'] . '.',
    'url' => $canonicalUrl,
    'city' => $cityName,
    'state' => (string) $location['state'],
    'services' => count($featTitles) ? $featTitles : [$serviceName],
]);
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Services', 'url' => TML_SITE_URL . '/services'],
    ['name' => $serviceName, 'url' => TML_SITE_URL . '/services/' . $serviceSlug],
    ['name' => $cityName, 'url' => $canonicalUrl],
]);
$faqForSchema = [];
foreach ($locationFaqs as $f) {
    $faqForSchema[] = ['question' => $f['q'], 'answer' => $f['a']];
}
$faqSchema = tml_schema_faq($faqForSchema);

// Service → media image mapping for gallery and OG image
$serviceImageMap = [
    'branding'                 => ['brand-identity-design.webp', 'branding-shoot.jpg'],
    'google-ads'               => ['billboard-advertising-campaign.jpg', 'outdoor-advertising-billboard.webp'],
    'seo'                      => ['web-design-landing-page.webp', 'saas-website-design.webp'],
    'website-development'      => ['web-design-landing-page.webp', 'ux-design-illustration.webp'],
    'social-media'             => ['social-media-content-mockup.png', 'instagram-feed-design.webp', 'social-media-influencer-content.webp'],
    'graphic-design'           => ['creative-design-portfolio.webp', 'graphic-design-creative.webp', 'art-direction.jpg'],
    'lead-generation'          => ['digital-marketing-creative.webp', 'marketing-campaign-visual.webp'],
    'video-editing'            => ['creative-photography.jpg', 'visual-storytelling.jpg'],
    'branding-packaging'       => ['packaging-design-creative.webp', 'product-branding-campaign.webp'],
    'ai-influencer-management' => ['social-media-influencer-content.webp', 'ecommerce-branding-creative.webp'],
    'music-release'            => ['brand-strategy-visual.webp', 'visual-content-design.webp'],
    'shopify-development'      => ['ecommerce-branding-creative.webp', 'web-design-landing-page.webp'],
    'tiktok-ads'               => ['social-media-influencer-content.webp', 'social-media-content-mockup.png'],
    'web-design'               => ['web-design-landing-page.webp', 'saas-website-design.webp', 'ux-design-illustration.webp'],
    'wordpress-development'    => ['web-design-landing-page.webp', 'saas-website-design.webp'],
    'linkedin-ads'             => ['digital-marketing-creative.webp', 'marketing-campaign-visual.webp'],
    'marketing-automation'     => ['digital-marketing-creative.webp', 'brand-strategy-visual.webp'],
    'amazon-marketing'         => ['ecommerce-branding-creative.webp', 'product-photography-sneakers.webp'],
    'geo-optimization'         => ['saas-website-design.webp', 'digital-marketing-creative.webp'],
    'ux-ui-design'             => ['ux-design-illustration.webp', 'web-design-landing-page.webp'],
    'mobile-app-development'   => ['ux-design-illustration.webp', 'saas-website-design.webp'],
    'video-production'         => ['creative-photography.jpg', 'visual-storytelling.jpg', 'campaign-photography.jpg'],
    'microsoft-ads'            => ['billboard-advertising-campaign.jpg', 'outdoor-advertising-billboard.webp'],
    'local-seo'                => ['web-design-landing-page.webp', 'digital-marketing-creative.webp'],
];
$serviceImages = $serviceImageMap[$serviceSlug] ?? ['brand-identity-design.webp', 'digital-marketing-creative.webp'];

// Extended image pool for mid-page and pre-footer galleries
$midPageImageMap = [
    'branding'                 => ['creative-design-portfolio.webp', 'brand-photography.jpg'],
    'google-ads'               => ['digital-marketing-creative.webp', 'billboard-advertising-campaign.jpg'],
    'seo'                      => ['saas-website-design.webp', 'digital-marketing-creative.webp'],
    'website-development'      => ['saas-website-design.webp', 'web-design-landing-page.webp'],
    'social-media'             => ['social-media-influencer-content.webp', 'instagram-feed-design.webp'],
    'graphic-design'           => ['art-direction.jpg', 'editorial-photography.jpg'],
    'lead-generation'          => ['marketing-campaign-visual.webp', 'brand-strategy-visual.webp'],
    'video-editing'            => ['visual-storytelling.jpg', 'campaign-photography.jpg'],
    'branding-packaging'       => ['product-branding-campaign.webp', 'beauty-product-photography.webp'],
    'ai-influencer-management' => ['ecommerce-branding-creative.webp', 'social-media-content-mockup.png'],
    'music-release'            => ['visual-content-design.webp', 'lifestyle-photography.jpg'],
    'shopify-development'      => ['product-branding-campaign.webp', 'ecommerce-branding-creative.webp'],
    'tiktok-ads'               => ['social-media-content-mockup.png', 'instagram-feed-design.webp'],
    'web-design'               => ['saas-website-design.webp', 'creative-design-portfolio.webp'],
    'wordpress-development'    => ['ux-design-illustration.webp', 'creative-design-portfolio.webp'],
    'linkedin-ads'             => ['marketing-campaign-visual.webp', 'brand-strategy-visual.webp'],
    'marketing-automation'     => ['brand-strategy-visual.webp', 'marketing-campaign-visual.webp'],
    'amazon-marketing'         => ['product-photography-sneakers.webp', 'product-branding-campaign.webp'],
    'geo-optimization'         => ['digital-marketing-creative.webp', 'brand-strategy-visual.webp'],
    'ux-ui-design'             => ['web-design-landing-page.webp', 'saas-website-design.webp'],
    'mobile-app-development'   => ['saas-website-design.webp', 'creative-design-portfolio.webp'],
    'video-production'         => ['visual-storytelling.jpg', 'art-direction.jpg'],
    'microsoft-ads'            => ['outdoor-advertising-billboard.webp', 'digital-marketing-creative.webp'],
    'local-seo'                => ['digital-marketing-creative.webp', 'saas-website-design.webp'],
];
$preFooterImageMap = [
    'branding'                 => ['graphic-design-creative.webp', 'lifestyle-brand.jpg', 'brand-strategy-visual.webp'],
    'google-ads'               => ['outdoor-advertising-billboard.webp', 'advertising-photography.jpg', 'marketing-campaign-visual.webp'],
    'seo'                      => ['ux-design-illustration.webp', 'web-design-landing-page.webp', 'digital-marketing-creative.webp'],
    'website-development'      => ['ux-design-illustration.webp', 'creative-design-portfolio.webp', 'saas-website-design.webp'],
    'social-media'             => ['social-media-content-mockup.png', 'product-photography-sneakers.webp', 'beauty-product-photography.webp'],
    'graphic-design'           => ['minimalist-design.jpg', 'typography-design.jpg', 'creative-photography.jpg'],
    'lead-generation'          => ['brand-strategy-visual.webp', 'ecommerce-branding-creative.webp', 'billboard-advertising-campaign.jpg'],
    'video-editing'            => ['creative-photography.jpg', 'fashion-photography.jpg', 'studio-photography.jpg'],
    'branding-packaging'       => ['packaging-design-creative.webp', 'food-photography.jpg', 'product-shoot.jpg'],
    'ai-influencer-management' => ['social-media-influencer-content.webp', 'lifestyle-photography.jpg', 'fashion-photography.jpg'],
    'music-release'            => ['brand-strategy-visual.webp', 'portrait-photography.jpg', 'artistic-photography.jpg'],
    'shopify-development'      => ['web-design-landing-page.webp', 'product-branding-campaign.webp', 'ecommerce-branding-creative.webp'],
    'tiktok-ads'               => ['social-media-influencer-content.webp', 'lifestyle-photography.jpg', 'fashion-photography.jpg'],
    'web-design'               => ['ux-design-illustration.webp', 'creative-design-portfolio.webp', 'saas-website-design.webp'],
    'wordpress-development'    => ['saas-website-design.webp', 'ux-design-illustration.webp', 'creative-design-portfolio.webp'],
    'linkedin-ads'             => ['brand-strategy-visual.webp', 'marketing-campaign-visual.webp', 'digital-marketing-creative.webp'],
    'marketing-automation'     => ['marketing-campaign-visual.webp', 'digital-marketing-creative.webp', 'brand-strategy-visual.webp'],
    'amazon-marketing'         => ['product-branding-campaign.webp', 'beauty-product-photography.webp', 'product-photography-sneakers.webp'],
    'geo-optimization'         => ['saas-website-design.webp', 'digital-marketing-creative.webp', 'brand-strategy-visual.webp'],
    'ux-ui-design'             => ['saas-website-design.webp', 'creative-design-portfolio.webp', 'graphic-design-creative.webp'],
    'mobile-app-development'   => ['creative-design-portfolio.webp', 'ux-design-illustration.webp', 'saas-website-design.webp'],
    'video-production'         => ['campaign-photography.jpg', 'creative-photography.jpg', 'art-direction.jpg'],
    'microsoft-ads'            => ['advertising-photography.jpg', 'outdoor-advertising-billboard.webp', 'marketing-campaign-visual.webp'],
    'local-seo'                => ['digital-marketing-creative.webp', 'brand-strategy-visual.webp', 'saas-website-design.webp'],
];
$midImages = $midPageImageMap[$serviceSlug] ?? ['creative-design-portfolio.webp', 'brand-strategy-visual.webp'];
$preFooterImages = $preFooterImageMap[$serviceSlug] ?? ['graphic-design-creative.webp', 'lifestyle-brand.jpg', 'digital-marketing-creative.webp'];

// OG image uses the first service-specific image
$ogImage = TML_SITE_URL . '/media/' . $serviceImages[0];

// Override head.php OG image with the service-specific one
$ogImageOverride = $ogImage;

$extraHead = [
    tml_json_ld_script($serviceSchema),
    tml_json_ld_script($localBusinessSchema),
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($faqSchema),
];

require TML_VIEWS . '/partials/head.php';

$whyDefault = [
    ['title' => $cityName . ' Market Expertise', 'description' => 'We understand ' . $cityName . '\'s market dynamics and what resonates locally across ' . (string) $location['region'] . '.'],
    ['title' => 'Proven Track Record', 'description' => '500+ successful projects delivered for businesses in ' . (string) $location['state'] . '.'],
    ['title' => 'Industry Specialization', 'description' => 'Deep experience with ' . implode(', ', array_slice($location['industries'], 0, 4)) . ' — sectors that drive ' . $cityName . '\'s economy.'],
    ['title' => 'End-to-End Solutions', 'description' => 'From strategy to execution so you can focus on running your ' . $cityName . ' business.'],
];
$whyChoose = $enrichment['whyChoose'] ?? $whyDefault;

$processDefault = [
    ['step' => 1, 'title' => 'Consultation', 'description' => 'We align on goals, audience, and the ' . $cityName . ' competitive landscape.'],
    ['step' => 2, 'title' => 'Planning', 'description' => 'We build a tailored ' . strtolower($serviceName) . ' strategy for your market.'],
    ['step' => 3, 'title' => 'Implementation', 'description' => 'We execute campaigns and assets optimized for ' . $cityName . '.'],
    ['step' => 4, 'title' => 'Growth', 'description' => 'We monitor, analyze, and optimize for sustained growth.'],
];
if (!empty($enrichment['processSteps'])) {
    $processSteps = [];
    foreach ($enrichment['processSteps'] as $i => $s) {
        $processSteps[] = ['step' => $i + 1, 'title' => $s['title'], 'description' => $s['description']];
    }
} else {
    $processSteps = $processDefault;
}

$seoData = $seoBlock[$serviceSlug] ?? null;

$relatedBlogSlugs = array_slice(tml_service_related_blogs()[$serviceSlug] ?? [], 0, 3);
$relatedBlogs = [];
foreach ($relatedBlogSlugs as $bs) {
    if (isset($blogs[$bs])) {
        $relatedBlogs[] = ['slug' => $bs, 'article' => $blogs[$bs]];
    }
}

$indSlugs = tml_service_related_industries()[$serviceSlug] ?? [];
$resolvedInd = [];
foreach ($indSlugs as $is) {
    $row = tml_resolve_industry($industryPages[$is] ?? null, $industries[$is] ?? null);
    if ($row) {
        $resolvedInd[] = ['slug' => $is, 'name' => $row['name'], 'description' => $row['description']];
    }
}

$crossLocs = [];
if (!empty($enrichment['crossLinks'])) {
    foreach ($enrichment['crossLinks'] as $cl) {
        $slug = $cl['slug'] ?? '';
        if ($slug && isset($locations[$slug])) {
            $crossLocs[] = $locations[$slug];
        }
    }
} else {
    $allOther = array_values(array_filter($locations, static fn ($l) => ($l['slug'] ?? '') !== $locationSlug));
    $sameCountry = array_values(array_filter($allOther, static fn ($l) => ($l['country'] ?? '') === ($location['country'] ?? '')));
    $otherCountry = array_values(array_filter($allOther, static fn ($l) => ($l['country'] ?? '') !== ($location['country'] ?? '')));
    $crossLocs = array_merge(array_slice($sameCountry, 0, 5), array_slice($otherCountry, 0, 3));
}

$otherSvcSlugs = ['branding', 'seo', 'google-ads', 'website-development', 'social-media', 'lead-generation', 'graphic-design', 'video-editing', 'branding-packaging', 'ai-influencer-management', 'music-release'];
$otherSvcSlugs = array_values(array_filter($otherSvcSlugs, static fn ($s) => $s !== $serviceSlug));
$otherSvcSlugs = array_slice($otherSvcSlugs, 0, 6);
?>

<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<section class="relative w-full px-6 pt-32 pb-16 md:pt-40 md:pb-24 lg:px-12 overflow-hidden">
  <div class="relative z-10 max-w-5xl mx-auto mb-8">
    <?php
    $items = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Services', 'href' => '/services'],
        ['label' => $serviceName, 'href' => '/services/' . $serviceSlug],
        ['label' => $cityName, 'href' => '/services/' . $urlSlug],
    ];
    require TML_VIEWS . '/partials/breadcrumbs.php';
    ?>
  </div>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] rounded-full bg-[#ff4500]/[0.05] blur-[180px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[#ff4500]/20 bg-[#ff4500]/5 mb-8">
      <div class="w-2 h-2 rounded-full bg-[#ff4500] animate-pulse"></div>
      <span class="text-[11px] text-[#ff4500] tracking-wide font-medium"><?= tml_e($enrichment['heroBadge'] ?? ('Trusted by ' . $cityName . ' Businesses')) ?></span>
    </div>
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-medium tracking-tight mb-6">
      <?php if (!empty($enrichment['h1'])) : ?>
        <?php
        $h1 = (string) $enrichment['h1'];
        $h1main = preg_replace('/\s+in\s+\S+$/i', '', $h1);
        echo tml_e(trim((string) $h1main));
        ?>
        <br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">in <?= tml_e($cityName) ?></span>
      <?php else : ?>
        Best <?= tml_e($serviceName) ?> Agency<br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">in <?= tml_e($cityName) ?></span>
      <?php endif; ?>
    </h1>
    <p class="text-lg md:text-xl text-white/90 font-medium mb-4"><?= tml_e($enrichment['tagline'] ?? ('Grow your ' . $cityName . ' business with expert ' . strtolower($serviceName) . ' services.')) ?></p>
    <p class="text-sm md:text-base text-white/30 leading-relaxed max-w-2xl mx-auto mb-10"><?= tml_e($enrichment['heroDescription'] ?? ('TML is a leading ' . strtolower($serviceName) . ' agency serving businesses across ' . (string) $location['region'] . '.')) ?></p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Get a Free Quote</a>
      <a href="/services/<?= tml_e($serviceSlug) ?>" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">View Full Service Details</a>
    </div>
  </div>
</section>

<?php if ($serviceData && !empty($serviceData['stats'])) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12" data-tml-stats>
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <?php foreach ($serviceData['stats'] as $stat) :
          $val = $stat['value'];
          $isNum = preg_match('/^\d/', (string) $val);
          $num = $isNum ? (int) preg_replace('/\D/', '', (string) $val) : 0;
          $suffix = $isNum ? preg_replace('/\d/', '', (string) $val) : '';
          ?>
      <div class="text-center p-6 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="text-2xl md:text-3xl font-bold text-white mb-1">
          <?php if ($isNum && $num > 0) : ?>
            <span data-counter-target="<?= (int) $num ?>" data-counter-suffix="<?= tml_e($suffix) ?>">0</span>
          <?php elseif ($isNum) : ?>
            <span class="text-[#ff4500]"><?= tml_e($val) ?></span>
          <?php else : ?>
            <span class="text-[#ff4500]"><?= tml_e($val) ?></span>
          <?php endif; ?>
        </div>
        <p class="text-xs text-white/45"><?= tml_e($stat['label']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (count($serviceImages) > 0) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="grid grid-cols-<?= count($serviceImages) >= 3 ? '3' : count($serviceImages) ?> gap-4 md:gap-6">
      <?php foreach ($serviceImages as $imgIdx => $imgFile) :
          $ext = pathinfo($imgFile, PATHINFO_EXTENSION);
          $altText = tml_e($serviceName . ' in ' . $cityName . ' — TML Agency' . ($imgIdx > 0 ? ' portfolio ' . ($imgIdx + 1) : ''));
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
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Why Choose TML</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Why <?= tml_e($cityName) ?> businesses choose us<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 gap-5">
      <?php foreach ($whyChoose as $item) : ?>
      <div class="group p-6 md:p-8 rounded-2xl glass-card">
        <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
          <div class="w-2 h-2 rounded-full bg-[#ff4500]"></div>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($item['title']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($item['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Process</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Our <?= tml_e($serviceName) ?> Process in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <?php foreach ($processSteps as $item) : ?>
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

<!-- Mid-page visual showcase -->
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
      <?php foreach ($midImages as $mi => $mImg) : ?>
      <figure class="relative overflow-hidden rounded-2xl aspect-[16/10] bg-white/[0.03] group">
        <img src="/media/<?= tml_e($mImg) ?>" alt="<?= tml_e($serviceName) ?> work for <?= tml_e($cityName) ?> businesses — TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="500" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
        <div class="absolute bottom-4 left-5">
          <span class="text-[10px] text-white/60 tracking-wider uppercase font-medium"><?= tml_e($serviceName) ?> &middot; <?= tml_e($cityName) ?></span>
        </div>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<?php if ($serviceData && !empty($serviceData['features'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">What We Offer</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Our <?= tml_e($serviceName) ?> Services in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($serviceData['features'] as $idx => $f) : ?>
      <div class="p-6 md:p-8 rounded-2xl glass-card">
        <div class="text-[10px] text-white/20 font-mono mb-4"><?= str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($f['title']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($f['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Expertise</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Why <?= tml_e($cityName) ?> Businesses Trust Our <?= tml_e($serviceName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php
      $ex = [
          ['n' => 500, 's' => '+', 'l' => 'Projects Delivered', 'd' => 'We have delivered ' . strtolower($serviceName) . ' work for businesses across ' . (string) $location['state'] . '.'],
          ['n' => 98, 's' => '%', 'l' => 'Client Retention Rate', 'd' => 'Clients in ' . $cityName . ' stay with us because of measurable results.'],
          ['n' => 5, 's' => 'x', 'l' => 'Average ROI', 'd' => 'Strong returns when strategy, creative, and media work together.'],
      ];
      foreach ($ex as $it) :
          ?>
      <div class="p-6 md:p-8 rounded-2xl border border-white/[0.06] bg-white/[0.02] text-center">
        <div class="text-3xl md:text-4xl font-bold text-[#ff4500] mb-2">
          <span data-counter-target="<?= (int) $it['n'] ?>" data-counter-suffix="<?= tml_e($it['s']) ?>">0</span>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($it['l']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($it['d']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-5xl">
    <div class="flex items-center gap-4 mb-10">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase font-semibold">Local Expertise</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-14"><?= tml_e($serviceName) ?> in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-16">
      <div>
        <div class="flex items-center gap-4 mb-6">
          <span class="text-xs font-mono text-[#ff4500]/50 font-bold">01</span>
          <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
        <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start">
          <div class="md:w-2/5">
            <h3 class="text-2xl sm:text-3xl font-medium text-white leading-tight">Your Local <?= tml_e($serviceName) ?> Partner<span class="text-[#ff4500]">.</span></h3>
          </div>
          <div class="md:w-3/5 space-y-5 pl-5 border-l border-white/[0.06]">
            <?php if (!empty($enrichment['localContent'])) : ?>
              <?php foreach ($enrichment['localContent'] as $p) : ?>
                <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]"><?= tml_e($p) ?></p>
              <?php endforeach; ?>
            <?php else : ?>
              <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]">As a leading <?= tml_e(strtolower($serviceName)) ?> agency serving <?= tml_e($cityName) ?>, TML helps businesses across <?= tml_e((string) $location['region']) ?> hit measurable growth goals.</p>
              <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]">From teams near <?= tml_e($location['landmarks'][0] ?? '') ?> to companies across <?= tml_e($location['landmarks'][1] ?? '') ?> and <?= tml_e($location['landmarks'][2] ?? '') ?> — we build <?= tml_e(strtolower($serviceName)) ?> that fits your market.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div>
        <div class="flex items-center gap-4 mb-6">
          <span class="text-xs font-mono text-[#ff4500]/50 font-bold">02</span>
          <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
        <div class="flex flex-col md:flex-row-reverse gap-8 md:gap-12 items-start">
          <div class="md:w-2/5">
            <h3 class="text-2xl sm:text-3xl font-medium text-white leading-tight"><?= tml_e($cityName) ?> Market Overview<span class="text-[#ff4500]">.</span></h3>
          </div>
          <div class="md:w-3/5 space-y-5 pl-5 border-l border-white/[0.06]">
            <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]"><?= tml_e($cityName) ?> is home to thriving <?= tml_e(implode(', ', array_slice($location['industries'], 0, 3))) ?> industries — each needs a tailored <?= tml_e(strtolower($serviceName)) ?> approach.</p>
            <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]">We help you find gaps, sharpen positioning, and win demand in <?= tml_e($cityName) ?>.</p>
          </div>
        </div>
      </div>
      <?php if (!empty($location['uniqueContent'])) : ?>
      <div>
        <div class="flex items-center gap-4 mb-6">
          <span class="text-xs font-mono text-[#ff4500]/50 font-bold">03</span>
          <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
        <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start">
          <div class="md:w-2/5">
            <h3 class="text-2xl sm:text-3xl font-medium text-white leading-tight">What Makes <?= tml_e($cityName) ?> Unique<span class="text-[#ff4500]">.</span></h3>
          </div>
          <div class="md:w-3/5 space-y-5 pl-5 border-l border-white/[0.06]">
            <?php foreach ($location['uniqueContent'] as $paragraph) : ?>
              <p class="text-sm md:text-[15px] text-white/45 leading-[1.8]"><?= tml_e($paragraph) ?></p>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php if (!empty($enrichment['marketInsight'])) : ?>
<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-4xl">
    <h3 class="text-xl sm:text-2xl font-semibold text-white mb-6"><?= tml_e($cityName) ?> Market Insights</h3>
    <div class="p-6 md:p-8 rounded-2xl border border-[#ff4500]/10 bg-[#ff4500]/[0.03]">
      <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-4">
        <div class="text-3xl md:text-4xl font-bold text-[#ff4500]"><?= tml_e($enrichment['marketInsight']['stat']) ?></div>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($enrichment['marketInsight']['headline']) ?></p>
      </div>
      <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($enrichment['marketInsight']['body']) ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($serviceData['pricingNote'])) : ?>
<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 bg-[#080808]">
  <div class="relative mx-auto max-w-4xl">
    <div class="relative p-[1px] rounded-2xl overflow-hidden">
      <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#ff4500]/30 via-[#ff4500]/5 to-[#ff4500]/20 opacity-60"></div>
      <div class="relative bg-[#0a0a0a] rounded-2xl p-8 md:p-10">
        <p class="text-[10px] text-[#ff4500]/60 tracking-[0.2em] uppercase font-semibold mb-2">Transparent Pricing</p>
        <h2 class="scroll-reveal text-xl md:text-2xl font-semibold text-white mb-4"><?= tml_e($serviceName) ?> Investment in <?= tml_e($cityName) ?></h2>
        <p class="text-sm md:text-[15px] text-white/45 leading-[1.8] mb-6"><?= tml_e($serviceData['pricingNote']) ?></p>
        <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Get a Custom Quote</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 text-center">Industries We Serve in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
      <?php
      $allIndustries = !empty($enrichment['industries']) ? $enrichment['industries'] : $location['industries'];
      foreach ($allIndustries as $ind) :
          ?>
      <div class="flex items-center gap-3 p-4 rounded-xl border border-white/[0.06] bg-white/[0.02] hover:border-[#ff4500]/20 transition-colors">
        <div class="w-2 h-2 rounded-full bg-[#ff4500]/50 flex-shrink-0"></div>
        <span class="text-sm text-white/90 capitalize"><?= tml_e($ind) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-4xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-10">Trusted by <?= tml_e($cityName) ?> Businesses<span class="text-[#ff4500]">.</span></h2>
    <div class="p-8 md:p-12 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
      <p class="text-lg md:text-xl text-white/90 font-medium mb-2">Trusted by 500+ businesses</p>
      <p class="text-white/30 text-sm mb-6">across <?= tml_e((string) $location['region']) ?></p>
      <div class="h-px bg-gradient-to-r from-transparent via-white/[0.06] to-transparent mb-6"></div>
      <p class="text-sm md:text-base text-white/45 italic leading-relaxed max-w-2xl mx-auto">&ldquo;TML transformed our digital presence in <?= tml_e($cityName) ?>. Their <?= tml_e(strtolower($serviceName)) ?> expertise delivered results that exceeded expectations.&rdquo;</p>
    </div>
  </div>
</section>

<?php if ($seoData) : ?>
<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-4xl">
    <h2 class="scroll-reveal text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium text-white mb-8">Unlock Your Business Potential with Comprehensive <?= tml_e($serviceName) ?> Services in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-12">
      <div>
        <p class="text-sm md:text-base text-white/45 leading-[1.9] mb-4"><?= tml_e($seoData['intro']) ?></p>
        <p class="text-sm md:text-base text-white/45 leading-[1.9]">Additionally, businesses in <?= tml_e($cityName) ?> across <?= tml_e(implode(', ', array_slice($location['industries'], 0, 3))) ?> sectors are increasingly investing in professional <?= tml_e(strtolower($serviceName)) ?>.</p>
      </div>
      <div>
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-6">Products and Services Offered by a <?= tml_e($serviceName) ?> Agency in <?= tml_e($cityName) ?></h3>
        <div class="space-y-4">
          <?php foreach ($seoData['offerings'] as $off) : ?>
          <div class="flex items-start gap-4">
            <span class="mt-2 w-2 h-2 rounded-full bg-[#ff4500]/60 flex-shrink-0"></span>
            <div>
              <h4 class="text-base font-semibold text-white/90 mb-1"><?= tml_e($off['title']) ?></h4>
              <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($off['desc']) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-4">Charges for <?= tml_e($serviceName) ?> Services in <?= tml_e($cityName) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed mb-6">Approximate pricing varies depending on scope. Contact us for a customised quote.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <?php foreach ($seoData['pricingTiers'] as $tier) : ?>
          <div class="p-5 rounded-xl border border-white/[0.08] bg-white/[0.02] hover:border-[#ff4500]/20 transition-colors">
            <p class="text-[10px] text-[#ff4500]/60 uppercase tracking-wider font-semibold mb-2"><?= tml_e($tier['tier']) ?></p>
            <p class="text-lg font-bold text-white mb-3"><?= tml_e(tml_convert_price_range($tier['range'], (string) $location['country'])) ?></p>
            <p class="text-xs text-white/35 leading-relaxed"><?= tml_e($tier['includes']) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-6">Benefits for Your <?= tml_e($cityName) ?> Business</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <?php foreach ($seoData['benefits'] as $benefit) : ?>
          <div class="flex items-start gap-3 p-3 rounded-lg">
            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff4500]/60 flex-shrink-0"></span>
            <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($benefit) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-4xl text-center">
    <h3 class="text-xl sm:text-2xl font-medium text-white mb-8"><?= tml_e($serviceName) ?> in Other Cities</h3>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <?php foreach ($crossLocs as $locRow) : ?>
      <a href="/services/<?= tml_e(tml_location_service_slug($serviceSlug, (string) $locRow['slug'])) ?>" class="px-4 py-2 rounded-full border border-white/[0.08] bg-white/[0.02] text-sm text-white/90 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/5 transition-all duration-300"><?= tml_e($serviceName) ?> in <?= tml_e($locRow['name']) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="relative w-full py-12 lg:px-12">
  <div class="relative mx-auto max-w-4xl text-center px-6">
    <h3 class="text-lg sm:text-xl font-medium text-white/90 mb-6">Other Services in <?= tml_e($cityName) ?></h3>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <?php foreach ($otherSvcSlugs as $s) :
          $sData = $servicePages[$s] ?? null;
          if (!$sData) {
              continue;
          }
          ?>
      <a href="/services/<?= tml_e(tml_location_service_slug($s, $locationSlug)) ?>" class="px-4 py-2 rounded-full border border-white/[0.08] bg-white/[0.02] text-sm text-white/90 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/5 transition-all duration-300"><?= tml_e($sData['title']) ?> in <?= tml_e($cityName) ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 text-center"><?= tml_e($serviceName) ?> in <?= tml_e($cityName) ?> — FAQs<span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-3">
      <?php foreach ($locationFaqs as $faq) : ?>
      <details class="group border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors">
        <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer list-none text-white font-medium text-sm md:text-base">
          <span class="pr-4"><?= tml_e($faq['q']) ?></span>
          <span class="text-white/30 text-xl flex-shrink-0">+</span>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/45 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a']) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if (count($relatedBlogs) > 0) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Read More</p>
    <h2 class="scroll-reveal text-2xl sm:text-3xl font-medium text-white mb-10"><?= tml_e($serviceName) ?> Insights &amp; Articles<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($relatedBlogs as $b) :
          $a = $b['article'];
          ?>
      <a href="/blog/<?= tml_e($b['slug']) ?>" class="group block p-6 md:p-8 rounded-2xl glass-card h-full">
        <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/10 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-4"><?= tml_e($a['category']) ?></span>
        <h3 class="text-base font-semibold text-white mb-3 group-hover:text-[#ff4500] leading-snug"><?= tml_e($a['title']) ?></h3>
        <p class="text-sm text-white/35 leading-relaxed mb-4 line-clamp-2"><?= tml_e($a['metaDescription']) ?></p>
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
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Industries We Serve</p>
    <h2 class="scroll-reveal text-2xl sm:text-3xl font-medium text-white mb-10">Industries We Serve in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($resolvedInd as $ind) : ?>
      <a href="/industries/<?= tml_e($ind['slug']) ?>" class="group block p-6 md:p-8 rounded-2xl glass-card h-full">
        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500]"><?= tml_e($ind['name']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed mb-4 line-clamp-3"><?= tml_e($ind['description']) ?></p>
        <span class="text-xs text-[#ff4500] font-medium">View Industry →</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Pre-footer visual strip -->
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-6">Our Creative Work</p>
    <div class="grid grid-cols-3 gap-3 md:gap-4">
      <?php foreach ($preFooterImages as $pfi => $pfImg) : ?>
      <figure class="relative overflow-hidden rounded-xl aspect-[4/3] bg-white/[0.03] group">
        <img src="/media/<?= tml_e($pfImg) ?>" alt="<?= tml_e($serviceName) ?> creative by TML Agency for <?= tml_e($cityName) ?> clients" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="600" height="450" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
    <div class="w-[600px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px]"></div>
  </div>
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to grow in <?= tml_e($cityName) ?><span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/45 mb-10 max-w-xl mx-auto">Get a free consultation for your <?= tml_e(strtolower($serviceName)) ?> needs.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Get Your Free Consultation</a>
      <a href="tel:+14036048692" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Call +1 (403) 604-8692</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
