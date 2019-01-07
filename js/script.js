var easeInQuad = new SmoothScroll('[data-easing="easeInQuad"]', {easing: 'easeInQuad'});

function onload() {
	document.getElementById("skill-display").style.display = "block";
	showYear(2019);
	document.getElementById("skill-right").addEventListener('mousedown', function(e){ e.preventDefault(); }, false); 
	document.getElementById("skill-left").addEventListener('mousedown', function(e){ e.preventDefault(); }, false);
}

function showYear(year) {
	var year = clamp(year, 2011, currentYear);
	if (year >= currentYear) {
		document.getElementById("skill-right").classList.add("arrow-disabled");
	} else {
		document.getElementById("skill-right").classList.remove("arrow-disabled");
	}
	if (year <= 2011) {
		document.getElementById("skill-left").classList.add("arrow-disabled");
	} else {
		document.getElementById("skill-left").classList.remove("arrow-disabled");
	}
	selectedYear = year;
	document.getElementById("year-num").innerHTML = selectedYear;
	
	var curYear = skills[selectedYear];
	var i = 0;
	for (var k in curYear) {
        if (k == "year" || k == "id") {
        } else {
			document.getElementById("skill-" + k).style.width = curYear[k] + "%";
			if (curYear[k] == 0) {
				document.getElementById("skill-" + k).children[1].style.display = "none";
				document.getElementById("skill-" + k).children[2].style.display = "none";
			} else {
				document.getElementById("skill-" + k).children[1].style.display = "inherit";
				document.getElementById("skill-" + k).children[2].style.display = "inherit";
				i++;
			}
			if (i % 2 == 0) {
				document.getElementById("skill-" + k).children[1].style.height = "40px";
			} else {
				document.getElementById("skill-" + k).children[1].style.height = "16px";
			}
		}
    }
}

function clamp(num, min, max) {
	return num > max ? max : (num < min ? min : num);
}