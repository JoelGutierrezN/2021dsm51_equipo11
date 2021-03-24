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
<<<<<<< HEAD

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image(){
        return $this->belongsTo(image::class, 'image_id');
    }
=======
>>>>>>> parent of 172b006 (avances foro)
}
