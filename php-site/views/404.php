<?php
header('Location: /', true, 302);
exit;
$extraHead = [];
require TML_VIEWS . '/partials/head.php';
?>
<main class="min-h-screen bg-[#050505] text-white flex flex-col items-center justify-center px-6">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<div class="text-center py-32">
  <p class="text-[#ff4500] text-sm tracking-[0.2em] uppercase mb-4">404</p>
  <h1 class="text-3xl md:text-5xl font-medium mb-6">Page not found</h1>
  <p class="text-white/50 mb-8 max-w-md mx-auto">The page you're looking for doesn't exist or may have been moved.</p>
  <a href="/" class="inline-block px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Back to Home</a>
</div>
<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
