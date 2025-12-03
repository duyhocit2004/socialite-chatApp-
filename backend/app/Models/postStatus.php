<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postStatus extends Model
{
     protected $table = 'post_status';
    protected $fillable = [
        'name'
    ];
}
