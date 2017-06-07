<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Session;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TypeReport;
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

    public function index()
    {

        $user = User::find(auth::user()->id);
        $selectedCategories = [];

        if (Auth::user()->services->count() >= 1) {
            return redirect('/');
        }

        return view('services/formService');
    }


    public function deleteService($serviceId)
    {

        $numServices = Service::where("user_id", Auth::user()->id)->count();

        if ($numServices > 1) {

            $tagsService = TagsService::where('service_id', '=', $serviceId)->get();
            foreach ($tagsService as $tagService) {

                $tagService = TagsService::find($tagService->id);
                $tagService->delete();
            }

            $service = Service::find($serviceId);
            $service->delete();

        } else {

            Session::flash('error', 'No puedes tener menos de un servicio');
            return redirect('profile');

        }
        Session::flash('success', 'Has eliminado correctamente tu servicio');
        return redirect('profile');

    }


    public function showService($serviceId)
    {

        $categories = Category::all('id', 'category');
        $service = Service::where('id', $serviceId)->where('state_id', 1)->firstOrFail();
        $user = User::find($service->user_id);
        $listTypes = TypeReport::pluck('type', 'id');
        JavaScript::put([
            'userJs' => $user,
            'categoriesJs' => $categories,
        ]);

        return view('services/service', compact('categories', 'service', 'method', 'user', 'listTypes'));


    }

    public function update($id, Request $request)
    {

        $service = Service::find($id);
        $service->update([
            'name' => $request->input('serviceName'),
            'description' => $request->input('descriptionService'),
            'value' => $request->input('valueService'),
            'virtually' => $request->input('modalityServiceVirtually'),
            'presently' => $request->input('modalityServicePresently'),
            'category_id' => $request->input('categoryService'),
        ]);

        $this->saveTags(explode(",", $request->tagService), $service);

        $this->uploadCover($request->file('imageService'), $service);
        Session::flash('success', 'Has actualizado correctamente tu servicio');
        return redirect('profile');
    }

    public function validateForm($request)
    {
        $this->validate($request, [
            'serviceName' => 'required|max:100',
            'descriptionService' => 'required|max:250|min:50',
            'valueService' => 'required|numeric|min:1|max:10',
            'modalityServiceVirtually' => 'required_without:modalityServicePresently',
            'modalityServicePresently' => 'required_without:modalityServiceVirtually',
            'categoryService' => 'required',
            'imageService' => 'image|max:2000'
        ]);
    }

    public function create(Request $request)
    {

        $this->validateForm($request);
        $category = Category::find($request->input('categoryService'));
        $service = Service::create([
            'name' => $request->input('serviceName'),
            'description' => $request->input('descriptionService'),
            'value' => $request->input('valueService'),
            'virtually' => $request->input('modalityServiceVirtually', 0),
            'presently' => $request->input('modalityServicePresently', 0),
            'user_id' => Auth::user()->id,
            'image' => "resources/" . $category->image,
            'category_id' => $request->input('categoryService'),
            'state_id' => 1
        ]);
        $this->saveTags(explode(",", $request->tagService), $service);
        $this->uploadCover($request->file('imageService'), $service);
        $countService = Service::where('user_id', Auth::user()->id)->get()->count();
        AttainmentsController::saveAttainment(3);

        if (Auth::user()->role_id == 1) {
            return redirect('homeAdmin');
        }

        if ($countService > 1) {
            return redirect('profile');
        } else {
            Auth::User()->update([
                'state_id' => 1
            ]);
            return redirect('home')->with('coin', 2);
        }
    }

    private function saveTags($tags, $service)
    {
        $this->deleteTags($service);
        if ($tags) {
            foreach ($tags as $tag) {
                $newTag = Tag::where('tag', $tag)->first();

                if (empty($newTag)) {
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

    private function deleteTags($service, $tags = [])
    {
        $list = $service->tags;
        if (!empty($tags)) {
            $list = $list->whereIn("tag.id", $tags);
        }

        foreach ($list as $tag) {
            $tag->delete();
        }
    }

    public function uploadCover($file, $service)
    {

        if (!$file) {
            return false;
        }

        $imageName = 'img' . Auth::User()->id . '-' . $service->id . '.' . $file->getClientOriginalExtension();
        $pathImage = 'resources/user/user_' . Auth::User()->id . '/services/';
        $file->move(base_path() . '/public/' . $pathImage, $imageName);

        Service::find($service->id)->update([
            'image' => $pathImage . $imageName
        ]);

        return $pathImage . $imageName;
    }

    public function findCategories($categories)
    {

        $idCategories = explode(":", $categories);

        $servicesForCategory = Service::select("services.*")
            ->distinct('services.id')
            ->leftJoin('tags_services', 'services.id', 'tags_services.service_id')
            ->where('state_id', 1)
            ->orderBy('id', 'desc');;

        if (!in_array('0', $idCategories)) {
            $servicesForCategory = $servicesForCategory->whereIn('category_id', $idCategories);
        }

        if (!empty(Session::get('filters.tags')) && count(Session::get('filters.tags')) > 0) {
            $servicesForCategory = $servicesForCategory->whereIn('tags_services.tag_id', Session::get('filters.tags'));
            Session::flash('filters.tags', Session::get('filters.tags'));
        }

        $servicesForCategory = $servicesForCategory->get()->where('user.state_id', 1);

        return view('services/filterCategories', compact('servicesForCategory'));

    }


    public function getTags()
    {
        $tags = json_encode(Tag::all('tag'));
        print ($tags);
    }

    static function getServiceActive()
    {
        return Service::select("services.*")
            ->where('state_id', 1)
            ->orderBy('services.created_at', 'desc');
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $services = Service::select("services.*")->where('services.name', 'LIKE', "%$filter%")->where('state_id', 1)->orderBy('services.created_at', 'desc')->paginate(12);
        return view('services/list', compact('services', 'filter'));
    }

    public function query(Request $request){
        $term = $request->input('term');
        $services = Service::select("services.name as label", "services.name as value")->where('services.name', 'LIKE', "%$term%")->where('state_id', 1)->orderBy('services.created_at', 'desc')->get()->take(6);

        print $services->toJson();
    }


    public function getListService(Request $request){

        $page = $request->input('page', 0);

        $services = Service::getServicesActive()->orderBy('services.created_at', 'desc');

        if($page != 0){
            if($page != 1){
                $services->offset(($page-1)*6);
            }
        }

        $services =  $services->limit(6)->get();

        return view('home.partial.listService', compact('services'));

    }

    public function getListServiceFeatured(Request $request){

        $page = $request->input('page', 0);

        $services = Service::getServicesActive()->orderBy('services.ranking', 'desc');

        if($page != 0){
            if($page != 1){
                $services->offset(($page-1)*6);
            }
        }

        $services =  $services->limit(6)->get();

        return view('home.partial.listService', compact('services'));

    }
    public function getListServiceVirtual(Request $request){

        $page = $request->input('page', 0);

        $services = Service::getServicesActive()->where('virtually', 1)->orderBy('services.created_at', 'desc');

        if($page != 0){
            if($page != 1){
                $services->offset(($page-1)*6);
            }
        }

        $services =  $services->limit(6)->get();

        return view('home.partial.listService', compact('services'));

    }
    public function getListServiceFaceToFace(Request $request){

        $page = $request->input('page', 0);

        $services = Service::getServicesActive()->where('presently', 1)->orderBy('services.created_at', 'desc');

        if($page != 0){
            if($page != 1){
                $services->offset(($page-1)*6);
            }
        }

        $services =  $services->limit(6)->get();

        return view('home.partial.listService', compact('services'));

    }

}
