<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class friendShips extends Model
{
   protected $table = 'friend_ships';
    protected $fillable = [
        'requester_id',
        'receiver_id',
        'status',
    ];
}
