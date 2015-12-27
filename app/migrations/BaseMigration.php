<?php

namespace Lchski\Migrations;

use Lchski\Contracts\DbHelper;
use Lchski\Contracts\Migration;
use PhpOrient\PhpOrient;

abstract class BaseMigration implements Migration
{
	/**
	 * @var PhpOrient
	 */
	protected $phporient;

	/**
	 * @var DbHelper
	 */
	protected $dbHelper;

	/**
	 * Grab the OrientDB client and set it as a property, accessible by any Migration.
	 * @param PhpOrient $phporient
	 */
	public function __construct( PhpOrient $phporient, DbHelper $dbHelper )
	{
		$this->phporient = $phporient;
		$this->dbHelper  = $dbHelper;
	}
}
