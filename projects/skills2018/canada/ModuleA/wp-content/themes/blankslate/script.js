// Sidebar Styling
var sidebarWidgetForm = document.getElementById("searchform");
sidebarWidgetForm.children[0].classList.add("sidebarDiv");
sidebarWidgetForm.children[0].classList.add("form-inline");
sidebarWidgetForm.children[0].children[1].classList.add("form-control");
sidebarWidgetForm.children[0].children[2].classList.add("btn");
sidebarWidgetForm.children[0].children[2].classList.add("btn-primary");


// Footer Styling
var footerWidgets = document.getElementById("footer-widgets").children[0];
footerWidgets.classList.add("row");
footerWidgets.children[0].classList.add("col-md-4");
footerWidgets.children[1].classList.add("col-md-4");
footerWidgets.children[2].classList.add("col-md-4");

// Banner Code
var currentBanner = 0;
setBanner(0);
// Auto slideshow
setInterval(function() {moveBanner(1)}, 5000);

function moveBanner(amount) {
	currentBanner += amount;
	displayBanner(currentBanner);
}
function setBanner(ID) {
	currentBanner = ID;
	displayBanner(currentBanner);
}
function displayBanner(cB) {
	var banners = document.getElementsByClassName("bannerImg");
	var indicators = document.getElementsByClassName("bannerIndicator");
	var descs = document.getElementsByClassName("bannerDesc");
	if (cB > banners.length - 1) {
		currentBanner = 0;
	} else if (cB < 0) {
		currentBanner = banners.length - 1;
	}
	for (i = 0; i < banners.length; i++) {
		banners[i].style.display = "none";
		descs[i].style.display = "none";
		indicators[i].classList.remove("indicatorActive");
	}
	banners[currentBanner].style.display = "block";
	descs[currentBanner].style.display = "block";
	indicators[currentBanner].classList.add("indicatorActive");
}