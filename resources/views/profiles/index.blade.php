@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 pt-3">
                <div
                    class="">
                    <div class="">
                        <h1>{{ $user->name }}</h1>
                    </div>
                </div>

                @can('update', $user->profile)
                    <a href="{{ $user->id }}/edit">
                        Edit Profile
                    </a>
                @endcan
                <div
                    class="pt-4 font-weight-bold">
                </div>
                <div>

                </div>
            </div>
            <div class="row pt-5">
            @if($user->posts->count() == 0)
                <h2 class="text-center mt-5">There
                    are no posts</h2>


                @else
                <section class="form">

                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Todo</th>
                            <th>Info</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        @foreach($user->posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->detail}}</td>
                            <td>{{$post->status}}</td>
                            <td class="">
                                @can('update', $user->profile)
                                <a class="btn btn-primary"
                                   href="/p/{{ $post->id }}/edit">Edit</a>
                                    @endcan
                            </td>
                            <td>
                                @can('update', $user->profile)
                                <form action="{{ route('posts.delete',$post->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="return confirm('Are you sure you want to delete this item?')"
                                        type="submit"
                                        class="btn btn-danger"
                                        name="delete">
                                        Delete
                                    </button>
                                @endcan
                            </td>
                            </form>

                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                        </tr>
                        @endforeach
                    </table>


                </section>
                @endif
                <div class="container form">
                    @can('update', $user->profile)
                        <a href="/p/create">  <button
                                class="submit form"
                                type="submit">
                                Create item
                            </button></a>

                    @endcan


                </div>

                <div
                    style="text-align:center;margin-top:2rem;">

                </div>


            </div>

        </div>

    </div>

@endsection
