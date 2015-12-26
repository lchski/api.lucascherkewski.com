<?php

namespace Lchski;

use \Illuminate\Database\Capsule\Manager as Capsule;

class CreateThingsTableMigration extends Migration {

	public function __construct() {
		parent::__construct();

		$this->app->get('/migration/create_things_table', function($request, $response, $args) {
			Capsule::schema()->create('things', function($table) {
				$table->increments('id');
				$table->string('title');
			});

			echo "Done.";
		});
	}

}
