<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\serviceScore;
use App\Models\Deal;
use App\Models\Conversations;


class Service extends Model
{
	protected  $fillable = ['name', 'description', 'value', 'virtually', 'presently', 'image', 'user_id', 'category_id', 'state_id'];


	public function user(){

		return $this->belongsTo(User::class);

	}

	public function category(){

		return $this->belongsTo(Category::class);

	}
    public function state(){

        return $this->belongsTo(State::class);

    }
	public function tags(){

		return $this->hasMany(TagsService::class);

	}

    public function serviceScore(){

		return $this->hasMany(serviceScore::class);

	}

    public function reports(){

        return $this->hasMany(Reports::class);

    }

	public function setImageAttribute($value)
    {

        if (!empty($value) && $value != '') {

            $this->attributes['image'] = $value;

        }
    }

    public function conversations(){
        return $this->hasMany(Conversations::class);
    }

    public function deals(){
        return $this->hasMany(Deal::class);
    }

    static function getServicesActive(){
        return Service::select('services.*')
                        ->join('users','users.id','=','services.user_id')
                        ->where('services.state_id' , 1)
                        ->where('users.state_id', 1)
                        ->orderBy("created_at","desc");
    }
	
}
