<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emojis extends Model
{
    protected $table = 'emojis';
    protected $fillable = [
        'name',
        'code_emoji',
        'type_emoji',
    ];
}
