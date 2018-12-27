function renderTutorial() {
	if (gameState.instructions.slide <= 0 && gameState.instructions.clickLeft) {
		showPanel("menu");
		gameState.instructions.clickLeft = false;
		gameState.instructions.clickRight = false;
		return;
	} else if (gameState.instructions.slide >= 11 && gameState.instructions.clickRight) {
		gameState.started = true;
	} else {
		if (gameState.instructions.clickLeft)
			gameState.instructions.slide--;
		if (gameState.instructions.clickRight)
			gameState.instructions.slide++;
		
		// Render UI Elements
		game.fillStyle = "black";
		game.fillRect(0, 0, 960, 600);
		for (var i = 0; i < allObjects.length; ++i)
			if (allObjects[i].type == TYPE.UI)
				if (!(gameState.instructions.slide >=6 && gameState.instructions.slide <= 8))
				allObjects[i].render();
		let allUI = ["fuel", "time", "size", "volume", "pause", "score"];
		
		// Render Back/Forward Buttons
		game.drawImage(assets.ui.left, 0, 268);
		game.drawImage(assets.ui.right, 896, 268);
			
		// Render Tutorial Elements
		game.font = (32 * gameState.fontSize) + 'px VesperLibre';
		game.textAlign = "center";
		if (gameState.instructions.slide == 0) {
			hide(allUI);
			player.render();
			game.fillText("This is your spaceship, ", 480, 250);
			game.fillText("Use WASD/Arrow Keys to move it!", 480, 365);
		} else if (gameState.instructions.slide == 1) {
			hide(["fuel", "size", "volume", "pause", "score"]);
			game.fillText("The timer shows how much time has elapsed.", 480, 120);
		} else if (gameState.instructions.slide == 2) {
			hide(["time", "size", "volume", "pause", "score"]);
			game.fillText("The fuel counter shows the remaining fuel.", 480, 250);
			game.fillText("(30 seconds in total)", 480, 300);
		} else if (gameState.instructions.slide == 3) {
			hide(allUI);
			new Enemy(420, 270, 0).render();
			new Asteroid(540, 260, 2).render();
			game.fillText("During your flight, you need to destory", 480, 250);
			game.fillText("the enemy spaceships and asteroids that fly towards you.", 480, 360);
		} else if (gameState.instructions.slide == 4) {
			hide(allUI);
			player.rotation = 90;
			player.render();
			new Bullet(600, 360, 90).render();
			new Bullet(710, 410, 90).render();
			game.fillText("Shoot by pressing the space bar", 480, 250);
		} else if (gameState.instructions.slide == 5) {
			hide(["time", "size", "volume", "pause", "score"]);
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.UI)
					allObjects[i].percentage = 0.5;
			player.rotation = 30;
			player.render();
			new Asteroid(400, 260, 2).render();
			game.fillText("Don't hit asteroids or other spaceships, ", 480, 250);
			game.fillText("you will lose 15 seconds of flight time from your fuel!", 480, 365);
		} else if (gameState.instructions.slide == 6) {
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.UI) {
					gameState.score = "+5";
					allObjects[i].render();
					gameState.score = 0;
				}
			hide(["fuel", "time", "size", "volume", "pause"]);
			game.font = (32 * gameState.fontSize) + 'px VesperLibre';
			game.textAlign = "center";
			player.rotation = 40;
			player.render();
			new Bullet(560, 370, 40).render();
			new Enemy(550, 360, 0).render();
			game.fillText("Using one shot, 5 points are award for each enemy killed.", 480, 250);
		} else if (gameState.instructions.slide == 7) {
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.UI) {
					gameState.score = "+10";
					allObjects[i].render();
					gameState.score = 0;
				}
			hide(["fuel", "time", "size", "volume", "pause"]);
			game.font = (32 * gameState.fontSize) + 'px VesperLibre';
			game.textAlign = "center";
			player.rotation = 40;
			player.render();
			new Bullet(560, 370, 40).render();
			new Bullet(510, 330, 40).render();
			new Asteroid(560, 370, 0).render();
			game.fillText("Two shots are required to destory asteroids worth 10 points.", 480, 250);
		} else if (gameState.instructions.slide == 8) {
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.UI) {
					gameState.score = "-10";
					allObjects[i].render();
					gameState.score = 0;
				}
			hide(["fuel", "time", "size", "volume", "pause"]);
			game.font = (32 * gameState.fontSize) + 'px VesperLibre';
			game.textAlign = "center";
			player.rotation = 40;
			player.render();
			new Bullet(560, 370, 40).render();
			new Ally(560, 370, 0).render();
			game.fillText("Killing allied spaceships will cost you 10 points.", 480, 250);
		} else if (gameState.instructions.slide == 9) {
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.UI)
					allObjects[i].percentage = 0.5;
			hide(["time", "size", "volume", "pause", "score"]);
			player.rotation = 60;
			player.render();
			var f = new Fuel(440, 0);
			f.y = 350;
			f.render();
			game.fillText("Collect fuel during flight to gain an extra 15 seconds.", 480, 250);
		} else if (gameState.instructions.slide == 10) {
			hide(["fuel", "time", "size", "volume", "score"]);
			game.fillText("You can pause the game by clicking the pause button.", 480, 250);
			game.fillText("(Or by pressing the letter 'P')", 480, 300);
		} else if (gameState.instructions.slide == 11) {
			hide([]);
			game.fillText("Go beyond all limits...", 480, 250);
			game.fillText("Let's start the battle in the Star Battle Championships!", 480, 300);
		}
	}
	gameState.instructions.clickLeft = false;
	gameState.instructions.clickRight = false;
}

function hide(elems) {
	game.fillStyle = "black";
	for (var i = 0; i < elems.length; i++) {
		if (elems[i] == "fuel")
			game.fillRect(0, 0, 400, 120);
		else if (elems[i] == "time")
			game.fillRect(400, 0, 100, 120);
		else if (elems[i] == "size")
			game.fillRect(500, 0, 380, 120);
		else if (elems[i] == "volume")
			game.fillRect(880, 0, 32, 120);
		else if (elems[i] == "pause")
			game.fillRect(880 + 32, 0, 100, 120);
		else if (elems[i] == "score")
			game.fillRect(0, 500, 960, 40);
	}
	game.fillStyle = "white";
}