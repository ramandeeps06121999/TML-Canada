<?php
/** Shared nav (matches NavbarHome2 / InnerNavbar layout). */
$navPath = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
function tml_nav_active(string $navPath, string $href): string {
    $href = trim($href, '/');
    if ($href === '' && $navPath === '') return ' text-white';
    if ($href !== '' && ($navPath === $href || str_starts_with($navPath, $href . '/'))) return ' text-white';
    return '';
}
?>
<div class="fixed top-6 left-0 right-0 z-50 flex justify-center w-full px-4" data-tml-nav>
  <div class="flex items-center justify-between px-2 py-2 bg-black/40 backdrop-blur-xl border border-white/10 rounded-full w-full max-w-3xl shadow-2xl transition-all duration-500 ease-out" data-tml-nav-bar>
    <a href="/" class="flex items-center justify-center w-10 h-10 rounded-full bg-white/5 mx-2 overflow-hidden hover:bg-white/10 transition-colors"><img src="/logo.jpg" alt="TML Agency" width="40" height="40" class="w-full h-full object-cover rounded-full" /></a>
    <nav aria-label="Main navigation" class="hidden md:flex flex-1 items-center justify-center gap-6 text-[13px] font-medium text-white/70">
      <a href="/about-us" class="relative hover:text-white transition-colors duration-200 tracking-wide group<?= tml_nav_active($navPath, 'about-us') ?>">About<span class="absolute -bottom-1.5 left-0 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full<?= str_starts_with($navPath, 'about-us') ? ' !w-full' : '' ?>"></span></a>
      <div class="relative" data-tml-mega="services">
        <a href="/services" class="relative hover:text-white transition-colors duration-200 tracking-wide group flex items-center gap-1<?= tml_nav_active($navPath, 'services') ?>">Services
          <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="tml-chevron transition-transform duration-200"><path d="M6 9l6 6 6-6"/></svg>
          <span class="absolute -bottom-1.5 left-0 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full<?= str_starts_with($navPath, 'services') ? ' !w-full' : '' ?>"></span>
        </a>
      </div>
      <div class="relative" data-tml-mega="industries">
        <a href="/industries" class="relative hover:text-white transition-colors duration-200 tracking-wide group flex items-center gap-1<?= tml_nav_active($navPath, 'industries') ?>">Industries
          <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="tml-chevron transition-transform duration-200"><path d="M6 9l6 6 6-6"/></svg>
          <span class="absolute -bottom-1.5 left-0 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full<?= str_starts_with($navPath, 'industries') ? ' !w-full' : '' ?>"></span>
        </a>
      </div>
      <a href="/portfolio" class="relative hover:text-white transition-colors duration-200 tracking-wide group<?= tml_nav_active($navPath, 'portfolio') ?>">Portfolio<span class="absolute -bottom-1.5 left-0 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full<?= str_starts_with($navPath, 'portfolio') ? ' !w-full' : '' ?>"></span></a>
      <a href="/blog" class="relative hover:text-white transition-colors duration-200 tracking-wide group<?= tml_nav_active($navPath, 'blog') ?>">Blog<span class="absolute -bottom-1.5 left-0 w-0 h-[2px] rounded-full bg-[#ff4500] transition-all duration-300 group-hover:w-full<?= str_starts_with($navPath, 'blog') ? ' !w-full' : '' ?>"></span></a>
    </nav>
    <a href="/contact-us" class="hidden sm:inline-flex px-6 py-2.5 rounded-full bg-[#ff4500] hover:bg-[#e03e00] text-[13px] font-semibold text-white transition-all duration-200 ml-2 shadow-[0_0_20px_rgba(255,69,0,0.3)] hover:shadow-[0_0_28px_rgba(255,69,0,0.45)]">Get in Touch</a>
    <button type="button" class="md:hidden text-white ml-2 mr-2" data-tml-mobile-open aria-label="Open menu">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
    <button type="button" class="md:hidden text-white ml-2 mr-2 hidden" data-tml-mobile-close aria-label="Close menu">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>
  </div>
  <!-- Services Mega Menu -->
  <div class="hidden md:block absolute top-full left-1/2 -translate-x-1/2 max-w-[calc(100vw-2rem)] transition-all duration-200 ease-out opacity-0 -translate-y-2 pointer-events-none pt-2" style="width:820px" data-tml-mega-panel="services">
    <div class="flex justify-center mb-0"><div class="w-3 h-3 rotate-45 bg-black/80 border-l border-t border-white/10 -mb-1.5 z-10"></div></div>
    <div class="bg-black/80 backdrop-blur-2xl border border-white/10 rounded-2xl p-6 shadow-[0_20px_60px_rgba(0,0,0,0.5)] text-left">
      <div class="flex items-center justify-between mb-5">
        <p class="text-[10px] text-white/80 tracking-[0.2em] uppercase font-medium">Our Services</p>
        <a href="/services" class="text-[11px] text-[#ff4500] font-medium hover:underline">View All 39 Services &rarr;</a>
      </div>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;font-size:12px">
        <!-- Column 1: Branding & Development -->
        <div>
          <p class="text-[10px] text-white/40 uppercase mb-3" style="letter-spacing:0.1em;font-weight:600">Branding &amp; Design</p>
          <a href="/services/branding" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Branding</a>
          <a href="/services/graphic-design" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Graphic Design</a>
          <a href="/services/branding-packaging" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Packaging</a>
          <a href="/services/ux-ui-design" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>UX/UI Design</a>
          <p class="text-[10px] text-white/40 uppercase mb-3 mt-5" style="letter-spacing:0.1em;font-weight:600">Web &amp; App Dev</p>
          <a href="/services/web-design" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Web Design <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/website-development" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Web Development</a>
          <a href="/services/wordpress-development" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>WordPress</a>
          <a href="/services/shopify-development" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Shopify <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/mobile-app-development" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Mobile Apps <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/custom-software-development" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Custom Software <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <p class="text-[10px] text-white/40 uppercase mb-3 mt-5" style="letter-spacing:0.1em;font-weight:600">AI &amp; Technology</p>
          <a href="/services/ai-automation" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>AI Automation <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
        </div>
        <!-- Column 2: SEO & Paid -->
        <div>
          <p class="text-[10px] text-white/40 uppercase mb-3" style="letter-spacing:0.1em;font-weight:600">SEO &amp; Content</p>
          <a href="/services/seo" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>SEO</a>
          <a href="/services/local-seo" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Local SEO</a>
          <a href="/services/technical-seo" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Technical SEO</a>
          <a href="/services/geo-optimization" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>GEO <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/content-marketing" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Content Marketing</a>
          <a href="/services/link-building" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Link Building</a>
          <p class="text-[10px] text-white/40 uppercase mb-3 mt-5" style="letter-spacing:0.1em;font-weight:600">Paid Advertising</p>
          <a href="/services/google-ads" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Google Ads</a>
          <a href="/services/meta-ads" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Meta Ads</a>
          <a href="/services/tiktok-ads" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>TikTok Ads <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/linkedin-ads" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>LinkedIn Ads <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/microsoft-ads" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Microsoft Ads</a>
          <a href="/services/ppc-management" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>PPC Management</a>
        </div>
        <!-- Column 3: Social & Media -->
        <div>
          <p class="text-[10px] text-white/40 uppercase mb-3" style="letter-spacing:0.1em;font-weight:600">Social &amp; Growth</p>
          <a href="/services/social-media" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Social Media</a>
          <a href="/services/lead-generation" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Lead Generation</a>
          <a href="/services/email-marketing" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Email Marketing</a>
          <a href="/services/marketing-automation" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Automation <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/ecommerce-marketing" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>E-Commerce</a>
          <a href="/services/amazon-marketing" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Amazon <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <p class="text-[10px] text-white/40 uppercase mb-3 mt-5" style="letter-spacing:0.1em;font-weight:600">Media &amp; More</p>
          <a href="/services/video-production" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Video Production <span class="text-[9px] text-[#ff4500]/60 font-medium ml-auto shrink-0">NEW</span></a>
          <a href="/services/video-editing" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Video Editing</a>
          <a href="/services/ai-influencer-management" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>AI Influencer</a>
          <a href="/services/influencer-marketing" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Influencer Marketing</a>
          <a href="/services/music-release" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>Music Release</a>
          <a href="/services/online-reputation-management" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/[0.04] text-white/70 hover:text-white transition-colors"><span class="w-1 h-1 shrink-0 rounded-full bg-[#ff4500]/40"></span>ORM</a>
        </div>
      </div>
      <div class="mt-5 pt-4 border-t border-white/[0.06] flex items-center justify-between">
        <p class="text-[11px] text-white/80">39 services across branding, marketing, development &amp; AI technology.</p>
        <a href="/contact-us" class="text-[11px] px-4 py-2 rounded-full bg-[#ff4500]/10 border border-[#ff4500]/20 text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors">Free Consultation</a>
      </div>
    </div>
  </div>
  <!-- Industries Mega Menu -->
  <div class="hidden md:block absolute top-full left-1/2 -translate-x-1/2 w-[720px] max-w-[calc(100vw-2rem)] transition-all duration-200 ease-out opacity-0 -translate-y-2 pointer-events-none pt-2" data-tml-mega-panel="industries">
    <div class="flex justify-center mb-0"><div class="w-3 h-3 rotate-45 bg-black/80 border-l border-t border-white/10 -mb-1.5 z-10"></div></div>
    <div class="bg-black/80 backdrop-blur-2xl border border-white/10 rounded-2xl p-6 shadow-[0_20px_60px_rgba(0,0,0,0.5)] text-left">
      <div class="flex items-center justify-between mb-5">
        <p class="text-[10px] text-white/80 tracking-[0.2em] uppercase font-medium">Industries We Serve</p>
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
        <p class="text-[11px] text-white/80">We serve 39+ industries worldwide.</p>
        <a href="/contact-us" class="text-[11px] px-4 py-2 rounded-full bg-[#ff4500]/10 border border-[#ff4500]/20 text-[#ff4500] font-semibold hover:bg-[#ff4500]/20 transition-colors">Free Consultation</a>
      </div>
    </div>
  </div>
</div>
<div class="fixed inset-0 z-40 bg-black/60 md:hidden transition-opacity duration-300 opacity-0 pointer-events-none" data-tml-mobile-overlay></div>
<div class="fixed top-24 left-4 right-4 z-50 bg-black/90 backdrop-blur-xl border border-white/10 rounded-2xl p-5 max-h-[70vh] overflow-y-auto md:hidden transition-all duration-300 ease-out opacity-0 -translate-y-4 pointer-events-none" data-tml-mobile-menu>
  <a href="/about-us" class="block py-3 text-sm text-white/70 hover:text-white transition-colors<?= tml_nav_active($navPath, 'about-us') ?>">About</a>
  <details class="group">
    <summary class="flex items-center justify-between py-3 text-sm text-white/70 hover:text-white cursor-pointer list-none<?= tml_nav_active($navPath, 'services') ?>">Services <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transition-transform duration-200 group-open:rotate-180"><path d="M6 9l6 6 6-6"/></svg></summary>
    <div class="pl-4 pb-2 space-y-1">
      <a href="/services/branding" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Branding</a>
      <a href="/services/ai-automation" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">AI Automation</a>
      <a href="/services/custom-software-development" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Custom Software</a>
      <a href="/services/mobile-app-development" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Mobile Apps</a>
      <a href="/services/google-ads" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Google Ads</a>
      <a href="/services/seo" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">SEO</a>
      <a href="/services/website-development" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Web Development</a>
      <a href="/services/social-media" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Social Media</a>
      <a href="/services" class="block py-2 text-xs text-[#ff4500] font-medium">View All 39 &rarr;</a>
    </div>
  </details>
  <details class="group">
    <summary class="flex items-center justify-between py-3 text-sm text-white/70 hover:text-white cursor-pointer list-none<?= tml_nav_active($navPath, 'industries') ?>">Industries <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transition-transform duration-200 group-open:rotate-180"><path d="M6 9l6 6 6-6"/></svg></summary>
    <div class="pl-4 pb-2 space-y-1">
      <a href="/industries/healthcare-medical" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Healthcare</a>
      <a href="/industries/real-estate" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">Real Estate</a>
      <a href="/industries/e-commerce" class="block py-2 text-xs text-white/40 hover:text-white transition-colors">E-Commerce</a>
      <a href="/industries" class="block py-2 text-xs text-[#ff4500] font-medium">View All &rarr;</a>
    </div>
  </details>
  <a href="/portfolio" class="block py-3 text-sm text-white/70 hover:text-white transition-colors<?= tml_nav_active($navPath, 'portfolio') ?>">Portfolio</a>
  <a href="/blog" class="block py-3 text-sm text-white/70 hover:text-white transition-colors<?= tml_nav_active($navPath, 'blog') ?>">Blog</a>
  <a href="/contact-us" class="block mt-3 py-3 px-4 text-center text-sm font-semibold bg-[#ff4500] rounded-xl text-white hover:bg-[#e03e00] transition-colors">Get in Touch</a>
</div>
