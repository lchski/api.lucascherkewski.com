<?php

namespace Lchski\Contracts;


interface Migration
{
    public function up();

    public function down();
}
