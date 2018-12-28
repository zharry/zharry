/* Javascript Functions
For: The Hunton Collection Website
*/


// Script for Non-Admin Pages
function onLoad() {
	$("#navContainer").hide();
	$("#menuIcon").click(function () {
		$("#navContainer").slideToggle("fast");
	});
}

function searchMovie(fetchAll = false) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (xhttp.status == 200 && xhttp.readyState == 4) {
			document.getElementById("searchedMovies").innerHTML = "";
			var result = JSON.parse(xhttp.responseText);
			for (var i = 0; i < result.length; i++) {
				var movieListing = document.createElement("div");
				movieListing.classList.add("movieListing");
				movieListing.innerHTML = `<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-2 movieListingImg">
						<img src="` + result[i].media + `"></img>
					</div>
					<div class="col-lg-8 movieListingData">
						<div class="movieListingTitle">
							` + result[i].title + `
						</div>
						<div class="movieListingDesc">
							` + result[i].desc + `
						</div>
						<br/>
						<div class="movieListingBuy">
							<button type="button" class="btn btn-success" style="width: 100px;">Buy</button>
						</div>
						<hr/>
					</div>
					<div class="col-lg-1"></div>
				</div>`;
				
				// Add to Main Page
				document.getElementById("searchedMovies").innerHTML = document.getElementById("searchedMovies").innerHTML + movieListing.outerHTML;
			}
			document.getElementById("searchedMovies").innerHTML = document.getElementById("searchedMovies").innerHTML + "<br/><br/><br/><br/>";
		}
	}
	xhttp.open("POST", "api/search.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	if (fetchAll) {
		xhttp.send("query=");
	} else {
		xhttp.send("query="+document.getElementById("searchfield").value);
	}
}

// Scripts for Admin Page
function editMovie(id) {
	window.location.href="#editMovie";
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (xhttp.status == 200 && xhttp.readyState == 4) {
			var data = JSON.parse(xhttp.responseText);
			document.getElementById("editID").value = data[0].id;
			document.getElementById("editTitle").value = data[0].title;
			document.getElementById("editImg").value = data[0].media;
			document.getElementById("editDesc").value = data[0].description;
		}
	}
	xhttp.open("POST", "../api/getmovie.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("id="+id);
}
function deleteMovie(id) {
	var delButton = document.getElementById("del-"+id);
	delButton.innerHTML = "Confirm Delete";
	delButton.setAttribute("onclick", "confirmDelete("+id+")");
}
function confirmDelete(id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (xhttp.status == 200 && xhttp.readyState == 4) {
			alert("Database manipulation is disabled for security purposes!");
			window.location.href = "index.php";
		}
	}
	xhttp.open("POST", "../api/deletemovie.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("id="+id);
}