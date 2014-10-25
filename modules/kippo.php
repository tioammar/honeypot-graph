<?php

class kippo {

	private $dbcon;

	function __construct(){
		$this->dbcon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function getSumInputByIP($ip){
		$Q = "SELECT COUNT(*) FROM input_profile WHERE ip = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getInputByIP($ip, $start, $row_per_page){
		$Q = "SELECT * FROM input_profile WHERE ip = '$ip' LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumAuthByIP($ip){
		$Q = "SELECT COUNT(*) FROM auth_profile WHERE ip = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

		public function getAuthByIP($ip, $start, $row_per_page){
		$Q = "SELECT * FROM auth_profile WHERE ip = '$ip' LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}
}

?>