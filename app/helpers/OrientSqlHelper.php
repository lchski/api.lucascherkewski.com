<?php

namespace Lchski\Helpers;


class OrientSqlHelper
{

	/**
	 * Convert an array of properties to SQL.
	 *
	 * ['name' => 'James'] becomes name='James'
	 *
	 * @param array $sourceArray
	 * @return string
	 */
	public static function arrayToSql(array $sourceArray)
	{
		// Create a temporary array, where we'll remap the items.
		$tempArray = array();
		foreach ($sourceArray as $key => $value)
			$tempArray[$key] = $key . "='" . $value . "'";

		// Convert our temporary array to the string.
		return implode(', ', $tempArray);
	}
}
