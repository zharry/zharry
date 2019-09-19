<?php
	if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')))
		$conn = mysqli_connect("localhost", "root", "", "zharry");
	else	
		$conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASS'), "zharry");
	if (!$conn) {
		die("Error establishing database connection!");
	}
	
	// Get Collaborators Names
	$people = array();
	$query = "SELECT * FROM `collab`";
	$res = mysqli_query($conn, $query);
	if (mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_assoc($res)) {
			if (empty($row["url"]))
				$people[$row["name"]] = $row["full_name"];
			else
				$people[$row["name"]] = '<a class="collab-link" href="' . $row["url"] . '" target="_blank">' . $row["full_name"] . '</a>';
		}
	}
	
	// Get Social Icons
	$linksImgs = array();
	$query = "SELECT * FROM `social`";
	$res = mysqli_query($conn, $query);
	if (mysqli_num_rows($res) > 0)
		while($row = mysqli_fetch_assoc($res))
				$linksImgs[$row["name"]] = $row["link"];

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Harry Zhang</title>
	
	<!-- CSS -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- CSS reset -->
	<link rel="stylesheet" href="css/reset.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<!-- Vertical Timeline -->
	<link rel="stylesheet" href="css/verticalTimeline.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="manifest.json">
	<meta name="msapplication-TileColor" content="#e9f0f5">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#e9f0f5">
</head>
<body onload="onload();">
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
	<div id="about" class="body-section">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-2 blank-col">
				</div>
				<div class="col-lg-3">
					<h2 id="about-title" class="section-title">
						About <br id="about-break"/>Me
					</h2>
				</div>
				<div class="col-lg-6">
					<p>I am a first year undergraduate student at the University of Waterloo, 
					for computer engineering. With over seven years of programming experience, 
					I'm a self-taught full stack developer, server administrator and 
					game developer. </p>
					<p>I'm currently a Team Canada prospect for Web Design and Development at the upcoming 
					<a class="external-link" href="https://www.skillscompetencescanada.com/en/worldskills/worldskills-kazan-2019/" target="_blank">WorldSkills competition</a>
					in Kazan, Russia. I was a two-time winner at Canada's largest hackathon, 
					<a class="external-link" href="https://hackthenorth.com/" target="_blank">Hack the North</a> in 2018 and 2016, and also won at Canada's largest high school hackathon, 
					<a class="external-link" href="https://masseyhacks3.devpost.com/" target="_blank">MasseyHacks III</a> in 2017. </p>
				</div>
				<div class="col-lg-1 blank-col">
				</div>
			</div>
		</div>
	</div>
	
	<div id="skills" class="body-section">
		<div class="container">
			<script>
			var skills = {
				<?php
				$query = "SELECT * FROM `skills`;";
				$res = mysqli_query($conn, $query);
				$currentYear = 2000;
				if (mysqli_num_rows($res) > 0) {
					while($row = mysqli_fetch_assoc($res)) {
						echo $row["year"] . ": {";
						foreach ($row as $v => $val) {
							echo "'" . (!strpos($v, " ") ? $v : substr($v, 0 , strpos($v, " "))) .  "': '" . $val .  "',";
						}
						echo "},";
						$currentYear = $row["year"];
					}
				}
				?>
			};
			var currentYear = <?=$currentYear ?>;
			var selectedYear = <?=$currentYear ?>;
			</script>
			<div class="row">
				<div class="col-lg-1 blank-col">
				</div>
				<div class="col-lg-3">
					<h2 id="skills-year">
						<i onclick="showYear(--selectedYear);" id="skill-left" class="clickable skill-move fas fa-chevron-left"></i>
						&nbsp; Skills in <span id="year-num">2019</span> &nbsp;
						<i onclick="showYear(++selectedYear);" id="skill-right" class="clickable skill-move fas fa-chevron-right"></i>
					</h2>
				</div>
				<div class="col-lg-7" style="margin-left: 32px; margin-right: 32px;">
					<div id="skill-display" style="display: none;">
						<?php
							$query = "SELECT * FROM `skills`;";
							$res = mysqli_query($conn, $query);
							$currentYear = 2000;
							if (mysqli_num_rows($res) > 0) {
								while($row = mysqli_fetch_assoc($res)) {
									foreach ($row as $v => $val) {
										if ($v == "id" || $v == "year") {
										} else {
											$v = (!strpos($v, " ") ? $v : substr($v, 0 , strpos($v, " ")));
											?>
											<div id="skill-<?=$v?>" class="skill-listing" style="width: 0%;">
												<div class="skill-block"></div>
												<div class="skill-text-connector"></div>
												<div class="skill-text"><?=$v?></div>
											</div>
										<?php		
										}
									}
									break;
								}
							}
							?>

					</div>
				</div>
				<div class="col-lg-1 blank-col">
				</div>
			</div>
		</div>
	</div>
	
	<div id="experience" class="body-section">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-12">
					<h2 id="experience-title" class="section-title">
						Experience
					</h2>
				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-lg-1 col-xl-2 blank-col">
				</div>
				<?php
					$query = "SELECT * FROM `experience` WHERE `enabled` = 1 LIMIT 2;";
					$res = mysqli_query($conn, $query);
					$doneOne = false;
					if (mysqli_num_rows($res) > 0) {
						while($row = mysqli_fetch_assoc($res)) { 
						?>
							<div class="col-md-6 col-lg-5 col-xl-4 <?php echo (!$doneOne ? "border-right" : "border-left"); $doneOne = true; ?> no-border-md experience-content">
								<div class="experience-section experience-position">
									<?=$row["position"] ?>
								</div>
								<div class="experience-section experience-date">
									<?=$row["date"] ?>
								</div>
								<div class="experience-section experience-tools">
									<?=$row["tools"] ?>
								</div>
								<div class="experience-section experience-desc">
									<?=$row["description"] ?>
								</div>
							</div>
						<?php }
					}
				?>
				<div class="col-lg-1 col-xl-2 blank-col">
				</div>
			</div>
		</div>
	</div>
	
	<div id="projects" class="cd-timeline js-cd-timeline body-section">
		<h2 id="projects-title" class="section-title">
			Projects
		</h2>
		<div class="cd-timeline__container">
			<?php
				$query = "SELECT * FROM `projects` WHERE `enabled` = 1 ORDER BY `date` DESC;";
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
								<a data-toggle="modal" data-target="#project-<?php echo $row["id"]; ?>" class="cd-timeline__read-more">Read more</a>
								<span class="cd-timeline__date"><?php echo $date; ?></span>
							</div>
							
							<div class="modal fade" id="project-<?php echo $row["id"]; ?>" tabindex="-1" role="dialog">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title section-title modal-title" id="exampleModalLabel"><?php echo $row["name"]; ?></h5>
											<button type="button" class="close" data-dismiss="modal">
												<span>&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="container">
												<div class="row">
													<div class="col-lg-6">
														<img class="gallery" src="img/gallery/<?php echo $row["gallery"]; ?>">
														<div class="visit-links">
															<?php
																$visit = json_decode($row["visit"], true);
																if (!empty($visit)) {
																	for ($i = 0; $i < sizeof($visit); $i++) {
															?>
																	<div><a href="<?php echo $visit[$i]["Link"]; ?>" target="_blank"><?php echo $visit[$i]["Desc"]; ?></a></div>
																
															<?php
																	}
																}
															?>
														</div>
														<div class="other-links">
															<?php
																$links = json_decode($row["links"], true);
																if (!empty($links)) {
																	for ($i = 0; $i < sizeof($links); $i++) {
																		echo '<a href="' . $links[$i]["Link"] . '" target="_blank">';
																		if ($links[$i]["Type"] == "Text") {
																			echo $links[$i]["Desc"] . "</a>";
																		} else {
																			echo '<img src="' . $linksImgs[$links[$i]["Type"]] . '" class="social-icon" title="' . $links[$i]["Desc"] . '"></a>';
																		}
																	}
																}
															?>
														</div>
													</div>
													<div class="col-lg-6">
														<hr class="modal-divider"/>
														<div class="description">
															<p><?php echo $row["description"]; ?></p>
														</div>
														<div class="desc-tech">
															<h3 class="desc-title">Made with:</h3>
															<?php echo $row["tech"]; ?>
														</div>
														<?php
															$collab = json_decode($row["collab"], true);
															if (!empty($collab)) {
																?>
																<div class="desc-collab">
																	<h3 class="desc-title">Collaborators:</h3>
																<?php
																	$out = "";
																	for ($i = 0; $i < sizeof($collab); $i++) {
																		echo $people[$collab[$i]];
																		if ($i < sizeof($collab) - 1) { echo ", "; }
																	}
																echo "</div>";
															}
															?>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<a class="cd-timeline__read-more" data-dismiss="modal">Close</a>
										</div>
									</div>
								</div>
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
	
	<div id="social" class="body-section">
		<div class="container">
			<h2 class="section-title">
				Get In Touch!
			</h2>
			<p>
				You can find me here...
			</p>
			<div id="social-icons">
				<a href="https://github.com/zharry" alt="GitHub" target="_blank"><i class="light fab fa-github"></i></a>
				<a href="https://www.facebook.com/zh.harry" alt="Facebook" target="_blank"><i class="light fab fa-facebook-square"></i></a>
				<a href="https://www.linkedin.com/in/zhharry/" alt="LinkedIn" target="_blank"><i class="light fab fa-linkedin"></i></a>
			</div>
			<p>Or by email at <a id="social-email" href="mailto:me@zharry.ca">me@zharry.ca</a></p>
		</div>
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
	<script>
		onload();
	</script>
</body>
</html>