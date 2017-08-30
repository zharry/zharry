<?php

	session_start();
	// Check to see if already logged in
	if (isset($_SESSION["username"])) {
		Header('Location: dashboard.php');
	} else {
		Header('Location: landing.php');
	}
	
?>