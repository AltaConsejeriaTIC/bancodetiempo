<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\ServiceAdmin;
use App\User;

class ServiceAdminController extends Controller
{
    public function index($serviceId){

        return view("services/serviceAdmin");

    }

    public function create(Request $request){
        $category = Category::find($request->input("categoryService"));
        $cover = Helpers::uploadImage($request->file('imageService'), 'services'.date("Ymd").rand(000,999), 'resources/user/user_'. Auth::User()->id . '/services/');
        if(!$cover){
            $cover = "resources/".$category->image;
        }

        $service = ServiceAdmin::create([
            'name' => $request->input('serviceName'),
            'description' => $request->input('descriptionService'),
            'value' => $request->input('valueService'),
            'virtually' =>$request->input('modalityServiceVirtually', 0),
            'presently' =>$request->input('modalityServicePresently', 0),
            'image' => $cover,
            'category_id' => $request->input('categoryService'),
            'state_id' => 1
        ]);

        return redirect()->back();

    }

    public function update(Request $request){

        $cover = Helpers::uploadImage($request->file('imageService'), 'services'.date("Ymd").rand(000,999), 'resources/user/user_'. Auth::User()->id . '/services/');
        if(!$cover){
            $cover = "";
        }

        $service = ServiceAdmin::find($request->input("service_id"))->update([
            'name' => $request->input('serviceName'),
            'description' => $request->input('descriptionService'),
            'value' => $request->input('valueService'),
            'virtually' =>$request->input('modalityServiceVirtually', 0),
            'presently' =>$request->input('modalityServicePresently', 0),
            'image' => $cover,
            'category_id' => $request->input('serviceCategory'),
            'state_id' => 1
        ]);

        return redirect()->back();
    }

    public function listServiceAdmin(){
        $services = ServiceAdmin::orderBy('created_at', "desc");
        $services = $services->paginate(10);
        return view("admin/serviceAdmin/list", compact('services'));
    }

}
