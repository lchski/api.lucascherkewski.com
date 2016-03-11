<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// All our API routes, in one place.
$app->group('/api', function() {

    $this->group('/v1', function() {

    });

});
