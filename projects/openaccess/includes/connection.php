<?php
	require_once('/etc/mysql-creds/mysql-creds.php');
	//$conn = mysqli_connect("localhost", "root", "", "db");

	$conn = mysqli_connect($project_oa["host"], $project_oa["user"], $project_oa["pass"], $project_oa["data"]);
	
    if (!$conn) {
        die("Error establishing database connection, please contact Harry if you see this message!");
    }
?>