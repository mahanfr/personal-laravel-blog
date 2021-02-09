<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categoies = Category::orderBy('name','asc')->paginate(200);
        return view('categories.index')->with('categories',$categoies);
    }
    public function show($name){
        $category = Category::where('name', $name)->firstOrFail();
        return view('categories.show')->with('category',$category);
    }
    public function store(Request $request){
        if(auth()->user()->is_auther == false){
            return redirect('/categories')->with('error','Unautherized user');
        }
        $this->validate($request, ['name' => 'required']);
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect('/categories')->with('success','Category Created');
    }
}
