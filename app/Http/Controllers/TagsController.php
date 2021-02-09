<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show($name)
    {
        $tag = Tag::where('name', $name)->firstOrFail();
        if(is_null($tag)){
            return redirect('/blog')->with('error','Tag not found!');
        }
        return view('tags.show')->with('tag',$tag);
    }
}
