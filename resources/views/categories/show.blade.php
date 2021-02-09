@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagesindex.css') }}" type="text/css" >
@endsection
@section('content')
    <div class="text-right">
        @if(count($category->posts) > 0)
            <div class="album py-5 bg-light">
                <div class="container">
                  <div class="section-title">
                      <h2>مطالب دسته بندی {{ $category->name }}</h2>
                  </div>
                  <div class="row">
                    @foreach ($category->posts as $post)
                      <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                          <div class="card-body">
                            <h5 class="card-text"><a href="{{ url('/blog') }}/{{ $post->slug }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <small class="text-muted">{{ $post->posted_at }}</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
            </div>
        @else
            <p class="mt-2 text-center">No Posts Found</p>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
        @endif
    </div>
@endsection