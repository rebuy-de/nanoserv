#!/opt/local/bin/php
<?php

require "nanoserv/handlers/SMTP/Server.php";

class dumb_smtpd extends \Nanoserv\SMTP\Server {

	function on_Mail($from, $to, $data) {

		echo "mail from: $from\n";
		echo "mail to  : ".implode(", ", $to)."\n";
		echo "\n".$data."[EOM]\n";

		return false;

	}

}

\Nanoserv\Core::New_Listener("tcp://0.0.0.0:250", "dumb_smtpd")->Activate();
\Nanoserv\Core::Run();

?>
