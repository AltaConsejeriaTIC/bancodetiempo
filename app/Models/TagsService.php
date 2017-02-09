<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsService extends Model
{
	public function service(){
	
		return $this->belongsTo(Service::class);
	
	}
	
	public function tags(){
	
		return $this->belongsTo(Tag::class);
	
	}
	
}
