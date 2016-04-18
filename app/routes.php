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

    $this->get('/items/{id:[0-9]+}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Item::find(intval($args['id']));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });

    $this->get('/items/{id:[0-9]+}/links', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Item::find(intval($args['id']))->links;

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });

    $this->get('/items/{id:[0-9]+}/items', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Item::find(intval($args['id']))->items();

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });


    $this->post('/items', function(\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $item = \Lchski\Item::create($request->getParsedBody());

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $item, JSON_PRETTY_PRINT )
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

    $this->post('/links', function(\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $requestBody = $request->getParsedBody();

        $item = \Lchski\Link::create($requestBody);

        $item->items()->attach($requestBody['items']);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $item, JSON_PRETTY_PRINT )
            );
    });

    $this->get('/links/{id:[0-9]+}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Link::find(intval($args['id']));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });

    $this->get('/links/{id:[0-9]+}/items', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
        $responseContent = \Lchski\Link::find(intval($args['id']))->items;

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode( $responseContent, JSON_PRETTY_PRINT )
            );
    });
});
