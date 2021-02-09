<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','desc')->take(6)->get();
        return view('pages.index')->with('posts',$posts);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function about(){
        return view('pages.about');
    }

}
