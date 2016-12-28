<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;
Use Validator;

class CategoryController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$categories = Category::orderBy('created_at','desc')->paginate(6);        
      return view('admin/categories/list',compact('categories'));
		}
/**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	try 
      {
        $ifexistCategory = Category::whereCategory($request->category)->first();
        
        if(!$ifexistCategory) 
        {
        	$rules = [
                    'category' => 'required|min:3|alpha_spaces',
                    'image' => 'required|image'
                   ];      
		      $validator = Validator::make($request->all(), $rules);
		      
		      if ($validator->fails())
		      {           
		      	return redirect()->back()->withInput()->withErrors($validator->errors());
		      }
          else
        	{
            \Storage::disk('local')->put('/categories/'.$request->category.'.'.$request->file('image')->getClientOriginalExtension(), \File::get($request->file('image')));
	          $category = new Category;
	          $category->category = $request->category;   
	          $category->image = $request->category.'.'.$request->file('image')->getClientOriginalExtension();        

	          if($category->save()) 
	          {                     
	            Session::flash('success', '¡La Categoría '.$request->category.' Se Registró con Exito!');
	            return redirect('homeAdminCategory');                 
	          }
        	}        		           
        }         
        else 
        {                 
          Session::flash('error', '¡La Categoría '.$request->category.' Ya Existe!');                 
          return redirect('homeAdminCategory');
        }              
      } 
      catch (Exception $e) 
      {
      }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {
      if($request->category != '')
      {
          $categories = Category::where('category', 'LIKE', "%$request->category%")->paginate(6);
          return view('admin/categories/list', compact('categories'));
      }
      else
      {
          return redirect('homeAdminCategory');
      }        
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
      try 
      {                
        $rules = [
                    'category' => 'required|min:3|alpha_spaces'                    
                 ];  

	      $validator = Validator::make($request->all(), $rules);
	      
	      if ($validator->fails())
	      {
	      	return redirect()->back()->withInput()->withErrors($validator->errors());
	      }
        else
      	{
      		$category = Category::find($request->id);
          $category->category = $request->category;   

      		if($request->file('image'))
      		{      			
	          \Storage::disk('local')->put('/categories/'.$request->category.'.'.$request->file('image')->getClientOriginalExtension(), \File::get($request->file('image')));	          
	          $name = $request->category.'.'.$request->file('image')->getClientOriginalExtension();
      		}
      		else
      		{
      			$name = $category->image;
      		}      		
          $category->image = $name;
          	
          if($category->save()) 
          {                     
            Session::flash('success', '¡La Categoría '.$request->category.' Se Registró con Exito!');
            return redirect('homeAdminCategory');                 
          }
      	}        		 
      } 
      catch (Exception $e) 
      {
      }              
    }
}
