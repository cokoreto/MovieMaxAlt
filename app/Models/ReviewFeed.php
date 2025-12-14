<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewFeed extends Model
{
    use HasFactory;

    protected $fillable = [
        'signup_id',
        'movie_id',
        'caption',
        'rating',
    ];

    protected $casts = [
        'rating' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(Signup::class, 'signup_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function replies()
    {
        // All replies for this feed (admin can see flat list)
        return $this->hasMany(ReviewFeedReply::class)
            ->with(['user']);
    }
}
