<?php

/**
 * Form filter for rock types measurements
 * 
 * @author sylvain
 */
class My_Form_RockMeasFilter extends ZendX_JQuery_Form {

	// protected $idRockType;
/*
	public function setRockType($idRockType)
	{
		$this->idRockType = $idRockType;
	}
*/
	public function init()
	{
		$this->setMethod('POST');
		$this->setAction('count?format=html' . $this->idRockType);
		
		$scales = My_Model_ScaleMapper::findAllAssoc();
		$scales[-1] = '-- all --';
		ksort($scales);
		
		$qualityLevels = My_Model_QualityMapper::findAllAssoc();
		$qualityLevels[-1] = '-- all --';
		ksort($qualityLevels);
		
		$fracturationDegrees = My_Model_FracturationMapper::findAllAssoc();
		$fracturationDegrees[-1] = '-- all --';
		ksort($fracturationDegrees);
		
		$experimentTypes = My_Model_ExperimentMapper::findAllAssoc();
		$experimentTypes[-1] = '-- all --';
		ksort($experimentTypes);
		
		$interpretationMethods = My_Model_InterpretationMapper::findAllAssoc();
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
		
		// Group elements for the first line of table
		/*
		$this->addDisplayGroup(array('scale','quality'), 'row1');
		$element = $this->getDisplayGroup('row1');
		$deco = $element->getDecorator('HtmlTag');
		$deco->setOption('tag','tr');
		$element->removeDecorator('Label');
		$element->removeDecorator('Fieldset');
		$element->removeDecorator('DtDdWrapper');

		// Group elements for the second line of table
		$this->addDisplayGroup(array('fracturation','value_op','value_val'), 'row2');
		$element = $this->getDisplayGroup('row2');
		$deco = $element->getDecorator('HtmlTag');
		$deco->setOption('tag','tr');
		$element->removeDecorator('Label');
		$element->removeDecorator('Fieldset');
		$element->removeDecorator('DtDdWrapper');

		// Group elements for the third line of table
		$this->addDisplayGroup(array('experiment','method'), 'row3');
		$element = $this->getDisplayGroup('row3');
		$deco = $element->getDecorator('HtmlTag');
		$deco->setOption('tag','tr');
		$element->removeDecorator('Label');
		$element->removeDecorator('Fieldset');
		$element->removeDecorator('DtDdWrapper');
*/
		My_Form_Utility::defineFormAsTable($this, false, false, array('idRockType'));

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