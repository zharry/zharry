<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Harry's Website</title>
		<link href="src/style.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="icon" href="favicon.ico" />
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" id="topbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Harry Zhang</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row" id="intro">
				<h2>Welcome!</h2>
				Email: <a href="mailto:zh.harry@yahoo.ca" target="_top">zh.harry@yahoo.ca</a> | GitHub: <a target="_blank" href="https://github.com/zharry">zharry</a><br/><br/>
				<p>My name is Harry Zhang, and I am a 15 year high school students who goes to Don Mills CI in Toronto.</p>
				<p>I have a love for programming and tech by the limitless creativity that comes with it.</p>
				<p>Below is a feature of all of my past, ongoing and future projects, hope you enjoy!</p>
			</div>
			<hr/>
			<div class="row" id="featured">
				<h2>Featured</h2>
					<div class="col-md-2">
					</div>
					<div class="col-md-4" id="studyhub">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>StudyHub</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/studyhub/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Student run classroom management for posting homework and etc...
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="sh()">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="platformfantasy">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
									<img src="src/platformfantasy/icon.png">
								</div>
								<div class="cardHeadTitle">
									<h4>Platform Fantasy</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/platformfantasy/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Randomly Generating 2D Infinite Platformer RPG
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
										<img onclick="pf();" class="cardActionsLeftButtonActionButton" src="src/github.png" height="32px" width="32px" title="View on GitHub">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
					</div>
			</div>
			<hr/>
			<div class="row" id="web">
				<h2>Web Projects</h2>
					<div class="col-md-2">
					</div>
					<div class="col-md-4" id="metroweb">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
									<img src="src/metroweb/icon.png">
								</div>
								<div class="cardHeadTitle">
									<h4>MetroWeb</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/metroweb/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Metro design lanugage UI and Web app engine
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
										<img onclick="mwg();" class="cardActionsLeftButtonActionButton" src="src/github.png" height="32px" width="32px" title="View on GitHub">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="grade9study">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Grade9-Study</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/grade9study/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								What StudyHub started out as for two classes listed below.
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="gss();">SCIENCE</button>
										<button onclick="gsg();">GEOGRAPHY</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
					</div>
			</div>
			<hr/>
			<div class="row" id="grade9">
				<h2>Grade 9 School Projects</h2>
					<div class="col-md-4" id="tech">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Crane Presentation</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/techsummative/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 9 TEJ Summative assignment
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="ts();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="botf">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Blog of the Flies</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/botf/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 9 English Novel Sutdy assignment
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="botf();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="astronomy">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Evolution of a star</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/astroproj/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 9 Science astronomy culminating activity (Group)
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="ap();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<hr/>
			<div class="row" id="grade8">
				<h2>Grade 8 School Projects</h2>
					<div class="col-md-2">
					</div>
					<div class="col-md-4" id="bioproj">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Qi Jianxin Biography</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/bioproj/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 8 English Biography Project
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="bip();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="shoesproj">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Take a walk in my shoes</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/shoesproj/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 8 English Project
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="twms();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
					</div>
			</div>
			<hr/>
			<div class="row" id="grade7">
				<h2>Grade 7 School Projects</h2>
					<div class="col-md-4" id="nctech">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>NCTech</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/nctech/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 7 Ergonomics Unit
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="nct();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="tour2000">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Tour2000</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/tour2000/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 7 Geography Unit
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="t2k();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="geoproj">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>New Zealand vs Ethiopia</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/geoproj/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 7 Human Geography Unit
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
										<button onclick="gip();">VISIT SITE</button>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="row" id="grade7cont">
					<div class="col-md-4" id="seedofnationhood">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Seed of Nationhood</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/psonh/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 7 History summative assignment
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
										<img onclick="psonh();" class="cardActionsLeftButtonActionButton" src="src/github.png" height="32px" width="32px" title="View on GitHub">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="numbersence">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>Wheel of Number Sense</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/wons/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 7 Math summative assignment
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
										<img onclick="wons();" class="cardActionsLeftButtonActionButton" src="src/github.png" height="32px" width="32px" title="View on GitHub">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" id="lsd">
						<div class="card">
							<div class="cardHead">
								<div class="cardHeadIcon">
								</div>
								<div class="cardHeadTitle">
									<h4>LSD Presentation</h4>
								</div>
							</div>
							<div class="cardMedia">
								<img src="src/lsd/media.png" style="height: 100%; width: 100%">
							</div>
							<div class="cardText">
								Grade 7 Health culminating activity
							</div>
							<div class="cardActions">
								<div class="cardActionsLeft">
									<div class="cardActionsLeftButton">
										<img onclick="lsd();" class="cardActionsLeftButtonActionButton" src="src/github.png" height="32px" width="32px" title="View on GitHub">
									</div>
								</div>
								<div class="cardActionsRight">
									<div class="cardActionsRightButton">
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
		<script src="src/script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>
