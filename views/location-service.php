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

// Title pattern: "Best {Service} Company in {City} | TML Agency"
$metaTitle = $enrichment['metaTitle'] ?? ('Best ' . $serviceName . ' Company in ' . $cityName . ' | TML Agency');
// Meta description: unique per page — city + service + CTA
$metaDesc = $enrichment['metaDescription'] ?? ('Looking for expert ' . strtolower($serviceName) . ' in ' . $cityName . '? TML Agency delivers proven results for ' . $cityName . ' businesses. Get a free consultation today.');

$title = $metaTitle;
$description = $metaDesc;
$keywords = $enrichment['metaKeywords'] ?? (strtolower($serviceName) . ' ' . $cityName . ', ' . strtolower($serviceName) . ' agency ' . $cityName . ', best ' . strtolower($serviceName) . ' ' . $cityName . ', ' . strtolower($serviceName) . ' company ' . (string) $location['state'] . ', TML Agency ' . $cityName . ', ' . $cityName . ' ' . strtolower($serviceName) . ' services');
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
    'lat' => $location['lat'] ?? $location['latitude'] ?? null,
    'lng' => $location['lng'] ?? $location['longitude'] ?? null,
    'postalCode' => $location['postalCode'] ?? null,
]);
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Services', 'url' => TML_SITE_URL . '/services'],
    ['name' => $serviceName, 'url' => TML_SITE_URL . '/services/' . $serviceSlug],
    ['name' => $cityName, 'url' => $canonicalUrl],
]);
$faqForSchema = [];
foreach ($locationFaqs as $f) {
    $faqForSchema[] = ['question' => $f['q'] ?? $f['question'] ?? '', 'answer' => $f['a'] ?? $f['answer'] ?? ''];
}
$faqSchema = tml_schema_faq($faqForSchema);

// Service image ownership: each image belongs to exactly ONE service.
// 4-img services: svc=[0,1]  mid=[2,3]  footer=[0,1,2]
// 3-img services: svc=[0,1]  mid=[0,2]  footer=[0,1,2]
// Maps are derived programmatically below — no manual duplication.
$_imgPool = [
    // 21 services with 4 exclusively-owned images (84 images total)
    'branding'                 => ['brand-identity-design.webp', 'branding-shoot.jpg', 'brand-photography.jpg', 'brand-identity-design-2.webp'],
    'google-ads'               => ['creative-ad-roofing-company.webp', 'creative-ad-protein-fitness.webp', 'creative-ad-back-to-school-cairo.webp', 'advertising-photography.jpg'],
    'seo'                      => ['graphic-design-story-social-post.webp', 'graphic-design-social-story-3.webp', 'graphic-design-social-story-4.webp', 'graphic-design-social-story-minimal.webp'],
    'website-development'      => ['web-design-community-platform.webp', 'web-design-finance-hero.webp', 'web-design-travel-adventure.jpg', 'web-design-web3-platform.jpg'],
    'social-media'             => ['social-media-content-mockup.png', 'social-media-brand-feed.webp', 'social-media-podcast-grid.jpg', 'social-media-real-estate-posts-grid.webp'],
    'graphic-design'           => ['graphic-design-creative.webp', 'graphic-design-illustration.webp', 'graphic-design-denim-heels.jpg', 'graphic-design-spice-sauce-ad.webp'],
    'lead-generation'          => ['digital-marketing-creative.webp', 'marketing-campaign-visual.webp', 'creative-design-portfolio.webp', 'graphic-design-fried-chicken-ad.webp'],
    'video-editing'            => ['visual-storytelling.jpg', 'studio-photography.jpg', 'art-direction.jpg', 'editorial-photography.jpg'],
    'branding-packaging'       => ['packaging-design-creative.webp', 'packaging-design-minimalist-cans.webp', 'packaging-design-candy-characters.webp', 'packaging-design-character-cups.webp'],
    'ai-influencer-management' => ['social-media-influencer-content.webp', 'social-media-instagram-mockup.webp', 'social-media-turkish-agency.jpg', 'instagram-feed-design.webp'],
    'music-release'            => ['poster-design-weeknd-blinding-lights.webp', 'poster-design-netflix-induction.webp', 'visual-content-design.webp', 'artistic-photography.jpg'],
    'shopify-development'      => ['ecommerce-branding-creative.webp', 'product-photography-sneakers.webp', 'product-photography-styled-still-life.webp', 'product-branding-campaign.webp'],
    'web-design'               => ['saas-website-design.webp', 'web-design-travel-app.webp', 'web-design-landing-page.webp', 'web-design-productivity-tool.webp'],
    'linkedin-ads'             => ['creative-ad-legal-education-red.webp', 'creative-ad-eyewear-fashion.webp', 'creative-ad-dental-clinic-fly.webp', 'graphic-design-clean-minimal-ad.webp'],
    'amazon-marketing'         => ['product-photography-handbag-sunset.webp', 'product-photography-luxury-skincare.webp', 'product-photography-jewelry.webp', 'product-photography-lipstick-beauty.webp'],
    'ux-ui-design'             => ['ux-design-illustration.webp', 'graphic-design-3d-ux-concept.webp', 'graphic-design-product-layout.webp', 'graphic-design-product-showcase.webp'],
    'video-production'         => ['campaign-photography.jpg', 'commercial-photography.jpg', 'creative-shoot.jpg', 'professional-photography.jpg'],
    'ecommerce-marketing'      => ['product-photography-fashion-shoes.webp', 'product-photography-retro-brand.webp', 'product-photography-fashion-editorial.webp', 'product-photography-fashion-night.webp'],
    'ui-design'                => ['graphic-design-denim-fashion.webp', 'graphic-design-creative-fashion-ad.jpg', 'minimalist-design.jpg', 'typography-design.jpg'],
    'ecommerce-seo'            => ['product-photography-skincare-set.webp', 'product-photography-skincare-toner.webp', 'product-photography-sneaker-sky.webp', 'product-photography-creative-closeup.webp'],
    'digital-marketing'        => ['packaging-design-eskimo-ice-cream.webp', 'packaging-design-goody-candy-sour-sweet.webp', 'packaging-design-kids-sandwich-box.webp', 'packaging-design-moody-snacks.webp'],

    // 21 services with 3 exclusively-owned images (63 images total)
    'tiktok-ads'                    => ['social-media-instagram-lifestyle.jpg', 'social-media-promo-grid.jpg', 'social-media-chupa-chups.webp'],
    'wordpress-development'         => ['web-design-creative-agency-dark.jpg', 'web-design-ai-design-tool.jpg', 'graphic-design-brand-showcase.webp'],
    'marketing-automation'          => ['brand-strategy-visual.webp', 'graphic-design-ai-brand.webp', 'graphic-design-minimal-brand-ad.webp'],
    'geo-optimization'              => ['graphic-design-pepsi-billboard.jpg', 'graphic-design-clarity-brand.jpg', 'graphic-design-coca-cola-billboard.jpg'],
    'mobile-app-development'        => ['graphic-design-creative-brand.webp', 'graphic-design-dark-story-ad.webp', 'graphic-design-dental-creative.webp'],
    'microsoft-ads'                 => ['billboard-advertising-campaign.jpg', 'outdoor-advertising-billboard.webp', 'creative-ad-durex-football.webp'],
    'local-seo'                     => ['graphic-design-minimal-story.webp', 'graphic-design-social-media-story.webp', 'graphic-design-social-story-1.webp'],
    'link-building'                 => ['graphic-design-brand-typography.webp', 'graphic-design-brand-story-layout.webp', 'graphic-design-brand-story-creative.webp'],
    'meta-ads'                      => ['graphic-design-creative-story-ad.webp', 'graphic-design-story-brand-post.webp', 'graphic-design-fitness-billboard.webp'],
    'content-writing'               => ['graphic-design-creative-photography.webp', 'graphic-design-brand-identity.webp', 'content-photography.jpg'],
    'gmb-listing'                   => ['graphic-design-coca-cola-marvel.webp', 'graphic-design-colgate-creative.jpg', 'graphic-design-faber-castell.jpg'],
    'technical-seo'                 => ['graphic-design-sneaker-creative.jpg', 'graphic-design-snickers-guerilla.jpg', 'graphic-design-food-ad.jpg'],
    'content-marketing'             => ['packaging-design-water-bottle-brand.webp', 'product-photography-bicycle-lifestyle.jpg', 'product-photography-bicycle-summer.jpg'],
    'email-marketing'               => ['lifestyle-brand.jpg', 'lifestyle-photography.jpg', 'landscape-photography.jpg'],
    'influencer-marketing'          => ['social-media-agency-grid.jpg', 'fashion-editorial.jpg', 'fashion-photography.jpg'],
    'ppc-management'                => ['architectural-photography.jpg', 'creative-photography.jpg', 'magazine-photography.jpg'],
    'online-reputation-management'  => ['portrait-photography.jpg', 'product-photography-brand-lifestyle.jpg', 'product-shoot.jpg'],
    'conversion-rate-optimization'  => ['beauty-product-photography.webp', 'food-photography.jpg', 'product-photography-fine-art.webp'],
    'ai-automation'                 => ['product-photography-cinematic-portrait.webp', 'product-photography-cocktails.webp', 'product-photography-facial-cream.jpg'],
    'custom-software-development'   => ['product-photography-food-croissant.webp', 'product-photography-lifestyle-drinks.webp', 'product-photography-blue-brand.jpg'],
    'enterprise-seo'                => ['product-photography-perfume-shoot.jpg', 'product-photography-sunscreen.jpg', 'product-photography-yellow-sneakers.jpg'],
];

// Derive maps from single ownership pool — guarantees no cross-service sharing
$serviceImageMap = [];
$midPageImageMap = [];
$preFooterImageMap = [];
foreach ($_imgPool as $_svc => $_imgs) {
    $n = count($_imgs);
    // serviceImageMap always gets [0] and [1]
    $serviceImageMap[$_svc] = [$_imgs[0], $_imgs[1]];
    if ($n >= 4) {
        // 4-img: mid=[2,3]  footer=[0,1,2]
        $midPageImageMap[$_svc]   = [$_imgs[2], $_imgs[3]];
        $preFooterImageMap[$_svc] = [$_imgs[0], $_imgs[1], $_imgs[2]];
    } else {
        // 3-img: mid=[0,2]  footer=[0,1,2]
        $midPageImageMap[$_svc]   = [$_imgs[0], $_imgs[2]];
        $preFooterImageMap[$_svc] = [$_imgs[0], $_imgs[1], $_imgs[2]];
    }
}
unset($_imgPool, $_svc, $_imgs);

$serviceImages = $serviceImageMap[$serviceSlug] ?? ['brand-identity-design.webp', 'digital-marketing-creative.webp'];
$midImages = $midPageImageMap[$serviceSlug] ?? ['creative-design-portfolio.webp', 'brand-strategy-visual.webp'];
$preFooterImages = $preFooterImageMap[$serviceSlug] ?? ['graphic-design-creative.webp', 'lifestyle-brand.jpg', 'digital-marketing-creative.webp'];

// OG image uses the first service-specific image
$ogImage = TML_SITE_URL . '/media/' . $serviceImages[0];
// Build unique image list so each page section uses a DIFFERENT image
$_allImgs = array_values(array_unique(array_merge($serviceImages, $midImages, $preFooterImages)));
$_overflow = ['packaging-design-goody-candy-sour-sweet.webp','packaging-design-kids-sandwich-box.webp','packaging-design-moody-snacks.webp','product-photography-cocktails.webp','product-photography-food-croissant.webp','product-photography-lipstick-beauty.webp','product-photography-fine-art.webp','social-media-real-estate-posts-grid.webp','creative-ad-back-to-school-cairo.webp','poster-design-weeknd-blinding-lights.webp'];
foreach ($_overflow as $_o) { if (!in_array($_o, $_allImgs, true)) { $_allImgs[] = $_o; } }
// Section assignments: 0=WhyChoose, 1=Process, 2=Services, 3=Local01, 4=Local02, 5=Local03
$sectionImg = function(int $idx) use ($_allImgs) { return $_allImgs[$idx % count($_allImgs)]; };

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

$otherSvcSlugs = !empty($serviceData['relatedServices'])
    ? $serviceData['relatedServices']
    : array_keys($servicePages);
$otherSvcSlugs = array_values(array_filter($otherSvcSlugs, static fn ($s) => $s !== $serviceSlug));
$otherSvcSlugs = array_slice($otherSvcSlugs, 0, 6);
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
        ['label' => $serviceName, 'href' => '/services/' . $serviceSlug],
        ['label' => $cityName, 'href' => '/services/' . $urlSlug],
    ];
    require TML_VIEWS . '/partials/breadcrumbs.php';
    ?>
  </div>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] rounded-full bg-[#ff4500]/[0.05] blur-[180px] pointer-events-none z-[2]"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[#ff4500]/20 bg-[#ff4500]/5 mb-8">
      <div class="w-2 h-2 rounded-full bg-[#ff4500] animate-pulse"></div>
      <span class="text-[11px] text-[#ff4500] tracking-wide font-medium"><?= tml_e($enrichment['heroBadge'] ?? ('Trusted by ' . $cityName . ' Businesses')) ?></span>
    </div>
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-medium tracking-tight mb-6">
      <?php if (!empty($enrichment['h1'])) : ?>
        <?php
        $h1 = (string) $enrichment['h1'];
        // Remove "in {CityName}" from the end if present to avoid duplication
        $h1main = preg_replace('/\s+in\s+' . preg_quote($cityName, '/') . '$/i', '', $h1);
        // If city name wasn't at end, also try removing last "in ..." pattern
        if ($h1main === $h1) {
            $h1main = preg_replace('/\s+in\s+[\w\s-]+$/i', '', $h1);
        }
        echo tml_e(trim((string) $h1main));
        ?>
        <br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">in <?= tml_e($cityName) ?></span>
      <?php else : ?>
        Best <?= tml_e($serviceName) ?> Company<br /><span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">in <?= tml_e($cityName) ?></span>
      <?php endif; ?>
    </h1>
    <p class="text-lg md:text-xl text-white/90 font-medium mb-4"><?= tml_e($enrichment['tagline'] ?? ('Grow your ' . $cityName . ' business with expert ' . strtolower($serviceName) . ' services.')) ?></p>
    <p class="text-xs text-white/25 tracking-wide mb-4"><?= tml_e($serviceName) ?> Agency &bull; <?= tml_e($serviceName) ?> Company &bull; <?= tml_e($serviceName) ?> Services in <?= tml_e($cityName) ?></p>
    <p class="text-sm md:text-base text-white/30 leading-relaxed max-w-2xl mx-auto mb-10"><?= tml_e($enrichment['heroDescription'] ?? ('TML is a leading ' . strtolower($serviceName) . ' agency serving businesses across ' . (string) $location['region'] . '.')) ?></p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Get a Free Quote</a>
      <a href="/services/<?= tml_e($serviceSlug) ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">View Full Service Details<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
    </div>
  </div>
</section>

<?php if ($serviceData && !empty($serviceData['stats'])) : ?>
<section class="relative w-full px-6 py-12 md:py-16 lg:px-12" data-tml-stats>
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <?php foreach ($serviceData['stats'] as $stat) :
          $val = $stat['value'];
          $isSimpleInt = preg_match('/^(\d+)([+%]?)$/', (string) $val, $m);
          ?>
      <div class="text-center p-6 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="text-2xl md:text-3xl font-bold text-white mb-1">
          <?php if ($isSimpleInt && (int) $m[1] > 0) : ?>
            <span data-counter-target="<?= (int) $m[1] ?>" data-counter-suffix="<?= tml_e($m[2]) ?>">0</span>
          <?php else : ?>
            <span class="text-[#ff4500]"><?= tml_e($val) ?></span>
          <?php endif; ?>
        </div>
        <p class="text-xs text-white/75"><?= tml_e($stat['label']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Why Choose TML</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Why <?= tml_e($cityName) ?> Businesses Choose Our <?= tml_e($serviceName) ?> Agency<span class="text-[#ff4500]">.</span></h2>
    <?php
    $whyIcons = [
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
    ];
    ?>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
      <!-- Left: Image -->
      <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
        <img src="/media/<?= tml_e($sectionImg(0)) ?>" alt="Why choose TML for <?= tml_e($serviceName) ?> in <?= tml_e($cityName) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
      </figure>
      <!-- Right: Why Choose cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($whyChoose as $i => $item) : ?>
        <div class="group p-5 rounded-2xl glass-card">
          <div class="w-9 h-9 rounded-lg bg-[#ff4500]/10 flex items-center justify-center mb-4 group-hover:bg-[#ff4500]/20 transition-colors">
            <?= $whyIcons[$i % count($whyIcons)] ?>
          </div>
          <h3 class="text-base font-semibold text-white mb-2"><?= tml_e($item['title']) ?></h3>
          <p class="text-xs text-white/60 leading-relaxed"><?= tml_e($item['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Process</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">How Our <?= tml_e($serviceName) ?> Process Works in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <?php
    $processIcons = [
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    ];
    ?>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
      <!-- Left: Process Steps -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($processSteps as $item) : ?>
        <div class="relative p-5 rounded-2xl glass-card">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-9 h-9 rounded-full bg-[#ff4500]/10 flex items-center justify-center flex-shrink-0">
              <span class="text-sm font-bold text-[#ff4500]"><?= (int) $item['step'] ?></span>
            </div>
            <h3 class="text-base font-semibold text-white"><?= tml_e($item['title']) ?></h3>
          </div>
          <p class="text-xs text-white/60 leading-relaxed"><?= tml_e($item['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- Right: Image -->
      <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
        <img src="/media/<?= tml_e($sectionImg(1)) ?>" alt="Our <?= tml_e($serviceName) ?> process in <?= tml_e($cityName) ?> — TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
      </figure>
    </div>
  </div>
</section>

<?php /* Mid-page gallery removed — images are now integrated into each section above */ ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<?php if ($serviceData && !empty($serviceData['features'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">What We Offer</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Best <?= tml_e($serviceName) ?> Services in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <?php
    $featureIcons = [
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
    ];
    ?>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
      <!-- Left: Image (stretches to match cards height) -->
      <figure class="group relative overflow-hidden rounded-2xl border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500 min-h-[400px]">
        <img src="/media/<?= tml_e($sectionImg(2)) ?>" alt="<?= tml_e($serviceName) ?> services for <?= tml_e($cityName) ?> businesses — TML Agency" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
      </figure>
      <!-- Right: Feature cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 content-start">
        <?php foreach ($serviceData['features'] as $idx => $f) : ?>
        <div class="p-5 rounded-2xl glass-card">
          <div class="flex items-center gap-3 mb-3">
            <div class="w-8 h-8 rounded-lg bg-[#ff4500]/10 flex items-center justify-center"><?= $featureIcons[$idx % count($featureIcons)] ?></div>
          </div>
          <h3 class="text-base font-semibold text-white mb-2"><?= tml_e($f['title']) ?> in <?= tml_e($cityName) ?></h3>
          <p class="text-xs text-white/60 leading-relaxed"><?= tml_e($f['description']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Expertise</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Why <?= tml_e($cityName) ?> Businesses Trust Our <?= tml_e($serviceName) ?> Experts<span class="text-[#ff4500]">.</span></h2>
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
        <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($it['d']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-5xl">
    <!-- Visible keyword-rich paragraph targeting exact search phrases -->
    <p class="text-sm text-white/40 leading-relaxed mb-8">Looking for a trusted <strong class="text-white/60"><?= tml_e(strtolower($serviceName)) ?> company in <?= tml_e($cityName) ?></strong>? TML is a leading <strong class="text-white/60"><?= tml_e(strtolower($serviceName)) ?> agency in <?= tml_e($cityName) ?></strong> providing expert <strong class="text-white/60"><?= tml_e(strtolower($serviceName)) ?> services</strong> to local businesses. Our <strong class="text-white/60"><?= tml_e(strtolower($serviceName)) ?> experts</strong> and <strong class="text-white/60"><?= tml_e(strtolower($serviceName)) ?> consultants</strong> in <?= tml_e($cityName) ?> deliver measurable results.</p>
    <div class="flex items-center gap-4 mb-10">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase font-semibold">Local Expertise</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-14"><?= tml_e($serviceName) ?> in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h2>
    <div class="space-y-20">
      <!-- Section 01: Local Partner — Text Left, Image Right -->
      <div>
        <div class="flex items-center gap-4 mb-8">
          <span class="text-xs font-mono text-[#ff4500]/50 font-bold">01</span>
          <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
          <div>
            <h3 class="text-2xl sm:text-3xl font-medium text-white leading-tight mb-6">Your Local <?= tml_e($serviceName) ?> Agency in <?= tml_e($cityName) ?><span class="text-[#ff4500]">.</span></h3>
            <div class="space-y-4">
              <?php if (!empty($enrichment['localContent'])) : ?>
                <?php foreach ($enrichment['localContent'] as $p) : ?>
                  <p class="text-sm md:text-[15px] text-white/75 leading-[1.8]"><?= tml_e($p) ?></p>
                <?php endforeach; ?>
              <?php else : ?>
                <p class="text-sm md:text-[15px] text-white/75 leading-[1.8]">As a leading <?= tml_e(strtolower($serviceName)) ?> agency serving <?= tml_e($cityName) ?>, TML helps businesses across <?= tml_e((string) $location['region']) ?> hit measurable growth goals.</p>
                <p class="text-sm md:text-[15px] text-white/75 leading-[1.8]">From teams near <?= tml_e($location['landmarks'][0] ?? '') ?> to companies across <?= tml_e($location['landmarks'][1] ?? '') ?> and <?= tml_e($location['landmarks'][2] ?? '') ?> — we build <?= tml_e(strtolower($serviceName)) ?> that fits your market.</p>
              <?php endif; ?>
            </div>
          </div>
          <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
            <img src="/media/<?= tml_e($sectionImg(3)) ?>" alt="<?= tml_e($serviceName) ?> services in <?= tml_e($cityName) ?> — TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          </figure>
        </div>
      </div>

      <!-- Section 02: Market Overview — Image Left, Text Right -->
      <div>
        <div class="flex items-center gap-4 mb-8">
          <span class="text-xs font-mono text-[#ff4500]/50 font-bold">02</span>
          <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
          <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
            <img src="/media/<?= tml_e($sectionImg(4)) ?>" alt="<?= tml_e($cityName) ?> market — <?= tml_e($serviceName) ?> by TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          </figure>
          <div>
            <h3 class="text-2xl sm:text-3xl font-medium text-white leading-tight mb-6"><?= tml_e($cityName) ?> <?= tml_e($serviceName) ?> Market Overview<span class="text-[#ff4500]">.</span></h3>
            <div class="space-y-4">
              <p class="text-sm md:text-[15px] text-white/75 leading-[1.8]"><?= tml_e($cityName) ?> is home to thriving <?= tml_e(implode(', ', array_slice($location['industries'], 0, 3))) ?> industries — each needs a tailored <?= tml_e(strtolower($serviceName)) ?> approach.</p>
              <p class="text-sm md:text-[15px] text-white/75 leading-[1.8]">We help you find gaps, sharpen positioning, and win demand in <?= tml_e($cityName) ?>.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Section 03: What Makes City Unique — Text Left, Image Right -->
      <?php if (!empty($location['uniqueContent'])) : ?>
      <div>
        <div class="flex items-center gap-4 mb-8">
          <span class="text-xs font-mono text-[#ff4500]/50 font-bold">03</span>
          <div class="flex-1 h-[1px] bg-gradient-to-r from-[#ff4500]/20 to-transparent"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-stretch">
          <div>
            <h3 class="text-2xl sm:text-3xl font-medium text-white leading-tight mb-6">What Makes <?= tml_e($cityName) ?> <?= tml_e($serviceName) ?> Different<span class="text-[#ff4500]">.</span></h3>
            <div class="space-y-4">
              <?php foreach ($location['uniqueContent'] as $paragraph) : ?>
                <p class="text-sm md:text-[15px] text-white/75 leading-[1.8]"><?= tml_e($paragraph) ?></p>
              <?php endforeach; ?>
            </div>
          </div>
          <figure class="group relative overflow-hidden rounded-2xl aspect-[4/3] border border-white/[0.06] bg-white/[0.03] hover:border-[#ff4500]/20 transition-all duration-500">
            <img src="/media/<?= tml_e($sectionImg(5)) ?>" alt="What makes <?= tml_e($cityName) ?> unique — <?= tml_e($serviceName) ?> by TML Agency" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" width="800" height="600" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          </figure>
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
        <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($enrichment['marketInsight']['headline']) ?></p>
      </div>
      <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($enrichment['marketInsight']['body']) ?></p>
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
        <p class="text-sm md:text-[15px] text-white/75 leading-[1.8] mb-6"><?= tml_e($serviceData['pricingNote']) ?></p>
        <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>Get a Custom Quote</a>
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
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#ff4500]/60 flex-shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
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
      <p class="text-sm md:text-base text-white/75 italic leading-relaxed max-w-2xl mx-auto">&ldquo;TML transformed our digital presence in <?= tml_e($cityName) ?>. Their <?= tml_e(strtolower($serviceName)) ?> expertise delivered results that exceeded expectations.&rdquo;</p>
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
        <p class="text-sm md:text-base text-white/75 leading-[1.9] mb-4"><?= tml_e($seoData['intro']) ?></p>
        <p class="text-sm md:text-base text-white/75 leading-[1.9]">Additionally, businesses in <?= tml_e($cityName) ?> across <?= tml_e(implode(', ', array_slice($location['industries'], 0, 3))) ?> sectors are increasingly investing in professional <?= tml_e(strtolower($serviceName)) ?>.</p>
      </div>
      <div>
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-6">Products and Services Offered by a <?= tml_e($serviceName) ?> Agency in <?= tml_e($cityName) ?></h3>
        <div class="space-y-4">
          <?php foreach ($seoData['offerings'] as $off) : ?>
          <div class="flex items-start gap-4">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#ff4500] flex-shrink-0 mt-1"><polyline points="20 6 9 17 4 12"/></svg>
            <div>
              <h4 class="text-base font-semibold text-white/90 mb-1"><?= tml_e($off['title']) ?></h4>
              <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($off['desc']) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-4">Charges for <?= tml_e($serviceName) ?> Services in <?= tml_e($cityName) ?></h3>
        <p class="text-sm text-white/75 leading-relaxed mb-6">Approximate pricing varies depending on scope. Contact us for a customised quote.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <?php
          $pricingIcons = [
              'Basic' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
              'Standard' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>',
              'Premium' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
          ];
          $pricingFallback = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500]"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>';
          ?>
          <?php foreach ($seoData['pricingTiers'] as $tier) : ?>
          <div class="p-5 rounded-xl border border-white/[0.08] bg-white/[0.02] hover:border-[#ff4500]/20 transition-colors">
            <div class="flex items-center gap-2 mb-2">
              <?= $pricingIcons[$tier['tier']] ?? $pricingFallback ?>
              <p class="text-[10px] text-[#ff4500]/60 uppercase tracking-wider font-semibold"><?= tml_e($tier['tier']) ?></p>
            </div>
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
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#ff4500] flex-shrink-0 mt-0.5"><polyline points="20 6 9 17 4 12"/></svg>
            <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($benefit) ?></p>
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
          <span class="flex items-center gap-3 pr-4"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500] flex-shrink-0"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg><?= tml_e($faq['q'] ?? $faq['question'] ?? '') ?></span>
          <span class="text-white/30 text-xl flex-shrink-0">+</span>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/75 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a'] ?? $faq['answer'] ?? '') ?></div>
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
        <p class="text-sm text-white/75 leading-relaxed mb-4 line-clamp-3"><?= tml_e($ind['description']) ?></p>
        <span class="text-xs text-[#ff4500] font-medium">View Industry →</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Pre-footer visual strip -->
<?php /* Pre-footer gallery removed — images are integrated into each section */ ?>

<div class="mx-auto max-w-5xl px-6 lg:px-12"><div class="h-px bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div></div>

<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
    <div class="w-[600px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px]"></div>
  </div>
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to grow in <?= tml_e($cityName) ?><span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/75 mb-10 max-w-xl mx-auto">Get a free consultation for your <?= tml_e(strtolower($serviceName)) ?> needs.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>Get Your Free Consultation</a>
      <a href="tel:+14036048692" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>Call +1 (403) 604-8692</a>
    </div>
  </div>
</section>

<!-- Our Creative Work — Grid Carousel with Dots Navigation -->
<section class="relative w-full py-16 md:py-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 mb-12 scroll-reveal">
    <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4">Our Creative Work</p>
    <h2 class="text-3xl sm:text-4xl font-medium text-white leading-tight">Brand Identity &amp; Creative Work<span class="text-[#ff4500]">.</span></h2>
  </div>

  <?php
  // Filter carousel to EXCLUDE images already shown on this page
  $_carouselPool = [
      ['packaging-design-water-bottle-brand.webp', 'Water Bottle Branding', 'Packaging'],
      ['product-photography-fashion-shoes.webp', 'Fashion Shoes Editorial', 'Photography'],
      ['social-media-real-estate-posts-grid.webp', 'Real Estate Social', 'Social Media'],
      ['graphic-design-brand-story-creative.webp', 'Brand Story Creative', 'Branding'],
      ['product-photography-cocktails.webp', 'Cocktail Photography', 'Photography'],
      ['packaging-design-minimalist-cans.webp', 'Minimalist Cans', 'Packaging'],
      ['creative-ad-back-to-school-cairo.webp', 'Back to School Campaign', 'Advertising'],
      ['social-media-podcast-grid.jpg', 'Podcast Social Grid', 'Social Media'],
      ['graphic-design-colgate-creative.jpg', 'Colgate Creative', 'Graphic Design'],
      ['product-photography-lipstick-beauty.webp', 'Lipstick Beauty Shoot', 'Photography'],
      ['packaging-design-character-cups.webp', 'Character Cups', 'Packaging'],
      ['product-photography-handbag-sunset.webp', 'Handbag Sunset Shot', 'Photography'],
      ['graphic-design-denim-fashion.webp', 'Denim Fashion Creative', 'Fashion'],
      ['product-photography-cinematic-portrait.webp', 'Cinematic Portrait', 'Photography'],
      ['packaging-design-moody-snacks.webp', 'Moody Snack Packaging', 'Packaging'],
      ['graphic-design-minimal-brand-ad.webp', 'Minimal Brand Ad', 'Design'],
      ['product-photography-food-croissant.webp', 'Croissant Food Shoot', 'Photography'],
      ['poster-design-weeknd-blinding-lights.webp', 'Weeknd Poster Design', 'Design'],
  ];
  $carouselImages = array_values(array_filter($_carouselPool, function ($img) use ($_allImgs) {
      return !in_array($img[0], $_allImgs, true);
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
                <img src="/media/<?= tml_e($cc[0]) ?>" alt="<?= tml_e($cc[1]) ?> — <?= tml_e($serviceName) ?> in <?= tml_e($cityName) ?> by TML Agency" loading="lazy" width="600" height="450" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
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

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
