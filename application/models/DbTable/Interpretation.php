<?php

/**
 * This is the DbTable class for Interpretation_method table
 * 
 * @author sylvain
 */
class My_Model_DbTable_Interpretation extends Zend_Db_Table_Abstract
{
	/** Table name **/
	protected $_name = 'Interpretation_method';
	
	/** Primary key name **/
	protected $_primary = 'id_Int_meth';
	
	/** The corresponding class name in our model **/
	protected $_rowClass = 'My_Model_Interpretation';
}

?>