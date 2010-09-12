<?php

/**
 * Abstract form class for common functions such as Table rendering
 * 
 * @author sylvain
 */
abstract class My_Form_Utility
{
	/**
	 * Defines the form as an HTML table. The form itself will be set decorators for <table> and all 
	 * its elements will have decorators for <td>
	 * @param Zend_Form $form
	 * @param boolean $includeRowDecorator use false, if you want to group <td> in <tr> yourself with DisplayGroup
	 */
	public static function defineFormAsTable(Zend_Form $form, $includeRowDecorator = true, $includeFormDecorator = true, array $excludeList = null)
	{
		// The form is wrapped in a table

		if ($includeFormDecorator)
		{
			$form->setDecorators(array(
				'FormElements',
				array('HtmlTag', array('tag' => 'table')),
				'Form',
			));
		} else {
			$form->setDecorators(array('FormElements','Form'));
		}

		// Each form element and theirs labels are wrapped in a <td> (instead of default <dd>)
		if ($includeRowDecorator)
		{
			$decorators = array(
					'ViewHelper',
					'Errors',
					array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
					array('Label', array('tag' => 'td', 'class' => 'label')),
					array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
				);
		}
		else
		{
			$decorators = array(
					'ViewHelper',
					'Errors',
					array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
					array('Label', array('tag' => 'td', 'class' => 'label'))
				);
		}
		
		$form->setElementDecorators($decorators, $excludeList, false);
			
		return $form; // provides fluid interface
	}
	
	/**
	 * Set the label after the elemnt for all checkboxes element (recusively in subforms)
	 * @param Zend_Form $form
	 * @return null
	 */
	public static function invertCheckboxes(Zend_Form $form)
	{
        $elements = $form->getElements();
        foreach ($form->getDisplayGroups() as $group)
        {
            $elements = $elements + $group->getElements();
        }
        
		foreach ($elements  as $e)
		{
			if (!($e instanceof Zend_Form_Element_Checkbox))
				continue;

			if ($deco = $e->getDecorator('label'))
				$deco->setOption('placement', 'append');
		}
    
        foreach ($form->getSubForms() as $name => $subForm)
        {
            My_Form_Utility::invertCheckboxes($subForm);
        }
	}

}

?>