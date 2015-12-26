<?php

namespace Lchski;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BaseController
{
	/**
	 * Catch and direct our request to the appropriate function.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 */
	public function __invoke( Request $request, Response $response, array $args )
	{
		switch( $request->getMethod() ) {
			case 'GET':
				$this->get( $request, $response, $args );
				break;
			case 'POST':
				$this->post( $request, $response, $args );
				break;
		}
	}
}
