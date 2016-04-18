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
		// Create our MigrationController
		return new MigrationController();
	}
}
