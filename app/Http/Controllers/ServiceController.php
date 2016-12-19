<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{	
	
   public function index(){
   	
   		$categories = Category::all('id', 'category');
   		
   		$selectedCategories = [];
   		
   		foreach ($categories as $category){
   			
   			$selectedCategories[$category['id']] = $category['category'];   			
   		}   		
   		
   		$method = 'post';
   		
   		return view('services/formService', compact('selectedCategories', 'method'));
   	
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
   		
   		$method = 'put';
   		
   		return view('services/formService', compact('selectedCategories', 'service', 'method'));
   
   }
   
   public function update(Request $request){
 
   		   		
   		$image = $this->uploadCover($request->file('image'));
   		
   		$service = Service::find($request->input('serviceId'))->update([
   				'name' => $request->input('name'),
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtuality' => $request->input('virtuality'),
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
   				'category' => 'required|numeric|min:1'
   		]);
   		
   		$image = $this->uploadCover($request->file('image'));
   		
   		$service = Service::create([
   				'name' => $request->input('name'), 
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtuality' => $request->input('virtuality'),
   				'image' => $image,
   				'user_id' => Auth::user()->id,
   				'category_id' => $request->input('category')
   		]);
   		
   		$service->save();
   		
   		return redirect('service/'.$service->id);
   	
   }
   
   public function  uploadCover($file){
   	
   		if(!$file){
   			
   			return false;
   			
   		}
   		
   		$imageName = 'img' . rand(00000,99999) . '.' . $file->getClientOriginalExtension();
   		
   		$file->move(base_path() . '/public/images/services/', $imageName);
   	
   		return $imageName;
   	
   }
   
   
}
