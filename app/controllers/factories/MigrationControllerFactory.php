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
		// Check if our OrientDB client has been properly configured.
		if (!$container->has('phporient')) {
			throw new \RuntimeException("DI container does not provide `phporient`");
		}

		$orientdb = $container->get('phporient');

		// Create our MigrationController, passing in the OrientDB client to its __construct().
		return new MigrationController($orientdb);
	}
}
