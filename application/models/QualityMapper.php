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
 * Mapper to get objects of type Quality
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class QualityMapper extends AbstractMapper
{

	/*
	 * Get all the qualities (as an array)
	 * 
	 * @return WWHYPDA_Model_Quality[]
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('id_Quality ASC');
		$rows = self::getDbTable()->fetchAll($select);
		return $rows;
	}

	/**
	 * Get all the qualities (as an associative array)
	 *
	 * @return WWHYPDA_Model_Quality[]
	 */
	public static function findAllAssoc()
	{
		$objects = self::findAll();
		$levels = array();
		foreach($objects as $level)
		{
			$levels[$level->idQuality] = $level->name;
		}
		return $levels;
	}
	
	/**
	 * Get a quality by Id
	 * 
	 * @param int $idQuality
	 * @return WWHYPDA_Model_Quality
	 */
	public static function findById($idQuality)
	{
		$quality = self::getDbTable()->find($idQuality)->current();
		return $quality;
	}
	
}

?>