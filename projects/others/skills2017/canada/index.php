<?php

	require "connection.php";
	
	$query = "SELECT * FROM `event` ORDER BY `event`.`startDate` ASC LIMIT 4;";
	$res = mysqli_query($conn, $query) or die();
	$i = 0;
	$results = array();
	while($row = mysqli_fetch_assoc($res)) {
		$results[$i] = $row;
		$i += 1;
	}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Winnipeg Railway Museum</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="img/newlogo.png" id="navlogo" onmouseout="retractLogo();" onmouseover="expandLogo()" style="height: calc(100% + 24px); margin: -12px" class="navlogo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Location</a></li>
                <li><a href="#">Hours & Admission</a></li>
                <li><a href="#">Locomotives</a></li>
                <li><a href="#">Rolling Stock</a></li>
                <li><a href="#">Maintenance of Way</a></li>
                <li><a href="#">Other Equipment</a></li>
                <li><a href="#">Displays</a></li>
                <li><a href="#">Gift Shop</a></li>
                <li><a href="admin">Admin Panel</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </form>
        </div>
      </div>
    </nav>
    
    <!--Body-->
    <div class="container">
        <div class="row">
            <div class="col-md-4 event" id="event1" data-toggle="modal" data-target="#eventModal1" onclick="window.location.href='tickets.php?id=<?=$results[0]["id"]?>&name=<?=$results[0]["name"]?>&date=<?=$results[0]["startDate"]?>'">
                <img src="img/event1.png" class="eventImg">
                <div class="eventDesc">
                    <p class="eventTitle"><?=$results[0]["name"]?></p>
                    <p class="eventContent"><?=$results[0]["description"]?></p>
                    <p class="eventContent"><i><?=$results[0]["startDate"]?> - <?=$results[0]["endDate"]?></i></p>
                </div>
            </div>
            <div class="col-md-4 event" id="event2" data-toggle="modal" data-target="#eventModal2" onclick="window.location.href='tickets.php?id=<?=$results[1]["id"]?>&name=<?=$results[1]["name"]?>&date=<?=$results[1]["startDate"]?>'">
                <img src="img/event2.png" class="eventImg">
                <div class="eventDesc">
                    <p class="eventTitle"><?=$results[1]["name"]?></p>
                    <p class="eventContent"><?=$results[1]["description"]?></p>
                    <p class="eventContent"><i><?=$results[1]["startDate"]?> - <?=$results[1]["endDate"]?></i></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 event" id="event3" data-toggle="modal" data-target="#eventModal3" onclick="window.location.href='tickets.php?id=<?=$results[2]["id"]?>&name=<?=$results[2]["name"]?>&date=<?=$results[2]["startDate"]?>'">
                        <img src="img/event3.png" class="eventImg">
                        <div class="eventDesc smallDesc">
                            <p class="eventTitle smallTitle"><?=$results[2]["name"]?></p>
                            <p class="eventContent"><?=$results[2]["description"]?>, <i><?=$results[2]["startDate"]?> - <?=$results[2]["endDate"]?></i></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 event" id="event4" data-toggle="modal" data-target="#eventModal4" onclick="window.location.href='tickets.php?id=<?=$results[3]["id"]?>&name=<?=$results[3]["name"]?>&date=<?=$results[3]["startDate"]?>'">
                        <img src="img/event4.png" class="eventImg">
                        <div class="eventDesc smallDesc">
                            <p class="eventTitle smallTitle"><?=$results[3]["name"]?></p>
                            <p class="eventContent"><?=$results[3]["description"]?>, <i><?=$results[3]["startDate"]?> - <?=$results[3]["endDate"]?></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background-color:rgba(1,1,1,0.005)">
            <div class="col-md-6">
                <div class="col-sm-4 bottomItem">
                    <br/><span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size:24px;"></span><br/>
                    Buy Tickets
                </div>
                <div class="col-sm-4 bottomItem">
                    <br/><span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size:24px;"></span><br/>
                    Membership
                </div>
                <div class="col-sm-4 bottomItem">
                    <br/><span class="glyphicon glyphicon-heart" aria-hidden="true" style="font-size:24px;"></span><br/>
                    Donate
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-sm-6 bottomItem">
                    <b>Thursday, June 1, 2017</b><br/>
                    10am - 4pm<br/>
                    <b>OPEN</b><br/>
                    <a href="#">Hours of operation</a>
                </div>
                <div class="col-sm-6 bottomItem" style="line-height:95px;" id="plan">
                    <a style="text-decoration: none; color: black;" href="events.php">Plan your visit <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
    </div>
      
    <!--div class="modal fade" id="eventModal1" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Title</h4>
          </div>
          <div class="modal-body">
            Event 1
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="eventModal2" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Title</h4>
          </div>
          <div class="modal-body">
            Event 2
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="eventModal3" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Title</h4>
          </div>
          <div class="modal-body">
            Event 3
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="eventModal4" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Title</h4>
          </div>
          <div class="modal-body">
            Event 4
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div-->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>