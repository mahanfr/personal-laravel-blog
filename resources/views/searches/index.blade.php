@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagesindex.css') }}" type="text/css" >
@endsection
@section('content')
<div class="text-right">
    @if( $posts->count() )
        <div class="album py-5 bg-light">
            <div class="container">
              <div class="section-title">
                  <h2>نتایج جست و جو برای "{{ $s }}"</h2>
              </div>
              <p class="text-center">We've found {{ $posts->count() }} results for your search term in all blog entries</p>
              <div class="row">
                @foreach ($posts as $post)
                  <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                      <img class="card-img-top" src="{{ $post->post_image }}" alt={{ $post->title }}">
                      <div class="card-body">
                        <p class="card-text"><a href="{{ url('/blog') }}/{{ $post->slug }}">{{ $post->title }}</a></p>
                        <p class="card-text">{{ strlen( $post->body ) > 200 ? substr( $post->body, 0, 30) . ' ...' : $post->body }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                          @if ($post->category)
                            <a href="{{url('/categories')}}/{{ $post->category->name }}"><span class="badge bg-success">{{ $post->category->name }}</span></a>
                          @endif
                          <small class="text-muted">{{ $post->posted_at }}</small>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="text-center" >{{ $posts->appends(request()->query())->links("pagination::bootstrap-4") }}</div>
            </div>
        </div>
    @else
        <p class="mt-4">No post martch on your term <strong>{{ $s }}</strong></p>
    @endif
</div>
@endsection