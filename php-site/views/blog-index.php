<?php
$title = 'Blog | TML Agency — Marketing, Branding & AI Insights';
$description = 'Expert insights on digital marketing, branding, SEO, AI, social media, and ad strategy from TML Agency.';
$canonicalPath = '/blog';
$blogs = tml_blog_articles();
uksort($blogs, static function ($a, $b) use ($blogs) {
    return strcmp($blogs[$b]['date'] ?? '', $blogs[$a]['date'] ?? '');
});
$extraHead = [];
require TML_VIEWS . '/partials/head.php';
?>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<div class="px-6 pt-28 md:pt-32 lg:px-12 max-w-7xl mx-auto">
  <?php
  $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Blog', 'href' => '/blog']];
  require TML_VIEWS . '/partials/breadcrumbs.php';
  ?>
</div>
<section class="px-6 pb-20 lg:px-12 max-w-7xl mx-auto">
  <h1 class="text-4xl md:text-5xl font-medium text-white mb-4 scroll-reveal">Blog<span class="text-[#ff4500]">.</span></h1>
  <p class="text-white/90 max-w-2xl mb-12 scroll-reveal">Marketing, branding &amp; growth insights from our team.</p>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    <?php foreach ($blogs as $slug => $article) : ?>
    <a href="/blog/<?= tml_e($slug) ?>" class="group block p-6 md:p-8 rounded-2xl glass-card">
      <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/10 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-4"><?= tml_e($article['category']) ?></span>
      <h2 class="text-lg font-semibold text-white mb-2 group-hover:text-[#ff4500] leading-snug"><?= tml_e($article['title']) ?></h2>
      <p class="text-sm text-white/35 line-clamp-2 mb-3"><?= tml_e($article['metaDescription']) ?></p>
      <span class="text-xs text-white/25"><?= tml_e($article['date']) ?> · <?= tml_e($article['readTime']) ?></span>
    </a>
    <?php endforeach; ?>
  </div>
</section>
<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
