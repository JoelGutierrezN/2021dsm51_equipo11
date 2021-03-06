<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countrie extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'status',
        'state_id'
    ];

    protected $table = 'countries';
}
