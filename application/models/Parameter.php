<?php

/** 
 * A measurement parameter
 * 
 * @author sylvain
 */
class My_Model_Parameter extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idParameter' : return 'id_Parameter';
			case 'code' : return 'code';
			case 'name' : return 'param_name';
			case 'units' : return 'units';
			case 'htmlCode' : return 'html_code';
			case 'htmlUnits' : return 'html_units';
			case 'maxValue': return 'MaxValue';
			case 'minValue': return 'MinValue';
			default: return $columnName;
		}
	}

}

?>