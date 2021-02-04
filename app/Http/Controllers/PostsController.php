<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        return view('posts.index');
    }

    public function create(User $user)
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
          'title' => 'required',
          'detail' => 'required',
        ]);

        auth()->user()->posts()->create($data);



        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit($id) {

        $post = Post::findOrFail($id);


        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {

        $post = Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'detail' => $request->input('detail'),
            'status' => $request->input('status')
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function delete($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/profile/' . auth()->user()->id);
    }



}
