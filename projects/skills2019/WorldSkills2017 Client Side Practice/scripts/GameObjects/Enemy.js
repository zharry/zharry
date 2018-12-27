function Enemy(x, y, velX) {
	GameObject.call(this, x, y, TYPE.ENEMY, {lx: 140 / 3.5, ly: 100 / 3.5, ox: 20 / 3.5, oy: 40 / 3.5});
	
	this.maxVelX = -1 + Math.random();
	this.minVelX = -4 + Math.random();
	this.accel = true;
	this.velX = -velX;
	this.velY = 0;
	this.center = 180 / 7;
	
	this.shootTimer = parseInt(Math.random() * 100);
	this.shootTimerMax = 150;
	
	this.animationCounter = 0;
	this.animationFrame = 0;
	this.animationCounterMax = 20;
	this.animationFrameMax = 3;
    
    // Define abstract functions for GameObjects
    this.tick = function() {
		this.move(false, false);
		if (this.x <= 0 || this.x >= 960)
			this.shootTimer = 0;
		if (this.x <= -60) {
			removeObjects.push(this);
			gameState.gameCount.enemies--;
		}
		
		// Animation Frame
		if (this.animationCounter >= this.animationCounterMax) {
			this.animationCounter = 0;
			this.animationFrame++;
		} else {
			this.animationCounter++;
		}
		this.animationFrame %= this.animationFrameMax;
		
		// Try to shoot a bullet and change acceleration
		if (this.shootTimer >= this.shootTimerMax) {
			this.shootTimer = 0;
			// Determine Rotation of the Bullet towards Player's current location
			var p1x = this.x + this.center, p1y = this.y + this.center;
			var p2x = player.x + 32, p2y = player.y + 32;
			var p3x = p1x, p3y = -1;
			var p12 = Math.sqrt((p1x - p2x) * (p1x - p2x) + (p1y - p2y) * (p1y - p2y));
			var p23 = Math.sqrt((p2x - p3x) * (p2x - p3x) + (p2y - p3y) * (p2y - p3y));
			var p31 = Math.sqrt((p3x - p1x) * (p3x - p1x) + (p3y - p1y) * (p3y - p1y));
			this.rotation = Math.abs((p2x < p1x ? -2 * Math.PI : 0) 
				+ Math.acos((p12 * p12 + p31 * p31 - p23 * p23) / (2 * p12 * p31)));
			// Create Bullet
            var bullet = new Bullet(this.x + this.colBox.ox + this.colBox.lx / 2, this.y + this.colBox.oy + this.colBox.ly / 2, this.rotation, true);
            allObjects.push(bullet);
			
			// Change Acceleration
			var change = parseInt(Math.random() * 2);
			if (change == 1)
				this.accel = !this.accel;
		} else {
			this.shootTimer++;
		}		
		
		// Randomize X Velocity
		if (this.accel) {
			this.velX += this.velX * 0.01;
		} else {
			this.velX -= this.velX * 0.01;
		}
			
		this.velX = clamp(this.velX, this.minVelX, this.maxVelX);
		
		// Check Collision with player bullet
		var cols = getColliding(this);
		for (var i = 0; i < cols.length; i++) {
			if (cols[i].type == TYPE.BULLET) {
                removeObjects.push(this);
                removeObjects.push(cols[i]);
				gameState.score += 5;
				gameState.gameCount.enemies--;
				playSound("destroyed");
				break;
			}
		}
	};
    this.render = function() {
		game.drawImage(assets.alien.right[this.animationFrame], this.x, this.y, 180 / 3.5, 180 / 3.5);
	};
}