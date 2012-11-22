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
 * Model class for a rock type
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class RockType extends Zend_Db_Table_Row_Abstract {
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
	 *
	 * @return WWHYPDA_Model_RockType[]
	 */
	public function getChildren()
	{
		$rockTypes = RockTypeMapper::findAll($this->idRockType);
		return $rockTypes;
	}

	/**
	 * Check if a rock type has children
	 *
	 * @return boolean
	 */
	public function hasChildren()
	{
		if (count($this->getChildren()) > 0)
			return true;
		return false;
	}

	/**
	 * Get measurements for this rock type
	 *
	 * @param int idParameter count measurements of this parameter (optional)
	 * @param array options optional filters
	 *
	 * @return WWHYPDA_Model_Measure[]
	 */
	public function getMeasurements($idParameter=null, $options=array())
	{
		return MeasureMapper::getByRockType(
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