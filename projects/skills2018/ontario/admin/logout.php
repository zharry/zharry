<?php
/* Logout Page
For: The Hunton Collection Admin Panel
*/

	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: index.php");

?>