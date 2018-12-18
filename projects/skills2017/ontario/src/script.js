function toggleMenu() {
	$("#mobileMenu").slideToggle("slow", function() {});
}

function edit(id, title, content, imgs) {
	document.getElementById("editId").value = id;
	document.getElementById("deleteId").value = id;
	document.getElementById("editTitle").value = title;
	document.getElementById("editContent").value = content;
	document.getElementById("editImages").value = imgs;
}