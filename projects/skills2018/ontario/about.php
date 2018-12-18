<?php
/* About and History Page
For: The Hunton Collection Website
*/
	require_once("connection.php");	
?>
<!doctype html>
<html>
	<head>
		<title>About</title>
		<link rel="stylesheet" href="src/style.css">
		<link rel="stylesheet" href="src/bootstrap.min.css">
	</head>
	
	<body onload="onLoad(); searchMovie(true);">
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
	<div class="container" id="body" style="font-size: 18px;">
		<br/>
		<div class="row">
			<h1 style="text-align: center; width: 100%;">About Us</h1>
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				Proin dapibus ex eget ipsum venenatis ullamcorper. Pellentesque pharetra ipsum sed dui laoreet pretium. 
				Donec dignissim ullamcorper metus nec cursus. Vestibulum non molestie purus, id dapibus eros. 
				Aenean lacinia magna quis nulla interdum mollis. Morbi vitae nulla vel ante ultrices vehicula sit amet rutrum leo. 
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet convallis lacinia. 
				Pellentesque cursus a lectus et consequat. 
				Nulla pulvinar, turpis a vulputate volutpat, sapien urna porttitor lorem, vitae molestie magna elit at sem. 
				Suspendisse malesuada, nisi nec laoreet laoreet, felis enim aliquam sem, ac eleifend arcu augue nec dui. 
				Nunc sed fermentum odio, id pellentesque sem. 
				Morbi dignissim odio ligula, sit amet dictum enim dictum vitae.
				Quisque accumsan et dolor ac dictum. Duis molestie lacinia dui, at ullamcorper ligula mattis ac. 
			</div>
			<div class="col-sm-1"></div>
		</div>
		<br/>
		<hr/>
		<div class="row">
			<h1 style="text-align: center; width: 100%;">History</h1>
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<table style="width:100%;" id="history">
					<tr>
						<td class="historyDate">2018</td>
						<td>
							<div class="historyTitle">Digital Website Launched</div>
							<div class="historyDesc">Ut sed sapien ut leo ornare porttitor. Nulla porta mollis neque at ultricies. Aliquam vehicula consequat libero sit amet tincidunt. Quisque pharetra turpis id dui volutpat, sit amet ultricies erat laoreet. Pellentesque scelerisque varius faucibus. Sed semper justo mi, eget varius ante sollicitudin id. Sed pharetra libero est, tempus efficitur velit commodo quis. Cras molestie nulla risus, non condimentum ante egestas quis. Donec hendrerit non tortor ut condimentum. Quisque sagittis diam quis enim venenatis, at pharetra tellus aliquam. Nam sodales blandit nisl a vulputate. Vivamus eu massa et nunc tristique mollis. Phasellus aliquet urna dui, et condimentum metus condimentum non.</div>
							<hr/>
						</td>
					</tr>
					<tr>
						<td class="historyDate">2006</td>
						<td>
							<div class="historyTitle">Twenty Year Anniversary</div>
							<div class="historyDesc">Nulla sodales magna metus, in elementum lorem fermentum at. Aliquam faucibus molestie erat a fermentum. Suspendisse interdum posuere justo, in consectetur massa consequat quis. Integer cursus elit eget sodales facilisis. Cras molestie orci vehicula turpis aliquet gravida. Integer metus lorem, facilisis vitae pharetra non, tempus a ante. Nam vel ipsum sit amet lacus ornare ultrices. Donec ornare enim felis, id mattis quam pretium et. Sed in dui tincidunt, rutrum diam a, venenatis sapien.</div>
							<hr/>
						</td>
					</tr>
					<tr>
						<td class="historyDate">1996</td>
						<td>
							<div class="historyTitle">100,000 Thousand Customers</div>
							<div class="historyDesc">Ut feugiat elit in aliquam pellentesque. Sed bibendum nisi eros, at sollicitudin enim condimentum eu. Maecenas sit amet magna ac est luctus blandit eu sed nulla. Sed in rhoncus est, sed pharetra nibh. Aenean dapibus auctor sem eget volutpat. Proin quis risus sit amet turpis laoreet lobortis. Pellentesque fringilla magna nec orci lobortis finibus.</div>
							<hr/>
						</td>
					</tr>
					<tr>
						<td class="historyDate">1992</td>
						<td>
							<div class="historyTitle">1 Million Movies Milestone</div>
							<div class="historyDesc">Vestibulum congue et purus non aliquam. In vel libero interdum, blandit ante non, vulputate purus. Pellentesque a laoreet lacus. Integer fringilla metus pretium, tincidunt nisl eu, ultricies lectus. Integer velit justo, iaculis a ornare at, aliquet non tellus. Vestibulum vulputate elit ut nisl congue, vitae consectetur sem volutpat. Aliquam eget dignissim metus. Cras tincidunt iaculis malesuada. Aenean elementum magna dui, eget molestie felis convallis at. Vivamus lacinia ipsum lorem. Praesent vitae euismod eros. Donec vestibulum nisi mi, sed fringilla sem finibus a. Aenean scelerisque nunc a porta tincidunt.</div>
							<hr/>
						</td>
					</tr>
					<tr>
						<td class="historyDate">1986</td>
						<td>
							<div class="historyTitle">Grand Opening of The Hunton Collection</div>
							<div class="historyDesc">Nulla condimentum imperdiet rutrum. Vivamus eget elit elementum, porta neque id, porttitor diam. Fusce ut sapien vel leo malesuada faucibus ut nec nisi. Suspendisse quis eros neque. Sed ac maximus velit. Cras vestibulum vel massa nec elementum. Vivamus eget dolor nec nisl tempor pretium.</div>
							<hr/>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-1"></div>
		</div>
		<br/>
		<br/>
	</div>
	<script src="src/script.js"></script>
	<script src="src/bootstrap.min.js"></script>
	<script src="src/jquery-3.3.1.js"></script>
	</body>
</html>