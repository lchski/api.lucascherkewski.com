<?php

namespace Lchski\Migrations;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint;

class CreateThingsTableMigration extends Migration {

	protected $table = 'things';

	/**
	 * Run the migration.
	 *
	 * @return void
	 */
	public function up() {
		if (! Capsule::schema()->hasTable($this->table)) {
			Capsule::schema()->create($this->table, function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->timestamps();
			});
		}
	}

}
