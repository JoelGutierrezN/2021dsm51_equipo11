<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations_has_services extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'services_id'
    ];

    protected $table = 'reservations_has_services';
}
