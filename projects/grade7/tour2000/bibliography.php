<!DOCTYPE html>

<!--This page was Fully Made by Harry-->
<!--This is not a real tour company-->
<!--This page is for my Geography Project-->
<!--If you are viewing this Thank You for Visiting the page!-->

<html style="background-color: #D8D8D8;">

	<head>
	<title>Bibliography</title>
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
		
		<center><h3>Biblography</h3>
		<p>
		<a href="http://geology.com/world/the-united-states-of-america-satellite-image.shtml" style="text-decoration: none">http://geology.com/world/the-united-states-of-america-satellite-image.shtml</a><br/>
		<a href="http://geology.com/world/canada-satellite-image.shtml" style="text-decoration: none">http://geology.com/world/canada-satellite-image.shtml</a><br/>
		<a href="http://www.rususa.com/city/citymap.asp-city-salt+lake+city+ut" style="text-decoration: none">http://www.rususa.com/city/citymap.asp-city-salt+lake+city+ut</a><br/>
		<a href="http://learn.genetics.utah.edu/content/gsl/physical_char/" style="text-decoration: none">http://learn.genetics.utah.edu/content/gsl/physical_char/</a><br/>
		<a href="http://en.wikipedia.org/wiki/Geography_of_Salt_Lake_City" style="text-decoration: none">http://en.wikipedia.org/wiki/Geography_of_Salt_Lake_City</a><br/>
		<a href="http://www.city-data.com/us-cities/The-West/Salt-Lake-City-Geography-and-Climate.html" style="text-decoration: none">http://www.city-data.com/us-cities/The-West/Salt-Lake-City-Geography-and-Climate.html</a><br/>
		<a href="http://extension.usu.edu/files/publications/publication/NR_FF_011.pdf" style="text-decoration: none">http://extension.usu.edu/files/publications/publication/NR_FF_011.pdf</a><br/>
		<a href="http://gocalifornia.about.com/library/graphics/ut-topo-naus.gif" style="text-decoration: none">http://gocalifornia.about.com/library/graphics/ut-topo-naus.gif</a><br/>
		<a href="http://www.utahschoice.org/~utahscho/choice/grasses" style="text-decoration: none">http://www.utahschoice.org/</a><br/>
		<a href="http://www.visitsaltlake.com/" style="text-decoration: none">http://www.visitsaltlake.com/</a><br/>
		<a href="http://en.wikipedia.org/wiki/List_of_places_in_Berkshire#Towns" style="text-decoration: none">http://en.wikipedia.org/wiki/List_of_places_in_Berkshire#Towns</a><br/>
		<a href="http://www.botanica.org.uk/" style="text-decoration: none">http://www.botanica.org.uk/</a><br/>
		<a href="http://www.yr.no/place/United_Kingdom/England/Berkshire/statistics.html" style="text-decoration: none">http://www.yr.no/place/United_Kingdom/England/Berkshire/statistics.html</a><br/>
		<a href="http://www.usclimatedata.com/climate.php?location=USUT0225" style="text-decoration: none">http://www.usclimatedata.com/climate.php?location=USUT0225</a><br/>
		<a href="http://www.rssweather.com/climate/Utah/Salt%20Lake%20City/" style="text-decoration: none">http://www.rssweather.com/climate/Utah/Salt%20Lake%20City/</a><br/>
		<a href="https://www.google.ca/flights/" style="text-decoration: none">https://www.google.ca/flights/</a><br/>
		<a href="http://www.tripadvisor.co.uk/" style="text-decoration: none">http://www.tripadvisor.co.uk/</a><br/><hr/>
		
		</p>
		<h3>Credits</h3>
		<p>Site Created by: Harry Zhang
		<br/>Site Hosted by: <a href="http://www.000webhost.com/665237.html">000Webhost</a>
		<br/>Site Domain by: <a href="http://www.dot.tk">Dot.tk</a>
		<br/><br/>Site is Made with:
		<br/>HTML5
		<br/>CSS3
		<br/>PHP5
		<br/><hr/><br/>Once Again Thanks for Coming!</p>
		</center>
		
		
	</div>
	<div class="spacing" style="float: left; width: 15%;"><br/>
	</div>
	</body>

</html>