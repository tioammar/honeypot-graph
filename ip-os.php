<?php

	require_once 'include/head.php';
	$os = urldecode($_GET['os']);
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
				<?php echo "<<h2 class='page-header'># IP Using " . $os . "</h2>"; ?>
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
							$L = $p0f->getSumOSHits($os);
							$num = $L->fetch_array();
							$total = $num[0];
							$row_per_page = 15;
							$lastpage = ceil($total/$row_per_page);
							$start = ($pageno - 1) * $row_per_page;
							$R = $p0f->getIPByOS($os, $start, $row_per_page);
							$i = $start + 1;
							while ($row = $R->fetch_array()){
								echo 	"<tr>
											<td>" . $i . ".</td>
											<td><a href='profileauth.php?ip=" . $row['ipx'] . "'>" . $row['ipx'] . "</a></td>";
											$T = $country->getCountryByIP($row['ipx']);
											if ($r = $T->fetch_array()){
												echo "<td>" . $r['country_name'] . " <img src='blank.gif' class='flag flag-" . $r['country_code2'] . "'/></td>";
											}
											else {
												echo "<td>N/A</td>";
											}
											$H = $common->getHitsByIP($row['ipx']);
											if ($row = $H->fetch_array()){
												echo" <td>" . $row['hits'] . "</td>";
											}
											else {
												echo "<td>N/A</td>";
											}											
											echo"</tr>";
								$i++;
							}
						?>						
					</tbody>
				</table>
    				<div class="text-center">
						<ul class="pagination">
							<?php
								$page->common('ipb-os.php?os', $os, $pageno, $lastpage);
							?>
						</ul>
					</div>
			  	<a href="javascript:history.go(-1)" type="button" class="top btn btn-primary">&larr; Back</a>
		  	</div> <!-- col1 -->
	  	</div> <!-- page-wrapper -->
	</div> <!-- wrapper -->
</body>