<?php

	require_once 'modules/config.php';
	require_once 'modules/dionaea.php';
	require_once 'modules/fingerprint.php';
	require_once 'modules/country.php';
	require_once 'modules/common.php';
	require_once 'modules/kippo.php';
	require_once 'modules/update.php';
	require_once 'modules/pagination.php';

	$dionaea = new dionaea();
	$p0f = new fingerprint();
	$country = new country();
	$common = new common();
	$kippo = new kippo();
	$update = new update();
	$page = new pagination();
	if ($_GET['update'] == 'true'){
		$update->updateDB();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/plugins/morris.js"></script>
	<script type="text/javascript" src="js/plugins/raphael-min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/plugins/morris.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/sb-admin.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/flags.css">
</head>
<body>
	<div id="head">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
            	<img src="img/unhas_logo.png" class="logo">
                <a class="navbar-brand" href="index.php">Network Intrusion Profiling</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-stats"></span>  Dashboard </a></li>
					<li><a href="ip.php"><span class="glyphicon glyphicon-tasks"></span>  IP List </a></li>
					<li><a href="country.php"><span class="glyphicon glyphicon-flag"></span>  Country List</a></li>
					<li><a href="os.php"><span class="glyphicon glyphicon-hdd"></span>  Operating System </a></li>
					<li><a href="port.php"><span class="glyphicon glyphicon-import"></span>  Connected Port</a></li>
                </ul>
            </div>
		</nav> <!-- navbar -->
	</div> <!-- head -->
</body>
</html>