<?php

    /* Code from /etc/other-creds/creds.php */
    
    // SERVER INFORMATION FOR PROJECT:OPENACCESS
    $project_oa_se = array(
            "host" => "SE-IP",
            "port" => "SE-PORT",
            "hub" => "SE-HUB",
            "pass" => "SE-PASS",
            "pass_keyspace" => "abcdefhjkmnpqrstuwxyz2345678",
            "user_keyspace" => "0123456789",
            "openVPNConfig" => "Config.ovpn"
    );
    // LOGIN INFORMATION FOR PROJECT:OPENACCESS
    $project_oa_ss = array(
            "port" => "SS-PORT",
            "pass" => "SS-PASS",
            "type" => "SS-ENCRYPTION"
    );
    // ACCESS CODE GENERATION FOR PROJECT:OPENACCESS
    $curtime = (date("H") * 6) + floor(date("i") /10);
    $curdate = date("d") * date("m");
    $precalc = ($curtime/$curdate) * 100;
    $format = number_format($precalc, 3) * 1000;
    $padded = sprintf("%05d", $format);
    $digits = str_split($padded);
    $one = $digits[0] + 10;
    $two = $digits[1] + 10;
    $three = $digits[2] + 10;
    $four = $digits[3] + 10;
    $five = $digits[4] + 10;
    $code = array(
            "general" => chr(65 + $one + 4)."".chr(65 + $two - 2)."".chr(65 + $three + 5)."".chr(65 + $four + 1)."".chr(65 + $five - 6),
            "full" => chr(65 + $one - 2)."".chr(65 + $two + 3)."".chr(65 + $three + 2)."".chr(65 + $four + 5)."".chr(65 + $five - 1),
            "affiliate" => chr(65 + $one + 5)."".chr(65 + $two - 5)."".chr(65 + $three - 6)."".chr(65 + $four - 6)."".chr(65 + $five),
            "school" => "SCHPD",
            "early" => "EARLY"
    );
	
	/* 
	Note on Permission Grades
		- Tiered, Higher Tiers include all from below

		Admin
			- Generate Full Access Codes
			- Generate Affiliate Access Codes
		Affiliate
			- Generate Access Code (Softether, L2TP, OpenVPN)
		Full Access (Full)
			- Shadowsocks Configuration
		General Access (General)
			- Softether, L2TP, OpenVPN Configuration
		Registered
			- Access to Website
	*/

	session_start();
	require_once('includes/connection.php');
	require_once('includes/auth.php');
	//require_once('includes/creds.php');
	
	// Re-fetch data in case anything changed
	$stmt = mysqli_prepare($conn, "SELECT id, username, email, first, last, softetheruser, softetherpass, perms FROM users WHERE username = ?");
	mysqli_stmt_bind_param($stmt, "s", $_SESSION["openaccess_username"]);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	if (mysqli_stmt_num_rows($stmt) == 1) {
		mysqli_stmt_bind_result($stmt, $id, $user, $email, $first, $last, $seuser, $sepass, $perms);
		while (mysqli_stmt_fetch($stmt)) {
			$_SESSION["openaccess_userID"] = $id;
			$_SESSION["openaccess_username"] = $user;
			$_SESSION["openaccess_email"] = $email;
			$_SESSION["openaccess_firstName"] = $first;
			$_SESSION["openaccess_lastName"] = $last;
			$_SESSION["openaccess_softetherUser"] = $seuser;
			$_SESSION["openaccess_softetherPass"] = $sepass;
			$_SESSION["openaccess_perms"] = $perms;
		}
	}
	
	// Check to see if the user has updated access code
	function rndString($keys, $length) {
		$pass = array(); 
		$alphaLength = strlen($keys) - 1;
		for ($i = 0; $i < $length; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $keys[$n];
		}
		return implode($pass);
		// Code from https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
	}
	if (!empty($_POST)) {
		$userCode = $_POST["code"];
		$done = False;
		$newPerm = $_SESSION["openaccess_perms"];
		if ($userCode == $code["affiliate"]) {
			$newPerm = "affiliate";
			$done = True;
		} else if ($userCode == $code["full"]) {
			$newPerm = "full";
			$done = True;
		} else if ($userCode == $code["general"]) {
			$newPerm = "general";
			$done = True;
		} else if ($userCode == $code["school"]) {
			$newPerm = "full";
			$done = True;
		} else if ($userCode == $code["early"]) {
			$newPerm = "full";
			$done = True;
		}
		// Code Matches
		if ($done) {
			$username = $_SESSION["openaccess_username"];
			$status[] = "New Permissions: ".$newPerm.".<br/>";
			// Does the user already have a Softether Account
			if (is_null($_SESSION["openaccess_softetherUser"]) && is_null($_SESSION["openaccess_softetherPass"])) {
				
				// Generate and assign a user and password to new account
				$seUsername = "user-".$_SESSION["openaccess_userID"]."".sprintf("%05d", intval(rndString($project_oa_se["user_keyspace"], 5)));
				$sePassword = rndString($project_oa_se["pass_keyspace"], 8);
				$_SESSION["openaccess_softetherUser"] = $seUsername;
				$_SESSION["openaccess_softetherPass"] = $sePassword;
				
				// Create SE Internal Account
				// $createUserOutput = shell_exec("/etc/other-creds/vpncmd/vpncmd ".$project_oa_se["host"].":".$project_oa_se["port"]." /SERVER /HUB:".$project_oa_se["hub"]." /PASSWORD:".$project_oa_se["pass"]." /CMD UserCreate ".$seUsername." /GROUP:none /REALNAME:none /NOTE:none");
				// $changePassOutput = shell_exec("/etc/other-creds/vpncmd/vpncmd ".$project_oa_se["host"].":".$project_oa_se["port"]." /SERVER /HUB:".$project_oa_se["hub"]." /PASSWORD:".$project_oa_se["pass"]." /CMD UserPassWord ".$seUsername." /PASSWORD:".$sePassword);
		
				// Update DB about changes
				$stmt = mysqli_prepare($conn, "UPDATE users SET softetheruser = ?, softetherpass = ? WHERE username = ?");
				mysqli_stmt_bind_param($stmt, "sss", $seUsername , $sePassword, $username);
				mysqli_stmt_execute($stmt);
				if (mysqli_stmt_affected_rows($stmt) != 1)
					$error[] = "Unknown error occured, please contact Harry.";
				else {
					$status[] = "New VPN User created!<br/>";
				}
			} else {
				$status[] = "Account permissions changed from ".$_SESSION["openaccess_perms"]." to ".$newPerm."<br/>";
			}
			// Update DB about permission
			$stmt = mysqli_prepare($conn, "UPDATE users SET perms = ? WHERE username = ?");
			mysqli_stmt_bind_param($stmt, "ss", $newPerm, $username);
			mysqli_stmt_execute($stmt);
			$_SESSION["openaccess_perms"] = $newPerm;
		} else {
			$error[] = "Incorrect Code!<br/>";
		}
	}
	
include('includes/header.php');
?>

<?php
	// Displays any Errors
	if(isset($error)){
	  foreach($error as $e){
		?>
		<div class="alert alert-danger">
			<strong>Error!</strong> <?=$e?>
		</div>
		<?php
	  }
	}	
	// Displays any messages
	if(isset($status)){
	  foreach($status as $stat){
		?>
		<div class="alert alert-success">
			<strong>Success!</strong> <?=$stat?>
		</div>
		<?php
	  }
	}
?>

<hr/>
Hello, <?=$_SESSION["openaccess_firstName"]?> <?=$_SESSION["openaccess_lastName"]?>
<hr/>
UserID: <?=$_SESSION["openaccess_userID"]?><br/>
Username: <?=$_SESSION["openaccess_username"]?><br/>
Email: <?=$_SESSION["openaccess_email"]?><br/>
Perms Rank: <?=$_SESSION["openaccess_perms"]?><br/>

<?php 
if ($_SESSION["openaccess_perms"] == "admin") {
?>
<hr/>
<h1>Admin</h1>
<div class="alert alert-danger">
  <strong>Error!</strong> If you see this please direct message Harry immediately.
</div>
<?php 
	echo "Affiliate Code: ".$code["affiliate"]."<br/>";
	echo "Full Access Code: ".$code["full"]."<br/>";
	echo "School Exclusive Access Code: ".$code["school"]."<br/>";
	echo "Early Access Code: ".$code["early"]."<br/>";
}
if ($_SESSION["openaccess_perms"] == "affiliate" || $_SESSION["openaccess_perms"] == "admin") {
?>
<hr/>
<h1>Affiliate</h1>
<div class="alert alert-info">
  As an affiliate, you are allowed to give access codes to your friends!
</div>
<?php 
	echo "General Access Code: ".$code["general"]."<br/>";
}
if ($_SESSION["openaccess_perms"] == "full" || $_SESSION["openaccess_perms"] == "affiliate" || $_SESSION["openaccess_perms"] == "admin") {
?>
<hr/>
<h1>Shadowsocks Configuration</h1>
<div class="alert alert-warning">
  Please note that the Shadowsocks and Softether software are different, and thus have different login information!
</div>
<strong>See the <a href="usage.php?active=usage">Usage</a> tab for how to connect!</strong>
<br/>
<?php 
	echo "Server IP: vpn.zharry.tk<br/>";
	echo "Server Port: ".$project_oa_ss["port"]."<br/>";
	echo "Password: ".$project_oa_ss["pass"]."<br/>";
	echo "Encryption Method: ".$project_oa_ss["type"]."<br/>";
}
if ($_SESSION["openaccess_perms"] == "general" || $_SESSION["openaccess_perms"] == "full" || $_SESSION["openaccess_perms"] == "affiliate" || $_SESSION["openaccess_perms"] == "admin") {
?>
<hr/>
<h1>Softether Configuration</h1>
<div class="alert alert-warning">
  <strong>Alert!</strong> VPN accounts are not connected to user accounts on the site! They have a server-side generated Username and Password!
</div>
<strong>See the <a href="usage.php?active=usage">Usage</a> tab for how to connect!</strong>
<br/>
<?php 
	echo "Username: ".$_SESSION["openaccess_softetherUser"]."<br/>";
	echo "Password: ".$_SESSION["openaccess_softetherPass"]."<br/>";
	//echo "OpenVPN Configuration: <a href='".$project_oa_se["openVPNConfig"]."' download>Download link</a><br/>";
}
?>

<hr/>
<h1>Account Activation</h1>
<form method="post" action="">
		<input type="text" name="code" id="code" placeholder="Access Code">
		<input type="submit" name="submit" value="<?php if ($_SESSION["openaccess_perms"] != "registered") { echo "Update Access Code"; } else { echo "Activate Account"; }?>">
</form>
<hr/>
<?php
include('includes/footer.php');
?>