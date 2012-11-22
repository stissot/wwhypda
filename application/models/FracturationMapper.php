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
 * Mapper to get objects of type Fracturation
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class FracturationMapper extends AbstractMapper
{

	/**
	 * Get all the fracturation degrees as an array
	 * 
	 * @return WWHYPDA_Model_Fracturation[]
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('id_fracturation ASC');
		$rows = self::getDbTable()->fetchAll($select);
		return $rows;
	}

	/**
	 * Get all the fracturation degrees as an associative array
	 *
	 * @return WWHYPDA_Model_Fracturation[]
	 */
	public static function findAllAssoc()
	{
		$objects = self::findAll();
		$degrees = array();
		foreach($objects as $fracturation)
		{
			$degrees[$fracturation->idFracturation] = $fracturation->degree;
		}
		return $degrees;
	}
	
	/**
	 * Get a fracturation degree by Id
	 * 
	 * @param int $idFracturation
	 * @return WWHYPDA_Model_Fracturation
	 */
	public static function findById($idFracturation)
	{
		$fracturation = self::getDbTable()->find($idFracturation)->getRow(0);
		return $fracturation;
	}

}

?>