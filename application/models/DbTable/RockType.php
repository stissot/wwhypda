<?php

/**
 * This is the DbTable class for rock type table
 * 
 * @author sylvain
 */
class My_Model_DbTable_RockType extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Rock_type';
	
	/** Primary key name **/
	protected $_primary = 'rt_id';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_RockType';
}

?>