<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportsAdmin extends Model
{

    protected $table = 'reports_admin';

    protected  $fillable = ['name', 'user_id', 'fields', 'filters', 'order', 'description'];


}
