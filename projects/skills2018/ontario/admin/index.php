<?php
/* Administrator Page
For: The Hunton Collection Admin Panel
*/

	require_once("../connection.php");
	session_start();
	if (!isset($_SESSION["skills2018-ontario_username"])) {
		header("Location: login.php");
	}
	
	// Handle Forms
	if (isset($_POST["action"])) {
		if ($_POST["action"] == "create") {
			$title = mysqli_real_escape_string($conn, $_POST["createTitle"]);
			$img = mysqli_real_escape_string($conn, $_POST["createImg"]);
			$desc = mysqli_real_escape_string($conn, $_POST["createDesc"]);
			
			$query = "INSERT INTO `film` ( `title`, `description`, `media`) VALUES ('{$title}', '{$desc}', '{$img}');";
			$res = mysqli_query($conn, $query);
			if ($res) {
				echo "<script>alert('Successfully added Movie!')</script>";
			} else {
				echo "<script>alert('Database manipulation is disabled for security purposes!')</script>";
			}
		} else if ($_POST["action"] == "edit"){
			$id = mysqli_real_escape_string($conn, $_POST["editID"]);
			$title = mysqli_real_escape_string($conn, $_POST["editTitle"]);
			$img = mysqli_real_escape_string($conn, $_POST["editImg"]);
			$desc = mysqli_real_escape_string($conn, $_POST["editDesc"]);
			
			$query = "UPDATE `film` SET `title` = '{$title}', `description` = '{$desc}', `media` = '{$img}' WHERE `id` = {$id};";
			$res = mysqli_query($conn, $query);
			if ($res) {
				echo "<script>alert('Successfully edited Movie!')</script>";
			} else {
				echo "<script>alert('Database manipulation is disabled for security purposes!')</script>";
			}
		}
	}

?>
<!doctype html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="../src/style.css">
		<link rel="stylesheet" href="../src/bootstrap.min.css">
	</head>
	
	<body onload="onLoad();">
	<div class="topnav">
		<div id="title">
			&nbsp; <a href="../index.php" style="color: black; text-decoration: none">The Hunton Collection</a>
		</div>
		<div id="menuIcon">
			<div id="hambuger">
				&equiv;
			</div>
		</div>
	</div>
	<div id="navContainer">
		<div class="navItem">
			<a href="../index.php">Home Page</a>
		</div>
		<div class="navItem">
			<a href="../films.php">Films</a>
		</div>
		<div class="navItem">
			<a href="../about.php">About</a>
		</div>
		<div class="navItem">
			<a href="../contact.php">Contact</a>
		</div>
		<div class="navItem" style="border-bottom: 1px solid black;">
			<a href="logout.php">Logout</a>
		</div>
	</div>
	<div class="container" id="body">
	<br/>
		<hr style="background-color:black;"/>
		<h2>Create Movie</h2>
		<form id="createMovie" action="index.php" method="post">
			<input type="text" name="action" value="create" hidden="hidden">
			<div class="form-group">
				<label for="createTitle">Title</label>
				<input required="required" type="text" class="form-control" id="createTitle" name="createTitle" placeholder="Movie Name">
			</div>
			<div class="form-group">
				<label for="createImg">Media</label>
				<input required="required" type="text" class="form-control" id="createImg" name="createImg" placeholder="link/to/media.file">
			</div>
			<div class="form-group">
				<label for="createDesc">Description</label>
				<textarea required="required" type="text" form="createMovie" class="form-control" id="createDesc" name="createDesc" placeholder="Movie Description"></textarea>
			</div>
			<button type="submit" class="btn btn-info">Create</button>
		</form>
		<hr style="background-color:black;"/>
		<h2>Current Movies</h2>
		<div id="moviesList">
			<table style="width:100%">
			<?php
				$query = "SELECT * FROM `film`";
				$res = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_assoc($res)) {
					?>
					<tr>
						<td><?=htmlentities($row["title"])?></td>
						<td><button class="btn btn-primary" style="float: right" onclick="editMovie(<?=$row["id"]?>)">Edit</button></td>
						<td><button id="del-<?=$row["id"]?>" class="btn btn-danger deleteButton" style="float: left" onclick="deleteMovie(<?=$row["id"]?>)">Delete</button></td>
					</tr>
					<?php
				}
			?>
			</table>
		</div>
		<hr style="background-color:black;"/>
		<h2>Edit Movie</h2>
		<form id="editMovie" action="index.php" method="post">
			<input type="text" name="action" value="edit" hidden="hidden">
			<input type="text" id="editID" name="editID" value="-1" hidden="hidden">
			<div class="form-group">
				<label for="editTitle">Title</label>
				<input required="required" type="text" class="form-control" id="editTitle" name="editTitle" placeholder="Movie Name">
			</div>
			<div class="form-group">
				<label for="editImg">Media</label>
				<input required="required" type="text" class="form-control" id="editImg" name="editImg" placeholder="link/to/media.file">
			</div>
			<div class="form-group">
				<label for="editDesc">Description</label>
				<textarea required="required" type="text" form="editMovie" class="form-control" id="editDesc" name="editDesc" placeholder="Movie Description"></textarea>
			</div>
			<button type="submit" class="btn btn-success">Save</button>
		</form>
		<hr style="background-color:black;"/>
		<br/>
		<br/>
	</div>
	<script src="../src/script.js"></script>
	<script src="../src/bootstrap.min.js"></script>
	<script src="../src/jquery-3.3.1.js"></script>
	</body>
</html>