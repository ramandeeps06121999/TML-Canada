<?php
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if ($path !== null && $path !== '' && $path !== '/') {
    $file = __DIR__ . $path;
    if (is_file($file)) { return false; }
    $trimmed = rtrim($path, '/');
    $dirIndex = __DIR__ . $trimmed . '/index.php';
    if (is_file($dirIndex)) { require $dirIndex; return; }
}
require __DIR__ . '/index.php';
