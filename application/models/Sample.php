<?php

/** 
 * A rock sample
 * 
 * @author sylvain
 */
class My_Model_Sample extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idSample' : return 'id_Sample';
			case 'fracturation' : return 'key_Fract';
			case 'rockType' : return 'key_rt';
			case 'scale' : return 'key_Scale';
			case 'measureGroup' : return 'key_Mgroup';
			case 'name' : return 'sample_name';
			case 'comment': return 'sample_comment';
			default: return $columnName;
		}
	}

	public function getScale()
	{
		if (null != $this->scale)
			return My_Model_ScaleMapper::findById($this->scale);
		return null;
	}
	
	public function getFracturation()
	{
		if (null != $this->fracturation)
			return My_Model_FracturationMapper::findById($this->fracturation);
		return null;
	}

	public function getMeasureGroup()
	{
		if (null != $this->measureGroup)
			return My_Model_MeasureGroupMapper::findById($this->measureGroup);
		return null;
	}
	
	public function getSite()
	{
		$measureGroup = $this->getMeasureGroup();
		if (null != $measureGroup)
			return $measureGroup->getSite();
		return null;
	}
	
}

?>