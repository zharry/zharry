<?php
/* MySQL Connection File
For: The Hunton Collection Website
*/

	$conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER_SKILLS'), getenv('MYSQL_PASS_SKILLS'), "skills_ontario-2018");
	if (!$conn) {
		die("Failed to connect to MySQL" . mysqli_connect_error());
	}
	
?>