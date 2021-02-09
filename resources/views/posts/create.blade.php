@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create post</h1>
        <form class="mb-3" action="{{action('App\Http\Controllers\PostsController@store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="category">Category</label>
                    <select class="form-select" name="category" id="category">
                      <option value="1" selected>Choose...</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Tilte">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control" placeholder="Body Text" cols="60" rows="10"></textarea>
            </div>
            <div class="form-group mt-3">
                <input type="file" name="post_image" class="form-control">
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" id="tags" name="tags" class="form-control"/>
                <small>here you can input ','(comma)separated tag names you want to associate with the post</small>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection