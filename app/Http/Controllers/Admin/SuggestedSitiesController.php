<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesSites;
use App\Models\SuggestedSites;

class SuggestedSitiesController extends Controller
{
    public function index(){

        $categories = CategoriesSites::all();

        return view("admin/suggestedSites/index", compact("categories"));

    }

    public function createCategory(Request $request){

        CategoriesSites::create([
            "name" => $request->input("name"),
            "icon" => $request->input("icon", 'bookmark')
        ]);


        return redirect()->back();
    }

    public function editCategory(Request $request){

        CategoriesSites::find($request->input('categoryId'))->update([
            "name" => $request->input("name"),
            "icon" => $request->input("icon", 'bookmark')
        ]);


        return redirect()->back();
    }

    public function deleteCategory(Request $request){

        CategoriesSites::find($request->input('categoryId'))->delete();

        return redirect()->back();
    }

    public function createSite(Request $request){


        $this->validate($request, [
            'name' => 'required|max:100',
            'address' => 'required',
            'coordinates' => 'required'
        ]);

        $requirements = str_replace(PHP_EOL, '\ \r\n', $request->input("requirements"));
        $contact = str_replace(PHP_EOL, '\ \r\n', $request->input("contact"));
        $description = str_replace(PHP_EOL, '\ \r\n', $request->input("description"));

         SuggestedSites::create([
            "name" => $request->input("name"),
            "address" => $request->input("address"),
            "requirements" => $requirements,
            "contact" => $contact,
            "description" => $description,
            "coordinates" => $request->input("coordinates"),
            "category_site_id" => $request->input("categoryId")
        ]);


        return redirect()->back();
    }

    public function editSite(Request $request){

        $this->validate($request, [
            'name' => 'required|max:100',
            'address' => 'required',
            'coordinates' => 'required'
        ]);

         SuggestedSites::find($request->input('siteId'))->update([
            "name" => $request->input("name"),
            "address" => $request->input("address"),
            "requirements" => $request->input("requirements"),
            "contact" => $request->input("contact"),
            "description" => $request->input("description"),
            "coordinates" => $request->input("coordinates")
        ]);


        return redirect()->back();
    }

    public function deleteSite(Request $request){
        SuggestedSites::find($request->input('siteId'))->delete();
        return redirect()->back();
    }
}
