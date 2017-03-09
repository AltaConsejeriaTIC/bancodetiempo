<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminContent;

class TermsController extends Controller
{


    public function index()
    {
      $content = AdminContent::find(1);
      return view('terms',compact('content'));
    }

    public function privacyPolicies()
    {      
      return view('privacyPolicies');
    }




}
