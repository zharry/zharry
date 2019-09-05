<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'event_id', 'title', 'room', 'speaker',
    ];
}
