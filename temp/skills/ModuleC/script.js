var initial_state = {
	 // STATIC
	tileSize: 24,
	width: 31, 
	height: 23,
	fps: 60,
	tps: 15,
	// NON-STATIC
	state: {
		currentMenu: 0, // 0-Launch,1-Pause,2-GameOver,3-Highscores,4-LostLife
		menuItem: 0,
		paused: true
	},
	data: {
		size: 3,
		score: 0,
		lives: 3,
		snake: [
			[15, 10],
			[15, 11],
			[15, 12]
		],
		food: {
			exists: false,
			location: [-1, -1]
		},
		direction: 0, // 0-Up,1-Down,2-Left,3-Right
		sizeUp: 0
	},
	input: {
		direction: [],
		pause: 0,
		selectMenu: false
	},
	ui: { // STATIC
		titleY: 100,
		menuY: 150,
		menuInc: 50,
		hudHeight: 100
	}
};
var game = JSON.parse(JSON.stringify(initial_state));
var canvas = document.getElementById("game");
var context = document.getElementById("game").getContext('2d');
var centerX = game.width * game.tileSize / 2;

function restart (soft) {
	if (soft) {
		game = JSON.parse(JSON.stringify(initial_state));
	} else {
		game.data.size =  JSON.parse(JSON.stringify(initial_state)).data.size;
		game.data.snake =  JSON.parse(JSON.stringify(initial_state)).data.snake;
		game.data.food =  JSON.parse(JSON.stringify(initial_state)).data.food;
		game.data.direction =  JSON.parse(JSON.stringify(initial_state)).data.direction;
		game.data.sizeUp =  JSON.parse(JSON.stringify(initial_state)).data.sizeUp;
		game.input =  JSON.parse(JSON.stringify(initial_state)).input;
	}
}

function onLoad() {
	canvas.setAttribute("width", game.width * game.tileSize);
	canvas.setAttribute("height", game.height * game.tileSize + game.ui.hudHeight);
	
	window.addEventListener("keydown", function(event) {
		// Handle direction changes only if not paused
		if (!game.state.paused) {
			if (event.keyCode == "87" || event.keyCode == "38") {
				game.input.direction.push(0);
			} else if (event.keyCode == "83" || event.keyCode == "40") {
				game.input.direction.push(1);
			} else if (event.keyCode == "65" || event.keyCode == "37") {
				game.input.direction.push(2);
			} else if (event.keyCode == "68" || event.keyCode == "39") {
				game.input.direction.push(3);
			}
		// Menu Interaction
		} else {
			if (event.keyCode == "87" || event.keyCode == "38") {
				game.state.menuItem--;
			} else if (event.keyCode == "83" || event.keyCode == "40") {
				game.state.menuItem++;
			} else if (event.keyCode == "13") {
				game.input.selectMenu = true;
			}
		}
		if (event.keyCode == "80") {
			game.input.pause = 1;
		}
	});
	
	// Render Loop
	setInterval(function() {
		render();
	}, 1000/game.fps);
	// Logic Loop
	setInterval(function() {
		tick();
	}, 1000/game.tps);
}

function tick() {
	// Mod Fix
	modFix();
	
	// Check if game is paused
	if (game.input.pause == 1) {
		if (game.state.currentMenu != 0 && game.state.currentMenu != 2) {
			game.state.paused = !game.state.paused;
			game.state.menuItem = 0;
		}
	}
	game.input.pause = 0;
	
	// Run Game Logic only if not paused
	if (!game.state.paused) {
		// Get Change in direction
		var leftRight = -1, upDown = -1;
		var lastAction = -1; //0-Up-Down,1-Left-Right
		for (var i = game.input.direction.length - 1; i >= 0 ; i--) {
			if ((game.input.direction[i] == 0 || game.input.direction[i] == 1) && upDown == -1) {
				upDown = game.input.direction[i];
				lastAction = 0;
			}
			if ((game.input.direction[i] == 2 || game.input.direction[i] == 3) && leftRight == -1) {
				leftRight = game.input.direction[i];
				lastAction = 1;
			}
		}
		game.input.direction = [];
		if (lastAction == 0) {
			if (!(game.data.direction == 0 || game.data.direction == 1)) {
				game.data.direction = upDown;
			}
			if (leftRight != -1)
				game.input.direction.push(leftRight);
		} else if (lastAction == 1){
			if (!(game.data.direction == 2 || game.data.direction == 3)) {
				game.data.direction = leftRight;
			}
			if (upDown != -1)
				game.input.direction.push(upDown);
		}
		
		// Move the snake
		var dx = 0, dy= 0;
		switch (game.data.direction) {
			case 0:
				dy = -1;
				break;
			case 1:
				dy = 1;
				break;
			case 2:
				dx = -1;
				break;
			case 3:
				dx = 1;
				break;
		}
		var snakeSize = game.data.snake.length - 1;
		if (game.data.sizeUp > 0) {
			game.data.snake.push([ game.data.snake[snakeSize][0], game.data.snake[snakeSize][1] ]);
			game.data.sizeUp--;
		}
		for (var i = snakeSize; i > 0; i--) {
			game.data.snake[i][0] = game.data.snake[i - 1][0];
			game.data.snake[i][1] = game.data.snake[i - 1][1];
		}
		game.data.snake[0][0] = game.data.snake[0][0] + dx;
		game.data.snake[0][1] = game.data.snake[0][1] + dy;
		
		// Spawn a food (if possibile)
		if (!game.data.food.exists) {
			var inSnake = false;
			var x = -1, y= -1;
			do {
				x = parseInt(Math.random() * game.width);
				y = parseInt(Math.random() * game.height);
				inSnake = false;
				for (var i = 0; i < game.data.snake.length; i++)
					if (x == game.data.snake[i][0] && y == game.data.snake[i][1])
						inSnake = true;
			} while (inSnake);
			game.data.food.exists = true;
			game.data.food.location = [x, y];
		}
		
		// Check Collision
		var tryGameOver = false;
		// Walls
		if (game.data.snake[0][0] < 0 || game.data.snake[0][0] > game.width - 1 ||
		    game.data.snake[0][1] < 0 || game.data.snake[0][1] > game.height - 1) {
			tryGameOver = true;
		}
		// Food
		for (var i = 0; i < game.data.snake.length; i++) {
			if (game.data.food.location[0] == game.data.snake[i][0] && 
				game.data.food.location[1] == game.data.snake[i][1]) {
				game.data.sizeUp += 2;
				game.data.score++;
				game.data.food.exists = false;
				game.data.food.location = [-1, -1];
			}
		}
		// Self
		for (var i = 1; i < game.data.snake.length; i++) {
			if (game.data.snake[0][0] == game.data.snake[i][0] && 
				game.data.snake[0][1] == game.data.snake[i][1]) {
				tryGameOver = true;
				break;
			}
		}
		
		// If collision
		if (tryGameOver) {
			game.data.lives--;
			if (game.data.lives <= 0) {
				game.state.currentMenu = 2;
			} else {
				game.state.currentMenu = 4;
				restart(false);
			}			
			game.state.paused = true;
		}
		
	// Run Menu interaction if it is paused
	} else {
		if (game.input.selectMenu) {
			if (game.state.currentMenu == 0) {
				var selected = game.state.menuItem % 2;
				if (selected == 0) {
					game.state.currentMenu = 1;
					game.state.paused = false;
				} else if (selected == 1) {
					// TO-DO: Highscore
				}
			} else if (game.state.currentMenu == 1) {
				var selected = game.state.menuItem % 2;
				if (selected == 0) {
					game.state.paused = false;
				} else if (selected == 1) {
					restart(true);
				}
			} else if (game.state.currentMenu == 2) {
			} else if (game.state.currentMenu == 3) {
			} else if (game.state.currentMenu == 4) {
				game.state.currentMenu = 1;
				game.state.paused = false;
			}
			game.input.selectMenu = false;
		}
	}
}

function render() {
	// Clear Frame
	modFix();
	context.clearRect(0, 0, game.width * game.tileSize, game.height * game.tileSize + game.ui.hudHeight);

	// Draw Grid
	context.beginPath();
	context.strokeStyle = "#C9C9C9";
	for (var i = 0; i < game.width + 1; i++) {
		context.moveTo(i * game.tileSize, 0);
		context.lineTo(i * game.tileSize, game.height * game.tileSize);
	}
	for (var i = 0; i < game.height + 1; i++) {
		context.moveTo(0, i * game.tileSize);
		context.lineTo(game.width * game.tileSize, i * game.tileSize);
	}
	context.stroke();
	
	// Draw Snake
	context.fillStyle = "black";
	for (var i = 0; i < game.data.snake.length; i++) {
		context.fillRect(game.data.snake[i][0] * game.tileSize + 1, game.data.snake[i][1] * game.tileSize + 1, game.tileSize - 2, game.tileSize - 2);
	}
	
	// Draw Food
	if (game.data.food.exists) {
		context.beginPath();
		context.fillStyle = "green";
		context.arc(game.data.food.location[0] * game.tileSize + 12, game.data.food.location[1] * game.tileSize + 12, game.tileSize / 2 - 1, 0, 2 * Math.PI);
		context.stroke();
		context.fill();
	}	
	
	// Draw HUD
	context.fillStyle = "lightgrey";
	context.textAlign = "center";
	context.beginPath();
	context.fillRect(0, game.height * game.tileSize, game.width * game.tileSize, game.ui.hudHeight);
	context.fillStyle = "black";
	context.font = "18px 'Trebuchet MS'";
	context.fillText("Lives: " + game.data.lives, centerX, game.height * game.tileSize + 40);
	context.fillText("Score: " + game.data.score, centerX, game.height * game.tileSize + 65);
	context.stroke();
	
	// Draw Menu
	if (game.state.paused) {
		context.fillStyle = "rgba(0,0,0,0.60)";
		context.fillRect(0, 0, game.width * game.tileSize, game.height * game.tileSize + game.ui.hudHeight);
		
		var menuItem = 0;
		context.beginPath();
		// Draw Launch Screen
		if (game.state.currentMenu == 0) {
			context.fillStyle = "white";
			context.font = "48px 'Trebuchet MS'";
			context.fillText("Play Snake!", centerX, game.ui.titleY);
			context.font = "24px 'Trebuchet MS'";
			context.fillText(game.state.menuItem % 2 === menuItem ? "__________" : "", centerX, game.ui.menuY + game.ui.menuInc * menuItem + 2);
			context.fillText("Start Game", centerX, game.ui.menuY + game.ui.menuInc * (menuItem++));
			context.fillText(game.state.menuItem % 2 === menuItem ? "__________" : "", centerX, game.ui.menuY + game.ui.menuInc * menuItem + 2);
			context.fillText("Highscores", centerX, game.ui.menuY + game.ui.menuInc * (menuItem++));
		} else if (game.state.currentMenu == 1) {
			context.fillStyle = "white";
			context.font = "48px 'Trebuchet MS'";
			context.fillText("Paused", centerX, game.ui.titleY);
			context.font = "24px 'Trebuchet MS'";
			context.fillText(game.state.menuItem % 2 === menuItem ? "_______" : "", centerX, game.ui.menuY + game.ui.menuInc * menuItem + 2);
			context.fillText("Resume", centerX, game.ui.menuY + game.ui.menuInc * (menuItem++));
			context.fillText(game.state.menuItem % 2 === menuItem ? "_______" : "", centerX, game.ui.menuY + game.ui.menuInc * menuItem + 2);
			context.fillText("Restart", centerX, game.ui.menuY + game.ui.menuInc * (menuItem++));
		} else if (game.state.currentMenu == 2) {
			context.fillStyle = "white";
			context.font = "48px 'Trebuchet MS'";
			context.fillText("You Lose!", centerX, game.ui.titleY);
			// TO-DO: Game Over
		} else if (game.state.currentMenu == 3) {
		} else if (game.state.currentMenu == 4) {
			context.fillStyle = "white";
			context.font = "48px 'Trebuchet MS'";
			context.fillText(game.data.lives + " Life Remaining!", centerX, game.ui.titleY);
			context.font = "24px 'Trebuchet MS'";
			context.fillText("_______", centerX, game.ui.menuY + game.ui.menuInc * menuItem + 2);
			context.fillText("Resume", centerX, game.ui.menuY + game.ui.menuInc * (menuItem++));
		}
		context.stroke();
	}
}

function modFix() {
	game.state.menuItem = Math.abs(game.state.menuItem);	
}