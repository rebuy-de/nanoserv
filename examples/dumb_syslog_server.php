#!/opt/local/bin/php
<?php

require "nanoserv/handlers/Syslog/Server.php";

class dumb_syslogger extends \Nanoserv\Syslog\Server {

	public function on_Event($host, $facility, $severity, $message) {

		echo "--- Syslog event --------------------------------------------------------------\n";
		echo "Datetime : ".date("Y-m-d H:i:s")."\n";
		echo "Host     : {$host}\n";
		echo "Facility : ".self::Code_To_Facility($facility)."\n";
		echo "Severity : {$severity}\n";
		echo "Message  : ".trim($message)."\n";

	}

}

\Nanoserv\Core::New_Listener("udp://0.0.0.0:514", "dumb_syslogger")->Activate();
\Nanoserv\Core::Run();

?>
