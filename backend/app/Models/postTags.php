<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postTags extends Model
{
     protected $table = 'post_tags';
    protected $fillable = [
        'user_id',
'post_id',
'tagged_by',
    ];
}
