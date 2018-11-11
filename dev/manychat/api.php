<?php

    $data = json_decode(file_get_contents('php://input'), true);
    var_dump($data);
    var_dump($_POST);
    if($data["authToken"] == "abc123") {
        $req = $data["req"];
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