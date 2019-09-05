<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "date" => $this->date,
            "time" => $this->time,
            "duration_days" => $this->duration_days,
            "location" => $this->location,
            "standard_price" => $this->standard_price,
            "capacity" => $this->capacity,
            "sessions" => $this->sessions
        ];
    }
}

