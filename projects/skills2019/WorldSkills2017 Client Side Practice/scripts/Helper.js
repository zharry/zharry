function ajax(params, url, callback) {
	/* Params format
	[ {name: name, val: val}, ... ]
	*/
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			callback(this.responseText);
		}
	}
	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	var requestData = "";
	for (var i = 0; i < params.length; i++) {
		requestData += params[i].name + "=" + params[i].val + (i != params.length - 1 ? "&" : "");
	}
	xhttp.send(requestData);
}

function getColliding(obj, list = allObjects) {
    var col = [];
    for (var i = 0; i < list.length; ++i) {
        var tw = obj.colBox.lx;
        var th = obj.colBox.ly;
        var rw = list[i].colBox.lx;
        var rh = list[i].colBox.ly;
        if (!(rw <= 0 || rh <= 0 || tw <= 0 || th <= 0)) {
            var tx = obj.x + obj.colBox.ox;
            var ty = obj.y + obj.colBox.oy;
            var rx = list[i].x + list[i].colBox.oy;
            var ry = list[i].y + list[i].colBox.oy;
            rw += rx;
            rh += ry;
            tw += tx;
            th += ty;
            if ((rw < rx || rw > tx) && (rh < ry || rh > ty) && (tw < tx || tw > rx) && (th < ty || th > ry))
                if (list[i] != obj)
                    col.push(list[i]);
        }
    }
    return col;
}

function clamp(num, min, max) {
	return num > max ? max : (num < min ? min : num);
}

function swap(list, i, j) {
	var temp = list[i];
	list[i] = list[j];
	list[j] = temp;	
}

function swapCopy(list, i, j) {
	var temp = JSON.parse(JSON.stringify(list[i]));
	list[i] = JSON.parse(JSON.stringify(list[j]));
	list[j] = JSON.parse(JSON.stringify(temp));	
}

function arrayRemove(arr, value) {
   return arr.filter(function(ele) {
       return ele != value;
   });
}

function sortPlanets(list, length) {
	if (length <= 1)
		return;
	var largestIndex = -1;
	var largestVal = 0;
	for (var i = 0; i < length; i++) {
		if (list[i].colBox.lx > largestVal) {
			largestIndex = i;
			largestVal = list[i].colBox.lx;
		}
	}
	// Swap Largest with Last
	swap(list, length - 1, largestIndex)
	sortPlanets(list, length - 1);
}

function sortLeaderboard(list, length) {
	if (length <= 1)
		return;
	var largestIndex = 0;
	var largestScore = parseInt(list[0].score);
	var smallestTime = parseInt(list[0].time);
	var smallestID = parseInt(list[0].id);
	for (var i = 1; i < length; i++) {
		if (parseInt(list[i].score) > largestScore) {
			largestIndex = i;
			largestScore = parseInt(list[i].score);
			smallestTime = parseInt(list[i].time);
			smallestID = parseInt(list[i].id);
		}
		if (parseInt(list[i].score) == largestScore) {
			if (parseInt(list[i].time) < smallestTime) {
				largestIndex = i;
				smallestTime = parseInt(list[i].time);
				smallestID = parseInt(list[i].id);
			}
			if (parseInt(list[i].time) == smallestTime) {
				if (parseInt(list[i].id) < smallestID) {
					largestIndex = i;
					smallestID = parseInt(list[i].id);
				}
			}
		}
	}
	
	// Swap Largest with Last
	swapCopy(list, length - 1, largestIndex);
	sortLeaderboard(list, length - 1);
}