#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/SOAP/Direct_Server.php";

class dumb_soap_httpd extends \Nanoserv\HTTP\SOAP\Direct_Server {

	public function buy($bar, $baz) {

		return array("foo" => $bar + $baz);

	}

}

\Nanoserv\Core::New_Listener("tcp://0.0.0.0:800", "dumb_soap_httpd")->Activate();
\Nanoserv\Core::Run();

?>
