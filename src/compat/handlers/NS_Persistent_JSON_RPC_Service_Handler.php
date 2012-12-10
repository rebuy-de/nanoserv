<?php

/**
 *
 * nanoserv handlers - Persistent JSON-RPC server
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
 * Require the JSON-RPC server
 */
require_once "nanoserv-compat/NS_JSON_RPC_Service_Handler.php";

/**
 * Persistent JSON-RPC server class
 *
 * @package nanoserv
 * @subpackage Handlers
 */
class NS_Persistent_JSON_RPC_Service_Handler extends NS_JSON_RPC_Service_Handler {

	/**
	 * Persistent object
	 * @var object
	 */
	private $wrapped;
	
	/**
	 * Persistent JSON-RPC server constructor
	 *
	 * @param object $o
	 */
	public function __construct($o) {

		$this->wrapped = $o;

	}
	
	final public function on_Call($method, $args) {

		return call_user_func_array(array($this->wrapped, $method), $args);

	}

}

?>
