<?php
/* Login Page
For: The Hunton Collection Admin Panel
*/

	require_once("../connection.php");
	session_start();
	if (isset($_SESSION["username"])) {
		header("Location: index.php");
	}
	if (isset($_POST["username"])) {
		// Get User/Pass from Form
		$username = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = $_POST["password"];
		$hash = "";
		
		// Check password against DB
		$passwordQuery = "SELECT * FROM `users` WHERE `username` = '{$username}'";
		$passwordRes = mysqli_query($conn, $passwordQuery);
		if (!$passwordRes || mysqli_num_rows($passwordRes) == 0) {
			echo "<script>alert('Username not found!')</script>";
		} else {
			while ($row = mysqli_fetch_assoc($passwordRes)) {
				$hash = $row["password"];
			}
			if (password_verify($password, $hash)) {
				// Login Sucess
				$_SESSION["username"] = htmlentities($_POST["username"]);
				header("Location: index.php");
			} else {
				// Login Failed
				echo "<script>alert('Login Failed! (User/Pass incorrect)')</script>";
			}
		}
	}
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
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
			<a href="index.php">Admin</a>
		</div>
	</div>
	<div class="container" id="body">
	<br/>
	<br/>
		<form action="login.php" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input required="required" type="text" class="form-control" id="username" name="username" placeholder="Eg. Admin">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input required="required" type="password" class="form-control" id="password" name="password" placeholder="Eg. 123456789">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Submit</button>
		</form>
	</div>
	<script src="../src/script.js"></script>
	<script src="../src/bootstrap.min.js"></script>
	<script src="../src/jquery-3.3.1.js"></script>
	</body>
</html>