<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->paginate(6);
        return view('admin/categories/list',compact('categories'));
    }

    public function changeField(Request $request){
        $response = [];

        $category = Category::find($request->id);

        if(is_null($category)){
            $response["status"] = "failed";
            $response["message"] = "La categoria no existe";
        }

        if($category->update([
            $request->field => $request->newValue
        ])){
            $response["status"] = "success";
            $response["message"] = "La categoría se actualizo con éxito";
        }else{
            $response["status"] = "failed";
            $response["message"] = "No se pudo actualizar la información";
        }

        return response()->json($response);
    }

    public function delete(Request $request){

        Category::find($request->input('id_category'))->delete();

        return redirect()->back();

    }
}
