<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController')->setName('index');

$app->group('/migrations', function () {
    $this->get('/{migrationName}/{migrationDirection}', '\\Lchski\\MigrationController')->setName('processMigration');
});

// Version our routes.
$app->group('/v1', function () {
    // Group routes related to Items.
    $this->group('/items', function () {
        // Map each REST action for an Item to an ItemController method.
        $this->get('', '\\Lchski\\ItemController')->setName('index');

        $this->post('', '\\Lchski\\ItemController')->setName('createSingle');

        $this->get('/{id:[0-9]+}', '\\Lchski\\ItemController')->setName('getSingle');

        $this->delete('/{id:[0-9]+}', '\\Lchski\\ItemController')->setName('deleteSingle');

        $this->get('/{id:[0-9]+}/links', '\\Lchski\\ItemController')->setName('getSingleLinks');

        $this->get('/{id:[0-9]+}/items', '\\Lchski\\ItemController')->setName('getSingleItems');
    });

    // Group routes related to Links.
    $this->group('/links', function () {
        // Map each REST action for a Link to a LinkController method.
        $this->get('', '\\Lchski\\LinkController')->setName('index');

        $this->post('', '\\Lchski\\LinkController')->setName('createSingle');

        $this->get('/{id:[0-9]+}', '\\Lchski\\LinkController')->setName('getSingle');

        $this->delete('/{id:[0-9]+}', '\\Lchski\\LinkController')->setName('deleteSingle');

        $this->get('/{id:[0-9]+}/items', '\\Lchski\\LinkController')->setName('getSingleItems');
    });
});
