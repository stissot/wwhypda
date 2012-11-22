<?php
namespace WWHYPDA\Model;
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

/********************************
 * Retro-support of get_called_class()
 * Tested and works in PHP 5.2.4
 * http://www.sol1.com.au/
 ********************************/
if(!function_exists('get_called_class')) {
	function get_called_class($bt = false,$l = 1) {
	    if (!$bt) $bt = debug_backtrace();
	    if (!isset($bt[$l])) throw new Exception("Cannot find called class -> stack level too deep.");
	    if (!isset($bt[$l]['type'])) {
	        throw new Exception ('type not set');
	    }
	    else switch ($bt[$l]['type']) {
	        case '::':
	            $lines = file($bt[$l]['file']);
	            $i = 0;
	            $callerLine = '';
	            do {
	                $i++;
	                $callerLine = $lines[$bt[$l]['line']-$i] . $callerLine;
	            } while (stripos($callerLine,$bt[$l]['function']) === false);
	            preg_match('/([a-zA-Z0-9\_]+)::'.$bt[$l]['function'].'/',
	                        $callerLine,
	                        $matches);
	            if (!isset($matches[1])) {
	                // must be an edge case.
	                throw new Exception ("Could not find caller class: originating method call is obscured.");
	            }
	            switch ($matches[1]) {
	                case 'self':
	                case 'parent':
	                    return get_called_class($bt,$l+1);
	                default:
	                    return $matches[1];
	            }
	            // won't get here.
	        case '->': switch ($bt[$l]['function']) {
	                case '__get':
	                    // edge case -> get class of calling object
	                    if (!is_object($bt[$l]['object'])) throw new Exception ("Edge case fail. __get called on non object.");
	                    return get_class($bt[$l]['object']);
	                default: return $bt[$l]['class'];
	            }
	
	        default: throw new Exception ("Unknown backtrace method type");
	    }
	}
} 

/** 
 * Abstract class that maps a model class to a database table
 * 
 * @author Sylvain Tissot <sylvain.tissot@ecodev.ch>
 */
 
abstract class AbstractMapper
{
	private static $dbTables = array();
	
	public static function getDbTable()
	{
		$className = get_called_class();
		if (!array_key_exists($className, self::$dbTables))
		{
			preg_match("/([^_]+)Mapper/", $className, $r);
			$dbTableClassName = 'WWHYPDA_Model_DbTable_' . $r[1];
			$dbTable = new $dbTableClassName();
			self::$dbTables[$className] = $dbTable;
		}

		return self::$dbTables[$className];
		
	}
}

?>