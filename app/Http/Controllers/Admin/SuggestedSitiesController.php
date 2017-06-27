<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesSites;

class SuggestedSitiesController extends Controller
{
    public function index(){

        $categories = CategoriesSites::all();

        return view("admin/suggestedSites/index", compact("categories"));

    }
}
