<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
	function changeText(textId) {
	var id=textId
	if (id==0) {
		document.getElementById("p").innerHTML="";
	} if (id==1) {
		document.getElementById("p").innerHTML="<b>Sole (Learning Space)</b><br/><br/>My learning space is in a Quiet Room, Computer Lab or in my own personal bedroom.<br/>A quiet room helps me concentrate and stay on task.<br/>The computer lab aids me in research and relaxation.<br/>My own room is quiet so I can concentrate and has a computer so I can research and relax.";
	} if (id==2) {
		document.getElementById("p").innerHTML="<b>Tongue (Favorite Ways to Work)</b><br/><br/>My favorite ways to work is to be creative,<br/> do something no one has done before, new and interesting.<br/>But when it comes to words and vocabulary I just memorize it.<br/>I do creative things because they are challenging and most of the time no one has ever done it before so it is new.";
	} if (id==3) {
		document.getElementById("p").innerHTML="<b>Insole (How I Organize)</b><br/><br/>People say that I am the worst at organizing.<br/>When it comes to homework and test I keep them in the section and binder they belong in.<br/>When it comes to electronic files I have folders after folders to organize files with.<br/>For items i try to keep things as neat as possible but that doesn't usually happen.";
	} if (id==4) {
		document.getElementById("p").innerHTML="<b>Laces (Homework Helpers)</b><br/><br/>Things that help me do my homework would be: A Computer, Internet, and People.<br/>A computer and inernet can help me do my homework my researching and word processing.<br/>People help me do homework because they give me ideas and suggestions.";
	} if (id==5) {
		document.getElementById("p").innerHTML="<b>Upper (Goals)</b><br/><br/>My all time goal since I was in grade 1 was to be better at Math and English/Language/CORE. <br/> But I also added 'Learn to Code Better' after I started coding and programming in grade 6. <br/>The reason I need to be better at Math is because after I got into the gifted program math was <br/>getting harder and harder and I am not doing the best. <br/> Language has never been my strong point because I came to Canada when I was in grade one so,<br/> English was never my primary language until grade 2.";
	} if (id==6) {
		document.getElementById("p").innerHTML="<b>Toe (Strengths)</b><br/><br/>My strengths are mostly in doing crazing things, like what I am doing for this. I can guarantee you that no one has ever given you a Take a Walk in My Shoes project like this.<br/>My strengths are coding and I enjoy doing that a lot. <br/>With coding a lot new things not a lot of people know how to do will be possible like <br/>interactive web elements and windows executable instead of MS Word and PowerPoint presentations.";
	} if (id==7) {
	 	document.getElementById("p").innerHTML="<b>Heel (Challenges)</b><br/><br/>I am not the brightest when it comes to learning.<br/>I am also not the worst so subjects that I am not the best at is Language(Grammar and Spelling) and Art. <br/> I somethings have trouble concentrated while doing homework but I  other than that I have no more challenges.";
	} if (id==8) {
		document.getElementById("p").innerHTML="<b>Special Features</b><br/><br/>Well, a computer and a tablet will increase my production rate of homework and work by a lot.<br/>A group of friends or people to chat with can help me learn by taking ideas and knowledge form others.";
	} if (id==9) {
		document.getElementById("p").innerHTML="<b>Instructions</b><br/>Fristly I hope that you will enjoy my Take a Walk in my shoes projects<br/>because I did spend a fair amount time working on this.<br/><br/>To view my Take a Walk in My Shoe project in the best quality it is best to know this:<br/>1. Click the part of the shoe will like to read about.<br/>2. Click on the blank part of the picture or another part of the shoe to exit the current text.<br/><br/><i> Hope you like this!</i>";
	} if (id==10) {
		document.getElementById("p").innerHTML="<b>Credits:</b><br/><br/><i>Coding:</i> Harry<br/><i>Photo:</i> Google<br/>";
	} }
	</script>
	<style type="text/css">
		h1 {
			font-family: "Times New Roman", serif; font-style: italic;
			font-variant: small-caps;
		} .image { 
   			position: relative; 
   			width: 100%;
		} p { 
   			position: absolute; 
   			top: 200px; 
   			left: 0; 
   			width: 100%; 
		} p span { 
   			color: white; 
   			font: Helvetica, Sans-Serif; 
   			letter-spacing: 1px;  
   			background: rgb(0, 0, 0);
   			background: rgba(0, 0, 0, 0.5);
   			padding: 1px; 
		}
	</style>
	<title>Take a Walk in My Shoes Project</title>
</head>
<body>
<center>
	<header>
	<h1>Take a Walk in My Shoes Project</h1>
	<h3><b><i><u>Date: September, 03 - September 11, 2013</u></i></b></h3>
	<p><span id="qp"></span></p>
	</header>
	<div class="image">
	<img src="runningshoes.jpg" usemap="#map" onclick="changeText(0)">
	<map name="map">
  		<area shape="rect" coords="7,295,288,488" onclick="changeText(1)" href="javascript:void(0);">
  		<area shape="rect" coords="291,394,450,520" onclick="changeText(1)" href="javascript:void(0);">
  		<area shape="rect" coords="350,500,575,635" onclick="changeText(1)" href="javascript:void(0);">
  		<area shape="rect" coords="450,550,750,630" onclick="changeText(1)" href="javascript:void(0);">
  		<area shape="rect" coords="30,15,160,270" onclick="changeText(7)" href="javascript:void(0);">
  		<area shape="rect" coords="470,160,500,216" onclick="changeText(4)" href="javascript:void(0);">
  		<area shape="rect" coords="500,215,525,265" onclick="changeText(4)" href="javascript:void(0);">
  		<area shape="rect" coords="525,270,570,305" onclick="changeText(4)" href="javascript:void(0);">
  		<area shape="rect" coords="580,320,602,365" onclick="changeText(4)" href="javascript:void(0);">
  		<area shape="rect" coords="630,450,767,560" onclick="changeText(6)" href="javascript:void(0);">
  		<area shape="rect" coords="660,40,720,56" onclick="changeText(3)" href="javascript:void(0);">
  		<area shape="rect" coords="625,55,755,75" onclick="changeText(8)" href="javascript:void(0);">
  		<area shape="circle" coords="395,110,45" onclick="changeText(2)" href="javascript:void(0);">
 		<area shape="circle" coords="430,245,65" onclick="changeText(5)" href="javascript:void(0);">
 		<area shape="circle" coords="495,345,61" onclick="changeText(5)" href="javascript:void(0);">
	</map>
	<p><span id="p"></span></p>
	</div>
	<!--If no Javascript-->
	<noscript>
	<h1>Your browser must support and you must have enabled Javascript.</h1>
	<h2>Recommended Broswers are Chrome(v20+), Firefox(v15+), Opera(v8+), IE8+</h2>
	</noscript>
	<button onclick="changeText(9)">Instructions</button><button onclick="changeText(10)">Credits</button><form method="link" action="shoesproject_textonly.php"><input type="submit" value="Text-Only Version"></form>
</center>
</body>
</html>