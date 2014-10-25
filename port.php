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
				<h1 class="page-header"># Port List</h1>
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="active">
							<th>#</th>
							<th>Port Num.</th>
							<th>Hits</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$L = $common->getSumPort();
							$num = $L->fetch_array();
							$total = $num[0];
							$row_per_page = 15;
							$lastpage = ceil($total/$row_per_page);
							$start = ($pageno - 1) * $row_per_page;
							$R = $common->getCommonAllPort($start, $row_per_page);
							$i = $start + 1;
							while ($row = $R->fetch_array()){
								echo 	"<tr>
											<td>" . $i . ".</td>
											<td><a href='ip-port.php?p=" . $row['port'] . "'>Port: " . $row['port'] . "</a></td>
											<td><strong>" . $row['hits'] . "</strong> x</td>
										</tr>";
								$i++;
							}
						?>						
					</tbody>
				</table>
    				<div class="text-center">
						<ul class="pagination">
							<?php
								$page->full('port.php', $pageno, $lastpage);
							?>
						</ul>
					</div>
			  	<a href="index.php" type="button" class="top btn btn-primary">&larr; Back</a>
		  	</div> <!-- col1 -->
	  	</div> <!-- page-wrapper -->
	</div> <!-- wrapper -->
</body>