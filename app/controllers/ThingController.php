<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class ThingController extends BaseController implements Controller
{
	public function get()
	{
		echo "hello" . $this->args['id'];
	}

	public function post()
	{

	}
}
