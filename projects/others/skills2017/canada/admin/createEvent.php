<?php

	require "auth.php";
	require "connection.php";
	
	if (isset($_POST["name"])) {
		
		$name = htmlentities(mysqli_real_escape_string($conn, $_POST["name"]));
		$description = htmlentities(mysqli_real_escape_string($conn, $_POST["description"]));
		$img = htmlentities(mysqli_real_escape_string($conn, $_POST["img"]));
		$startDate = mysqli_real_escape_string($conn, $_POST["startDate"]);
		$endDate = mysqli_real_escape_string($conn, $_POST["endDate"]);
		
		$query = "INSERT INTO `event` (`name`, `description`, `img`, `startDate`, `endDate`) VALUES ('$name', '$description', '$img', '$startDate', '$endDate');";
		$res = mysqli_query($conn, $query);
		if ($res) {
			echo "Event created!<br/>";
			echo "Return to the <a href='events.php'>events page</a>";
		}
		
	} else {
		echo "Error: No Title is provided, or the form is incomplete!";
	}

?>
