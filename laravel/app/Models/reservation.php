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
        'user_id',
        'room_id',
        'pet_id',
        'address_id',
        'transaction_id',
        'service_id'
    ];

    protected $table = 'reservations';
}
