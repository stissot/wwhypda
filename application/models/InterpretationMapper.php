<?php
namespace WWHYPDA\Model;
/********************************************************************
 * The World Wide Hydrogeological Parameters Database
 *
 * Copyright (c) 2011 All rights reserved
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ********************************************************************/

/** 
 * Mapper to get objects of type Interpretation
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class InterpretationMapper extends AbstractMapper
{

	/**
	 * Get all the interpretation methods as an array
	 * 
	 * @param int $status set to 1 to include hidden records (default 0)
	 * @return WWHYPDA_Model_Interpretation[]
	 */
	public static function findAll($status=0)
	{
		$select = self::getDbTable()->select();
		if ($status==0)
		{
			$select->where('int_meth_status = ?', $status);
		}
		$select->order('int_meth_name ASC');
		$rows = self::getDbTable()->fetchAll($select);
		return $rows;
	}

	/**
	 * Get all the interpretation methods as an associative array
	 * 
	 * @param int $status set to 1 to include hidden records (default 0)
	 * @return WWHYPDA_Model_Interpretation[]
	 */
	public static function findAllAssoc($status=0)
	{
		$objects = self::findAll($status);
		$methods = array();
		foreach($objects as $method)
		{
			$methods[$method->idInterpretation] = $method->name;
		}
		return $methods;
	}
	
	/**
	 * Get an interpretation method by Id
	 * 
	 * @param int $idInterpretation
	 * @return WWHYPDA_Model_Interpretation
	 */
	public static function findById($idInterpretation)
	{
		$method = self::getDbTable()->find($idInterpretation)->getRow(0);
		return $method;
	}

}

?>