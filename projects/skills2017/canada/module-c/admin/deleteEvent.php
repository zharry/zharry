<?php

	require "auth.php";
	require "connection.php";
	
	if (isset($_POST["id"])) {
		
		$id = mysqli_real_escape_string($conn, $_POST["id"]);
		
		$query = "DELETE FROM `event` WHERE `id` = '$id'";
		$res = mysqli_query($conn, $query);
		if ($res) {
			echo mysqli_affected_rows($conn);
			echo " event(s) deleted!<br/>";
			echo "Return to the <a href='events.php'>events page</a>";
		} else {
			echo "Database manipulation is disabled for security purposes!";
			echo "Return to the <a href='events.php'>events page</a>";
			//echo "Error: Failed to update!";
		}
		
	} else {
		echo "Error: No event ID is provided, or the form is incomplete!";
	}

?>
