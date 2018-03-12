<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminContent;
class ContentController extends Controller
{
    public function index()
    {
        $contents = AdminContent::orderBy('created_at', 'desc')->paginate(6);
        return view('admin/contents/list', compact('contents'));
    }

    public function updateContent(Request $request)
    {
        $cont = AdminContent::find($request->id);
        $cont->name = $request->name;
        $cont->description = $request->input('content');

        if ($cont->save()) {
            return redirect('admin/content')->with('success', '¡El contenido ' . $request->category . ' Se Registró con Exito!');
        }
    }
}
