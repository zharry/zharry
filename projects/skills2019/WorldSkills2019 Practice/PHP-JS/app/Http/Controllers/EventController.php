<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function get()
    {
        $events = Event::all();
        return response(EventResource::collection($events), 200);
    }

//    public function show($id)
//    {
//        //Get the task
//        $task = Event::findOrfail($id);
//
//        // Return a single task
//        return new EventResource($task);
//    }
//
//    public function destroy($id)
//    {
//        //Get the task
//        $task = Event::findOrfail($id);
//
//        if($task->delete()) {
//            return new EventResource($task);
//        }
//
//    }
//
//    public function store(Request $request)  {
//
//        $task = $request->isMethod('put') ? Event::findOrFail($request->id) : new Event;
//
//        $task->fill($request->all());
//
//        if($task->save()) {
//            return new EventResource($task);
//        }
//
//    }
}
