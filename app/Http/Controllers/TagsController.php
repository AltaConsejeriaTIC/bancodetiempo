<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagsController extends Controller
{
    public function jsonTags(){
        $tags = Tag::all('tag')->toJson();

        print($tags);
    }
}
