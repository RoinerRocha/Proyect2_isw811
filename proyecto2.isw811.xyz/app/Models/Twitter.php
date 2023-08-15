<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',
        'user_access_token',
        'twitter_secret'
    ];
}
