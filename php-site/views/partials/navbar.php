<?php
/** Shared nav (matches NavbarHome2 / InnerNavbar layout). */
?>
<div class="fixed top-6 left-0 right-0 z-50 flex justify-center w-full px-4" data-tml-nav>
  <div class="flex items-center justify-between px-2 py-2 bg-black/40 backdrop-blur-xl border border-white/10 rounded-full w-full max-w-3xl shadow-2xl">
    <a href="/" class="flex items-center justify-center w-10 h-10 rounded-full bg-white/5 mx-2 overflow-hidden hover:bg-white/10 transition-colors"><img src="/logo.jpg" alt="TML Agency" width="40" height="40" class="w-full h-full object-cover rounded-full" /></a>
    <nav aria-label="Main navigation" class="hidden md:flex flex-1 items-center justify-center gap-6 text-[13px] font-medium text-white/70">
      <a href="/about-us" class="relative hover:text-white transition-colors tracking-wide group">About<span class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full group-hover:left-0 group-hover:translate-x-0"></span></a>
      <div class="relative" data-tml-mega="services">
        <a href="/services" class="relative hover:text-white transition-colors tracking-wide group flex items-center gap-1">Services
          <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="tml-chevron transition-transform duration-200"><path d="M6 9l6 6 6-6"/></svg>
          <span class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full group-hover:left-0 group-hover:translate-x-0"></span>
        </a>
      </div>
      <div class="relative" data-tml-mega="industries">
        <a href="/industries" class="relative hover:text-white transition-colors tracking-wide group flex items-center gap-1">Industries
          <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="tml-chevron transition-transform duration-200"><path d="M6 9l6 6 6-6"/></svg>
          <span class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full group-hover:left-0 group-hover:translate-x-0"></span>
        </a>
      </div>
      <a href="/portfolio" class="relative hover:text-white transition-colors tracking-wide group">Portfolio<span class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full group-hover:left-0 group-hover:translate-x-0"></span></a>
      <a href="/blog" class="relative hover:text-white transition-colors tracking-wide group">Blog<span class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full group-hover:left-0 group-hover:translate-x-0"></span></a>
    </nav>
    <a href="/contact-us" class="hidden sm:inline-flex px-6 py-2.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/5 text-[13px] font-semibold text-white transition-all ml-2">Get in Touch</a>
    <button type="button" class="md:hidden text-white ml-2 mr-2" data-tml-mobile-open aria-label="Open menu">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <button type="button" class="md:hidden text-white ml-2 mr-2 hidden" data-tml-mobile-close aria-label="Close menu">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>
  </div>
  <!-- Services Mega Menu -->
  <div class="hidden md:block absolute top-full left-1/2 -translate-x-1/2 w-[860px] max-w-[calc(100vw-2rem)] transition-all duration-200 ease-out opacity-0 -translate-y-2 pointer-events-none pt-2" data-tml-mega-panel="services">
    <div class="flex justify-center mb-0"><div class="w-3 h-3 rotate-45 bg-black/80 border-l border-t border-white/10 -mb-1.5 z-10"></div></div>
    <div class="bg-black/80 backdrop-blur-2xl border border-white/10 rounded-2xl p-6 shadow-[0_20px_60px_rgba(0,0,0,0.5)] text-left">
      <div class="flex items-center justify-between mb-5">
        <p class="text-[10px] text-white/30 tracking-[0.2em] uppercase font-medium">Our Services</p>
        <a href="/services" class="text-[11px] text-[#ff4500] font-medium hover:underline">View All 36 Services &rarr;</a>
      </div>
      <div class="grid grid-cols-6 gap-4 text-[11px]">
        <div><p class="text-[9px] text-white/40 tracking-[0.1em] uppercase font-semibold mb-2">Branding</p>
          <a href="/services/branding" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Branding</a>
          <a href="/services/graphic-design" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Graphic Design</a>
          <a href="/services/branding-packaging" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Packaging</a>
          <a href="/services/ux-ui-design" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">UX/UI Design</a>
        </div>
        <div><p class="text-[9px] text-white/40 tracking-[0.1em] uppercase font-semibold mb-2">SEO & Content</p>
          <a href="/services/seo" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">SEO</a>
          <a href="/services/local-seo" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Local SEO</a>
          <a href="/services/technical-seo" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Technical SEO</a>
          <a href="/services/geo-optimization" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">GEO <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/content-marketing" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Content Marketing</a>
          <a href="/services/link-building" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Link Building</a>
        </div>
        <div><p class="text-[9px] text-white/40 tracking-[0.1em] uppercase font-semibold mb-2">Paid Ads</p>
          <a href="/services/google-ads" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Google Ads</a>
          <a href="/services/meta-ads" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Meta Ads</a>
          <a href="/services/tiktok-ads" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">TikTok Ads <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/linkedin-ads" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">LinkedIn Ads <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/microsoft-ads" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Microsoft Ads</a>
          <a href="/services/ppc-management" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">PPC Management</a>
        </div>
        <div><p class="text-[9px] text-white/40 tracking-[0.1em] uppercase font-semibold mb-2">Development</p>
          <a href="/services/web-design" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Web Design <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/website-development" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Web Development</a>
          <a href="/services/wordpress-development" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">WordPress</a>
          <a href="/services/shopify-development" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Shopify <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/mobile-app-development" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Mobile Apps <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
        </div>
        <div><p class="text-[9px] text-white/40 tracking-[0.1em] uppercase font-semibold mb-2">Social & Growth</p>
          <a href="/services/social-media" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Social Media</a>
          <a href="/services/lead-generation" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Lead Generation</a>
          <a href="/services/email-marketing" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Email Marketing</a>
          <a href="/services/marketing-automation" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Automation <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/ecommerce-marketing" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">E-Commerce</a>
          <a href="/services/amazon-marketing" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Amazon <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
        </div>
        <div><p class="text-[9px] text-white/40 tracking-[0.1em] uppercase font-semibold mb-2">Media & More</p>
          <a href="/services/video-production" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Video Production <span class="text-[8px] text-[#ff4500]/60">NEW</span></a>
          <a href="/services/video-editing" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Video Editing</a>
          <a href="/services/ai-influencer-management" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">AI Influencer</a>
          <a href="/services/influencer-marketing" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Influencer Marketing</a>
          <a href="/services/music-release" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">Music Release</a>
          <a href="/services/online-reputation-management" class="block py-1.5 px-1.5 rounded hover:bg-white/[0.04] text-white/60 hover:text-white">ORM</a>
        </div>
      </div>
      <div class="mt-4 pt-4 border-t border-white/[0.06] flex items-center justify-between">
        <p class="text-[11px] text-white/30">36 services across branding, marketing &amp; development.</p>
        <a href="/contact-us" class="text-[11px] px-4 py-2 rounded-full bg-[#ff4500]/10 border border-[#ff4500]/20 text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors">Free Consultation</a>
      </div>
    </div>
  </div>
  <!-- Industries Mega Menu -->
  <div class="hidden md:block absolute top-full left-1/2 -translate-x-1/2 w-[720px] max-w-[calc(100vw-2rem)] transition-all duration-200 ease-out opacity-0 -translate-y-2 pointer-events-none pt-2" data-tml-mega-panel="industries">
    <div class="flex justify-center mb-0"><div class="w-3 h-3 rotate-45 bg-black/80 border-l border-t border-white/10 -mb-1.5 z-10"></div></div>
    <div class="bg-black/80 backdrop-blur-2xl border border-white/10 rounded-2xl p-6 shadow-[0_20px_60px_rgba(0,0,0,0.5)] text-left">
      <div class="flex items-center justify-between mb-5">
        <p class="text-[10px] text-white/30 tracking-[0.2em] uppercase font-medium">Industries We Serve</p>
        <a href="/industries" class="text-[11px] text-[#ff4500] font-medium hover:underline">View All Industries &rarr;</a>
      </div>
      <div class="grid grid-cols-4 gap-5 text-[12px]">
        <div><p class="text-[10px] text-white/40 uppercase mb-3">Healthcare</p>
          <a href="/industries/healthcare-medical" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70"><span class="w-1 h-1 rounded-full bg-[#ff4500]/40"></span>Healthcare</a>
          <a href="/industries/real-estate" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70"><span class="w-1 h-1 rounded-full bg-[#ff4500]/40"></span>Real Estate</a>
        </div>
        <div><p class="text-[10px] text-white/40 uppercase mb-3">Professional</p>
          <a href="/industries/legal-law-firms" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70"><span class="w-1 h-1 rounded-full bg-[#ff4500]/40"></span>Legal</a>
          <a href="/industries/e-commerce" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70"><span class="w-1 h-1 rounded-full bg-[#ff4500]/40"></span>E-Commerce</a>
        </div>
        <div><p class="text-[10px] text-white/40 uppercase mb-3">Home Services</p>
          <a href="/industries/construction-home-services" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70"><span class="w-1 h-1 rounded-full bg-[#ff4500]/40"></span>Construction</a>
        </div>
        <div><p class="text-[10px] text-white/40 uppercase mb-3">Tech</p>
          <a href="/industries/saas-technology" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70"><span class="w-1 h-1 rounded-full bg-[#ff4500]/40"></span>SaaS</a>
        </div>
      </div>
      <div class="mt-5 pt-4 border-t border-white/[0.06] flex items-center justify-between">
        <p class="text-[11px] text-white/30">We serve 39+ industries worldwide.</p>
        <a href="/contact-us" class="text-[11px] px-4 py-2 rounded-full bg-[#ff4500]/10 border border-[#ff4500]/20 text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors">Free Consultation</a>
      </div>
    </div>
  </div>
</div>
<div class="hidden fixed inset-0 z-40 bg-black/60 md:hidden" data-tml-mobile-overlay></div>
<div class="hidden fixed top-24 left-4 right-4 z-50 bg-black/90 backdrop-blur-xl border border-white/10 rounded-2xl p-5 max-h-[70vh] overflow-y-auto md:hidden" data-tml-mobile-menu>
  <a href="/about-us" class="block py-3 text-sm text-white/70 hover:text-white">About</a>
  <details class="group">
    <summary class="flex items-center justify-between py-3 text-sm text-white/70 hover:text-white cursor-pointer list-none">Services <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transition-transform group-open:rotate-180"><path d="M6 9l6 6 6-6"/></svg></summary>
    <div class="pl-4 pb-2 space-y-1">
      <a href="/services/branding" class="block py-2 text-xs text-white/40 hover:text-white">Branding</a>
      <a href="/services/google-ads" class="block py-2 text-xs text-white/40 hover:text-white">Google Ads</a>
      <a href="/services/seo" class="block py-2 text-xs text-white/40 hover:text-white">SEO</a>
      <a href="/services/website-development" class="block py-2 text-xs text-white/40 hover:text-white">Web Development</a>
      <a href="/services/social-media" class="block py-2 text-xs text-white/40 hover:text-white">Social Media</a>
      <a href="/services/lead-generation" class="block py-2 text-xs text-white/40 hover:text-white">Lead Generation</a>
      <a href="/services" class="block py-2 text-xs text-[#ff4500] font-medium">View All &rarr;</a>
    </div>
  </details>
  <details class="group">
    <summary class="flex items-center justify-between py-3 text-sm text-white/70 hover:text-white cursor-pointer list-none">Industries <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transition-transform group-open:rotate-180"><path d="M6 9l6 6 6-6"/></svg></summary>
    <div class="pl-4 pb-2 space-y-1">
      <a href="/industries/healthcare-medical" class="block py-2 text-xs text-white/40 hover:text-white">Healthcare</a>
      <a href="/industries/real-estate" class="block py-2 text-xs text-white/40 hover:text-white">Real Estate</a>
      <a href="/industries/e-commerce" class="block py-2 text-xs text-white/40 hover:text-white">E-Commerce</a>
      <a href="/industries" class="block py-2 text-xs text-[#ff4500] font-medium">View All &rarr;</a>
    </div>
  </details>
  <a href="/portfolio" class="block py-3 text-sm text-white/70 hover:text-white">Portfolio</a>
  <a href="/blog" class="block py-3 text-sm text-white/70 hover:text-white">Blog</a>
  <a href="/contact-us" class="block mt-3 py-3 px-4 text-center text-sm font-semibold bg-[#ff4500]/20 border border-[#ff4500]/30 rounded-xl text-white">Get in Touch</a>
</div>
