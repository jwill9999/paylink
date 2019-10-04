@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Posts</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Post_id</td>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Posted_at</td>
                    <td>Updated_at</td>
                    <td>Created_at</td>
                    <td>Owner</td>

                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}} </td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->posted_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->user_id}}</td>
                    <td>
                        <a href="/posts/edit/{{$post->id}}"
                            class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="/posts/{{$post->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection
