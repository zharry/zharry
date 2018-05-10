<?php
/* Contact Form and Page
For: The Hunton Collection Website
*/
	require_once("connection.php");	
	
	$post = false;
	// Validate Contact Form
	if (isset($_POST["Forename"]) || isset($_POST["Surname"]) || isset($_POST["Email"]) || isset($_POST["Subject"]) || isset($_POST["Message"])) {
		$post = true;
		$errorMsg = array();
		// Form was submitted
		if(trim($_POST["Forename"]) == "") {
			$errorMsg[] = "Forename cannot be empty!";
		}
		if(trim($_POST["Surname"]) == "") {
			$errorMsg[] = "Surname cannot be empty!";
		}
		if(trim($_POST["Email"]) == "") {
			$errorMsg[] = "Email cannot be empty!";
		}
		if(trim($_POST["Subject"]) == "") {
			$errorMsg[] = "Subject cannot be empty!";
		}
		if(trim($_POST["Message"]) == "") {
			$errorMsg[] = "Message cannot be empty!";
		}
		$splitEmail = explode("@", $_POST["Email"]);
		if (sizeof($splitEmail) == 2) {
			$splitDomain = explode(".", $splitEmail[1], 2);
			if (sizeof($splitDomain) != 2) {
				$errorMsg[] = "Email Domain must contain a period(.)";
			}
			if ($splitDomain[0] == "" || $splitDomain[1] == "") {
				$errorMsg[] = "Email Domain cannot be empty!";
			}
		} else {
			$errorMsg[] = "Email must be in the form of ADDRESS@DOMAIN.COM";
		}
		if($splitEmail[0] == "") {
			$errorMsg[] = "Email Address (before the @ symbol) cannot be empty!";
		}
		
	}
?>
<!doctype html>
<html>
	<head>
		<title>Contact</title>
		<link rel="stylesheet" href="src/style.css">
		<link rel="stylesheet" href="src/bootstrap.min.css">
	</head>
	
	<body onload="onLoad();">
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
			<div class="col-sm-12" style="text-align: center;">
				<h1>Contact Us</h1>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-sm-6">
				<br/>
				Etiam porttitor scelerisque feugiat. 
				Donec porta, sem vitae mattis fermentum, nibh nulla dictum ligula, nec venenatis lacus nulla vitae massa. 
				Morbi lacus turpis, semper a diam ut, mattis elementum turpis. Ut at arcu est. 
				Fusce dignissim imperdiet magna, et cursus sem luctus sit amet. 
				Suspendisse convallis est ornare, ultricies nibh vel, efficitur ipsum. Ut at arcu est. 
				Fusce dignissim imperdiet magna, et cursus sem luctus sit amet. 
				Suspendisse convallis est ornare, ultricies nibh vel, efficitur ipsum. 
			</div>
			<div class="col-sm-6">
				<br/>
				<div class="contactTitle">
					<h5>Phone Number</h5>
				</div>
				<div class="contactInfo">
					<h6>(123) 456-7890</h6>
				</div>
				<div class="contactTitle">
					<h5>Address</h5>
				</div>
				<div class="contactInfo">
					<h6>2018 Hunton Road, Toronto, Ontario</h6>
					<h6>A1B 2C3</h6>
				</div>
			</div>
		</div>
		<br/>
		<hr/>
		<div class="row">
		<?php
			// Check if there are any error messages
			if (isset($errorMsg) && sizeof($errorMsg) > 0) {
				// Output them if there are
				?>
					<div class="alert alert-warning" role="alert" style="width: 100%; padding-right: 32px;">
						<h4><strong>Error!</strong> The following issues need to be fixed: </h4>
						<ul>
				<?php
				for ($i = 0; $i < sizeof($errorMsg); $i++) {
					?>
						<li style="margin-left: 28px;"><?=$errorMsg[$i]?></li>
					<?php
				}
				?>
						</ul>
				</div>
				<?php
			} else {
				// If not, but the message was successfully valiated, output success
				if ($post) {
					echo "<script>alert('Message Sent!');</script>";
				}
			}
		?>
		<div class="col-sm-12">
			<form id="contact" method="post" action="contact.php">
				<div class="form-group">
					<label for="Forename">Forename</label>
					<input type="text" class="form-control" id="Forename" name="Forename" placeholder="Forename">
				</div>
				<div class="form-group">
					<label for="Surname">Surname</label>
					<input type="text" class="form-control" id="Surname" name="Surname" placeholder="Surname">
				</div>
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="text" class="form-control" id="Email" name="Email" placeholder="Email@Domain.com">
				</div>
				<div class="form-group">
					<label for="Subject">Subject</label>
					<input type="text" class="form-control" id="Subject" name="Subject" placeholder="Subject">
				</div>
				<div class="form-group">
					<label for="Message">Message</label>
					<textarea type="text" form="contact" class="form-control" id="Message" name="Message" placeholder="Message"></textarea>
				</div>
				<button type="submit" class="btn btn-info mb-2">Submit</button>
			</form>
		</div>
		</div>
	</div>
	<script src="src/script.js"></script>
	<script src="src/bootstrap.min.js"></script>
	<script src="src/jquery-3.3.1.js"></script>
	</body>
</html>