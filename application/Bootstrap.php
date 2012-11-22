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

/** 
 * Bootstrap objects used in the whole WWHYPDA application
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	/**
	 * Autoloader that loads the file corresponding to the given classname in current namespace
	 *
	 * @return Zend_Application_Module_Autoloader
	 */
	protected function _initAutoLoad()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
			'namespace'	=>	'WWHYPDA',
			'basePath'	=>	dirname(__FILE__),
		));
		return $autoloader;
	}

	/**
	 * Init the view and generate the HTML doctype
	 *
	 * @return void
	 */
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

	/**
	 * Define the default timezone (for date display etc...)
	 *
	 * @return void
	 */	
	protected function _initTimezone()
	{
		date_default_timezone_set('Europe/Paris');
	}
	
}

