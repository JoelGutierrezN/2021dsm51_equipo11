<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'rank' => $this->rank,
            'cost' => $this->cost,
            'resume' => $this->resume,
            'large_description' => $this->large_description,
            'img' => $this->img,
            'name' => $this->name,
            'active' => $this->active,
        ];
    }
}
