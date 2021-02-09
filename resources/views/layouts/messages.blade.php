@if(count($errors)>0)
    <div class="mt-3"></div>
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger mx-5">
            {{$error}}
        </div>
    @endforeach
@endif
@if(session('success'))
    <div class="mt-3"></div>
    <div class="alert alert-success mx-5">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="mt-3"></div>
    <div class="alert alert-danger mx-5">
        {{session('error')}}
    </div>
@endif
