<?php

namespace Lchski\Migrations;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint;
use Lchski\Thing;

class PopulateThingsTableMigration extends Migration
{
	protected $table = 'things';

	public function up() {
		if ( Capsule::schema()->hasTable($this->table)) {
			for ( $i = 1; $i <= 10; $i++ ) {
				$title = md5(time());

				$thing = new Thing;

				$thing->title = $title;

				$thing->save();
			}
		}
	}

}
