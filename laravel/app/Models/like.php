<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'user_id'
    ];

    protected $table = 'likes';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image(){
        return $this->belongsTo(image::class, 'image_id');
    }
}
