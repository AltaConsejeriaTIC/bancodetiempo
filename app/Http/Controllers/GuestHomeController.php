<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\User;
use JavaScript;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;


class GuestHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::select('categories.id','categories.category')->join('services','categories.id','=','services.category_id')->where('services.state_id', 1)->groupBy('categories.id','categories.category')->get();

        $allServices = Service::where('state_id' , 1)->get()->where('user.state_id', 1);


        $categoriesAll = Category::all();

        JavaScript::put([
            'categoriesJs' => $categories,
        ]);
        return view('guest', compact('allServices','recommendedServices', 'categories'));
    }





}
