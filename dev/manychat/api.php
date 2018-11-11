<?php

    $data = json_decode(file_get_contents('php://input'), true);
    
    $return = json_decode('{
        "version": "v2",
        "content": {
            "messages": [
                {
                   "type": "text",
                   "text": "Auth Token invalid!"    
                }
            ]
        }
    }');
    
    if($data["authToken"] == "abc123") {
        $req = $data["req"];
        if ($req == "weather")
            $return["content"]["messages"][0]["text"] = "Waterloo, ON: 11/11/2018 - 3 Degrees, Feels Like 0. 70% POP, Light Snow";
        else if ($req == "phone")
            $return["content"]["messages"][0]["text"] = "123-456-7890";
        else if ($req == "address")
            $return["content"]["messages"][0]["text"] = "123 Address Ave.";
    }
    
    var_dump($data);
    var_dump($return);
    var_dump($_POST);
    
    echo json_encode($return);

?>