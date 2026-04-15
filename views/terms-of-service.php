<?php
$title = 'Terms of Service | TML Agency';
$description = 'Read TML Agency\'s Terms of Service. Understand the terms and conditions that govern your use of our website and digital marketing services.';
$canonicalPath = '/terms-of-service';
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Terms of Service', 'url' => TML_SITE_URL . '/terms-of-service'],
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
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Terms of Service', 'href' => '/terms-of-service']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-3xl">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Legal</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-medium tracking-tight mb-4">Terms of Service<span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm text-white/30">Last Updated: March 2026</p>
  </div>
</section>

<section class="relative w-full px-6 pb-24 lg:px-12">
  <div class="relative mx-auto max-w-3xl space-y-12">

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">1. Acceptance of Terms</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>By accessing or using the TML Agency website and services, you agree to be bound by these Terms of Service and all applicable laws and regulations. If you do not agree with any part of these terms, you must not use our website or services.</p>
        <p>These terms apply to all visitors, users, clients, and any other persons who access or use our website. We reserve the right to update or modify these terms at any time, and your continued use of the site constitutes acceptance of any such changes.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">2. Our Services</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>TML Agency provides digital marketing, branding, web development, SEO, advertising, graphic design, social media management, and related professional services. The scope, deliverables, timelines, and fees for any project are defined in separate service agreements or proposals provided to clients.</p>
        <p>While we strive to deliver the best possible results, we do not guarantee specific outcomes such as search engine rankings, advertising returns, or revenue increases. Performance depends on many factors including market conditions, client cooperation, and third-party platform policies that are beyond our control.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">3. Intellectual Property</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>All content on this website — including but not limited to text, graphics, logos, images, icons, code, and design — is the property of TML Agency or its content suppliers and is protected by international copyright, trademark, and intellectual property laws.</p>
        <p>You may not reproduce, distribute, modify, create derivative works of, publicly display, or otherwise exploit any of our content without prior written consent. For client projects, intellectual property ownership and usage rights are governed by the terms of the individual service agreement between TML Agency and the client.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">4. User Conduct</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>When using our website, you agree not to engage in any activity that is unlawful, harmful, threatening, abusive, defamatory, or otherwise objectionable. You must not attempt to gain unauthorised access to our systems, interfere with the proper functioning of the website, or transmit any malicious code.</p>
        <p>You agree not to use automated systems such as bots, scrapers, or crawlers to access the site for any purpose without our express written permission. Any information you submit through forms on our website must be accurate and truthful. We reserve the right to restrict access to any user who violates these terms.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">5. Limitation of Liability</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>To the fullest extent permitted by applicable law, TML Agency and its directors, employees, partners, and affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of our website or services.</p>
        <p>Our total liability for any claim arising from our services shall not exceed the total amount paid by you to TML Agency during the twelve (12) months preceding the event giving rise to the claim. This limitation applies regardless of the theory of liability, whether based on warranty, contract, tort, or any other legal theory.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">6. Third-Party Links</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>Our website may contain links to third-party websites, services, or resources that are not owned or controlled by TML Agency. We provide these links for convenience and informational purposes only. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party sites.</p>
        <p>Accessing third-party links is at your own risk. We encourage you to review the terms and privacy policies of any website you visit through links on our site. The inclusion of any link does not imply endorsement, affiliation, or sponsorship by TML Agency.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">7. Modifications to Terms</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>We reserve the right to revise, amend, or update these Terms of Service at any time and at our sole discretion. When we make changes, we will update the "Last Updated" date at the top of this page. Material changes may also be communicated via email or through a notice on our website.</p>
        <p>It is your responsibility to review these terms periodically. Your continued use of the website or our services after any modifications indicates your acceptance of the revised terms. If you do not agree to the updated terms, you should discontinue use of the website.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">8. Governing Law</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>These Terms of Service shall be governed by and construed in accordance with the laws of the Province of Alberta and the federal laws of Canada applicable therein, without regard to its conflict of law provisions. Any disputes arising out of or relating to these terms or your use of our website and services shall be subject to the exclusive jurisdiction of the courts in Edmonton, Alberta, Canada.</p>
        <p>If any provision of these terms is found to be unenforceable or invalid by a court of competent jurisdiction, the remaining provisions shall continue in full force and effect. Our failure to enforce any right or provision of these terms shall not constitute a waiver of that right or provision.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">9. Contact Us</h2>
      <div class="space-y-4 text-sm text-white/75 leading-[1.8]">
        <p>If you have any questions or concerns about these Terms of Service, please contact us at:</p>
        <p class="text-white/70">TML Agency<br />11930 104 St NW, Edmonton, AB T5G 2K1, Canada<br />Email: <a href="mailto:info@townmedialabs.ca" class="text-[#ff4500] hover:underline">info@townmedialabs.ca</a><br />Phone: <a href="tel:+14036048692" class="text-[#ff4500] hover:underline">+1 (403) 604-8692</a></p>
      </div>
    </div>

  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
