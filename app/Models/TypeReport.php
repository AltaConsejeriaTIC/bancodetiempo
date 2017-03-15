<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TypeReport extends Model
{
    protected $fillable = ['type'];

    public function reports()
    {
        return $this->hasMany(Reports::class);
    }

}