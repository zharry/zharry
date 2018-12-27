function Fuel(x, y) {
    GameObject.call(this, x, -50, TYPE.FUEL, {lx: 32, ly: 32, ox: 0, oy: 0});
    this.maxY = y;
    this.velY = 3;
    this.img = assets.ui.fuel;
    this.width = this.height = 32;
    
    this.render = function() {
        game.drawImage(this.img, this.x, this.y, this.width, this.height);
    };
    
    this.tick = function() {
        if (this.y < this.maxY)
            this.move(false, true);
    };
}