@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{ $user->id }}"
              enctype="multipart/form-data"
              method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row mb-3">
                        <h1>
                            Edit Profile
                        </h1>
                    </div>
                    <div class="form-group row">
                        <label for="title"
                               class="col-md-4 col-form-label">Title</label>


                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{$user->profile->title ?? old('title') }}"
                               autocomplete="off"
                               autofocus>

                        @error('title')
                        <span
                            class="invalid-feedback"
                            role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                    </div>


                    <div class="row pt-4">
                        <button
                            class="btn btn-primary"
                            type="submit">Save changes
                        </button>
                    </div>

        </form>
    </div>

    </div>
@endsection
