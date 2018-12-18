<?php
	
	require "connection.php";
	
	if (!isset($_POST["purchase"])) {
		Header("Location: events.php");
	} else {
		$surname = htmlentities(mysqli_real_escape_string($conn, $_POST["surname"]));
		$forename = htmlentities(mysqli_real_escape_string($conn, $_POST["forename"]));
		$email = htmlentities(mysqli_real_escape_string($conn, $_POST["email"]));
		$address = htmlentities(mysqli_real_escape_string($conn, $_POST["address"]));
		$city = htmlentities(mysqli_real_escape_string($conn, $_POST["city"]));
		$province = htmlentities(mysqli_real_escape_string($conn, $_POST["province"]));
		$postal = htmlentities(mysqli_real_escape_string($conn, $_POST["postal"]));
		$card = htmlentities(mysqli_real_escape_string($conn, $_POST["card"]));
		
		$adults = mysqli_real_escape_string($conn, $_POST["adults"]);
		$children = mysqli_real_escape_string($conn, $_POST["children"]);
		$seniors = mysqli_real_escape_string($conn, $_POST["seniors"]);
		
		$physcial = "off";
		if (isset($_POST["type"])) {
			$physcial = htmlentities(mysqli_real_escape_string($conn, $_POST["type"]));
		}
		
		$eventDate = htmlentities(mysqli_real_escape_string($conn, $_POST["eventDate"]));
		$eventName = htmlentities(mysqli_real_escape_string($conn, $_POST["eventName"]));
		
		$resultContent = "<br/><br/><br/><br/><p style='font-size: 18px; text-align: center;'>";
		for ($i = 0; $i < $adults; $i+=1) {
			$query = "INSERT INTO `ticket` (`surname`, `forename`, `email`, `address`, `city`, `province`, `postal`, `card`, `date`, `event`, `type`, `physical`) VALUES ('$surname', '$forename', '$email', '$address', '$city', '$province', '$postal', '$card', '$eventDate', '$eventName', 'Adult', '$physcial');;";
			$res = mysqli_query($conn, $query);
			if ($res) {
				$resultContent .= "Adult Ticket for " . $eventName . " purchased!<br/>";
			}
		}
		
		for ($i = 0; $i < $children; $i+=1) {
			$query = "INSERT INTO `ticket` (`surname`, `forename`, `email`, `address`, `city`, `province`, `postal`, `card`, `date`, `event`, `type`, `physical`) VALUES ('$surname', '$forename', '$email', '$address', '$city', '$province', '$postal', '$card', '$eventDate', '$eventName', 'Child', '$physcial');;";
			$res = mysqli_query($conn, $query);
			if ($res) {
				$resultContent .= "Child Ticket for " . $eventName . " purchased!<br/>";
			}
		}
		
		for ($i = 0; $i < $seniors; $i+=1) {
			$query = "INSERT INTO `ticket` (`surname`, `forename`, `email`, `address`, `city`, `province`, `postal`, `card`, `date`, `event`, `type`, `physical`) VALUES ('$surname', '$forename', '$email', '$address', '$city', '$province', '$postal', '$card', '$eventDate', '$eventName', 'Senior', '$physcial');;";
			$res = mysqli_query($conn, $query);
			if ($res) {
				$resultContent .= "Senior Ticket for " . $eventName . " purchased!<br/>";
			}
		}
		
		$resultContent .= "Return to the <a href='index.php'>home page</a></p>";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Winnipeg Railway Museum</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
          <a class="navbar-brand" href="index.php"><img src="img/newlogo.png" id="navlogo" onmouseout="retractLogo();" onmouseover="expandLogo()" style="height: calc(100% + 24px); margin: -12px" class="navlogo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li class="active"><a href="tickets.php">Tickets<span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Location</a></li>
                <li><a href="#">Hours & Admission</a></li>
                <li><a href="#">Locomotives</a></li>
                <li><a href="#">Rolling Stock</a></li>
                <li><a href="#">Maintenance of Way</a></li>
                <li><a href="#">Other Equipment</a></li>
                <li><a href="#">Displays</a></li>
                <li><a href="#">Gift Shop</a></li>
                <li><a href="admin">Admin Panel</a></li>
              </ul>
            </li>
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
	
    <div class="container">
	<?=$resultContent?>
	</div>
  </body>
</html>