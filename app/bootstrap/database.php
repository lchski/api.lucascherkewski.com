<?php

use \Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

// Set up our default DB connection.
$capsule->addConnection([
    'driver'    => env('DB_DRIVER', 'mysql'),
    'host'      => env('DB_HOST', 'localhost'),
    'database'  => env('DB_NAME', 'database'),
    'username'  => env('DB_USERNAME', 'root'),
    'password'  => env('DB_PASSWORD', 'password'),
    'charset'   => env('DB_CHARSET', 'utf8'),
    'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
    'prefix'    => env('DB_PREFIX', ''),
]);

// Allow our Capsule instance to be accessed via static methods.
$capsule->setAsGlobal();

// Set up the Eloquent ORM.
$capsule->bootEloquent();
