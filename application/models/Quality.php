<?php

/** 
 * A measure quality
 * 
 * @author sylvain
 */
class My_Model_Quality extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idQuality' : return 'id_Quality';
			case 'name' : return 'quality_level';
			default: return $columnName;
		}
	}

}

?>