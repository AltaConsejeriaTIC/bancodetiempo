<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use JavaScript;

class PersonController extends Controller
{

    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $persons = User::filter($filter)->paginate(12);
        return view('persons/list', compact('persons', 'filter'));
    }

}
