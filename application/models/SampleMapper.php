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
 * Mapper to get objects of class Sample
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class SampleMapper extends AbstractMapper
{

	/**
	 * Get all the samples by rock type
	 * 
	 * @param int $idRockType
	 *
	 * @return WWHYPDA_Model_Sample[]
	 */
	public static function findbyRockType($idRockType=null)
	{
		$select = self::getDbTable()->select();
		if ($idRockType != null)
		{
			$select->where('key_rt = ?', $idRockType);
		}
		$select->order('id_Sample ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/**
	 * Get all the samples by group of measurements
	 * 
	 * @param int $idMeasureGroup
	 *
	 * @return WWHYPDA_Model_Sample[]
	 */
	public static function findbyMeasureGroup($idMeasureGroup)
	{
		$select = self::getDbTable()->select();
		if ($idMeasureGroup != null)
		{
			$select->where('key_Mgroup = ?', $idMeasureGroup);
		}
		$select->order('id_Sample ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}
	
	/**
	 * Get a sample by Id
	 * 
	 * @param int $idSample
	 *
	 * @return WWHYPDA_Model_Sample
	 */
	public static function findById($idSample)
	{
		$record = self::getDbTable()->find($idSample)->current();
		return $record;
	}
	
}

?>