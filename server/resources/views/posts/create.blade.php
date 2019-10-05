@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="float-left" class="display-3">Create a new post</h1>
        <a class="float-right m-2" href="{{ URL::previous() }}"><button
                type="submit" class="btn btn-outline-dark">Back</button></a>
        <a class="float-right m-2 " href="{{ url('/home') }}"><button
                type="submit" class="btn btn-outline-primary">Home</button></a>
    </div>
    <div class="col-sm-8 offset-sm-2">
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
