<?php

namespace App\Models\sanctum;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $table = "personal_access_tokens";
    protected $fillable = [
        'name',
        'token',
        'abilities',
        'expires_at',
        'device'
    ];
}
