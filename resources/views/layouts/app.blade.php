<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MahanFr') }}@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css" > --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.rtl.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shorcut icon" type="image/x-icon" sizes="32x32" href="{{ URL::asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="{{ URL::asset('favicon.ico') }}">
    @yield('css')
</head>
<body>
    <div class="main" id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid mx-3">
              <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.svg') }}" alt="" width="40" height="40" class="d-inline-block align-top">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link @if(Request::url() === url('/') )active @endif" aria-current="page" href="{{ url('/') }}">خانه</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if(Request::url() === url('/blog') )active @endif" href="{{ url('/blog') }}">مطالب</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if(Request::url() === url('/categories') )active @endif" href="{{ url('/categories') }}">موضوعات</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if(Request::url() === url('/contact') )active @endif" href="{{ url('/contact') }}">تماس با ما</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if(Request::url() === url('/about') )active @endif" href="{{ url('/') }}">درباره ما</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-md-0" action="{{url('/search')}}">
                  <input class="form-control" type="text" name="s" value="{{ Request::query('s') }}" placeholder="جست و جو" aria-label="Search">
                </form>
                <ul class="navbar-nav">
                  @guest
                  @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/admin') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-link nav-link" type="submit">
                            {{ __('Logout') }}
                        </button>
                      </form>
                    </li>
                  @endguest
                </ul>
              </div>
            </div>
        </nav>
        <main class="">
            <div class="" style="z-index: 10">@include('layouts.messages')</div>
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-center text-lg-start text-light">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2021 Copyright:
        <a class="text-muted" href="http://mahanfr.ir/">MahanFr.ir</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    
    <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
