<?php

	require("connection.php");

	session_start();
	if (isset($_SESSION["username"])) {
		Header("Location: admin.php");
	} else {
		if (isset($_POST["username"])) {
			$user = mysqli_real_escape_string($conn, $_POST["username"]);
			$pass = md5(mysqli_real_escape_string($conn, $_POST["password"]));
			$query = "SELECT * FROM `users` WHERE username='{$user}' AND password='{$pass}'";
			$res = mysqli_query($conn, $query);
			if (mysqli_num_rows($res) == 1) {
				$_SESSION["username"] = htmlentities($_POST["username"]);
				Header("Location: admin.php");
			} else {
				echo "Username or Password Incorrect!";
			}
		} else {
	
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
				<a href="<?=$DIR ?>login.php" class="menuLink">Admin</a>
			</div>
			<div id="hamburger" onclick="toggleMenu()">
			&#9776;
			</div>
			<div id="mobileMenu">
				<a href="<?=$DIR ?>website.php" class="menuLink mobileMenuLink">Websites</a>
				<a href="<?=$DIR ?>software.php" class="menuLink mobileMenuLink">Software</a>
				<a href="<?=$DIR ?>publishments.php" class="menuLink mobileMenuLink">Publishments</a>
				<a href="<?=$DIR ?>login.php" class="menuLink mobileMenuLink">Admin</a>
			</div>
		</div>
		<div id="login">
			<form action="login.php" method="post" >
				<input style="height: 40px; width: 200px;" type="text" name="username" placeholder="Username" required><br/>
				<input style="height: 40px; width: 200px;" type="password" name="password" placeholder="Password" required><br/>
				<input type="submit" style="height: 40px; width: 204px;">
			</form>
		</div>
		
		<div id="footer">
		&copy; James Johnson 2017
		</div>
		
		<script src="<?=$DIR ?>src/script.js"></script>
		
	</body>
</html>



<?php } } ?>