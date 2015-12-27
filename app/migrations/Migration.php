<?php

namespace Lchski\Migrations;

use PhpOrient\PhpOrient;

class Migration
{
	/**
	 * @var PhpOrient
	 */
	protected $orientdb;

	public function __construct( PhpOrient $orientdb )
	{
		$this->orientdb = $orientdb;
	}
}
