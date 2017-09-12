<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DynamicContent;

class DynamicContentController extends Controller
{
    public function showList(){

        $contents = DynamicContent::all();

        return view('admin/dynamic/list', compact('contents'));
    }

    public function editContent($content_id){

        $content = DynamicContent::findOrFail($content_id);

        return view("admin/dynamic/edit", compact('content'));

    }
    public function saveContent(Request $request){

        DynamicContent::findOrFail($request->id)->update([
            'html' => $request->input('html', '')
        ]);

        return redirect()->back();

    }
}
