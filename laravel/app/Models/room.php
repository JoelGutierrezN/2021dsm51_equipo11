<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank',
        'cost',
        'resume',
        'large_description',
        'img',
        'name'
    ];

    protected $attributes = [
        'img' => 'img/rooms/room.png'
    ];

    protected $table = 'rooms';
}
