<?php

// The path to our application folder.
define('APP_PATH', __DIR__ . '/../app/');

require APP_PATH . 'bootstrap.php';

// Our homepage route.
$app->any('/', '\\Lchski\\MainController');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// All our API routes, in one place.
$app->group('/api', function() {
	$this->get('/things', function( \Slim\Http\Request $request, \Slim\Http\Response $response, array $args ) {
		$response
			->write(
				json_encode( \Lchski\Thing::all() )
			);
	});

	$this->any('/things/{id}', '\\Lchski\\ThingController');
});

$app->run();
