<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations_has_pets extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'pet_id'
    ];

    protected $table = 'reservations_has_pets';

    public function pets()
    {
        return $this->hasManyThrough(reservation::class, pet::class);
    }
}
