<?php

/**
 * This is the DbTable class for Quality table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Quality extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Quality';
	
	/** Primary key name **/
	protected $_primary = 'id_Quality';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Quality';
}

?>