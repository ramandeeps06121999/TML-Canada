<?php

declare(strict_types=1);

// Security Headers
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

ini_set('memory_limit', '256M');

define('TML_ROOT', __DIR__);
define('TML_DATA', TML_ROOT . '/data');
define('TML_VIEWS', TML_ROOT . '/views');
define('TML_INCLUDES', TML_ROOT . '/includes');

const TML_SITE_URL = 'https://townmedialabs.ca';
const TML_GA4_ID = 'G-W4QNSM9THF';

require_once TML_INCLUDES . '/helpers.php';
require_once TML_INCLUDES . '/data.php';
require_once TML_INCLUDES . '/schema.php';
