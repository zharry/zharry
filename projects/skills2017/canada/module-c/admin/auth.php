<?php

	session_start();
	if (!isset($_SESSION["skills2017-canada_username"])) {
		Header("Location: login.php");
	}

?>