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
 * Mapper to get RockType objects
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class RockTypeMapper extends AbstractMapper
{

	/**
	 * Get the rock types
	 * 
	 * @param int $idParent the parent rock type ID
	 * @param int $status with hidden rock types
	 *
	 * @return WWHYPDA_Model_RockType[]
	 */
	public static function findAll($idParent=0,$status=0)
	{
		$select = self::getDbTable()->select()
		->where('rt_id_parent = ?', $idParent);
		if ($status==0)
			$select->where('rt_status = ?', $status);
		$select->order('rt_name ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/**
	 * Get a rock type by Id
	 * 
	 * @param int $idRockType the rock type ID
	 *
	 * @return WWHYPDA_Model_RockType
	 */
	public static function findById($idRockType)
	{
		$rockType = self::getDbTable()->find($idRockType)->getRow(0);
		return $rockType;
	}
	
}

?>