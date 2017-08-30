<?php
	require_once('/etc/mysql-creds/mysql-creds.php');
	//$conn = mysqli_connect("localhost", "root", "", "db");

	$conn = mysqli_connect($projectoa["host"], $projectoa["user"], $projectoa["pass"], $projectoa["data"]);
	
    if (!$conn) {
        die("Error establishing database connection, please contact Harry if you see this message!");
    }
?>