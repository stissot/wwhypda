<?php

/**
 * This is the DbTable class for Parameter table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Parameter extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Parameter';
	
	/** Primary key name **/
	protected $_primary = 'id_Parameter';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Parameter';
}

?>