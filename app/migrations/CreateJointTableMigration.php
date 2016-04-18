<?php

namespace Lchski\Migrations;

use Lchski\Contracts\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;


class CreateJointTableMigration extends BaseMigration implements Migration {

    protected $table = 'item_link';

    /**
     * Run the migration.
     *
     * @return void
     */
    public function up() {
        if (! Capsule::schema()->hasTable($this->table)) {
            Capsule::schema()->create($this->table, function (Blueprint $table) {
                $table->increments('id');

                $table->integer('item_id')->unsigned();
                $table->foreign('item_id')->references('id')->on('items');

                $table->integer('link_id')->unsigned();
                $table->foreign('link_id')->references('id')->on('links');
            });
        }
    }

}
