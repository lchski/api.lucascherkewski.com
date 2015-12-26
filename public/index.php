<?php

// The path to our application folder.
define('APP_PATH', __DIR__ . '/../app/');

require APP_PATH . 'bootstrap.php';
require APP_PATH . 'middleware.php';
require APP_PATH . 'models.php';
require APP_PATH . 'routes.php';

$app->get('/', function( $request, $response, $args) {
	echo 'Yo';
	echo $_ENV['DB_NAME'];
});

$app->run();