<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = ['service_id','user_id','type_report_id','observation'];

    public function TypeReport()
    {

        return $this->belongsTo(TypeReport::class);


    }
}