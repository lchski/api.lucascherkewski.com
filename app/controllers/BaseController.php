<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

abstract class BaseController implements Controller
{
	/**
	 * Our Slim Request object.
	 *
	 * @var Request $request
	 */
	protected $request;

	/**
	 * Our Slim Response object.
	 *
	 * @var Response $response
	 */
	protected $response;

	/**
	 * The arguments to our Slim route.
	 *
	 * @var array $args
	 */
	protected $args;

	/**
	 * Catch and direct our request to the appropriate function.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 */
	public function __invoke( Request $request, Response $response, array $args )
	{
		/**
		 * Set our controllers parameters to the route's.
		 */
		$this->request  = $request;
		$this->response = $response;
		$this->args     = $args;

		/**
		 * Pass request off to the proper function.
		 */
		switch( $request->getMethod() ) {
			case 'GET':
				$this->get();
				break;
			case 'POST':
				$this->post();
				break;
		}
	}
}
