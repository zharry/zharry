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
        <link rel="stylesheet" href="src/style.css">
        <link rel="stylesheet" href="src/bootstrap-tagsinput.css">
    </head>
    <body>
        <div class="container">
            <br/>
            <br/>
            <br/>
            <div class="row" id="logo">
                <div class="pull-left" style="width: 100%">
                    <center><h1>Harry<span style="font-family: monospace; font-size: 0.8em; line-height: 1.4em; vertical-align: text-top; padding: 1px;">::</span>Brain</h1></center>
                    <center><h4>Something seems to be missing here... <a href="create">Create</a></h4></center><br/>
                </div>
            </div>
            <br/>
            <div class="row" id="topsearch">
                <div class="input-group">
                    <input id="topsearchquery" type="text" class="tsg form-control" placeholder="Find ideas, ramblings, urls, and just some really random things. (By Tag)">
                    <span class="tsg input-group-addon" id="searchButton" onclick="search();">Search</span>
                </div><br/>
            </div>
            <p style="margin-top: -24px; margin-bottom: 24px; margin-left: 4px;">ie. hackathon, game, tutorial, etc...</p>
            <div class="row" id="spinnerFrame">
                <img id="spinner" src="src/spinner.gif" style="height: auto; width: 120px; left: calc(50% - 60px); position: relative; display: none;">
            </div>
            <div class="row" id="searchresults">
            </div>
            <br/>
            <br/>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="src/script.js"></script>
        <script src="src/bootstrap-tagsinput.js"></script>
        <script>
            <?php
            if (isset($_GET["query"])) {
                ?>
                document.getElementById("topsearchquery").value = "<?=$_GET["query"]?>";
                search();
                <?php
            }
            ?>
        </script>
    </body>
</html>