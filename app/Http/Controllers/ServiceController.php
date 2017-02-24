<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Session;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TagsService;
use App\Models\Attainment;
use App\Models\AttainmentUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Expr\Print_;
use JavaScript;
use function GuzzleHttp\Promise\all;

class ServiceController extends Controller
{

   public function index(){

    $tags = json_encode(Tag::all('tag'));
    $categories = Category::all();
    $user = User::find(auth::user()->id);
 		$selectedCategories = [];
 		
    JavaScript::put([
       'userJs'=> $user,
       'categoriesJs' => $categories,
       'tags'=> $tags,
       ]);
    
    if(Auth::user()->services->count() >= 1)
    {
      return redirect('/');
    }
    else
    {
      $step = Attainment::where('id','=',3)->first();
      $stepRegister = Auth::user()->attainmentUsers->count();
      $attainments = AttainmentUsers::where('user_id',Auth::user()->id)->where('attainment_id',$step->id)->first();         
          
      if($attainments != null)
        $attainments = AttainmentUsers::find($attainments->id);
      
      if($stepRegister == 2)
        $attainments = new AttainmentUsers;
      
      $attainments->user_id = Auth::user()->id;
      $attainments->attainment_id = $step->id;
      $attainments->state_id = 2;
      $attainments->save();
      
      if(Auth::user()->privacy_policy == 0)
      {
        $pass1 = 'actual';
        $pass2 = '';
        $pass3 = '';      
        return redirect('register');
      }
      else
      {
        if(Auth::user()->interests->count() < 3 )
        {
          $pass1 = 'done';
          $pass2 = 'actual';
          $pass3 = '';
          return redirect('interest');  
        }
        else
        {
          $pass1 = 'done';
          $pass2 = 'done';
          $pass3 = 'actual';          
        }
      }
    }
      return view('services/formService', compact('categories','tags','pass1','pass2','pass3'));
   }

	 public function deleteService ($serviceId)
   {
    
    $numServices = Service::where("user_id",Auth::user()->id)->count();

    if ($numServices>1)
    {
      $tagsService = TagsService::where('service_id','=',$serviceId)->get();
      foreach ($tagsService as $tagService) 
      {
        $tagService = TagsService::find($tagService->id);
        $tagService->delete();
      }
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
    public function showServiceGuest($serviceId){

        $categories = Category::all('id', 'category');

        $service = Service::findOrFail($serviceId);

        $user = User::find($service->user_id);
        JavaScript::put([
            'userJs'=> $user,
            'categoriesJs' => $categories,
        ]);
        return view('services/serviceGuest', compact('categories', 'service', 'method' ,'user'));


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

      $tagsService = json_decode($request->tagService);
      
      if($tagsService)
      {        
        TagsService::where('service_id','=',$service->id)->delete();

        foreach ($tagsService as $tag) 
        {
          $newTag = Tag::where('tag',$tag)->first();
          
          if(empty($newTag))
            $newTag = new Tag;        

          $newTag->tag = $tag;
          $newTag->save();

          $newTagService = new TagsService;
          $newTagService->service_id = $service->id;
          $newTagService->tag_id = $newTag->id;
          $newTagService->save();
        }
      }
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

        $virtually = $request->input('modalityServiceVirtually') == null ? 0 : $request->input('modalityServiceVirtually');

        $presently = $request->input('modalityServicePresently') == null ? 0 : $request->input('modalityServicePresently');

        $category = Category::find($request->input('categoryService'));

        $service = Service::create([
            'name' => $request->input('serviceName'),
            'description' => $request->input('descriptionService'),
            'value' => $request->input('valueService'),
            'virtually' =>$virtually,
            'presently' =>$presently,
            'user_id' => Auth::user()->id,
            'image' => "resources/categories/".$category->image,
            'category_id' => $request->input('categoryService'),            
            'state_id' => 1
        ]);

        $this->saveTags(json_decode($request->tagService), $service);   

        $this->uploadCover($request->file('imageService'), $service); 

        $countService = Service::where('user_id',Auth::user()->id)->get()->count();

        $step = Attainment::where('id','=',3)->first();  

        $attainments = AttainmentUsers::where('user_id',Auth::user()->id)->where('attainment_id',$step->id)->first();          
    
        if($attainments != null)    
          $attainments = AttainmentUsers::find($attainments->id);
        
        if($attainments->state_id == 2)
        {
          $attainments->state_id = 1;
          $attainments->save();      

          $user = Auth::user();
          $user->state_id = 1;
          $user->credits = $user->credits + $step->value;
          $user->save(); 
        }        
    
        if($countService > 1)
    		  return redirect('profile');
        else
          return redirect('home')->with('coin',$step->value);

   }

   public function  uploadCover($file, $service){
      
    if(!$file){
      return false;
    }

    $imageName = 'img' . Auth::User()->id . '-' . $service->id . '.' . $file->getClientOriginalExtension();
    $pathImage = 'resources/user/user_'. Auth::User()->id . '/services/';
		$file->move ( base_path () . '/public/' . $pathImage, $imageName );
		
		Service::find ( $service->id )->update ( [ 
				'image' => $pathImage . $imageName 
		] );

		return $pathImage . $imageName;
	}
	
	public function findCategories($categories) {
		
		$idCategories = explode ( ":", $categories );
				
		$servicesForCategory = Service::select("services.*")
										->distinct('services.id')
										->leftJoin('tags_services', 'services.id', 'tags_services.service_id')
										->where ( 'state_id', 1)
                    ->orderBy('id', 'desc');;
		
		if(!in_array ( '0', $idCategories )) {  
   			$servicesForCategory = $servicesForCategory->whereIn('category_id', $idCategories);   	
   		}
   		
   		if(!empty(Session::get ( 'filters.tags' )) && count(Session::get ( 'filters.tags' )) > 0){   			
   			$servicesForCategory = $servicesForCategory->whereIn('tags_services.tag_id', Session::get ( 'filters.tags' ));
   			Session::flash('filters.tags', Session::get ( 'filters.tags' ));
   		}
   		
   		$servicesForCategory = $servicesForCategory->get()->where('user.state_id', 1);
   		
   		return view('services/filterCategories', compact('servicesForCategory'));
   		
   }

   public function saveTags($tags, $service){

         if($tags){   

            foreach ($tags as $tag){
                 $newTag = Tag::where('tag',$tag)->first();

                if(empty($newTag)){
                    $newTag = new Tag; 
                }

                $newTag->tag = $tag;
                $newTag->save();
                $newTagService = new TagsService;
                $newTagService->service_id = $service->id;
                $newTagService->tag_id = $newTag->id;
                $newTagService->save();
            }
        }     

   }

}
