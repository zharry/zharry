<?php
	$conn = mysqli_connect("localhost", "root", "", "zharry");
	if (!$conn) {
		die("Error establishing database connection!");
	}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<!-- CSS reset -->
	<link rel="stylesheet" href="css/reset.css">
	<!-- Vertical Timeline -->
	<link rel="stylesheet" href="css/verticalTimeline.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<title>Harry Zhang</title>
</head>
<body>
	<div id="header">
		<div id="header-container">
			<h1 id="header-name">
				Harry Zhang
			</h1>
			<h3 id="header-desc" class="typewrite" data-period="2000" data-type='[ "Computer Engineer", "Web Developer", "Programmer", "Server Administrator", "Computer Technician", "Game Designer" ]'>
				<span class="wrap">Computer Engineer</span>
			</h3>
		</div>
	</div>

	<div id="about">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col col-xl-2 blank-col">
				</div>
				<div class="col-md-auto">
					<h2 id="about-title">
						About Me
					</h2>
					<table>
						<?php
							$query = "SELECT * FROM `about` ORDER BY `id` ASC";
							$res = mysqli_query($conn, $query);
							if (mysqli_num_rows($res) > 0) {
								while($row = mysqli_fetch_assoc($res)) { ?>
										<tr>
											<td class="center"><i class="dark fas <?php echo $row["icon"]; ?> about-icon"></i></td>
											<td><?php echo $row["description"]; ?></td>
										 </tr>
								<?php }
							}
						?>
					</table>
					<div id="about-projects">
						<a data-easing="easeInQuad" id="projects-button" href="#projects">
							<i class="grey fas fa-angle-down"></i>
						</a>
					</div>
				</div>
				<div class="col col-xl-2 blank-col">
				</div>
			</div>
		</div>
	</div>
	
	<div id="projects" class="cd-timeline js-cd-timeline">
		<h2 id="projects-title">
			Things I've Done
		</h2>
		<div class="cd-timeline__container">
			<?php
				$query = "SELECT * FROM `projects` ORDER BY `date` DESC";
				$res = mysqli_query($conn, $query);
				if (mysqli_num_rows($res) > 0) {
					while($row = mysqli_fetch_assoc($res)) { 
						$date = date("M Y", strtotime($row["date"]));
						?>
						<div class="cd-timeline__block js-cd-block">
							<div class="cd-timeline__img js-cd-img">
								<img src="img/icons/<?php echo $row["icon"]; ?>" alt="<?php echo $row["name"]; ?>">
							</div>

							<div class="cd-timeline__content js-cd-content">
								<h2>
									<?php echo $row["name"]; ?>
									<span class="project-result grey">
										<?php if ( !empty($row["result"])) { echo '<i class="fas fa-trophy project-icon"></i>' . $row["result"]; } ?>
									</span>
								</h2>
								<p class="project-location">
									<?php if ( !empty($row["location"])) { echo '<i class="fas fa-map-marker-alt project-icon"></i>' . $row["location"]; } ?>
								</p>
								<p class="project-summary">
									<?php echo $row["summary"]; ?>
								</p>
								<!--a class="cd-timeline__read-more">Read more</a-->
								<span class="cd-timeline__date"><?php echo $date; ?></span>
							</div>
						</div>
					<?php }
				}
			?>
		</div>
		<div id="projects-viewall">
			<a href="projects">See All Projects</a>
		</div>
	</div>
	
	<div id="social">
	</div>

	<!-- Vertical Timeline JavaScript -->
	<script src="js/verticalTimeline.js"></script>
	<!-- Typewriter -->
	<script src="js/typewriter.js"></script>
	<!-- Smooth Scrolling -->
	<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14.0/dist/smooth-scroll.polyfills.min.js"></script>
	<!-- Bootstrap and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<!-- Custom Scripts -->
	<script src="js/script.js"></script> 
</body>
</html>