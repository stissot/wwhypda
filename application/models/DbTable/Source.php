<?php

/**
 * This is the DbTable class for Source table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Source extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Source';
	
	/** Primary key name **/
	protected $_primary = 'id_Source';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Source';
}

?>