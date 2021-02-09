@extends('layouts.app')
@section('content')
    <div class="container text-right">
        @if(count($messages) > 0)
            @foreach ($messages as $message)
                <div class="card mt-3 text-center">
                    <div class="card-header">
                        <p class="">{{$message->email}} :{{$message->name}}</p>
                        <small class="text-center">Written on {{$message->created_at}}</small>
                        <h5 class="mt-2">{{$message->subject}} :subject</h5>
                    </div>
                    <div class="card-body">
                        {{$message->body}}
                    </div>
                    <div class="card-footer">
                        <form class="mb-2" action="{{route('delete_message',$message->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="text-center" >{{ $messages->appends(request()->query())->links("pagination::bootstrap-4") }}</div>
            <br><br><br><br><br>
        @else
            <p class="mt-2 text-center">No Messages Found</p>
            <br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br>
        @endif
    </div>
@endsection