<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class storysMedias extends Model
{
    protected $table = 'story_medias';
    protected $fillable = [
        'story_id',
        'type',
        'url_media',
        'madia_index',
    ];
}
