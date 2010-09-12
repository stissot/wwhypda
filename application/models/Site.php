<?php

/** 
 * General info about a measurement site
 * 
 * @author sylvain
 */
class My_Model_Site extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idSite' : return 'site_id';
			case 'name' : return 'site_name';
			case 'region' : return 'region';
			case 'longitude' : return 'longitude';
			case 'latitude' : return 'latitude';
			case 'country' : return 'iso_country';
			default: return $columnName;
		}
	}

}

?>