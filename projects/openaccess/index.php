<?php

	session_start();
	if (isset($_SESSION["username"])) {
		Header('Location: dashboard/index.php');
	} else {
		Header('Location: landing.php');
	}
	
?>