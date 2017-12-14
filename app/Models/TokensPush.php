<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokensPush extends Model
{
    protected $fillable = ["token", "user_id"];
}
