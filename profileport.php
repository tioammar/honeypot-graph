<?php

	require_once 'include/head.php';
	$ip = $_GET['ip'];
	if (isset($_GET['pageno'])) {
   		$pageno = $_GET['pageno'];
	} else {
   		$pageno = 1;
	}
	
?>

<body>
	<div id="wrapper">
		<div id='page-wrapper' class='col-xs-12'>
			<div id="col1" class="col-xs-12">
				<?php echo" <h1 class='page-header'># IP Profile: " . $ip . "</h1>"; ?>
				<?php require_once 'include/profilepane.php'; ?>
				<div class="col-sm-9">
			        <ul class="nav nav-tabs" role="tablist"><?php echo 
			            "<li><a href='profileauth.php?ip=" . $ip . "'>SSH-Auth</a></li>
			            <li><a href='profileinput.php?ip=" . $ip . "'>SSH-Input</a></li>
			            <li class='active'><a href='profileport.php?ip=" . $ip . "'>Port Connected</a></li>
			            <li><a href='profilemalware.php?ip=" . $ip . "'>Malware Used</a></li>"; ?>
			        </ul>
					<div class="content">
						<div id="ssh-auth">
							<table class="table table-striped">
								<thead>
									<tr class="active">
										<th>#</th>
										<th>Port</th>
										<th>Status</th>
										<th>Protocol</th>
										<th>Transport</th>
										<th>Timestamp</th>
									</tr>
								</thead>
								<tbody>
									<?php										
									$L = $dionaea->getSumPortByIP($ip);
										$num = $L->fetch_array();
										$total = $num[0];
										$row_per_page = 15;
										$lastpage = ceil($total/$row_per_page);
										$start = ($pageno - 1) * $row_per_page;
										$port = $dionaea->getPortByIP($ip, $start, $row_per_page);
										$i = $start + 1;
										while ($row = $port->fetch_array()){
											echo 	"<tr>
														<td>" . $i . ".</td>
														<td>" . $row['local_port'] . "</td>
														<td>" . $row['connection_type'] . "</td>
														<td>" . $row['connection_protocol'] . "</td>
														<td>" . $row['connection_transport'] . "</td>
														<td>" . $row['connection_timestamp'] . "</td>
													</tr>";
											$i++;
										}
									?>						
								</tbody>
							</table>
							<div class="text-center">
								<ul class="pagination">
									<?php
										$page->common('profileport.php?ip', $ip, $pageno, $lastpage);
									?>
								</ul>
							</div>
						</div>
					</div> <!-- content -->
			    </div> <!-- col-sm-9 -->
		  	</div>
	  	</div> <!-- page-wrapper -->
	</div> <!-- wrapper -->
</body>