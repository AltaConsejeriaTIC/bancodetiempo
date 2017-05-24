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

        $categories = Category::getCategoriesInUse();
        $services = [];//Service::getServicesActive()->paginate(12);
        $serviceAdmin = [];
        $groups = [];
        $persons = [];
        $campaigns = [];
        $filter = '';
        $recommendedServices = User::recommendedServices()->paginate(6);
        JavaScript::put([
            'categoriesJs' => $categories,
        ]);

        return view('home', compact('services', 'recommendedServices', 'categories', 'campaigns', 'serviceAdmin', 'groups', 'persons', 'filter'));
    }


    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $recommendedServices = [];
        $categories = Category::getCategoriesInUse();
        $services = Service::select("services.*")->where('services.name', 'LIKE', "%$filter%")->where('state_id', 1)->orderBy('services.created_at', 'desc')->paginate(12);
        //$this->filterTags($allServices, $filter);
        //$allServices = $allServices->paginate(12);
        $serviceAdmin = ServiceAdmin::getServicesActive()->paginate(12);
        $groups = Groups::where('name', 'like', "%$filter%")->paginate(12);
        $persons = User::filter($filter)->paginate(12);
        $campaigns = Campaigns::select("campaigns.*")->where('campaigns.name', 'LIKE', "%$filter%")->where('campaigns.state_id', 1)->join("groups", "groups.id", "campaigns.groups_id")->where("groups.state_id", 1)->paginate(12);

        JavaScript::put([
            'categoriesJs' => $categories
        ]);

        return view('home', compact('services', 'recommendedServices', 'categories', 'campaigns', 'serviceAdmin', 'groups', 'persons', 'filter'));
    }

    public function filterTags($allServices, $filter)
    {

        if ($filter != "") {
            $filters = explode(" ", $filter);
            $idTags = Tag::select("id")->whereIn('tag', $filters)->get();
            $allServices->join('tags_services', 'services.id', 'tags_services.service_id');
            Session::flash('filters.tags', $idTags);
            return $allServices->WhereIn('tags_services.tag_id', $idTags);
        } else {
            Session::pull('filters.tags');
            return $allServices;
        }

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
