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
.blog-content { font-family: var(--font-inter), system-ui, sans-serif; }
.blog-content h2 { font-size: 1.75rem; font-weight: 700; margin: 3rem 0 1.25rem; color: #fff; font-family: var(--font-syne); scroll-margin-top: 120px; }
.blog-content h3 { font-size: 1.35rem; font-weight: 600; margin: 2.5rem 0 1rem; color: #fff; font-family: var(--font-syne); scroll-margin-top: 120px; }
.blog-content > p { margin: 1.5rem 0; line-height: 1.85; color: rgba(255,255,255,0.85); font-size: 1.05rem; }
.blog-content ul, .blog-content ol { padding-left: 2rem; margin: 1.5rem 0; }
.blog-content li { margin: 0.75rem 0; line-height: 1.85; color: rgba(255,255,255,0.85); }
.blog-content a { color: #ff4500; font-weight: 500; text-decoration: none; border-bottom: 2px solid rgba(255,69,0,0.3); transition: all 0.3s; }
.blog-content a:hover { border-bottom-color: #ff4500; color: #ff6a33; }
.blog-content strong { font-weight: 700; color: #fff; }
.blog-content blockquote { border-left: 4px solid #ff4500; padding: 2rem; margin: 2.5rem 0; color: rgba(255,255,255,0.9); font-style: italic; background: rgba(255,69,0,0.08); border-radius: 0.75rem; font-size: 1.1rem; line-height: 1.8; }
.blog-content table { width: 100%; border-collapse: collapse; margin: 2rem 0; font-size: 0.95rem; }
.blog-content th { background: rgba(255,69,0,0.15); border-bottom: 2px solid #ff4500; padding: 1rem; text-align: left; font-weight: 700; color: #fff; }
.blog-content td { border-bottom: 1px solid rgba(255,255,255,0.08); padding: 0.9rem 1rem; color: rgba(255,255,255,0.8); }
.toc-item { display: block; padding: 0.5rem 0; color: #ff4500; text-decoration: none; transition: all 0.3s; border-left: 3px solid transparent; padding-left: 1rem; }
.toc-item:hover { border-left-color: #ff4500; color: #ff6a33; }
.toc-item.level-3 { padding-left: 2rem; }
</style>

<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- Hero Section -->
<section class="pt-24 md:pt-32 px-6 lg:px-12 pb-16 md:pb-20 bg-gradient-to-b from-[#080808] to-[#050505] border-b border-white/[0.05]">
  <div class="mx-auto max-w-7xl">
    <div class="max-w-4xl">
      <!-- Breadcrumb -->
      <nav class="mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-xs text-white/50">
          <li><a href="/" class="hover:text-white/80 transition-colors">Home</a></li>
          <li>/</li>
          <li><a href="/blog" class="hover:text-white/80 transition-colors">Blog</a></li>
          <li>/</li>
          <li class="text-[#ff4500] font-medium"><?= tml_e($article['category']) ?></li>
        </ol>
      </nav>

      <!-- Category Badge -->
      <div class="mb-6">
        <span class="inline-block px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-[#ff4500]/20 text-[#ff4500] border border-[#ff4500]/40"><?= tml_e($article['category']) ?></span>
      </div>

      <!-- Title -->
      <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight font-syne"><?= tml_e($article['title']) ?></h1>

      <!-- Description -->
      <p class="text-xl text-white/75 mb-8 max-w-2xl leading-relaxed"><?= tml_e($article['metaDescription']) ?></p>

      <!-- Metadata -->
      <div class="flex flex-wrap items-center gap-6 text-sm text-white/60">
        <div class="flex items-center gap-2">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <span><?= tml_e($article['date']) ?></span>
        </div>
        <div class="flex items-center gap-2">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          <span><?= tml_e($article['readTime']) ?></span>
        </div>
        <div class="flex items-center gap-2">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          <span><?= tml_e($articleAuthor) ?></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Image -->
<?php
$imageUrl = $article['image'] ?? '';
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
<section class="px-6 lg:px-12 py-12">
  <div class="mx-auto max-w-7xl">
    <div class="rounded-2xl overflow-hidden border border-white/[0.08] aspect-[2/1] md:aspect-[3/1]">
      <img src="<?= tml_e($imageUrl) ?>" alt="<?= tml_e($article['title']) ?>" class="w-full h-full object-cover" loading="lazy" />
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Main Content -->
<section class="px-6 lg:px-12 py-16">
  <div class="mx-auto max-w-7xl grid grid-cols-1 lg:grid-cols-3 gap-12">

    <!-- Article Content (Left) -->
    <div class="lg:col-span-2">
      <!-- Table of Contents -->
      <div class="mb-12 p-6 rounded-xl bg-white/[0.03] border border-white/[0.08] sticky top-24">
        <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2 uppercase tracking-wider">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/></svg>
          Contents
        </h3>
        <div id="toc-list" class="space-y-1 text-xs"></div>
      </div>

      <!-- Article Content -->
      <div class="blog-content">
        <?= $safeContent ?>
      </div>

      <!-- Author Card -->
      <div class="mt-16 p-8 rounded-xl border border-white/[0.08] bg-white/[0.02]">
        <div class="flex gap-5 items-start">
          <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#ff4500] to-[#ff6a33] flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
            <?= mb_substr($articleAuthor, 0, 1) ?>
          </div>
          <div>
            <h4 class="text-lg font-bold text-white mb-2"><?= tml_e($articleAuthor) ?></h4>
            <p class="text-sm text-white/70 mb-4 leading-relaxed">Founder & Chief SEO Strategist at TML Agency. Digital marketing expert specializing in SEO, content strategy, and AI-driven solutions.</p>
            <a href="/about-us" class="inline-flex items-center gap-2 text-sm font-bold text-[#ff4500] hover:text-[#ff6a33] transition-colors">
              View Profile <span>→</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Share Section -->
      <div class="mt-12 pt-8 border-t border-white/[0.08]">
        <h4 class="text-sm font-bold text-white mb-5 uppercase tracking-wider">Share This Article</h4>
        <div class="flex items-center gap-4">
          <a href="https://twitter.com/intent/tweet?text=<?= urlencode($article['title']) ?>&url=<?= urlencode(TML_SITE_URL . '/blog/' . $slug) ?>" target="_blank" rel="noopener" class="w-12 h-12 rounded-full bg-white/6 border border-white/10 flex items-center justify-center hover:bg-[#ff4500]/15 hover:border-[#ff4500]/40 transition-all">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-white/70"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7a10.6 10.6 0 01-9 5M21 3a6 6 0 01-6 6M3 21a6 6 0 016-6"/></svg>
          </a>
          <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(TML_SITE_URL . '/blog/' . $slug) ?>" target="_blank" rel="noopener" class="w-12 h-12 rounded-full bg-white/6 border border-white/10 flex items-center justify-center hover:bg-[#ff4500]/15 hover:border-[#ff4500]/40 transition-all">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-white/70"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="mailto:?subject=<?= urlencode($article['title']) ?>&body=<?= urlencode($article['metaDescription'] . '\n\n' . TML_SITE_URL . '/blog/' . $slug) ?>" class="w-12 h-12 rounded-full bg-white/6 border border-white/10 flex items-center justify-center hover:bg-[#ff4500]/15 hover:border-[#ff4500]/40 transition-all">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/70"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Sidebar (Right) -->
    <div class="lg:col-span-1">
      <div class="sticky top-24 space-y-6">
        <!-- Primary CTA -->
        <div class="p-8 rounded-xl bg-gradient-to-br from-[#ff4500] to-[#ff6a33] shadow-lg shadow-[#ff4500]/20">
          <h3 class="text-lg font-bold text-white mb-3">Ready to Level Up?</h3>
          <p class="text-sm text-white/90 mb-6 leading-relaxed">Get a personalized digital marketing strategy from our experts.</p>
          <a href="/contact-us" class="block w-full text-center py-3 bg-white text-[#ff4500] font-bold rounded-lg hover:bg-white/95 transition-all text-sm">
            Book Free Strategy Call
          </a>
        </div>

        <!-- Secondary CTA -->
        <div class="p-6 rounded-xl bg-white/[0.05] border border-white/[0.1] hover:border-[#ff4500]/40 transition-all">
          <h4 class="font-bold text-white mb-2">🎯 Free SEO Audit</h4>
          <p class="text-xs text-white/70 mb-4">Discover ranking opportunities for your site.</p>
          <a href="/services/seo" class="text-sm font-bold text-[#ff4500] hover:text-[#ff6a33] transition-colors">
            Get Audit →
          </a>
        </div>

        <!-- Related Articles -->
        <?php if (count($relatedArticles) > 0) : ?>
        <div class="p-6 rounded-xl bg-white/[0.03] border border-white/[0.08]">
          <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-wider">📚 Related Reading</h4>
          <div class="space-y-3">
            <?php foreach ($relatedArticles as $rSlug => $rArticle) : ?>
            <a href="/blog/<?= tml_e($rSlug) ?>" class="group block p-3 rounded-lg bg-white/[0.03] border border-white/[0.06] hover:border-[#ff4500]/30 hover:bg-white/[0.07] transition-all">
              <h5 class="text-xs font-bold text-white/80 group-hover:text-[#ff4500] line-clamp-2 transition-colors"><?= tml_e($rArticle['title']) ?></h5>
              <p class="text-[10px] text-white/40 mt-1"><?= tml_e($rArticle['category']) ?></p>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- Newsletter -->
        <div class="p-6 rounded-xl bg-white/[0.03] border border-white/[0.08]">
          <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">💡 Weekly Insights</h4>
          <p class="text-xs text-white/60 mb-4">Expert marketing tips delivered weekly.</p>
          <form action="/contact-us" method="POST" class="space-y-2">
            <input type="email" placeholder="your@email.com" required class="w-full px-3 py-2.5 rounded-lg bg-white/5 border border-white/10 text-white placeholder-white/40 text-xs focus:border-[#ff4500]/50 focus:outline-none transition-all" />
            <button type="submit" class="w-full py-2.5 bg-[#ff4500]/20 hover:bg-[#ff4500]/30 text-[#ff4500] font-bold rounded-lg text-xs transition-all border border-[#ff4500]/40">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>

<script>
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
