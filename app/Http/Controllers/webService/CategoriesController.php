<?php

namespace App\Http\Controllers\webService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function allCategories(Request $request){
        $categories = Category::orderBy("category", "asc")->get();
        return response()->json($categories->toArray());
    }
}
