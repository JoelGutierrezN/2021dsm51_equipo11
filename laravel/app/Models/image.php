<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'description',
        'user_id'
    ];

    protected $attributes = [
        'image_path' => 'image.png'
    ];
    protected $table = 'images';

    public function comments(){
        return $this->hasMany(comment::class)->orderBy('id', 'desc');
    }

    public function likes(){
        return $this->hasMany(like::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
