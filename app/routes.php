<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController:index');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// Version our routes.
$app->group('/v1', function() {
    $this->group('/items', function() {
        $this->get('', '\\Lchski\\ItemController')->setName('index');

        $this->post('', '\\Lchski\\ItemController')->setName('createSingle');

        $this->get('/{id:[0-9]+}', '\\Lchski\\ItemController')->setName('getSingle');

        $this->get('/{id:[0-9]+}/links', '\\Lchski\\ItemController')->setName('getSingleLinks');

        $this->get('/{id:[0-9]+}/items', '\\Lchski\\ItemController')->setName('getSingleItems');
    });

    $this->group('/links', function() {
        $this->get('', '\\Lchski\\LinkController')->setName('index');

        $this->post('', '\\Lchski\\LinkController')->setName('createSingle');

        $this->get('/{id:[0-9]+}', '\\Lchski\\LinkController')->setName('getSingle');

        $this->get('/{id:[0-9]+}/items', '\\Lchski\\LinkController')->setName('getSingleItems');
    });
});
