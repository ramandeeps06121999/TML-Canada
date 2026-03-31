<?php

declare(strict_types=1);

/**
 * Router for PHP's built-in server (php -S). Apache uses .htaccess instead.
 * Usage: php -S 127.0.0.1:8080 -t public public/router.php
 */
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if ($path !== null && $path !== '' && $path !== '/') {
    $file = __DIR__ . $path;
    // Serve static files directly
    if (is_file($file)) {
        return false;
    }
    // Serve directory index.php for static city pages (e.g. /services/seo-in-edmonton)
    $trimmed = rtrim($path, '/');
    $dirIndex = __DIR__ . $trimmed . '/index.php';
    if (is_file($dirIndex)) {
        require $dirIndex;
        return;
    }
}

require __DIR__ . '/index.php';
