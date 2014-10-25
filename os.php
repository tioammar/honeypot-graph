<?php
	require_once 'include/head.php';
?>

<body>
	<div id="wrapper">
		<div id='page-wrapper' class='col-xs-10'>
			<div id="col1" class="col-xs-12">
				<h1 class="page-header"># Operating System</h1>
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="active">
							<th>#</th>
							<th>OS</th>
							<th>Used</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$R = $p0f->getOSHits();
							$i = 1;
							while ($row = $R->fetch_array()){
								echo 	"<tr>
											<td>" . $i . ".</td>
											<td><a href='ip-os.php?os=" . urlencode($row['os']) . "'>" . $row['os'] . "</a></td>
											<td><strong>" . $row['used'] . "</strong> - IP Addr</td>
										</tr>";
								$i++;
							}
						?>						
					</tbody>
				</table>
			  	<a href="index.php" type="button" class="top btn btn-primary">&larr; Back</a>
		  	</div> <!-- col1 -->
	  	</div> <!-- page-wrapper -->
	</div> <!-- wrapper -->
</body>