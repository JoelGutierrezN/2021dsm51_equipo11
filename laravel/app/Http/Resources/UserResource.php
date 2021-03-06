<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password,
            'cellphone' => $this->cellphone,
            'phone' => $this->phone,
            'rank' => $this->rank,
            'img' => $this->img,
            'active' => $this->active
        ];
    }
}