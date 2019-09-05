<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request) {
        $users = User::where('token', '=', $request->get('token'))->get();
        if (sizeof($users) > 0) {
            $user = $users[0];

            // Check if event exists
            try {
                Event::findOrFail($request->input('event_id'));
            } catch (ModelNotFoundException $e) {
                return response(["message" => "Not found"], 404);
            }

            // Create attendee entry
            $attendee = new Attendee;
            $attendee->event_id = $request->input('event_id');
            $attendee->user_id = $user["id"];
            $attendee->registration_type = $request->input('registration_type');
            $attendee->calculated_price = $request->input('calculated_price');
            $attendee->rating = -1;
            if ($attendee->save()) {
                return response(["message" => "Registration success"], 200);
            }
        }
    }
    public function show(Request $request) {
        $users = User::where('token', '=', $request->get('token'))->get();
        if (sizeof($users) > 0) {
            $user = $users[0];
            $attendees = Attendee::where('user_id', '=', $user["id"])->get();
            return $attendees;
        }
    }
    public function rate(Request $request, $id) {
        $attendee = Attendee::findOrFail($id);
        $attendee->rating = $request->input('event_rating');
        if ($attendee->save()) {
            return response(["message" => "Rating success"], 200);
        }
    }
}
