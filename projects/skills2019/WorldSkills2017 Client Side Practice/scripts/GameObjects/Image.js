function ImageObj(x, y, img, width, height) {
    GameObject.call(this, x, y, TYPE.IMAGE, {lx: width, ly: height, ox: 0, oy: 0});
    this.img = img;
    this.width = width;
    this.height = height;
    
    this.render = function() {
        game.drawImage(this.img, this.x, this.y, this.width, this.height);
    };
}