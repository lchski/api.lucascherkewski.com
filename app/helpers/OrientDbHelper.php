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
	{}

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
	{}

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
	{}

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
	public function deleteConnections(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = array())
	{}
}
