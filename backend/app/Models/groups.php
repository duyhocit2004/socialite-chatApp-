<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
     protected $table = 'groups';
    protected $fillable = [
        'name',
        'description',
        'main_image',
        'sub_image',
        'select_privacy',
        'created_by',
        'status',
    ];
}
