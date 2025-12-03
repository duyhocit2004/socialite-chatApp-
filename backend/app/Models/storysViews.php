<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class storysViews extends Model
{
    protected $table = 'story_views';
    protected $fillable = [
        'story_id',
        'viewer_id',
    ];
}
