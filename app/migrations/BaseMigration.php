<?php

namespace Lchski\Migrations;

use Lchski\Contracts\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

abstract class BaseMigration implements Migration
{
    /**
     * The name of our table.
     *
     * @var string
     */
    protected $table;

    /**
     * Drop the table managed by the migration.
     *
     * @return void
     */
    public function down()
    {
        Capsule::schema()
            ->dropIfExists($this->table);
    }
}
