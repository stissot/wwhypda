<?php

/**
 * This is the DbTable class for Sample table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Sample extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Sample';
	
	/** Primary key name **/
	protected $_primary = 'id_Sample';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Sample';
}

?>