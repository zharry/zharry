<?php
	// require_once('/etc/mysql-creds/mysql-creds.php');
	$conn = mysqli_connect("localhost", "root", "", "openaccess");

    if (!$conn) {
        die("Error establishing database connection, please contact Harry if you see this message!");
    }
?>