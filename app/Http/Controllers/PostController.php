<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $path = $request->photo->store('public/images');

        Post::create([
            'image' => Storage::url($path),
            'description' => $request->description,
            'user_id' => $user->id
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user = auth()->user();

        if ($post->user_id != $user->id) {
            abort(404);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $user = auth()->user();

        // Validando se o post pertence ao usuário logado
        if ($post->user_id != $user->id) {
            abort(404);
        }

        // Validando se a descrição veio vazia
        if (empty($request->description)) {
            return back();
        }

        $post->update(['description' => $request->description]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $user = auth()->user();

        // Validando se o post pertence ao usuário logado
        if ($post->user_id != $user->id) {
            abort(404);
        }

        $post->delete();

        return redirect('/');
    }
}
