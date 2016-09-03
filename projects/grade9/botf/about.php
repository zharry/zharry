<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="script.js"></script>
		<link rel="stylesheet" href="style.css">
		<title>BotF | Harry Zhang</title>
		<meta charset="UTF-8">
		<meta name="description" content="Blog of the Flies">
		<meta name="keywords" content="BotF, LotF, Blog of the Flies">
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
		<div id="title" style="font-size: 25px" onmouseover="hideMenu()"><center>Blog of the Flies - Outline</center></div></div>
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
				<h2>Outline <small>- Harry</small></h2>
				<p>I will be writing in the perspective from Ralph, and I’ll be doing the following events;
				election of Ralph as leader, Ralph's loss of power,
				the boy’s arrival on the island following the plane crash and 
				a ship failing to notice them because no one was maintaining the fire.
				One main reason is that I want to feel that sense of power, strength and adventure that I cannot experience,
				but Ralph does as the story proceeds. </p>
				<p>Arriving on an island following a plane crash is something I would never be able to experience in real life,
				so I want to write a journal entry on that to see how it feels. During the election of him as the leader, 
				I envied his ability to get the attention of all the people on the island and that part of the book was a turning point and 
				I felt that if that was me, I wouldn’t have had that power, but would love to experience that. In the story when they missed the boat,
				I knew something was wrong and I was very angry in real-life just as Ralph was in the story,
				so I want to express that anger during my journal entries. Lastly I want to write about Ralph’s loss of power
				because everyone slowly stopped following rules and once everyone goes off with Jack to hunt the beast he feels failed,
				an emotion I too can empathize, when someone rejects my ideas of civilization or order.</p><hr/>
				<h2>Changes to the Events <small>- Harry</small></h2>
				<p>In my original outline I wanted to do <i>The boy's descent into savagery and chaos</i> instead of <i>Ralph’s loss of power</i>. But I 
				realized that what I was trying to write about, the emotion that I can empathize with Ralph, would be better expressed if
				I did an entry on a part where he lost power and feels failed.</p>
			</div>
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
	</body>
</html>