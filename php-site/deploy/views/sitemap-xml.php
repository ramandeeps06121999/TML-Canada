<?php

declare(strict_types=1);

header('Content-Type: application/xml; charset=utf-8');

$base = TML_SITE_URL;
$now  = gmdate('Y-m-d');

$locationServiceIndex = tml_json_load('locationServiceIndex.json') ?? [];
$servicePages         = tml_service_pages();
$locations            = tml_locations();
$blogs                = tml_blog_articles();
$industryPages        = tml_industry_pages();

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <url>
    <loc><?= $base ?>/</loc>
    <lastmod><?= $now ?></lastmod>
  </url>

  <?php
  $staticPages = ['/services', '/about-us', '/contact-us', '/blog', '/portfolio', '/careers', '/industries', '/free-tools', '/privacy-policy', '/terms-of-service'];
  foreach ($staticPages as $path) :
  ?>
  <url>
    <loc><?= $base . tml_e($path) ?></loc>
    <lastmod><?= $now ?></lastmod>
  </url>
  <?php endforeach; ?>

  <?php
  $coreServices = ['branding', 'google-ads', 'seo', 'website-development', 'social-media', 'lead-generation', 'graphic-design', 'video-editing', 'branding-packaging', 'ai-influencer-management', 'music-release'];
  foreach ($coreServices as $svcSlug) :
      if (!isset($servicePages[$svcSlug])) continue;
  ?>
  <url>
    <loc><?= $base ?>/services/<?= tml_e($svcSlug) ?></loc>
    <lastmod><?= $now ?></lastmod>
  </url>
  <?php endforeach; ?>

  <?php foreach ($locationServiceIndex as $entry) :
      $urlSlug = $entry['urlSlug'] ?? '';
      if ($urlSlug === '') continue;
  ?>
  <url>
    <loc><?= $base ?>/services/<?= tml_e($urlSlug) ?></loc>
    <lastmod><?= $now ?></lastmod>
  </url>
  <?php endforeach; ?>

  <?php foreach ($blogs as $blogSlug => $article) :
      if (!is_string($blogSlug) || $blogSlug === '') continue;
  ?>
  <url>
    <loc><?= $base ?>/blog/<?= tml_e($blogSlug) ?></loc>
    <lastmod><?= $now ?></lastmod>
  </url>
  <?php endforeach; ?>

  <?php foreach ($industryPages as $indSlug => $indData) :
      if (!is_string($indSlug) || $indSlug === '') continue;
  ?>
  <url>
    <loc><?= $base ?>/industries/<?= tml_e($indSlug) ?></loc>
    <lastmod><?= $now ?></lastmod>
  </url>
  <?php endforeach; ?>

</urlset>
