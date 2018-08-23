<?php
    $conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASS'), "zharry");
	if (!$conn) {
		die("Error establishing database connection!");
	}
	
	// Backend Definitions    
	$people = array(
        "Jacky" => '<a class="collab-link" href="https://jackyliao.me" target="_blank">Jacky Liao</a>',
        "Henry" => '<a class="collab-link" href="https://guhenry3.tk" target="_blank">Henry Gu</a>',
        "Ben" => '<a class="collab-link" href="https://bcheng.cf" target="_blank">Benjamin Cheng</a>',
        "Jim" => '<a class="collab-link" href="https://jimgao.tk" target="_blank">Jim Gao</a>',
        "Aaron" => 'Aaron Du',
        "Jaden" => '<a class="collab-link" href="https://jadenyjw.ml/" target="_blank">Jaden Wang</a>',
        "Andy" => 'Andy Huang',
        "Eric" => 'Eric Li',
        "Roger" => '<a class="collab-link" href="https://kiritofeng.tk" target="_blank">Roger Fu',
        "Sunny" => 'Sunny Lan',
        "Avery" => 'Avery Shum'
    );
    $linksImgs = array(
        "GitHub" => "img/social/GitHub.svg",
        "DevPost" => "img/social/DevPost.svg",
        "SpaceApps" => "img/social/SpaceApps.svg"
    );
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Harry Zhang</title>
	
	<!-- CSS -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,700' rel='stylesheet' type='text/css'>
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
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#e9f0f5">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#e9f0f5">
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
					<h2 class="section-title">
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
		<h2 class="section-title">
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
			<!--a href="projects">See All Projects</a-->
		</div>
	</div>
	
	<div id="social">
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
</body>
</html>