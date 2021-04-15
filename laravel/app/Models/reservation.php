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
        'user_id'
    ];

    protected $attributes = [
        'active' => 1,
        'homeservice' => 0
    ];
    protected $table = 'reservations';

    public function room(){
        return $this->belongsTo(room::class, 'room_id');
    }

    public function direccion(){
        return $this->belongsTo(address::class, 'address_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
