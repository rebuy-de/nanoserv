#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/XML_RPC/Persistent_Server.php";

class dumb_xmlrpc {

	public $bar;

	public function getFoo($bar) {

		return array("foo" => "foo{$bar}", "bar" => $this->bar++);

	}

}

$o = new dumb_xmlrpc();

$l = \Nanoserv\Core::New_Listener("tcp://0.0.0.0:800", '\Nanoserv\HTTP\XML_RPC\Persistent_Server', \Nanoserv\Core::New_Shared_Object($o));

$l->Set_Forking();
$l->Activate();

$o->bar = 100;

\Nanoserv\Core::Run();

?>
