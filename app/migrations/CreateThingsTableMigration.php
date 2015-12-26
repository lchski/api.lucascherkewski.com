<?php

namespace Lchski;

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
		Capsule::schema()->create($this->table, function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->timestamps();
		});
	}

}
