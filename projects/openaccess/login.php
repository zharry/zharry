<?php
	require_once('includes/connection.php');
	// Check to see if already logged in
	if (isset($_SESSION['username'])) {
		header('Location: dashboard.php');
	}

	// Check to see if form is submitted
	if (!empty($_POST)) {
		// Grab information
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE username = ?");
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		if (mysqli_stmt_num_rows($stmt) == 1) {
			mysqli_stmt_bind_result($stmt, $userpass);
			while (mysqli_stmt_fetch($stmt))
				if (password_verify($password, $userpass)) {
					session_start();
					$_SESSION["username"] = $username;
					header('Location: dashboard.php');
				}
		}
		$error[] = "User/Password combination incorrect!";
	}
	
	// Displays any Errors
	if(isset($error)){
	  foreach($error as $e){
		echo "<p>".$e."</p>";
	  }
	}
?>
<?php
include('includes/header.php');
?>
<form method="post" action="">

		<input type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($error)){ echo $_POST["username"]; } ?>">

		<input type="password" name="password" id="password" placeholder="Password">

		<input type="submit" name="submit" value="Login">

</form>
<?php
include('includes/footer.php');
?>