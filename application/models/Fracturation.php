<?php

/** 
 * A fracturation degree
 * 
 * @author sylvain
 */
class My_Model_Fracturation extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idFracturation' : return 'id_fracturation';
			case 'degree' : return 'fracturation_degree';
			default: return $columnName;
		}
	}

}

?>