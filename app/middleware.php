<?php

/**
 * Load all our application's middleware.
 */
define('MIDDLEWARE_PATH', APP_PATH . 'middleware/');

require MIDDLEWARE_PATH . 'TrailingSlash.php';