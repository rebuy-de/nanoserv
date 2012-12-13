#!/opt/local/bin/php
<?php

require "nanoserv/nanoserv.php";

class http_head_client extends \Nanoserv\Connection_Handler {

	function on_Connect() {

		$this->Write("HEAD / HTTP/1.0\r\n\r\n");

	}

	public function on_Read($data) {

		echo $data;

	}

	public function on_Disconnect() {

		echo "\n";
		exit();

	}

}

\Nanoserv\Core::New_Connection("tcp://www.google.com:80", "http_head_client")->Connect();
\Nanoserv\Core::Run();

?>
