function UI() {
    GameObject.call(this, 0, 0, TYPE.UI, {lx: 0, ly: 0, ox: 0, oy: 0});
    this.percentage = 0;
    this.mins = 0;
    this.seconds = 0;
    
    this.tick = function() {
        this.percentage = gameState.fuel / gameState.fuelTotal;
        if (this.percentage > 1)
            this.percentage = 1;
        if (this.percentage < 0)
            this.percentage = 0;
        this.mins = parseInt(gameState.time / 60);
        this.seconds = gameState.time % 60;
    };
    
    this.render = function() {
        // Fuel Container
        game.beginPath();
        game.fillStyle = 'rgb(210, 210, 210)';
        game.strokeStyle = 'black';
        game.moveTo(0, 0);
        game.lineTo(0, 50);
        game.lineTo(350, 50);
        game.lineTo(400, 0);
        game.lineTo(0, 0);
        game.fill();
        game.stroke();
        // Fuel UI
        game.beginPath();
        game.fillStyle = 'white';
        game.moveTo(10, 10);
        game.lineTo(10, 40);
        game.lineTo(290, 40);
        game.lineTo(320, 10);
        game.lineTo(10, 10);
        game.fill();
        game.stroke();
        // Fuel Icon
        game.drawImage(assets.ui.fuel, 320, 10, 30, 30);
        // Fuel Indicator
        if (this.percentage > 0) {
            game.beginPath();
            game.fillStyle = 'red'
            game.strokeStyle = 'red';
            game.moveTo(11, 11);
            game.lineTo(11, 39);
            game.lineTo(-17 + 308 * this.percentage, 39);
            game.lineTo(11 + 308 * this.percentage, 11);
            game.lineTo(11, 11);
            game.fill();
            game.stroke();
            game.beginPath();
            game.fillStyle = 'rgba(210, 210, 210)';
            game.strokeStyle = 'rgba(210, 210, 210)';
            game.moveTo(1,1);
            game.lineTo(1, 49);
            game.lineTo(9, 49);
            game.lineTo(9, 1);
            game.lineTo(1, 1);
            game.fill();
            game.stroke();
            game.beginPath();
            game.fillStyle = 'black';
            game.strokeStyle = 'black';
            game.moveTo(10, 10);
            game.lineTo(10, 40);
            game.stroke();
            game.beginPath();
            game.fillStyle = 'rgba(210, 210, 210)';
            game.strokeStyle = 'black';
            game.moveTo(0, 0);
            game.lineTo(0, 50);
            game.lineTo(350, 50);
            game.lineTo(400, 0);
            game.lineTo(0, 0);
            game.stroke();
        }
        game.strokeStyle = 'white';
        game.font = (15 * gameState.fontSize) + 'px VesperLibre';
		if (!gameState.paused)
			game.fillText("Fuel: " + (this.percentage * 100).toFixed(2) + "%", 15, 70);
        
        // Time
        game.drawImage(assets.ui.time, 465, 10, 30, 30);
        game.font = (20 * gameState.fontSize) + 'px VesperLibre';
        game.textAlign = "center";
        game.fillText(this.mins + ":" + (this.seconds < 10 ? "0" : "") + this.seconds, 480, 62);
        
        // Score Display:
        game.font = (24 * gameState.fontSize) + 'px VesperLibre';
        game.fillText("Score: " + gameState.score, 480, 535);
        game.textAlign = "left";
        
        // Right Side UI Buttons
        game.drawImage(assets.ui.pause, 920, 10, 30, 30);
        game.drawImage(gameState.sound ? assets.ui.sound.on : assets.ui.sound.off, 885, 12, 28, 28);
        game.drawImage(assets.ui.textUp, 850, 10, 30, 30);
        game.drawImage(assets.ui.textDown, 830, 10, 30, 30);      
    };
}