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
    public function update(Request $request)
    {
        $cont = AdminContent::find($request->id);
        $cont->name = $request->name;
        $cont->description = $request->input('content');

        if($cont->save())
        {
            Session::flash('success', '¡El contenido '.$request->category.' Se Registró con Exito!');
            return redirect('homeAdminContents');
        }
    }



}
