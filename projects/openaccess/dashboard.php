<?php
	
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
	require_once('/etc/other-creds/creds.php');
	
	// Re-fetch data in case anything changed
	$stmt = mysqli_prepare($conn, "SELECT id, username, email, first, last, softetheruser, softetherpass, perms FROM users WHERE username = ?");
	mysqli_stmt_bind_param($stmt, "s", $_SESSION["username"]);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	if (mysqli_stmt_num_rows($stmt) == 1) {
		mysqli_stmt_bind_result($stmt, $id, $user, $email, $first, $last, $seuser, $sepass, $perms);
		while (mysqli_stmt_fetch($stmt)) {
			$_SESSION["userID"] = $id;
			$_SESSION["username"] = $user;
			$_SESSION["email"] = $email;
			$_SESSION["firstName"] = $first;
			$_SESSION["lastName"] = $last;
			$_SESSION["softetherUser"] = $seuser;
			$_SESSION["softetherPass"] = $sepass;
			$_SESSION["perms"] = $perms;
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
		$newPerm = $_SESSION["perms"];
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
			$username = $_SESSION["username"];
			echo "New Permissions: ".$newPerm.".<br/>";
			// Does the user already have a Softether Account
			if (is_null($_SESSION["softetherUser"]) && is_null($_SESSION["softetherPass"])) {
				$seUsername = "user-".$_SESSION["userID"]."".sprintf("%05d", intval(rndString($project_oa_se["user_keyspace"], 5)));
				$sePassword = rndString($project_oa_se["pass_keyspace"], 8);
				
				// Create SE Internal Account
				$createUserOutput = shell_exec("/etc/other-creds/vpncmd/vpncmd ".$project_oa_se["host"].":".$project_oa_se["port"]." /SERVER /HUB:".$project_oa_se["hub"]." /PASSWORD:".$project_oa_se["pass"]." /CMD UserCreate ".$seUsername." /GROUP:none /REALNAME:none /NOTE:none");
				$changePassOutput = shell_exec("/etc/other-creds/vpncmd/vpncmd ".$project_oa_se["host"].":".$project_oa_se["port"]." /SERVER /HUB:".$project_oa_se["hub"]." /PASSWORD:".$project_oa_se["pass"]." /CMD UserPassWord ".$seUsername." /PASSWORD:".$sePassword);
		
				// Update DB about changes
				$stmt = mysqli_prepare($conn, "UPDATE users SET softetheruser = ?, softetherpass = ? WHERE username = ?");
				mysqli_stmt_bind_param($stmt, "sss", $seUsername , $sePassword, $username);
				mysqli_stmt_execute($stmt);
				if (mysqli_stmt_affected_rows($stmt) != 1)
					$error[] = "Unknown error occured, please contact Harry.";
				else {
					echo "New VPN User created!<br/>";
					echo "Username: user-".$seUsername."<br/>";
					echo "Password: ".$sePassword."<br/>";
				}
			} else {
				echo "Account permissions changed from ".$_SESSION["perms"]." to ".$newPerm."<br/>";
			}
			// Update DB about permission
			$stmt = mysqli_prepare($conn, "UPDATE users SET perms = ? WHERE username = ?");
			mysqli_stmt_bind_param($stmt, "ss", $newPerm, $username);
			mysqli_stmt_execute($stmt);
			if (mysqli_stmt_affected_rows($stmt) != 1)
				$error[] = "Unknown error occured, please contact Harry.";
			else {
				$_SESSION["perms"] = $newPerm;
				$_SESSION["softetherUser"] = $seUsername;
				$_SESSION["softetherPass"] = $sePassword;
			}
		} else {
			echo "Incorrect Code!<br/>";
		}
	}
	
	// Displays any Errors
	if(isset($error)){
	  foreach($error as $e){
		echo "<p>".$e."</p>";
	  }
	}
?>
<hr/>
<?php
include('includes/header.php');
?>
UserID: <?=$_SESSION["userID"]?><br/>
Username: <?=$_SESSION["username"]?><br/>
Email: <?=$_SESSION["email"]?><br/>
Perms Rank: <?=$_SESSION["perms"]?><br/>

<hr/>
Hello, <?=$_SESSION["firstName"]?> <?=$_SESSION["lastName"]?>

<?php 
if ($_SESSION["perms"] == "admin") {
?>
<hr/>
<h1>Admin</h1>
<?php 
	echo "Affiliate Code: ".$code["affiliate"]."<br/>";
	echo "Full Access Code: ".$code["full"]."<br/>";
	echo "School Exclusive Access Code: ".$code["school"]."<br/>";
	echo "Early Access Code: ".$code["early"]."<br/>";
}
if ($_SESSION["perms"] == "affiliate" || $_SESSION["perms"] == "admin") {
?>
<hr/>
<h1>Affiliate</h1>
<?php 
	echo "General Access Code: ".$code["general"]."<br/>";
}
if ($_SESSION["perms"] == "full" || $_SESSION["perms"] == "affiliate" || $_SESSION["perms"] == "admin") {
?>
<hr/>
<h1>Shadowsocks Configuration</h1>

<?php 
}
if ($_SESSION["perms"] == "general" || $_SESSION["perms"] == "full" || $_SESSION["perms"] == "affiliate" || $_SESSION["perms"] == "admin") {
?>
<hr/>
<h1>Softether Configuration</h1>
<?php 
	echo "Username: ".$_SESSION["softetherUser"]."<br/>";
	echo "Password: ".$_SESSION["softetherPass"]."<br/>";
}
?>

<hr/>
<h1>Account Activation</h1>
<form method="post" action="">
		<input type="text" name="code" id="code" placeholder="Access Code">
		<input type="submit" name="submit" value="<?php if ($_SESSION["perms"] != "registered") { echo "Update Access Code"; } else { echo "Activate Account"; }?>">
</form>
<hr/>
<h1>Account Management</h1>
<a href="logout.php">Logout</a>
<?php
include('includes/footer.php');
?>