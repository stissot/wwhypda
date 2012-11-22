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
 * Mapper to get objects of type Experiment
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class ExperimentMapper extends AbstractMapper
{

	/**
	 * Get all the experiments as an array
	 * 
	 * @param int $status with hidden experiment types
	 * @return WWHYPDA_Model_Experiment[]
	 */
	public static function findAll($status=0)
	{
		$select = self::getDbTable()->select();
		if ($status==0)
		{
			$select->where('exp_status = ?', $status);
		}
		$select->order('exp_name ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/**
	 * Get all the experiments as an associative array
	 * 
	 * @param int $status with hidden experiment types
	 * @return WWHYPDA_Model_Experiment[]
	 */
	public static function findAllAssoc($status=0)
	{
		$objects = self::findAll($status);
		$types = array();
		foreach($objects as $experiment)
		{
			$types[$experiment->idExperiment] = $experiment->name;
		}
		return $types;
	}
	
	/**
	 * Find an experiment by Id
	 * 
	 * @param int $idExperiment
	 * @return WWHYPDA_Model_Experiment
	 */
	public static function findById($idExperiment)
	{
		$experiment = self::getDbTable()->find($idExperiment)->getRow(0);
		return $experiment;
	}
	
}

?>