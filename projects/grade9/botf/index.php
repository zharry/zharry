<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="script.js"></script>
		<link rel="stylesheet" href="style.css">
		<title>BotF | Harry Zhang</title>
		<meta charset="UTF-8">
		<meta name="description" content="Blog of the Files">
		<meta name="keywords" content="BotF, LotF, Blog of the Files">
		<meta name="author" content="Harry Zhang">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style id="styles">
		.content {
		}
		</style>
		<script>
		var width = window.innerWidth; 
			if (width <= 1024) {
				document.getElementById("styles").innerHTML = ".content { margin: 15px; }";
			} else {
				document.getElementById("styles").innerHTML = ".content { margin-top: 15px; margin-bottom: 15px; margin-left: 100px; margin-right: 100px; }";
		}
		init();
		</script>
	</head>

	<body>
		<div id="title" style="font-size: 25px" onmouseover="hideMenu()"><center>Blog of the Files - Home</center></div></div>
		<div id="menu" onmouseover="showMenu()">
			<div class="menuIcon" onclick="window.location.href = 'index.php';">
				<img src="Home.png" height="32px" width="32px"></img>
			</div>
			<div class="menuIcon" onclick="window.location.href = 'posts.php';">
				<img src="Posts.png" height="32px" width="32px"></img>
			</div>
			<div class="menuIcon" onclick="window.location.href = 'about.php';">
				<img src="Media.png" height="32px" width="32px"></img>
			</div>
		</div>
		<div id="menuText">
			<div style="height: 8px;"> &nbsp </div>
			<div class="menuTextClass" onclick="window.location.href = 'index.php';">
				Home
			</div>
			<div class="menuTextClass" onclick="window.location.href = 'posts.php';">
				Posts
			</div>
			<div class="menuTextClass" onclick="window.location.href = 'about.php';">
				Outline
			</div>			
		</div>
		<div id="page" onmouseover="hideMenu()" style='background-image: url(index.jpg);background-repeat:no-repeat;background-size: cover;'>
			<div class="content" id="static" style="position: relative; top: 50vh;">
				<center><h2>Welcome to my Blog on Lord of the Flies<br><small>By Harry</small></h2>
				To begin move your cursor or tap the navigation sidebar on the right.<!--br/>
				You will find my entries in the <form action="posts.php" style="display: inline"><input type="submit" value="Posts Section"></form><br/>
				and my outline and event changes in the <form action="about.php" style="display: inline"><input type="submit" value="About Section"></form><br/></center-->
			<br/><br/></div>
		</div>
		<script>
			var width = window.innerWidth; 
			var height = window.innerHeight; 
			var elemheight = document.getElementById("static").scrollHeight;
			if (width <= 1024) {
				document.getElementById("styles").innerHTML = ".content { margin: 15px; }";
			} else {
				document.getElementById("styles").innerHTML = ".content { margin-top: 15px; margin-bottom: 15px; margin-left: 100px; margin-right: 100px; }";
			}
			if (elemheight >= height) {
				document.getElementById("static").setAttribute("style", "");
			} else {
				document.getElementById("static").setAttribute("style", "position: relative; top: calc(50% - " + elemheight / 2 + "px - 15px);");
			}
		</script>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<div id="preloadImages" style="position: fixed; top: 1000000px; left: 1000000px;">
			<img class="image" src="4.jpg"></img>
			<img class="image" src="3.jpg"></img>
			<img class="image" src="2.jpeg"></img>
			<img class="image" src="1.jpg"></img>
		</div>
	</body>
</html>