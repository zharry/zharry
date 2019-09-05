<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'title', 'description', 'date', 'time', 'duration_days', 'location', 'standard_price', 'capacity',
    ];

    function sessions() {
        return $this->hasMany('App\Session');
    }
}
