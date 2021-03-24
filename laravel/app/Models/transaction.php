<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'card',
        'card_date',
        'cvv',
        'paypal_account',
        'date',
        'invoice',
        'owner_name',
        'reservation_id'
    ];

    protected $table = 'transactions';
}
