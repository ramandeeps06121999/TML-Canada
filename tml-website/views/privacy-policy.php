<?php
$title = 'Privacy Policy | TML Agency';
$description = 'Read TML Agency\'s Privacy Policy. Learn how we collect, use, and protect your personal information when you use our website and services.';
$canonicalPath = '/privacy-policy';
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Privacy Policy', 'url' => TML_SITE_URL . '/privacy-policy'],
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
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Privacy Policy', 'href' => '/privacy-policy']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-24 lg:px-12 overflow-hidden">
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none"></div>
  <div class="relative mx-auto max-w-3xl">
    <p class="text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 section-label">Legal</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-medium tracking-tight mb-4">Privacy Policy<span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm text-white/30">Last Updated: March 2026</p>
  </div>
</section>

<section class="relative w-full px-6 pb-24 lg:px-12">
  <div class="relative mx-auto max-w-3xl space-y-12">

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">1. Information We Collect</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>We collect information you provide directly to us when you fill out a contact form, subscribe to our newsletter, request a quote, or otherwise communicate with us. This may include your name, email address, phone number, company name, and any other details you choose to share.</p>
        <p>We also automatically collect certain technical information when you visit our website, including your IP address, browser type, operating system, referring URLs, pages viewed, time spent on each page, and other standard web analytics data. This information is collected through cookies, server logs, and similar technologies.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">2. How We Use Your Information</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>We use the information we collect to respond to your enquiries and provide the services you request, to send you marketing communications (with your consent), to improve our website and services, and to analyse usage patterns so we can deliver a better user experience.</p>
        <p>We may also use your information to personalise content, to detect and prevent fraud or abuse, to comply with legal obligations, and to enforce our terms and policies. We will never sell your personal information to third parties.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">3. Cookies &amp; Analytics</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>Our website uses cookies and similar tracking technologies to enhance your browsing experience and gather usage data. Cookies are small text files stored on your device that help us remember your preferences and understand how you interact with our site.</p>
        <p>We use Google Analytics and similar analytics services to collect aggregate data about website traffic and user behaviour. These tools may use cookies to track visitor interactions. You can control cookie preferences through your browser settings. Disabling cookies may limit certain features of our website.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">4. Data Sharing</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>We do not sell, trade, or rent your personal information to third parties. We may share your data with trusted service providers who assist us in operating our website, conducting our business, or servicing you — provided those parties agree to keep this information confidential.</p>
        <p>We may also disclose your information when we believe disclosure is appropriate to comply with law, enforce our site policies, or protect our or others' rights, property, or safety. In the event of a business transfer such as a merger or acquisition, your information may be transferred as part of the business assets.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">5. Data Security</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>We implement reasonable technical and organisational security measures to protect your personal information against unauthorised access, alteration, disclosure, or destruction. These measures include encrypted data transmission (SSL/TLS), secure server infrastructure, and restricted access to personal data.</p>
        <p>However, no method of internet transmission or electronic storage is completely secure. While we strive to use commercially acceptable means to protect your information, we cannot guarantee its absolute security. You are responsible for maintaining the confidentiality of any account credentials you use on our site.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">6. Your Rights</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>Depending on your jurisdiction, you may have the right to access, correct, update, or delete the personal information we hold about you. You may also have the right to object to or restrict certain processing activities, and the right to data portability.</p>
        <p>If you have subscribed to our marketing communications, you can opt out at any time by clicking the unsubscribe link in any email or by contacting us directly. We will process your request in accordance with applicable data protection laws. To exercise any of these rights, please contact us using the details provided below.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">7. Changes to This Policy</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technologies, legal requirements, or other factors. When we make material changes, we will update the "Last Updated" date at the top of this page and, where appropriate, notify you via email or a prominent notice on our website.</p>
        <p>We encourage you to review this page periodically to stay informed about how we protect your information. Your continued use of our website after any changes to this policy constitutes your acceptance of those changes.</p>
      </div>
    </div>

    <div class="scroll-reveal">
      <h2 class="text-xl md:text-2xl font-semibold text-white mb-4">8. Contact Us</h2>
      <div class="space-y-4 text-sm text-white/45 leading-[1.8]">
        <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us at:</p>
        <p class="text-white/70">TML Agency<br />11930 104 St NW, Edmonton, AB T5G 2K1, Canada<br />Email: <a href="mailto:info@townmedialabs.ca" class="text-[#ff4500] hover:underline">info@townmedialabs.ca</a><br />Phone: <a href="tel:+14036048692" class="text-[#ff4500] hover:underline">+1 (403) 604-8692</a></p>
      </div>
    </div>

  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
