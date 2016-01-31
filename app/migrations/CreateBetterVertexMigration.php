<?php

namespace Lchski\Migrations;


use Lchski\Contracts\Migration;

class CreateBetterVertexMigration extends BaseMigration implements Migration
{
	/**
	 * Create a dummy node with smart data.
	 */
	public function up()
	{
		$userDataFromApi = json_decode(file_get_contents('https://randomuser.me/api/'), true);

		$insertData = $userDataFromApi['results'][0]['user'];
		$insertData['migration'] = 'CreateBetterVertexMigration';

		$this->dbHelper->createNode($insertData);
	}

	/**
	 * Delete all our smart data dummy nodes.
	 */
	public function down()
	{
		$this->dbHelper->deleteNodes(array('migration' => 'CreateBetterVertexMigration'));
	}
}
