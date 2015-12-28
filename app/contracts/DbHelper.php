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
	 * @param array $connectionProperties
	 * @return mixed
	 */
	function createConnection(array $connectionProperties = array('from' => '', 'to' => ''));

	/**
	 * Get one or more nodes based on properties.
	 *
	 * @param array $nodeProperties
	 * @return mixed
	 */
	function getNodes(array $nodeProperties);

	/**
	 * Get all nodes.
	 *
	 * @return mixed
	 */
	function getAllNodes();

	/**
	 * Get one or more connections based on properties.
	 *
	 * @param array $connectionProperties
	 * @return mixed
	 */
	function getConnections(array $connectionProperties = array('from' => '', 'to' => ''));

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
	 * @param array $connectionProperties
	 * @return mixed
	 */
	function deleteConnections(array $connectionProperties);
}
