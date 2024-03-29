<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\State;
use App\User;

class ServiceAdmin extends Model
{
    protected $table = 'services_admin';
    protected  $fillable = ['name','description','value','virtually','presently','image','category_id','state_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function state(){
        return $this->belongsTo(state::class);
    }

    public function setImageAttribute($value){

        if (!empty($value) && $value != '') {

            $this->attributes['image'] = $value;

        }
    }

    static function getServicesActive(){
        return ServiceAdmin::where('state_id', 1)->orderBy('created_at', 'desc');
    }
}
