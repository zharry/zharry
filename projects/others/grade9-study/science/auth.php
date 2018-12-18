<?php

$mysql_creds = array(
    'host' => getenv('MYSQL_HOST'),
    'user' => getenv('MYSQL_USER_PROJECT'),
    'pass' => getenv('MYSQL_PASS_PROJECT')
);

session_start();

function killConnection(){
	echo '<!--email_off-->';
	echo 'You do not have permission to view this page. If you just registered, you have to wait until you get processed. Typically everyone in science class would be able to access. If you would like access and is not in the science class, please send a email of description to <a href="mailto: grade9study@gmail.com">grade9study@gmail.com</a>';
	echo '<!--/email_off-->';
	die();
}

function requireView($req) {
	$reqv = "v$req";
	$reqa = "a$req";
	$found = false;
	if ($_SESSION["permission"] == null) {
		die();
	}
	foreach($_SESSION["permission"] as $permission) {
		if ($permission === $reqv || $permission === $reqa || $permission === 'a*') {
			$found = true;
		}
	}
	if (!$found) {
		killConnection();
	}
}

function requireOPAdmin() {
	$found = false;
	foreach($_SESSION["permission"] as $permission) {
		if ($permission === 'a*') {
			$found = true;
		}
	}
	if (!$found) {
		killConnection();
	}
}

function requireAnyAdmin() {
	$found = false;
	foreach($_SESSION["permission"] as $permission) {
		if (substr($permission, 0, 1) === 'a') {
			$found = true;
		}
	}
	if (!$found) {
		killConnection();
	}
}

function requireAdmin($subject) {
	$req = "a$subject";
	$found = false;
	foreach($_SESSION["permission"] as $permission) {
		if ($permission === $req || $permission === 'a*') {
			$found = true;
		}
	}
	if (!$found) {
		killConnection();
	}
}

if($_POST != NULL){
	$token = base64_decode($_POST['t']);
	if($token != null){
		$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
		$sql = mysqli_prepare($connection, "SELECT * FROM USER_TOKEN WHERE TOKEN = ?");
		mysqli_stmt_bind_param($sql, 's', $token);
		mysqli_stmt_execute($sql);
		mysqli_stmt_bind_result($sql, $token, $username);
		if(!mysqli_stmt_fetch($sql)){
			echo "invtok";
			die();
		}
		$_SESSION['username'] = $username;
		echo 'successful';
		die();
	}
	$user = $_POST['u'];
	$pass = $_POST['p'];
	$first = $_POST['f'];
	$last = $_POST['l'];
	$email = $_POST['e'];
	if($user != null && $pass != null && $first != null && $last != null && $email != null){
		$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
		$sql = mysqli_prepare($connection, "SELECT * FROM USERS WHERE USERNAME = ?");
		mysqli_stmt_bind_param($sql, 's', $user);
		mysqli_stmt_execute($sql);
		mysqli_stmt_bind_result($sql, $username, $qfirst, $qlast, $qemail, $password, $perm);
		if(mysqli_stmt_fetch($sql)){
			echo "Username is already taken";
			die();
		}
		mysqli_stmt_close($sql);
		$sql = mysqli_prepare($connection, "SELECT * FROM USERS WHERE EMAIL = ?");
		mysqli_stmt_bind_param($sql, 's', $email);
		mysqli_stmt_execute($sql);
		mysqli_stmt_bind_result($sql, $username, $qfirst, $qlast, $qemail, $password, $perm);
		if(mysqli_stmt_fetch($sql)){
			echo "Email already exists";
			die();
		}
		if(strlen($user) < 2){
			echo "Username too short (2 characters minimum)";
			die();
		}
		if(strlen($pass) < 6){
			echo "Password too short (6 character minimum)";
			die();
		}
		if(strlen($first) == 0){
			echo "First name is empty";
			die();
		}
		if(strlen($last) == 0){
			echo "Last name is empty";
			die();
		}
		mysqli_stmt_close($sql);
		$hash = crypt($pass);
		$sql = mysqli_prepare($connection, "INSERT INTO USERS (USERNAME, FIRST, LAST, EMAIL, PASSWORD, PERM) VALUES (?, ?, ?, ?, ?, '')");
		mysqli_stmt_bind_param($sql, 'sssss', $user, $first, $last, $email, $hash);
		if(mysqli_stmt_execute($sql)){
			$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';
			$postString = '{
				"key": "jNSNBJQCdBs7XnZK0hbwTw",
				"message": {
				    "text": "New registration at the grade9-study science website!\nUsername: ' . $user . '\nName: ' . $first . ' ' . $last . '\nEmail: ' . $email . '",
				    "subject": "[Grade9Study][Science] New Registration",
				    "from_email": "noreply@grade9-study.tk",
				    "from_name": "noreply",
				    "to": [
					{
					    "email": "jackyliao2008@gmail.com",
					    "name": "Jacky Liao"
					},
				        {
				            "email": "lolzballs.mc@gmail.com",
				            "name": "Benjamin Cheng"
				        }
				    ]
				},
				"async": false
			}';
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $uri);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
			curl_exec($ch);

			echo 'success';
		}
		else{
			echo 'Registration Failed';
		}
		mysqli_stmt_close($sql);
		die();
	}
	$check = $_POST['c'];
	if($user != null && $pass != null && $check != null){
		$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
		$sql = mysqli_prepare($connection, "SELECT * FROM USERS WHERE USERNAME = ?");
		mysqli_stmt_bind_param($sql, 's', $user);
		mysqli_stmt_execute($sql);
		mysqli_stmt_bind_result($sql, $username, $first, $last, $email, $password, $perm);
		if(!mysqli_stmt_fetch($sql)){
			echo 'Invalid Username/Password';
			die();
		}
		mysqli_stmt_close($sql);
		if($password != crypt($pass, $password)){
			echo 'Invalid Username/Password';
			die();
		}
		$_SESSION['username'] = $username;
		echo 's';
		if($check == "true"){
			$token = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
			$sql = mysqli_prepare($connection, "INSERT INTO USER_TOKEN (TOKEN, USERNAME) VALUES (?, ?)");
			mysqli_stmt_bind_param($sql, 'ss', $token, $user);
			mysqli_stmt_execute($sql);
			mysqli_stmt_close($sql);
			echo base64_encode($token);
		}
		die();
	}
}
if($_SESSION != NULL && $_SESSION['username'] != null){
	$user = $_SESSION['username'];
	$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
	$sql = mysqli_prepare($connection, "SELECT * FROM USERS WHERE USERNAME = ?");
	mysqli_stmt_bind_param($sql, 's', $user);
	mysqli_stmt_execute($sql);
	mysqli_stmt_bind_result($sql, $username, $qfirst, $qlast, $qemail, $password, $perm);
	if(!mysqli_stmt_fetch($sql)){
		session_start();
		session_destroy();
	}
	else{
		$_SESSION["first"] = $qfirst;
		$_SESSION["last"] = $qlast;
		$_SESSION["email"] = $qemail;
		$_SESSION["perm"] = $perm;
		$_SESSION["permission"] = explode(",", $perm);
	}
}
if($_SESSION == NULL || $_SESSION['username'] == null){
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../res/bootstrap.min.css"/>
	<link rel="stylesheet" href="../res/awesome/font-awesome.min.css" />
<style>
.vertical-center {
	min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
	min-height: 100vh; /* These two lines are counted as one :-)       */

	display: flex;
	align-items: center;
}
#page{
	max-width: 400px;
	margin: auto;
}
.form{
	padding: 50px;
	padding-top: 10px;
	border: 1px solid #dddddd;
	border-top: 0px;
}
.form-group{
	margin-bottom: 10px;
}
.input-group{
	margin-bottom: 10px;
}
</style>
</head>
<body>
	<div class="container vertical-center">
		<div id="page">
			<ul class="nav nav-tabs">
				<li id="tabLog" class="active"><a href="javascript: showLogin(); void(0);">Login</a></li>
				<li id="tabReg"><a href="javascript: showRegister(); void(0);">Register</a></li>
			</ul>
			<form class="form" id="login" onsubmit="login(); return false;">
				<h2>Sign In</h2>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
					<input class="form-control" id="logUser" placeholder="Username" required autofocus/>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
					<input class="form-control" id="logPass" type="password" placeholder="Password" required/>
				</div>
				<div class="col-md-6">
					<div class="checkbox">
						<label>
							<input id="stay" type="checkbox"/>Stay signed in
						</label>
					</div>
				</div>
				<div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
					<span class="pull-right"><a href="#" id="forgotPasswordLink">Forgot Password?</a></span>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button><br/>
				<div class="alert alert-warning" role="alert" style="font-size: 12px; margin-bottom: 0px;">
					In our best efforts to prevent miscellaneous access to our classroom textbook,
					homework and assignments, we ask that you create an account and login. Thanks.<br/>
				</div>
			</form>
			<form class="form" id="register" style="display: none;" onsubmit="register(); return false;">
				<h2>Register</h2>
				<div id="dregUser" class="input-group">
					<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
					<input class="form-control" id="regUser" placeholder="Username" required autofocus/>
				</div>
				<div id="demail" class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					<input type="email" class="form-control" id="email" placeholder="Email" required autofocus/>
				</div>
				<div class="input-group">		
					<input class="half form-control" type="text" id="first" placeholder="First Name" style="width: 50%" required/>
					<input class="half form-control" type="text" id="last" placeholder="Last Name" style="width: 50%" required/>
				</div>
				<div id="dregPass" class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
					<input class="form-control" id="regPass" type="password" placeholder="Password" required/>
				</div>
				<div id="dconfirm" class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
					<input class="form-control" id="confirm" type="password" placeholder="Confirm Password" required/>
				</div>
				<div style="height: 10px"></div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
				<a href="#" id="ppBtn">Privacy Policy</a><a style="float: right;" href="#" id="tosBtn">Terms of Service</a>
			</form>
		</div>
	</div>

	<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.75);" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="forgotPasswordLabel">Forgot Password?</h4>
				</div>
				<div class="modal-body">
					Enter your email address and we'll reset your password
					<form id="rPassword" onsubmit="forgot(); return false;">
						<div id="remaildiv" class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
							<input type="email" class="form-control" id="remail" placeholder="Email" required autofocus/>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" form="rPassword">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="privacyPolicy" tabindex="-1" role="dialog" aria-labelledby="privacyPolicyLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.75);" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="privacyPolicyLabel">Privacy Policy</h4>
				</div>
				<div class="modal-body">
					<?php
						echo file_get_contents('pp.php');
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="termsOfService" tabindex="-1" role="dialog" aria-labelledby="termsOfServiceLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.75);" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="termsOfServiceLabel">Terms of Services</h4>
				</div>
				<div class="modal-body">
					<?php
						echo file_get_contents('tos.php');
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<script src="../res/jquery-1.9.1.min.js"></script>
	<script src="../res/bootstrap.min.js"></script>
	<script>
		document.getElementById("forgotPasswordLink").addEventListener('click', function(e) {
			e.preventDefault();
			$('#forgotPassword').modal();
		});

		document.getElementById("ppBtn").addEventListener('click', function(e) {
			e.preventDefault();
			$('#privacyPolicy').modal();
		});

		document.getElementById("tosBtn").addEventListener('click', function(e) {
			e.preventDefault();
			$('#termsOfService').modal();
		});

		var item = localStorage.getItem("loginToken");
		if(item != null){
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					if(ajax.responseText == "successful"){
						location.reload();
					}
					else{
						localStorage.removeItem("loginToken");
					}
				}
			}
			ajax.open("POST", "", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("t=" + item);
		}
		function showLogin(){
			document.getElementById("login").style.display = "block";
			document.getElementById("register").style.display = "none";
			document.getElementById("tabReg").className = "";
			document.getElementById("tabLog").className = "active";
		}
		function showRegister(){
			document.getElementById("login").style.display = "none";
			document.getElementById("register").style.display = "block";
			document.getElementById("tabReg").className = "active";
			document.getElementById("tabLog").className = "";
		}
		function forgotPassword(){
			document.getElementById("login").style.display = "none";
			document.getElementById("register").style.display = "block";
			document.getElementById("tabReg").className = "active";
			document.getElementById("tabLog").className = "";
		}
		function login(){
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					if(ajax.responseText.indexOf("s") == 0){
						var token = ajax.responseText.substring(1);
						if(token.length > 0){
							localStorage.setItem("loginToken", token);
						}
						location.reload();
					}
					else{
						alert(ajax.responseText);
					}
				}
			}
			ajax.open("POST", ".", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("u=" + encodeURIComponent(document.getElementById("logUser").value) + "&p=" + encodeURIComponent(document.getElementById("logPass").value) + "&c=" + document.getElementById("stay").checked);
		}
		function register(){
			if(document.getElementById("regPass").value != document.getElementById("confirm").value){
				alert("Passwords doesn't match");
				return;
			}
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					if(ajax.responseText == "success"){
						alert("Successfully Registered");
						location.reload();
					}
					else{
						alert(ajax.responseText);
					}
				}
			}
			ajax.open("POST", ".", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("u=" + encodeURIComponent(document.getElementById("regUser").value) + "&e=" + encodeURIComponent(document.getElementById("email").value) + "&f=" + encodeURIComponent(document.getElementById("first").value) + "&l=" + encodeURIComponent(document.getElementById("last").value) + "&p=" + encodeURIComponent(document.getElementById("regPass").value));
		}
		function forgot(){
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					if(ajax.responseText == "success"){
						alert("A password reset email has been sent. Please check your email");
						location.reload();
					}
					else{
						alert(ajax.responseText);
					}
				}
			}
			ajax.open("POST", "../science/account/recover.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("remail=" + encodeURIComponent(document.getElementById("remail").value));
		}
	</script>
</body>
</html>

<?php
	die();
}
/*if (isset($_SERVER['HTTP_CF_CONNECTING_IP']))
	$ClientIP = $_SERVER['HTTP_CF_CONNECTING_IP'];
else
	$ClientIP = $_SERVER['HTTP_X_CLIENT_IP'];
$hostname = gethostbyaddr($ClientIP);
date_default_timezone_set('America/Toronto');
$ClientTime = date('H:i:s, D, M d, Y');
$details = json_decode(file_get_contents("http://ipinfo.io/{$ClientIP}/json"));
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$iplog = $ClientIP;
$loclog = $details->city;
$ualog = $user_agent;
$conlog = $details->country;
$coordlog = $details->loc;
$isplog = $details->org;

$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
if ($connection) {
	$sql = mysqli_prepare($connection, "INSERT INTO LOG (TIME, IP, REVERSE_DNS, LOCATION, USERAGENT, COUNTRY, COORDS, ISP, PATH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$path = $_SERVER["SCRIPT_FILENAME"];
	$path = str_replace("/var/lib/openshift/54d942954382ec78cf000084/app-root/runtime/repo", "", $path);
	mysqli_stmt_bind_param($sql, 'sssssssss', $ClientTime, $iplog, $hostname, $loclog, $ualog, $conlog, $coordlog, $isplog, $path);
	mysqli_stmt_execute($sql);

	mysqli_close($connection);
}*/
?>
