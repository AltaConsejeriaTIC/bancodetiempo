<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Session;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Expr\Print_;
use JavaScript;
use function GuzzleHttp\Promise\all;

class ServiceController extends Controller
{

   public function index(){

   		$categories = Category::all();
        $user = User::find(auth::user()->id);
   		$selectedCategories = [];
   		$method = 'post';
         JavaScript::put([
               'userJs'=> $user,
               'categoriesJs' => $categories,
             ]);


         Session::put('registerPass3', 'actual');
         
   		return view('services/formService', compact('categories', 'method'));

   }

	 public function deleteService ($serviceId)
   {
    
    $numServices = Service::where("user_id",Auth::user()->id)->count();

    if ($numServices>1)
    {
      $service = Service::find($serviceId);
      $service->delete();
    }
    else
    {
      Session::flash('error','No puedes tener menos de un servicio');
      return redirect('profile');
    }
    
    Session::flash('success','Has eliminado correctamente tu servicio');
    return redirect('profile');

   }



   public function showService($serviceId){

     $categories = Category::all('id', 'category');
     $service = Service::findOrFail($serviceId);
     $user = User::find($service->user_id);

     JavaScript::put([
         'userJs'=> $user,
         'categoriesJs' => $categories,
     ]);
   		
     return view('services/service', compact('categories', 'service', 'method' ,'user'));
   		

   }

  public function update($id, Request $request){

      $this->validate($request, [
          'serviceName' => 'required|max:100',
          'descriptionService' => 'required|max:250|min:50',
          'valueService' => 'required|numeric|min:1|max:10',
          'modalityServiceVirtually' => 'required_without:modalityServicePresently',
          'modalityServicePresently' => 'required_without:modalityServiceVirtually',
          'imageService' => 'image|max:2000'
      ]);

      $service = Service::find($id);
      $service->update([
          'name' => $request->input('serviceName'),
          'description' => $request->input('descriptionService'),
          'value' => $request->input('valueService'),
          'virtually' => $request->input('modalityServiceVirtually'),
          'presently' => $request->input('modalityServicePresently'),
          'category_id' => $request->input('categoryService'),
      ]);

      $this->uploadCover($request->file('imageService'), $service);
        
      Session::flash('success','Has actualizado correctamente tu servicio');
      
      return redirect('profile');
   }

   public function create(Request $request){
      
      $this->validate($request, [
            'serviceName' => 'required|max:100',
            'descriptionService' => 'required|max:250|min:50',
            'valueService' => 'required|numeric|min:1|max:10',
            'modalityServiceVirtually' => 'required_without:modalityServicePresently',
            'modalityServicePresently' => 'required_without:modalityServiceVirtually',
            'categoryService' => 'required',
            'imageService' => 'image|max:2000'
      ]);
      

		$service = Service::create([
				'name' => $request->input('serviceName'),
				'description' => $request->input('descriptionService'),
				'value' => $request->input('valueService'),
				'virtually' => $request->input('modalityServiceVirtually'),
				'presently' => $request->input('modalityServicePresently'),
				'user_id' => Auth::user()->id,
				'image' => 'resources/categories/category-profile.png',
				'category_id' => $request->input('categoryService'),            
				'state_id' => 1
		]);

      $user = User::find(Auth::user()->id);
      $user->state_id = 4;
      $user->save();

      $this->uploadCover($request->file('imageService'), $service); 
           

		Session::flash('success','Has creado correctamente tu servicio');
		Session::put('registerPass3', 'done');
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
   
   public function findCategories($categories){
   		
   		$idCategories = explode(":", $categories);
   		
   		$servicesForCategory = "";
   		
   		if(array_search('0', $idCategories) > -1){
   			$servicesForCategory = Service::where('state_id', 1)->get()->where('user.state_id', 1);
   		}else{   			
   			$servicesForCategory = Service::whereIn('category_id', $idCategories)->where('state_id', 1)->get()->where('user.state_id', 1);
   	
   		}
   		return view('services/filterCategories', compact('servicesForCategory'));
   		
   }

}
