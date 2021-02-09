@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if (Auth::user()->is_auther == true)
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-info mb-3" href="/admin/messages">messages</a>
                        <a class="btn btn-success mb-3" href="/blog/create">Create a new post</a>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">tiltle</th>
                                <th scope="col">Category</th>
                                <th scope="col">timestamp</th>
                                <th scope="col">slug</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td><a href="{{ url('/blog') }}/{{$post->slug}}">{{$post->title}}</a></td>
                                    @if ($post->category)
                                    <td>{{$post->category->name}}</td>
                                    @endif
                                    <td>{{$post->posted_at}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td><a href="{{ url('/blog') }}/{{$post->slug}}/edit">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center" >{{ $posts->appends(request()->query())->links("pagination::bootstrap-4") }}</div>
                    </div>
                @else
                    <h2 class="text-center">You Have no access</h2>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
