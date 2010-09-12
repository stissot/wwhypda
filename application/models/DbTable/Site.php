<?php

/**
 * This is the DbTable class for Site_info table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Site extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Site_info';
	
	/** Primary key name **/
	protected $_primary = 'site_id';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Site';
}

?>