<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'card' => $this->card,
            'paypal_account' => $this->paypal_account,
            'date' => $this->date,
            'invoice' => $this->invoice,
            'owner_name' => $this->owner_name
        ];
    }
}
