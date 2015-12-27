<?php

namespace Lchski\Contracts;


use PhpOrient\PhpOrient;

interface Migration
{
	/**
	 * An OrientDB client.
	 *
	 * @var PhpOrient
	 */
	protected $orientdb;

	public function __construct( PhpOrient $orientdb );
}
