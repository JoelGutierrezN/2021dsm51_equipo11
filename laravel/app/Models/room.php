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
        'name',
        'active'
    ];

    protected $attributes = [
        'img' => null,
        'active' => 1
    ];

    protected $table = 'rooms';

}
