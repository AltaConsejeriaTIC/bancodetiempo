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
   	
   		$categories = Category::all();
   		
   		return view('services/service', compact('categories'));
   	
   }   
   
   public function edit($serviceId = 0){
   
   	$categories = Category::all();
   	
   	$service = Service::whereId($serviceId)->whereUserId(Auth::user()->id)->first();
   	
   	return view('services/service', compact('categories', 'service'));
   
   }
 
   public function create(Request $request){
   	   	
   		$imageName = 'img' . rand(00000,99999) . '.' . $request->file('image')->getClientOriginalExtension();
   	
   		$request->file('image')->move(base_path() . '/public/images/services/', $imageName);
   	
   		$service = Service::create([
   				'name' => $request->input('name'), 
   				'description' => $request->input('description'),
   				'value' => $request->input('value'),
   				'virtuality' => $request->input('virtuality'),
   				'image' => $imageName,
   				'user_id' => Auth::user()->id,
   				'category_id' => $request->input('category')
   		]);
   		
   		$service->save();
   		
   		return redirect('service/edit/'.$service->id);
   	
   }
   
}
