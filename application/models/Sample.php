<?php
namespace WWHYPDA\Model;
/********************************************************************
 * The World Wide Hydrogeological Parameters Database
 *
 * Copyright (c) 2011 All rights reserved
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ********************************************************************/

/** 
 * Model class for a rock sample
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class Sample extends Zend_Db_Table_Row_Abstract {
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

	/**
	 *  Get the scale of the sample
	 *
	 *  @return WWHYPDA_Model_Scale
	 */
	public function getScale()
	{
		if (null != $this->scale)
			return ScaleMapper::findById($this->scale);
		return null;
	}

	/**
	 *  Get the fracturation degree of the sample
	 *
	 *  @return WWHYPDA_Model_Fracturation
	 */
	public function getFracturation()
	{
		if (null != $this->fracturation)
			return FracturationMapper::findById($this->fracturation);
		return null;
	}

	/**
	 *  Get the measurements group of the sample
	 *
	 *  @return WWHYPDA_Model_MeasureGroup
	 */
	public function getMeasureGroup()
	{
		if (null != $this->measureGroup)
			return MeasureGroupMapper::findById($this->measureGroup);
		return null;
	}
	
	/**
	 *  Get the geographical site where the sample was extracted
	 *
	 *  @return WWHYPDA_Model_Site
	 */
	public function getSite()
	{
		$measureGroup = $this->getMeasureGroup();
		if (null != $measureGroup)
			return $measureGroup->getSite();
		return null;
	}
	
}

?>