<!DOCTYPE html>

<!--This page was Fully Made by Harry-->
<!--This is not a real tour company-->
<!--This page is for my Geography Project-->
<!--If you are viewing this Thank You for Visiting the page!-->

<html style="background-color: #D8D8D8;">

	<head>
	<title>Recommendation</title>
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
		
		<h3>Pros and Cons of Salt Lake City</h3>
		<p>To get to Salt Lake City you have a  very cheap flight, ~$1000 less than Berkshire's flight and a more quicker flight (~1 hour less) than Berkshire. There is less Precipitation (~3CM less) than Berkshire. All the attractions are outdoors and are more spread out so you can visit diffrent places without seeing the same things over and over again. A con would be to get from diffrent attractions it takes time.<p>
		
		<h3>Pros and Cons of Berkshire</h3>
		<p>At Berkshire you get to visit the world's largest castle which is also a historical site. Berkshire is slightly warmer than Salt Lake City altough they are both around 6*C. The landform at Berkshire is a lot more smoother than those at Salt Lake City. Some cons would be that all the attractions are in one city and that after leaving the plane you must take a bus to get to Berkshire.<p>
		
		<h3>Our Recommendation</h3>
		<p>Looking at the Pro's and Con's of the two cities, we would love for you to go to Berkshire but we think that Salt Lake City is a better place to visit. The pricing tells a lot, when comparing the two costs and flight times Salt Lake City definitely wins. Then looking at the Climate, Salt Lake City has a lower precipitation which means that the chances of raining in Salt Lake City is lower than Berkshire. Then looking at activities in Salt Lake City they are move interactive (like hiking) then just looking around a Castle in Berkshire.</p>
		
		<p><br/><hr/><br/> &nbsp Thank you for coming to Tour2000 and this concludes my presentation. <a href="bibliography.php" style="text-decoration: none"> &nbsp &nbsp &nbsp --Bibliography and Credits--</a><br/><br/>If you have any Question feel free to ask me. Or Email me at <a href="mailto:info@tour101.vacau.com" style="text-decoration: none">tour2000@tour2000.tk</a> or <a href="mailto:admin@admin-volonix.tk" style="text-decoration: none">tour2000@volonix.tk</a>.</p>
		
	</div>
	<div class="spacing" style="float: left; width: 15%;"><br/>
	</div>
	</body>

</html>