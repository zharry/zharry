<?php

//$whitelist = array( '127.0.0.1','::1' );
//if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
//	$conn = mysqli_connect("localhost", "root", "", "brain");
//} else {
	$conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER_BRAIN'), getenv('MYSQL_PASS_BRAIN'), "brain");
//}

if (!$conn) {
	die("Error establishing database connection!");
}
	
?>