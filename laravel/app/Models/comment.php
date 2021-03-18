<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'image_id',
        'user_id'
    ];

    protected $table = 'comments';

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

    public function image(){
        return $this->belongsTo(image::class, 'id');
    }
}
