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
            'user_id' => $this->user_id,
            'room_id' => $this->room_id,
            'pet_id' => $this->pet_id,
            'address_id' => $this->address_id,
            'transaction_id' => $this->transaction_id
        ];
    }
}
