<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(Signup::class, 'user_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
