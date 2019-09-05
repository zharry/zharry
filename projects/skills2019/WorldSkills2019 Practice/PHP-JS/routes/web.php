<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Session;

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/login', function (Request $request) {
    if ($request->session()->get('loggedIn')) {
        return redirect('/manage');
    }
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    $users = User::where('username', '=', $request->input('username'))->get();

    // Check if user exists
    if (sizeof($users) === 0) {
        $request->session()->flash('error', 'User or password not correct');
        return redirect('/login');
    } else {
        $user = $users[0];
        // Check if password is correct
        if (!password_verify($request->input('password'), $user["password"])) {
            $request->session()->flash('error', 'User or password not correct');
            return redirect('/login');
        }

        $request->session()->put('loggedIn', true);
        $request->session()->put('username', $request->input('username'));
    }
    return redirect('/manage');
});

Route::get('/logout', function (Request $request) {
    $request->session()->put('loggedIn', false);
    return redirect('/');
});

Route::get('/manage', function (Request $request) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    return view('events.index', ['events' => Event::all()]);
});

Route::get('/detail/{id}', function (Request $request, $id) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    $events = Event::all();
    return view('events.detail', ['event' => Event::findOrFail($id)]);
});

Route::get('/edit/{id}', function (Request $request, $id) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    $events = Event::all();
    return view('events.edit', ['event' => Event::findOrFail($id)]);
});

Route::post('/edit/{id}', function (Request $request, $id) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    $event = Event::findOrFail($id);
    $event->fill($request->all());
    if($event->save()) {
        $request->session()->flash('message', 'Event successfully saved');
    } else {
        $request->session()->flash('message', 'Save failed');
    }
    return redirect("/detail/{$id}");
});

Route::get('/add', function (Request $request) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    return view('events.create');
});

Route::post('/add', function (Request $request) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    $task = new Event;
    $task->fill($request->all());

    // Check the sessions
    $sessions = $request->input('sessions');
    if (!empty($sessions))
        for ($i = 0; $i < sizeof($sessions); $i++) {
            if (empty($sessions[$i]["title"]) || empty($sessions[$i]["time"]) || empty($sessions[$i]["room"]) || empty($sessions[$i]["speaker"])) {
                $request->session()->flash('create_message', 'Create failed (sessions must all be filled in)');
                return redirect("/manage");
            }
        }

    if($task->save()) {
        // Create the sessions
        if (!empty($sessions))
            for ($i = 0; $i < sizeof($sessions); $i++) {
                $session = new Session;
                $session->fill($sessions[$i]);
                $session->event_id = $task->id;
                if (!$session->save()) {
                    $request->session()->flash('create_message', 'Create failed (session failed to create)');
                    return redirect("/manage");
                }
            }
        $request->session()->flash('create_message', 'Event successfully created');
    } else {
        $request->session()->flash('create_message', 'Create failed');
    }
    return redirect("/manage");
});

Route::get('/attendee/{id}', function (Request $request, $id) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    $res = [];
    $users = \App\User::all();
    foreach ($users as $user)
        foreach ($user->attendees as $attendee)
            if ($attendee->event_id == $id)
                array_push($res, $user);
    return view('events.attendee', ['attendees' => $res]);
});

Route::get('/rating/{id}', function (Request $request, $id) {
    if (!$request->session()->get('loggedIn')) {
        return redirect('/login');
    }
    $total = 0;
    $res = [0,0,0];
    $attendees = \App\Attendee::where('event_id', '=', $id)->get();
    foreach ($attendees as $attendee) {
        if ($attendee->rating >= 0) {
            $res[$attendee->rating]++;
            $total++;
        }
    }
    $percentages = [0,0,0];
    if ($total > 0)
        $percentages = [$res[0]/$total, $res[1]/$total, $res[2]/$total];
    for($i = 0; $i < 3; $i++) {
        $percentages[$i] = '' . round($percentages[$i] * 100, 2) . '%';
    }
    return view('events.rating', ['ratings' => $res, 'percentages' => $percentages]);
});