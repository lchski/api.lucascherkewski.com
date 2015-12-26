<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class ThingController extends BaseController implements Controller
{
	/**
	 * Catch and direct our request to the appropriate function.
	 * Path: '/things/{id}'
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 */
	public function __invoke( $request, $response, $args )
	{
		parent::__invoke( $request, $response, $args );
	}
}
