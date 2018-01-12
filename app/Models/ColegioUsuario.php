<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colegio;

class ColegioUsuario extends Model
{
    protected $fillable = ["colegio_id", "user_id"];
    
    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }
}
