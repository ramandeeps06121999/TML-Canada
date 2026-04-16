<?php
$title = 'Digital Marketing & SEO Blog | AI & Branding Tips | TML Agency';
$description = 'Read expert insights on digital marketing, SEO, branding, AI, Google Ads & social media strategy from TML Agency Canada. Actionable tips for growing your brand.';
$keywords = 'digital marketing blog, SEO tips Canada, branding insights, Google Ads strategies, social media marketing tips, AI marketing blog, content marketing, TML Agency blog';
$canonicalPath = '/blog';
$blogs = tml_blog_articles();
uksort($blogs, static function ($a, $b) use ($blogs) {
    return strcmp($blogs[$b]['date'] ?? '', $blogs[$a]['date'] ?? '');
});
$breadcrumbSchema = tml_schema_breadcrumb([
    ['name' => 'Home', 'url' => TML_SITE_URL . '/'],
    ['name' => 'Blog', 'url' => TML_SITE_URL . '/blog'],
]);
$collectionPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'TML Agency Blog',
    'description' => 'Expert insights on digital marketing, branding, SEO, AI, social media, and ad strategy.',
    'url' => TML_SITE_URL . '/blog',
    'mainEntity' => [
        '@type' => 'ItemList',
        'name' => 'Blog Articles',
        'itemListElement' => array_map(static function ($slug, $article, $pos) {
            return [
                '@type' => 'ListItem',
                'position' => $pos,
                '@id' => TML_SITE_URL . '/blog/' . tml_e($slug),
                'name' => $article['title'] ?? '',
                'description' => $article['description'] ?? '',
                'datePublished' => $article['date'] ?? '',
            ];
        }, array_keys($blogs), $blogs, array_keys(array_fill(0, count($blogs), 0))),
    ],
];
$extraHead = [
    tml_json_ld_script($breadcrumbSchema),
    tml_json_ld_script($collectionPageSchema),
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
.blog-card {
  transition: all 0.4s cubic-bezier(.23,1,.32,1);
}
.blog-card:hover {
  transform: translateY(-6px);
  border-color: #ff4500;
  background-color: rgba(255, 69, 0, 0.05);
  box-shadow: 0 12px 40px -8px rgba(255, 69, 0, 0.15), 0 4px 16px -4px rgba(0,0,0,0.4);
}
.blog-card .blog-card-img {
  transition: transform 0.6s cubic-bezier(.23,1,.32,1);
}
.blog-card:hover .blog-card-img {
  transform: scale(1.05);
}
.category-filter {
  transition: all 0.3s cubic-bezier(.23,1,.32,1);
  position: relative;
}
.category-filter.active {
  background: #ff4500;
  color: white;
  border-color: #ff4500;
}
.category-filter:hover {
  border-color: #ff4500;
}
.scroll-reveal {
  opacity: 0;
  animation: fadeInUp 0.8s ease-out forwards;
}
.scroll-delay-1 { animation-delay: 0.1s; }
.scroll-delay-2 { animation-delay: 0.2s; }
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

<main class="bg-[#050505] text-white min-h-screen">
<?php require TML_VIEWS . '/partials/navbar.php'; ?>

<!-- Hero Section -->
<section class="pt-24 md:pt-32 px-6 lg:px-12 pb-16 md:pb-20 relative overflow-hidden bg-gradient-to-b from-[#080808] via-[#050505] to-[#050505]">
  <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 40%, black 30%, transparent 70%);"></div>
  <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#ff4500]/8 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-32 -right-40 w-80 h-80 bg-[#ff4500]/4 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute top-1/2 right-1/4 w-72 h-72 bg-[#ff4500]/3 rounded-full blur-3xl pointer-events-none opacity-50"></div>

  <div class="relative z-10 mx-auto max-w-7xl">
    <!-- Breadcrumb -->
    <nav class="border-l-2 border-[#ff4500]/40 pl-4 mb-12 scroll-reveal" aria-label="Breadcrumb">
      <ol class="flex items-center gap-2 text-xs text-white/60">
        <li><a href="/" class="hover:text-[#ff4500] transition-colors">Home</a></li>
        <li>/</li>
        <li><span class="text-[#ff4500] font-medium">Blog</span></li>
      </ol>
    </nav>

    <!-- Header -->
    <div class="mb-14 scroll-reveal">
      <div class="mb-6">
        <span class="inline-block text-xs tracking-[0.25em] uppercase text-[#ff4500] font-semibold">Expert Insights</span>
      </div>
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-medium text-white mb-6 leading-tight">Digital Marketing &amp; SEO Blog<span class="text-[#ff4500]">.</span></h1>
      <p class="text-lg md:text-xl text-white/70 max-w-3xl leading-relaxed">Cutting-edge strategies, industry trends, and proven tactics from our expert team. Discover how to elevate your brand with SEO, content, paid media, and AI-driven marketing.</p>
    </div>

    <!-- Category Pills -->
    <div class="flex flex-wrap gap-3 scroll-reveal scroll-delay-1">
      <button onclick="filterCategory('all')" class="category-filter active px-5 py-2.5 rounded-full text-sm font-medium bg-[#ff4500] text-white border border-[#ff4500] cursor-pointer transition-all hover:bg-[#ff6a33] hover:border-[#ff6a33]">
        All Articles (<?= count($blogs) ?>)
      </button>
      <?php foreach ($categories as $cat => $count) : ?>
      <button onclick="filterCategory('<?= tml_e($cat) ?>')" class="category-filter px-5 py-2.5 rounded-full text-sm font-medium bg-white/[0.03] text-white/80 border border-white/15 cursor-pointer transition-all hover:bg-white/[0.06] hover:border-[#ff4500]/60 hover:text-[#ff4500]">
        <?= tml_e($cat) ?> <span class="text-white/50">(<?= $count ?>)</span>
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Featured Article -->
<section class="px-6 lg:px-12 py-16 md:py-24 relative">
  <div class="mx-auto max-w-7xl">
    <div class="mb-8 scroll-reveal">
      <h2 class="text-xs tracking-[0.25em] uppercase text-white/50 font-semibold m-0">Featured Article</h2>
    </div>

    <a href="/blog/<?= tml_e($featuredSlug) ?>" class="group block scroll-reveal">
      <div class="rounded-2xl overflow-hidden border border-white/[0.08] bg-gradient-to-br from-[#080808] via-[#0a0a0a] to-[#050505] hover:border-[#ff4500]/40 transition-all duration-500 grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 p-8 md:p-14">
        <!-- Content -->
        <div class="md:col-span-2 flex flex-col justify-center">
          <div class="mb-6">
            <span class="inline-block text-[10px] tracking-wider uppercase bg-[#ff4500]/15 text-[#ff4500] rounded-full px-4 py-1.5 font-semibold border border-[#ff4500]/30 group-hover:bg-[#ff4500]/25 group-hover:border-[#ff4500]/50 transition-all">Featured — <?= tml_e($featured['category']) ?></span>
          </div>

          <h2 class="text-3xl md:text-4xl lg:text-5xl font-semibold text-white mb-5 group-hover:text-[#ff4500] transition-colors leading-tight"><?= tml_e($featured['title']) ?></h2>

          <p class="text-base md:text-lg text-white/70 mb-8 leading-relaxed line-clamp-3"><?= tml_e($featured['metaDescription']) ?></p>

          <div class="flex flex-wrap items-center gap-6 text-sm text-white/60">
            <span class="flex items-center gap-2.5">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#ff4500]"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              <span><?= tml_e($featured['date']) ?></span>
            </span>
            <span class="flex items-center gap-2.5">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[#ff4500]"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span><?= tml_e($featured['readTime']) ?></span>
            </span>
            <span class="flex items-center gap-2.5 text-[#ff4500] font-medium group-hover:translate-x-1 transition-transform">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              <span>Read Article</span>
            </span>
          </div>
        </div>

        <!-- Visual -->
        <div class="md:col-span-1 flex items-center justify-center">
          <div class="w-full aspect-square rounded-xl bg-gradient-to-br from-[#ff4500]/20 to-[#ff6a33]/10 flex items-center justify-center border border-white/[0.06] group-hover:border-[#ff4500]/30 group-hover:from-[#ff4500]/30 group-hover:to-[#ff6a33]/20 transition-all">
            <span class="text-6xl font-bold text-white/8 text-center select-none"><?= tml_e(mb_substr($featured['category'], 0, 2)) ?></span>
          </div>
        </div>
      </div>
    </a>
  </div>
</section>

<!-- Articles Grid -->
<section class="px-6 lg:px-12 py-16 md:py-24">
  <div class="mx-auto max-w-7xl">
    <h2 class="text-2xl md:text-3xl font-semibold text-white mb-10 font-syne">Latest Marketing Insights &amp; SEO Tips</h2>
    <div id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-7">
      <?php foreach ($blogsRest as $slug => $article) : ?>
      <a href="/blog/<?= tml_e($slug) ?>" class="blog-card group block rounded-xl border border-white/[0.08] bg-white/[0.02] overflow-hidden transition-all duration-500 hover:bg-white/[0.06] hover:border-[#ff4500]/40 flex flex-col" data-category="<?= tml_e($article['category']) ?>">
        <!-- Image/Placeholder -->
        <div class="rounded-t-xl bg-gradient-to-br from-[#ff4500]/18 via-[#ff6a33]/10 to-[#050505]/20 aspect-[16/9] flex items-center justify-center overflow-hidden relative">
          <div class="blog-card-img absolute inset-0 bg-gradient-to-br from-[#ff4500]/18 via-[#ff6a33]/10 to-[#050505]/20"></div>
          <span class="relative text-5xl font-bold text-white/8 select-none"><?= tml_e(mb_substr($article['category'], 0, 2)) ?></span>
          <div class="absolute inset-0 bg-gradient-to-t from-[#050505]/40 via-transparent to-transparent pointer-events-none"></div>
        </div>

        <!-- Content -->
        <div class="p-6 flex flex-col flex-grow">
          <div class="mb-4">
            <span class="inline-block text-[9px] tracking-widest uppercase bg-[#ff4500]/15 text-[#ff4500] rounded-full px-3 py-1 font-semibold border border-[#ff4500]/30 group-hover:bg-[#ff4500]/25 group-hover:border-[#ff4500]/50 transition-all"><?= tml_e($article['category']) ?></span>
          </div>

          <h3 class="text-lg font-semibold text-white mb-3 group-hover:text-[#ff4500] transition-colors leading-tight line-clamp-2"><?= tml_e($article['title']) ?></h3>

          <p class="text-sm text-white/60 mb-5 line-clamp-2 leading-relaxed flex-grow"><?= tml_e($article['metaDescription']) ?></p>

          <!-- Meta -->
          <div class="flex items-center justify-between text-xs text-white/50 border-t border-white/[0.06] pt-4">
            <span class="flex items-center gap-2">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/40"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              <span><?= tml_e($article['date']) ?></span>
            </span>
            <span class="flex items-center gap-2">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-white/40"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span><?= tml_e($article['readTime']) ?></span>
            </span>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="px-6 lg:px-12 py-20 md:py-28 relative overflow-hidden border-t border-white/[0.06]">
  <div class="absolute -top-40 left-1/4 w-80 h-80 bg-[#ff4500]/8 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-32 right-1/4 w-72 h-72 bg-[#ff4500]/5 rounded-full blur-3xl pointer-events-none"></div>

  <div class="relative z-10 mx-auto max-w-4xl text-center">
    <div class="scroll-reveal">
      <h2 class="text-4xl md:text-5xl lg:text-6xl font-semibold text-white mb-6 leading-tight">
        Ready to Elevate Your<br>
        <span class="text-[#ff4500]">Digital Presence?</span>
      </h2>
      <p class="text-lg md:text-xl text-white/70 mb-10 leading-relaxed">
        Get expert marketing strategy tailored to your business. Our team combines data-driven insights with creative excellence to deliver results.
      </p>
    </div>

    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 scroll-reveal scroll-delay-1">
      <a href="/contact-us" class="px-8 py-4 rounded-full bg-[#ff4500] text-white font-semibold text-sm transition-all hover:bg-[#ff6a33] hover:shadow-lg hover:shadow-[#ff4500]/30 active:scale-95">
        Book Free Strategy Call
      </a>
      <a href="/blog" class="px-8 py-4 rounded-full border border-white/20 text-white font-semibold text-sm transition-all hover:border-[#ff4500]/60 hover:bg-white/[0.05] hover:text-white active:scale-95">
        Explore More Articles
      </a>
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
