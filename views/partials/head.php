<?php
/** @var string $title */
/** @var string $description */
/** @var string $canonicalPath */
/** @var array<int, string> $extraHead */
/** @var string|null $ogType            Optional override; defaults to 'website' */
/** @var string|null $articlePublishedTime  ISO-8601 date for og:type=article pages */
/** @var string|null $articleModifiedTime   ISO-8601 date for og:type=article pages */
/** @var string|null $ogLocaleOverride   Optional locale override (e.g. 'en_CA') */
$canonical = TML_SITE_URL . $canonicalPath;
$resolvedOgType = $ogType ?? 'website';
$resolvedOgLocale = $ogLocaleOverride ?? 'en_CA';
?>
<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= tml_e($title) ?></title>
  <meta name="description" content="<?= tml_e($description) ?>" />
  <?php if (!empty($keywords)) : ?>
  <meta name="keywords" content="<?= tml_e($keywords) ?>" />
  <?php endif; ?>
  <link rel="canonical" href="<?= tml_e($canonical) ?>" />
  <meta name="geo.region" content="CA-AB" />
  <meta name="geo.placename" content="Edmonton" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- Font preload: Optimize LCP (Largest Contentful Paint) -->
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Syne:wght@400;500;600;700&display=swap" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Syne:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/css/app.css" />
  <link rel="icon" href="/favicon.ico" sizes="16x16 32x32 48x48" />
  <?php $ogImg = isset($ogImageOverride) ? tml_e($ogImageOverride) : TML_SITE_URL . '/og-image.png'; ?>
  <meta property="og:title" content="<?= tml_e($title) ?>" />
  <meta property="og:description" content="<?= tml_e($description) ?>" />
  <meta property="og:url" content="<?= tml_e($canonical) ?>" />
  <meta property="og:image" content="<?= $ogImg ?>" />
  <meta property="og:type" content="<?= tml_e($resolvedOgType) ?>" />
  <meta property="og:locale" content="<?= tml_e($resolvedOgLocale) ?>" />
  <meta property="og:site_name" content="TML Agency" />
  <?php if ($resolvedOgType === 'article' && !empty($articlePublishedTime)) : ?>
  <meta property="article:published_time" content="<?= tml_e($articlePublishedTime) ?>" />
  <?php endif; ?>
  <?php if ($resolvedOgType === 'article' && !empty($articleModifiedTime)) : ?>
  <meta property="article:modified_time" content="<?= tml_e($articleModifiedTime) ?>" />
  <?php endif; ?>
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:alt" content="<?= tml_e($title) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@TMLAgency" />
  <meta name="twitter:title" content="<?= tml_e($title) ?>" />
  <meta name="twitter:description" content="<?= tml_e($description) ?>" />
  <meta name="twitter:image" content="<?= $ogImg ?>" />
  <style>
    :root { --font-inter: 'Inter', system-ui, sans-serif; --font-syne: 'Syne', system-ui, sans-serif; }
  </style>
  <?php foreach ($extraHead ?? [] as $h) { echo $h . "\n"; } ?>
  <?php if (defined('TML_GA4_ID') && TML_GA4_ID !== ''): ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= tml_e(TML_GA4_ID) ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= tml_e(TML_GA4_ID) ?>');
  </script>
  <?php endif; ?>
</head>
<body class="antialiased">
<div class="noise-overlay" aria-hidden="true"></div>
<div class="corner-glow" aria-hidden="true"></div>
<div class="corner-glow-bl" aria-hidden="true"></div>
