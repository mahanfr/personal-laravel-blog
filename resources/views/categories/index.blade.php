@extends('layouts.app')
@section('content')
    <div class="container text-right">

        <div class="row mb-3">
            @if(!Auth::guest())
                <form action="{{route('create_category')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
                    </div>
                    <button class="btn btn-danger" type="submit">Save</button>
                </form>
            @endif
        </div>

        @if(count($categories) > 0)
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-3">
                        <a href="{{ url('/categories') }}/{{$category->name}}">
                            <div class="card text-center mt-3">
                                <div class="card-header">
                                    <h4 class="">{{$category->name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <br><br><br><br><br>
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