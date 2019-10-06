<h3 class="alert alert-info">Comments</h3>
@foreach ($post->comments as $comment)
<ul class="list-group mt-3">
    <i>
        <li class="list-group-item disabled">{{$comment->content}}<p
                class="float-right">Created:
                {{$comment->created_at->diffForHumans()}}</p>
        </li>
    </i>
</ul>

@endforeach
