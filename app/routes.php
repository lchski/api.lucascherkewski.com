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

        $this->group('/{id:[0-9]+}', function () {
            $this->get('', '\\Lchski\\ItemController')->setName('getSingle');

            $this->group('/content', function() {
                $this->map(['POST', 'PUT'], '', '\\Lchski\\ItemController')->setName('setSingleContent');

                $this->get('', '\\Lchski\\ItemController')->setName('getSingleContent');

                $this->delete('', '\\Lchski\\ItemController')->setName('deleteSingleContent');
            });

            $this->get('/links', '\\Lchski\\ItemController')->setName('getSingleLinks');

            $this->get('/items', '\\Lchski\\ItemController')->setName('getSingleItems');

            $this->get('/linksWithItems', '\\Lchski\\ItemController')->setName('getSingleLinksWithItems');

            $this->put('', '\\Lchski\\ItemController')->setName('updateSingle');

            $this->delete('', '\\Lchski\\ItemController')->setName('deleteSingle');
        });
    });

    // Group routes related to Links.
    $this->group('/links', function () {
        // Map each REST action for a Link to a LinkController method.
        $this->get('', '\\Lchski\\LinkController')->setName('index');

        $this->post('', '\\Lchski\\LinkController')->setName('createSingle');

        $this->group('/{id:[0-9]+}', function () {
            $this->get('', '\\Lchski\\LinkController')->setName('getSingle');

            $this->group('/content', function() {
                $this->map(['POST', 'PUT'], '', '\\Lchski\\LinkController')->setName('setSingleContent');

                $this->get('', '\\Lchski\\LinkController')->setName('getSingleContent');

                $this->delete('', '\\Lchski\\LinkController')->setName('deleteSingleContent');
            });

            $this->get('/items', '\\Lchski\\LinkController')->setName('getSingleItems');

            $this->put('', '\\Lchski\\LinkController')->setName('updateSingle');

            $this->delete('', '\\Lchski\\LinkController')->setName('deleteSingle');
        });
    });
});
