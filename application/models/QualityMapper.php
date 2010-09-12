<?php

/** 
 * Mapper to manipulate sample's scales
 * 
 * @author sylvain
 */
abstract class My_Model_QualityMapper extends My_Model_AbstractMapper
{

	/*
	 * List the quality levels (array of objects)
	 * 
	 * @return array
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('id_Quality ASC');
		$rows = self::getDbTable()->fetchAll($select);
		return $rows;
	}

	/*
	 * List the quality levels (associative array)
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
	
	/*
	 * Find a quality by Id
	 * 
	 * @param int $idQuality
	 * @return My_Model_Quality
	 */
	public static function findById($idQuality)
	{
		$quality = self::getDbTable()->find($idQuality)->current();
		return $quality;
	}
	
}

?>