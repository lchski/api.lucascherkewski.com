<?php

// Our homepage route.
$app->any('/', '\\Lchski\\MainController');

$app->group('/migrations', function() {
	$this->get('/{migrationName}/{migrationDirection}', 'migration_controller');
});

// All our API routes, in one place.
$app->group('/api', function() {

    $this->group('/v1', function() {

        $this->any('/nodes', function( \Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
            $dbHelper = $this->get('orientdb_helper');

            switch( $request->getMethod() ) {
                case 'GET':
                    $responseContent = $dbHelper->getAllNodes();
                    break;
                case 'POST':
                    $responseContent = $dbHelper->createNode($request->getParsedBody());
                    break;
                default:
                    $responseContent = 'No response defined for that API method.';
                    break;
            }

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->write(
                    json_encode( $responseContent, JSON_PRETTY_PRINT )
                );
        });

        $this->any('/nodes/{node_cluster}/{node_id}', function( \Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
            $dbHelper = $this->get('orientdb_helper');

            $rid = '#' . $args['node_cluster'] . ':' . $args['node_id'];

            switch( $request->getMethod() ) {
                case 'GET':
                    $responseContent = $dbHelper->getNodes(array("@rid" => $rid));
                    break;
                case 'DELETE':
                    $responseContent = $dbHelper->deleteNodes(array("@rid" => $rid));
                    break;
                default:
                    $responseContent = 'No response defined for that API method.';
                    break;
            }

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->write(
                    json_encode( $responseContent, JSON_PRETTY_PRINT )
                );
        });

        $this->any('/connections', function( \Slim\Http\Request $request, \Slim\Http\Response $response, array $args) {
            $dbHelper = $this->get('orientdb_helper');

            switch( $request->getMethod() ) {
                case 'GET':
                    $responseContent = $dbHelper->getAllConnections();
                    break;
                case 'POST':
                    $responseContent = $dbHelper->createConnection($request->getParsedBody());
                    break;
                default:
                    $responseContent = 'No response defined for that API method.';
                    break;
            }

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->write(
                    json_encode( $responseContent, JSON_PRETTY_PRINT )
                );
        });
    });

});
