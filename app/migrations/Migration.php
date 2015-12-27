<?php

namespace Lchski\Migrations;

use PhpOrient\PhpOrient;

abstract class BaseMigration
{
	/**
	 * @var PhpOrient
	 */
	protected $orientdb;

	/**
	 * Grab the OrientDB client and set it as a property, accessible by any Migration.
	 * @param PhpOrient $orientdb
	 */
	public function __construct( PhpOrient $orientdb )
	{
		$this->orientdb = $orientdb;
	}
}
