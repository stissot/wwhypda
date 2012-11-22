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
 * Model class for a data source (publication where measurements are reported)
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class Source extends Zend_Db_Table_Row_Abstract {
	/**
	 *  Return the column name in the database corresponding to the property name in the model
	 *  @param string $columnName, the name in the model
	 *  @return string the name in the database
	 */
	protected function _transformColumn($columnName)
	{
		switch($columnName)
		{
			case 'idSource' : return 'id_Source';
			case 'authors' : return 'authors';
			case 'title' : return 'title';
			case 'year' : return 'year_Source';
			case 'doi' : return 'doi';
			case 'publisher' : return 'publisher';
			case 'pages' : return 'pages';
			case 'link' : return 'sou_link';
			default: return $columnName;
		}
	}

}

?>