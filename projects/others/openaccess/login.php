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
		
		$stmt = mysqli_prepare($conn, "SELECT id, username, password, email, first, last, softetheruser, softetherpass, perms FROM users WHERE username = ?");
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		if (mysqli_stmt_num_rows($stmt) == 1) {
			mysqli_stmt_bind_result($stmt, $id, $user, $userpass, $email, $first, $last, $seuser, $sepass, $perms);
			while (mysqli_stmt_fetch($stmt))
				if (password_verify($password, $userpass)) {
					session_start();
					$_SESSION["username"] = $user;
					header('Location: dashboard.php');
				}
		}
		$error[] = "User/Password combination incorrect!";
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
		<label for="username" class="col-2 col-form-label">Username: </label>
		<div class="col-10">
			<input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php if(isset($error)){ echo $_POST["username"]; } ?>">
		</div>
	</div>
	<div class="form-group row">
	    <label for="password" class="col-2 col-form-label">Password:</label>
	    <div class="col-10">
			<input class="form-control" type="password" name="password" id="password" placeholder="Password">
	    </div>
	</div>
	<button type="submit" class="btn btn-default">Login</button>
</form>
<hr/>
<?php
include('includes/footer.php');
?>