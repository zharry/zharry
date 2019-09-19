<?php

	if (isset($_SERVER['HTTP_CF_CONNECTING_IP']))
		$ClientIP = $_SERVER['HTTP_CF_CONNECTING_IP'];
	else
		$ClientIP = $_SERVER['HTTP_X_CLIENT_IP'];
	$hostname = gethostbyaddr($ClientIP);
	date_default_timezone_set('America/Toronto');
	$ClientTime = date('H:i:s, D, M d, Y');
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ClientIP}/json"));
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	
	$iplog = $ClientIP;
	$loclog = $details->city;
	$ualog = $user_agent;
	$conlog = $details->country;
	$coordlog = $details->loc;
	$isplog = $details->org;

	$user = getenv('MYSQL_USER_PROJECT'); 
	$pass = getenv('MYSQL_PASS_PROJECT');
	$host = getenv('MYSQL_HOST');
	$dbname = "project_grade9-study"; 
	$connection = mysqli_connect($host,$user,$pass,$dbname);
	if ($connection) {
		$sql = "INSERT INTO LOG (TIME, IP, REVERSE_DNS, LOCATION, USERAGENT, COUNTRY, COORDS, ISP) VALUES ('')";

		$sql = mysqli_prepare($connection, "INSERT INTO LOG (TIME, IP, REVERSE_DNS, LOCATION, USERAGENT, COUNTRY, COORDS, ISP, PATH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$path = $_SERVER["SCRIPT_FILENAME"];
		$path = str_replace("/var/lib/openshift/54d942954382ec78cf000084/app-root/runtime/repo", "", $path);
		mysqli_stmt_bind_param($sql, 'sssssssss', $ClientTime, $iplog, $hostname, $loclog, $ualog, $conlog, $coordlog, $isplog, $path);
		mysqli_stmt_execute($sql);

		mysqli_close($connection);
	}
?>
