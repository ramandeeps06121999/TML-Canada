<?php
$title = 'Contact Us | Free Marketing Consultation Canada';
$description = 'Contact TML Agency for a free marketing consultation. Expert branding, SEO, Google Ads, social media & web development across Canada. Reply in 2-4 hours.';
$keywords = 'contact TML Agency, free consultation Canada, digital marketing quote, SEO consultation Canada, branding consultation, marketing agency contact Edmonton';
$canonicalPath = '/contact-us';

$contactFaqs = [
    ['q' => 'How quickly will I hear back after submitting the form?', 'a' => 'We respond to all enquiries within 2-4 business hours during office hours (Mon-Fri 9 AM - 6 PM MST). For urgent requests, call us directly at +1 (403) 604-8692 and our team will assist you immediately.'],
    ['q' => 'Is the initial consultation really free?', 'a' => 'Yes, 100%. We offer a no-obligation, free consultation where we review your current marketing, discuss your goals, and outline a recommended strategy. There is no pressure to sign up and you walk away with actionable insights either way.'],
    ['q' => 'What information should I prepare before the call?', 'a' => 'It helps if you can share your website URL, a brief description of your business, your target audience, current marketing challenges, and your approximate budget range. The more context you provide, the more tailored our recommendations will be.'],
    ['q' => 'Do you work with clients outside Edmonton?', 'a' => 'Absolutely. While headquartered in Edmonton, we serve clients across all of Canada, the United States, the United Kingdom, Australia, New Zealand, and the UAE. We schedule calls across time zones to ensure seamless communication.'],
];

$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Contact Us', 'url' => TML_SITE_URL . '/contact'],
]);
$faqSchema = tml_schema_faq($contactFaqs);
$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($faqSchema),
];
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- Breadcrumbs -->
<div class="px-6 pt-24 md:pt-28 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Contact Us', 'href' => '/contact']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>

<!-- HERO -->
<section class="relative w-full px-6 pt-12 pb-16 md:pt-16 md:pb-20 lg:px-12 overflow-hidden">
  <!-- Grid Background (behind everything, faded at edges) -->
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%);"></div>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] rounded-full bg-[#ff4500]/[0.04] blur-[150px] pointer-events-none z-[2]"></div>
  <div class="relative mx-auto max-w-5xl text-center">
    <p class="section-label text-[11px] text-white/40 tracking-[0.25em] uppercase mb-8 mx-auto w-fit">Contact Us</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-medium tracking-tight mb-6">Contact Our <span class="bg-gradient-to-r from-[#ff4500] via-[#ff6b35] to-[#ff4500]/60 bg-clip-text text-transparent">Digital Marketing Agency</span><span class="text-[#ff4500]">.</span></h1>
    <p class="text-sm md:text-base text-white/50 leading-relaxed max-w-2xl mx-auto">Whether you need a brand refresh, want to dominate Google, or are ready to scale your marketing &mdash; we&rsquo;re here to help. Get in touch and let&rsquo;s talk strategy.</p>
  </div>
</section>

<!-- CONTACT INFO CARDS -->
<section class="relative w-full px-6 pb-16 lg:px-12">
  <!-- Section divider dots -->
  <div class="flex items-center justify-center gap-1.5 mb-12">
    <span class="w-1 h-1 rounded-full bg-[#ff4500]/30"></span>
    <span class="w-1.5 h-1.5 rounded-full bg-[#ff4500]/50"></span>
    <span class="w-1 h-1 rounded-full bg-[#ff4500]/30"></span>
  </div>
  <div class="relative mx-auto max-w-7xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 scroll-reveal">
      <!-- Edmonton Office -->
      <div class="glass-card rounded-2xl p-6 md:p-8 group hover:border-[#ff4500]/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_8px_30px_rgba(255,69,0,0.06)]">
        <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 group-hover:scale-110 transition-all duration-300">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h3 class="text-base font-semibold text-white mb-2">Edmonton Marketing Agency Office</h3>
        <p class="text-sm text-white/75 leading-relaxed">11930 104 St NW, Edmonton, AB T5G 2K1, Canada</p>
      </div>
      <!-- Phone -->
      <a href="tel:+14036048692" class="glass-card rounded-2xl p-6 md:p-8 group hover:border-[#ff4500]/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_8px_30px_rgba(255,69,0,0.06)] block">
        <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 group-hover:scale-110 transition-all duration-300">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        </div>
        <h3 class="text-base font-semibold text-white mb-2">Call Our Marketing Team</h3>
        <p class="text-sm text-white/75 group-hover:text-[#ff4500] transition-colors">+1 (403) 604-8692</p>
      </a>
      <!-- Email -->
      <a href="mailto:info@townmedialabs.ca" class="glass-card rounded-2xl p-6 md:p-8 group hover:border-[#ff4500]/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_8px_30px_rgba(255,69,0,0.06)] block">
        <div class="w-12 h-12 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-5 group-hover:bg-[#ff4500]/20 group-hover:scale-110 transition-all duration-300">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h3 class="text-base font-semibold text-white mb-2">Email Our Experts</h3>
        <p class="text-sm text-white/75 group-hover:text-[#ff4500] transition-colors">info@townmedialabs.ca</p>
      </a>
      <!-- WhatsApp Live Chat -->
      <a href="https://wa.me/14036048692?text=Hi%20TML%20Agency%2C%20I%27d%20like%20to%20discuss%20a%20project" target="_blank" rel="noopener" class="glass-card rounded-2xl p-6 md:p-8 group hover:border-[#25D366]/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_8px_30px_rgba(37,211,102,0.06)] block">
        <div class="w-12 h-12 rounded-xl bg-[#25D366]/10 flex items-center justify-center mb-5 group-hover:bg-[#25D366]/20 group-hover:scale-110 transition-all duration-300">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="#25D366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </div>
        <h3 class="text-base font-semibold text-white mb-2">Live Chat Support</h3>
        <p class="text-sm text-white/75 group-hover:text-[#25D366] transition-colors">Chat on WhatsApp</p>
      </a>
    </div>
  </div>
</section>

<!-- CONTACT FORM + SIDEBAR -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Send a Message</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
      <!-- Form (2/3 width) -->
      <div class="lg:col-span-2 scroll-reveal scroll-delay-1">
        <form id="tml-contact-form" class="glass-card rounded-2xl p-6 md:p-10 space-y-6 relative overflow-hidden">
          <!-- Subtle top accent line -->
          <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#ff4500]/30 to-transparent"></div>
          <input type="hidden" name="access_key" value="6e00848e-bf4c-4362-880d-56eb0e58715a" />
          <input type="hidden" name="subject" value="New Contact Form Submission - TML Agency" />
          <input type="hidden" name="from_name" value="TML Website Contact Form" />
          <input type="checkbox" name="botcheck" class="hidden" style="display:none" />
          <!-- Success message (hidden by default) -->
          <div id="tml-form-success" class="hidden">
            <div class="flex flex-col items-center justify-center py-12 text-center">
              <div class="w-16 h-16 rounded-full bg-[#ff4500]/10 border border-[#ff4500]/20 flex items-center justify-center mb-5">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
              </div>
              <h3 class="text-xl font-semibold text-white mb-2">Message Sent!</h3>
              <p class="text-sm text-white/75">We'll get back to you within 2-4 business hours.</p>
            </div>
          </div>
          <!-- Error message (hidden by default) -->
          <div id="tml-form-error" class="hidden">
            <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-sm text-red-400 text-center">
              Something went wrong. Please try again or email us at info@townmedialabs.ca
            </div>
          </div>

          <div id="tml-form-fields">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
              <label for="contact-name" class="block text-xs text-white/50 tracking-wide uppercase mb-2">Name <span class="text-[#ff4500]">*</span></label>
              <input type="text" id="contact-name" name="name" required placeholder="Your full name" class="w-full px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.08] text-sm text-white placeholder-white/25 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 focus:shadow-[0_0_15px_rgba(255,69,0,0.08)] focus:bg-white/[0.06] transition-all duration-200" />
            </div>
            <!-- Email -->
            <div>
              <label for="contact-email" class="block text-xs text-white/50 tracking-wide uppercase mb-2">Email <span class="text-[#ff4500]">*</span></label>
              <input type="email" id="contact-email" name="email" required placeholder="you@company.com" class="w-full px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.08] text-sm text-white placeholder-white/25 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 focus:shadow-[0_0_15px_rgba(255,69,0,0.08)] focus:bg-white/[0.06] transition-all duration-200" />
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Phone -->
            <div>
              <label for="contact-phone" class="block text-xs text-white/50 tracking-wide uppercase mb-2">Phone</label>
              <input type="tel" id="contact-phone" name="phone" placeholder="+1 (403) XXX-XXXX" class="w-full px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.08] text-sm text-white placeholder-white/25 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 focus:shadow-[0_0_15px_rgba(255,69,0,0.08)] focus:bg-white/[0.06] transition-all duration-200" />
            </div>
            <!-- Service -->
            <div>
              <label for="contact-service" class="block text-xs text-white/50 tracking-wide uppercase mb-2">Service Interested In</label>
              <select id="contact-service" name="service" class="w-full px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.08] text-sm text-white/70 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 focus:shadow-[0_0_15px_rgba(255,69,0,0.08)] focus:bg-white/[0.06] transition-all duration-200 appearance-none" style="background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.3)' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center;">
                <option value="">Select a service</option>
                <option value="Branding">Branding</option>
                <option value="Graphic Design">Graphic Design</option>
                <option value="Packaging Design">Packaging Design</option>
                <option value="Google Ads">Google Ads</option>
                <option value="SEO">SEO</option>
                <option value="Lead Generation">Lead Generation</option>
                <option value="Web Development">Web Development</option>
                <option value="Social Media Marketing">Social Media Marketing</option>
                <option value="AI Influencer Management">AI Influencer Management</option>
                <option value="Video Editing">Video Editing</option>
                <option value="Music Release">Music Release</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <!-- Budget -->
          <div>
            <label for="contact-budget" class="block text-xs text-white/50 tracking-wide uppercase mb-2">Budget Range</label>
            <select id="contact-budget" name="budget" class="w-full px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.08] text-sm text-white/70 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 focus:shadow-[0_0_15px_rgba(255,69,0,0.08)] focus:bg-white/[0.06] transition-all duration-200 appearance-none" style="background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.3)' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center;">
              <option value="">Select your budget</option>
              <option value="$500 - $2,000">$500 - $2,000</option>
              <option value="$2,000 - $5,000">$2,000 - $5,000</option>
              <option value="$5,000 - $10,000">$5,000 - $10,000</option>
              <option value="$10,000 - $25,000">$10,000 - $25,000</option>
              <option value="$25,000 - $50,000">$25,000 - $50,000</option>
              <option value="$50,000+">$50,000+</option>
            </select>
          </div>

          <!-- Message -->
          <div>
            <label for="contact-message" class="block text-xs text-white/50 tracking-wide uppercase mb-2">Message <span class="text-[#ff4500]">*</span></label>
            <textarea id="contact-message" name="message" required rows="5" placeholder="Tell us about your project, goals, and timeline..." class="w-full px-4 py-3 rounded-xl bg-white/[0.04] border border-white/[0.08] text-sm text-white placeholder-white/25 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 focus:shadow-[0_0_15px_rgba(255,69,0,0.08)] focus:bg-white/[0.06] transition-all duration-200 resize-y min-h-[120px]"></textarea>
          </div>

          <!-- Submit -->
          <div class="flex items-center justify-between gap-4 pt-2">
            <p class="text-[11px] text-white/25 leading-relaxed hidden sm:block">We&rsquo;ll respond within 2-4 business hours.</p>
            <button type="submit" id="tml-submit-btn" class="glow-button active:scale-[0.97] transition-all duration-200 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] hover:shadow-[0_0_40px_rgba(255,69,0,0.4)] shadow-[0_0_30px_rgba(255,69,0,0.3)] whitespace-nowrap hover:scale-[1.02]">
              Send Message
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="inline-block ml-2 -mt-0.5"><path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4z"/></svg>
            </button>
          </div>
          </div><!-- /tml-form-fields -->
        </form>
        <script>
        (function() {
          var form = document.getElementById('tml-contact-form');
          var fields = document.getElementById('tml-form-fields');
          var success = document.getElementById('tml-form-success');
          var error = document.getElementById('tml-form-error');
          var btn = document.getElementById('tml-submit-btn');
          if (!form) return;

          form.addEventListener('submit', function(e) {
            e.preventDefault();
            error.classList.add('hidden');
            btn.disabled = true;
            btn.textContent = 'Sending...';

            var data = new FormData(form);

            fetch('https://api.web3forms.com/submit', {
              method: 'POST',
              body: data
            })
            .then(function(res) { return res.json(); })
            .then(function(json) {
              if (json.success) {
                fields.classList.add('hidden');
                success.classList.remove('hidden');
                // Reset and show form again after 4 seconds
                setTimeout(function() {
                  form.reset();
                  success.classList.add('hidden');
                  fields.classList.remove('hidden');
                  btn.disabled = false;
                  btn.textContent = 'Send Message';
                }, 4000);
              } else {
                throw new Error('Submission failed');
              }
            })
            .catch(function() {
              error.classList.remove('hidden');
              btn.disabled = false;
              btn.textContent = 'Send Message';
            });
          });
        })();
        </script>
      </div>

      <!-- Sidebar (1/3 width) -->
      <div class="space-y-6 scroll-reveal scroll-delay-2">
        <!-- Office Hours -->
        <div class="glass-card rounded-2xl p-6 md:p-8 relative overflow-hidden">
          <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div>
          <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-4">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <h3 class="text-base font-semibold text-white mb-4">Agency Office Hours</h3>
          <ul class="space-y-3 text-sm">
            <li class="flex items-center justify-between">
              <span class="text-white/75">Monday - Friday</span>
              <span class="text-white/70 font-medium">10:00 AM - 7:00 PM</span>
            </li>
            <li class="flex items-center justify-between">
              <span class="text-white/75">Saturday</span>
              <span class="text-white/70 font-medium">10:00 AM - 5:00 PM</span>
            </li>
            <li class="flex items-center justify-between">
              <span class="text-white/75">Sunday</span>
              <span class="text-[#ff4500]/70 font-medium">Closed</span>
            </li>
          </ul>
        </div>

        <!-- Quick Response -->
        <div class="glass-card rounded-2xl p-6 md:p-8 relative overflow-hidden">
          <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div>
          <div class="w-10 h-10 rounded-xl bg-[#ff4500]/10 flex items-center justify-center mb-4">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff4500" stroke-width="1.5"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
          </div>
          <h3 class="text-base font-semibold text-white mb-2">Quick Response Guarantee</h3>
          <p class="text-sm text-white/75 leading-relaxed">We typically respond within <strong class="text-white/70 font-semibold">2-4 business hours</strong>. For urgent matters, call us directly.</p>
        </div>

        <!-- Social Links -->
        <div class="glass-card rounded-2xl p-6 md:p-8 relative overflow-hidden">
          <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#ff4500]/20 to-transparent"></div>
          <h3 class="text-base font-semibold text-white mb-4">Follow TML Agency</h3>
          <div class="flex items-center gap-3">
            <a href="#" class="w-10 h-10 rounded-xl bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-white/40 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/[0.06] hover:scale-110 transition-all duration-200" aria-label="Instagram">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-xl bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-white/40 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/[0.06] hover:scale-110 transition-all duration-200" aria-label="Facebook">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-xl bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-white/40 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/[0.06] hover:scale-110 transition-all duration-200" aria-label="LinkedIn">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-xl bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-white/40 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/[0.06] hover:scale-110 transition-all duration-200" aria-label="X (Twitter)">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
            <a href="#" class="w-10 h-10 rounded-xl bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-white/40 hover:text-[#ff4500] hover:border-[#ff4500]/30 hover:bg-[#ff4500]/[0.06] hover:scale-110 transition-all duration-200" aria-label="YouTube">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.43z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-16 md:py-24 px-6 lg:px-12 overflow-hidden">
  <div class="max-w-3xl mx-auto">
    <div class="text-center mb-12 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase mb-4 mx-auto w-fit">FAQ</p>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white">Digital Marketing Agency &mdash; Frequently Asked Questions<span class="text-[#ff4500]">.</span></h2>
    </div>
    <div class="space-y-3">
      <?php foreach ($contactFaqs as $i => $faq) : ?>
      <div class="border border-white/[0.06] rounded-xl overflow-hidden bg-white/[0.02] hover:border-white/[0.1] hover:bg-white/[0.03] hover:shadow-[0_4px_20px_rgba(255,69,0,0.04)] transition-all duration-300" data-tml-faq>
        <button type="button" class="w-full flex items-center justify-between p-5 md:p-6 text-left" data-tml-faq-toggle>
          <span class="flex items-center gap-4"><span class="text-xs font-mono text-[#ff4500]/40"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#ff4500] flex-shrink-0"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg><span class="text-white font-medium text-sm md:text-base pr-4"><?= tml_e(($faq['q'] ?? $faq['question'] ?? '')) ?></span></span>
          <span class="text-white/30 text-xl flex-shrink-0 transition-transform" data-tml-faq-icon>+</span>
        </button>
        <div class="overflow-hidden transition-all duration-300 ease-out" style="max-height: 0;" data-tml-faq-body>
          <div class="px-5 pb-5 md:px-6 md:pb-6 pl-14 md:pl-16 text-sm text-white/75 leading-relaxed border-t border-white/[0.04] pt-4"><?= tml_e(($faq['a'] ?? $faq['answer'] ?? '')) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- GOOGLE MAP -->
<section class="relative w-full px-6 py-16 md:py-24 lg:px-12 bg-[#080808] overflow-hidden">
  <div class="relative mx-auto max-w-7xl">
    <div class="flex items-center gap-4 mb-8 scroll-reveal">
      <p class="section-label text-xs text-white/40 tracking-[0.25em] uppercase">Find Us</p>
      <div class="flex-1 h-[1px] bg-white/[0.06]"></div>
    </div>
    <div class="scroll-reveal scroll-delay-1 rounded-2xl overflow-hidden border border-white/[0.06]" style="filter: grayscale(100%) invert(92%) contrast(83%) brightness(80%);">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2370.5!2d-113.4937!3d53.5461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53a0224580deff23%3A0x411fa00c4af6155d!2s11930%20104%20St%20NW%2C%20Edmonton%2C%20AB%20T5G%202K1!5e0!3m2!1sen!2sca!4v1700000000000!5m2!1sen!2sca" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="TML Agency Office - 11930 104 St NW, Edmonton, Alberta"></iframe>
    </div>
  </div>
</section>

<!-- BOTTOM CTA -->
<section class="relative w-full px-6 py-20 md:py-28 lg:px-12 overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-[#050505] via-[#ff4500]/[0.03] to-[#050505] pointer-events-none"></div>
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black 20%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black 20%, transparent 70%);"></div>
  <div class="relative mx-auto max-w-3xl text-center scroll-reveal">
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-medium text-white mb-6">Schedule a Free Marketing Consultation<span class="text-[#ff4500]">.</span></h2>
    <p class="text-sm md:text-base text-white/75 leading-relaxed mb-10 max-w-xl mx-auto">Skip the form. Call us directly and speak with a strategist who can help you right away.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="tel:+14036048692" class="glow-button active:scale-[0.97] transition-transform inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] shadow-[0_0_30px_rgba(255,69,0,0.3)]">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Call +1 (403) 604-8692
      </a>
      <a href="mailto:info@townmedialabs.ca" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors inline-flex items-center gap-2">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        info@townmedialabs.ca
      </a>
    </div>
  </div>
</section>

</main>
<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
