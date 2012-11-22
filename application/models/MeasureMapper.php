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
 * Mapper to get objects of type Measure
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class MeasureMapper extends AbstractMapper
{

	/**
	 * Get measurements by rock type (and optional filters)
	 * 
	 * @param int $idRockType
	 * @param int $idParameter ID of parameter
	 * @param int $scale ID of scale
	 * @param int $quality ID of quality
	 * @param int $fracturation ID of fracturation
	 * @param string $value_op comparison operator of value
	 * @param float $value
	 * @param int $experiment ID of experiment
	 * @param int $method ID of method
	 * @param string $sortKey column to sort results
	 * @param string $sortOrder order to sort results
	 * @return WWHYPDA_Model_Measure[]
	 */
	public static function getByRockType($idRockType,
		$idParameter=null,
		$scale=null,
		$quality=null,
		$fracturation=null,
		$value_op=null,
		$value=null,
		$experiment=null,
		$method=null,
		$sortKey='measure',
		$sortOrder='ASC'
		)
	{
		$select = self::getDbTable()->select()
			->from(array('m'=>'Measure'))
			->join(array('s'=>'Sample'), 'm.id_smpl=s.id_sample',array());

		// count sub-rock types as well
		$rockType = My_Model_RockTypeMapper::findById($idRockType);
		$rockTypeIds = array($rockType->idRockType);
		if ($rockType->hasChildren())
		{
			foreach($rockType->getChildren() as $rt)
			{
				$rockTypeIds[] = $rt->idRockType;
			}
		}
		$select->where('s.key_rt IN ('.join(',',$rockTypeIds).')');
		if (!empty($idParameter))
		{
			$select->where('m.id_par_msr = ?', $idParameter);
		}
		if ($scale != null && $scale > -1)
		{
			$select->where('s.key_Scale = ?', $scale);
		}
		if ($quality != null && $quality > -1)
		{
			$select->where('m.id_qlt = ?', $quality);
		}
		if ($fracturation !=null && $fracturation > -1)
		{
			$select->where('s.key_Fract = ?', $fracturation);
		}
		if ($value != null && $value != '' && !empty($value_op))
		{
			$select->where('m.msr_value'.$value_op.$value);
		}
		if ($experiment != null && $experiment > -1)
		{
			$select->where('m.id_ex_ty = ?', $experiment);
		}
		if ($method != null && $method > -1)
		{
			$select->where('m.id_int_mtd = ?', $method);
		}
		switch($sortKey)
		{
			case 'measure': $orderBy = 'm.msr_value '.$sortOrder; break;
			default: $orderBy = 'm.msr_value '.$sortOrder;
		}
		$select->order($orderBy);
		// echo $select->assemble();

		$records = self::getDbTable()->fetchAll($select);
		return $records;
	}

	/**
	 * Get a measurement by Id
	 * 
	 * @param int $idMeasure
	 * @return WWHYPDA_Model_Measure
	 */
	public static function findById($idMeasure)
	{
		$measure = self::getDbTable()->find($idMeasure)->current();
		return $measure;
	}

}

?>