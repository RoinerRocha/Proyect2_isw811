<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedInData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_access_token',
        'user_code'
    ];
}
