@foreach($comments as $comment)
    <div class="display-comment" @if($comment->user_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->content }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="content" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="user_id" value="{{ $user_id}}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Reply" />
            </div>
            <hr />
        </form>
        @include('Blog.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach