<?php
/* The Hunton Collection Landing Page
For: The Hunton Collection Website
*/
	require_once("connection.php");	
?>
<!doctype html>
<html>
	<head>
		<title>The Hunton Collection</title>
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
			<h1 style="text-align: center; width: 100%;">Latest Movies</h1>
		</div>
		
		<div class="row">
			<?php
			$queryTop3 = "SELECT * FROM `film` ORDER BY `id` DESC,`title` DESC";
			$resTop3 = mysqli_query($conn, $queryTop3);
			$counter = 0;
			while($row = mysqli_fetch_assoc($resTop3)) {
				if ($counter > 2) {
					break;
				}
				echo '
				<div class="col-lg-4">
					<div class="movieCard">
						<div class="movieMedia">
							<img class="media" src=' . htmlentities($row["media"]) . '></img>
						</div>
						<div class="movieContent">
							<div class="movieTitle">
								' . htmlentities($row["title"]) . '
							</div>
							<div class="movieBuy">
								<button type="button" class="btn btn-success" style="width: 200px;">Buy</button>
							</div>
						</div>
					</div>
				</div>
				';
				$counter++;
			}
			?>
		</div>
		<hr style="background-color: black;"/>
		<div class="row">
			<h1 style="text-align: center; width: 100%;">Search</h1>
		</div>
		<div class="row">
			<div class="col-lg-3">
			</div>
			<div class="col-lg-6">
				<span class="form-inline">
					<input class="form-control mr-sm-2" type="text" id="searchfield" placeholder="Movie Title">
					<button class="btn btn-outline-info my-2 my-sm-0" type="submit" id="searchbutton" onclick="searchMovie();">Go</button>
				</span>
			</div>
			<div class="col-lg-3">
			</div>
		</div>
		<div id="searchedMovies">
		</div>
	</div>
	<script src="src/script.js"></script>
	<script src="src/bootstrap.min.js"></script>
	<script src="src/jquery-3.3.1.js"></script>
	</body>
</html>