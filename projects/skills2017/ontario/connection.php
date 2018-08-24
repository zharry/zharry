<?php

	require("config.php");

	$conn = mysqli_connect($HOST, $USER, $PASS, $DB);
	if (mysqli_errno($conn)) {
		echo "Error: " . mysqli_error();
	}
	
?>