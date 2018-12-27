<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
    <title>
	<?php 
		if(isset($title))
			echo $title; 
		else
			echo "Project: Open Access";
	?>
	</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php?active=home">Project: Open Access</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link <?php if ($active == "home") { echo "active"; } ?>" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($active == "usage") { echo "active"; } ?>" href="usage.php">Usage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($active == "web") { echo "active"; } ?>" href="web.php">Web Proxy</a>
          </li>
        </ul>
		<?php
			if (!isset($_SESSION['openaccess_username'])) {
		?>
        <a class="btn btn-outline-success my-2 my-sm-0" style="color: white;" href="login.php">Login</a>
        &nbsp <a class="btn btn-outline-success my-2 my-sm-0" style="color: white;" href="register.php">Register</a>
		<?php
			} else {
		?>
        <a class="btn btn-outline-success my-2 my-sm-0" style="color: white;" href="dashboard.php">Dashboard</a>
        &nbsp <a class="btn btn-outline-success my-2 my-sm-0" style="color: white;" href="logout.php">Logout</a>
		<?php
			}
		?>
      </div>
    </nav>
	<div class="container" id="body">
