<?php
$title = 'Page Not Found | TML Agency';
$description = 'The page you are looking for does not exist. Browse our digital marketing services, portfolio, and blog.';
$keywords = 'page not found, TML Agency, digital marketing Edmonton';
$canonicalPath = '/404';
$extraHead = [];
http_response_code(404);
require TML_VIEWS . '/partials/head.php';
?>
<main class="min-h-screen bg-[#050505] text-white flex flex-col items-center justify-center px-6">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<div class="text-center py-32">
  <p class="text-[#ff4500] text-sm tracking-[0.2em] uppercase mb-4">404</p>
  <h1 class="text-3xl md:text-5xl font-medium mb-6">Page Not Found</h1>
  <p class="text-white/50 mb-8 max-w-md mx-auto">The page you're looking for doesn't exist or may have been moved.</p>
  <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
    <a href="/" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      Back to Home
    </a>
    <a href="/services" class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
      View Services
    </a>
  </div>
</div>
<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
