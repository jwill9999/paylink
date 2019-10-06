<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Index function
     *
     * @param Post $post
     * @return json
     */
    public function index()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $posts = $user->posts;
            return view('posts.index', compact('posts'));
        }

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * View a post function
     *
     * @param Post $post
     * @param Request $request
     * @return json
     */
    public function show(Post $post, Request $request)
    {
        return $post::find($request->id);
    }

    /**
     * Edit a post function
     *
     * @param Request $request
     * @return json
     */
    public function edit(Request $request, Post $post)
    {
        $post = Post::find($request->id);
        $this->authorize('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function create(Post $post)
    {

        return view('posts.create');
    }

    /**
     * Create a new Post function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        if ($validated) {

            $post = new Post;
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->posted_at = now();
            $post->user_id = auth()->user()->id;

            $post->save();


            return redirect('/home')->with('success', 'Post created and saved');
        }
    }


    /**
     * Update a Post function
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request, Post $post)
    {



        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::find($request->id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return  redirect('/home')->with('success', 'Post saved and updated');
    }


    /**
     * Delete a Post function
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/home')->with('success', 'Post deleted');
    }
}
