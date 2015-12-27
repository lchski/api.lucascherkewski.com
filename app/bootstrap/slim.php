<?php

use PhpOrient\PhpOrient;

// Configure our Slim instance.
$configuration = [
	'settings' => [
		'displayErrorDetails' => env('SLIM_DEBUG', false),
	],
	// Create our PhpOrient OrientDB client as part of the DIC.
	'phporient' => function( $c ) {
		$phporient= new PhpOrient();
		$phporient->configure( array(
			'hostname' => env('DB_HOST', 'localhost'),
			'username' => env('DB_USERNAME', 'root'),
			'password' => env('DB_PASSWORD', 'root'),
			'port'     => env('DB_PORT', 2424),
		) );
		$phporient->connect();
		return $phporient;
	},
	// Register factory for creating MigrationController.
	'migration_controller' => new \Lchski\Factories\MigrationControllerFactory,
	'orientdb_helper' => function( $c ) {
		$dbHelper = new \Lchski\Helpers\OrientDbHelper();
		return $dbHelper;
	},
];

// Create our custom Slim container.
$c = new \Slim\Container($configuration);

// Boot up our Slim instance.
$app = new \Slim\App($c);

// Add our global middleware.
$app->add( new \Lchski\TrailingSlashMiddleware );
