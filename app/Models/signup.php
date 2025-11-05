<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Signup extends Model
{
    protected $table = 'signups'; 

    protected $fillable = [
        'email',
        'username',
        'password',
    ];

    public $timestamps = false;

    /**
     * Hash password automatically when setting it.
     * If the value already looks like a hash (bcrypt/argon), keep it as-is.
     */
    public function setPasswordAttribute($value)
    {
        if ($value === null || $value === '') {
            $this->attributes['password'] = $value;
            return;
        }

        // Don't re-hash if it already appears to be a hashed value
        if (Str::startsWith($value, '$2y$') || Str::startsWith($value, '$argon2')) {
            $this->attributes['password'] = $value;
            return;
        }

        $this->attributes['password'] = Hash::make($value);
    }
}
