<?php

	$conn = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER_DEMO'), getenv('MYSQL_PASS_DEMO'), "skills_canada-2018");
	if (!$conn) { 
		die("Failed to connect to database!");
	}
	
	if (isset($_POST["score"])) {
		$score = mysqli_real_escape_string($conn, $_POST["score"]);
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$query = "INSERT INTO `snake_highscores` (`name`, `score`) VALUES ('{$name}', '{$score}');";
		mysqli_query($conn, $query);
		unset($_POST);
	}	
?>

<!doctype html>
<html>
	<head>
		<title>Snake</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body onload="onLoad();">
		<div style="display: none;">
			<?php
				$width = "";
				$height = "";
				$query = "SELECT * FROM `snake_size`";
				$res = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_assoc($res)) {
					$width = $row["width"];
					$height = $row["height"];
				}
			?>
			<div id="gameWidth"><?=$width?></div>
			<div id="gameHeight"><?=$height?></div>
			
			<?php
				$query = "SELECT * FROM `snake_walls`";
				$res = mysqli_query($conn, $query);
				$walls = array();
				while ($row = mysqli_fetch_assoc($res)) {
					$walls[] = array($row["x"], $row["y"]);
				}
			?>
			<div id="walls"><?php echo json_encode($walls); ?></div>
		</div>
		<div id="body">
			<canvas id="canvas">
				<div id="nocanvas">
					Sorry, your browser does not support the canvas element!
				</div>
			</canvas>
			<div id="highscores">
				<h1 style="padding: 12px;">Highscores: </h1>
				<button onclick="showScreen(0)" style="width: 175px; margin-bottom: 12px;">Return to Game</button><hr style="margin-bottom: 12px;">
				<?php
					$query = "SELECT * FROM `snake_highscores` ORDER BY `snake_highscores`.`score` DESC";
					$res = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($res)) {
						echo htmlentities($row["name"]) . "-" . htmlentities($row["score"]) . "<br/>";
					}
				?>
			</div>
			<div id="submit" style="overflow: hidden;">
				<h1 style="padding: 12px;">Submit Highscore: </h1><hr/>
				<br/>
				<p>Your Score: <span id="yourScore">0</span></p>
				<form method="post" action="index.php">
					<input type="hidden" name="score" value="0" id="score"></input>
					<input type="text" name="name" placeholder="XYZ" required="required" maxlength="3" minlength="2" style="padding-left: 5px; padding-right: 5px;"></input>
					<input type="submit" value="Submit Highscore"></input>
				</form>
		</div>
		<script src="script.js"></script>
	</body>
</html>