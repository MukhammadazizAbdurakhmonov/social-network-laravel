<div class="card-footer">
    <form action="{{ route('comment.store') }}" class="d-flex align-items-center flex-shrink-1" method="post">
        @csrf
        <input name="comment" type="text" class="form-control" placeholder="Add comment as {{ Auth::user()->name }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>
</div>