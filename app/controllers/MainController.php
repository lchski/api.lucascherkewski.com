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
		return $this->response
			->write('This is an API. No touchy!');
	}
}
