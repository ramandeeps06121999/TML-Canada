<?php
$title = 'About TML Agency | Leading Digital Marketing Agency in Edmonton, Canada';
$description = 'Discover TML Agency — Edmonton\'s top digital marketing, branding & web development agency. 500+ clients, 70+ experts, 15+ years.';
$canonicalPath = '/about-us';

$aboutFaqs = [
    ['q' => 'When was TML Agency founded?', 'a' => 'TML Agency was founded in 2010. Over the past 15+ years we have grown from a small branding studio into a full-service digital marketing agency headquartered in Edmonton, Canada, serving 500+ clients worldwide.'],
    ['q' => 'How many people work at TML Agency?', 'a' => 'Our team comprises 70+ specialists across branding, SEO, performance marketing, web development, design, and project management — working from our Edmonton headquarters and serving clients across all of Canada.'],
    ['q' => 'What services does TML Agency offer?', 'a' => 'We offer end-to-end digital marketing services including branding & identity design, SEO, Google Ads, social media marketing, web development, graphic design, packaging design, lead generation, AI influencer management, video editing, and music release distribution.'],
    ['q' => 'Does TML Agency work with international clients?', 'a' => 'Absolutely. While we are headquartered in Edmonton, Alberta, we serve clients across Canada, the United States, the United Kingdom, Australia, New Zealand, and the UAE. Our team ensures seamless communication across time zones.'],
];

$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'About Us', 'url' => TML_SITE_URL . '/about-us'],
]);
$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'TML Agency',
    'url' => TML_SITE_URL,
    'logo' => TML_SITE_URL . '/og-image.png',
    'description' => $description,
    'foundingDate' => '2010',
    'foundingLocation' => 'Edmonton, Canada',
    'numberOfEmployees' => ['@type' => 'QuantitativeValue', 'minValue' => 70],
    'address' => TML_SCHEMA_PROVIDER['address'],
    'telephone' => '+14036048692',
    'sameAs' => [],
];
$faqSchema = tml_schema_faq($aboutFaqs);
$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($orgSchema),
    tml_json_ld_script($faqSchema),
];
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- Breadcrumbs -->
<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'About Us', 'href' => '/about-us']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<!-- HERO -->
<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="section-label text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 mx-auto w-fit">Who We Are</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">About <span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">TML Agency</span><span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/50 leading-relaxed max-w-2xl mx-auto mb-10">We are a full-service digital marketing and branding agency headquartered in Edmonton, Canada. For over 15 years, we have helped ambitious businesses build unforgettable brands, dominate search rankings, and scale revenue through data-driven marketing.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] shadow-[0_0_30px_rgba(255,69,0,0.3)]">Work With Us</a>
      <a href="/services" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Explore Services</a>
    </div>
  </div>
</section>

<!-- OUR STORY -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Our Story</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono">01</span>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 scroll-reveal scroll-delay-1">
      <div class="space-y-6">
        <p class="text-sm md:text-base text-white/50 leading-relaxed">TML Agency was founded in 2010 with a simple belief: every business, no matter its size, deserves world-class branding and marketing. What started as a small design studio has grown into one of Canada&rsquo;s most trusted full-service digital agencies, headquartered in Edmonton, Alberta.</p>
        <p class="text-sm md:text-base text-white/50 leading-relaxed">Over the past decade and a half, we have expanded our capabilities from branding and graphic design into SEO, Google Ads, web development, social media marketing, AI-powered influencer management, and lead generation &mdash; becoming a true one-stop partner for growth.</p>
      </div>
      <div class="space-y-6">
        <p class="text-sm md:text-base text-white/50 leading-relaxed">Today, our team of <strong class="text-white/80 font-semibold">70+ specialists</strong> serves <strong class="text-white/80 font-semibold">500+ clients</strong> across India, the US, Canada, the UK, Australia, New Zealand, and the UAE. From startups launching their first product to enterprises looking to dominate new markets, we bring the same level of strategic depth and creative excellence.</p>
        <p class="text-sm md:text-base text-white/50 leading-relaxed">Our <strong class="text-white/80 font-semibold">98% client retention rate</strong> speaks for itself. We don&rsquo;t just deliver campaigns &mdash; we build lasting partnerships. Every strategy is backed by data, every design is intentional, and every result is measurable.</p>
      </div>
    </div>
  </div>
</section>

<!-- OUR WORK SPEAKS -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Our Work Speaks</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 scroll-reveal scroll-delay-1">
      <div class="aspect-[4/3] rounded-xl overflow-hidden group">
        <img src="/media/creative-design-portfolio.webp"
             alt="Creative design portfolio — TML Agency work"
             loading="lazy"
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
      </div>
      <div class="aspect-[4/3] rounded-xl overflow-hidden group">
        <img src="/media/social-media-content-mockup.png"
             alt="Social media content mockup — TML Agency work"
             loading="lazy"
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
      </div>
      <div class="aspect-[4/3] rounded-xl overflow-hidden group">
        <img src="/media/billboard-advertising-campaign.jpg"
             alt="Billboard advertising campaign — TML Agency work"
             loading="lazy"
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
      </div>
    </div>
  </div>
</section>

<!-- MISSION & VISION -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Mission &amp; Vision</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono">02</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 scroll-reveal scroll-delay-1">
      <!-- Mission -->
      <div class="glass-card rounded-2xl p-8 md:p-10 relative overflow-hidden group">
        <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-transparent"></div>
        <div class="w-14 h-14 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-6 group-hover:bg-[#ff4500]/20 transition-colors">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
        </div>
        <h3 class="text-2xl font-semibold text-white mb-4">Our Mission</h3>
        <p class="text-sm text-white/50 leading-relaxed">To deliver measurable results through strategic branding and performance marketing. We exist to help businesses of all sizes build powerful brands, attract the right customers, and achieve sustainable growth &mdash; all driven by data, creativity, and an unwavering commitment to excellence.</p>
      </div>
      <!-- Vision -->
      <div class="glass-card rounded-2xl p-8 md:p-10 relative overflow-hidden group">
        <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-transparent"></div>
        <div class="w-14 h-14 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-6 group-hover:bg-[#ff4500]/20 transition-colors">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        <h3 class="text-2xl font-semibold text-white mb-4">Our Vision</h3>
        <p class="text-sm text-white/50 leading-relaxed">To become India&rsquo;s most trusted digital marketing partner &mdash; a name synonymous with innovation, transparency, and transformative results. We envision a future where every business has access to world-class marketing, and we are building that future, one brand at a time.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE TML -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-4 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Why Choose TML</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono">03</span>
    </div>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12">The numbers speak<span class="text-[#ff4500]">.</span></h2>
    <?php
    $stats = [
        ['target' => 500, 'suffix' => '+', 'label' => 'Clients Served'],
        ['target' => 70,  'suffix' => '+', 'label' => 'Team Members'],
        ['target' => 15,  'suffix' => '+', 'label' => 'Years Experience'],
        ['target' => 500, 'suffix' => '+', 'label' => 'Projects Delivered'],
        ['target' => 100, 'suffix' => '%', 'label' => 'Google Partner'],
        ['target' => 24,  'suffix' => '/7', 'label' => 'Support Available'],
    ];
    ?>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 scroll-reveal scroll-delay-1">
      <?php foreach ($stats as $i => $s) : ?>
      <div class="glass-card text-center p-6 rounded-2xl">
        <div class="text-2xl md:text-3xl font-bold text-white mb-1"><span data-counter-target="<?= $s['target'] ?>" data-counter-suffix="<?= tml_e($s['suffix']) ?>">0</span></div>
        <p class="text-xs text-white/35 tracking-wide uppercase"><?= tml_e($s['label']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- OUR VALUES -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-4 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Our Values</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono">04</span>
    </div>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12">What drives us<span class="text-[#ff4500]">.</span></h2>
    <?php
    $values = [
        [
            'title' => 'Innovation First',
            'desc' => 'We stay ahead of industry trends, adopting the latest tools, platforms, and strategies so our clients always have a competitive edge.',
            'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>',
        ],
        [
            'title' => 'Results-Driven',
            'desc' => 'We measure everything. Every campaign, every design, every strategy is tied to clear KPIs and measurable business outcomes.',
            'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        ],
        [
            'title' => 'Transparency',
            'desc' => 'No hidden fees, no vague reports. We believe in open communication, honest timelines, and full visibility into your campaigns.',
            'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
        ],
        [
            'title' => 'Client-Centric',
            'desc' => 'Your success is our success. We treat every client as a partner, investing deeply in understanding your goals, audience, and industry.',
            'icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>',
        ],
    ];
    ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 scroll-reveal scroll-delay-1">
      <?php foreach ($values as $i => $val) : ?>
      <div class="group glass-card rounded-2xl p-6 md:p-8 relative">
        <div class="absolute top-6 right-6 text-[10px] text-white/20 font-mono"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 transition-colors">
          <?= $val['icon'] ?>
        </div>
        <h3 class="text-lg font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors"><?= tml_e($val['title']) ?></h3>
        <p class="text-sm text-white/45 leading-relaxed"><?= tml_e($val['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- LEADERSHIP -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-4 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Leadership</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
      <span class="text-xs text-white/20 font-mono">05</span>
    </div>
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-12">Meet the team<span class="text-[#ff4500]">.</span></h2>
    <?php
    $team = [
        ['name' => 'Arvinder Singh', 'role' => 'Owner & Founder', 'initials' => 'AS'],
        ['name' => 'Raman Makkar', 'role' => 'SEO Lead', 'initials' => 'RM'],
        ['name' => 'Taran', 'role' => 'Sales Director', 'initials' => 'TA'],
        ['name' => 'Harman', 'role' => 'Project Manager', 'initials' => 'HA'],
        ['name' => 'Cristi', 'role' => 'Senior Designer', 'initials' => 'CR'],
        ['name' => 'Tammy', 'role' => 'Product Designer', 'initials' => 'TM'],
        ['name' => 'Mr Hoop', 'role' => 'Branding Specialist', 'initials' => 'MH'],
    ];
    ?>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5 scroll-reveal scroll-delay-1">
      <?php foreach ($team as $member) : ?>
      <div class="glass-card rounded-2xl p-6 md:p-8 text-center group hover:border-[#ff4500]/20 transition-colors">
        <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-gradient-to-br from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 flex items-center justify-center group-hover:shadow-[0_0_30px_rgba(255,69,0,0.3)] transition-shadow">
          <span class="text-xl font-bold text-white tracking-tight"><?= tml_e($member['initials']) ?></span>
        </div>
        <h3 class="text-base font-semibold text-white mb-1 group-hover:text-[#ff4500] transition-colors"><?= tml_e($member['name']) ?></h3>
        <p class="text-xs text-white/40 tracking-wide"><?= tml_e($member['role']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-16 md:py-24 px-6 lg:px-12 overflow-hidden">
  <div class="max-w-3xl mx-auto">
    <div class="text-center mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">FAQ</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">About TML Agency<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="space-y-3">
      <?php foreach ($aboutFaqs as $i => $faq) : ?>
      <div class="border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors" data-tml-faq>
        <button type="button" class="w-full flex items-center justify-between p-5 md:p-6 text-left" data-tml-faq-toggle>
          <span class="flex items-center gap-4"><span class="text-xs font-mono text-[#ff4500]/40"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span><span class="text-white font-medium text-sm md:text-base pr-4"><?= tml_e($faq['q']) ?></span></span>
          <span class="text-white/30 text-xl flex-shrink-0 transition-transform" data-tml-faq-icon>+</span>
        </button>
        <div class="overflow-hidden transition-all duration-300 ease-out" style="max-height: 0;" data-tml-faq-body>
          <div class="px-5 pb-5 md:px-6 md:pb-6 pl-14 md:pl-16 text-sm text-white/45 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e($faq['a']) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-[#050505] via-[#ff4500]/[0.03] to-[#050505] pointer-events-none"></div>
  <div class="relative mx-auto max-w-3xl text-center scroll-reveal">
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Ready to grow your business<span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/45 leading-relaxed mb-10 max-w-xl mx-auto">Partner with Edmonton&rsquo;s most results-driven agency. Let&rsquo;s build a strategy that delivers real, measurable growth for your brand.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] shadow-[0_0_30px_rgba(255,69,0,0.3)]">Get a Free Consultation</a>
      <a href="tel:+14036048692" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Call +1 (403) 604-8692</a>
    </div>
  </div>
</section>

</main>
<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
