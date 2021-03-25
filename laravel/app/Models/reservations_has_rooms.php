<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations_has_rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'room_id'
    ];

    protected $table = 'reservations_has_rooms';
}