<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postMedias extends Model
{
    protected $table = 'post_medias';
    protected $fillable = [
        'post_id',
        'media_url',
        'media_index',
    ];
}
