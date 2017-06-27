<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestedSites extends Model
{
    protected  $fillable = ['name', 'address', 'requirements', 'contact', 'description', 'coordinates', 'category_site_id'];
}
