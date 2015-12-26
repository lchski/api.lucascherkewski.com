<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class MainController extends BaseController implements Controller
{
	/**
	 * Catch and direct our request to the appropriate function.
	 * Path: '/'
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 */
	public function __invoke( Request $request, Response $response, array $args )
	{
		parent::__invoke( $request, $response, $args );
	}

	/**
	 * Respond to a GET request to our route.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 */
	public function get( Request $request, Response $response, array $args )
	{
		$returnedResponse = $response
			->write(json_encode($args));
	}
}
