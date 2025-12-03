<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postReactions extends Model
{
    protected $table = 'post_reactions';
    protected $fillable = [
        'post_id',
        'user_id',
        'feelling',
    ];
}
