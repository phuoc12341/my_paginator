<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listPosts = Post::all();
        $compacts = [
            'listPosts' => $listPosts,
        ];

        if ($request->ajax()) {
            return response()->json($compacts, 200);
        }

        return view('posts.index', ['listPosts' => $listPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // return redirect(route('posts.index'));
        return response()->json(['result' => 'success', 'newPostCreated' => $post], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $post = Post::find($postId);

        // return view('edit', ['post' => $post]);
        return response()->json(['result' => 'success', 'postWantUpdate' => $post], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        // return redirect(route('posts.index'));
        return response()->json(['result' => 'success', 'newPost' => $post], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        // return redirect(route('posts.index'));
        return response()->json(['result' => 'success'], 200);
    }
}
