resetText = document.getElementById("body").innerHTML;

//Menu Scripts
function showMenu() {
	document.getElementById("taskbarText").style.visibility = "visible";
	document.getElementById("taskbarText").style.opacity = "1";
	document.getElementById("taskbar").style.borderRight = "none";
}
function hideMenu() {
	document.getElementById("taskbarText").style.visibility = "hidden";
	document.getElementById("taskbarText").style.opacity = "0";
	document.getElementById("taskbar").style.borderRight = "1px solid grey";
}

//Tab Scripts
function chat() {
	var ch = document.getElementById("chat");
	if(ch.style.display == "block"){
		ch.style.display = "none";
	} else{
		ch.style.display = "block";
	}
	//get("chat.php");
	//hideMenu();
	//document.getElementById("body").style.overflowY = "hidden";
}
function homework() {
	get("homework.php");
	hideMenu();
	document.getElementById("body").style.overflowY = "scroll";
}
function home() {
	document.getElementById("contentPage").style.display = "block";
	document.getElementById("contentPage").style.height = "auto";
	hideMenu();
	document.getElementById("body").innerHTML = resetText;
	document.getElementById("body").style.overflowY = "scroll";
	init();
}
function search() {
	get("search.php");
	hideMenu();
	document.getElementById("body").style.overflowY = "scroll";
}
function ptable() {
	get("ptable.php");
	hideMenu();
	document.getElementById("body").style.overflowY = "hidden";
}
function get(page) {
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("body").innerHTML = resetText + "" + xmlhttp.responseText;
			document.getElementById("contentPage").style.display = "none";
			document.getElementById("contentPage").style.height = "0";
		}
	}
	xmlhttp.open("POST","get/" + page + "",true);
	xmlhttp.send();
}
function definitions(q) {
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("results").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","get/definitions.php?query=" + q,true);
	xmlhttp.send();
}

//Textbook Scripts
page = 0;
function updatePage() {
	document.getElementById("content").setAttribute('data', "/science/0.svgz");
	//document.getElementById("content2").setAttribute('data', "/science/assets/svg/" + (page + 1) + ".svgz");
	document.getElementById("pagen").value = page;
	localStorage.setItem("page", page);
}
function gotoPage(n){
	var newNum = Number(n);
	if(!isNaN(newNum) && newNum <= 526 && newNum >= 0 ){
		page = newNum;
		updatePage();
	}
	else{
		document.getElementById("pagen").value = page;
	}
}
function incPage() {
	gotoPage(page + 1);
}
function decPage() {
	gotoPage(page - 1);
}
function init(){
	var val = localStorage.getItem("page");
	if(val == undefined){
		val = 0;
	}
	gotoPage(val);
}
function inputListener(e){
	gotoPage(document.getElementById("pagen").value);
}
function openPage(p) {
	localStorage.setItem("page", p);
	home();
}


document.addEventListener("DOMContentLoaded", function(event) { 
	  //init();
});
