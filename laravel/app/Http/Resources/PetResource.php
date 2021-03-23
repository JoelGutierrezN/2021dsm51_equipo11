<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
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
            'name' => $this->name,
            'race' => $this->race,
            'observations' => $this->observations,
            'img' => $this->img,
            'active' => $this->active,
            'user_id' => $this->user_id
        ];
    }
}
