<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initAutoLoad()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
			'namespace'	=>	'My',
			'basePath'	=>	dirname(__FILE__),
		));
		return $autoloader;
	}

	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype(Zend_View_Helper_Doctype::XHTML1_STRICT);

		$view->headTitle()->setSeparator(' • ');
		$view->headTitle('wwhypda');
		
		$path = dirname(__FILE__) . '/views/helpers';
		$prefix = 'My_View_Helpers';
		$view->addHelperPath($path, $prefix);
	}
	
	protected function _initTimezone()
	{
		date_default_timezone_set('Europe/Paris');
	}
	
}

