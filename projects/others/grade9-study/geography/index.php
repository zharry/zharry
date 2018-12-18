<html>

<head>
	<title>Geography Study Home</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
	<link href='style.css' rel='stylesheet' type='text/css'>
	<script>
	function pad(number, length) {
		var str = '' + number;
		while (str.length < length) {
			str = '0' + str;
		}
		return str;
	}
	function query(str) {
    if (str.length == 0) { 
        document.getElementById("results").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("results").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "definations.php?query=" + str, true);
        xmlhttp.send();
    }
	}
	var page = 1;
	function goleft() {
		if (page > 1) {
			page--;
			paged = pad(page, 3);
			document.getElementById("book").setAttribute('data', "files/" + paged + ".swf");
			document.getElementById('poge').innerHTML = page;
		} else {
			alert("No more pages to the left!");
		}
	}
	function goright() {
		if (page < 562) {
			page++;
			paged = pad(page, 3);
			document.getElementById("book").setAttribute('data', "files/" + paged + ".swf");
			document.getElementById('poge').innerHTML = page;
		} else {
			alert("No more pages to the right!");
		}
	}
	function reset() {
		var w = document.getElementById("content").offsetWidth;
		var h = w * 1.25;
		document.getElementById("book").height = h;
		document.getElementById("book").width = w;
	}
	function gotopage(p) {
		page = p;
		paged = pad(page, 3);
		document.getElementById("book").setAttribute('data', "files/" + paged + ".swf");
	}
	function archive() {
		alert("This is an archived site. Due to copyright reasons, all other pages have been disabled. All other functions remain.");
	}
	</script>
</head>

<body>
	<div id="left">
    	&nbsp
    </div>
    <div id="center">
        <h1>CGC1D - Canadian Geography</h1>
		<div id="header">
			&nbsp TextBook Control Buttons:
			<!--button onclick="goleft()"><</button>
			<button onclick="goright()">></button> &nbsp
			 | &nbsp <input id="poge"></input><button onclick="gotopage(document.getElementById('poge').value)">Goto Page</button-->
			<button onclick="archive()"><</button>
			<button onclick="archive()">></button> &nbsp
			 | &nbsp <input id="poge"></input><button onclick="archive()">Goto Page</button>
			<button onclick="reset()">Reset</button>
			<div style="float: right; padding-right: 10px;">Definition Lookup: <input type="text" onkeyup="query(this.value)"></input></div><br/>
        </div>
		<div id="results"></div>
		<div id="textbook">
			<div id="content"><br/><center><object id="book" height="720px" width="576px" data="title.swf"></object></center></div>
		<br/>
		</div>
	</div>
	<div id="right">
    	&nbsp
    </div>
	<script>
		var w = document.getElementById("content").offsetWidth;
		var h = w * 1.25;
		document.getElementById("book").height = h;
		document.getElementById("book").width = w;
	</script>
</body>

</html>
