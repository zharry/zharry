<?php

	$conn = mysqli_connect("localhost", "root", "", "wrm");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to the database: " . mysqli_connect_error();
		die();
	}

?>