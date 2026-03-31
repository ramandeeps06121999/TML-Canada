<?php
$slug = $GLOBALS['tml_blog_slug'] ?? '';
$blogs = tml_blog_articles();
$article = $blogs[$slug] ?? null;
if (!$article) {
    require TML_VIEWS . '/404.php';
    exit;
}
$title = $article['metaTitle'] ?? $article['title'];
$description = $article['metaDescription'];
$keywords = is_array($article['keywords'] ?? null)
    ? implode(', ', $article['keywords'])
    : ($article['metaKeywords'] ?? ($article['category'] . ', ' . strtolower($article['title']) . ', digital marketing, TML Agency blog, marketing tips'));
$canonicalPath = '/blog/' . $slug;
$ogType = 'article';

// Convert human-readable date (e.g. "January 15, 2025") to ISO-8601 for meta tags
$rawDate = $article['date'] ?? '';
$parsedDate = $rawDate !== '' ? date_create($rawDate) : false;
$articlePublishedTime = $parsedDate ? $parsedDate->format('Y-m-d\TH:i:sP') : '';
// Use the same date for modified time unless a separate field exists
$articleModifiedTime = isset($article['updatedDate']) && $article['updatedDate'] !== ''
    ? (($d = date_create($article['updatedDate'])) ? $d->format('Y-m-d\TH:i:sP') : $articlePublishedTime)
    : $articlePublishedTime;

$articleAuthor = $article['author'] ?? 'Raman Makkar';
$articleSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $article['title'],
    'description' => $article['metaDescription'],
    'datePublished' => $articlePublishedTime,
    'dateModified' => $articleModifiedTime,
    'author' => [
        '@type' => 'Person',
        'name' => $articleAuthor,
        'url' => TML_SITE_URL . '/about-us',
        'description' => 'Founder & Chief SEO Strategist at TML Agency',
    ],
    'creator' => $articleAuthor,
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'TML Agency',
        'url' => TML_SITE_URL,
        'logo' => ['@type' => 'ImageObject', 'url' => TML_SITE_URL . '/og-image.png'],
    ],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => TML_SITE_URL . '/blog/' . $slug],
];
if (!empty($article['image'])) {
    $articleSchema['image'] = str_starts_with($article['image'], 'http') ? $article['image'] : TML_SITE_URL . $article['image'];
}
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Blog', 'url' => TML_SITE_URL . '/blog'],
    ['name' => $article['title'], 'url' => TML_SITE_URL . '/blog/' . $slug],
]);
$extraHead = [
    tml_json_ld_script($articleSchema),
    tml_json_ld_script($breadcrumbSchema),
];
require TML_VIEWS . '/partials/head.php';
$safeContent = $article['content'];
?>
<style>
.blog-content h2 { font-size: 1.375rem; font-weight: 600; margin: 2rem 0 1rem; color: #fff; font-family: var(--font-syne), var(--font-inter), system-ui, sans-serif; }
.blog-content h3 { font-size: 1.125rem; font-weight: 600; margin: 1.5rem 0 0.75rem; color: #fff; }
.blog-content p, .blog-content li { margin: 0.75rem 0; line-height: 1.75; color: rgba(255,255,255,0.9); }
.blog-content ul { list-style: disc; padding-left: 1.25rem; }
.blog-content a { color: #ff4500; text-decoration: underline; }
.blog-content blockquote { border-left: 2px solid rgba(255,69,0,0.4); padding-left: 1rem; margin: 1.5rem 0; color: rgba(255,255,255,0.75); }
.blog-content table { width: 100%; border-collapse: collapse; margin: 1rem 0; font-size: 0.875rem; }
.blog-content th, .blog-content td { border: 1px solid rgba(255,255,255,0.1); padding: 0.5rem 0.75rem; }
</style>
<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>
<article class="px-6 pt-28 md:pt-32 lg:px-12 max-w-3xl mx-auto pb-20">
  <nav class="border-l-2 border-[#ff4500]/30 pl-3 mb-8" aria-label="Breadcrumb">
    <ol class="flex items-center gap-1.5 flex-wrap text-[11px]">
      <li><a href="/" class="text-white/30 hover:text-white/90">Home</a></li>
      <li class="text-white/20">/</li>
      <li><a href="/blog" class="text-white/30 hover:text-white/90">Blog</a></li>
      <li class="text-white/20">/</li>
      <li><span class="text-[#ff4500] font-medium" aria-current="page"><?= tml_e($article['title']) ?></span></li>
    </ol>
  </nav>
  <header class="mb-10">
    <span class="inline-block text-[11px] tracking-wider uppercase bg-[#ff4500]/10 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-4"><?= tml_e($article['category']) ?></span>
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-medium text-white leading-tight mb-4"><?= tml_e($article['title']) ?></h1>
    <p class="flex items-center gap-4 text-sm text-white/35">
      <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><?= tml_e($article['date']) ?></span>
      <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?= tml_e($article['readTime']) ?></span>
    </p>
  </header>
  <?php
  // Resolve whether the image actually exists on this server so we don't render a broken <img>.
  $imageUrl   = $article['image'] ?? '';
  $imageValid = false;
  if ($imageUrl !== '') {
      // Absolute HTTP URLs are always treated as valid (externally hosted).
      if (str_starts_with($imageUrl, 'http://') || str_starts_with($imageUrl, 'https://')) {
          $imageValid = true;
      } else {
          // Root-relative path — resolve against the public web root.
          $localPath = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/') . '/' . ltrim($imageUrl, '/');
          $imageValid = file_exists($localPath);
      }
  }
  ?>
  <?php if ($imageValid) : ?>
  <div class="mb-10 rounded-2xl overflow-hidden border border-white/[0.06]">
    <img src="<?= tml_e($imageUrl) ?>" alt="<?= tml_e($article['title']) ?> — TML Agency Blog" class="w-full h-auto object-cover" width="1200" height="630" loading="lazy" />
  </div>
  <?php elseif ($imageUrl !== '') : ?>
  <?php
  // Image path exists in data but the file is not present — show a branded gradient placeholder.
  $colors = ['from-[#ff4500]/20 to-[#ff6a00]/10', 'from-[#ff4500]/15 to-purple-900/20', 'from-orange-900/20 to-[#050505]'];
  $gradient = $colors[abs(crc32($imageUrl)) % count($colors)];
  ?>
  <div class="mb-10 rounded-2xl overflow-hidden border border-white/[0.06] bg-gradient-to-br <?= $gradient ?> aspect-[1200/630] flex items-center justify-center" aria-hidden="true">
    <span class="text-white/10 text-6xl font-bold tracking-widest select-none uppercase"><?= tml_e(mb_substr($article['category'], 0, 3)) ?></span>
  </div>
  <?php endif; ?>
  <div class="blog-content max-w-none text-sm md:text-base">
    <?= $safeContent ?>
  </div>
</article>
<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>
