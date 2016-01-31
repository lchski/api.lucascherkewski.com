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
		$this->phporient->command('CREATE VERTEX V CONTENT ' . json_encode($nodeProperties));
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

		$this->phporient->command($command);
	}

	/**
	 * Get one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	public function getNodes(array $nodeProperties)
	{}

	/**
	 * Get all nodes.
	 *
	 * @return mixed
	 */
	public function getAllNodes()
	{
		return $this->phporient->query('SELECT * FROM V');
	}

	/**
	 * Get one or more connections based on properties.
	 *
	 * @param array $connectionParameters
	 * @param array $connectionProperties
	 * @return mixed
	 */
	public function getConnections(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = array())
	{}

	/**
	 * Get all connections.
	 *
	 * @return mixed
	 */
	public function getAllConnections()
	{
		return $this->phporient->query('SELECT * FROM E limit 50');
	}

	/**
	 * Delete one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	public function deleteNodes(array $nodeProperties)
	{
		$this->phporient->command('DELETE VERTEX WHERE ' . SqlHelper::arrayToSql($nodeProperties));
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

		$this->phporient->command($command);
	}
}
