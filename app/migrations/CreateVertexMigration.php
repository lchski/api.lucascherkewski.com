<?php

namespace Lchski\Migrations;


use Lchski\Contracts\Migration;

class CreateVertexMigration extends BaseMigration implements Migration
{
	/**
	 * Create a dummy node.
	 */
	public function up()
	{
		$this->dbHelper->createNode(array('name' => 'DummyVertex'));
	}

	/**
	 * Delete the node.
	 */
	public function down()
	{
		$this->dbHelper->deleteNodes(array('name' => 'DummyVertex'));
	}
}
