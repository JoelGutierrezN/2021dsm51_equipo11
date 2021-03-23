<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'cost',
        'premium',
        'resume',
        'large_description',
        'img'
    ];

    protected $attributes = [
        'premium' => 0,
        'img' => null
    ];
}
