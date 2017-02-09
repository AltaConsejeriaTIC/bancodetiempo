<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected  $fillable = ['tag']; 

  public function tags(){
  
  	return $this->hasMany(TagsService::class);
  
  }
  
}
