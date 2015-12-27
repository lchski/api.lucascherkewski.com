<?php

namespace Lchski\Migrations;

class CreateDatabaseMigration extends Migration
{
	public function up()
	{
		$this->orientdb->dbCreate(env('DB_NAME', 'lucascherkewskicom'));
	}
}
