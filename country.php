<?php

	require_once 'include/head.php';
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
				<h1 class="page-header"># Country List</h1>
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="active">
							<th>#</th>
							<th>Country Name</th>
							<th>Country Code</th>
							<th>Unique IP</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$L = $country->getSumCountry();
							$num = $L->fetch_array();
							$total = $num[0];
							$row_per_page = 15;
							$lastpage = ceil($total/$row_per_page);
							$start = ($pageno - 1) * $row_per_page;
							$R = $country->getAllCountry($start, $row_per_page);
							$i = $start + 1;
							while ($row = $R->fetch_array()){
								echo 	"<tr>
											<td>" . $i . ".</td>
											<td><a href='ip-country.php?c=" . $row['country_code'] . "'>" . $row['country_name'] . " </a><img src='blank.gif' class='flag flag-" . $row['country_code2'] . "'/></td>
											<td>" . $row['country_code'] . "</td>
											<td><strong>" . $row['hits'] . "</strong> - IP Addr</td>
										</tr>";
								$i++;
							}
						?>						
					</tbody>
				</table>
    				<div class="text-center">
						<ul class="pagination">
							<?php
								$page->full('country.php', $pageno, $lastpage);
							?>
						</ul>
					</div>
			  	<a href="javascript:history.go(-1)" type="button" class="top btn btn-primary">&larr; Back</a>
		  	</div> <!-- col1 -->
	  	</div> <!-- page-wrapper -->
	</div> <!-- wrapper -->
</body>