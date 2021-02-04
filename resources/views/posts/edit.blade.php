@extends('layouts.app')

@section('content')
    <div class="container form">
        <h1>
            Update item
        </h1>
    </div>

    <section class="container form">
        <form action="/p/{{ $post->id }}"
              enctype="multipart/form-data"
              method="post">
            @csrf
            @method('PATCH')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input style="color:black" type="text" name="title"
                   value="{{ $post->title ?? old('name') }}"
                   class="form-control"
                   placeholder="Todo">
            @error('title')
            <span
                class="invalid-feedback"
                role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <textarea style="color:black" style="height:150px"
                      name="detail"
                      placeholder="Info">{{ $post->detail ?? old('detail') }}</textarea>
            @error('detail')
            <span
                class="invalid-feedback"
                role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <select class="mt-4" name="status">
                <option value="" name="select" hidden>Select the item's status</option>
                <option value="In progress">In progress</option>
                <option value="Not finished">Not finished</option>
                <option value="Finished">Finished</option>
            </select>

            @error('status')
            <span
                class="invalid-feedback"
                role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <button type="submit"
                    class="submit form">Submit
            </button>
        </form>
    </section>
    <a href="/profile/{{Auth::user()->id}}">
        <button class="cancel form">
            Cancel
        </button>
    </a>








@endsection
