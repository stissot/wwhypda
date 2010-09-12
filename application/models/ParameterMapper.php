<?php

/** 
 * Mapper to get parameters
 * 
 * @author sylvain
 */
abstract class My_Model_ParameterMapper extends My_Model_AbstractMapper
{

	/*
	 * Finds the parameters
	 * 
	 * @return array My_Model_Parameter
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('param_name ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/*
	 * Find a parameter by Id
	 * 
	 * @param int $idParameter
	 * @return My_Model_Parameter
	 */
	public static function findById($idParameter)
	{
		$parameter = self::getDbTable()->find($idParameter)->current();
		return $parameter;
	}
	
}

?>