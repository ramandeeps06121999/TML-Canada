<footer class="relative w-full px-6 py-16 lg:px-12 bg-[#050505] overflow-hidden" aria-label="Site footer">
  <div class="absolute top-0 inset-x-0 h-[1px] bg-gradient-to-r from-transparent via-[#ff4500]/30 to-transparent"></div>
  <div class="pointer-events-none absolute inset-0 flex items-center justify-center select-none opacity-[0.02]" style="mask-image: radial-gradient(ellipse 60% 50% at 50% 50%, black, transparent);">
    <span class="text-[20rem] md:text-[28rem] font-black tracking-tighter text-white leading-none" aria-hidden="true">TML</span>
  </div>
  <div class="relative mx-auto max-w-7xl">
    <!-- Newsletter -->
    <div class="mb-14 flex flex-col sm:flex-row items-start sm:items-center gap-4">
      <p class="text-sm text-white/70 shrink-0">Get branding tips &amp; growth insights straight to your inbox.</p>
      <form action="/contact-us" method="get" class="flex items-center gap-2 w-full sm:w-auto">
        <input type="email" name="email" placeholder="Your email" class="px-4 py-3 rounded-lg bg-white/[0.04] border border-white/[0.08] text-sm text-white placeholder-white/25 focus:border-[#ff4500]/40 focus:outline-none focus:ring-1 focus:ring-[#ff4500]/20 transition-colors w-full sm:w-64" />
        <button type="submit" class="px-5 py-3 rounded-lg bg-[#ff4500]/10 border border-[#ff4500]/20 text-sm text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors whitespace-nowrap">Subscribe</button>
      </form>
    </div>
    <div class="w-full h-[1px] bg-gradient-to-r from-white/[0.06] via-white/[0.04] to-transparent mb-12"></div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
      <div>
        <p class="text-sm text-white font-semibold uppercase tracking-wider mb-4">Company</p>
        <ul class="space-y-0.5">
          <li><a href="/about-us" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">About Us</a></li>
          <li><a href="/services" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">Our Services</a></li>
          <li><a href="/portfolio" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">Portfolio</a></li>
          <li><a href="/contact-us" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">Contact Us</a></li>
          <li><a href="/free-tools" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">Free Tools</a></li>
          <li><a href="/careers" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">Careers</a></li>
        </ul>
      </div>
      <div>
        <p class="text-sm text-white font-semibold uppercase tracking-wider mb-4">Services</p>
        <ul class="space-y-0.5">
          <?php
          $fl = ['Branding' => '/services/branding', 'Google Ads' => '/services/google-ads', 'SEO' => '/services/seo', 'Web Development' => '/services/website-development', 'Social Media' => '/services/social-media', 'AI Influencer' => '/services/ai-influencer-management', 'Lead Generation' => '/services/lead-generation', 'Music Release' => '/services/music-release', 'Video Editing' => '/services/video-editing', 'Packaging' => '/services/branding-packaging', 'Graphic Design' => '/services/graphic-design'];
          foreach ($fl as $lab => $href) {
              echo '<li><a href="' . tml_e($href) . '" class="text-sm text-white/40 hover:text-white/90 block py-2 transition-colors">' . tml_e($lab) . '</a></li>';
          }
          ?>
        </ul>
      </div>
      <!-- Locations -->
      <div>
        <p class="text-sm text-white font-semibold uppercase tracking-wider mb-4">Locations</p>
        <ul class="space-y-0.5">
          <?php
          $cities = [
              ['Edmonton', '/services/seo-in-edmonton'],
              ['Calgary', '/services/seo-in-calgary'],
              ['Toronto', '/services/seo-in-toronto'],
              ['Vancouver', '/services/seo-in-vancouver'],
              ['Montreal', '/services/seo-in-montreal'],
              ['Ottawa', '/services/seo-in-ottawa'],
              ['Winnipeg', '/services/seo-in-winnipeg'],
              ['Halifax', '/services/seo-in-halifax'],
              ['Hamilton', '/services/seo-in-hamilton'],
              ['Victoria', '/services/seo-in-victoria'],
          ];
          foreach ($cities as $c) : ?>
          <li><a href="<?= tml_e($c[1]) ?>" class="text-sm text-white/40 hover:text-white/90 block py-1.5 transition-colors"><?= tml_e($c[0]) ?></a></li>
          <?php endforeach; ?>
        </ul>
        <a href="/services" class="text-xs text-[#ff4500] font-medium hover:underline mt-3 inline-block">All Services &rarr;</a>
      </div>
      <!-- Contact -->
      <div>
        <p class="text-sm text-white font-semibold uppercase tracking-wider mb-4">Contact</p>
        <p class="text-sm text-white/40"><a href="mailto:info@townmedialabs.ca" class="hover:text-[#ff4500] transition-colors">info@townmedialabs.ca</a></p>
        <p class="text-sm text-white/40 mt-2"><a href="tel:+14036048692" class="hover:text-[#ff4500] transition-colors">+1 (403) 604-8692</a></p>
        <p class="text-xs text-white/20 mt-4 max-w-md">11930 104 St NW, Edmonton, AB T5G 2K1, Canada</p>
        <div class="flex items-center gap-3 mt-4">
          <a href="#" class="text-white/25 hover:text-white/70 transition-colors" aria-label="Instagram">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
          </a>
          <a href="#" class="text-white/25 hover:text-white/70 transition-colors" aria-label="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="#" class="text-white/25 hover:text-white/70 transition-colors" aria-label="LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
        </div>
      </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t border-white/[0.06]">
      <p class="text-xs text-white/30">&copy; <?= (int) gmdate('Y') ?> TML Agency. All rights reserved.</p>
      <div class="flex gap-4 text-xs text-white/30">
        <a href="/privacy-policy" class="animated-underline hover:text-white/90 transition-colors">Privacy</a>
        <a href="/terms-of-service" class="animated-underline hover:text-white/90 transition-colors">Terms</a>
      </div>
    </div>
  </div>
</footer>
<!-- Back to Top -->
<button type="button" class="fixed bottom-6 right-6 z-50 w-10 h-10 rounded-full bg-[#ff4500]/20 border border-[#ff4500]/30 text-[#ff4500] flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 hover:bg-[#ff4500]/30" data-tml-btt aria-label="Back to top">
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 15l-6-6-6 6"/></svg>
</button>
