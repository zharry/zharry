<?php

	session_start();
	if (!isset($_SESSION["username"])) {
		Header("Location: login.php");
	}

?>