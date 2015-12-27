<?php

namespace Lchski\Contracts;


use PhpOrient\PhpOrient;

interface Migration
{
	protected $orientdb;

	public function __construct( PhpOrient $orientdb );
}
