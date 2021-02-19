<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'card',
        'paypal_account',
        'date',
        'invoice',
        'owner_name'
    ];

    protected $table = 'transactions';
}
