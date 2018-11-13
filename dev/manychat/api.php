<?php

    $data = json_decode(file_get_contents('php://input'), true);
        
    $return = json_decode('{
        "version": "v2",
        "content": {
            "messages": [{
                "type": "text",
                "text": "Auth Token invalid!"
            }]
        }
    }', true);
    $setUserInfo = json_decode('{
        "version": "v2",
        "content": {
            "messages": [{
                "type": "text",
                "text": "Give me a sec while I look you up in our database..."
            }],
            "actions": [{
                "action": "set_field_value",
                "tag_name": "full_name",
                "value": "John Smith"
            }, {
                "action": "set_field_value",
                "tag_name": "email",
                "value": "john.smith@gmail.com"
            }]
        }
    }', true);
    $setError = json_decode('{
        "version": "v2",
        "content": {
            "messages": [{
                "type": "text",
                "text": "One small problem..."
            }],
            "actions": [{
                "action": "set_field_value",
                "tag_name": "error",
                "value": "WRONG_ROOM"
            }]
        }
    }', true);
    
    $req = $data["req"];
    if($data["auth"] == "abc123") {
        if ($req == "weather")
            $return["content"]["messages"][0]["text"] 
                = "Waterloo, ON: 11/11/2018 - 
                   3 Degrees, Feels Like 0, 
                   70% POP, Light Snow";
        else if ($req == "phone")
            $return["content"]["messages"][0]["text"] 
                = "123-456-7890";
        else if ($req == "address")
            $return["content"]["messages"][0]["text"] 
                = "123 Address Ave.";
    }
    if ($req != "userinfo")
        echo json_encode($return);
    else {
        if ($data["room"] == "Room-101" || $data["room"] == "101")
            echo json_encode($setUserInfo);
        else
            echo json_encode($setError);
    }

?>