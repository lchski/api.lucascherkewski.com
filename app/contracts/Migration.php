<?php

namespace Lchski\Contracts;


use PhpOrient\PhpOrient;

interface Migration
{
	public function __construct( PhpOrient $phporient, DbHelper $dbHelper );
}
