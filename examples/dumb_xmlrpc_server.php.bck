#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/XML_RPC/Direct_Server.php";

class dumb_xmlrpc_httpd extends \Nanoserv\HTTP\XML_RPC\Direct_Server {

	public function getFoo($bar) {

		return array("foo" => $bar);

	}

}

\Nanoserv\Core::New_Listener("tcp://0.0.0.0:800", "dumb_xmlrpc_httpd")->Activate();
\Nanoserv\Core::Run();

?>
