<?php

    require_once 'connection.php';
    session_start();
    
    $level = 0;
    if (isset($_SESSION["username"]))
        $level = 1;
    $msg = "Authentication Required";

    if (isset($_POST["username"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $user = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username';");
        if (mysqli_num_rows($user) == 1) {
            while($row = mysqli_fetch_assoc($user)) {
                if (password_verify($_POST["password"], $row["password"])) {
                    $_SESSION["username"] = htmlentities($_POST["username"]);
                    $level = 1;
                } else {
                    $msg = "Incorrect Credentials!";
                }
            }
        } else {
            $msg = "Incorrect Credentials!";
        }
    }
    
    /*0 - Public, 1 - Logged In*/
    if ($required == 1 && $level == 0) {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Harry::Brain</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="../src/style.css">
        <link rel="stylesheet" href="../src/bootstrap-tagsinput.css">
    </head>
    <body>
        <div class="container">
            <br/>
            <br/>
            <br/>
            <div class="row" id="logo">
                <div class="pull-left" style="width: 100%">
                    <center><h1>Harry<span style="font-family: monospace; font-size: 0.8em; line-height: 1.4em; vertical-align: text-top; padding: 1px;">::</span>Brain</h1></center>
                    <center><h4><?=$msg?></h4></center><br/>
                </div>
            </div>
            <br/>
            <br/>
            <div class="row" id="createidea">
                <div class="wrapper">
                    <form class="form-signin" method="post">
                        <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
                        <button class="btn btn-primary btn-block" type="submit">Login</button>   
                    </form>
                </div>
            </div>
            <br/>
            <br/>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="../src/script.js"></script>
        <script src="../src/bootstrap-tagsinput.js"></script>
    </body>
</html>

<?php
        die();
    }
?>