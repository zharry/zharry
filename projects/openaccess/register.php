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
		$passwordConfirm = $_POST["passwordConfirm"];
		$email = $_POST["email"];
		$first = $_POST["first"];
		$last = $_POST["last"];
		
		// Validate user information
		// Minimum username requriements
		if(strlen($_POST["username"]) < 2){
			$error[] = "Username is too short (Must be at least 2 characters).";
		} else {
			// Check Email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Invalid Email address.";
			} else {
				// Check Duplicate Credentials
				$stmt = mysqli_prepare($conn, "SELECT username FROM users WHERE username = ?");
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if (mysqli_stmt_num_rows($stmt) != 0)
					$error[] = "Username provided is already in use.";
				$stmt = mysqli_prepare($conn, "SELECT username FROM users WHERE  email = ?");
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if (mysqli_stmt_num_rows($stmt) != 0)
					$error[] = "Email provided is already in use.";
				
				// Check password requriements
				if(strlen($password) < 5 || strlen($passwordConfirm) < 5)
					$error[] = "Password is too short (Must be at least 5 characters).";
				if ($password != $passwordConfirm)
					$error[] = "Passwords do not match.";
			}
		}
		
		// Register user if no problems have occured
		if (!isset($error)) {
			$passhash = password_hash($password, PASSWORD_DEFAULT);
			$stmt = mysqli_prepare($conn, "INSERT INTO users (first, last, username, password, email) VALUES (?, ?, ?, ?, ?)");
			mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $username, $passhash, $email);
			mysqli_stmt_execute($stmt);
			if (mysqli_stmt_affected_rows($stmt) != 1)
				$error[] = "Unknown error occured, please contact Harry.";
			else
				echo "Account has been created <a href='login.php'>Login Here</a>";
				
		}
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

		<input type="text" name="first" id="first" placeholder="First Name" value="<?php if(isset($error)){ echo $_POST["first"]; } ?>">
		
		<input type="text" name="last" id="last" placeholder="Last Name" value="<?php if(isset($error)){ echo $_POST["last"]; } ?>">

		<input type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($error)){ echo $_POST["username"]; } ?>">

		<input type="email" name="email" id="email" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST["email"]; } ?>">

		<input type="password" name="password" id="password" placeholder="Password">

		<input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password">

		<input type="submit" name="submit" value="Register">

</form>
<?php
include('includes/footer.php');
?>