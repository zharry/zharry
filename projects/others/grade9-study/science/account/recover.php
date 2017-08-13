<?php

require_once('/etc/mysql-creds/mysql-creds.php');

	if($_POST != null && $_POST['remail'] != null){
		$email = $_POST['remail'];
		$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
		$sql = mysqli_prepare($connection, "SELECT * FROM USERS WHERE EMAIL = ?");
		mysqli_stmt_bind_param($sql, 's', $email);
		mysqli_stmt_execute($sql);
		mysqli_stmt_bind_result($sql, $username, $qfirst, $qlast, $qemail, $password, $perm);
		$users = array();
		while(mysqli_stmt_fetch($sql)){
			array_push($users, $username);
		}
		mysqli_stmt_close($sql);
		if(count($users) > 0){
			foreach($users as $usern){
				$url = 'https://api.sendgrid.com/';
				$user = 'grade9study';
				$pass = 'study#admin->123';

				$token = mcrypt_create_iv(64, MCRYPT_DEV_URANDOM);

				$link = "https://grade9-study.tk/science/account/recover.php?recToken=" . urlencode(base64_encode($token));

				$params = array(
					'api_user'  => $user,
					'api_key'   => $pass,
					'to'		=> $email,
					'subject'   => 'Password Reset',
					'html'	  	=> 'You have requested a password reset for your account on <a href="https://grade9-study.tk/">https://grade9-study.tk/</a><br/>If you did not request this, please ignore this email. <br/>Your username is: ' . $usern . '<br/>Reset Password: <a href="' . $link . '">' . $link . '</a>',
					'from'	  	=> 'noreply@grade9-study.tk',
				);


				$request =  $url.'api/mail.send.json';

				$session = curl_init($request);
				curl_setopt ($session, CURLOPT_POST, true);
				curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
				curl_setopt($session, CURLOPT_HEADER, false);
				curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
				curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($session);
				curl_close($session);

				print_r($response);
				$sql = mysqli_prepare($connection, "REPLACE INTO PASSWORD_RECOVER (USERNAME, TOKEN) VALUES (?, ?)");
				mysqli_stmt_bind_param($sql, 'ss', $usern, $token);
				mysqli_stmt_execute($sql);
				mysqli_stmt_close($sql);
			}
		}
		else{
			echo 'Email does not exist';
		}
		die();
	}
	else if($_POST != null && $_POST['rtoken'] != null && $_POST['rpasswd'] != null){
		$token = base64_decode($_POST['rtoken']);

		$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
		$sql = mysqli_prepare($connection, "SELECT * FROM PASSWORD_RECOVER WHERE TOKEN = ?");
		mysqli_stmt_bind_param($sql, 's', $token);
		mysqli_stmt_execute($sql);

		mysqli_stmt_bind_result($sql, $qusername, $qtoken);
		mysqli_stmt_fetch($sql);
		mysqli_stmt_close($sql);

		$sql = mysqli_prepare($connection, "DELETE FROM PASSWORD_RECOVER WHERE USERNAME = ?");
		mysqli_stmt_bind_param($sql, 's', $qusername);
		mysqli_stmt_execute($sql);
		mysqli_stmt_close($sql);

		$hash = crypt($_POST['rpasswd']);

		$sql = mysqli_prepare($connection, "UPDATE USERS SET PASSWORD = ? WHERE USERNAME = ?");
		mysqli_stmt_bind_param($sql, 'ss', $hash, $qusername);
		mysqli_stmt_execute($sql);
		mysqli_stmt_close($sql);

		die();
	}
	else if($_GET != null && $_GET['recToken'] != null){
		$token = base64_decode($_GET['recToken']);
		$connection = mysqli_connect($mysql_creds["host"], $mysql_creds["user"], $mysql_creds["pass"], "project_grade9-study");
		$sql = mysqli_prepare($connection, "SELECT * FROM PASSWORD_RECOVER WHERE TOKEN = ?");
		mysqli_stmt_bind_param($sql, 's', $token);
		mysqli_stmt_execute($sql);
		mysqli_stmt_bind_result($sql, $user, $qtoken);
		$users = array();
		if(mysqli_stmt_fetch($sql)){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Recover Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../res/bootstrap.min.css"/>
	<link rel="stylesheet" href="../../res/awesome/font-awesome.min.css" />
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
}
.input-group{
	margin-top: 5px;
	margin-bottom: 5px;
}
</style>
</head>
<body>
	<div class="container vertical-center">
		<div id="page">
			<form class="form" id="login" onsubmit="change(); return false;">
				<h2>Reset Password</h2>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
					<input class="form-control" id="pass1" type="password" placeholder="New Password" required autofocus/>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
					<input class="form-control" id="pass2" type="password" placeholder="Confirm Password" required/>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button><br/>
			</form>
		</div>
	</div>

	<script src="../../res/jquery-1.9.1.min.js"></script>
	<script src="../../res/bootstrap.min.js"></script>
	<script>
		function change(){
			var p1 = document.getElementById("pass1").value;
			var p2 = document.getElementById("pass2").value;
			if(p1 != p2){
				alert("Passwords do not match");
				return;
			}
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					if(ajax.reponseText == "success"){
						alert("Password changed successfully");
						location.reload();
					}
					else{
						alert(ajax.responseText);
					}
				}
			}
			ajax.open("POST", "../../science/account/recover.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("rtoken=" + encodeURIComponent("<?php echo base64_encode($token); ?>") + "&rpasswd=" + encodeURIComponent(p1));
		}
	</script>
</body>
</html>
<?php
		}
		else{
			echo 'Invalid recovery link';
		}
	}
?>
