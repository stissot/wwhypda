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
 * Controller that displays static documents
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
class DocumentsController extends Zend_Controller_Action
{

	/**
	 * Initialize the Documents Action controller
	 *
	 * @return void;
	 */
    public function init()
    {

    }

	/**
	 * List the available documents
	 *
	 * @return void;
	 */
    public function indexAction()
    {
		// will display the default view: index.phtml
	}

}