<?php

/**
 *
 * nanoserv handlers - Persistent SOAP over HTTP service handler
 * 
 * Copyright (C) 2004-2010 Vincent Negrier aka. sIX <six@aegis-corp.org>
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA * 
 *
 * @package nanoserv
 * @subpackage Handlers
 */

/**
 * Require the SOAP server
 */
// require_once "nanoserv-compat/handlers/NS_SOAP_Service_Handler.php";

/**
 * Persistent SOAP over HTTP service handler class
 *
 * @package nanoserv
 * @subpackage Handlers
 * @since 1.0.2
 */
class NS_Persistent_SOAP_Service_Handler extends NS_SOAP_Service_Handler {

	/**
	 * Persistent object
	 * @var object
	 */
	private $wrapped;
	
	/**
	 * Persistent SOAP service handler constructor
	 *
	 * @param object $o
	 * @param array $soap_options
	 */
	public function __construct($o, $soap_options=false) {

		$this->wrapped = $o;

		if ($soap_options === false) {
		
			parent::__construct($o);

		} else {

			parent::__construct($o, $soap_options);

		}

	}
	
	public function Get_Exports() {

		$ret = array();
		
		$rc = new ReflectionClass(get_class($this->wrapped));

		foreach ($rc->getMethods() as $rm) {

			if ((!$rm->isPublic()) || ($rm->getDeclaringClass() != $rc)) continue;
			
			$params = array();

			foreach ($rm->getParameters() as $rp) {

				$params[] = array("name" => $rp->getName());
			
			}

			$ret[$rm->getName()] = $params;
		
		}
	
		return $ret;
	
	}
	
	final public function on_Call($method, $args) {

		return call_user_func_array(array($this->wrapped, $method), $args);

	}

}

?>
