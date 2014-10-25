<?php

class pagination {

	public function common($page, $param, $pageno, $lastpage){
		echo "<li><a href='" . $page . "=" . $param . "&pageno=1'>&laquo;</a>";
		if (($pageno - 5) > 1){
			echo "<li><a href=''>...</a>";
		}
		for($i = max(1, $pageno - 5); $i <= min($pageno + 5, $lastpage); $i++){
			echo "<li><a href='" . $page . "=" . $param . "&pageno=" . $i . "'>" . $i . "</a>";
		}
		if (($pageno + 5) < $lastpage){
			echo "<li><a href=''>...</a>";
		}
		echo "<li><a href='" . $page . "=" . $param . "&pageno=" . $lastpage . "'>&raquo;</a>";
	}

	public function full($page, $pageno, $lastpage){
		echo "<li><a href='" . $page . "?pageno=1'>&laquo;</a>";
		if (($pageno - 5) > 1){
			echo "<li><a href=''>...</a>";
		}
		for ($i = max(1, $pageno - 5); $i <= min($pageno + 5, $lastpage); $i++){
			echo "<li><a href='" . $page . "?pageno=" . $i . "'>" . $i . "</a>";
		}
		if (($pageno + 5) < $lastpage){
			echo "<li><a href=''>...</a>";
		}
		echo "<li><a href='" . $page . "?pageno=" . $lastpage . "'>&raquo;</a>";
	}
}

?>