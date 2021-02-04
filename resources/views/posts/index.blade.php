@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
        <h1 class="mb-3">Welcome to the Todo Application!</h1><br>
            <h3 class="">Visit your <a class="btn-link" href="/profile/{{Auth::user()->id}}
                    "> profile</a> to start using your list</h3>
        </div>

    </div>




@endsection
