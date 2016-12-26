<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\CategoriesService;

class ServiceController extends Controller
{
		public function user(){

			return $this->belongsTo(User::class);

		}


   public function index(){

   		$categories = Category::all('id', 'category');

   		$selectedCategories = [];

   		foreach ($categories as $category){

   			$selectedCategories[$category['id']] = $category['category'];
   		}

   		$user = Auth::User();

   		$method = 'post';

   		return view('services/formService', compact('selectedCategories', 'method', 'user'));

   }

   public function showService($serviceId = 0){

	   	$categories = Category::all('id', 'category');

	   	$selectedCategories = [];

	   	foreach ($categories as $category){

	   		$selectedCategories[$category['id']] = $category['category'];
	   	}

   		$service = Service::find($serviceId);

   		if(is_null($service)){

   			return redirect('service');

   		}elseif ($service->user_id != Auth::user()->id){

   			return view('services/service', compact('service'));

   		}

   		$user = Auth::User();

   		$method = 'put';

   		return view('services/formService', compact('selectedCategories', 'service', 'method', 'user'));

   }

   public function update(Request $request){


   		$image = $this->uploadCover($request->file('image'));

   		$service = Service::find($request->input('serviceId'))->update([
   				'name' => $request->input('name'),
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtually' => $request->input('virtually'),
   				'category_id' => $request->input('category')
   		]);

   		if($image){
   			$service = Service::find($request->input('serviceId'))->update([

   					'image' => $image

   			]);
   		}

   		return redirect('service/'.$request->input('serviceId'));

   }

   public function create(Request $request){

   		$this->validate($request, [
   				'name' => 'required',
   				'description' => 'required',
   				'value' => 'required|numeric|min:1',
   				'image' => 'required',
   				'category' => 'required'
   		]);

   		$image = $this->uploadCover($request->file('image'));

   		$idService = Service::create([
   				'name' => $request->input('name'),
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtually' => $request->input('virtually'),
   				'image' => $image,
   				'user_id' => Auth::user()->id,
   				'state_id' => 1
   		])->getKey();

   		foreach ($request->input('category') as $category){

   			CategoriesService::create([
   					'category_id' => $category,
   					'service_id' => $idService
   			]);

   		}

   		return redirect('service/'.$idService);

   }

   public function  uploadCover($file){

   		if(!$file){

   			return false;

   		}

   		$imageName = 'img' .Auth::User()->id. '.' . $file->getClientOriginalExtension();

   		$file->move(base_path() . '/public/resources/user/user_'.Auth::User()->id.'/services', $imageName);

   		return $imageName;

   }


}
