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
    public function index(Post $post)
    {
        $posts = $post->all();

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
    public function edit(Request $request)
    {
        $post = Post::find($request->id);
        return view('posts.edit', compact('post'));
    }

     /**
      * Create a new Post function
      *
      * @param Request $request
      * @return void
      */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'text' => 'required'
        ]);

        if ($request->validated()) {

            $post = new Post;
            $post->title = $request->get('title');
            $post->text = $request->get('text');

            $post->save();


            return redirect('/posts')->with('success', 'Post saved');
        }
    }
     

    /**
     * Update a Post function
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'text' => 'required',
        ]);

        $post = Post::find($request->id);
        $post->title = $request->get('title');
        $post->text = $request->get('text');
        $post->save();

        return  redirect('/posts')->with('success', 'Post saved and updated');
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

        return redirect('/posts')->with('success', 'Post deleted');
    }
}
