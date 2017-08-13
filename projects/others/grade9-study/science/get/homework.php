<?php

require_once('/etc/mysql-creds/mysql-creds.php');

	date_default_timezone_set('America/Toronto');
	$dtime = date("Y-m-d", time());
	$currentDate = strtotime($dtime);
	$user = $mysql_creds["user"]; 
	$pass = $mysql_creds["pass"];
	$host = $mysql_creds["host"];
	$dbname = "project_grade9-study";
	$connection = mysqli_connect($host,$user,$pass,$dbname);
	if (!$connection) {
		die();
	}
	
	$sql = "SELECT DUE, HW FROM HOMEWORK ORDER BY DUE DESC";
	$result = $connection->query($sql);

	echo '<div class="col-md-6">';

	echo '<h2 class="tit"><u>Homework</u></h2>';

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
			//$hw = preg_replace('/\\$\\$_\\((\\d+)\\)_\\$\\$/i', '<a href="javascript: openPage($1);">$1</a>', nl2br($hw));
			echo "<h2>{$rel}</h2><div class=\"well\">{$hw}</div>";
		}
	}
	else{
		echo "No homework available currently";
	}
	echo '</div>';
	
	$sql = "SELECT DUE, HW FROM EVENTS WHERE 1 = 1 ORDER BY DUE DESC";
	$result = $connection->query($sql);

	echo '<div class="col-md-6">';
	echo '<h2 class="tit"><u>Events</u></h2>';

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
			else{
				//$rel = "In " . round($rel) . " days";
				$rel = abs(round($rel)) . " days ago";
			}
			$hw = $row['HW'];
			$hw = preg_replace('/\\$\\$_\\((\\d+)\\)_\\$\\$/i', '<a href="javascript: openPage($1);">$1</a>', nl2br($hw));
			echo "<h2>{$rel}</h2><div class=\"well\">{$hw}</div>";
		}
	}
	else{
		echo 'No Upcoming events';
	}
	echo '</div>';
?>

