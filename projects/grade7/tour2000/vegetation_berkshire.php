<!DOCTYPE html>

<!--This page was Fully Made by Harry-->
<!--This is not a real tour company-->
<!--This page is for my Geography Project-->
<!--If you are viewing this Thank You for Visiting the page!-->

<html style="background-color: #D8D8D8;">

	<head>
	<title>Berkshire Vegetation</title>
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
			$arrDay = array("Today is:Sunday","Today is: Monday","Today is: Tuesday","Today is: Wednesday","Today is: Thursday","Today is: Friday","Today is: Saturday");
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
		
		<h3>Berkshire Vegetation</h3>
		<p>England is at roughly the same latitude as Toronto so it has many similar plants as we have here. I will list down 3 native plants of England.</p><hr/>
		<a href="picture/berkshire/tree.png" style="text-decoration: none"><img src="picture/berkshire/tree.png" style="float:left"/></a>
		<p><b>Common Alder - Alnus glutinosa</b><br/><br/> The Common Alder grows in more wet and damp places beside a river and because England is full of rivers it makes the survivalbility of the Common Alder very easy.</p><br/><hr/>
		<a href="picture/berkshire/climb.png" style="text-decoration: none"><img src="picture/berkshire/climb.png" style="float:left"/></a>
		<p><b>Darwins Barberry - Berberis Darwinii</b><br/><br/>Darwins Barberry is a bush plant where lots grow at once to form a bush, best planted in soils like of those in Toronto, moist, wet, lots of light, medium temperature.</p><br/><hr/>
		<a href="picture/berkshire/flower.png" style="text-decoration: none"><img src="picture/berkshire/flower.png" style="float:left" height="154"width="100"/></a>
		<p><b>Vipers Buglos</b><br/><br/>The spikey wild-flower Viper Buglos is more diffrent from the other two above, this one likes the more dry soil like those on the beachs.</p><br/><br/><hr/><br/>
		
		<!--Foot-->
		
		<a href="#top" style="float:left">Back To Top</a>&nbsp &nbsp <a href="climate_berkshire.php">Back: (Berkshire Climate)</a><a href="activities_berkshire.php" style="float:right">Next: (Berkshire Activities)</a>
		
	</div>
	<div class="spacing" style="float: left; width: 15%;"><br/>
	</div>
	</body>

</html>