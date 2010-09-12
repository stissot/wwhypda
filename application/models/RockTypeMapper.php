<?php

/** 
 * Mapper to get rock types
 * 
 * @author sylvain
 */
abstract class My_Model_RockTypeMapper extends My_Model_AbstractMapper
{

	/*
	 * Finds the rock types
	 * 
	 * @param int $idParent the parent rock type ID
	 * @param int $status with hidden rock types
	 * @return array My_Model_RockType
	 */
	public static function findAll($idParent=0,$status=0)
	{
		$select = self::getDbTable()->select()
		->where('rt_id_parent = ?', $idParent);
		if ($status==0)
			$select->where('rt_status = ?', $status);
		$select->order('rt_name ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/*
	 * Find a rock type by Id
	 * 
	 * @param int $idRockType the rock type ID
	 * @return My_Model_RockType
	 */
	public static function findById($idRockType)
	{
		$rockType = self::getDbTable()->find($idRockType)->getRow(0);
		return $rockType;
	}
	
}

?>