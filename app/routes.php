<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// All our API routes, in one place.
$app->group('/api', function() {
	$this->get('/things', function( \Slim\Http\Request $request, \Slim\Http\Response $response, array $args ) {
		$dbHelper = $this->get('orientdb_helper');

		$response
			->write(
				json_encode( $dbHelper->getAllNodes() )
			);
	});

	$this->any('/things/{id}', '\\Lchski\\ThingController');
});
