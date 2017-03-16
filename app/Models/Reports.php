<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = ['service_id','user_id','type_report_id','observation'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type_report()
    {
        return $this->belongsTo(TypeReport::class);
    }

}
