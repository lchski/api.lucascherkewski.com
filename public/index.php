<?php

// The path to our application folder.
define('APP_PATH', __DIR__ . '/../app/');

require APP_PATH . 'bootstrap.php';

$app->any('/', '\\Lchski\\MainController');

$app->any('/things/{id}', '\\Lchski\\ThingController');

$app->run();
