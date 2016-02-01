<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Lchski\Contracts\DbHelper;
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
     * @var DbHelper
     */
    protected $dbHelper;

    /**
     * MigrationController constructor. Grabs the DIC PhpOrient instance from the Factory, sets it as a property.
     *
     * @param PhpOrient $phporient
     * @param DbHelper $dbHelper
     */
    public function __construct(PhpOrient $phporient, DbHelper $dbHelper)
    {
        $this->phporient = $phporient;
        $this->dbHelper  = $dbHelper;
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
        $migration_class      = new $migration_class_name($this->phporient, $this->dbHelper);

        call_user_func(array($migration_class, $this->args['migrationDirection']));

        $this->response->write('Migration '. $this->args['migrationName'] . ', in direction ' . $this->args['migrationDirection'] . ', run!');
    }
}
