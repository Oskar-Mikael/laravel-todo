@extends('layouts.app')

@section('content')



    <div class="container form">
        <h1>
            Add a new item to the list
        </h1>
    </div>

    <section class="container form">
        <form action="/p"
              enctype="multipart/form-data"
              method="post">
            @csrf


            <input type="text" name="title" value="{{ old('name') }}" class="form-control" placeholder="Todo">
            @error('title')
            <span
                class="invalid-feedback"
                role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <textarea style="height:150px" value="{{ old('detail') }}" name="detail" placeholder="Info"></textarea>
            @error('detail')
            <span
                class="invalid-feedback"
                role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <button type="submit" class="submit form">Submit</button>
        </form>
    </section>
    <a href="/profile/{{Auth::user()->id}}">
        <button class="cancel form">
            Cancel
        </button>
    </a>




@endsection
