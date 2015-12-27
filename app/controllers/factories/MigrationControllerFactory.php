<?php

namespace Lchski\Factories;


use Lchski\MigrationController;
use Slim\Container;

class MigrationControllerFactory
{
	public function __invoke(Container $container)
	{
		if (!$container->has('orientdb')) {
			throw new \RuntimeException("DI container does not provide `orientdb`");
		}

		$orientdb = $container->get('orientdb');

		return new MigrationController($orientdb);
	}
}
