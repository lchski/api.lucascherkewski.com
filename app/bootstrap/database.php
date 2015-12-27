<?php

use PhpOrient\PhpOrient;

$phporient= new PhpOrient();
$phporient->configure( array(
	'hostname' => env('DB_HOST', 'localhost'),
	'username' => env('DB_USERNAME', 'root'),
	'password' => env('DB_PASSWORD', 'root'),
	'port'     => env('DB_PORT', 2424),
) );
