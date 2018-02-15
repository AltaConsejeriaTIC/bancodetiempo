<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colegio;
use App\User;

class ColegioUsuario extends Model
{
    protected $fillable = ["colegio_id", "user_id"];
    
    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
