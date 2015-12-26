<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function( $request, $response, $args) {
	echo 'Yo';
});

$app->run();