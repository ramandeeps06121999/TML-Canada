<footer class="relative w-full px-6 py-20 lg:px-12 bg-[#050505] overflow-hidden" aria-label="Site footer">
  <div class="absolute top-0 inset-x-0 h-[1px] bg-gradient-to-r from-transparent via-[#ff4500]/30 to-transparent"></div>
  <div class="pointer-events-none absolute inset-0 flex items-center justify-center select-none opacity-[0.02]" style="mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black, transparent);">
    <span class="text-[20rem] md:text-[28rem] font-black tracking-tighter text-white leading-none" aria-hidden="true">TML</span>
  </div>
  <div class="relative mx-auto max-w-7xl">
    <!-- Newsletter -->
    <div class="mb-16 flex flex-col sm:flex-row items-start sm:items-center gap-4">
      <p class="text-sm text-white/70 shrink-0">Get branding tips &amp; growth insights straight to your inbox.</p>
      <form action="/contact-us" method="get" class="flex items-center gap-2 w-full sm:w-auto">
        <input type="email" name="email" placeholder="Your email" class="px-4 py-3 rounded-lg bg-white/[0.04] border border-white/[0.08] text-sm text-white placeholder-white/25 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 transition-colors w-full sm:w-64" />
        <button type="submit" class="px-5 py-3 rounded-lg bg-[#ff4500]/10 border border-[#ff4500]/20 text-sm text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors whitespace-nowrap">Subscribe</button>
      </form>
    </div>
    <div class="w-full h-[1px] bg-gradient-to-r from-white/[0.06] via-white/[0.04] to-transparent mb-14"></div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10 mb-14">
      <!-- Company -->
      <div>
        <p class="text-xs text-white font-semibold uppercase tracking-[0.15em] mb-5">Company</p>
        <ul class="space-y-1">
          <li><a href="/about-us" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">About Us</a></li>
          <li><a href="/portfolio" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Portfolio</a></li>
          <li><a href="/blog" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Blog</a></li>
          <li><a href="/contact-us" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Contact Us</a></li>
          <li><a href="/free-tools" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Free Tools</a></li>
          <li><a href="/careers" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Careers</a></li>
        </ul>
      </div>
      <!-- Services -->
      <div>
        <p class="text-xs text-white font-semibold uppercase tracking-[0.15em] mb-5">Services</p>
        <ul class="space-y-1">
          <li><a href="/services/seo" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">SEO</a></li>
          <li><a href="/services/web-design" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Web Design</a></li>
          <li><a href="/services/google-ads" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Google Ads</a></li>
          <li><a href="/services/social-media" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Social Media</a></li>
          <li><a href="/services/branding" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Branding</a></li>
          <li><a href="/services/website-development" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Web Development</a></li>
          <li><a href="/services/meta-ads" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Meta Ads</a></li>
          <li><a href="/services/content-marketing" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Content Marketing</a></li>
          <li><a href="/services/ai-automation" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">AI Automation</a></li>
        </ul>
        <a href="/services" class="text-xs text-[#ff4500] font-medium hover:underline mt-3 inline-block">All 39 Services &rarr;</a>
      </div>
      <!-- Top Cities -->
      <div>
        <p class="text-xs text-white font-semibold uppercase tracking-[0.15em] mb-5">Top Cities</p>
        <ul class="space-y-1">
          <?php
          $topCities = [
              ['Toronto', '/services/seo-in-toronto'],
              ['Calgary', '/services/seo-in-calgary'],
              ['Vancouver', '/services/seo-in-vancouver'],
              ['Edmonton', '/services/seo-in-edmonton'],
              ['Ottawa', '/services/seo-in-ottawa'],
              ['Montreal', '/services/seo-in-montreal'],
              ['Winnipeg', '/services/seo-in-winnipeg'],
              ['Halifax', '/services/seo-in-halifax'],
              ['Hamilton', '/services/seo-in-hamilton'],
              ['Victoria', '/services/seo-in-victoria'],
          ];
          foreach ($topCities as $c) : ?>
          <li><a href="<?= tml_e($c[1]) ?>" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors"><?= tml_e($c[0]) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <!-- Industries -->
      <div>
        <p class="text-xs text-white font-semibold uppercase tracking-[0.15em] mb-5">Industries</p>
        <ul class="space-y-1">
          <li><a href="/industries/healthcare-medical" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Healthcare</a></li>
          <li><a href="/industries/real-estate" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Real Estate</a></li>
          <li><a href="/industries/legal-law-firms" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Legal</a></li>
          <li><a href="/industries/e-commerce" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">E-Commerce</a></li>
          <li><a href="/industries/saas-technology" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">SaaS</a></li>
          <li><a href="/industries/construction-home-services" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors">Construction</a></li>
        </ul>
        <a href="/industries" class="text-xs text-[#ff4500] font-medium hover:underline mt-3 inline-block">All Industries &rarr;</a>
      </div>
      <!-- Contact -->
      <div>
        <p class="text-xs text-white font-semibold uppercase tracking-[0.15em] mb-5">Contact</p>
        <p class="text-sm text-white/40"><a href="mailto:info@townmedialabs.ca" class="hover:text-[#ff4500] transition-colors">info@townmedialabs.ca</a></p>
        <p class="text-sm text-white/40 mt-2"><a href="tel:+14036048692" class="hover:text-[#ff4500] transition-colors">+1 (403) 604-8692</a></p>
        <p class="text-xs text-white/20 mt-4 leading-relaxed">11930 104 St NW,<br>Edmonton, AB T5G 2K1,<br>Canada</p>
        <div class="flex items-center gap-3 mt-5">
          <a href="#" class="text-white/25 hover:text-[#ff4500] transition-colors duration-200 hover:scale-110 transform" aria-label="Instagram">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
          </a>
          <a href="#" class="text-white/25 hover:text-[#ff4500] transition-colors duration-200 hover:scale-110 transform" aria-label="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="#" class="text-white/25 hover:text-[#ff4500] transition-colors duration-200 hover:scale-110 transform" aria-label="LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="#" class="text-white/25 hover:text-[#ff4500] transition-colors duration-200 hover:scale-110 transform" aria-label="X (Twitter)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
        </div>
      </div>
    </div>
    <p class="max-w-3xl text-[11px] leading-relaxed text-white/25 mb-8">TML Agency is a full-service digital marketing agency in Canada offering SEO services, web design, Google Ads management, social media marketing, branding, and content marketing. Headquartered in Edmonton, we serve businesses across Toronto, Vancouver, Calgary, Ottawa, Montreal, and 60+ Canadian cities. Our SEO experts, web designers, and marketing consultants help businesses grow online.</p>
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t border-white/[0.06]">
      <p class="text-xs text-white/30">&copy; <?= (int) gmdate('Y') ?> TML Agency. All rights reserved.</p>
      <div class="flex gap-6 text-xs text-white/30">
        <a href="/privacy-policy" class="hover:text-white/90 transition-colors">Privacy Policy</a>
        <a href="/terms-of-service" class="hover:text-white/90 transition-colors">Terms of Service</a>
        <a href="/sitemap.xml" class="hover:text-white/90 transition-colors">Sitemap</a>
      </div>
    </div>
  </div>
</footer>
<!-- Back to Top -->
<button type="button" class="fixed bottom-6 right-6 z-50 w-10 h-10 rounded-full bg-[#ff4500]/20 border border-[#ff4500]/30 text-[#ff4500] flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 hover:bg-[#ff4500]/30 hover:scale-110" data-tml-btt aria-label="Back to top">
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 15l-6-6-6 6"/></svg>
</button>
