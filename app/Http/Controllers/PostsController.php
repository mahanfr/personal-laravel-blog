<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\UploadTrait;

use Carbon\Carbon;

class PostsController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(30);
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {
        if(auth()->user()->is_auther == false){
            return redirect('/blog')->with('error','Unautherized user');
        }
        $categories = Category::all();
        return view('posts.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        if(auth()->user()->is_auther == false){
            return redirect('/blog')->with('error','Unautherized user');
        }
        $this->validate($request, ['title' => 'required','body' => 'required'
                ,'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $post = new Post;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        if($request->input('category')){
            $post->category_id = $request->input('category');
        }else{
            $post->category_id = 1;
        }
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->posted_at = Carbon::now();

        if ($request->has('post_image')) {
            $image = $request->file('post_image');
            $name = $request->input('name') . '_' . time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $post->post_image = $filePath;
        }
        
        $post->save();
        if($post){
            $tagNames = explode(',',$request->input('tags'));
            $tagIds = [];
            foreach($tagNames as $tagName)
            {
                $tag = Tag::firstOrCreate(['name'=>$tagName]);
                if($tag)
                {
                    $tagIds[] = $tag->id;
                }

            }
            $post->tags()->sync($tagIds);
        }
        return redirect('/admin')->with('success','Post Created');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        if(is_null($post)){
            return redirect('/blog')->with('error','Post not found!');
        }
        return view('posts.show')->with('post',$post);
    }

    public function edit($slug)
    {
        if(auth()->user()->is_auther == false){
            return redirect('/blog')->with('error','Unautherized user');
        }
        $post = Post::where('slug', $slug)->firstOrFail();
        if(is_null($post)){
            return redirect('/blog')->with('error','Post not found!');
        }
        // check for restriction
        if($post->user_id !== auth()->user()->id){
            return redirect('/blog')->with('error','Unautherized user');
        }
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, $slug)
    {
        if(auth()->user()->is_auther == false){
            return redirect('/blog')->with('error','Unautherized user');
        }
        $this->validate($request, ['title' => 'required','body' => 'required']);
        $post = Post::where('slug', $slug)->firstOrFail();
        if(is_null($post)){
            return redirect('/blog')->with('error','Post not found!');
        }
        if($post->user_id !== auth()->user()->id){
            return redirect('/blog')->with('error','Unautherized user');
        }
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/admin')->with('success','Post Updated');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        if(is_null($post)){
            return redirect('/blog')->with('error','Post not found!');
        }
        if($post->user_id !== auth()->user()->id){
            return redirect('/blog')->with('error','Unautherized user');
        }
        $post->delete();
        return redirect('/admin')->with('success','Post Deleted');
    }
}
