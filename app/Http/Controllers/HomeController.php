<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Campaigns;
use App\Models\subscribers;

class HomeController extends Controller
{
    public function indexNotRegister(){
        if (Auth::check()){
            return redirect('/home');
        }else{
            $lastServices = Service::getServicesActive()->orderBy('services.created_at', 'desc')->get()->take(6);
            $lastCampaigns = Campaigns::orderBy("created_at", "desc")->get()->take(6);
            return view('home/welcome', compact('lastServices', 'lastCampaigns'));
        }
    }

    public function index(Request $request)
    {
        $filter = '';
        $categories = Category::getCategoriesInUse();
        $premierService = service::find(1181);
        $services = service::getServicesActive()->orderBy('services.created_at', 'desc');
        if(!is_null($premierService)){
            $services = $services->where("services.id", "!=", 1181);
        }
        $services = $services->paginate(is_null($premierService) ? 6 : 5, ["*"], "services");
        $featured = Service::getServicesActive()->orderBy('services.ranking', 'desc')->paginate(6, ["*"], "featured");
        $virtual = Service::getServicesActive()->where('virtually', 1)->orderBy('services.created_at', 'desc')->paginate(6, ["*"], "virtual");
        $faceToFace = Service::getServicesActive()->where('presently', 1)->orderBy('services.created_at', 'desc')->paginate(6, ["*"], "facetoface");
        $campaigns = Campaigns::orderBy("created_at", "desc")->paginate(4, ["*"], "campaigns");

        JavaScript::put([
            'categoriesJs' => $categories,
        ]);

        return view('home/home', compact('services', 'featured', 'categories', 'campaigns', 'virtual', 'faceToFace', 'premierService'));
    }


    public function filter(Request $request)
    {

        $filter = $request->input('filter');
        $words = explode(" ", $filter);
        $categories = Category::getCategoriesInUse();
        $services = service::getServicesActive()->orderBy('services.created_at', 'desc')->where("services.name", "LIKE", "%$filter%");
        foreach ($words as $word) {
            $services->orWhere("users.first_name", "LIKE", "%$word%");
            $services->orWhere("users.last_name", "LIKE", "%$word%");
        }
        $services = $services->orderBy('services.created_at', 'desc')->get();

        $campaigns = Campaigns::getCampaignsActive()->where("campaigns.name", "LIKE", "%$filter%")->get();

        JavaScript::put([
            'categoriesJs' => $categories
        ]);

        return view('home/filter', compact('services', 'categories', "campaigns"));
    }

    public function filterTag(Request $request)
    {
        $filter = $request->input('filter');
        $services = Service::getServicesActive();

        if ($filter != "") {
            $idTags = Tag::select("id")->where('tag', $filter)->get();
            $tagId = $idTags->first();
            $services->join('tags_services', 'services.id', 'tags_services.service_id');
            $services = $services->WhereIn('tags_services.tag_id', $idTags)->paginate(6);
        }

        return view('home/filter-tags', compact('services', 'filter', 'tagId'));
    }

    public function filterText($allServices, $filter)
    {

        if ($filter != "") {
            return $allServices->where('services.name', 'LIKE', "%$filter%");

        } else {
            return $allServices;
        }

    }

    public function subscribe(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
        ]);
        if (is_null(subscribers::where("email", $request->input('email'))->get()->last())) {
            subscribers::create([
                "email" => $request->input('email')
            ]);
        }

        return redirect()->back()->with('response', true);

    }


}
