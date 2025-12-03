<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userFollow extends Model
{
    protected $table = 'user_follows';
    protected $fillable = [
        'follower_id',
        'following_id',
        'status',
    ];
}
