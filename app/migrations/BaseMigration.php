<?php

namespace Lchski\Migrations;

use Lchski\Contracts\Migration;
use PhpOrient\PhpOrient;

abstract class BaseMigration implements Migration
{
	/**
	 * @var PhpOrient
	 */
	protected $phporient;

	/**
	 * Grab the OrientDB client and set it as a property, accessible by any Migration.
	 * @param PhpOrient $phporient
	 */
	public function __construct( PhpOrient $phporient )
	{
		$this->phporient = $phporient;
	}
}
