@extends('layouts.app');

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a new post</h1>
        <div>
            @include('partials.flash_message')
            <br />

            <form method="POST" action="/posts">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" />
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" name="content" />
                </div>
                <button type="submit" class="btn btn-success btn-lg">Add new
                    post</button>
            </form>
        </div>
    </div>
</div>

@endsection
