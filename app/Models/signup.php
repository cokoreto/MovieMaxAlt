<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $table = 'signups'; 

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public $timestamps = false;
}
