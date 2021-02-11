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
        'addres_id',
        'transaction_id'
    ];
}