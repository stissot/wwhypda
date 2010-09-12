<?php

/** 
 * Mapper to manipulate sample's scales
 * 
 * @author sylvain
 */
abstract class My_Model_ScaleMapper extends My_Model_AbstractMapper
{

	/*
	 * List the scales (return array of objects)
	 * 
	 * @return array My_Model_Scale
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('id_Scale ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/* List the scales (returns associative array)
	 * 
	 * @return array
	 */
	public static function findAllAssoc()
	{
		$objects = self::findAll();
		$scales = array();
		foreach($objects as $scale)
		{
			$scales[$scale->idScale] = $scale->name . ' ('.$scale->description.')';
		}
		return $scales;
	}

	/*
	 * Find a scale by Id
	 * 
	 * @param int $idScale
	 * @return My_Model_Scale
	 */
	public static function findById($idScale)
	{
		$scale = self::getDbTable()->find($idScale)->current();
		return $scale;
	}
	
}

?>