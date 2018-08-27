<?php
    
    require_once '../auth/connection.php';

    $msgg = "Oh! So there is something there afterall.";
    $data = array();
    if (isset($_GET["action"]) && !empty($_GET["action"])) {
        // Get URL
        $action = mysqli_real_escape_string($conn, $_GET["action"]);
        if (strpos($action, '\\') !== false || strpos($action, '/') !== false)
            $action = substr($action, 0, -1);
        
        // Query SQL
        $query = "SELECT * FROM `contents` WHERE `url` = '$action'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            while($r = mysqli_fetch_assoc($result)) {
                if ($r["access"] == "Private") {
                    $required = 1;
                    require_once '../auth/auth.php';
                }
                if ($r["type"] == "URL") {
                    header("Location: {$r["data"]}");
                    die();
                }
                $data = $r;
            }
        } else {
            $msgg = "Nothing to see here!";
        }
    } else {
        $msgg = "Nothing to see here!";
    }
    
    if ($data["type"] != "Raw") {
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
        <style>
        * {
            font-family: 'Roboto', sans-serif;
        }
        .container {
            padding-right: 38px;
            padding-left: 38px;
        }
        h1 {
            font-size: 50px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <br/>
            <br/>
            <br/>
            <div class="row" id="logo">
                <div class="pull-left" style="width: 100%">
                    <center><h1>Harry<span style="font-family: monospace; font-size: 0.8em; line-height: 1.4em; vertical-align: text-top; padding: 1px;">::</span>Brain</h1></center>
                    <center><h4><?=$msgg?></h4></center><br/>
                </div>
            </div>
            <hr style="padding-bottom: 6px;"/>
            <h2 style="font-size: 38px; padding-bottom: 8px;"><?=$data["name"]?></h2>
            <p><b>Date:</b> <?=$data["date"]?></p>
            <p><b>Type:</b> <?=$data["type"]?></p>
            <p><b>Tags:</b> <?=$data["tags"]?></p>
            <hr/><p><b>Content:</b></p>
            <p><?=$data["data"]?></p>
            <hr/>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
<?php
    } else {
        header('Content-Type:text/plain'); 
        echo $data["data"];
    }
?>