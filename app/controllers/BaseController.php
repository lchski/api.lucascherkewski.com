<?php

namespace Lchski;

use Interop\Container\ContainerInterface;
use Lchski\Contracts\Controller;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

abstract class BaseController implements Controller
{
    /**
     * The Slim Container object.
     *
     * @var ContainerInterface
     */
    protected $ci;

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
     * @param ContainerInterface $containerInterface
     * @internal param Request $request
     * @internal param Response $response
     * @internal param array $args
     */
    public function __construct( ContainerInterface $containerInterface )
    {
        /**
         * Set our controllers parameters to the route's.
         */
        $this->ci       = $containerInterface;
        $this->request  = $containerInterface->get('request');
        $this->response = $containerInterface->get('response');
        $this->args     = $this->request->getAttributes();
    }
}
