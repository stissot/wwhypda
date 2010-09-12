<?php

/** 
 * Mapper to get samples
 * 
 * @author sylvain
 */
abstract class My_Model_SampleMapper extends My_Model_AbstractMapper
{

	/*
	 * Finds the samples by rock type
	 * 
	 * @param int $idRockType
	 * @return array My_Model_Sample
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

	/*
	 * Find the samples by measure group
	 * 
	 * @param int $idMeasureGroup
	 * @return array My_Modem_Sample
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
	
	/*
	 * Find a sample by Id
	 * 
	 * @param int $idSample
	 * @return My_Model_Sample
	 */
	public static function findById($idSample)
	{
		$record = self::getDbTable()->find($idSample)->current();
		return $record;
	}
	
}

?>