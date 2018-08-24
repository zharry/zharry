<?php

	require "connection.php";
	
	session_start();
	if (isset($_SESSION["username"])) {
		Header("Location: index.php");
	}
	
	if (isset($_POST["username"])) {
		
		$username = htmlentities(mysqli_real_escape_string($conn, $_POST["username"]));
		$password = htmlentities(mysqli_real_escape_string($conn, $_POST["password"]));
		
		$query = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='" . md5($password) . "';";
		$res = mysqli_query($conn, $query) or die();
		$rows = mysqli_num_rows($res);
		if ($rows == 1) {
			$_SESSION["username"] = $username;
			Header("Location: index.php");
		} else {
			echo "Username/Password combination incorrect!";
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
	
<form action="login.php" method="post">
<input type="text" name="username" placeholder="admin" required><br/>
<input type="password" name="password" placeholder="123456" required><br/>
<input type="submit" value="Login">
</form>

</div>
</body>
</html>