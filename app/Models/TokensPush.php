<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokensPush extends Model
{
    protected $fillable = ["token", "user_id"];
}
