<?php

namespace Lchski\Helpers;

use Lchski\Contracts\DbHelper;
use PhpOrient\PhpOrient;
use Slim\Container;

class OrientDbHelper implements DbHelper
{
	/**
	 * Our PhpOrient instance.
	 *
	 * @var PhpOrient
	 */
	protected $phporient;

    /**
     * Our OrientDB SQL helper.
     *
     * @var OrientSqlHelper
     */
    protected $sqlhelper;

	/**
	 * Catch our DI Container from Slim.
	 *
	 * @param Container $container
	 * @return mixed
	 */
	public function __construct(Container $container)
	{
		// Check if our PhpOrient instance has been properly configured.
		if (!$container->has('phporient')) {
			throw new \RuntimeException("DI container does not provide `phporient`");
		}

		$this->phporient = $container->get('phporient');

        // Check if our SQL helper instance has been properly configured.
        if (!$container->has('orientsql_helper')) {
            throw new \RuntimeException("DI container does not provide `orientsql_helper`");
        }

        $this->sqlhelper = $container->get('orientsql_helper');

		if ( $this->phporient->dbExists(env('DB_NAME', 'lucascherkewskicom')) )
			$this->phporient->dbOpen(env('DB_NAME', 'lucascherkewskicom'));
	}

	/**
	 * Create a node, with a variable set of properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	public function createNode(array $nodeProperties)
	{
		return $this->phporient->command('CREATE VERTEX V CONTENT ' . json_encode($nodeProperties));
	}

	/**
	 * Create a connection between two nodes.
	 *
	 * @param array $connectionParameters
	 * @param array $connectionProperties
	 * @return mixed
	 */
	public function createConnection(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = array())
	{
		// Our base command.
		$command = 'CREATE EDGE E';

		// Add our source.
		if (isset($connectionParameters['from']))
			$command .= ' FROM ' . $connectionParameters['from'];

		// Add our destination.
		if (isset($connectionParameters['to']))
			$command .= ' TO ' . $connectionParameters['to'];

		// If we've got special content for our connection, add it.
		if (isset($connectionProperties))
			$command .= ' CONTENT ' . json_encode($connectionProperties);

		return $this->phporient->command($command);
	}

	/**
	 * Get one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	public function getNodes(array $nodeProperties)
	{
		return $this->phporient->query('SELECT * from VERTEX WHERE ' . $this->sqlhelper->arrayToSql($nodeProperties));
	}

    /**
     * Get one or more connections based on properties.
     *
     * @param array $connectionParameters
     * @param array $connectionProperties
     * @return mixed
     */
    public function getNodesViaConnection(array $connectionParameters = array('from' => array(), 'to' => array()), array $connectionProperties = array())
    {
        // Our base command
        $command = 'SELECT expand( ';

        // Check if we're going out
        if (isset($connectionParameters['from']) && ! empty($connectionParameters['from']))
            $command .= ' out() ) FROM V WHERE ' . $this->sqlhelper->arrayToSql($connectionParameters['from']);

        // Check if we're going in
        if (isset($connectionParameters['to']) && ! empty($connectionParameters['to']))
            $command .= ' in() ) FROM V WHERE ' . $this->sqlhelper->arrayToSql($connectionParameters['to']);

        return $this->phporient->command($command);
    }

	/**
	 * Get all nodes.
	 *
	 * @return mixed
	 */
	public function getAllNodes($limit = 20)
	{
		return $this->phporient->query('SELECT * FROM V LIMIT ' . $limit);
	}

    /**
     * Get one or more nodes via the connections between them.
     *
     * @param  array  $connectionNode
     * @param  array  $connectionProperties
     * @return mixed
     */
    function getConnections(array $connectionNode = array(), array $connectionProperties = array())
    {
        // Verify we're good for it, then assemble our command
        if (isset($connectionNode) && ! empty($connectionNode))
            $command = 'SELECT expand( both() ) FROM V WHERE ' . $this->sqlhelper->arrayToSql($connectionNode);

        return $this->phporient->command($command);
    }

	/**
	 * Get all connections.
	 *
	 * @return mixed
	 */
	public function getAllConnections($limit = 20)
	{
		return $this->phporient->query('SELECT * FROM E LIMIT ' . $limit);
	}

	/**
	 * Delete one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	public function deleteNodes(array $nodeProperties)
	{
		return $this->phporient->command('DELETE VERTEX WHERE ' . $this->sqlhelper->arrayToSql($nodeProperties));
	}

	/**
	 * Delete one or more connections based on properties.
	 *
	 * @param array $connectionParameters
	 * @param array $connectionProperties
	 * @return mixed
	 */
	public function deleteConnections(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = null)
	{
		// Our base command.
		$command = 'DELETE EDGE';

		// Add our source.
		if (isset($connectionParameters['from']))
			$command .= ' FROM ' . $connectionParameters['from'];

		// Add our destination.
		if (isset($connectionParameters['to']))
			$command .= ' TO ' . $connectionParameters['to'];

		// If we've got special conditions to meet for our connection, add them.
		// FIXME: JSON isn't the format ODB expects.
		if (isset($connectionProperties))
			$command .= ' WHERE ' . json_encode($connectionProperties);

		return $this->phporient->command($command);
	}
}
