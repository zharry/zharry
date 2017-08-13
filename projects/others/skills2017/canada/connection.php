<?php

	require_once('/etc/mysql-creds/mysql-creds.php');

	$conn = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "skills2017_canada");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to the database: " . mysqli_connect_error();
		die();
	}

?>