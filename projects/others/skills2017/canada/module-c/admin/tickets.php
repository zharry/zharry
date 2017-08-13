<?php
	require "auth.php";
	require "connection.php";
	
	$searchContent = "";
	if (isset($_POST["search"])) {
		
		$search = htmlentities(mysqli_real_escape_string($conn, $_POST["search"]));
		
		$query = "SELECT * FROM `ticket` WHERE `surname` LIKE '%$search%' OR `forename` LIKE '%$search%';";
		$res = mysqli_query($conn, $query) or die();
		$rows = mysqli_num_rows($res);
		if ($rows > 0) {
			$searchContent = "<table border='1'><tr><td>ID</td><td>Surname</td><td>Forename</td><td>Email</td><td>Date</td><td>Event Name</td><td>Ticket Type</td><td>Physical Ticket</td></tr>";
			while($row = mysqli_fetch_assoc($res)) {				
				$searchContent .= "<tr id='" . $row["id"] . "'>";
				$searchContent .= "<td>" . $row["id"] . "</td>";
				$searchContent .= "<td>" . $row["surname"] . "</td>";
				$searchContent .= "<td>" . $row["forename"] . "</td>";
				$searchContent .= "<td>" . $row["email"] . "</td>";
				$searchContent .= "<td>" . $row["date"] . "</td>";
				$searchContent .= "<td>" . $row["event"] . "</td>";
				$searchContent .= "<td>" . $row["type"] . "</td>";
				$searchContent .= "<td>" . $row["physical"] . "</td>";
				$searchContent .= "</tr>";
			}
			$searchContent .= "</table>";
		} else {
			$searchContent .= "No tickets matching search!";
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Winnipeg Railway Museum</title>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="admin.js"></script>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Admin Panel</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Main Page: Home</a></li>
            <li class="active"><a href="tickets.php">Tickets</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </form>
        </div>
      </div>
    </nav>
	
    <!--Body-->
    <div class="container">
	
<h2 id="searchEvent">Search Tickets Surname/Forename By Name</h2>
<form action="tickets.php" method="post">
<input type="text" name="search" placeholder="Search" required><br/>
<input type="submit" value="Search">
</form>
<?php
	if (isset($_POST["search"])) {
		echo $searchContent;
	}
?>

<hr/>

<h2 id="list">List of Purchased Tickets</h2>
<?php
		
	$query = "SELECT * FROM `ticket`;";
	$res = mysqli_query($conn, $query) or die();
	$rows = mysqli_num_rows($res);
	$showAll = "";
	if ($rows > 0) {
		$showAll = "<table border='1' id='allTickets'><tr><td onclick='sortTable(0)'>ID</td><td onclick='sortTable(1)'>Surname</td><td onclick='sortTable(2)'>Forename</td><td onclick='sortTable(3)'>Email</td><td onclick='sortTable(4)'>Date</td><td onclick='sortTable(5)'>Event Name</td><td onclick='sortTable(6)'>Ticket Type</td><td onclick='sortTable(7)'>Physical Ticket</td></tr>";
		while($row = mysqli_fetch_assoc($res)) {				
			$showAll .= "<tr id='" . $row["id"] . "'>";
			$showAll .= "<td>" . $row["id"] . "</td>";
			$showAll .= "<td>" . $row["surname"] . "</td>";
			$showAll .= "<td>" . $row["forename"] . "</td>";
			$showAll .= "<td>" . $row["email"] . "</td>";
			$showAll .= "<td>" . $row["date"] . "</td>";
			$showAll .= "<td>" . $row["event"] . "</td>";
			$showAll .= "<td>" . $row["type"] . "</td>";
			$showAll .= "<td>" . $row["physical"] . "</td>";
			$showAll .= "</tr>";
		}
		$showAll .= "</table>";
	} else {
		$showAll .= "No tickets matching search!";
	}
	echo $showAll;
	
?>

</div>
</body>
</html>