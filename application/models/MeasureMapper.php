<?php

/** 
 * Mapper to get parameters
 * 
 * @author sylvain
 */
abstract class My_Model_MeasureMapper extends My_Model_AbstractMapper
{

	/*
	 * Get measurements by rock type (and optional parameter)
	 * 
	 * @param int $idRockType
	 * @param int $idParameter (optional)
	 * @return array of My_Model_Measure
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

	/*
	 * Find a measure by Id
	 * 
	 * @param int $idMeasure
	 * @return My_Model_Measure
	 */
	public static function findById($idMeasure)
	{
		$measure = self::getDbTable()->find($idMeasure)->current();
		return $measure;
	}

}

?>