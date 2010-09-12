<?php

/** 
 * Mapper to manipulate fracturation degrees
 * 
 * @author sylvain
 */
abstract class My_Model_FracturationMapper extends My_Model_AbstractMapper
{

	/*
	 * List the fracturation degrees (array of objects)
	 * 
	 * @return array
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('id_fracturation ASC');
		$rows = self::getDbTable()->fetchAll($select);
		return $rows;
	}

	/*
	 * List the fracturation degrees (associative array)
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
	
	/*
	 * Find a fracturation degree by Id
	 * 
	 * @param int $idFracturation
	 * @return My_Model_Fracturation
	 */
	public static function findById($idFracturation)
	{
		$fracturation = self::getDbTable()->find($idFracturation)->getRow(0);
		return $fracturation;
	}

}

?>