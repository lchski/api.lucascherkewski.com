<?php

// Load our Composer components.
require __DIR__ . '/../vendor/autoload.php';

// Load our helpers.
require __DIR__ . '/helpers.php';

// Load our Dotenv variables.
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Boot up our Slim instance.
$app = new \Slim\App;