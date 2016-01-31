<?php

namespace Lchski\Migrations;

use Lchski\Contracts\DbHelper;
use Lchski\Contracts\Migration;
use PhpOrient\PhpOrient;

class CreateDatabaseMigration extends BaseMigration implements Migration
{
	/**
	 * The database on which we're performing our migration.
	 *
	 * @var mixed
	 */
	protected $database;

	/**
	 * CreateDatabaseMigration constructor.
	 * @param PhpOrient $phporient
	 * @param DbHelper $dbHelper
	 */
	public function __construct(PhpOrient $phporient, DbHelper $dbHelper)
	{
		parent::__construct($phporient, $dbHelper);

		$this->database = env('DB_NAME', 'lucascherkewskicom');
	}

	/**
	 * Using the PhpOrient instance from our DIC, create the database specified by the ENV variables.
	 */
	public function up()
	{
		$this->phporient->connect();
		if ( ! $this->phporient->dbExists($this->database) )
			$this->phporient->dbCreate($this->database);
	}

	/**
	 * Using the PhpOrient instance from our DIC, drop the database.
	 */
	public function down()
	{
		$this->phporient->connect();
		if ( $this->phporient->dbExists($this->database) )
			$this->phporient->dbDrop($this->database);
	}
}
