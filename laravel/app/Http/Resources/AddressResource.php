<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id' => $this->id,
            'street' => $this->street,
            'number' => $this->number,
            'number_int' => $this->number_int,
            'suburb' => $this->suburb,
            'country_id' => $this->country_id,
            'user_id' => $this->user_id
        ];
    }
}
