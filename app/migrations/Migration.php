<?php

namespace Lchski\Migrations;

use PhpOrient\PhpOrient;

class Migration
{
	/**
	 * @var App
	 */
	protected orientdb;

	protected function __construct( PhpOrient $orientdb )
	{
		$this->orientdb = $orientdb;
	}
}
