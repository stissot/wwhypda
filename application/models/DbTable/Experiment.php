<?php

/**
 * This is the DbTable class for Experiment_type table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Experiment extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Experiment_type';
	
	/** Primary key name **/
	protected $_primary = 'id_Exp_type';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Experiment';
}

?>