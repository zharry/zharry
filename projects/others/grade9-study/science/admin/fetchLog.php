<?php
	require '../auth.php';
	requireOPAdmin();
?>
<script>
var autoScroll = true;
var autoRefresh = true;
function toggleOff() {
	document.getElementById("toggle").innerHTML = "<input type='button' value='Turn on Auto-Scroll' onclick='toggleOn()'>";
	autoScroll = false;
}
function toggleOn() {
	document.getElementById("toggle").innerHTML = "<input type='button' value='Turn off Auto-Scroll' onclick='toggleOff()'>";
	autoScroll = true;
}
function refreshOff() {
	document.getElementById("refresh").innerHTML = "<input type='button' value='Turn on Auto-Refresh' onclick='refreshOn()'>";
	autoRefresh = false;
}
function refreshOn() {
	document.getElementById("refresh").innerHTML = "<input type='button' value='Turn off Auto-Refresh' onclick='refreshOff()'>";
	autoRefresh = true;
}
	function recheckScript() {
		setInterval(function() {
		if (autoRefresh) {
				var xmlhttp;
				if (window.XMLHttpRequest) 	{
					xmlhttp=new XMLHttpRequest();
				} else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("logChecker").innerHTML = xmlhttp.responseText;
						if (document.getElementById("log").innerHTML != document.getElementById("logChecker").innerHTML) {
							document.getElementById("log").innerHTML = xmlhttp.responseText;
						}
						if (autoScroll) {
							window.scrollTo(0,document.body.scrollHeight);
						}
					}
				}
			xmlhttp.open("GET","log.php",true);
			xmlhttp.send();
		}
		}, 1000);
	}
</script>
<style>
div:hover {
	cursor: pointer;
}
.open {
	background-color: green;
}
.closed {
	background-color: orange;
}
</style>
<div id="logTitle" style="background-color: rgba(80,80,80,0.85); top: 0; left: 0; width: 40%; height: 1em; position: fixed;">Logged IP's:</div>
<div id="logDetailsTitle" style="background-color: rgba(80,80,80,0.85); top: 0; left: 40%; float: left; width: 60%; height: 1em; position: fixed;">Details:</div>
<div style="visibility: hidden"><hr/></div>
<div id="log" style="float: left; width: 40%"></div>
<div id="logDetails" style="left: 40%; top: 1em; position: fixed; width: 60%;"></div>
<div id="logChecker" style="display: none;"></div>
<br/>
<div style="float: left; width: 100%">
<hr/>
<div id="toggle"><input type='button' value='Turn off Auto-Scroll' onclick='toggleOff()'></div>
<div id="refresh"><input type='button' value='Turn off Auto-Refresh' onclick='refreshOff()'></div>
<br/>
</div>
<script>
	recheckScript();
</script>
