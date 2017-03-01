<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminContent;
use Session;
Use Validator;

class AdminContentController extends Controller
{
    public function index()
    {
        $contents = AdminContent::orderBy('created_at','desc')->paginate(6);
        return view('admin/contents/list',compact('contents'));
    }



}
