<?php

declare(strict_types=1);

ini_set('memory_limit', '256M');

define('TML_ROOT', __DIR__);
define('TML_DATA', TML_ROOT . '/data');
define('TML_VIEWS', TML_ROOT . '/views');
define('TML_INCLUDES', TML_ROOT . '/includes');

const TML_SITE_URL = 'https://townmedialabs.ca';

require_once TML_INCLUDES . '/helpers.php';
require_once TML_INCLUDES . '/data.php';
require_once TML_INCLUDES . '/schema.php';
