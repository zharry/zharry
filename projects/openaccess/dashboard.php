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
	
	// Check to see if the user has updated access code
	function randomPassword($keys) {
		$pass = array(); 
		$alphaLength = strlen($keys) - 1;
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $keys[$n];
		}
		return implode($pass);
		// Code from https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
	}
	if (!empty($_POST)) {
		$userCode = $_POST["code"];
		if ($userCode == $code["affiliate"]) {
			echo "MA";
		} else if ($userCode == $code["full"]) {
			echo "MF";
		} else if ($userCode == $code["standard"]) {
			echo "MS";
		} else if ($userCode == $code["school"]) {
			echo "MSC";
		} else if ($userCode == $code["early"]) {
			echo "ME";
		}
	}
	
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
	
	
	
?>
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
	echo "School Exclusive Access Code: ".$code["school"]."<br/>";
	echo "Early Access Code: ".$code["early"]."<br/>";
}
if ($_SESSION["perms"] == "affiliate" || $_SESSION["perms"] == "admin") {
?>
<hr/>
<h1>Affiliate</h1>
<?php 
	echo "Full Access Code: ".$code["full"]."<br/>";
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