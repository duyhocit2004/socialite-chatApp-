<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'content',
        'object',
        'location',
        'feelling',
        'post_status_id',
        'source_type',
        'source_id',
    ];
}
