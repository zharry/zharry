function showMenu() {
	document.getElementById("menuText").style.visibility = "visible";
	document.getElementById("menuText").style.opacity = "1";
}
function hideMenu() {
	document.getElementById("menuText").style.visibility = "hidden";
	document.getElementById("menuText").style.opacity = "0";
}
function init() {
    setInterval(
		function(){ 
			var width = window.innerWidth; 
			var height = window.innerHeight; 
			var elemheight = document.getElementById("static").scrollHeight;
			if (width <= 1024) {
				document.getElementById("styles").innerHTML = ".content { margin: 15px; } .image { width: 75%; height: auto; }";
			} else {
				document.getElementById("styles").innerHTML = ".content { margin-top: 15px; margin-bottom: 15px; margin-left: 100px; margin-right: 100px; } .image { width: 50%; height: auto; }";
			}
			
			if (width <= 512) {
				document.getElementById("styles").innerHTML = ".content { margin: 15px; } .image { width: 100%; height: auto; }";
			}
			if (elemheight >= height) {
				document.getElementById("static").setAttribute("style", "");
			} else {
				document.getElementById("static").setAttribute("style", "position: relative; top: calc(50% - " + (elemheight / 2) + "px - 15px);");
			}
		}, 100);
}

//