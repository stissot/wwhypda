<?php

/** 
 * Mapper to get sources
 * 
 * @author sylvain
 */
abstract class My_Model_SourceMapper extends My_Model_AbstractMapper
{

	/*
	 * Finds all the sources
	 * 
	 * @return array My_Model_Source
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('title ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/*
	 * Find a source by Id
	 * 
	 * @param int $idSource
	 * @return My_Model_Source
	 */
	public static function findById($idSource)
	{
		$record = self::getDbTable()->find($idSource)->current();
		return $record;
	}

}

?>