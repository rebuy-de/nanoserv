#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/Server.php";

class dumb_httpd extends \Nanoserv\HTTP\Server {

	public function on_Request($url) {

		echo date("Ymd:His")." got hit by ".$this->socket->Get_Peer_Name()." : '{$url}'\n";

		return "You asked for url : <b>$url</b>";

	}

}

$l = \Nanoserv\Core::New_Listener("ssl://0.0.0.0:443", "dumb_httpd");

$l->Set_Option("ssl", "local_cert", "/etc/ssl/certs/nanoweb.pem");
$l->Set_Forking();
$l->Activate();

\Nanoserv\Core::Run();

?>
