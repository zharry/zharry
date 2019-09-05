<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function create(Request $request)  {

        // Check if user already exists
        $users = User::all();
        for ($i = 0; $i < sizeof($users); $i++) {
            if ($users[$i]["username"] == $request->input('username')) {
                return response(["message" => "Username already registered"], 422);
            }
            if ($users[$i]["email"] == $request->input('email')) {
                return response(["message" => "User email already registered"], 422);
            }
        }

        $user = new User;
        $user->fill($request->all());
        $user->token = md5($request->input('username'));
        $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT );

        if($user->save()) {
            return response(["token" => $user->token], 200);
        }
    }

    public function login(Request $request) {
        $users = User::where('username', '=', $request->input('username'))->get();

        // Check if user exists
        if (sizeof($users) === 0) {
            return response(["message" => "invalid login"], 401);
        } else {
            $user = $users[0];
            // Check if password is correct
            if (!password_verify($request->input('password'), $user["password"])) {
                return response(["message" => "invalid login"], 401);
            }
            // Set and return token
            $user->token = md5($request->input('username'));
            if($user->save()) {
                return response(["token" => $user->token], 200);
            }
        }
    }

    public function logoff(Request $request) {
        $users = User::where('token', '=', $request->get('token'))->get();
        if (sizeof($users) > 0) {
            $user = $users[0];
            // Clear token
            $user->token = "";
            if($user->save()) {
                return response(["message" => "logout success"], 200);
            }
        }
    }
}
