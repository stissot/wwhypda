<?php
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
 * Load and run the Zend_Application
 *
 * This file is the main router for the WWHYPDA web application
 * The web requests that don't directly match an existing file must be rewritten
 * to this file for URL handling. It will determine the router/action name from
 * URL path and generate a 404 error when not found.
 *
 * Example of .htaccess or VirtualHost configuration using Apache mod_rewrite:
 *
 * RewriteEngine On
 * RewriteCond %{REQUEST_FILENAME} -s [OR]
 * RewriteCond %{REQUEST_FILENAME} -l [OR]
 * RewriteCond %{REQUEST_FILENAME} -d
 * RewriteRule ^.*$ - [NC,L]
 * RewriteRule ^.*$ index.php [NC,L]
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 * @package WWHYPDA
 */

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';
require_once(APPLICATION_PATH . '/debug.php');

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();