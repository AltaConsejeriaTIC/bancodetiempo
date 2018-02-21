<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;
Use Validator;

class CategoryController extends Controller
{
    public function jsonCategories(){

        $categories = Category::all('id', 'category')->toJson();

        print($categories);

    }

    static function getCategoriesActive(){
        return Category::select('categories.id','categories.category')
                                ->join('services','categories.id','=','services.category_id')
                                ->where('services.state_id', 1)
                                ->groupBy('categories.id','categories.category')
                                ->get();
    }

}
