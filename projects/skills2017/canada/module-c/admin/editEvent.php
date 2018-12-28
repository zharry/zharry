<?php

	require "auth.php";
	require "connection.php";
	
	if (isset($_POST["id"])) {
		
		$id = mysqli_real_escape_string($conn, $_POST["id"]);
		$name = htmlentities(mysqli_real_escape_string($conn, $_POST["name"]));
		$description = htmlentities(mysqli_real_escape_string($conn, $_POST["description"]));
		$img = htmlentities(mysqli_real_escape_string($conn, $_POST["img"]));
		$startDate = mysqli_real_escape_string($conn, $_POST["startDate"]);
		$endDate = mysqli_real_escape_string($conn, $_POST["endDate"]);
		
		$query = "UPDATE `event` SET `name` = '$name', `description` = '$description', `img` = '$img', `startDate` = '$startDate', `endDate` = '$endDate' WHERE `event`.`id` = '$id';";
		$res = mysqli_query($conn, $query);
		if ($res) {
			echo mysqli_affected_rows($conn);
			echo " event(s) updated!<br/>";
			echo "Return to the <a href='events.php'>events page</a>";
		} else {
			echo "Database manipulation is disabled for security purposes! ";
			echo "Return to the <a href='events.php'>events page</a>";
			//echo "Error: Failed to update!";
		}
		
	} else {
		echo "Error: No event ID is provided, or the form is incomplete!";
	}

?>
