@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit post</h1>
        <form class="mb-3" action="{{route('edit_post',$post->slug)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" value="{{$post->category_id}}" name="category" id="category" class="form-control" placeholder="category">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" value="{{$post->slug}}" name="slug" id="slug" class="form-control" placeholder="Slug">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{$post->title}}" name="title" id="title" class="form-control" placeholder="Tilte">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control" placeholder="Body Text" cols="60" rows="10">{{$post->body}}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection