<?php

/** 
 * An interpretation method
 * 
 * @author sylvain
 */
class My_Model_Interpretation extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idInterpretation' : return 'id_Int_meth';
			case 'name' : return 'int_meth_name';
			case 'description' : return 'int_meth_desc';
			case 'status' : return 'int_meth_status';
			default: return $columnName;
		}
	}

}

?>