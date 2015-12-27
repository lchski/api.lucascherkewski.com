<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use PhpOrient\PhpOrient;

class MigrationController extends BaseController implements Controller
{
	/**
	 * The DIC instance of our PhpOrient.
	 *
	 * @var PhpOrient
	 */
	protected $phporient;

	/**
	 * MigrationController constructor. Grabs the DIC PhpOrient instance from the Factory, sets it as a property.
	 *
	 * @param PhpOrient $phporient
	 */
	public function __construct(PhpOrient $phporient)
	{
		$this->phporient = $phporient;
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
		$migration_class      = new $migration_class_name($this->phporient);

		call_user_func(array($migration_class, $this->args['migrationDirection']));

		$this->response->write('Migration '. $this->args['migrationName'] . ', in direction ' . $this->args['migrationDirection'] . ', run!');
	}
}
