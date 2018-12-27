var gameVars = {
	gameover: {
		score: 0,
		time: 0
	},
    debug: true,
    paused: false,
	started: false,
	instructions: {
		slide: 0,
		clickLeft: false,
		clickRight: false
	},
	gameOver: false,
    score: 0,
    time: 0,
    lastTime: 0,
    fuel: 900,
    fuelTotal: 1800, // CONST
	fontSize: 1,
	fontSizeMax: 1.75,
	fontSizeMin: 0.75,
    sound: true,
    mouse: {
		x: 0, 
		y: 0,
		click: false
	},
    input: {
        goUp: false,
        goDown: false,
        goLeft: false,
        goRight: false,
        fire: false,
        fired: false,
		enter: false
    },
	gameCount: {
		planets: 0,
		enemies: 0,
		allies: 0,
		asteroids: 0
	},
    lastFuelDrop: 60,
    totalFuelCount: 0,
    minFuelDrop: 50, // CONST
    maxFuelDrop: 450  // CONST
};

var TYPE = {
    PLAYER: 0,
    BULLET: 1,
    COSMETIC: 2,
    ENEMY: 3,
    ALLY: 4,
    UI: 5,
    IMAGE: 6,
    TEXT: 7,
    BACKGROUND: 8,
    FUEL: 9,
	PLANET: 10,
	ENEMYBULLET: 11,
	ASTEROID: 12
};