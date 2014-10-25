<?php

class country {

	private $dbcon;

	function __construct(){
		$this->dbcon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function getAllCountry($start, $row_per_page){
		$Q = "SELECT COUNT(country_name) AS hits, country_name, country_code, country_code2 FROM geoip GROUP BY country_name ORDER BY COUNT(country_name) DESC LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumCountry(){
		$Q = "SELECT COUNT(*) FROM ( SELECT * FROM geoip GROUP BY country_name ) AS sum";
		$R = $this->dbcon->query($Q);
		return $R;		
	}

	public function getStatsCountry(){
		$Q = "SELECT COUNT(country_name) AS hits, country_name FROM geoip GROUP BY country_name ORDER BY COUNT(country_name) DESC";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getCountryByIP($ip){
		$Q = "SELECT	* FROM geoip WHERE ip = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumIPByCountry($c){
		$Q = "SELECT COUNT(country_code) FROM geoip WHERE country_code = '$c'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getIPByCountry($c, $start, $row_per_page){
		$Q = "SELECT * FROM geoip WHERE country_code = '$c' LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}
}

?>