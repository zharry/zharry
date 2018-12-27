function Text(x, y, txt, size) {
    GameObject.call(this, x, y, TYPE.TEXT, {lx: 0, ly: 0, ox: 0, oy: 0});
    this.txt = txt;
    this.size = size;
    
    this.render = function() {
        game.font = (this.size * gameState.fontSize) + 'px VesperLibre';
        game.fillText(this.txt, this.x, this.y);
    };
}