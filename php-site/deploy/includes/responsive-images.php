<?php
/**
 * Responsive Image Helper Functions
 *
 * Generates responsive image markup with srcset, sizes, and AVIF format support
 * Improves performance by serving appropriately sized images to different devices
 */

/**
 * Generate responsive image markup with srcset and AVIF
 *
 * @param string $basePath Base image path (e.g., '/media/image.webp')
 * @param string $alt Alt text for the image
 * @param array $options Options array with keys:
 *   - sizes: array of responsive breakpoints [640, 1024, 1920]
 *   - width: image width (for aspect ratio)
 *   - height: image height (for aspect ratio)
 *   - loading: 'lazy', 'eager', or 'auto'
 *   - class: CSS classes
 *   - title: image title
 *   - role: ARIA role
 *
 * @return string HTML img tag with srcset
 */
function tml_responsive_image($basePath, $alt, $options = []) {
    $sizes = $options['sizes'] ?? [640, 1024, 1920];
    $width = $options['width'] ?? 1920;
    $height = $options['height'] ?? 1080;
    $loading = $options['loading'] ?? 'lazy';
    $class = $options['class'] ?? '';
    $title = $options['title'] ?? '';
    $role = $options['role'] ?? '';

    // Extract extension and base name
    $pathInfo = pathinfo($basePath);
    $directory = $pathInfo['dirname'];
    $filename = $pathInfo['filename'];
    $ext = strtolower($pathInfo['extension'] ?? 'webp');

    // Build srcset variants (WebP)
    $srcsetParts = [];
    foreach ($sizes as $size) {
        $variant = "{$directory}/{$filename}-{$size}.{$ext}";
        $srcsetParts[] = "{$variant} {$size}w";
    }
    // Add original as fallback
    $srcsetParts[] = "{$basePath} {$width}w";
    $srcset = implode(', ', $srcsetParts);

    // Build sizes attribute (responsive breakpoints)
    $sizes = "(max-width: 640px) 640px, (max-width: 1024px) 1024px, {$width}px";

    // Build picture element with AVIF fallback
    $html = '<picture>';

    // AVIF source
    $avifSrcset = str_replace(".{$ext}", '.avif', $srcset);
    $html .= "\n  <source type=\"image/avif\" srcset=\"{$avifSrcset}\" sizes=\"{$sizes}\">";

    // WebP source
    $html .= "\n  <source type=\"image/webp\" srcset=\"{$srcset}\" sizes=\"{$sizes}\">";

    // Fallback img tag
    $html .= "\n  <img";
    $html .= " src=\"{$basePath}\"";
    $html .= " alt=\"" . tml_e($alt) . "\"";
    if ($width) $html .= " width=\"{$width}\"";
    if ($height) $html .= " height=\"{$height}\"";
    $html .= " loading=\"{$loading}\"";
    if ($class) $html .= " class=\"{$class}\"";
    if ($title) $html .= " title=\"" . tml_e($title) . "\"";
    if ($role) $html .= " role=\"{$role}\"";
    $html .= " />";
    $html .= "\n</picture>";

    return $html;
}

/**
 * Simple srcset generator (for img tags without picture element)
 *
 * @param string $basePath Base image path
 * @param array $breakpoints Responsive sizes [640, 1024, 1920]
 * @return string srcset attribute value
 */
function tml_srcset($basePath, $breakpoints = [640, 1024, 1920]) {
    $pathInfo = pathinfo($basePath);
    $directory = $pathInfo['dirname'];
    $filename = $pathInfo['filename'];
    $ext = strtolower($pathInfo['extension'] ?? 'webp');

    $srcsetParts = [];
    foreach ($breakpoints as $size) {
        $variant = "{$directory}/{$filename}-{$size}.{$ext}";
        $srcsetParts[] = "{$variant} {$size}w";
    }
    $srcsetParts[] = "{$basePath} auto";

    return implode(', ', $srcsetParts);
}

/**
 * Generate sizes attribute for responsive images
 *
 * @param array $breakpoints Responsive sizes
 * @param int $maxWidth Maximum width
 * @return string sizes attribute value
 */
function tml_sizes($breakpoints = [640, 1024, 1920], $maxWidth = 1920) {
    $sizes = [];
    for ($i = 0; $i < count($breakpoints) - 1; $i++) {
        $bp = $breakpoints[$i];
        $sizes[] = "(max-width: {$bp}px) {$bp}px";
    }
    $sizes[] = "{$maxWidth}px";
    return implode(', ', $sizes);
}

/**
 * Lazy load configuration
 *
 * @param bool $lazy Use native lazy loading
 * @return string loading attribute value
 */
function tml_loading($lazy = true) {
    return $lazy ? 'lazy' : 'eager';
}
