<?php
$title = 'Blog | TML Agency — Marketing, Branding & AI Insights';
$description = 'Expert insights on digital marketing, branding, SEO, AI, social media, and ad strategy from TML Agency.';
$keywords = 'digital marketing blog, SEO tips, branding insights, Google Ads strategies, social media marketing tips, AI marketing, content marketing blog, TML Agency blog';
$canonicalPath = '/blog';
$blogs = tml_blog_articles();
uksort($blogs, static function ($a, $b) use ($blogs) {
    return strcmp($blogs[$b]['date'] ?? '', $blogs[$a]['date'] ?? '');
});
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Blog', 'url' => TML_SITE_URL . '/blog'],
]);
$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
];
require TML_VIEWS . '/partials/head.php';

// Get unique categories
$categories = [];
foreach ($blogs as $blog) {
    $cat = $blog['category'] ?? 'General';
    if (!isset($categories[$cat])) {
        $categories[$cat] = 0;
    }
    $categories[$cat]++;
}
arsort($categories);

// Featured article (first/newest)
$featuredSlug = key($blogs);
$featured = reset($blogs);
$blogsRest = array_slice($blogs, 1);
?>
<style>
.blog-card { transition: all 0.4s cubic-bezier(.23,1,.32,1); }
.blog-card:hover { transform: translateY(-4px); }
.category-filter { transition: all 0.3s; }
.category-filter.active { background: #ff4500; color: white; border-color: #ff4500; }
</style>

<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- Hero Section -->
<section class="pt-28 md:pt-36 px-6 lg:px-12 pb-12 md:pb-16 relative overflow-hidden bg-gradient-to-b from-[#080808] to-[#050505]">
  <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#ff4500]/5 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-[#ff4500]/3 rounded-full blur-3xl pointer-events-none"></div>

  <div class="relative z-10 max-w-7xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="border-l-2 border-[#ff4500]/30 pl-4 mb-10" aria-label="Breadcrumb">
      <ol class="flex items-center gap-1.5 text-[11px]">
        <li><a href="/" class="text-white/40 hover:text-white/90 transition-colors">Home</a></li>
        <li class="text-white/20">/</li>
        <li><span class="text-[#ff4500] font-medium">Blog</span></li>
      </ol>
    </nav>

    <!-- Header -->
    <div class="mb-12 scroll-reveal">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-medium text-white mb-6 leading-tight">Digital Marketing Blog<span class="text-[#ff4500]">.</span></h1>
      <p class="text-lg text-white/70 max-w-2xl leading-relaxed">Expert insights on SEO, content marketing, branding, paid advertising, and AI-driven growth strategies. Stay ahead of the curve with weekly articles from our team.</p>
    </div>

    <!-- Category Pills -->
    <div class="flex flex-wrap gap-2 scroll-reveal scroll-delay-1">
      <button onclick="filterCategory('all')" class="category-filter active px-4 py-2 rounded-full text-sm font-medium bg-[#ff4500] text-white border border-[#ff4500] cursor-pointer hover:bg-[#ff6a33]">
        All Articles (<?= count($blogs) ?>)
      </button>
      <?php foreach ($categories as $cat => $count) : ?>
      <button onclick="filterCategory('<?= tml_e($cat) ?>')" class="category-filter px-4 py-2 rounded-full text-sm font-medium bg-transparent text-white/70 border border-white/20 cursor-pointer hover:border-[#ff4500]/50 hover:text-[#ff4500]">
        <?= tml_e($cat) ?> (<?= $count ?>)
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Featured Article -->
<section class="px-6 lg:px-12 py-16 md:py-20">
  <div class="max-w-7xl mx-auto">
    <p class="text-xs text-white/40 tracking-[0.25em] uppercase mb-6 scroll-reveal">Featured Article</p>
    <a href="/blog/<?= tml_e($featuredSlug) ?>" class="group block scroll-reveal">
      <div class="rounded-2xl overflow-hidden border border-white/[0.08] bg-gradient-to-br from-[#080808] to-[#0a0a0a] hover:border-[#ff4500]/30 transition-all duration-500 grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 p-8 md:p-12">
        <!-- Content -->
        <div class="md:col-span-2 flex flex-col justify-center">
          <span class="inline-block w-fit text-[10px] tracking-wider uppercase bg-[#ff4500]/15 text-[#ff4500] rounded-full px-4 py-1.5 font-semibold mb-6 border border-[#ff4500]/20 group-hover:bg-[#ff4500]/25 transition-colors">Featured — <?= tml_e($featured['category']) ?></span>
          <h2 class="text-3xl md:text-4xl font-medium text-white mb-4 group-hover:text-[#ff4500] transition-colors leading-tight"><?= tml_e($featured['title']) ?></h2>
          <p class="text-base text-white/70 mb-6 leading-relaxed"><?= tml_e($featured['metaDescription']) ?></p>
          <div class="flex items-center gap-6 text-sm text-white/50">
            <span class="flex items-center gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              <?= tml_e($featured['date']) ?>
            </span>
            <span class="flex items-center gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <?= tml_e($featured['readTime']) ?>
            </span>
            <span class="flex items-center gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              Read Article
            </span>
          </div>
        </div>

        <!-- Visual -->
        <div class="md:col-span-1 flex items-center justify-center">
          <div class="w-full aspect-square rounded-xl bg-gradient-to-br from-[#ff4500]/20 to-[#ff6a33]/10 flex items-center justify-center border border-white/[0.06]">
            <span class="text-6xl font-bold text-white/5 text-center select-none"><?= tml_e(mb_substr($featured['category'], 0, 2)) ?></span>
          </div>
        </div>
      </div>
    </a>
  </div>
</section>

<!-- Articles Grid -->
<section class="px-6 lg:px-12 pb-20">
  <div class="max-w-7xl mx-auto">
    <div id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($blogsRest as $slug => $article) : ?>
      <a href="/blog/<?= tml_e($slug) ?>" class="blog-card group block p-6 rounded-xl border border-white/[0.06] bg-white/[0.02] hover:bg-white/[0.04] hover:border-[#ff4500]/30 transition-all duration-500" data-category="<?= tml_e($article['category']) ?>">
        <!-- Image/Placeholder -->
        <div class="rounded-lg bg-gradient-to-br from-[#ff4500]/15 to-[#ff6a33]/5 aspect-video flex items-center justify-center mb-5 group-hover:from-[#ff4500]/25 group-hover:to-[#ff6a33]/15 transition-all">
          <span class="text-5xl font-bold text-white/5 select-none"><?= tml_e(mb_substr($article['category'], 0, 2)) ?></span>
        </div>

        <!-- Content -->
        <span class="inline-block text-[10px] tracking-wider uppercase bg-[#ff4500]/15 text-[#ff4500] rounded-full px-3 py-1 font-semibold mb-3 border border-[#ff4500]/20 group-hover:bg-[#ff4500]/25 transition-colors"><?= tml_e($article['category']) ?></span>
        <h3 class="text-lg font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors leading-tight line-clamp-2"><?= tml_e($article['title']) ?></h3>
        <p class="text-sm text-white/60 mb-4 line-clamp-2 leading-relaxed"><?= tml_e($article['metaDescription']) ?></p>

        <!-- Meta -->
        <div class="flex items-center gap-4 text-xs text-white/40">
          <span class="flex items-center gap-1.5">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            <?= tml_e($article['date']) ?>
          </span>
          <span class="flex items-center gap-1.5">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <?= tml_e($article['readTime']) ?>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="px-6 lg:px-12 py-16 md:py-20 bg-gradient-to-r from-[#ff4500]/10 to-transparent border-t border-white/[0.06]">
  <div class="text-center scroll-reveal max-w-3xl mx-auto">
    <h2 class="text-3xl md:text-4xl font-medium text-white mb-4">Want Personalized Strategy?</h2>
    <p class="text-lg text-white/70 mb-8">Get expert guidance tailored to your business goals. Our team is ready to help.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="/contact-us" class="glow-button px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm hover:bg-[#ff5500] transition-colors">Book Free Strategy Call</a>
      <a href="/blog" class="px-8 py-4 rounded-full border border-white/10 text-white/90 font-semibold text-sm hover:bg-white/5 transition-colors">Browse More Articles</a>
    </div>
  </div>
</section>

<?php require TML_VIEWS . '/partials/footer.php'; ?>
<?php require TML_VIEWS . '/partials/foot.php'; ?>

<script>
function filterCategory(category) {
  const cards = document.querySelectorAll('.blog-card');
  const buttons = document.querySelectorAll('.category-filter');

  // Update active button
  buttons.forEach(btn => {
    btn.classList.remove('active');
    if (btn.textContent.includes(category === 'all' ? 'All Articles' : category)) {
      btn.classList.add('active');
    }
  });

  // Filter cards with animation
  cards.forEach(card => {
    if (category === 'all' || card.dataset.category === category) {
      card.style.display = 'block';
      setTimeout(() => card.style.opacity = '1', 0);
    } else {
      card.style.opacity = '0';
      setTimeout(() => card.style.display = 'none', 300);
    }
  });
}
</script>
