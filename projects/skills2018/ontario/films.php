<?php
/* View all Films Page
For: The Hunton Collection Website
*/
	require_once("connection.php");	
?>
<!doctype html>
<html>
	<head>
		<title>Films</title>
		<link rel="stylesheet" href="src/style.css">
		<link rel="stylesheet" href="src/bootstrap.min.css">
	</head>
	
	<body onload="onLoad(); searchMovie(true);">
	<div class="topnav">
		<div id="title">
			&nbsp; <a href="index.php" style="color: black; text-decoration: none">The Hunton Collection</a>
		</div>
		<div id="menuIcon">
			<div id="hambuger">
				&equiv;
			</div>
		</div>
	</div>
	<div id="navContainer">
		<div class="navItem">
			<a href="index.php">Home Page</a>
		</div>
		<div class="navItem">
			<a href="films.php">Films</a>
		</div>
		<div class="navItem">
			<a href="about.php">About</a>
		</div>
		<div class="navItem">
			<a href="contact.php">Contact</a>
		</div>
		<div class="navItem" style="border-bottom: 1px solid black;">
			<a href="admin">Admin</a>
		</div>
	</div>
	<div class="container" id="body">
		<br/>
		<div class="row">
			<h1 style="text-align: center; width: 100%;">All Available Films</h1>
		</div>
		<div id="searchedMovies">
		</div>
	</div>
	<script src="src/script.js"></script>
	<script src="src/bootstrap.min.js"></script>
	<script src="src/jquery-3.3.1.js"></script>
	</body>
</html>