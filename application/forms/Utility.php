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

/** 
 * Useful functions for form handling
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
abstract class Utility
{
	/**
	 * Defines the form as an HTML table. The form itself will be set decorators for <table> and all 
	 * its elements will have decorators for <td>
	 * @param Zend_Form $form
	 * @param boolean $includeRowDecorator set to false if you want to group <td> in <tr> yourself with DisplayGroup
	 * @return Zend_Form
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
	 * Render the label after all checkboxes element (recusively in subforms)
	 * @param Zend_Form $form
	 * @return void
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
            Utility::invertCheckboxes($subForm);
        }
	}

}

?>