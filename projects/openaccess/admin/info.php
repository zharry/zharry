<?php

	require_once('/etc/mysql-creds/mysql-creds.php');
	require_once('/etc/other-creds/creds.php');

	echo $mysql_creds["host"];
	echo $project_oa["host"];
	echo $test;
	
	phpinfo();
	
?>