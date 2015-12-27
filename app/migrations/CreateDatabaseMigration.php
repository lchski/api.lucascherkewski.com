<?php

namespace Lchski\Migrations;

use Lchski\Contracts\Migration;

class CreateDatabaseMigration extends BaseMigration implements Migration
{
	/**
	 * Using the OrientDB client from our DIC, create the database specified by the ENV variables.
	 */
	public function up()
	{
		$this->phporient->dbCreate(env('DB_NAME', 'lucascherkewskicom'));
	}
}
