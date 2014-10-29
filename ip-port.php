<?php

	require_once 'include/head.php';
	$port = $_GET['p'];
	if (isset($_GET['pageno'])) {
   		$pageno = $_GET['pageno'];
	} else {
   		$pageno = 1;
	}

?>

<body>
	<div id="wrapper">
		<div id='page-wrapper' class='col-xs-10'>
			<div id="col1" class="col-xs-12">
				<?php echo "<h2 class='page-header'># IP Connected To Port: " . $port . "</h2>"; ?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="active">
							<th>#</th>
							<th>IP Address</th>
							<th>Origin</th>
							<th>Hits</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$L = $common->getSumIPHitsByPort($port);
							$num = $L->fetch_array();
							$total = $num[0];
							$row_per_page = 15;
							$lastpage = ceil($total/$row_per_page);
							$start = ($pageno - 1) * $row_per_page;
							$R = $common->getIPHitsByPort($port, $start, $row_per_page);
							$i = $start + 1; 
							while ($row = $R->fetch_array()){
								echo 	"<tr>
											<td>" . $i . ".</td>
											<td><a href='profileauth.php?ip=" . $row['ip'] . "'>" . $row['ip'] . "</a></td>";
											$T = $country->getCountryByIP($row['ip']);
											if ($r = $T->fetch_array()){
												echo "<td>" . $r['country_name'] . " <img src='blank.gif' class='flag flag-" . $r['country_code2'] . "'/></td>";
											}
											else {
												echo "<td>N/A</td>";
											}
											echo" <td>" . $row['hits'] . "</td>
										</tr>";
								$i++;
							}
						?>						
					</tbody>
				</table>
    				<div class="text-center">
						<ul class="pagination">
							<?php
								$page->common('ip-port.php?p', $port, $pageno, $lastpage);
							?>
						</ul>
					</div>
			  	<a href="javascript:history.go(-1)" type="button" class="top btn btn-primary">&larr; Back</a>
		  	</div> <!-- col1 -->
	  	</div> <!-- page-wrapper -->
	</div> <!-- wrapper -->
</body>