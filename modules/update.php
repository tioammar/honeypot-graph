<?php

class update {

	private $con;
	private $host = "";
	private $port = 22;
	private $pass = "";

	public function updateDB(){
		$this->con = ssh2_connect($this->host, $this->port);
		ssh2_auth_password($this->con, $this->host, $this->pass);
		$cd = "cd /home/". $this->host . "/HoneySensor";
		$cmd = "./sensor.py";
		$cmd = $cd . "&& echo '" . $this->pass . "' | sudo -S " . $cmd;
		$stream = ssh2_exec($this->con, $cmd);
		header("Location:index.php");
	}
}

?>
