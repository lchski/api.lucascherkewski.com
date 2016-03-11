<?php

namespace Lchski\Contracts;


interface Migration
{
    protected $table;

    public function up();

    public function down();
}
