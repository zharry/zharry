<?php

    if($_POST["authToken"] == "abc123") {
        $req = $_POST["req"];
        if ($req == "weather")
            echo "Waterloo, ON: 11/11/2018 - 3 Degrees, Feels Like 0. 70% POP, Light Snow";
        else if ($req == "phone")
            echo "123-456-7890";
        else if ($req == "address")
            echo "123 Address Ave.";
    } else {
        echo "Auth Token invalid!";
    }

?>