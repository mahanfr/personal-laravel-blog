@extends('layouts.app')
@section('meta')
  <meta name="title" content="Mahanfr — {{$post->title}}">
  <meta name="description" content="{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}">
  <meta name="keywords" content="@foreach($post->tags as $tag){{($tag->name).","}}@endforeachماهان فرزانه">
  <meta name="author" content="ماهان فرزانه">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
	<meta property="og:locale" content="fa_IR" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Mahanfr — {{$post->title}}" />
	<meta property="og:description" content="{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}" />
	<meta property="og:url" content="http://Mahanfr.ir/blog/{{$post->slug}}" />
	<meta property="og:site_name" content="MahanFr" />
	<meta property="article:publisher" content="Mahan Farzaneh" />
	<meta property="article:author" content="ماهان فرزانه" />
	<meta property="article:published_time" content="{{$post->posted_at}}" />
	<meta property="article:modified_time" content="{{$post->posted_at}}" />
	<meta property="og:image" content="{{$post->post_image}}" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="628" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:image" content="{{$post->post_image}}" />
	<meta name="twitter:creator" content="@mahan_farzaneh" />
	<meta name="twitter:site" content="@mahan_farzaneh" />
	<meta name="twitter:label1" content="Written by">
	<meta name="twitter:data1" content="Mahan Farzaneh">
	<meta name="twitter:label2" content="Est. reading time">
	<meta name="twitter:data2" content="30 minutes">
@endsection
@section('title')
    | {{$post->title}}
@endsection
@section('content')
    <div class="container mt-5 text-right">
      <h1 class="text-center" style="color: darkslateblue">{{$post->title}}</h1>
      @if ($post->category)
        <div class="text-center px-2">
          <a href="{{url('/categories')}}/{{$post->category->name}}"><span class="badge bg-success my-2">{{$post->category->name}}</span></a>
        </div>
      @endif
      <p class="text-center"><strong> نوشته شده در {{$post->posted_at}}</strong></p>
      <img class="my-3" src="{{$post->post_image}}" alt="{{$post->title}}" width="100%" height="56%">
      <br><br><hr>
      <article>
        <h2>{{$post->title}}</h2>
        {!!$post->body!!}
      </article>
      <div class="my-4 text-center">
        @foreach ($post->tags as $tag)
          <a href="{{ url('/tags') }}/{{$tag->name}}"><span class="badge rounded-pill bg-dark">{{$tag->name}}</span></a>
        @endforeach
      </div>
    </div>
    <div class="container text-center">
      @if(!Auth::guest())
          @if(Auth::user()->id == $post->user_id)
              <div class="mb-2">
                  <a class="btn btn-outline-warning" href="/blog/{{$post->slug}}/edit">Edit</a>
              </div>
              <form class="mb-2" action="{{route('delete_post',$post->slug)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
              </form>
          @endif
      @endif
    </div>
    <style>
        pre{
            background-color: black;
            color: #ffffff;
            padding: 2%
        }
        h2{
          margin-bottom: 30px;
        }
    </style>
@endsection