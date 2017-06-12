<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\InterestUser;
use Illuminate\Support\Facades\Auth;
use App\User;
use JavaScript;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Campaigns;
use App\Models\ServiceAdmin;
use App\Models\subscribers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function indexNotRegister()
    {

        if (Auth::check()) {
            return redirect('/home');
        } else {
            $lastServices = Service::getServicesActive()->get()->take(6);
            return view('welcome', compact('lastServices'));
        }

    }

    public function index(Request $request)
    {
        $filter = '';
        $categories = Category::getCategoriesInUse();
        $services = service::getServicesActive()->orderBy('services.created_at', 'desc')->get();
        $featured = Service::getServicesActive()->orderBy('services.ranking', 'desc')->get();
        $virtual = Service::getServicesActive()->where('virtually', 1)->orderBy('services.created_at', 'desc')->get();
        $faceToFace = Service::getServicesActive()->where('presently', 1)->orderBy('services.created_at', 'desc')->get();
        $campaigns = Campaigns::getCampaignsActive()->limit(4)->get();

        JavaScript::put([
            'categoriesJs' => $categories,
        ]);

        return view('home', compact('services', 'featured', 'categories', 'campaigns', 'virtual', 'faceToFace'));
    }


    public function filter(Request $request)
    {

        $filter = $request->input('filter');
        $words = explode(" ", $filter);
        $categories = Category::getCategoriesInUse();
        $services = service::getServicesActive()
            ->where("services.name", "LIKE", "%$filter%");
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
        $categories = Category::getCategoriesInUse();
        $campaigns = Campaigns::getCampaignsActive()->get();
        $services = Service::getServicesActive();

        if ($filter != "") {
            $idTags = Tag::select("id")->where('tag', $filter)->get();
            $services->join('tags_services', 'services.id', 'tags_services.service_id');
            $services = $services->WhereIn('tags_services.tag_id', $idTags)->get();
        }

        return view('home/filter-tags', compact('services', 'categories', "campaigns"));
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
