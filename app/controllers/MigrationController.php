<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use PhpOrient\PhpOrient;

class MigrationController extends BaseController implements Controller
{
	/**
	 * The DIC instance of our OrientDB client.
	 *
	 * @var PhpOrient
	 */
	protected $orientdb;

	/**
	 * MigrationController constructor. Grabs the DIC OrientDB client from the Factory, sets it as a property.
	 *
	 * @param PhpOrient $orientdb
	 */
	public function __construct(PhpOrient $orientdb)
	{
		$this->orientdb = $orientdb;
	}

	/**
	 * Route all our migration requests to the appropriate Migration.
	 */
	public function get()
	{
		/**
		 * Extract Migration class name and create a new instance of it, passing in our OrientDB client.
		 */
		$migration_class_name = '\\Lchski\\Migrations\\' . $this->args['migrationName'] . 'Migration';
		$migration_class      = new $migration_class_name($this->orientdb);

		call_user_func(array($migration_class, $this->args['migrationDirection']));

		$this->response->write('Migration '. $this->args['migrationName'] . ', in direction ' . $this->args['migrationDirection'] . ', run!');
	}
}
