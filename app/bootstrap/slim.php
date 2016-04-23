<?php

// Configure our Slim instance.
$configuration = [
    'settings'             => [
        'displayErrorDetails' => env('SLIM_DEBUG', false),
    ],
    // Register factory for creating MigrationController.
    'migration_controller' => new \Lchski\Factories\MigrationControllerFactory,
];

// Create our custom Slim container.
$c = new \Slim\Container($configuration);

// Configure Slim's HTTP caching plugin.
$c['cache'] = function () {
    return new \Slim\HttpCache\CacheProvider();
};

// Configure storage provider, Flysystem.
$c['storage'] = function() {
    $adapter = new \League\Flysystem\Adapter\Local(__DIR__ . '/../..' . env('STORAGE_ROOT_DIR', '/../storage/'));

    return new \League\Flysystem\Filesystem($adapter);
};

// Boot up our Slim instance.
$app = new \Slim\App($c);

// Add our global middleware.
$app->add(new \Lchski\TrailingSlashMiddleware);

$app->add(new \Slim\HttpCache\Cache('private', 300, true));

$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    'users'   => [
        env('API_USERNAME') => env('API_PASSWORD'),
    ],
    'relaxed' => ['localhost', 'lucascherkewski.dev', 'api.lucascherkewski.dev'],
    'rules'   => [
        new \Slim\Middleware\HttpBasicAuthentication\RequestPathRule([
            'path' => '/',
        ]),
        new \Slim\Middleware\HttpBasicAuthentication\RequestMethodRule([
            'passthrough' => ['GET', 'OPTIONS'],
        ]),
    ],
]));
