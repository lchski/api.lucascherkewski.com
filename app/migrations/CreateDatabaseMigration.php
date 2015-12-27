<?php

namespace Lchski\Migrations;

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
	 */
	public function __construct(PhpOrient $phporient)
	{
		parent::__construct($phporient);

		$this->database = env('DB_NAME', 'lucascherkewskicom');
	}

	/**
	 * Using the PhpOrient instance from our DIC, create the database specified by the ENV variables.
	 */
	public function up()
	{
		$this->phporient->dbCreate($this->database);
	}

	/**
	 * Using the PhpOrient instance from our DIC, drop the database.
	 */
	public function down()
	{
		$this->phporient->dbDrop($this->database);
	}
}
