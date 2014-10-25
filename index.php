<?php
	require_once 'include/head.php';
?>

<body>
	<div id="wrapper">
		<div id="page-wrapper" class="col-xs-12">
			<div id="col1" class="container-fluid">
			<h1 class="page-header">Dasboard <small>Statistics Overview</small></h1>
				<div class="col-md-6">
					<h3>Top IP</h3>
				  	<div id="hit-by-ip"></div>
				</div>
			  	<div class="col-md-6">
				  	<h3>Top Countries</h3>
				  	<div id="country-attackers"></div>
			  	</div>
			</div>
		  	<div id="col3" class="container-fluid">
			  	<div class='col-md-6'>
				  	<h3>Most Connected Ports</h3>
				  	<div id="port-hit"></div>
			  	</div> 
			  	<div class='col-md-6'>
				  	<h3>Most Used OS</h3>
				  	<div id="os-use"></div>
			  	</div>
		  	</div>
		</div> <!-- main-body -->
	</div>
</body>

<?php
	require_once 'include/script.php';
?>
