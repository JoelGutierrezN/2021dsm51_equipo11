<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'race',
        'observations',
        'img',
        'active',
        'user_id'
    ];

    protected $attributes = [
        'img' => 'pet.png',
        'active' => 1
    ];

    protected $table = 'pets';
}
