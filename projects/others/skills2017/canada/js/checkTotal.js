setInterval(function() {
    
    // Find Total
    var adults = parseInt(document.getElementById("adults").value);
    var children = parseInt(document.getElementById("children").value);
    var seniors = parseInt(document.getElementById("seniors").value);
    var cost = parseInt(adults * 10)  + ((children + seniors) * 8);
    if (document.getElementById("type").checked) {
        cost += 5;
    }
	
	var tax = cost * 0.1;
	var total = cost + tax;
    document.getElementById("total").innerHTML = "<p><b>Subtotal: </b> $" + cost + "</p><p>Tax:  $" + tax + "</p><p><b style=\"font-size: 20px\">Total:  $" + total + "</p>";
},10);