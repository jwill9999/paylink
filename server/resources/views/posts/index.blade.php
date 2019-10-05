@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if (auth()->user())
        <h1 class="display-3">Your Posts</h1>
        @else
        <h1 class="display-3">All Posts</h1>
        @endif
        @include('partials.flash_message')
        <table class="table table-striped">
            <thead>
                <tr>

                    <td>Title</td>
                    <td>Content</td>




                    @if (auth()->user())
                    <td colspan=2>Actions</td>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>

                    <td>{{$post->title}} </td>
                    <td>{{$post->content}}</td>

                    @if (auth()->user())
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
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection
