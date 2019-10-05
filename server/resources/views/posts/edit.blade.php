@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="float-left" class="display-3">Edit this post</h1>
        <a class="float-right" href="{{ URL::previous() }}"><button
                type="submit" class="btn btn-outline-primary">Back</button></a>
    </div>
    <div class="col-sm-8 offset-sm-2">

        @include('partials.flash_message')
        <br />

        <form method="post" action="/posts/{{$post->id}}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title"
                    value="{{ $post->title }}" />
            </div>

            <div class="form-group">
                <label for="content">Text:</label>

                <textarea autofocus rows="6" col="50" required
                    class="form-control"
                    name="content">{{$post->content}}</textarea>
            </div>


            <button type="submit" class="btn btn-success btn-lg">Press to
                update</button>
        </form>

    </div>
</div>
@endsection
