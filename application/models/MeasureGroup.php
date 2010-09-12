<?php

/** 
 * A group of measurements
 * 
 * @author sylvain
 */
class My_Model_MeasureGroup extends Zend_Db_Table_Row_Abstract {
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
			case 'idMeasureGroup' : return 'id_Measure_group';
			case 'date' : return 'mg_date';
			case 'comment' : return 'mg_comment';
			case 'source' : return 'id_src';
			case 'review' : return 'id_rew';
			case 'environment' : return 'id_env';
			case 'contact' : return 'id_cnt';
			case 'site' : return 'id_pnt';
			case 'spreadsheet' : return 'mgr_spreadsheetID';
			case 'isDuplicate' : return 'mgr_DuplicationWarning';
			case 'isNotCoherent' : return 'mgr_CoherenceWarning';
			case 'hadBeenUpdated' : return 'mgr_UpdateWarning';
			default: return $columnName;
		}
	}

	/**
	 * Return the samples of this measurements group
	 * 
	 * @return array My_Model_Sample
	 */
	public function getSamples()
	{
		return My_Model_SampleMapper::findByMeasureGroup($this->idMeasureGroup);
	}

	/**
	 * Return the source of this measurement group
	 * 
	 * @return array My_Model_Source
	 */
	public function getSource()
	{
		if (null != $this->source)
			return My_Model_SourceMapper::findById($this->source);
		return false;
	}
	
	/**
	 * Return the site of the measurement group
	 * 
	 * @return array My_Model_Site
	 */
	public function getSite()
	{
		if (null != $this->site)
			return My_Model_SiteMapper::findById($this->site);	
		return false;
	}

}

?>