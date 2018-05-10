<?php
/* Search for Movie By Name
For: The Hunton Collection API
*/

	require_once("../connection.php");
	$q = mysqli_real_escape_string($conn, $_POST["query"]);
	$ret = array();
	
	$query = "SELECT * FROM `film` WHERE `title` LIKE '%{$q}%'";
	$res = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($res)) {
		$ret[] = array(
			"title" => htmlentities($row["title"]), 
			"media" => htmlentities($row["media"]), 
			"desc" => htmlentities($row["description"])
		);
	}
	
	echo json_encode($ret);
?>