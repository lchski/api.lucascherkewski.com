<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use PhpOrient\PhpOrient;

class MigrationController extends BaseController implements Controller
{
	protected $orientdb;

	public function __construct(PhpOrient $orientdb)
	{
		$this->orientdb = $orientdb;
	}

	/**
	 * Route all our migration requests to the appropriate Migration.
	 */
	public function get()
	{
		$migration_class_name = '\\Lchski\\Migrations\\' . $args['migrationName'] . 'Migration';
		$migration_class      = new $migration_class_name($this->orientdb);

		call_user_func($migration_class, $args['migrationDirection']);

		$this->response->write('Migration '. $args['migrationName'] . ', in direction ' . $args['migrationDirection'] . ', run!');
	}
}
