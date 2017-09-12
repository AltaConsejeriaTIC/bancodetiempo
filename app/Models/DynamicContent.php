<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicContent extends Model
{
    protected $fillable = ['name', 'description', 'html'];

    static function printContent($name){

    	$content = DynamicContent::where('name', $name)->get()->last();
    	if(is_null($content)){
    		return  "";
    	}else{
    		return $content->html;
    	} 

    }
}
