<?php
$slug = $GLOBALS['tml_industry_slug'] ?? '';
$industryPages = tml_industry_pages();
$industries = tml_industries();
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
    $description = (string) ($v2['metaDescription'] ?? '');
    $canonicalPath = '/industries/' . $slug;

    $breadcrumbSchema = tml_schema_breadcrumb([
        ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
        ['name' => 'Industries', 'url' => TML_SITE_URL . '/industries'],
        ['name' => $name, 'url' => TML_SITE_URL . '/industries/' . $slug],
    ]);

    $faqItems = [];
    foreach ($v2['faqItems'] ?? [] as $f) {
        $faqItems[] = ['question' => $f['question'], 'answer' => $f['answer']];
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
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Get a Free Quote</a>
      <a href="/services" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Our Services</a>
    </div>
  </div>
</section>

<!-- INDUSTRY VISUAL SHOWCASE -->
<section class="relative w-full px-6 py-10 md:py-14 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 gap-4">
      <div class="aspect-video rounded-2xl overflow-hidden">
        <img src="/media/digital-marketing-creative.webp"
             alt="Digital marketing creative for <?= tml_e($name) ?>"
             loading="lazy"
             class="w-full h-full object-cover">
      </div>
      <div class="aspect-video rounded-2xl overflow-hidden">
        <img src="/media/brand-strategy-visual.webp"
             alt="Brand strategy visual for <?= tml_e($name) ?>"
             loading="lazy"
             class="w-full h-full object-cover">
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
<?php endif; ?>

<?php if (!empty($v2['challenges'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Challenges</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16"><?= tml_e($name) ?> Marketing Challenges<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 gap-5">
      <?php foreach ($v2['challenges'] as $i => $challenge) : ?>
      <div class="group relative p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
          <div class="w-2 h-2 rounded-full bg-[#ff4500]"></div>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3"><?= tml_e($challenge['title']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($challenge['description']) ?></p>
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
      <?php foreach ($v2['services'] as $i => $svc) : ?>
      <a href="<?= tml_e($svc['link'] ?? '/services') ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <div class="w-2.5 h-2.5 rounded-full bg-[#ff4500]"></div>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] transition-colors"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors"><?= tml_e($svc['name']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($svc['description']) ?></p>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($v2['content'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <div class="prose prose-invert prose-sm md:prose-base max-w-none
                prose-headings:font-semibold prose-headings:text-white prose-headings:tracking-tight
                prose-h2:text-2xl prose-h2:md:text-3xl prose-h2:mt-12 prose-h2:mb-6
                prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-4
                prose-p:text-white/45 prose-p:leading-[1.8]
                prose-li:text-white/45 prose-li:leading-[1.8]
                prose-strong:text-white/70 prose-strong:font-semibold
                prose-a:text-[#ff4500] prose-a:no-underline hover:prose-a:underline
                scroll-reveal">
      <?= $v2['content'] ?>
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
      <details class="group border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors">
        <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer list-none text-white font-medium text-sm md:text-base">
          <span class="pr-4"><?= tml_e($faq['question']) ?></span>
          <span class="text-white/30 text-xl flex-shrink-0">+</span>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/90 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['answer']) ?></div>
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
    $canonicalPath = '/industries/' . $slug;

    $breadcrumbSchema = tml_schema_breadcrumb([
        ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
        ['name' => 'Industries', 'url' => TML_SITE_URL . '/industries'],
        ['name' => $name, 'url' => TML_SITE_URL . '/industries/' . $slug],
    ]);

    $legacyFaqItems = [];
    foreach ($legacy['faqs'] ?? [] as $f) {
        $legacyFaqItems[] = ['question' => $f['question'], 'answer' => $f['answer']];
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
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors shadow-[0_0_30px_rgba(255,69,0,0.3)]">Get a Free Quote</a>
      <a href="/services" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Our Services</a>
    </div>
  </div>
</section>

<!-- INDUSTRY VISUAL SHOWCASE -->
<section class="relative w-full px-6 py-10 md:py-14 lg:px-12">
  <div class="relative mx-auto max-w-5xl">
    <div class="grid grid-cols-2 gap-4">
      <div class="aspect-video rounded-2xl overflow-hidden">
        <img src="/media/digital-marketing-creative.webp"
             alt="Digital marketing creative for <?= tml_e($name) ?>"
             loading="lazy"
             class="w-full h-full object-cover">
      </div>
      <div class="aspect-video rounded-2xl overflow-hidden">
        <img src="/media/brand-strategy-visual.webp"
             alt="Brand strategy visual for <?= tml_e($name) ?>"
             loading="lazy"
             class="w-full h-full object-cover">
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
<?php endif; ?>

<?php if (!empty($legacy['painPoints'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase section-label mb-4">Pain Points</p>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">Challenges We Solve<span class="text-[#ff4500]">.</span></h2>
    <div class="scroll-reveal scroll-delay-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($legacy['painPoints'] as $i => $point) : ?>
      <div class="group relative p-6 md:p-7 rounded-2xl border border-white/[0.06] bg-white/[0.02]">
        <div class="absolute top-5 right-5 text-3xl font-bold text-[#ff4500]/[0.06] select-none"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-8 h-[2px] bg-[#ff4500]/40 rounded-full mb-5"></div>
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
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12 md:mb-16">What You Get<span class="text-[#ff4500]">.</span></h2>
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
      <?php foreach ($linkedServices as $ls) : ?>
      <a href="/services/<?= tml_e($ls['slug']) ?>" class="group block h-full p-6 md:p-8 rounded-2xl glass-card">
        <div class="flex items-start justify-between mb-5">
          <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center group-hover:bg-[#ff4500]/20 transition-colors">
            <div class="w-2.5 h-2.5 rounded-full bg-[#ff4500]"></div>
          </div>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-white/20 group-hover:text-[#ff4500] transition-colors"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500] transition-colors"><?= tml_e($ls['data']['title']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed mb-4 line-clamp-3"><?= tml_e($ls['data']['description']) ?></p>
        <span class="text-xs text-[#ff4500] font-medium">Learn More &rarr;</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($legacy['content'])) : ?>
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <div class="prose prose-invert prose-sm md:prose-base max-w-none
                prose-headings:font-semibold prose-headings:text-white prose-headings:tracking-tight
                prose-h2:text-2xl prose-h2:md:text-3xl prose-h2:mt-12 prose-h2:mb-6
                prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-4
                prose-p:text-white/45 prose-p:leading-[1.8]
                prose-li:text-white/45 prose-li:leading-[1.8]
                prose-strong:text-white/70 prose-strong:font-semibold
                prose-a:text-[#ff4500] prose-a:no-underline hover:prose-a:underline
                scroll-reveal">
      <?= $legacy['content'] ?>
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
      <details class="group border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors">
        <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer list-none text-white font-medium text-sm md:text-base">
          <span class="pr-4"><?= tml_e($faq['question']) ?></span>
          <span class="text-white/30 text-xl flex-shrink-0">+</span>
        </summary>
        <div class="px-5 pb-5 md:px-6 md:pb-6 text-sm text-white/90 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['answer']) ?></div>
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
