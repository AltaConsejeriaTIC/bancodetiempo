<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesSites extends Model
{
    protected $fillable = ["name", "icon"];

    public function sites()
    {
        return $this->hasMany(SuggestedSites::class, 'category_site_id', 'id');
    }
}
