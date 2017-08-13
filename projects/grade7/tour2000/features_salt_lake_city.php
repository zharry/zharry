<!DOCTYPE html>

<!--This page was Fully Made by Harry-->
<!--This is not a real tour company-->
<!--This page is for my Geography Project-->
<!--If you are viewing this Thank You for Visiting the page!-->

<html style="background-color: #D8D8D8;">

	<head>
	<title>SLC Features</title>
	<link rel="icon" type="image/ico" href="picture/favicon.ico"/>
	<meta name="author" content="Harry Zhang">
	</head>
	<body>
	<div class="header">
		<center><a href="index.php"><img src="picture/header.jpg" title="Welcome to Tour101" /></a><br/>
		<div class="topmenu">
			<a href="index.php" style="text-decoration: none; border: 1px solid black;"> &nbsp Home &nbsp </a> &nbsp 
			<a href="salt_lake_city.php" style="text-decoration: none; border: 1px solid black;"> &nbsp Salt Lake City &nbsp </a> &nbsp 
			<a href="berkshire.php" style="text-decoration: none; border: 1px solid black;"> &nbsp Berkshire &nbsp </a> &nbsp 
			<a href="finish.php" style="text-decoration: none; border: 1px solid black;"> &nbsp Recommendation &nbsp </a> &nbsp 
			<a href="bibliography.php" style="text-decoration: none; border: 1px solid black;"> &nbsp Bibliography &nbsp </a><br/><br/>
		</div>
		</center>
	</div>
	<div class="sidemenu" style="text-indent: 5px; border: 1px solid black; float: left; width: 20%;">
		<p>Site Contents:<br/></p>
        <a href="index.php" style="text-decoration: none"> &nbsp Home</a><br/>
        <a href="cost.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Flight Costs</a><br/>
        <a href="finish.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Recommendation</a><br/>
        <a href="bibliography.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Bibliography</a><br/><br/>
		<a href="salt_lake_city.php" style="text-decoration: none"> &nbsp Salt Lake City</a><br/>
		<a href="features_salt_lake_city.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Salt Lake City Physical Features</a><br/>
		<a href="climate_salt_lake_city.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Salt Lake City Climate</a><br/>
		<a href="vegetation_salt_lake_city.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Salt Lake City Vegetation</a><br/>
		<a href="activities_salt_lake_city.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Salt Lake City Activities</a><br/><br/>
		<a href="berkshire.php" style="text-decoration: none"> &nbsp Berkshire</a><br/>
		<a href="features_berkshire.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Berkshire Physical Features</a><br/>
		<a href="climate_berkshire.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Berkshire Climate</a><br/>
		<a href="vegetation_berkshire.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Berkshire Vegetation</a><br/>
		<a href="activities_berkshire.php" style="text-decoration: none"> &nbsp &nbsp &nbsp Berkshire Activities</a><br/><br/><hr/><br/>
		
		<div class="php-date">
		<?
			//Creates Today's Date
			function EnglishDate($date) {
			$arrDay = array("Today is: Sunday","Today is: Monday","Today is: Tuesday","Today is: Wednesday","Today is: Thursday","Today is: Friday","Today is: Saturday");
			$arrMonth = array("","January","February","March","April","May","June","July","August","September","October","November","December");
			$EnglishDate = $arrDay[(date("w",$date))] . ", " . $arrMonth[date("n",$date)];
			$EnglishDate = $EnglishDate  . " " . date("d",$date) . ", " . date("Y",$date);
			return $EnglishDate;
			}
			echo EnglishDate(time());
		?></div>
		
	</div>
	<div class="spacing" style="float: left; width: 5%;"><br/>
	</div>
	<div class="body" style="float: left; width: 60%;">
	
		<!--Page Begins Here-->

        <h3>Salt Lake City Physical Features</h3>
		<a href="http://www.yellowmaps.com/maps/img/US/reference/utah_ref_2001.jpg"><img src="http://www.yellowmaps.com/maps/img/US/reference/utah_ref_2001.jpg" style="float:left" height="155" width="115"></a>
		<p> &nbsp Salt Lake City is located in Salt Lake Valley which is shielded by the Wasatch Mountains to the east and the Oquirrh Mountains to the west. Salt Lake City is located at the edge of the Wasatch Mountains and beside the Great Salt Lake. The tallest point in the city rises 1,850 m above the floor of the valley.</p>
		<p> &nbsp The size of the Great Salt Lake can vary with the amount of precipiation in the Salt Lake Valley. Why? Because that water flows downhill and it happens that the Great Salt Lake sits at the bottom of a valley. By that means the only way water can leave is by evaporation.<br/><br/><center><a href="picture/slc/greatsaltlake.jpg"><img src="picture/slc/greatsaltlake.jpg" title="Click to Enlarge." width="637px" height="500px"/></a></center></p>
		<center></center><br/><br/>
		
		<!--Foot-->
		
		<a href="#top" style="float:left">Back To Top</a>&nbsp &nbsp <a href="salt_lake_city.php">Back: (Salt Lake City)</a><a href="climate_salt_lake_city.php" style="float:right">Next: (Salt Lake City Climate)</a>
		
	</div>
	<div class="spacing" style="float: left; width: 15%;"><br/>
	</div>
	</body>

</html>