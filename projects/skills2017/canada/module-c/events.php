<?php

	require "connection.php";
	
	$query = "SELECT * FROM `event`;";
	$res = mysqli_query($conn, $query) or die();
	$i = 0;
	$results = array();
	while($row = mysqli_fetch_assoc($res)) {
		$results[$i] = $row;
		$i += 1;
	}
	
	$days = array();
	for ($i = 1; $i <= 9; $i++) {
		$find = 0;
		for ($j = 0; $j < sizeof($results); $j++) {
			if (("2017-06-0".$i <= $results[$j]["endDate"]) == 1 && ($results[$j]["startDate"] <= "2017-06-0".$i) == 1) {
				$days[$i][$find] = $results[$j];
				$find += 1;
			}
		}
	}
	for ($i = 10; $i <= 30; $i++) {
		$find = 0;
		for ($j = 0; $j < sizeof($results); $j++) {
			if (("2017-06-".$i <= $results[$j]["endDate"]) == 1 && ($results[$j]["startDate"] <= "2017-06-".$i) == 1) {
				$days[$i][$find] = $results[$j];
				$find += 1;
			}
		}
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
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="events.php">Events<span class="sr-only">(current)</span></a></li>
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
        <br/>
        <br/>
        <div class="row">
            <p style="font-size: 24px;">Events (June 2017)</p>
        </div>
        <div>
        <!--ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#listView" aria-controls="home" role="tab" data-toggle="tab">List View</a></li>
            <li role="presentation">               <a href="#gridView" aria-controls="profile" role="tab" data-toggle="tab">Grid View</a></li>
        </ul-->
            
            
        <div class="tab-content">
            <!--List View Content-->
            <div role="tabpanel" class="tab-pane active" id="listView">
                <br/>
				<?php
				
					for ($i = 1; $i <= 9; $i++) {
						echo "<div class='row'>";
						echo "<p style='font-size: 20px;'>&nbsp; 2017-06-0$i</small></p>";
						echo "<hr/>";
						for ($j = 0; $j < sizeof($days[$i]); $j++) {
							echo "<button onclick=\"window.location.href='tickets.php?id=" .$days[$i][$j]["id"] . "&name=" . $days[$i][$j]["name"] ."&date=2017-06-0$i'\">" . $days[$i][$j]["name"] . "</button>";
						}
						echo "</div><br/><br/>";
					}
				
					for ($i = 10; $i <= 30; $i++) {
						echo "<div class='row'>";
						echo "<p style='font-size: 20px;'>&nbsp; 2017-06-$i</small></p>";
						echo "<hr/>";
						for ($j = 0; $j < sizeof($days[$i]); $j++) {
							echo "<button onclick=\"window.location.href='tickets.php?id=" .$days[$i][$j]["id"] . "&name=" . $days[$i][$j]["name"] ."&date=2017-06-$i'\">" . $days[$i][$j]["name"] . "</button>";
						}
						echo "</div><br/><br/>";
					}
				
				?>
                
            <!--Grid View Content>
            <div role="tabpanel" class="tab-pane" id="gridView">
                <br/>
                <table style="width: 100%;">
                    <tr>
                        <td class="cal cl">
                            Sun
                        </td>
                        <td class="cal cl">
                            Mon
                        </td>
                        <td class="cal cl">
                            Tue
                        </td>
                        <td class="cal cl">
                            Wed
                        </td>
                        <td class="cal cl">
                            Thurs
                        </td>
                        <td class="cal cl">
                            Fri
                        </td>
                        <td class="cal cl">
                            Sat
                        </td>
                    </tr>
                    <tr>
                        <td class="cal">
                            
                        </td>
                        <td class="cal">
                            
                        </td>
                        <td class="cal">
                            
                        </td>
                        <td class="cal">
                            
                        </td>
                        <td class="cal">
                            1<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            2<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            3<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="cal">
                            4<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            5<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            6<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            7<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            8<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                        <td class="cal">
                            9<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                        <td class="cal">
                            10<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="cal">
                            11<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                        <td class="cal">
                            12<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                        <td class="cal">
                            13<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                        <td class="cal">
                            14<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                        </td>
                        <td class="cal">
                            15<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            16<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            17<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="cal">
                            18<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            19<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            20<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            21<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            22<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            23<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                        <td class="cal">
                            24<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event2">Event 2</button>
                            <br/>
                            <button data-toggle="modal" data-target="#event3">Event 3</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="cal">
                            25<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            26<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            27<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            28<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            29<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                            30<br/>
                            <button data-toggle="modal" data-target="#event1">Event 1</button>
                        </td>
                        <td class="cal">
                        </td>
                    </tr>
                </table>
            </div-->
        </div>
      </div>
    </div>
      
    <!--Modal Contents>
    <div class="modal fade" id="event1" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Event 1</h4>
          </div>
          <div class="modal-body">
            Event 1 Description
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>    
    <div class="modal fade" id="event2" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Event 2</h4>
          </div>
          <div class="modal-body">
            Event 2 Description
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="event3" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Event 3</h4>
          </div>
          <div class="modal-body">
            Event 3 Description
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