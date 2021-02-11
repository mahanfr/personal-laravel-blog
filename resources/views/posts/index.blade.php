@extends('layouts.app')
@section('title')
    | مطالب
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagesindex.css') }}" type="text/css" >
@endsection
@section('content')
    <div class="text-right">
        @if(count($posts) > 0)
            <h4 class="text-center mt-3">جست و جو</h4>
            <div class="row justify-content-center padding my-4">
                <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                    <form class="" action="{{url('/search')}}" method="GET">
                        <div class="form-group d-md-flex">
                            <input class="form-control col-md-2" type="text" name="s" value="{{ Request::query('s') }}" placeholder="دنبال چه مطلبی هستید؟"/>
                            <button class="mx-2 px-4 btn btn-outline-info" type="submit">برو</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="album py-5 bg-light">
                <div class="container">
                  <div class="section-title">
                      <h2>همه ی مطالب</h2>
                  </div>
                  <div class="row">
                    @foreach ($posts as $post)
                      <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                          <img class="card-img-top" src="{{ $post->post_image }}" alt={{ $post->title }}">
                          <div class="card-body">
                            <h5 class="card-text"><a href="{{ url('/blog') }}/{{ $post->slug }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>
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
            <p class="mt-2 text-center">No Posts Found</p>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
        @endif
    </div>
    <style>
        .ellipsis{
            display: block;
            display: -webkit-box;
            max-width: 100%;
            height: 200px;
            margin: 0 auto;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection