<?php
namespace WWHYPDA;
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
use \WWHYPDA\Form as Form;

/** 
 * Controller which handles actions on a Rock Type (list, search, edit, add)
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class RockTypeController extends Zend_Controller_Action
{

	/**
	 * Initialize the RockType Action controller
	 *
	 * @return void;
	 */
    public function init()
    {
		/* Load the required CSS and Javascript files in HTML header */
    	$this->view->headScript()->appendFile('/js/rock-tree.js')
    							->appendFile('/js/jquery.jstree.js')
    							->appendFile('/js/jquery.lightbox-0.5.js');
    	$this->view->headLink()->appendStylesheet('/css/rock-type.css')
    							->appendStylesheet('/css/jquery.lightbox-0.5.css');
        $this->view->rockTypes = Model\RockTypeMapper::findAll();
        
        /* Register the actions to be called by AJAX requests */
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContexts(
        	array('detail'=>'html', 'count'=>'html', 'data'=>'html')
        )->initContext();
    }

    /**
     * Default index view: display a list of rock types as a tree
	 *
	 * @return void;
     */
    public function indexAction()
    {

    }

    /**
     * Detail view: display information about a rock type
	 *
	 * @return void;
     */
    public function detailAction()
    {
		$r = $this->getRequest();
    	$rockTypeId = $r->getParam('id');
		$rockType = Model\RockTypeMapper::findById($rockTypeId);
		$parameters = Model\ParameterMapper::findAll();

		$form = new Form\RockMeasFilter();
		$form->setDefaults(array('id'=>$rockTypeId));
    	$this->view->rockMeasFilter = $form;

		$this->view->rockType = $rockType;
		$this->view->parameters = $parameters;
		$this->view->params = $r->getParams();
    }

	/**
	 * Display measurements counts of each parameter for a rock type (AJAX action)
	 *
	 * @return void;
	 */
    public function countAction()
    {
		$r = $this->getRequest();
    	$idRockType = $r->getParam('id');
    	$rockType = Model\RockTypeMapper::findById($idRockType);
    	$parameters = Model\ParameterMapper::findAll();
    	$filters = array(
    		'scale' 		=>	$r->getParam('scale'),
    		'quality'		=>	$r->getParam('quality'),
    		'fracturation'	=>	$r->getParam('fracturation'),
    		'value_op'		=>	$r->getParam('value_op'),
    		'value'			=>	$r->getParam('value_val'),
    		'experiment'	=>	$r->getParam('experiment'),
    		'method'		=>	$r->getParam('method'),
    	);
  
    	$this->view->rockType = $rockType;
    	$this->view->parameters = $parameters;
    	$this->view->filters = $filters;
    	$this->view->params = $r->getParams();
    }

    /**
     * Display the raw data for a parameter/rock-type combination (AJAX action)
	 *
	 * @return void;
     */
	public function dataAction()
	{
		$r = $this->getRequest();
		$idRockType = $r->getParam('id');
		$rockType = Model\RockTypeMapper::findById($idRockType);
		if (null != $idParameter = $r->getParam('param'))
		{
			$parameter = Model\ParameterMapper::findById($idParameter);
			$this->view->parameter = $parameter;	
		}
		$filters = array(
    		'scale' 		=>	$r->getParam('scale'),
    		'quality'		=>	$r->getParam('quality'),
    		'fracturation'	=>	$r->getParam('fracturation'),
    		'value_op'		=>	$r->getParam('value_op'),
    		'value'			=>	$r->getParam('value_val'),
    		'experiment'	=>	$r->getParam('experiment'),
    		'method'		=>	$r->getParam('method'),
    	);
		$measurements = $rockType->getMeasurements($idParameter, $filters);

		$this->view->rockType = $rockType;
		$this->view->measurements = $measurements;
	}

}

