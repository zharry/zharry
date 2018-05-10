<?php
/* Fetch Specific Movie Data
For: The Hunton Collection API
*/

	require_once("../connection.php");
	$id = mysqli_real_escape_string($conn, $_POST["id"]);
	$ret = array();
	
	$query = "SELECT * FROM `film` WHERE `id` = '{$id}'";
	$res = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($res)) {
		$ret[] = $row;
	}
	
	echo json_encode($ret);
?>