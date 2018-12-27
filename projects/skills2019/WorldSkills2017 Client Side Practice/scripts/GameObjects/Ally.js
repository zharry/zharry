function Ally(x, y, velX, sprite) {
	GameObject.call(this, x, y, TYPE.ALLY, {lx: 70 / 2.5, ly: 60 / 2.5, ox: 10 / 2.5, oy: 20 / 2.5});
	
	this.maxVelX = -1.5;
	this.minVelX = -3;
	this.accel = parseInt(Math.random() * 2);
	this.velX = -velX;
	this.velY = 0;
	this.center = 180 / 5;
	
	this.accelTimer = parseInt(Math.random() * 100);
	this.accelTimerMax = 150;
	
	this.animationCounter = 0;
	this.animationFrame = 0;
	this.animationCounterMax = 20;
	this.animationFrameMax = 4;
    
    // Define abstract functions for GameObjects
    this.tick = function() {
		this.move(false, false);
		if (this.x <= -60) {
			removeObjects.push(this);
			gameState.gameCount.allies--;
		}
		
		// Animation Frame
		if (this.animationCounter >= this.animationCounterMax) {
			this.animationCounter = 0;
			this.animationFrame++;
		} else {
			this.animationCounter++;
		}
		this.animationFrame %= this.animationFrameMax;
		
		// Change acceleration
		if (this.accelTimer >= this.accelTimerMax) {
			this.accelTimer = 0;
			// Change Acceleration
			var change = parseInt(Math.random() * 2);
			if (change == 1)
				this.accel = !this.accel;
		} else {
			this.accelTimer++;
		}
		
		// Randomize X Velocity
		if (this.accel) {
			this.velX += this.velX * 0.02;
		} else {
			this.velX -= this.velX * 0.02;
		}
			
		this.velX = clamp(this.velX, this.minVelX, this.maxVelX);
		
		// Check Collision with player bullet
		var cols = getColliding(this);
		for (var i = 0; i < cols.length; i++) {
			if (cols[i].type == TYPE.BULLET) {
                removeObjects.push(this);
                removeObjects.push(cols[i]);
				gameState.score -= 10;
				gameState.gameCount.allies--;
				playSound("destroyed");				
				break;
			}
		}
	};
    this.render = function() {
		if (sprite == 0)
			game.drawImage(assets.allies.red[this.animationFrame], this.x, this.y, 80 / 2.5, 80 / 2.5);
		else
			game.drawImage(assets.allies.yellow[this.animationFrame], this.x, this.y, 80 / 2.5, 80 / 2.5);
			
	};
}