<?php

namespace Lchski\Contracts;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Controller
{
	public function __invoke( Request $request, Response $response, array $args );
}