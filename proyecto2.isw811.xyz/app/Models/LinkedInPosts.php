<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedInPosts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'user_access_token',
        'user_code'
    ];
}
