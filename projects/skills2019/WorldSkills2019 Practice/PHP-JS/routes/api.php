<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Get Events
Route::middleware('token')->get ('v1/events','EventController@get');
// Register for event
Route::middleware('token')->post('v1/registrations','RegistrationController@register');
// Show registered events
Route::middleware('token')->get ('v1/registrations','RegistrationController@show');
// Rate a registered event
Route::middleware('token')->put ('v1/registrations/{id}','RegistrationController@rate');
// Login a user
Route::post('v1/login','UserController@login');
// Logout a user
Route::middleware('token')->get ('v1/logout','UserController@logoff');
// Create user
Route::post('v1/profile','UserController@create');


//// get specific task
//Route::middleware('token')->get('event/{id}','EventController@show');
//// create new task
//Route::middleware('token')->post('event','EventController@store');
//// update existing task
//Route::middleware('token')->put('event','EventController@store');
//// delete a task
//Route::middleware('token')->delete('event/{id}','EventController@destroy');
