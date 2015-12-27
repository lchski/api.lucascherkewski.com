<?php

namespace Lchski\Migrations;

class CreateDatabaseMigration extends BaseMigration
{
	/**
	 * Using the OrientDB client from our DIC, create the database specified by the ENV variables.
	 */
	public function up()
	{
		$this->orientdb->dbCreate(env('DB_NAME', 'lucascherkewskicom'));
	}
}
