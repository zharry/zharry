function createActionListeners() {
    document.getElementById("game").addEventListener('mousemove', function(evt) {
        var rect = document.getElementById("game").getBoundingClientRect();
        gameState.mouse.x = evt.clientX - rect.left;
        gameState.mouse.y = evt.clientY - rect.top;
	}, false);
	document.getElementById("game").addEventListener('mousedown', function(evt) {
        gameState.mouse.click = true;
	}, false);
	document.getElementById("game").addEventListener('mouseup', function(evt) {
		if (gameState.mouse.click) {
			if (gameState.started == false) {
				if (gameState.mouse.x < 64 &&
					gameState.mouse.y > 268 &&
					gameState.mouse.y < 332) {
					// Left Button
					gameState.instructions.clickLeft = true;
					gameState.instructions.clickRight = false;
				} else if (
					gameState.mouse.x > 896 &&
					gameState.mouse.y > 268 &&
					gameState.mouse.y < 332) {
					// Right Button
					gameState.instructions.clickLeft = false;
					gameState.instructions.clickRight = true;
				}
			} else {
				if (gameState.mouse.x > 920 &&
					gameState.mouse.y < 40) {
					// Pause Button
					gameState.paused = !gameState.paused;
				} else if (
					gameState.mouse.x > 885 &&
					gameState.mouse.x < 920 &&
					gameState.mouse.y < 40) {
					// Sound Button
					gameState.sound = !gameState.sound;
				} else if (
					gameState.mouse.x > 850 &&
					gameState.mouse.x < 885 &&
					gameState.mouse.y < 40) {
					// Font Up Button
					fontSizeUp();
				} else if (
					gameState.mouse.x > 830 &&
					gameState.mouse.x < 850 &&
					gameState.mouse.y < 40) {
					// Font Up Button
					fontSizeDown();
				}
			}
		}
        gameState.mouse.click = false;
	}, false);
    
    window.addEventListener("keydown", function(event) {
        if (event.keyCode == "87" || event.keyCode == "38") {
            gameState.input.goUp = true;
        } else if (event.keyCode == "83" || event.keyCode == "40") {
            gameState.input.goDown = true;
        } else if (event.keyCode == "65" || event.keyCode == "37") {
            gameState.input.goLeft = true;
        } else if (event.keyCode == "68" || event.keyCode == "39") {
            gameState.input.goRight = true;
        } else if (event.keyCode == "32") {
		    gameState.input.fire = true;
        } else if (event.keyCode == "80") {
			gameState.paused = !gameState.paused;
		} else if (event.keyCode == "13") {
			gameState.input.enter = true;
		} else if (event.keyCode == "81") {
			if (gameState.started && gameState.paused)
				showPanel("menu");
		}
	});
    window.addEventListener("keyup", function(event) {
        if (event.keyCode == "87" || event.keyCode == "38") {
            gameState.input.goUp = false;
        } else if (event.keyCode == "83" || event.keyCode == "40") {
            gameState.input.goDown = false;
        } else if (event.keyCode == "65" || event.keyCode == "37") {
            gameState.input.goLeft = false;
        } else if (event.keyCode == "68" || event.keyCode == "39") {
            gameState.input.goRight = false;
        } else if (event.keyCode == "32") {
		    gameState.input.fire = false;
		    gameState.input.fired = false;
        } else if (event.keyCode == "13") {
			gameState.input.enter = false;
		}
	});
}
