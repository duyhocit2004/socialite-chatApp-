<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'post_id',
        'comment_message',
        'parent_id',
        'status',
    ];
}
