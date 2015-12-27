<?php

namespace Lchski\Factories;


use Lchski\MigrationController;
use Slim\Container;

class MigrationControllerFactory
{
	/**
	 * Factory for creating MigrationController.
	 *
	 * This allows us to grab services from the DIC, and pass them to our controller via proper separation of concerns.
	 *
	 * @param Container $container
	 * @return MigrationController
	 */
	public function __invoke(Container $container)
	{
		// Check if our PhpOrient instance has been properly configured.
		if (!$container->has('phporient')) {
			throw new \RuntimeException("DI container does not provide `phporient`");
		}

		$phporient = $container->get('phporient');

		// Check if our OrientDB client has been properly configured.
		if (!$container->has('orientdb_helper')) {
			throw new \RuntimeException("DI container does not provide `orientdb_helper`");
		}

		$orientdb_helper = $container->get('orientdb_helper');

		// Create our MigrationController, passing in the PhpOrient instance and our OrientDB helper to its __construct().
		return new MigrationController($phporient, $orientdb_helper);
	}
}
