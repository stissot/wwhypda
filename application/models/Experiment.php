<?php

/** 
 * An experiment type
 * 
 * @author sylvain
 */
class My_Model_Experiment extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idExperiment' : return 'id_Exp_type';
			case 'name' : return 'exp_name';
			case 'description' : return 'exp_description';
			case 'status' : return 'exp_status';
			default: return $columnName;
		}
	}

}

?>