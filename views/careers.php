<?php
$title = 'Marketing Careers Canada | Join Our Agency';
$description = 'Join TML Agency — hiring AI developers, video editors, graphic designers & social media managers. Flexible hours, health benefits & creative freedom. Apply now.';
$keywords = 'careers TML Agency, marketing jobs Canada, digital marketing careers, graphic designer jobs Edmonton, social media manager jobs, creative agency careers Alberta';
$canonicalPath = '/careers';

$perks = [
    ['title' => 'Flexible Hours', 'desc' => 'Work when you\'re most productive. We trust our team to manage their time.', 'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>'],
    ['title' => 'Health Insurance', 'desc' => 'Comprehensive medical coverage for you and your family from day one.', 'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>'],
    ['title' => 'Learning Budget', 'desc' => 'Annual stipend for courses, conferences, and certifications to keep growing.', 'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>'],
    ['title' => 'Team Outings', 'desc' => 'Regular team events, off-sites, and celebrations to keep the vibe alive.', 'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>'],
    ['title' => 'Fast Growth', 'desc' => 'Clear career paths with rapid promotions based on impact, not tenure.', 'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>'],
    ['title' => 'Creative Freedom', 'desc' => 'Pitch ideas, experiment boldly, and own your projects from start to finish.', 'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>'],
];

$positions = [
    ['title' => 'AI Developer', 'department' => 'Technology', 'type' => 'Full-time', 'location' => 'Edmonton + Remote', 'desc' => 'Build and deploy AI-powered tools, automation pipelines, and machine learning models that power our marketing solutions. You\'ll work at the intersection of engineering and creativity, shipping products that impact hundreds of brands.'],
    ['title' => 'AI Prompt Engineer', 'department' => 'Technology', 'type' => 'Full-time', 'location' => 'Edmonton + Remote', 'desc' => 'Design, test, and optimize prompts for large language models. You\'ll create AI workflows that enhance content creation, client strategy, and internal operations across the agency.'],
    ['title' => 'Video Editor', 'department' => 'Creative', 'type' => 'Full-time', 'location' => 'Edmonton', 'desc' => 'Edit short-form and long-form video content for social media, ads, and brand campaigns. Proficiency in Premiere Pro, After Effects, and a strong sense of pacing and storytelling required.'],
    ['title' => 'Graphic Designer', 'department' => 'Creative', 'type' => 'Full-time', 'location' => 'Edmonton', 'desc' => 'Create stunning visuals for brands — logos, social media creatives, packaging, presentations, and marketing collateral. Strong skills in Illustrator, Photoshop, and Figma expected.'],
    ['title' => 'Product & Web UI/UX Designer', 'department' => 'Design', 'type' => 'Full-time', 'location' => 'Edmonton + Remote', 'desc' => 'Design intuitive, conversion-focused user interfaces for websites and digital products. You\'ll own the full design process from wireframes to pixel-perfect handoff in Figma.'],
    ['title' => 'Social Media Handler', 'department' => 'Marketing', 'type' => 'Full-time', 'location' => 'Edmonton', 'desc' => 'Manage day-to-day social media presence for multiple client brands. Plan content calendars, write captions, schedule posts, engage with audiences, and track performance metrics.'],
    ['title' => 'Promotion Handler', 'department' => 'Marketing', 'type' => 'Full-time', 'location' => 'Edmonton', 'desc' => 'Execute paid and organic promotional campaigns across channels. Coordinate influencer outreach, manage ad placements, and optimize campaign performance for maximum reach and ROI.'],
    ['title' => 'Senior Project Manager', 'department' => 'Operations', 'type' => 'Full-time', 'location' => 'Edmonton', 'desc' => 'Lead cross-functional teams to deliver client projects on time and within scope. You\'ll manage timelines, resources, and stakeholder communication across branding, web, and marketing engagements.'],
    ['title' => 'Senior Client Relationship Manager', 'department' => 'Operations', 'type' => 'Full-time', 'location' => 'Edmonton', 'desc' => 'Own the client experience end-to-end. Build lasting relationships, identify growth opportunities, handle escalations, and ensure every client feels like our most important partner.'],
];

$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Careers', 'url' => TML_SITE_URL . '/careers'],
]);

// JobPosting schema for each open position
$jobPostings = [];
foreach ($positions as $pos) {
    $jobPostings[] = [
        '@context' => 'https://schema.org',
        '@type' => 'JobPosting',
        'title' => $pos['title'],
        'description' => $pos['desc'],
        'hiringOrganization' => [
            '@type' => 'Organization',
            'name' => 'TML Agency',
            'sameAs' => TML_SITE_URL,
            'logo' => TML_SITE_URL . '/og-image.png',
        ],
        'jobLocation' => [
            '@type' => 'Place',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '11930 104 St NW',
                'addressLocality' => 'Edmonton',
                'addressRegion' => 'Alberta',
                'postalCode' => 'T5G 2K1',
                'addressCountry' => 'CA',
            ],
        ],
        'employmentType' => $pos['type'] === 'Full-time' ? 'FULL_TIME' : ($pos['type'] === 'Part-time' ? 'PART_TIME' : 'OTHER'),
        'applicantLocationRequirements' => [
            '@type' => 'Country',
            'name' => 'CA',
        ],
        'baseSalary' => [
            '@type' => 'PriceSpecification',
            'priceCurrency' => 'CAD',
            'price' => '70000-120000',
        ],
    ];
}

$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
];
// Add JobPosting schemas
foreach ($jobPostings as $jp) {
    $extraHead[] = tml_json_ld_script($jp);
}
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Careers', 'href' => '/careers']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<!-- HERO -->
<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">We&apos;re hiring</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Join Our Digital Marketing Agency Team<span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/90 max-w-2xl mx-auto mb-10">Careers at TML Agency — a 70+ member team of designers, developers, strategists, and creators building brands that matter. If you&apos;re driven, curious, and ready to do the best work of your career at a leading Canadian marketing agency — we want to hear from you.</p>
    <a href="#positions" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">View Open Positions <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12l7 7 7-7"/></svg></a>
  </div>
</section>

<!-- PERKS -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="text-center mb-16 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">Perks &amp; Benefits</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Why Work at a Top Digital Marketing Agency<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($perks as $i => $perk) : ?>
      <div class="glass-card rounded-2xl p-6 md:p-8 scroll-reveal scroll-delay-<?= ($i % 3) + 1 ?>">
        <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center text-[#ff4500] mb-5"><?= $perk['icon'] ?></div>
        <h3 class="text-lg font-semibold text-white mb-2"><?= tml_e($perk['title']) ?></h3>
        <p class="text-sm text-white/75 leading-relaxed"><?= tml_e($perk['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- OPEN POSITIONS -->
<section id="positions" class="relative w-full px-6 py-20 md:py-28 lg:px-12 overflow-hidden">
  <div class="relative mx-auto max-w-3xl">
    <div class="text-center mb-16 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">Open Roles</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Open Marketing Agency Jobs in Edmonton<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="space-y-3">
      <?php foreach ($positions as $i => $pos) : ?>
      <div class="border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] transition-colors" data-tml-faq>
        <button type="button" class="w-full flex items-center justify-between p-5 md:p-6 text-left" data-tml-faq-toggle>
          <span class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
            <span class="text-white font-medium text-sm md:text-base"><?= tml_e($pos['title']) ?></span>
            <span class="flex items-center gap-2">
              <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/10 text-[#ff4500] rounded-full px-2.5 py-0.5 font-semibold"><?= tml_e($pos['department']) ?></span>
              <span class="inline-block text-[11px] tracking-wider uppercase bg-white/[0.04] text-white/40 rounded-full px-2.5 py-0.5 font-medium"><?= tml_e($pos['type']) ?></span>
            </span>
          </span>
          <span class="text-white/80 text-xl flex-shrink-0 transition-transform" data-tml-faq-icon>+</span>
        </button>
        <div class="overflow-hidden transition-all duration-300 ease-out" style="max-height: 0;" data-tml-faq-body>
          <div class="px-5 pb-5 md:px-6 md:pb-6 border-t border-white/[0.04] pt-4">
            <div class="flex items-center gap-2 text-xs text-white/80 mb-3">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <?= tml_e($pos['location']) ?>
            </div>
            <p class="text-sm text-white/75 leading-relaxed mb-5"><?= tml_e($pos['desc']) ?></p>
            <a href="mailto:careers@townmedialabs.ca?subject=Application: <?= tml_e(rawurlencode($pos['title'])) ?>" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Apply Now <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-3xl text-center">
    <h2 class="scroll-reveal text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Don&apos;t See Your Marketing Role<span class="text-[#ff4500]">?</span></h2>
    <p class="text-sm md:text-base text-white/90 leading-relaxed mb-10 max-w-xl mx-auto">We&apos;re always looking for talented digital marketing professionals. Send us your resume and tell us how you&apos;d contribute to TML Agency.</p>
    <a href="mailto:careers@townmedialabs.ca?subject=General Application" class="glow-button active:scale-[0.97] transition-transform px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Send Your Resume</a>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
