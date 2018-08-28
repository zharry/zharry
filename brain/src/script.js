setTimeout(function() {
    $("input[size=21]").keyup(function() {
        document.getElementById("tagData").value = $("#tags").val();
    });
    $("#submitbutton").hover(function() {
        document.getElementById("tagData").value = $("#tags").val();
    });
}, 3000);

function search() {
    document.getElementById("spinner").style.display = "block";
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
		    searchResults(JSON.parse(xmlHttp.responseText));
		}
	};
	xmlHttp.open("GET", "search.php?query=" + document.getElementById("topsearchquery").value, true);
	xmlHttp.send();
}

function searchResults(response) {
    var output = "";
    for (var i = 0; i < response.length; i++) {
        output += "<div href='get/" + response[i].url + "/' class=\"list-group-item\">";
        output += "<h3 style='margin-top: 12px;'><b>" + response[i]["name"] + "</b></h3>";
        output += "<h5><i>Type: " + response[i]["type"] + (response[i]["access"] != "Public" ? " ("+response[i]["access"]+")" : "") + ", Created on: " + response[i]["date"] + "</i></h5>";
        output += "<h5><i>URL: <a style='text-decoration: none;' href='https://zharry.ca/brain/get/" + response[i]["url"] + "/'>" + response[i]["url"] + "</a></i></h5>";
        output += "<p style='font-size: 120%;'>" + (response[i]["data"].length > 750 ? response[i]["data"].substring(0,750) + "..." : response[i]["data"]) + "</p>";
        output += "</div>";
    }
    output += "</div>";
    document.getElementById("searchresults").innerHTML = output;
    document.getElementById("spinner").style.display = "none";
}