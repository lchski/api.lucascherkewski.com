<?php

namespace Lchski;

abstract class Migration
{
	/**
	 * The instance of our Slim app.
	 *
	 * @var \Slim\App
	 */
	protected $app;

	public function __construct() {
		// Access our global Slim instance.
		global $app;

		// Set our Slim instance for our migrations.
		$this->app = $app;
	}
}
