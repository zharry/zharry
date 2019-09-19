<?php

	$conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER_PROJECT'), getenv('MYSQL_PASS_PROJECT'), "project_openaccess");
	
    if (!$conn) {
        die("Error establishing database connection, please contact Harry if you see this message!");
    }
?>