<?php

	session_start();
	session_destroy();
	date_default_timezone_set('America/Toronto');
	$dtime = date("Y-m-d", time());
	$currentDate = strtotime($dtime);
	$user = getenv('MYSQL_USER_PROJECT'); 
	$pass = getenv('MYSQL_PASS_PROJECT');
	$host = getenv('MYSQL_HOST');
	$dbname = "zharry.ca-project-grade9study";
	$connection = mysqli_connect($host,$user,$pass,$dbname);
	if (!$connection) {
		die();
	}
	
	$limit = 0 /*date("Y-m-d", strtotime($dtime) - 1036800)*/;
	$pevents = 0 /*date("Y-m-d", strtotime($dtime) - 1036800)*/;
	
	$sql = "SELECT DUE, HW FROM HOMEWORK WHERE 1 = 1 ORDER BY DUE DESC";
	$result = $connection->query($sql);

	echo '<div style="float: left; width: 1%;"> &nbsp </div><div style="float: left; width: 46%; min-width: 260px;"><h2><u>Homework</u></h2><br/>';

	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$due = strtotime($row['DUE']);
			$rel = ($due - $currentDate) / 86400;
			if($rel == 1){
				$rel = 'Tomorrow';
			}
			else if($rel == 0){
				$rel = 'Today';
			}
			else if($rel == -1){
				$rel = 'Yesterday';
			}
			else{
				$rel = date('D, M d, Y', strtotime($row['DUE']));
			}
			$hw = $row['HW'];
			$hw = preg_replace('/\\$\\$_\\((\\d+)\\)_\\$\\$/i', '$1', nl2br($hw));
			echo "<h2>{$rel}</h2>{$hw}<hr/>";
		}
	}
	else{
		echo "No homework available currently";
	}
	echo '</div><div style="float: left; width: 4%;"> &nbsp </div>';
	
	$sql = "SELECT DUE, HW FROM EVENTS WHERE 1 = 1 ORDER BY DUE DESC";
	$result = $connection->query($sql);

	echo '<div style="float: left; width: 46%; min-width: 260px;"><h2><u>Events</u></h2><br/>';

	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$due = strtotime($row['DUE']);
			$rel = ($due - $currentDate) / 86400;
			if($rel == 0){
				$rel = "Today";
			}
			else if($rel == 1){
				$rel = "Tomorrow";
			}
			else if($rel >= 2){
				$rel = "In {$rel} days";
			}
			else if($rel == -1) {
				$rel = "Yesterday";
			}
			else if($rel < -1) {
				$rel = abs($rel);
				$rel = "{$rel} days ago";
			}
			$hw = $row['HW'];
			$hw = preg_replace('/\\$\\$_\\((\\d+)\\)_\\$\\$/i', '$1', nl2br($hw));
			echo "<h2>{$rel}</h2>{$hw}<hr/>";
		}
	}
	else{
		echo 'No Upcoming events';
	}
	echo '</div><div style="float: left; width: 2%;"> &nbsp </div>';
?>

