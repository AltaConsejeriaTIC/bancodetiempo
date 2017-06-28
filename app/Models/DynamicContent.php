<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicContent extends Model
{
    protected $fillable = ['name', 'description', 'html'];

    static function printContent($name){

        return DynamicContent::where('name', $name)->get()->last()->html;

    }
}
