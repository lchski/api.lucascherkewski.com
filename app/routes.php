<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// Version our routes.
$app->group('/v1', function() {
    $this->get('/items', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Item::all();

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });

    $this->get('/links', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Link::all();

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });
});
