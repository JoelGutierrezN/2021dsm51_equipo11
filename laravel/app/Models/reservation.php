<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'date',
        'date_start',
        'date_left',
        'subtotal',
        'total',
        'homeservice',
        'active',
        'room_id',
        'address_id',
        'user_id',
        'reservation_id',
    ];

    protected $table = 'reservations';
}
