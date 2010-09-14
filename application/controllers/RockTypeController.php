<?php
/* Search, edit, add rock types
 * 
 * @author sylvain
 */
class RockTypeController extends Zend_Controller_Action
{

    public function init()
    {
    	/* Initialize action controller here */
    	$this->view->headScript()->appendFile('/js/rock-tree.js')->appendFile('/js/jquery.jstree.js')->appendFile('/js/jquery.lightbox-0.5.js');
    	$this->view->headLink()->appendStylesheet('/css/rock-type.css')->appendStylesheet('/css/jquery.lightbox-0.5.css');
    	$rockTypes = My_Model_RockTypeMapper::findAll();
        $this->view->rockTypes = $rockTypes;
        
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContexts(
        	array('detail'=>'html', 'count'=>'html', 'data'=>'html')
        )->initContext();
    }

    /*
     * Display a tree list of rock types in wwhypda
     */
    public function indexAction()
    {

    }

    /*
     * Display the details of a rock type
     */
    public function detailAction()
    {
		$r = $this->getRequest();
    	$rockTypeId = $r->getParam('id');
		$rockType = My_Model_RockTypeMapper::findById($rockTypeId);
		$parameters = My_Model_ParameterMapper::findAll();

		$form = new My_Form_RockMeasFilter();
		$form->setDefaults(array('id'=>$rockTypeId));
    	$this->view->rockMeasFilter = $form;

		$this->view->rockType = $rockType;
		$this->view->parameters = $parameters;
		$this->view->params = $r->getParams();
    }

	/*
	 * Display measurements counts of each parameter for a rock type (AJAX action)
	 */
    public function countAction()
    {
		$r = $this->getRequest();
    	$idRockType = $r->getParam('id');
    	$rockType = My_Model_RockTypeMapper::findById($idRockType);
    	$parameters = My_Model_ParameterMapper::findAll();
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

    /*
     * Display the raw data for a parameter/rock-type combination
     */
	public function dataAction()
	{
		$r = $this->getRequest();
		$idRockType = $r->getParam('id');
		$rockType = My_Model_RockTypeMapper::findById($idRockType);
		if (null != $idParameter = $r->getParam('param'))
		{
			$parameter = My_Model_ParameterMapper::findById($idParameter);
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

