<?php

/** 
 * Mapper to manipulate the interpretation methods
 * 
 * @author sylvain
 */
abstract class My_Model_InterpretationMapper extends My_Model_AbstractMapper
{

	/*
	 * List the interpretation methods (array of objects)
	 * 
	 * @param int $status show hidden methods
	 * @return array My_Model_Interpretation
	 */
	public static function findAll($status=0)
	{
		$select = self::getDbTable()->select();
		if ($status==0)
		{
			$select->where('int_meth_status = ?', $status);
		}
		$select->order('int_meth_name ASC');
		$rows = self::getDbTable()->fetchAll($select);
		return $rows;
	}

	/*
	 * List the interpretation methods (associative array)
	 * 
	 * @param int $status show hidden methods
	 * @return array
	 */
	public static function findAllAssoc($status=0)
	{
		$objects = self::findAll($status);
		$methods = array();
		foreach($objects as $method)
		{
			$methods[$method->idInterpretation] = $method->name;
		}
		return $methods;
	}
	
	/*
	 * Find an interpretation method by Id
	 * 
	 * @param int $idInterpretation
	 * @return My_Model_Interpretation
	 */
	public static function findById($idInterpretation)
	{
		$method = self::getDbTable()->find($idInterpretation)->getRow(0);
		return $method;
	}

}

?>