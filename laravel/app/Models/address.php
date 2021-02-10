<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'number_int',
        'suburb',
        'state_id',
        'country_id',
        'user_id'
    ];
}
