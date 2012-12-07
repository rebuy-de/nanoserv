#!/opt/local/bin/php
<?php

// Simple time server with tcp and udp support (RFC868 compliant)

require "nanoserv/nanoserv.php";

use \Nanoserv\Core as Nanoserv;

function rfc868_time() {

	return pack("N", time() + 2208988800);

}

class time_server_tcp extends \Nanoserv\Connection_Handler {

	public function on_Accept() {

		$this->Write(rfc868_time(), array($this, "Disconnect"));

	}

}

class time_server_udp extends \Nanoserv\Datagram_Handler {

	public function on_Read($from, $data) {

		$this->Write($from, rfc868_time());

	}

}

Nanoserv::New_Listener("tcp://0.0.0.0:37", "time_server_tcp")->Activate();
Nanoserv::New_Listener("udp://0.0.0.0:37", "time_server_udp")->Activate();

Nanoserv::Run();

?>
