function Player() {
    GameObject.call(this, 448, 268, TYPE.PLAYER, {lx: 48, ly: 48, ox: 8, oy: 8});
    this.bulletCDMax = 15;
    this.bulletCD = 0;
    this.rotation = 0;
    this.moveDist = 3;
    
    this.tick = function() {
        // Move
        this.velX = 0;
        this.velY = 0;
        if (gameState.input.goUp)
            this.velY = -this.moveDist;
        if (gameState.input.goDown)
            this.velY = this.moveDist;
        if (gameState.input.goLeft)
            this.velX = -this.moveDist;
        if (gameState.input.goRight)
            this.velX = this.moveDist;
        if (gameState.input.goUp && gameState.input.goDown)
            this.velY = 0;
        if (gameState.input.goLeft && gameState.input.goRight) {
            this.velX = 0;
        }
        this.move();
        
        // Rotate
        var p1x = this.x + 32, p1y = this.y + 32;
        var p2x = gameState.mouse.x, p2y = gameState.mouse.y;
        var p3x = p1x, p3y = -1;
        var p12 = Math.sqrt((p1x - p2x) * (p1x - p2x) + (p1y - p2y) * (p1y - p2y));
        var p23 = Math.sqrt((p2x - p3x) * (p2x - p3x) + (p2y - p3y) * (p2y - p3y));
        var p31 = Math.sqrt((p3x - p1x) * (p3x - p1x) + (p3y - p1y) * (p3y - p1y));
        this.rotation = Math.abs((p2x < p1x ? -2 * Math.PI : 0) 
            + Math.acos((p12 * p12 + p31 * p31 - p23 * p23) / (2 * p12 * p31)));
            
        // Create Bullets
        if (this.bulletCD == 0 && gameState.input.fire && !gameState.input.fired) {
            var bullet = new Bullet(this.x + this.colBox.ox + this.colBox.lx / 2, this.y + this.colBox.oy + this.colBox.ly / 2, this.rotation);
            allObjects.push(bullet);
            this.bulletCD = this.bulletCDMax;
		    gameState.input.fired = true;
			playSound("shoot");
        }
        if (this.bulletCD > 0)
            this.bulletCD--;
        
        // Check Player Collisions
        var cols = getColliding(this);
        for (var i = 0; i < cols.length; ++i) {
            if (cols[i].type == TYPE.FUEL) {
                gameState.fuel += 900;
                gameState.totalFuelCount--;
                removeObjects.push(cols[i]);
            }
			if (cols[i].type == TYPE.ENEMYBULLET || 
				cols[i].type == TYPE.ASTEROID ||
				cols[i].type == TYPE.ENEMY ||
				cols[i].type == TYPE.ALLY) {
                gameState.fuel -= 900;
                removeObjects.push(cols[i]);
				if (cols[i].type != TYPE.ENEMYBULLET)
					playSound("destroyed");
			}
			if (cols[i].type == TYPE.ASTEROID)
				gameState.gameCount.asteroids--;
			if (cols[i].type == TYPE.ENEMY)
				gameState.gameCount.enemies--;
			if (cols[i].type == TYPE.ALLY)
				gameState.gameCount.allies--;
        }
    };
    
    this.render = function() {
        game.save();
        game.setTransform(0.5, 0, 0, 0.5, this.x + 32, this.y + 32);
        game.rotate(this.rotation);
        game.drawImage(assets.spaceship, -assets.spaceship.width / 2, -assets.spaceship.height / 2);
        game.restore();
    };
}