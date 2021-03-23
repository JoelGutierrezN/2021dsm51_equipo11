<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'date' => $this->date,
            'date_start' => $this->date_start,
            'date_left' => $this->date_left,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'homeservice' => $this->homeservice,
            'active' => $this->active,
            'address_id' => $this->address_id,
            'user_id' => $this->user_id
        ];
    }
}
