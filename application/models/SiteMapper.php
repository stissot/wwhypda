<?php

/** 
 * Mapper to get sites
 * 
 * @author sylvain
 */
abstract class My_Model_SiteMapper extends My_Model_AbstractMapper
{

	/*
	 * Finds all the sites
	 * 
	 * @return array My_Model_Site
	 */
	public static function findAll()
	{
		$select = self::getDbTable()->select();
		$select->order('site_name ASC');
		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/*
	 * Find a site by Id
	 * 
	 * @param int $idSite
	 * @return My_Model_Site
	 */
	public static function findById($idSite)
	{
		$record = self::getDbTable()->find($idSite)->current();
		return $record;
	}
	
}

?>