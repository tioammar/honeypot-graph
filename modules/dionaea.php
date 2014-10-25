<?php

class dionaea {

	private $dbcon;

	function __construct(){
		$this->dbcon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function getSumPortByIP($ip){
		$Q = "SELECT COUNT(*) FROM dionaea_connections WHERE remote_ip = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getPortByIP($ip, $start, $row_per_page){
		$Q = "SELECT * FROM dionaea_connections WHERE remote_ip = '$ip' LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumMalwareByIP($ip){
		$Q = "SELECT COUNT(*) FROM malware_download WHERE remote_ip = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;		
	}

	public function getMalwareByIP($ip, $start, $row_per_page){
		$Q = "SELECT * FROM malware_download WHERE remote_ip = '$ip' LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;		
	}
}

?>