<div class="col-md-8 my-5">
    @include('partials/flash_message')
    <form class="my-5" method="POST" action="/comments/create/{{$post->id}}">
        @csrf
        <div class="form-group">
            <h2 for="body">Leave a comment</h2>
            <textarea name="body" class="form-control" id="body" cols="80"
                rows="8"></textarea>
        </div>
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button type="submit " class="btn btn-lg btn-success my-3 ">Submit
            comment</button>
    </form>

</div>
