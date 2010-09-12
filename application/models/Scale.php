<?php

/** 
 * A sample's scale
 * 
 * @author sylvain
 */
class My_Model_Scale extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idScale' : return 'id_Scale';
			case 'name' : return 'scale_value';
			case 'description' : return 'scale_descr';
			default: return $columnName;
		}
	}

}

?>