<?php

/**
 *
 * nanoserv handlers - Direct XML-RPC server
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

namespace Nanoserv\HTTP\XML_RPC;

/**
 * Require the XML-RPC server
 */
// require_once "nanoserv/handlers/HTTP/XML_RPC/Server.php";

/**
 * Direct XML-RPC server class
 *
 * If you extend this handler, your methods will be publicly callable by the name they have in PHP
 *
 * @package nanoserv
 * @subpackage Handlers
 */
abstract class Direct_Server extends \Nanoserv\HTTP\XML_RPC\Server {

	final public function on_Call($method, $args) {

		if (!is_callable(array($this, $method))) {
			
			throw new \Exception("invalid method: '{$method}'");
			
		}

		return call_user_func_array(array($this, $method), $args);

	}

}

?>
