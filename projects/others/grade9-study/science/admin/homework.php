<?php

require_once('/etc/mysql-creds/mysql-creds.php');

require "../auth.php";
requireAdmin("SNC1D6-02");

if($_POST != null){
	if($_POST['rhw'] == null){
		die();
	}
	if($_POST['rhw'] == 'true')
		$table = 'HOMEWORK';
	else
		$table = 'EVENTS';
	$user = $mysql_creds["user"]; 
	$pass = $mysql_creds["pass"];
	$host = $mysql_creds["host"];
	$dbname = "project_grade9-study";
	$connection = mysqli_connect($host,$user,$pass,$dbname);
	if (!$connection) {
		die();
	}
	if($_POST['ta'] != null){
		$query = mysqli_prepare($connection, "REPLACE INTO {$table} (`DUE`, `HW`) VALUES (?, ?);");
		mysqli_stmt_bind_param($query, 'ss', $_POST['date'], $_POST['ta']);
		mysqli_stmt_execute($query);
	}
	else if($_POST['date'] != null && $_POST['delete'] == 'true'){
		$query = mysqli_prepare($connection, "DELETE FROM {$table} WHERE DUE = ?;");
		mysqli_stmt_bind_param($query, 's', $_POST['date']);
		mysqli_stmt_execute($query);
	}
	
	$sql = "SELECT DUE, HW FROM {$table} ORDER BY DUE DESC;";
	$result = $connection->query($sql);
	$rows = mysqli_num_rows($result);
	if($rows <= 0){
		$rows = 0;
	}
	echo "<div align=\"right\">{$rows} rows</div>";
	if ($rows == 0)
		die();
	while($row = $result->fetch_assoc()) {
		$due = $row['DUE'];
		$hw = $row['HW'];
		$hwm = preg_replace('/\\$\\$_\\((\\d+)\\)_\\$\\$/i', '<a href="javascript: void(0);">$1</a>', $hw);
		$hwr = preg_replace('/\\$\\$_\\((\\d+)\\)_\\$\\$/i', '<a href="PageNumber: $1" class="pagenumber">$1</a>', $hw);
		echo "{$due}<pre style=\"white-space: pre-wrap;\">{$hwm}</pre><div><div style=\"float: left;\"><a href=\"javascript: setSelState(" . $_POST['rhw'] . "); var txt= $(&quot;#ta&quot;).code(" . htmlentities(json_encode($hwr)) . "); document.getElementById(&quot;date&quot;).value=&quot;{$due}&quot;; void(0);\">Edit</a></div><div style=\"float: right;\"><a href='javascript: del(\"{$due}\"" . ", " . $_POST['rhw'] . "); void(0);'>Delete</a></div><div style=\"width: 100%; height: 1em;\"></div></div><hr/>";
	}
	die();
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Homework Editor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../../res/jquery-1.9.1.min.js"></script> 
	<link rel="stylesheet" href="../../res/bootstrap.min.css" />
	<script type="text/javascript" src="../../res/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../res/awesome/font-awesome.min.css" />

	<link href="../../res/summernote.css" rel="stylesheet">
	<script src="../../res/summernote.min.js"></script>
	<script src="../../res/editpagenote.js"></script>
<style>
@media (min-width: 992px) {
	.scrollable {
		padding-left: 33.3333333333%;
		width: 100%;
	}
}
@media (max-width: 992px) {
    .affix {
        position: static;
    }
}
*{
	font-family: monospace;
}
pre{
	word-break: break-word;
}
body{
	margin: 0px;
}
#edit{
	z-index: 10;
}
#date{
	height: 24px;
}
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div data-spy="affix" id="edit" class="col-md-4 affix-top">
				<h2>Create New</h2>
				Now: <?php date_default_timezone_set('America/Toronto'); echo date("Y-m-d H:i:s", time()) . '<br/><br/>';?>
				<form id="add" method="post" action="">
					<input id="date" type="date" name="date"><br/><br/>
					<div id="ta">
					</div>
					<label>
					<input id="rhw" type="radio" name="sel" value="homework" checked>Homework<br/>
					</label><br/>
					<label>
					<input id="Nrhw" type="radio" name="sel" value="event">Upcoming Event<br/>
					</label><br/>
					<input type="submit" value="Post">
				</form>
			</div>
			<div id="le" class="col-md-8 scrollable">
				<div class="row">
					<div class="col-md-6">
						<h2>Homework</h2>
						<div id="list"></div>
					</div>
					<div class="col-md-6">
						<h2>Events</h2>
						<div id="event"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	function setSelState(hw){
		document.getElementById("rhw").checked = hw;
		document.getElementById("Nrhw").checked = !hw;
	}
	function ajax(){
		if (window.XMLHttpRequest){
			return new XMLHttpRequest();
		}
		else{
			return ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	var reqhw = ajax();
	reqhw.open("POST", "homework.php", true);
	reqhw.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	reqhw.send("rhw=true");
	reqhw.onreadystatechange = function(){
		if (reqhw.readyState == 4 && reqhw.status == 200){
			document.getElementById("list").innerHTML = reqhw.responseText;
		}
	}
	var reqev = ajax();
	reqev.open("POST", "homework.php", true);
	reqev.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	reqev.send("rhw=false");
	reqev.onreadystatechange = function(){
		if (reqev.readyState == 4 && reqev.status == 200){
			document.getElementById("event").innerHTML = reqev.responseText;
		}
	}
	document.getElementById("add").onsubmit = function(){
		var date = document.getElementById("date");
		var ta = $("#ta");
		var d = date.value;
		var t = ta.code();

		t = t.replace(/<a href="PageNumber: (\d+)" class="pagenumber">(\d+)<\/a>/g, "$$$$_($2)_$$$$");
		if(d == "" || t == ""){
			alert("Inputs cannot be empty");
			return false;
		}
		date.disabled = true;
		var xmlhttp = ajax();
		xmlhttp.open("POST", "homework.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		d = encodeURIComponent(d);
		t = encodeURIComponent(t);
		var rhwChecked = document.getElementById("rhw").checked;
		xmlhttp.send("date=" + d + "&ta=" + t + "&rhw=" + rhwChecked);
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				date.value = "";
				ta.code("");
				date.disabled = false;
				ta.disabled = false;
				document.getElementById(rhwChecked ? "list" : "event").innerHTML = xmlhttp.responseText;
			}
		}
		return false;
	}
	function del(due, rhw){
		if(!confirm("Are you sure you want to delete the " + (rhw ? "homework" : "event") + " at " + due + "?")){
			return;
		}
		var rhwChecked = document.getElementById("rhw").checked;
		var xmlhttp = ajax();
		xmlhttp.open("POST", "homework.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("date=" + due + "&rhw=" + rhw + "&delete=true");
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById(rhw ? "list" : "event").innerHTML = xmlhttp.responseText;
			}
		}
	}
	$(document).ready(function() {
		$('#ta').summernote({
			height: 300,
			focus: true,
			toolbar: [
				['style', ['bold', 'italic', 'underline']],
				['font', ['strikethrough']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['insert', ['picture', 'link']],
				['textbookPage', ['page']],
			]
		});
	});
	</script>
</div>
</body>
</html>

