<?php

/** 
 * A measurement parameter
 * 
 * @author sylvain
 */
class My_Model_Measure extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idMeasure' : return 'id_Measure';
			case 'comment' : return 'msr_comment';
			case 'value' : return 'msr_value';
			case 'error' : return 'error';
			case 'sample' : return 'id_smpl';
			case 'quality' : return 'id_qlt';
			default: return $columnName;
		}
	}

	/**
	 * Return the sample on which the measure was made
	 * 
	 * @return My_Model_Sample
	 */
	public function getSample()
	{
		if (null != $this->sample)
			return My_Model_SampleMapper::findById($this->sample);
		return false;
	}

	/**
	 * Return the level of quality of the measure
	 * 
	 * @return My_Model_Quality
	 */
	public function getQuality()
	{
		return My_Model_QualityMapper::findById($this->quality);
	}
	
}

?>