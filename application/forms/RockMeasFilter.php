<?php
namespace WWHYPDA\Form;
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

use \WWHYPDA\Model as Model;

/** 
 * Table filter for rock types measurements
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class RockMeasFilter extends ZendX_JQuery_Form {

	/**
	 * Construct the filter form
	 */
	public function init()
	{
		$this->setMethod('POST');
		$this->setAction('count?format=html' . $this->idRockType);
		
		$scales = Model\ScaleMapper::findAllAssoc();
		$scales[-1] = '-- all --';
		ksort($scales);
		
		$qualityLevels = Model\QualityMapper::findAllAssoc();
		$qualityLevels[-1] = '-- all --';
		ksort($qualityLevels);
		
		$fracturationDegrees = Model\FracturationMapper::findAllAssoc();
		$fracturationDegrees[-1] = '-- all --';
		ksort($fracturationDegrees);
		
		$experimentTypes = Model\ExperimentMapper::findAllAssoc();
		$experimentTypes[-1] = '-- all --';
		ksort($experimentTypes);
		
		$interpretationMethods = Model\InterpretationMapper::findAllAssoc();
		$interpretationMethods[-1] = '-- all --';
		ksort($interpretationMethods);

		$this->setAttrib('id', 'rockMeasFilter');

		$this->addElement('hidden','id', array('decorators'=>array('ViewHelper')));
		
		$this->addElement("select", 'scale', array(
			'label' => 'Measurement scale',
			'multiOptions' => $scales,
			'class' => 'auto_submit',
		));

		$this->addElement("select", 'quality', array(
			'label' => 'Measurement quality',
			'multiOptions' => $qualityLevels,
			'class' => 'auto_submit',
		));

		$this->addElement("select", 'fracturation', array(
			'label' => 'Fracturation degree',
			'multiOptions' => $fracturationDegrees,
			'class' => 'auto_submit',
		));

		$element = new Zend_Form_Element_Select('value_op', array (
			'label' => 'Value',
			'multiOptions' => array(
				'<' => 'less than',
				'>' => 'more than',
				'=' => 'equal to'
				),
			'class' => 'auto_submit',
			)
		);
		$this->addElement($element);

		$element = new Zend_Form_Element_Text('value_val');
		$this->addElement($element);
				
		$this->addElement("select", 'experiment', array(
			'label' => 'Meas. technique',
			'multiOptions' => $experimentTypes,
			'class' => 'auto_submit',
		));

		$this->addElement("select", 'method', array(
			'label' => 'Interpretation method',
			'multiOptions' => $interpretationMethods,
			'class' => 'auto_submit',
		));
		//$this->addElement('submit', 'Filter');

		$this->addDisplayGroup(
			array('scale','quality','fracturation','value_op','value_val','experiment','method'),
			'table'
		);
		$table = $this->getDisplayGroup('table');
		$deco = $table->getDecorator('HtmlTag');
		$deco->setOption('tag', 'table');
		$table->removeDecorator('Label');
		$table->removeDecorator('Fieldset');
		$table->removeDecorator('DtDdWrapper');

		Utility::defineFormAsTable($this, false, false, array('idRockType'));

		$this->getElement('value_op')->setDecorators(array(
			'ViewHelper',
			'Label',
			array('HtmlTag', array('tag' => 'td', 'openOnly'=>true, 'colspan'=>2))
		));

		$this->getElement('value_val')->setDecorators(array(
			'ViewHelper',
			'Errors',
			array('HtmlTag', array('tag' => 'td', 'closeOnly'=>true))
		));

		$this->getElement('scale')->addDecorator(array('row' => 'HtmlTag'), array('tag' => 'tr', 'openOnly' => true));
		$this->getElement('quality')->addDecorator(array('row' => 'HtmlTag'), array('tag' => 'tr', 'closeOnly' => true));
		$this->getElement('fracturation')->addDecorator(array('row' => 'HtmlTag'), array('tag' => 'tr', 'openOnly' => true));
		$this->getElement('value_val')->addDecorator(array('row' => 'HtmlTag'), array('tag' => 'tr', 'closeOnly' => true));
		$this->getElement('experiment')->addDecorator(array('row' => 'HtmlTag'), array('tag' => 'tr', 'openOnly' => true));
		$this->getElement('method')->addDecorator(array('row' => 'HtmlTag'), array('tag' => 'tr', 'closeOnly' => true));
		
	}
	
}

?>