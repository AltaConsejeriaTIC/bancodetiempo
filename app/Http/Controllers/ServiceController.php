<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\CategoriesService;
use PhpParser\Node\Expr\Print_;

class ServiceController extends Controller
{	
	
   public function index(){
   	
   		$categories = Category::all('id', 'category');
   		
   		$selectedCategories = [];
   		   		   		
   		$method = 'post';
   		
   		return view('services/formService', compact('categories', 'method'));
   	
   }   
   
   public function showService($serviceId){
   
	   	$categories = Category::all('id', 'category');
  	
   		$service = Service::findOrFail($serviceId);
   		
   		if ($service->user_id != Auth::user()->id){
   			
   			return view('services/service', compact('service'));
   			
   		} 
   		
   		foreach ($service->categories as $selected){   			
   			$categories->find($selected->category_id)->setAttribute("selected", "selected");			
   		}
   		
   		$method = 'put';
   		
   		return view('services/formService', compact('categories', 'service', 'method'));
   
   }
   
   public function update($id, Request $request){ 
   		   	
	   	$this->validate($request, [
	   			'name' => 'required|max:100',
	   			'description' => 'required|max:250|min:50',
	   			'value' => 'required|max:10|min:1',
	   			'virtually' => 'required_without:presently',
	   			'presently' => 'required_without:virtually',
	   			'image' => 'image'
	   	]);
   	
   		$service = Service::find($id);
   	
   		$service->update([
   				'name' => $request->input('name'), 
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtually' => $request->input('virtually'),
   				'presently' => $request->input('presently'),
   		]);
   		
   		$this->uploadCover($request->file('image'), $service);
   		
   		$this->updateCategoriesService($request->input('category'), $service);
   		
   		return redirect('service/'.$service->id);
   	
   }
 
   public function create(Request $request){
   	
	   	$this->validate($request, [
	   			'name' => 'required|max:100',
	   			'description' => 'required|max:250|min:50',
	   			'value' => 'required|max:10|min:1',
	   			'virtually' => 'required_without:presently',
	   			'presently' => 'required_without:virtually',
	   			'image' => 'required|image'
	   	]);
   	
   		$service = Service::create([
   				'name' => $request->input('name'), 
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtually' => $request->input('virtually'),
   				'presently' => $request->input('presently'),
   				'user_id' => Auth::user()->id,
   				'image' => 'resources/default.jpg',
   				'state_id' => 1
   		]);
   		
   		$this->uploadCover($request->file('image'), $service);
   		
   		$this->updateCategoriesService($request->input('category'), $service);
   		
   		return redirect('profile');
   	
   }
   
   public function  uploadCover($file, $service){
   	
   		if(!$file){   			
   			return false;   			
   		}
   		
   		$imageName = 'img' . Auth::User()->id . '-' . $service->id . '.' . $file->getClientOriginalExtension();
   		
   		$pathImage = 'resources/user/user_'. Auth::User()->id . '/services/';
   		
   		$file->move(base_path() . '/public/' . $pathImage, $imageName);
   	
   		Service::find($service->id)->update([
   			'image' => $pathImage . $imageName   				
   		]);
   		
   		return $pathImage . $imageName;
   	
   }
   
   public function updateCategoriesService($categories, $service){
   		
   		$serviceCategory = CategoriesService::where('service_id', $service->id);
   		
   		if($serviceCategory){
   			$serviceCategory->delete();
   		}
   		  		
	   	foreach ($categories as $category){
	   	
	   		CategoriesService::create([
	   				'category_id' => $category,
	   				'service_id' => $service->id
	   		]);
	   	
	   	}
   	
   }
   
   
}
