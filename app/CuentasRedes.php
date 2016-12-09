<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentasRedes extends Model
{
    protected  $fillable = ['user_id', 'proveedor_id', 'proveedor'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
