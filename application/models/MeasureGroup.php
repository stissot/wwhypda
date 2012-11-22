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
 * Model class for a group of measurements
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class MeasureGroup extends Zend_Db_Table_Row_Abstract {
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
	 * Get all the rock samples of this group of measurements
	 * 
	 * @return WWHYPDA_Model_Sample[]
	 */
	public function getSamples()
	{
		return SampleMapper::findByMeasureGroup($this->idMeasureGroup);
	}

	/**
	 * Get the source of this group of measurements
	 * 
	 * @return WWHYPDA_Model_Source
	 */
	public function getSource()
	{
		if (null != $this->source)
			return SourceMapper::findById($this->source);
		return false;
	}
	
	/**
	 * Get the geographical site of the group of measurements
	 * 
	 * @return WWHYPDA_Model_Site
	 */
	public function getSite()
	{
		if (null != $this->site)
			return SiteMapper::findById($this->site);	
		return false;
	}

}

?>