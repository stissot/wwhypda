<?php

/**
 * This is the DbTable class for Fracturation table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Fracturation extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Fracturation';
	
	/** Primary key name **/
	protected $_primary = 'id_fracturation';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Fracturation';
}

?>