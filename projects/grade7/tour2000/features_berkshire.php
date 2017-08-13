<!DOCTYPE html>

<!--This page was Fully Made by Harry-->
<!--This is not a real tour company-->
<!--This page is for my Geography Project-->
<!--If you are viewing this Thank You for Visiting the page!-->

<html style="background-color: #D8D8D8;">

	<head>
	<title>Berkshire Features</title>
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
		
		<h3>Berkshire Features</h3>
		<a href="picture/berkshire/topo_eng_map.png"><img src="picture/berkshire/topo_eng_map.png" style="float:left" width="200px" height="270px"/></a><br/><p>Berkshire State has a river running down through it coming from the west ending after it passes London. After leaving the major towns of Berkshire (Bracknell Forest, Reading, Slough, West Berkshire, Windsor and Maidenhead and Wokingham) you can start to see hills and plains in the country side. But the more closer you get to London the less hills and grass there will be as you begin to see houses and buildings. Berkshire is relatively flat with a elevation range of 25~100m.</p><br/><br/><br/><br/><br/><br/><br/>
		
		<!--Foot-->
		
		<a href="#top" style="float:left">Back To Top</a>&nbsp &nbsp <a href="berkshire.php">Back: (Berkshire)</a><a href="climate_berkshire.php" style="float:right">Next: (Berkshire Climate)</a>
		
	</div>
	<div class="spacing" style="float: left; width: 15%;"><br/>
	</div>
	</body>

</html>