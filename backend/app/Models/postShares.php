<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postShares extends Model
{
     protected $table = 'post_shares';
    protected $fillable = [
        'user_id',
'post_id',
'share_message',
    ];
}
