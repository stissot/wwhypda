<?php

/** 
 * The paper of the publication where measurements are reported
 * 
 * @author sylvain
 */
class My_Model_Source extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idSource' : return 'id_Source';
			case 'authors' : return 'authors';
			case 'title' : return 'title';
			case 'year' : return 'year_Source';
			case 'doi' : return 'doi';
			case 'publisher' : return 'publisher';
			case 'pages' : return 'pages';
			case 'link' : return 'sou_link';
			default: return $columnName;
		}
	}

}

?>