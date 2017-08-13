<?php
	require "auth.php";
	require "connection.php";
	
	$serachResults = "";
	if (isset($_POST["search"])) {
		
		$search = htmlentities(mysqli_real_escape_string($conn, $_POST["search"]));
		
		$query = "SELECT * FROM `event` WHERE `name` LIKE '%$search%';";
		$res = mysqli_query($conn, $query) or die();
		$rows = mysqli_num_rows($res);
		if ($rows > 0) {
			
			// Pagination Tabs
			$page = 0;
			$displayRow = 0;
			$totalRows = 0;
			
			// Display Variables
			$tabs = "<ul class=\"nav nav-tabs\" role=\"tablist\">";
			$panes = "<div class=\"tab-content\">";
			
			while($row = mysqli_fetch_assoc($res)) {
				$displayRow = $displayRow == 5 ? 0 : $displayRow;
				if ($displayRow == 0) {
					$page += 1;
					$tabs .= "<li role=\"presentation\" class=\"\"><a href=\"#sePP$page\" role=\"tab\" data-toggle=\"tab\">$page</a></li>";
					$panes .= "<div role=\"tabpanel\" class=\"tab-pane\" id=\"sePP$page\">";
					$panes .= "<table border='1'><tr><td>ID</td><td>Name</td><td>Description</td><td>Img Link</td><td>Start Date</td><td>End Date</td></tr>";
				}
				
				$panes .= "<tr id='" . $row["id"] . "'>";
				$panes .= "<td>" . $row["id"] . "</td>";
				$panes .= "<td>" . $row["name"] . "</td>";
				$panes .= "<td>" . $row["description"] . "</td>";
				$panes .= "<td>" . $row["img"] . "</td>";
				$panes .= "<td>" . $row["startDate"] . "</td>";
				$panes .= "<td>" . $row["endDate"] . "</td>";
				$panes .= "</tr>";
				
				$totalRows += 1;
				if ($displayRow == 4 || $totalRows == $rows) {
					$panes .=  "</table>";
					$panes .= "</div>";
				}
				$displayRow ++;
			}
			
			// Display Variables
			$tabs .= "</ul></ul></ul></ul>";
			$panes .= "</div>";
			
			
			$serachResults .= $tabs;
			$serachResults .= $panes;
		} else {
			$serachResults .= "No events matching search!";
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
            <li><a href="tickets.php">Tickets</a></li>
            <li class="active"><a href="events.php">Events</a></li>
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


<h2 id="create">Create Event</h2>
<form action="createEvent.php" method="post">
<input type="text" name="name" placeholder="Title" required><br/>
<textarea type="text" name="description" placeholder="Text" required></textarea><br/>
<input type="text" name="img" placeholder="img/..."><br/>
<input type="date" name="startDate" required><br/>
<input type="date" name="endDate" required><br/>
<input type="submit" value="Create">
</form>

<hr/>

<h2 id="searchEvent">Search Event By Name</h2>
<form action="events.php" method="post">
<input type="text" name="search" placeholder="Search" required><br/>
<input type="submit" value="Search">
</form>
<?php
	if (isset($_POST["search"])) {
		echo $serachResults;
	}
?>

<hr/>


<h2 id="list">List of Events</h2>
<p>Pages:</p>
<?php
	$query = "SELECT * FROM `event`;";
	$res = mysqli_query($conn, $query) or die();
	$rows = mysqli_num_rows($res);
	if ($rows > 0) {
		
		// Pagination Tabs
		$page = 0;
		$displayRow = 0;
		$totalRows = 0;
		
		// Display Variables
		$tabs = "<ul class=\"nav nav-tabs\" role=\"tablist\">";
		$panes = "<div class=\"tab-content\">";
		
		while($row = mysqli_fetch_assoc($res)) {
			$displayRow = $displayRow == 5 ? 0 : $displayRow;
			if ($displayRow == 0) {
				$page += 1;
				$tabs .= "<li role=\"presentation\" class=\"\"><a href=\"#ePP$page\" role=\"tab\" data-toggle=\"tab\">$page</a></li>";
				$panes .= "<div role=\"tabpanel\" class=\"tab-pane\" id=\"ePP$page\">";
				$panes .= "<table border='1'><tr><td>ID</td><td>Name</td><td>Description</td><td>Img Link</td><td>Start Date</td><td>End Date</td><td>Edit</td><td>Delete</td></tr>";
			}
			
			$panes .= "<tr id='" . $row["id"] . "'>";
			$panes .= "<td>" . $row["id"] . "</td>";
			$panes .= "<td>" . $row["name"] . "</td>";
			$panes .= "<td>" . $row["description"] . "</td>";
			$panes .= "<td>" . $row["img"] . "</td>";
			$panes .= "<td>" . $row["startDate"] . "</td>";
			$panes .= "<td>" . $row["endDate"] . "</td>";
			$panes .= "<td><button onclick='edit(" . $row["id"] . ")'>Edit</button></td>";
			$panes .= "<td><button onclick='del(" . $row["id"] . ")'>Delete</button></td>";
			$panes .= "</tr>";
			
			$totalRows += 1;
			if ($displayRow == 4 || $totalRows == $rows) {
				$panes .=  "</table>";
				$panes .= "</div>";
			}
			$displayRow ++;
		}
		
		// Display Variables
		$tabs .= "</ul></ul></ul></ul>";
		$panes .= "</div>";
		
		
		echo $tabs;
		echo $panes;
	} else {
		echo "No events!";
	}
	
?>

<hr/>

<h2 id="edit">Edit Event</h2>
<div id="editWarning" style="display: block">
	<p>Please select event from list above</p>
</div>
<div id="editContent" style="display: none">
	<form action="editEvent.php" method="post">
		<input id="editID" type="hidden" name="id" value="" required><br/>
		<input id="editName"  type="text" name="name" placeholder="Title" required><br/>
		<textarea id="editDesc" type="text" name="description" placeholder="Text" required></textarea><br/>
		<input id="editImg" type="text" name="img" placeholder="img/..."><br/>
		<input id="editStart" type="text" name="startDate" required><br/>
		<input id="editEnd" type="text" name="endDate" required><br/>
		<input type="submit" value="Save Changes">
	</form>
	<button onclick="cancelEdit()">Cancel (Deletes Changes)</button>
</div>

<hr/>

<h2 id="delete">Delete Event</h2>
<div id="deleteWarning" style="display: block">
	<p>Please select event from list above</p>
</div>
<div id="deleteContent" style="display: none">
	<form action="deleteEvent.php" method="post">
		<input id="deleteID" type="hidden" name="id" value="" required><br/>
		<input id="deleteName"  type="text" name="name" placeholder="Title" required><br/>
		<input type="submit" value="Confirm Delete">
	</form>
	<button onclick="cencelDelete()">Cancel</button>
</div>

</div>
</body>
</html>