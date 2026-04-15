<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$segments = $path === '' ? [] : explode('/', $path);

$servicePages = tml_service_pages();
$locations = tml_locations();
$blogArticles = tml_blog_articles();

// --- Route ---
if (count($segments) === 0) {
    require TML_VIEWS . '/home.php';
    exit;
}

// Sitemap
if ($path === 'sitemap.xml') {
    require TML_VIEWS . '/sitemap-xml.php';
    exit;
}

// Robots.txt (dynamic, so the sitemap URL is always correct)
if ($path === 'robots.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    echo "User-agent: *\nAllow: /\n\nSitemap: " . TML_SITE_URL . "/sitemap.xml\n";
    exit;
}

if ($segments[0] === 'services' && count($segments) === 1) {
    require TML_VIEWS . '/services-index.php';
    exit;
}

if ($segments[0] === 'services' && count($segments) === 2) {
    $slug = $segments[1];
    $parsed = tml_parse_location_service_slug($slug, $locations);
    if ($parsed !== null) {
        $svc = $parsed['serviceSlug'];
        if (!isset($servicePages[$svc]) || !isset($locations[$parsed['locationSlug']])) {
            require TML_VIEWS . '/404.php';
            exit;
        }
        $GLOBALS['tml_route'] = ['type' => 'location-service', 'parsed' => $parsed];
        require TML_VIEWS . '/location-service.php';
        exit;
    }
    if (isset($servicePages[$slug])) {
        $GLOBALS['tml_route'] = ['type' => 'service', 'slug' => $slug];
        require TML_VIEWS . '/service-detail.php';
        exit;
    }
    require TML_VIEWS . '/404.php';
    exit;
}

if ($segments[0] === 'blog' && count($segments) === 1) {
    require TML_VIEWS . '/blog-index.php';
    exit;
}

if ($segments[0] === 'blog' && count($segments) === 2) {
    $bslug = $segments[1];
    if (!isset($blogArticles[$bslug])) {
        require TML_VIEWS . '/404.php';
        exit;
    }
    $GLOBALS['tml_blog_slug'] = $bslug;
    require TML_VIEWS . '/blog-article.php';
    exit;
}

// --- Static pages ---
$staticPages = [
    'about-us' => '/about.php',
    'contact-us' => '/contact.php',
    'portfolio' => '/portfolio.php',
    'careers' => '/careers.php',
    'privacy-policy' => '/privacy-policy.php',
    'terms-of-service' => '/terms-of-service.php',
    'free-tools' => '/free-tools.php',
];
if (count($segments) === 1 && isset($staticPages[$segments[0]])) {
    require TML_VIEWS . $staticPages[$segments[0]];
    exit;
}

// --- Industries ---
if ($segments[0] === 'industries' && count($segments) === 1) {
    require TML_VIEWS . '/industries-index.php';
    exit;
}
if ($segments[0] === 'industries' && count($segments) === 2) {
    $GLOBALS['tml_industry_slug'] = $segments[1];
    require TML_VIEWS . '/industry-detail.php';
    exit;
}

// Optional: legacy redirects (match next.config)
$redirects = [
    'about' => '/about-us',
    'contact' => '/contact-us',
    'carrer' => '/careers',
    // 'services/digital-marketing' => '/services/seo', // Removed: digital-marketing now has its own service page
    'blog/website-not-showing-on-google' => '/blog/website-not-showing-on-google-fix',
];
$rkey = implode('/', $segments);
if (isset($redirects[$rkey])) {
    header('Location: ' . $redirects[$rkey], true, 301);
    exit;
}

require TML_VIEWS . '/404.php';
