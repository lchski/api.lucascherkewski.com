<?php

namespace Lchski\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

abstract class Migration
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
	protected static function down() {
		Capsule::schema()
			->dropIfExists($this->table);
	}
}
