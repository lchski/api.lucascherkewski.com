<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class MainController extends BaseController implements Controller
{

	/**
	 * Respond to a GET request to our route.
	 */
	public function get()
	{
		$returnedResponse = $this->response
			->write('yolo');
	}

	public function post()
	{
		// TODO: Implement post() method.
	}
}
