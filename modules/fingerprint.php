<?php

class fingerprint {

	private $dbcon;

	function __construct(){
		$this->dbcon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function getOSHits(){
		$Q = "SELECT COUNT(os) AS used, os FROM os_used GROUP BY os ORDER BY COUNT(os) DESC";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumOSHits($os){
		$Q = "SELECT COUNT(os) FROM os_used WHERE os = '$os' GROUP BY os";
		$R = $this->dbcon->query($Q);
		return $R;
	}	

	public function getOSByIP($ip){
		$Q = "SELECT * FROM p0f_fingerprint WHERE ip = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getIPByOS($os, $start, $row_per_page){
		$Q = "SELECT * FROM os_used WHERE os = '$os' LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}
}

?>