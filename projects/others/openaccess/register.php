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
				$status[] = "Account has been created <a href='login.php'>Login Here</a>";
				
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
<form method="post" action="">
	<div class="form-group row">
		<label for="first" class="col-2 col-form-label">First Name: </label>
		<div class="col-10">
			<input class="form-control" type="text" name="first" id="first" placeholder="First Name" value="<?php if(isset($error)){ echo $_POST["first"]; } ?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="last" class="col-2 col-form-label">Last Name: </label>
		<div class="col-10">
			<input class="form-control" type="text" name="last" id="last" placeholder="Last Name" value="<?php if(isset($error)){ echo $_POST["last"]; } ?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="username" class="col-2 col-form-label">Username: </label>
		<div class="col-10">
			<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($error)){ echo $_POST["username"]; } ?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-2 col-form-label">Email: </label>
		<div class="col-10">
			<input class="form-control" type="email" name="email" id="email" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST["email"]; } ?>">
		</div>
	</div>
	<div class="form-group row">
	    <label for="password" class="col-2 col-form-label">Password:</label>
	    <div class="col-10">
			<input class="form-control" type="password" name="password" id="password" placeholder="Password">
	    </div>
	</div>
	<div class="form-group row">
	    <label for="passwordConfirm" class="col-2 col-form-label">Confirm Password:</label>
	    <div class="col-10">
			<input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password">
	    </div>
	</div>
	<div><i>Registration is disabled for achived projects!</i></div>
	<button type="submit" disabled="disabled" class="btn btn-default">Register</button>
</form>
<hr/>

<?php
include('includes/footer.php');
?>