<?php

namespace Lchski\Contracts;

use Interop\Container\ContainerInterface;

interface Controller
{
	public function __construct( ContainerInterface $containerInterface );
}
