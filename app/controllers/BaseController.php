<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

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
     * Set our controller instance variables.
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
         * Call the controller method corresponding to the route name.
         */
        call_user_func([$this, $request->getAttribute('route')->getName()]);
    }
}
