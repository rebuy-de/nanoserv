#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/Server.php";

use \Nanoserv\Core as Nanoserv;

class dumb_httpd extends \Nanoserv\HTTP\Server {

	public function on_Request($url) {

		return "You asked for url : <b>{$url}</b>\n";

	}

}

// Replace [::] below with 0.0.0.0 for IPv4-only operation
Nanoserv::New_Listener("tcp://[::]:800", "dumb_httpd")->Activate();
Nanoserv::Run();

?>
