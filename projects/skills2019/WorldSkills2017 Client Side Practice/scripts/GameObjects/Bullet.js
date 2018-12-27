function Bullet(x, y, rotation, enemy = false) {
    GameObject.call(this, x-8, y-8, enemy ? TYPE.ENEMYBULLET : TYPE.BULLET, {lx: 10, ly: 10, ox: 3, oy: 3});
    this.rotation = rotation;
    this.moveDist = enemy ? 4 : 9;
    this.velX = this.moveDist * Math.sin(this.rotation);
    this.velY = this.moveDist * -Math.cos(this.rotation);
	this.isEnemyBullet = enemy;
    
    this.tick = function() {
        this.move(false, true); 
    };
    
    this.render = function() {
        game.save();
        game.setTransform(1, 0, 0, 1, this.x + 8, this.y + 8);
        game.rotate(this.rotation);
        game.drawImage(this.isEnemyBullet ? assets.alien.bullet : assets.bullet, -assets.bullet.width / 2, -assets.bullet.height / 2);
        game.restore();
    };
}