setInterval(function() {
    
    // Find Total
    var adults = parseInt(document.getElementById("adults").value);
    var children = parseInt(document.getElementById("children").value);
    var seniors = parseInt(document.getElementById("seniors").value);
    var cost = parseInt(adults * 10)  + ((children + seniors) * 8);
    if (document.getElementById("type").checked) {
        cost += 5;
    }
    document.getElementById("total").innerHTML = "$" + cost + ".00";
},10);