function showPlayer() {
	document.getElementById('player').style.width = '300px';
	document.getElementById('musicPlayer').style.width = '300px';
}
function hidePlayer() {
	document.getElementById('player').style.width = '47px';
	document.getElementById('musicPlayer').style.width = '47px';
}

function resizeImages() {
	document.getElementById('canvas').style.width = windows.innerWidth;
	document.getElementById('canvas').style.height = windows.innerHeight;

	var imgs = document.getElementsByTagName('img');
	for (var i = 0; i < imgs.length; i++) {
		var img = imgs[i];
		console.log(img.parentElement);
		img.parentElement.style.height = 1024 + "px";
		img.parentElement.style.width = window.innerWidth / window.innerHeight * 1024 + "px";
	}
}

resizeImages();

function loop() {
	
	window.requestAnimationFrame(loop);
}

window.requestAnimationFrame(loop);