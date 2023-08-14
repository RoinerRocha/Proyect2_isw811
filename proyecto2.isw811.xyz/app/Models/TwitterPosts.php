<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterPosts extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_network_name',
        'user_access_token',
        'twitter_secret'
    ];
}
