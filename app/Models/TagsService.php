<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsService extends Model
{
	protected  $fillable = ['tag_id', 'service_id'];
	
	public function service(){
	
		return $this->belongsTo(Service::class);
	
	}
	
	public function tag(){
	
		return $this->belongsTo(Tag::class);
	
	}
	
}
