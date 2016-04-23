<?php


namespace Lchski\Migrations;


use Lchski\Contracts\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class AddContentPathToItemsMigration extends BaseMigration implements Migration
{

    protected $table = 'items';

    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        if (Capsule::schema()->hasTable($this->table)) {
            Capsule::schema()->table($this->table, function (Blueprint $table) {
                $table->string('content_path');
            });
        }
    }

}
