var game;
var requestID = 0;
var gameState = JSON.parse(JSON.stringify(gameVars));

var assets;
var player;
var allObjects = [];
var removeObjects = [];
var allSounds = [];

var PANEL = [ "menu", "game", "leaderboard", "submit" ];
function showPanel(panel) {
	for (var i = 0; i < PANEL.length; i++) {
		document.getElementById(PANEL[i]).classList.remove("show");
		document.getElementById(PANEL[i]).classList.remove("hidden");
		document.getElementById(PANEL[i]).classList.add("hidden");
	}
	document.getElementById(panel).classList.add("show");
	
	if (panel == "menu") {
		stopGame();
	} else if (panel == "game") {
		initGame();
	} else if (panel == "leaderboard"){
		stopGame();
	} else if (panel == "submit") {
		stopGame();
		gameState.gameover.score = gameState.score;
		gameState.gameover.time = gameState.time;
        gameState.gameover.mins = parseInt(gameState.time / 60);
        gameState.gameover.seconds = gameState.time % 60;
		updateSubmit();
	}
	
}

function updateSubmit() {
	document.getElementById("score").value = gameState.gameover.score;
	document.getElementById("time").value = gameState.gameover.time;
	document.getElementById("submit-display").innerHTML = "Score: " + gameState.gameover.score 
		+ "<br/>Time: " + (gameState.gameover.mins + ":" + (gameState.gameover.seconds < 10 ? "0" : "") + gameState.gameover.seconds);
}

function submitScore() {
	if (document.getElementById("name").value == "") {
		alert("Please enter a valid name!");
		return;
	}
	ajax(
		[{name: "name", val: document.getElementById("name").value},
		 {name: "score", val: document.getElementById("score").value},
		 {name: "time", val: document.getElementById("time").value}], 
		"register.php", 
		(responseText) => {
			currentDisplay = 0;
			var leaderboard = JSON.parse(responseText);
			sortLeaderboard(leaderboard, leaderboard.length);
			leaderboard = leaderboard.reverse();
			updateLeaderboard(leaderboard);
			showPanel("leaderboard");
			document.getElementById("name").value = "";
		}
	);
}

function fetchLeaderboard() {
	ajax(
		[{name: "fetchOnly", val: "fetchOnly"}], 
		"register.php", 
		(responseText) => {
			currentDisplay = 0;
			var leaderboard = JSON.parse(responseText);
			sortLeaderboard(leaderboard, leaderboard.length);
			leaderboard = leaderboard.reverse();
			updateLeaderboard(leaderboard);
			showPanel("leaderboard");
			document.getElementById("name").value = "";
		}
	);
}

function stopGame() {
	for (var i = 0; i < allSounds.length; i++) {
		allSounds[i].pause();
		allSounds[i].currentTime = 0;
	}
	gameState.started = false;
}

function initGame() {	
	// Reset Game
	allObjects = [];
	removeObjects = [];
	allSounds = [];
	gameState = JSON.parse(JSON.stringify(gameVars));
	window.cancelAnimationFrame(requestID);
	
    // Load Game
    game = document.getElementById("game").getContext("2d");
    loadAssets();
    
    // Action Handlers
    createActionListeners();
    
    // Create Game
    gameState.lastTime = new Date().getTime();
    // Background
    createBackground();
    // UI
    createUI();
    // Player
    player = new Player();
    allObjects.push(player);
    
    // Create Initial GameObjects
    while(createNewPlanets(false));
    while(createNewEnemies());
    while(createNewAllies());
    while(createNewAsteroids());
    
	// Start Audio
	assets.sounds.background.loop = true;
	playSound("background");
	
    // Start Game
    requestID = window.requestAnimationFrame(loop);
}

function loop() {    
    // Tick
    if (!gameState.paused && gameState.started == true) {
        for (var i = 0; i < allObjects.length; ++i)
            allObjects[i].tick();
        for (var i = 0; i < removeObjects.length; ++i)
            allObjects = arrayRemove(allObjects, removeObjects[i]);
        processGameLogic();
        createNewPlanets();
		createNewEnemies();
		createNewAllies();
		createNewAsteroids();
        fuelDrop();
		
		// Check Player Death
		if (gameState.fuel <= 0) {
			showPanel("submit");
		}
	}

	// Sounds	
	for (var i = 0; i < allSounds.length; ++i)
		if (allSounds[i].ended)
			allSounds = arrayRemove(allSounds, allSounds[i]);
	muteSounds();

	// Render
	game.clearRect(0, 0, 960, 600);
	game.save();
	if (gameState.started) {
		if (!gameState.paused) {
			// Render Background
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.BACKGROUND)
					allObjects[i].render();
				
			// Get all Planets
			var allPlanets = [];
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.PLANET)
					allPlanets.push(allObjects[i]);
			// Sort Planets by Size
			sortPlanets(allPlanets, allPlanets.length);
			// Render in Reverse Order
			for (var i = 0; i < allPlanets.length; i++)
				allPlanets[i].render();
			
			game.fillStyle = 'rgba(0, 0, 0, 0.75)';
			game.fillRect(0, 0, 960, 600);
			// Render General GameObjects
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type != TYPE.BACKGROUND && 
					allObjects[i].type != TYPE.PLANET)
					allObjects[i].render();
			// Render Player
			player.render();
			// Render Fuel Drops
			for (var i = 0; i < allObjects.length; ++i)
				if (allObjects[i].type == TYPE.FUEL)
					allObjects[i].render();
		} else {
			game.fillStyle = 'rgba(0, 0, 0, 0.75)';
			game.fillRect(0, 0, 960, 600);
			game.font = (40 * gameState.fontSize) + 'px VesperLibre';
			game.fillStyle = "white";
			game.textAlign = "center";
			game.fillText("Press P to Resume", 960 / 2, 280);
			game.fillText("Press Q to Quit", 960 / 2, 330);
		}
		// Render UI Elements
		for (var i = 0; i < allObjects.length; ++i)
			if (allObjects[i].type == TYPE.UI)
				allObjects[i].render();
    } else {
		
		// Tutorial, if the Game has not started yet
		renderTutorial();
	}
	game.restore();
	requestID = window.requestAnimationFrame(loop);
}

function fuelDrop() {
    if (gameState.totalFuelCount < 3) {
        var genX = parseInt(Math.random() * (960 - 32));
        var genY = parseInt(Math.random() * (450 - 32)) + 50;
        if (gameState.lastFuelDrop > gameState.minFuelDrop) {
            if(!parseInt(Math.random() * 100)) {
                allObjects.push(new Fuel(genX, genY));
                gameState.lastFuelDrop = 0;
                gameState.totalFuelCount++;
            }
        } else if (gameState.lastFuelDrop > gameState.maxFuelDrop) {
            allObjects.push(new Fuel(genX, genY));
            gameState.lastFuelDrop = 0;
            gameState.totalFuelCount++;
        }
        gameState.lastFuelDrop++;
    }
}

function createNewPlanets(newGen = true) {
    var selectPlanet = parseInt(Math.random() * 5);
    var small = parseInt(Math.random() * 2);
    var scaleFactor = parseInt(Math.random() * 5 + 1) / 6;
    var x = parseInt(Math.random() * 960 * 2) + (newGen ? 960 : 0);
    var y = parseInt(Math.random() * 450) + 25;
    if (gameState.gameCount.planets < 30) {
        var newPlanet = new Planet(x, y, selectPlanet, small, scaleFactor);
        genCoords: while (true) {
            if (gameState.gameCount.planets == 0)
                break;
            for (var i = 0; i < gameState.gameCount.planets; ++i) {
				var colliding = getColliding(newPlanet);
				var flag = true;
				for (var j = 0; j < colliding.length; j++) {
					if (colliding[j].type == TYPE.PLANET)
						flag = false;
				}
				if (flag)
                    break genCoords;
                newPlanet.x = parseInt(Math.random() * 960 * 2) + (newGen ? 960 : 0);
                newPlanet.y = parseInt(Math.random() * 450) + 25;
            }
        }
        allObjects.push(newPlanet);
		gameState.gameCount.planets++;
    }    
    return (gameState.gameCount.planets < 30);
}

function createNewEnemies(newGen = true) {
	var x = parseInt(Math.random() * 960 * 2) + (newGen ? 960 : 0);
    var y = parseInt(Math.random() * 450) + 25;
	var velX = parseInt(Math.random() * 4 + 1);
	if (gameState.gameCount.enemies < 6) {
		var newEnemy = new Enemy(x, y, velX);
        allObjects.push(newEnemy);
		gameState.gameCount.enemies++;
	}
    return (gameState.gameCount.enemies < 6);
}

function createNewAllies(newGen = true) {
	var x = parseInt(Math.random() * 960 * 2) + (newGen ? 960 : 0);
    var y = parseInt(Math.random() * 450) + 25;
	var velX = parseInt(Math.random() * 4 + 1);
    var sprite = parseInt(Math.random() * 2);
	if (gameState.gameCount.allies < 4) {
		var newAlly = new Ally(x, y, velX, sprite);
        allObjects.push(newAlly);
		gameState.gameCount.allies++;
	}
    return (gameState.gameCount.allies < 4);
}

function createNewAsteroids(newGen = true) {
	var x = parseInt(Math.random() * 960 * 2) + (newGen ? 960 : 0);
    var y = parseInt(Math.random() * 450) + 25;
	var gen = parseInt(Math.random() * 4);
	if (gameState.gameCount.asteroids < 5) {
		var newAsteroid = new Asteroid(x, y, gen);
		genCoords: while (true) {
            if (gameState.gameCount.asteroids == 0)
                break;
            for (var i = 0; i < gameState.gameCount.asteroids; ++i) {
				var colliding = getColliding(newAsteroid);
				var flag = true;
				for (var j = 0; j < colliding.length; j++) {
					if (colliding[j].type == TYPE.ASTEROID)
						flag = false;
				}
				if (flag)
                    break genCoords;
                newAsteroid.x = parseInt(Math.random() * 960 * 2) + (newGen ? 960 : 0);
                newAsteroid.y = parseInt(Math.random() * 450) + 25;
            }
        }
        allObjects.push(newAsteroid);
		gameState.gameCount.asteroids++;
    }
	return (gameState.gameCount.asteroids < 5);
}

function processGameLogic() {
    var curTime = new Date().getTime();
    if (curTime - gameState.lastTime >= 1000) {
        gameState.lastTime = curTime;
        gameState.time++;
    }
    if (gameState.fuel > 0)
        gameState.fuel--;
    if (gameState.fuel > 1800)
        gameState.fuel = 1800;
	if (gameState.fuel < 0)
		gameState.fuel = 0;
}

function createBackground() {
    var background = new ImageObj(0, 0, assets.background, 960, 600);
    background.type = TYPE.BACKGROUND;
    background.colBox = {lx: 0, ly: 0, ox: 0, oy: 0};
    allObjects.push(background);
}

function createUI() {
    var ui = new UI();
    allObjects.push(ui);
    
    var logo = new ImageObj(450, 550, assets.logo, 60, 40);
    logo.type = TYPE.UI;
    logo.colBox = {lx: 0, ly: 0, ox: 0, oy: 0};
    allObjects.push(logo);
}

function muteSounds() {
	for (var i = 0; i < allSounds.length; i++)
		allSounds[i].volume = gameState.sound ? 1 : 0;
	assets.sounds.background.volume = gameState.sound ? 1 : 0;
	assets.sounds.destroyed.volume = gameState.sound ? 1 : 0;
	assets.sounds.shoot.volume = gameState.sound ? 1 : 0;
}

function playSound(sound) {
	var newSound = assets.sounds[sound].cloneNode();
	newSound.play();
	allSounds.push(newSound);
}

function fontSizeUp() {
	gameState.fontSize = clamp(gameState.fontSize + 0.25, 
							   gameState.fontSizeMin,
							   gameState.fontSizeMax);
}
function fontSizeDown() {
	gameState.fontSize = clamp(gameState.fontSize - 0.25, 
							   gameState.fontSizeMin,
							   gameState.fontSizeMax);
}

function loadAssets() {
    assets = {
        spaceship: new Image(),
        bullet: new Image(),
        background: new Image(),
        logo: new Image(),
        aestroid: [new Image(), new Image(), new Image(), new Image()],
        alien: {
            left: [new Image(), new Image(), new Image()],
            right: [new Image(), new Image(), new Image()],
			bullet: new Image()
        },
        allies: {
            red: [new Image(), new Image(), new Image(), new Image()],
            yellow: [new Image(), new Image(), new Image(), new Image()]
        },
        bigPlanets: [new Image(), new Image(), new Image(), 
                                  new Image(), new Image()],
        smallPlanets: [new Image(), new Image(), new Image(), 
                                    new Image(), new Image()],
        ui: {
            pause: new Image(),
            time: new Image(),
            fuel: new Image(),
            sound: {
                on: new Image(),
                off: new Image()
            },
            textUp: new Image(),
            textDown: new Image(),
			left: new Image(),
			right: new Image()
        },
		sounds: {
			background: new Audio('assets/sounds/background.mp3'),
			destroyed: new Audio('assets/sounds/destroyed.mp3'),
			shoot: new Audio('assets/sounds/shoot.mp3')
		}
    };
    assets.spaceship.src = 'assets/spaceship/spaceship.png';
    assets.bullet.src = 'assets/spaceship/bullet.png';
    assets.background.src = 'assets/background.jpg';
    assets.logo.src = 'assets/logo.png';
    assets.ui.pause.src = 'assets/ui/pause.png';
    assets.ui.time.src = 'assets/ui/time.png';
    assets.ui.fuel.src = 'assets/ui/fuel.png';
    assets.ui.sound.on.src = 'assets/ui/sound.png';
    assets.ui.sound.off.src = 'assets/ui/nosound.png';
    assets.ui.textUp.src = 'assets/ui/textup.png';
    assets.ui.textDown.src = 'assets/ui/textdown.png';
	assets.ui.left.src = 'assets/ui/left.png';
	assets.ui.right.src = 'assets/ui/right.png';
    for (var i = 0; i < 5; ++i) {
        assets.bigPlanets[i].src = 'assets/planets/big/planet (' + ( i + 1 ) + ').png';
        assets.smallPlanets[i].src = 'assets/planets/small/small (' + ( i + 1 ) + ').png';
    }
    for (var i = 0; i < 4; ++i) {
        assets.aestroid[i].src = 'assets/aestroids/' + ( i + 1 ) + '.png';
        assets.allies.red[i].src = 'assets/allies/red/' + ( i + 1 ) + '.png';
        assets.allies.yellow[i].src = 'assets/allies/yellow/' + ( i + 1 ) + '.png';
    }
    for (var i = 0; i < 3; ++i) {
        assets.alien.left[i].src = 'assets/alien/left/' + ( i + 1 ) + '.png';
        assets.alien.right[i].src = 'assets/alien/right/' + ( i + 1 ) + '.png';
    }
	assets.alien.bullet.src = 'assets/alien/bullet.png';
}