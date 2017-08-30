<?php

	session_start();
	require_once('includes/auth.php');
	
?>
<?php
include('includes/header.php');
?>
<?=$_SESSION["username"]?>
<br/>
<a href="logout.php">Logout</a>
<?php
include('includes/footer.php');
?>