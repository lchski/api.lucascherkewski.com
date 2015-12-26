<?php

namespace Lchski;

class BaseController
{
	/**
	 * Catch and direct our request to the appropriate function.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 */
	public function __invoke( $request, $response, $args )
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
