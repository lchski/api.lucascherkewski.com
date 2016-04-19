<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController:index');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// Version our routes.
$app->group('/v1', function() {
    $this->get('/items', '\\Lchski\\ItemController')->setName('index');

    $this->post('/items', '\\Lchski\\ItemController')->setName('createSingle');

    $this->get('/items/{id:[0-9]+}', '\\Lchski\\ItemController')->setName('getSingle');

    $this->get('/items/{id:[0-9]+}/links', '\\Lchski\\ItemController')->setName('getSingleLinks');

    $this->get('/items/{id:[0-9]+}/items', '\\Lchski\\ItemController')->setName('getSingleItems');

    $this->get('/links', '\\Lchski\\LinkController')->setName('index');

    $this->post('/links', '\\Lchski\\LinkController')->setName('createSingle');

    $this->get('/links/{id:[0-9]+}', '\\Lchski\\LinkController')->setName('getSingle');

    $this->get('/links/{id:[0-9]+}/items', '\\Lchski\\LinkController')->setName('getSingleItems');
});
