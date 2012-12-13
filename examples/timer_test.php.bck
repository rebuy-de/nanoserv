#!/opt/local/bin/php
<?

require "nanoserv/nanoserv.php";

class timer_test extends \Nanoserv\Connection_Handler {

	public $cd = 10;

	function on_Accept() {

		$this->Write("starting countdown in 5 seconds ... ");

		\Nanoserv\Core::New_Timer(5, array($this, "Countdown"));

	}

	function Countdown() {

		$this->Write($this->cd--." ");
		
		\Nanoserv\Core::New_Timer(0.5, array($this, $this->cd ? "Countdown" : "Disconnect"));

	}

}

\Nanoserv\Core::New_Listener("tcp://0.0.0.0:999", "timer_test")->Activate();
\Nanoserv\Core::Run();

?>
