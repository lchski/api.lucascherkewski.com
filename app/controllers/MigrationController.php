<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class MigrationController extends BaseController implements Controller
{
    /**
     * Route all our migration requests to the appropriate Migration.
     */
    public function get()
    {
        /**
         * Extract Migration class name and create a new instance of it.
         */
        $migration_class_name = '\\Lchski\\Migrations\\' . $this->args['migrationName'] . 'Migration';
        $migration_class = new $migration_class_name();

        call_user_func(array($migration_class, $this->args['migrationDirection']));

        $this->response->write('Migration ' . $this->args['migrationName'] . ', in direction ' . $this->args['migrationDirection'] . ', run!');
    }
}
