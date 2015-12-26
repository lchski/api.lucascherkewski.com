<?php

require __DIR__ . '/../app/bootstrap.php';

$app->get('/', function( $request, $response, $args) {
	echo 'Yo';
	echo $_ENV['DB_NAME'];
});

$app->run();