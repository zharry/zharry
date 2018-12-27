function Asteroid(x, y, no) {
    GameObject.call(this, x, y, TYPE.ASTEROID, {lx: 64, ly: 64, ox: 8, oy: 8});
    this.asteroid = no;
    this.velY = 0;
	this.velX = -2.25;
	
	this.hp = 2;
    
    this.render = function() {
        game.drawImage(assets.aestroid[this.asteroid], this.x, this.y, 80, 80);
    };
    
    this.tick = function() {
        this.move(false, false);
        // Override Default Destory
        if (this.x < -120) {
            removeObjects.push(this);
			gameState.gameCount.asteroids--;
		}
		
		// Check Collision with player bullet
		var cols = getColliding(this);
		for (var i = 0; i < cols.length; i++) {
			if (cols[i].type == TYPE.BULLET) {
				removeObjects.push(cols[i]);
				this.hp--;
				break;
			}
		}		
		if (this.hp == 0) {
			removeObjects.push(this);
			gameState.score += 10;
			gameState.gameCount.asteroids--;
			playSound("destroyed");
		}
    };
}