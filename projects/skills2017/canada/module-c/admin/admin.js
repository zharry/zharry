function edit(id) {
	document.getElementById("editWarning").style.display = "none";
	document.getElementById("editContent").style.display = "block";
	
	document.getElementById("editStart").type = "text";
	document.getElementById("editEnd").type = "text";
	
	row = document.getElementById(id).getElementsByTagName("td");
	editID = row[0].innerHTML;
	name = row[1].innerHTML;
	description = row[2].innerHTML;
	img = row[3].innerHTML;
	startDate = row[4].innerHTML;
	endDate = row[5].innerHTML;
	
	document.getElementById("editID").value = editID;
	document.getElementById("editName").value = name;
	document.getElementById("editDesc").value = description;
	document.getElementById("editImg").value = img;
	document.getElementById("editStart").value = startDate;
	document.getElementById("editEnd").value = endDate;
	
	document.getElementById("editStart").type = "date";
	document.getElementById("editEnd").type = "date";
}

function cancelEdit() {
	document.getElementById("editWarning").style.display = "block";
	document.getElementById("editContent").style.display = "none";
	
	document.getElementById("editStart").type = "text";
	document.getElementById("editEnd").type = "text";
	
	document.getElementById("editID").value = "";
	document.getElementById("editName").value = "";
	document.getElementById("editDesc").value = "";
	document.getElementById("editImg").value = "";
	document.getElementById("editStart").value = "";
	document.getElementById("editEnd").value = "";
	
	document.getElementById("editStart").type = "date";
	document.getElementById("editEnd").type = "date";
}

function del(id) {
	row = document.getElementById(id).getElementsByTagName("td");
	
	document.getElementById("deleteWarning").style.display = "none";
	document.getElementById("deleteContent").style.display = "block";
	
	editID = row[0].innerHTML;
	name = row[1].innerHTML;
	
	document.getElementById("deleteID").value = editID;
	document.getElementById("deleteName").value = name;
}

function sortTable(n) {
	var table = document.getElementById("allTickets");
	var	switchcount = 0;
	var dir = "asc";
	var switching = true;
	var rows, i, x, y, shouldswitch;
	while (switching) {
		switching = false;
		rows = table.getElementsByTagName("tr");
		for (i = 1; i < rows.length - 1; i++) {
			shouldswitch = false;
			x = rows[i].getElementsByTagName("td")[n];
			y = rows[i + 1].getElementsByTagName("td")[n];
			if (dir = "asc") {
				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					shouldswitch = true;
					break;
				}
			} else {
				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
					shouldswitch = true;
					break;
				}
			}
		}
		if (shouldswitch) {
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
			switchcount++;
		}
	}
}