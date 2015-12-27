<?php

namespace Lchski\Helpers;


use Slim\Container;

class OrientDbHelper
{
	protected $phporient;

	public function __invoke(Container $container)
	{
		// Check if our PhpOrient instance has been properly configured.
		if (!$container->has('phporient')) {
			throw new \RuntimeException("DI container does not provide `phporient`");
		}

		$this->phporient = $container->get('phporient');
	}
}
