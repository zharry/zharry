function Planet(x, y, planet, small, scale) {
    GameObject.call(this, x, y, TYPE.PLANET, {lx: 0, ly: 0, ox: 0, oy: 0});
    this.planet = planet;
    this.velY = 0;
	
	this.small = small;
	this.scale = scale;
    if (small) {
        this.width = 32 * scale;
        this.height = 32 * scale;
        this.velX = -0.5 * scale;
        this.img = assets.smallPlanets[this.planet];
        this.colBox = {lx: 32 * scale, ly: 32 * scale, ox: 0, oy: 0};
    } else {
        this.width = 128 * scale;
        this.height = 128 * scale;
        this.velX = -1.5 * scale;
        this.img = assets.bigPlanets[this.planet];
        this.colBox = {lx: 128 * scale, ly: 128 * scale, ox: 0, oy: 0};
    }
    
    this.render = function() {
        game.drawImage(this.img, this.x, this.y, this.width, this.height);
    };
    
    this.tick = function() {
        this.move(false, false);
        // Override Default Destory
        if (this.x < -128) {
            removeObjects.push(this);
			gameState.gameCount.planets--;
		}
    };
}