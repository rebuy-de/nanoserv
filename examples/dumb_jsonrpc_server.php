#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/JSON_RPC/Direct_Server.php";

class dumb_jsonrpc_httpd extends \Nanoserv\HTTP\JSON_RPC\Direct_Server {

	public function getFoo($bar) {

		return array("foo" => $bar);

	}

}

\Nanoserv\Core::New_Listener("tcp://0.0.0.0:800", "dumb_jsonrpc_httpd")->Activate();
\Nanoserv\Core::Run();

?>
