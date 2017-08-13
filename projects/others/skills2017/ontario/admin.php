<?php

	require("auth.php");
	require("connection.php");
	
	if (isset($_POST["submit"])) {
		if ($_POST["submit"] == "new") {
			$cat = $_POST["category"];
			$category = 0;
			if ($cat == "website") {
				$category = 0;
			} else if ($cat == "software") {
				$category = 1;
			} else if ($cat == "publishments") {
				$category = 2;
			}
			
			$title = mysqli_real_escape_string($conn, $_POST["title"]);
			$content = mysqli_real_escape_string($conn, $_POST["content"]);
			$images = mysqli_real_escape_string($conn, $_POST["images"]);
		
			$query = "INSERT INTO `projects` (`category`, `title`, `content`, `images`) VALUES ('{$category}', '{$title}', '{$content}', '{$images}')";
			$res = mysqli_query($conn, $query);
			if ($res) {
				echo "<script>alert('Project Created!');</script>";
			} else {
				echo "<script>alert('Failed!');</script>";
			}
		} else if ($_POST["submit"] == "edit") {
			if ($_POST["id"] != "-1") {
				$id = mysqli_real_escape_string($conn, $_POST["id"]);
				$title = mysqli_real_escape_string($conn, $_POST["title"]);
				$content = mysqli_real_escape_string($conn, $_POST["content"]);
				$images = mysqli_real_escape_string($conn, $_POST["images"]);
				$query = "UPDATE `projects` SET `title` = '{$title}', `content` = '{$content}', `images` = '{$images}' WHERE `id` = {$id};";
				$res = mysqli_query($conn, $query);
				if ($res) {
					echo "<script>alert('Project Updated!');</script>";
				} else {
					echo "<script>alert('Failed!');</script>";
				}
			} else {
				echo "<script>alert('Please Select a Project!');</script>";
			}
		} else if ($_POST["submit"] == "delete") {
			if ($_POST["id"] != "-1") {
				$id = mysqli_real_escape_string($conn, $_POST["id"]);
				$query = "DELETE FROM `projects` WHERE `id` = {$id};";
				$res = mysqli_query($conn, $query);
				if ($res) {
					echo "<script>alert('Project Deleted!');</script>";
				} else {
					echo "<script>alert('Failed!');</script>";
				}
			} else {
				echo "<script>alert('Please Select a Project!');</script>";
			}
		}
	}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Websites</title>
		<link href="<?=$DIR ?>src/style.css" rel="stylesheet" type="text/css">
		<script src="<?=$DIR ?>src/jquery.js"></script>
	</head>
	<body>
		
		<div id="header">
			<div id="title">
				<a href="<?=$DIR ?>index.php" class="menuLink"><?=$NAME;?></a>
			</div>
			<div id="menu">
				<a href="<?=$DIR ?>website.php" class="menuLink">Websites</a> |
				<a href="<?=$DIR ?>software.php" class="menuLink">Software</a> |
				<a href="<?=$DIR ?>publishments.php" class="menuLink">Publishments</a> |
				<a href="<?=$DIR ?>logout.php" class="menuLink">Logout</a>
			</div>
			<div id="hamburger" onclick="toggleMenu()">
			&#9776;
			</div>
			<div id="mobileMenu">
				<a href="<?=$DIR ?>website.php" class="menuLink mobileMenuLink">Websites</a>
				<a href="<?=$DIR ?>software.php" class="menuLink mobileMenuLink">Software</a>
				<a href="<?=$DIR ?>publishments.php" class="menuLink mobileMenuLink">Publishments</a>
				<a href="<?=$DIR ?>logout.php" class="menuLink mobileMenuLink">Logout</a>
			</div>
		</div>
	
		<div id="adminContainer">
			<div id="edit" class="adminElem">
				<br/><br/>
				<h2>Current Projects</h2><br/>
				<?php
					$projects = array();
					$i = 0;
					$query = "SELECT * FROM `projects`";
					$res = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($res)) {
						$projects[$i] = $row;
						$i++;
					}
					
					for ($a = 0; $a < sizeof($projects); $a++) {
						echo "<div style=\"text-decoration: underline;\">".$projects[$a]["title"] . "<b style='cursor: pointer; float:right;' onclick=\"edit('".htmlentities($projects[$a]["id"])."','".htmlentities($projects[$a]["title"])."','".htmlentities($projects[$a]["content"])."','".htmlentities($projects[$a]["images"])."')\">Edit/Delete</b></div><br/>";
					}
						
				?>
				<h2 id="edit">Edit Project</h2><br/>
				<form action="admin.php" method="post">
					<input type="hidden" name="submit" value="edit" required="">
					<input id="editId" type="hidden" name="id" value="-1" required="">
					<br/>
					<h3>Title:</h3> <br/><input id="editTitle" type="text" name="title" placeholder="Title" required="" style="width: 80%; height: 30px;"><br/><br/>
					<h3>Content:</h3><br/><textarea id="editContent" name="content" placeholder="Content" style="height: 100px; width: 80%;"></textarea><br/><br/>
					<h3>Images:</h3><br/><input id="editImages" type="text" name="images" placeholder="Images: Relative Directory, Comma Separated" style="width: 80%;">
					<br/><br/><br/><input type="submit" value="Update Project" style="width: calc(80% + 4px);">
				</form>	
				<form action="admin.php" method="post">
					<input type="hidden" name="submit" value="delete" required="">
					<input id="deleteId" type="hidden" name="id" value="-1" required="">
					<input type="submit" value="Confrim Delete Project" style="width: calc(80% + 4px);">
				</form>					
			</div>
			<div id="new"  class="adminElem">
			<br/><br/>
				<h2>New Project</h2><br/>
				<form action="admin.php" method="post">
					<input type="hidden" name="submit" value="new" required="">
					<h3>Category</h3><br/>
					<p>
						<label>
							<input type="radio" name="category" value="website" required="">
							Website</label>
						<br/>
						<label>
							<input type="radio" name="category" value="software" required=""> 
							Software</label>
						<br/>
						<label>
							<input type="radio" name="category" value="publishments" required="">
							Publishments</label>
						<br/>
					</p>
					<br/>
					<h3>Title:</h3> <br/><input type="text" name="title" placeholder="Title" required="" style="width: 80%; height: 30px;"><br/><br/>
					<h3>Content:</h3><br/><textarea name="content" placeholder="Content" style="height: 100px; width: 80%;"></textarea><br/><br/>
					<h3>Images:</h3><br/><input type="text" name="images" placeholder="Images: Relative Directory, Comma Separated" style="width: 80%;">
					<br/><br/><br/><input type="submit" value="Create New Project" style="width: calc(80% + 4px);">
				</form>
			</div>
		</div>
		
		<script src="<?=$DIR ?>src/script.js"></script>
		
	</body>
</html>