<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminContent;

class ContentController extends Controller{
    public function index($name){
        $content = AdminContent::where('url', $name)->first();
        return view('contents', compact('content'));
    }
}
