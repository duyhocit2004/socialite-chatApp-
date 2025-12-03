<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class storyReactions extends Model
{
     protected $table = 'story_reactions';
    protected $fillable = [
        'story_id',
        'user_id',
        'emoji_id',
    ];
}
