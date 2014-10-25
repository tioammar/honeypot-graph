<?php

class common {

	private $dbcon;

	function __construct(){
		$this->dbcon = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function getCommonAllIP($start, $row_per_page){
		$Q = "SELECT	ipx AS ip, hits	FROM common_ip ORDER BY	hits DESC LIMIT	$start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getStatsAllIP(){
		$Q = "SELECT	ipx AS ip, hits FROM common_ip ORDER BY hits DESC";
		$R = $this->dbcon->query($Q);
		return $R;	
	}

	public function getSumIP(){
		$Q = "SELECT COUNT(ipx) FROM common_ip";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumPort(){
		$Q = "SELECT COUNT(*) FROM (	SELECT * FROM common_port GROUP BY portx ) AS sum";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getCommonAllPort($start, $row_per_page){
		$Q = "SELECT portx AS port, COUNT(portx) as hits FROM common_port GROUP BY portx ORDER BY hits DESC LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getStatsAllPort(){
		$Q = "SELECT portx AS port, COUNT(portx) as hits FROM common_port GROUP BY portx ORDER BY hits DESC";
		$R = $this->dbcon->query($Q);
		return $R;		
	}

	public function getHitsByIP($ip){
		$Q = "SELECT * FROM common_ip WHERE ipx = '$ip'";
		$R = $this->dbcon->query($Q);
		return $R;
	}

	public function getSumIPHitsByPort($p){
		$Q = "SELECT COUNT(*) FROM  ( 	SELECT * FROM common_port WHERE portx = '$p' GROUP BY ipx ) AS sum";
		$R = $this->dbcon->query($Q);
		return $R;	
	}

	public function getIPHitsByPort($p, $start, $row_per_page){
		$Q = 	"SELECT count(ipx) AS hits, ipx AS ip, portx FROM common_port WHERE portx = '$p' GROUP BY ipx ORDER BY COUNT(ipx) DESC LIMIT $start, $row_per_page";
		$R = $this->dbcon->query($Q);
		return $R;	
	}
}

?>