<?php

    $required = 1;
    require_once '../auth/auth.php';
    
    $msg = "Got something to say?";
    
    if (isset($_POST["name"])) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $data = mysqli_real_escape_string($conn, $_POST["data"]);
        $type = mysqli_real_escape_string($conn, $_POST["type"]);
        $tags = mysqli_real_escape_string($conn, $_POST["tags"]).",".strtolower($type);
        $access = mysqli_real_escape_string($conn, $_POST["access"]);
        
        $id = 0;
        $keyspace = array_merge(range(48, 57), range(65, 90), range(97, 122));
        shuffle($keyspace);
        $idQ = mysqli_query($conn, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'contents'");
        if (mysqli_num_rows($idQ) == 1) {
            while($row = mysqli_fetch_assoc($idQ)) {
                $id = $row["AUTO_INCREMENT"];
            }
        }
        $url = chr($keyspace[0])."".chr($keyspace[1])."".chr($keyspace[2])."".$id."".chr($keyspace[3])."".chr($keyspace[4])."".chr($keyspace[5]);
        
        
        $insert = "INSERT INTO `contents` (name, type, access, data, url, tags) VALUES ('$name', '$type', '$access', '$data', '$url', '$tags');";
        if (mysqli_query($conn, $insert)) {
            $msg = "<a href=\"https://zharry.ca/brain/get/$url/\">https://zharry.ca/brain/get/$url/</a>";
        } else {
            $msg = "Failed to create entry!";
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <center><h4>
                        <a href="../">Home</a> | <a href="../auth/logout.php">Logout</a> <br/><br/>
                        <?=$msg?>
                    </h4></center><br/>
                </div>
            </div>
            <br/>
            <div class="row" id="createidea">
                <br/>
                <div class="createideaform input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-star"></i></span>
                    <input form="form" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>
                <div class="createideaform form-group" style="margin-bottom: 0px;">
                    <textarea form="form" name="data" class="form-control" rows="5" placeholder="Content" required></textarea>
                </div>
                <div class="createideaform input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-tags"></i></span>
                    <input id="tags" data-role="tagsinput" type="text" class="form-control" placeholder="Tags (Seperated by ,)" onkeyup="parseTags();">
                    <input id="tagData" form="form" name="tags" type="hidden" value="">
                </div>
                <div class="createideaform input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-cogs"></i></span>
                    <select class="form-control" form="form" name="type" id="type" required>
                        <option>Raw</option>
                        <option>Idea</option>
                        <option>Note</option>
                        <option>Tutorial</option>
                        <option>Knowledge</option>
                        <option>Quote</option>
                        <option>URL</option>
                    </select>
                </div>
                <div class="createideaform input-group">
                    <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-user-lock"></i></span>
                    <select class="form-control" form="form" name="access" id="access" required>
                        <option>Public</option>
                        <option>Protected</option>
                        <option>Private</option>
                    </select>
                </div>
                <div class="createideaform input-group" style="width: 100%">
                    <form id="form" method="post">
                    <input type="submit" class="btn btn-info" style="width: 100%" id="submitbutton">
                    </form>
                </div>
            </div>
            <br/>
            <br/>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="../src/bootstrap-tagsinput.js"></script>
        <script src="../src/script.js"></script>
    </body>
</html>