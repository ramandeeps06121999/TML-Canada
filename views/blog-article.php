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

// Get related blog articles
$allBlogs = tml_blog_articles();
$relatedArticles = [];
if (!empty($article['keywords'])) {
    $keywords = is_array($article['keywords']) ? $article['keywords'] : [$article['keywords']];
    foreach ($allBlogs as $bSlug => $blog) {
        if ($bSlug === $slug) continue;
        $blogKeywords = is_array($blog['keywords'] ?? []) ? $blog['keywords'] : [$blog['keywords'] ?? ''];
        $match = count(array_intersect($keywords, $blogKeywords)) > 0;
        if ($match) {
            $relatedArticles[$bSlug] = $blog;
            if (count($relatedArticles) >= 3) break;
        }
    }
}
if (count($relatedArticles) < 3) {
    foreach ($allBlogs as $bSlug => $blog) {
        if ($bSlug === $slug) continue;
        if (isset($relatedArticles[$bSlug])) continue;
        if ($blog['category'] === $article['category']) {
            $relatedArticles[$bSlug] = $blog;
            if (count($relatedArticles) >= 3) break;
        }
    }
}
?>
<style>
.blog-content h2 { font-size: 1.5rem; font-weight: 600; margin: 2.5rem 0 1.25rem; color: #fff; font-family: var(--font-syne), var(--font-inter), system-ui, sans-serif; scroll-margin-top: 120px; }
.blog-content h3 { font-size: 1.25rem; font-weight: 600; margin: 2rem 0 1rem; color: #fff; font-family: var(--font-syne), var(--font-inter), system-ui, sans-serif; scroll-margin-top: 120px; }
.blog-content > p, .blog-content li { margin: 1rem 0; line-height: 1.8; color: rgba(255,255,255,0.85); }
.blog-content ul, .blog-content ol { padding-left: 1.75rem; margin: 1.25rem 0; }
.blog-content li { margin: 0.5rem 0; }
.blog-content a { color: #ff4500; text-decoration: none; border-bottom: 1px solid rgba(255,69,0,0.4); transition: all 0.3s; }
.blog-content a:hover { border-bottom-color: #ff4500; color: #ff6a33; }
.blog-content strong { font-weight: 600; color: #fff; }
.blog-content blockquote { border-left: 3px solid #ff4500; padding-left: 1.5rem; margin: 2rem 0; color: rgba(255,255,255,0.8); font-style: italic; background: rgba(255,69,0,0.05); padding: 1.25rem 1.5rem; border-radius: 0.5rem; }
.blog-content table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; font-size: 0.875rem; border: 1px solid rgba(255,255,255,0.1); border-radius: 0.5rem; overflow: hidden; }
.blog-content th { background: rgba(255,69,0,0.1); border-bottom: 2px solid rgba(255,69,0,0.3); padding: 0.75rem; text-align: left; font-weight: 600; color: #fff; }
.blog-content td { border-bottom: 1px solid rgba(255,255,255,0.05); padding: 0.75rem; color: rgba(255,255,255,0.8); }
.highlight-box { background: rgba(255,69,0,0.08); border-left: 3px solid #ff4500; padding: 1.25rem; border-radius: 0.5rem; margin: 1.5rem 0; }
.highlight-box p { margin: 0; }
.toc-item { display: block; padding: 0.5rem 0; color: #ff4500; text-decoration: none; transition: all 0.3s; border-left: 2px solid transparent; padding-left: 1rem; margin-left: 0; }
.toc-item:hover { border-left-color: #ff4500; color: #ff6a33; }
.toc-item.level-3 { padding-left: 2rem; margin-left: 0; }
</style>

<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- Hero Section -->
<section class="pt-28 md:pt-36 px-6 lg:px-12 pb-12 md:pb-16 relative overflow-hidden bg-gradient-to-b from-[#080808] to-[#050505]">
  <div class="absolute -top-40 -right-40 w-96 h-96 bg-[#ff4500]/5 rounded-full blur-3xl pointer-events-none"></div>
  <div class="relative z-10">
    <!-- Breadcrumb -->
    <nav class="border-l-2 border-[#ff4500]/30 pl-4 mb-8" aria-label="Breadcrumb">
      <ol class="flex items-center gap-1.5 flex-wrap text-[11px]">
        <li><a href="/" class="text-white/40 hover:text-white/90 transition-colors">Home</a></li>
        <li class="text-white/20">/</li>
        <li><a href="/blog" class="text-white/40 hover:text-white/90 transition-colors">Blog</a></li>
        <li class="text-white/20">/</li>
        <li><span class="text-[#ff4500] font-medium" aria-current="page"><?= tml_e($article['title']) ?></span></li>
      </ol>
    </nav>

    <!-- Header Content -->
    <div class="mb-8">
      <span class="inline-block text-[10px] tracking-wider uppercase bg-[#ff4500]/15 text-[#ff4500] rounded-full px-4 py-1.5 font-semibold mb-6 border border-[#ff4500]/20"><?= tml_e($article['category']) ?></span>
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white leading-tight mb-6"><?= tml_e($article['title']) ?></h1>
      <p class="text-lg text-white/70 mb-8 max-w-2xl leading-relaxed"><?= tml_e($article['metaDescription']) ?></p>

      <!-- Author & Meta Info -->
      <div class="flex flex-col sm:flex-row sm:items-center gap-6 py-6 border-t border-b border-white/10">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#ff4500] to-[#ff6a33] flex items-center justify-center text-white font-bold text-lg">
            <?= mb_substr($articleAuthor, 0, 1) ?>
          </div>
          <div>
            <p class="font-medium text-white"><?= tml_e($articleAuthor) ?></p>
            <p class="text-xs text-white/50">Founder & SEO Strategist</p>
          </div>
        </div>
        <div class="flex items-center gap-6 text-sm text-white/50 flex-wrap">
          <span class="flex items-center gap-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            <?= tml_e($article['date']) ?>
          </span>
          <span class="flex items-center gap-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <?= tml_e($article['readTime']) ?>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Image -->
<?php
$imageUrl   = $article['image'] ?? '';
$imageValid = false;
if ($imageUrl !== '') {
    if (str_starts_with($imageUrl, 'http://') || str_starts_with($imageUrl, 'https://')) {
        $imageValid = true;
    } else {
        $localPath = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/') . '/' . ltrim($imageUrl, '/');
        $imageValid = file_exists($localPath);
    }
}
?>
<?php if ($imageValid) : ?>
<div class="px-6 lg:px-12 pb-16">
  <div>
    <div class="rounded-2xl overflow-hidden border border-white/[0.08] shadow-2xl">
      <img src="<?= tml_e($imageUrl) ?>" alt="<?= tml_e($article['title']) ?> — TML Agency Blog" class="w-full h-auto object-cover" width="1200" height="630" loading="lazy" />
    </div>
  </div>
</div>
<?php elseif ($imageUrl !== '') : ?>
<?php
$colors = ['from-[#ff4500]/20 to-[#ff6a00]/10', 'from-[#ff4500]/15 to-purple-900/20', 'from-orange-900/20 to-[#050505]'];
$gradient = $colors[abs(crc32($imageUrl)) % count($colors)];
?>
<div class="px-6 lg:px-12 pb-16">
  <div>
    <div class="rounded-2xl overflow-hidden border border-white/[0.08] bg-gradient-to-br <?= $gradient ?> aspect-[1200/630] flex items-center justify-center">
      <span class="text-white/10 text-6xl font-bold tracking-widest select-none uppercase"><?= tml_e(mb_substr($article['category'], 0, 3)) ?></span>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- Main Content Layout -->
<div class="px-6 lg:px-12 pb-20">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

    <!-- Main Article Content -->
    <article class="lg:col-span-2">
      <!-- Table of Contents -->
      <div class="mb-12 p-6 rounded-xl bg-[#080808] border border-white/[0.06]">
        <h3 class="text-sm font-semibold text-white mb-4 flex items-center gap-2">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
          Table of Contents
        </h3>
        <div id="toc-list" class="space-y-1 text-sm"></div>
      </div>

      <!-- Article Content -->
      <div class="blog-content max-w-none text-base leading-relaxed">
        <?= $safeContent ?>
      </div>

      <!-- Share Buttons -->
      <div class="mt-12 pt-8 border-t border-white/[0.06]">
        <p class="text-sm text-white/50 mb-4">Share this article</p>
        <div class="flex items-center gap-3">
          <a href="https://twitter.com/intent/tweet?text=<?= urlencode($article['title']) ?>&url=<?= urlencode(TML_SITE_URL . '/blog/' . $slug) ?>" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:border-[#ff4500]/30 hover:bg-[#ff4500]/10 transition-all duration-300">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-white/70 hover:text-[#ff4500]"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7a10.6 10.6 0 01-9 5M21 3a6 6 0 01-6 6M3 21a6 6 0 016-6"/></svg>
          </a>
          <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(TML_SITE_URL . '/blog/' . $slug) ?>" target="_blank" rel="noopener" class="flex items-center justify-center w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:border-[#ff4500]/30 hover:bg-[#ff4500]/10 transition-all duration-300">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-white/70 hover:text-[#ff4500]"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="mailto:?subject=<?= urlencode($article['title']) ?>&body=<?= urlencode($article['metaDescription'] . '\n\n' . TML_SITE_URL . '/blog/' . $slug) ?>" class="flex items-center justify-center w-10 h-10 rounded-full bg-white/5 border border-white/10 hover:border-[#ff4500]/30 hover:bg-[#ff4500]/10 transition-all duration-300">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/70 hover:text-[#ff4500]"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </a>
        </div>
      </div>

      <!-- Author Bio -->
      <div class="mt-12 p-8 rounded-xl bg-gradient-to-r from-[#ff4500]/10 to-[#080808] border border-[#ff4500]/20">
        <div class="flex gap-4 items-start">
          <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#ff4500] to-[#ff6a33] flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
            <?= mb_substr($articleAuthor, 0, 1) ?>
          </div>
          <div>
            <h4 class="text-lg font-semibold text-white mb-2"><?= tml_e($articleAuthor) ?></h4>
            <p class="text-sm text-white/70 mb-4">Founder & Chief SEO Strategist at TML Agency. Digital marketing expert specializing in SEO, content strategy, and AI-driven marketing solutions. Helping businesses dominate search rankings and grow their online presence.</p>
            <a href="/about-us" class="inline-flex items-center gap-2 text-sm text-[#ff4500] font-semibold hover:text-[#ff6a33] transition-colors">
              Learn More About <?= tml_e($articleAuthor) ?> <span>→</span>
            </a>
          </div>
        </div>
      </div>
    </article>

    <!-- Sidebar -->
    <aside class="lg:col-span-1">
      <!-- CTA Cards -->
      <div class="sticky top-32 space-y-5">
        <!-- Free Strategy Call CTA -->
        <div class="p-6 rounded-xl bg-gradient-to-br from-[#ff4500] to-[#ff6a33] text-white">
          <h3 class="text-sm font-semibold mb-2">Ready to Dominate?</h3>
          <p class="text-xs text-white/90 mb-4 leading-relaxed">Get a personalized digital marketing strategy tailored to your business goals.</p>
          <a href="/contact-us" class="inline-block w-full text-center py-3 bg-white text-[#ff4500] font-semibold rounded-lg hover:bg-white/90 transition-all duration-300 text-sm">Book Free Strategy Call</a>
        </div>

        <!-- Free Audit CTA -->
        <div class="p-6 rounded-xl bg-white/5 border border-white/[0.1] hover:border-[#ff4500]/30 transition-all duration-300">
          <h3 class="text-sm font-semibold text-white mb-2">Free SEO Audit</h3>
          <p class="text-xs text-white/70 mb-4 leading-relaxed">Discover what's holding your site back and unlock ranking potential.</p>
          <a href="/services/seo" class="inline-block w-full text-center py-2.5 bg-[#ff4500]/10 text-[#ff4500] font-semibold rounded-lg hover:bg-[#ff4500]/20 transition-all duration-300 text-sm border border-[#ff4500]/20">Get Free Audit</a>
        </div>

        <!-- Related Articles -->
        <?php if (count($relatedArticles) > 0) : ?>
        <div class="mt-8 pt-8 border-t border-white/[0.06]">
          <h3 class="text-sm font-semibold text-white mb-4 flex items-center gap-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            Related Articles
          </h3>
          <div class="space-y-3">
            <?php foreach ($relatedArticles as $rSlug => $rArticle) : ?>
            <a href="/blog/<?= tml_e($rSlug) ?>" class="group block p-3 rounded-lg bg-white/[0.02] border border-white/[0.06] hover:border-[#ff4500]/30 hover:bg-white/[0.05] transition-all duration-300">
              <h4 class="text-xs font-semibold text-white/80 group-hover:text-[#ff4500] transition-colors line-clamp-2 mb-1"><?= tml_e($rArticle['title']) ?></h4>
              <p class="text-[10px] text-white/40"><?= tml_e($rArticle['category']) ?></p>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- Newsletter -->
        <div class="mt-8 pt-8 border-t border-white/[0.06]">
          <h3 class="text-sm font-semibold text-white mb-3 flex items-center gap-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            Weekly Insights
          </h3>
          <p class="text-xs text-white/60 mb-3">Get marketing tips & SEO insights in your inbox every week.</p>
          <form action="/contact-us" method="POST" class="space-y-2">
            <input type="email" placeholder="your@email.com" required class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-white placeholder-white/40 text-xs focus:border-[#ff4500]/50 focus:outline-none transition-all" />
            <button type="submit" class="w-full py-2 bg-[#ff4500]/10 hover:bg-[#ff4500]/20 text-[#ff4500] font-semibold rounded-lg text-xs transition-all duration-300 border border-[#ff4500]/20">Subscribe</button>
          </form>
        </div>
      </div>
    </aside>
  </div>
</div>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>

<script>
// Generate table of contents from h2 and h3 headings
document.addEventListener('DOMContentLoaded', function() {
  const articleContent = document.querySelector('.blog-content');
  if (!articleContent) return;

  const headings = Array.from(articleContent.querySelectorAll('h2, h3'));
  const tocList = document.getElementById('toc-list');

  if (headings.length === 0 || !tocList) return;

  headings.forEach((heading, index) => {
    const id = 'heading-' + index;
    heading.id = id;

    const level = heading.tagName === 'H2' ? 2 : 3;
    const link = document.createElement('a');
    link.href = '#' + id;
    link.textContent = heading.textContent;
    link.className = 'toc-item' + (level === 3 ? ' level-3' : '');

    tocList.appendChild(link);
  });
});
</script>
