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
 * Mapper to get objects of type Parameter
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class ParameterMapper extends AbstractMapper
{

	/**
	 * Get all the parameters
	 * 
	 * @return WWHYPDA_Model_Parameter[]
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('param_name ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/**
	 * Get a parameter by Id
	 * 
	 * @param int $idParameter
	 * @return WWHYPDA_Model_Parameter
	 */
	public static function findById($idParameter)
	{
		$parameter = self::getDbTable()->find($idParameter)->current();
		return $parameter;
	}
	
}

?>