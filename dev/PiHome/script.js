var apiURL = "https://api.openweathermap.org/data/2.5/weather?q=Waterloo,ca&appid=8993d58e3871dbf4813fbfa399dd7653";

function getWeather() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("iconImg").src = "icon/" + data.weather[0].icon + ".png";
            document.getElementById("temp").innerHTML = Math.round(data.main.temp - 273.15) + "&deg;C";
            document.getElementById("weather").innerHTML = data.weather[0].description;
            //var icon = data[];
        }
    };
    xhttp.open("GET", apiURL, true);
    xhttp.send();
    
    setTimeout(getWeather, 30000);
}

function onLoad() {
    getWeather();
}