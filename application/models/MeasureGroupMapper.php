<?php

/** 
 * Mapper to get groups of measurements
 * 
 * @author sylvain
 */
abstract class My_Model_MeasureGroupMapper extends My_Model_AbstractMapper
{

	/*
	 * Get groups of measurements
	 * 
	 * @return array of My_Model_MeasureGroup
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/*
	 * Find a measure group by Id
	 * 
	 * @param int $idMeasureGroup
	 * @return My_Model_MeasureGroup
	 */
	public static function findById($idMeasureGroup)
	{
		$record = self::getDbTable()->find($idMeasureGroup)->current();
		return $record;
	}

}

?>