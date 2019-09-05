<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'event_id', 'user_id', 'registration_type', 'registration_date', 'calculated_price', 'rating',
    ];
}
