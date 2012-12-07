#!/opt/local/bin/php
<?php

require "nanoserv/handlers/HTTP/Server.php";

class dumb_httpd extends \Nanoserv\HTTP\Server {

	private $shared_obj;

	public function __construct($o) {

		$this->shared_obj = $o;

	}

	public function on_Request($url) {

		$val = $this->shared_obj->foo();

		return "[".posix_getpid()."] Content of shared value : <b>$val</b>";

	}

}

class foo_inc {

	public $value = 0;

	public function foo() {

		return ++$this->value;

	}

}

$o = \Nanoserv\Core::New_Shared_Object(new foo_inc);
$l = \Nanoserv\Core::New_Listener("tcp://0.0.0.0:800", "dumb_httpd", $o);

$l->Set_Forking();
$l->Activate();

$o->value = 100;

\Nanoserv\Core::Run();

?>
