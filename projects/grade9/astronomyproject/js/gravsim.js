var hold = false;
var dragging = false;
var drag = null;
var follow = null;
var spawn = true;
var pause = false;

var keys = {};

var mousex = 0;
var mousey = 0;

var translating = false;
var transX = 0;
var transY = 0;

var transDownX = 0;
var transDownY = 0;

var scale = 1;
var explode = false;

function Blob(x, y, size, mass, mx, my) {
	this.x = x;
	this.y = y;
	this.size = size;
	this.mass = mass;
	this.mx = mx;
	this.my = my;
	this.color = 'rgb(255, 255, 255)';
	this.path = [{x: this.x, y: this.y}];
}

Blob.prototype.render = function(ctx) {
	var renderX = this.x * scale + transX;
	var renderY = this.y * scale + transY;
	if (renderX > canvas.width + Sim.renderOut || renderX < 0 - Sim.renderOut || renderY > canvas.height + Sim.renderOut|| renderY < 0 - Sim.renderOut) {
		return;
	}
	
	this.path.push({x: this.x, y: this.y});
	
	var first = this.path[0];
	// ctx.beginPath();
	// ctx.shadowBlur = 0;
	// ctx.strokeStyle = getColor(this.mass, 0.5);
	// ctx.lineWidth = 2;
	// ctx.moveTo(first.x * scale + transX, first.y * scale + transY);
	// for (var i = 0; i < this.path.length; i++) {
	// 	var coord = this.path[i];
	// 	ctx.lineTo(coord.x * scale + transX, coord.y * scale + transY);
	// }
	// ctx.stroke();
	
	if (this.path.length > Sim.pathLength) {
		this.path.shift();
	}
	var color = getColor(this.mass / this.size * 50);
	
	var displaySize = this.size;
	ctx.beginPath();
	ctx.arc(renderX, renderY, displaySize * scale, 0, 2 * Math.PI, false);
	ctx.fillStyle = color;
	if (this.mass > 100) {
		ctx.shadowBlur = this.mass / 10 * scale;
		ctx.shadowOffsetX = 0;
		ctx.shadowOffsetY = 0;
		ctx.shadowColor = color;
	}
	else {
		ctx.shadowBlur = 0;
	}
	ctx.fill();

	// ctx.lineWidth = 5;
	// ctx.strokeStyle = '#003300';
	// ctx.stroke();
	// ctx.drawImage(this.image, this.x - displaySize, this.y - displaySize, displaySize * 2, displaySize * 2);
};

function getColor(a, alpha) {
	var temp = a / 50;
	var red = 0;
	var green = 0;
	var blue = 0;
	alpha = alpha || 255;

	if (temp <= 66) {
		red = 255;
	}
	else {
		red = temp - 60;
		red = 329.698727446 * (Math.pow(red, -0.1332047592));
	}

	if (temp <= 66) {
		green = temp
		green = 99.4708025861 * Math.log(green) - 161.1195681661;
	}
	else {
		green = temp - 60;
		green = 288.1221695283 * (Math.pow(green, -0.0755148492));
	}

	if (temp >= 66) {
		blue = 255;
	}
	else {
		if (temp <= 19) {
			blue = 0;
		}
		else {
			blue = temp - 10
			blue = 138.5177312231 * (Math.log(blue)) - 305.0447927307;
		}
	}

	red = Math.round(Math.max(0, Math.min(255, red)));
	green = Math.round(Math.max(0, Math.min(255, green)));
	blue = Math.round(Math.max(0, Math.min(255, blue)));

	return 'rgba(' + red + ', ' + green + ', ' + blue + ', ' + alpha + ')';
}

var canvas = document.getElementById("canvas");

(function() {
	window.onload = function() {
		resizeCanvas();
		// for(var i = 0; i < 1000; ++i) {
		// 	var massSize = Math.random();
		// 	Sim.addBlob(canvas.width * Math.random(), canvas.height * Math.random(), 1 * massSize, massSize, Math.random() * 1 - 0.5, Math.random() * 1 - 0.5);
		// }
	};

	canvas.onresize = function() {
		resizeCanvas();
	};

	var resizeCanvas = function() {
	    var d = document.getElementById("sim");
	    console.log(d);
	    console.log(canvas);
		canvas.width = d.offsetWidth;
		canvas.height = d.offsetHeight;
	};
})();

canvas.onmousedown = function(e) {
	if (e.which == 1) {
		dragging = true;
		transDownX = e.x - transX;
		transDownY = e.y - transY;
		for (var i = 0; i < Sim.blobs.length; ++i) {
			var blob = Sim.blobs[i];
			var xd = blob.x - ((e.x - transX) / scale);
			var yd = blob.y - ((e.y - transY) / scale);
			if (xd * xd + yd * yd < blob.size * blob.size) {
				drag = blob;
			}
		}
	}
	else if (e.which == 2) {
		transDownX = e.x - transX;
		transDownY = e.y - transY;
		translating = true;

	}
	else if (e.which == 3) {
		hold = true;
	}
	mousex = e.x;
	mousey = e.y;
};

canvas.onmousewheel = function(e) {
	var currScale = 1 - e.wheelDelta / 1200;
	scale /= currScale;
	transX = (transX - e.x) / currScale + e.x;
	transY = (transY - e.y) / currScale + e.y;
};

canvas.onmouseup = function(e) {
	if (e.which == 1) {
		drag = null;
		dragging = false;
	}
	else if (e.which == 2) {
		translating = false;
	}
	else if (e.which == 3) {
		hold = false;
	}
	mousex = e.x;
	mousey = e.y;
};

canvas.onmousemove = function(e) {
	if (translating || (dragging && drag == null)) {
		transX = e.x - transDownX;
		transY = e.y - transDownY;
	}
	mousex = e.x;
	mousey = e.y;
};

canvas.oncontextmenu = function(e) {
	return false;
};

document.addEventListener('keydown', function(e) {
	if(e.keyCode == 69) {
		explode = true;
	}
	else if(e.keyCode == 83) {
		spawn = !spawn;
	}
	else if(e.keyCode == 80) {
		pause = !pause;
	}
	// if (e.keyCode == 0x48) {

	// }
}, false);


// Canvas context
var ctx = canvas.getContext("2d");

var Sim = {};

// Array of blobs
Sim.blobs = [];

Sim.renderOut = 2000;
Sim.pathLength = 500;
Sim.G = 10;
Sim.lastRender = performance.now();
Sim.frameCount = 0;

Sim.printRate = function() {
	console.log("FPS: " + Sim.frameCount);
	Sim.fps = Sim.frameCount;
	Sim.frameCount = 0;
}

setInterval(Sim.printRate, 1000);

Sim.start = function() {
	onFrame(performance.now());
}

Sim.stop = function() {
	window.cancelAnimationFrame(Sim.frame);
}

Sim.update = function() {
	if(!pause){
	if(explode) {
		for (var i = 0; i < Sim.blobs.length; ++i) {
			var blob = Sim.blobs[i];
			var xd = blob.x - ((mousex - transX) / scale);
			var yd = blob.y - ((mousey - transY) / scale);
			if (xd * xd + yd * yd < blob.size * blob.size) {
				var massToExplode = blob.mass * 0.1;
				var sizeToExplode = blob.size * 0.9;
				blob.mass *= 0.9;
				blob.size *= 0.1;
				var toSplit = blob.size * 10;
				var dist = 50;
				for(var j = 0; j < toSplit; ++j) {
					var deg = Math.random() * 360;
					var xx = Math.sin(deg / 180 * Math.PI);
					var yy = Math.cos(deg / 180 * Math.PI);
					console.log(blob.x + xx * (blob.size + sizeToExplode / toSplit + dist));
					Sim.addBlob(blob.x + xx * (blob.size + sizeToExplode / toSplit + dist), blob.y + yy * (blob.size + sizeToExplode / toSplit + dist), sizeToExplode / toSplit, massToExplode / toSplit, xx * 50, yy * 50);
				}
				break;
			}
		}
	}
	explode = false;
	if (spawn) {
		for(var i = 0; i < 5; ++i){
			var massSize = Math.random();
			Sim.addBlob(canvas.width * Math.random(), canvas.height * Math.random(), 1 * massSize, massSize, Math.random() * 1 - 0.5, Math.random() * 1 - 0.5);
		}
	}
	if (hold) {
		Sim.addBlob((mousex - transX) / scale, (mousey - transY) / scale, 10, 0.000001, 0, 0);
	}
	if (drag != null) {
		drag.mx += ((mousex - transX) / scale - drag.x) * 0.05;
		drag.my += ((mousey - transY) / scale - drag.y) * 0.05;
		drag.mx *= 0.8;
		drag.my *= 0.8;
	}
	
	for (var i = 0; i < Sim.blobs.length; ++i) {
		var blob = Sim.blobs[i];
		blob.x += blob.mx;
		blob.y += blob.my;
	}
	
	for (var i = 0; i < Sim.blobs.length; ++i) {
		for (var j = 0; j < Sim.blobs.length; ++j) {
			var blob1 = Sim.blobs[i];
			var blob2 = Sim.blobs[j];
			if (blob1 == blob2) {
				continue;
			}
			if (blob1.x == blob2.x && blob1.y == blob2.y) {
				blob1.size = Math.sqrt(blob1.size * blob1.size + blob2.size * blob2.size);
				blob1.mass += blob2.mass;
				if (drag == blob2) {
					drag = blob1;
				}
				Sim.blobs.splice(j, 1);
				--j;
				continue;
			}
			var xDist = blob1.x - blob2.x;
			var yDist = blob1.y - blob2.y;
			var distanceSq = xDist * xDist + yDist * yDist;
			var accThis = blob2.mass / distanceSq * Sim.G;
			var accOther = blob1.mass / distanceSq * Sim.G;
			var distance = Math.sqrt(distanceSq);
			var vecX = xDist / distance;
			var vecY = yDist / distance;
			blob1.mx -= accThis * vecX;
			blob1.my -= accThis * vecY;
			blob2.mx += accOther * vecX;
			blob2.my += accOther * vecY;
			if (distanceSq < (blob1.size + blob2.size) * (blob1.size + blob2.size)) {
				// console.log("Merge!");
				blob1.size = Math.sqrt(blob1.size * blob1.size + blob2.size * blob2.size);
				blob1.mx = (blob1.mx * blob1.mass + blob2.mx * blob2.mass) / (blob1.mass + blob2.mass);
				blob1.my = (blob1.my * blob1.mass + blob2.my * blob2.mass) / (blob1.mass + blob2.mass);
				// blob1.x -= vecX * blob2.size;
				// blob1.y -= vecY * blob2.size;
				blob1.x -= xDist / (blob1.size / blob2.size);
				blob1.y -= yDist / (blob1.size / blob2.size);
				// console.log("x" + vecX + " y" + vecY + " s" + blob2.size);
				// console.log("dx" + (vecX *blob2.size) + " dy" + (vecY * blob2.size));
				blob1.mass += blob2.mass;
				if (drag == blob2) {
					drag = blob1;
				}
				Sim.blobs.splice(j, 1);
				--j;
			}
		}
	}
	}
};

Sim.render = function() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);

	for (var i = 0; i < Sim.blobs.length; i++) {
		var blob = Sim.blobs[i];
		blob.render(ctx);
	}

	ctx.fillStyle = "#fff";
	ctx.font = "24px Arial";
	// ctx.fillText("FPS: " + Sim.fps, 100, 100);
	// ctx.fillText("Particle count: " + Sim.blobs.length, 100, 150);
};

Sim.addBlob = function(x, y, size, mass, mx, my) {
	Sim.blobs.push(new Blob(x, y, size, mass, mx, my));
};

function onFrame(timestamp) {
	Sim.frame = window.requestAnimationFrame(onFrame);

	Sim.update();
	Sim.render();

	Sim.frameCount++;
	Sim.lastRender = timestamp;
}

function spamBlob() {
	for (var i = 0; i < 1000; ++i) {
		var massSize = Math.random() * 10;
		Sim.addBlob(canvas.width * Math.random() - transX, canvas.height * Math.random() - transY, 1 * massSize, massSize, Math.random() * 1 - 0.5, Math.random() * 1 - 0.5);
	}
}

Sim.start();
