<?php
require "../auth.php";
requireAnyAdmin();
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Study Website Control Panel</title>

	<script type="text/javascript" src="../../res/jquery-1.9.1.min.js"></script> 
	<link rel="stylesheet" href="../../res/bootstrap.min.css" />
	<script type="text/javascript" src="../../res/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../res/font-awesome.min.css" />
</head>
<body>
	<div class="container">
		<h1>Study Website Control Panel</h1>

		<div class="row well">
			<div class="col-md-4">
  				<a href="../../science/admin/homework.php" class="btn btn-default btn-lg btn-block">Homework and Events</a>
			</div>
			<div class="col-md-4">
  				<a href="../../science/admin/fetchLog.php" class="btn btn-default btn-lg btn-block">Connection Log</a>
			</div>
		</div>
	</p>
	</div>
</body>
</html>
