<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'username', 'password', 'token', 'firstname', 'lastname', 'photo', 'email', 'linkedin',
    ];

    function attendees() {
        return $this->hasMany('App\Attendee');
    }
}
