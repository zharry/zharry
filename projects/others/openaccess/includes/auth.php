<?php

	if (!isset($_SESSION['openaccess_username'])) {
		header('Location: login.php');
	}

?>