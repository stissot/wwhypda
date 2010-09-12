<?php

/**
 * This is the DbTable class for Measure_group table
 * 
 * @author sylvain
 */
class My_Model_DbTable_MeasureGroup extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Measure_group';
	
	/** Primary key name **/
	protected $_primary = 'id_Measure_group';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_MeasureGroup';
}

?>