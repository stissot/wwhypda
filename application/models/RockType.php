<?php

/** 
 * A rock type
 * 
 * @author sylvain
 */
class My_Model_RockType extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idRockType' : return 'rt_id';
			case 'name' : return 'rt_name';
			case 'description' : return 'rt_description';
			case 'link' : return 'rt_wiki_link';
			case 'image' : return 'rt_img_link';
			case 'idParent' : return 'rt_id_parent';
			case 'status': return 'rt_status';
			default: return $columnName;
		}
	}

	/**
	 * Return the children rock types
	 * @return array My_Model_RockType
	 */
	public function getChildren()
	{
		$rockTypes = My_Model_RockTypeMapper::findAll($this->idRockType);
		return $rockTypes;
	}

	/**
	 * Check if a rock type has children
	 */
	public function hasChildren()
	{
		if (count($this->getChildren()) > 0)
			return true;
		return false;
	}

	/**
	 * Get measurements for this rock type
	 * @param int idParameter count measurements of this parameter (optional)
	 * @param array options optional list of filters
	 * @return array of My_Model_Measure
	 */
	public function getMeasurements($idParameter=null, $options=array())
	{
		return My_Model_MeasureMapper::getByRockType(
			$this->idRockType,
			$idParameter,
			@$options['scale'],
			@$options['quality'],
			@$options['fracturation'],
			@$options['value_op'],
			@$options['value'],
			@$options['experiment'],
			@$options['method']
		);
	}
}

?>