<?php

	$conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER_SKILLS'), getenv('MYSQL_PASS_SKILLS'), "zharry.ca-skills-canada2017");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to the database: " . mysqli_connect_error();
		die();
	}

?>