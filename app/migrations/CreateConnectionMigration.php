<?php

namespace Lchski\Migrations;


use Lchski\Contracts\Migration;

class CreateConnectionMigration extends BaseMigration implements Migration
{
	/**
	 * Create a dummy connection.
	 */
	public function up()
	{
		$this->dbHelper->createConnection(array('from' => "(select from V where name = 'DummyVertex')", 'to' => "(select from V where name = 'DummyVertex')"), array('description' => 'Yoyo!'));
	}

	/**
	 * Delete the connection.
	 */
	public function down()
	{
		$this->dbHelper->deleteConnections(array('from' => "(select from V where name = 'DummyVertex')", 'to' => "(select from V where name = 'DummyVertex')"));
	}
}
