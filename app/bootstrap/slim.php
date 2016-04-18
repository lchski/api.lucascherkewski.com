<?php

// Configure our Slim instance.
$configuration = [
	'settings' => [
		'displayErrorDetails' => env('SLIM_DEBUG', false),
	],
	// Register factory for creating MigrationController.
	'migration_controller' => new \Lchski\Factories\MigrationControllerFactory
];

// Create our custom Slim container.
$c = new \Slim\Container($configuration);

// Boot up our Slim instance.
$app = new \Slim\App($c);

// Add our global middleware.
$app->add( new \Lchski\TrailingSlashMiddleware );
