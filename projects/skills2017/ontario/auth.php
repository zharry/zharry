<?php

	session_start();
	if (!isset($_SESSION["skills2017-ontario_username"])) {
		Header("Location: login.php");
	}

?>