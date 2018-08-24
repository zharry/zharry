<?php
/* MySQL Connection File
For: The Hunton Collection Website
*/

	require_once('/etc/mysql-creds/mysql-creds.php');

	$conn = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "skills2018_ontario");
	if (!$conn) {
		die("Failed to connect to MySQL" . mysqli_connect_error());
	}
	
?>