<?php

/** 
 * Mapper to get experiment types
 * 
 * @author sylvain
 */
abstract class My_Model_ExperimentMapper extends My_Model_AbstractMapper
{

	/*
	 * List the experiment types (array of objects)
	 * 
	 * @param int $status with hidden experiment types
	 * @return array My_Model_Experiment
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

	/*
	 * List the experiment types (associative array)
	 * 
	 * @param int $status with hidden experiment types
	 * @return array
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
	
	/*
	 * Find an experiment type by Id
	 * 
	 * @param int $idExperiment
	 * @return My_Model_Experiment
	 */
	public static function findById($idExperiment)
	{
		$experiment = self::getDbTable()->find($idExperiment)->getRow(0);
		return $experiment;
	}
	
}

?>