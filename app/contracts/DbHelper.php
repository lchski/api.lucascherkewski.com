<?php

namespace Lchski\Contracts;


use Slim\Container;

interface DbHelper
{
	/**
	 * Catch our DI Container from Slim.
	 *
	 * @param Container $container
	 * @return mixed
	 */
	function __construct(Container $container);

	/**
	 * Create a node, with a variable set of properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	function createNode(array $nodeProperties);

	/**
	 * Create a connection between two nodes.
	 *
	 * @param array $connectionParameters
	 * @param array $connectionProperties
	 * @return mixed
	 */
	function createConnection(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = array());

	/**
	 * Get one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	function getNodes(array $nodeProperties);

    /**
     * Get one or more nodes via the connections between them.
     *
     * @param  array  $connectionParameters
     * @param  array  $connectionProperties
     * @return mixed
     */
    function getNodesViaConnection(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = array());

	/**
	 * Get all nodes.
	 *
	 * @return mixed
	 */
	function getAllNodes();

	/**
	 * Get one or more connections through a node.
	 *
	 * @param array $connectionNode
	 * @param array $connectionProperties
	 * @return mixed
	 */
	function getConnections(array $connectionNode = array(), array $connectionProperties = array());

	/**
	 * Get all connections.
	 *
	 * @return mixed
	 */
	function getAllConnections();

	/**
	 * Delete one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	function deleteNodes(array $nodeProperties);

	/**
	 * Delete one or more connections based on properties.
	 *
	 * @param array $connectionParameters
	 * @param array $connectionProperties
	 * @return mixed
	 */
	function deleteConnections(array $connectionParameters = array('from' => '', 'to' => ''), array $connectionProperties = null);
}
