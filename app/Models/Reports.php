<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = ['TypeReport','observation'];

    public function TypeReport()
    {

        return $this->belongsTo(TypeReport::class);


    }
}