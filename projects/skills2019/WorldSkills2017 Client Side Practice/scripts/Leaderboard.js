var leaderboard = [];
var noMore = true;
var currentDisplay = 0;
var displayMax = 5;

function updateLeaderboard(newLeaderboard = 0) {
	if (newLeaderboard != 0)
		leaderboard = newLeaderboard;
	
	// Check display bounds
	if (currentDisplay >= leaderboard.length) {
		currentDisplay -= displayMax;
		noMore = true;
		return;
	}
	noMore = false;
	
	// Update Table
	var table = document.getElementById("leaderboard-table");
	table.innerHTML = `<tr>
							<td>#</td>
							<td>Name</td>
							<td>Score</td>
							<td>Time</td>
						</tr>`;
	for (var i = currentDisplay; i < currentDisplay + displayMax; i++) {
		if (i < leaderboard.length)
			table.innerHTML += `<tr>
								<td>` + (i + 1) + `</td>
								<td>` + leaderboard[i].name + `</td>
								<td>` + leaderboard[i].score + `</td>
								<td>` + leaderboard[i].time + `</td>
							</tr>`;
	}
}

function nextPage() {
	currentDisplay += displayMax;
	updateLeaderboard();
}

function prevPage() {
	currentDisplay -= displayMax;
	currentDisplay = currentDisplay < 0 ? 0 : currentDisplay;
	updateLeaderboard();
}