function GameObject(x, y, type, colBox) {
    this.x = x;
    this.y = y;
    this.velX = 0;
    this.velY = 0;
    this.type = type;
    this.colBox = colBox; 
    /* Collision box Object format
    [
        lx: lengthX
        ly: lengthY, 
        ox: offsetX,
        oy: offsetY
    ]
    */
    
    // Define abstract functions for GameObjects
    this.tick = function() {};
    this.render = function() {};
    
    // Define functions common for all GameObjects
    this.move = function(bounding = true, destory = false) {          
        this.x += this.velX;
        this.y += this.velY;
        
        if (bounding) {
            if (this.x + this.colBox.ox < 0)
                this.x = -this.colBox.ox;
            else if (this.x + this.colBox.ox + this.colBox.lx > 960)
                this.x = 960 - (this.colBox.ox + this.colBox.lx);
            if (this.y + this.colBox.oy < 0)
                this.y = -this.colBox.oy;
            else if (this.y + this.colBox.oy + this.colBox.ly > 600)
                this.y = 600 - (this.colBox.oy + this.colBox.ly);
        }
        
        if (destory) {
            if (this.x < -960)
                removeObjects.push(this);
            else if (this.x > 2 * 960)
                removeObjects.push(this);
            if (this.y < -600)
                removeObjects.push(this);
            else if (this.y > 2 * 600)
                removeObjects.push(this);
        }
    };
}