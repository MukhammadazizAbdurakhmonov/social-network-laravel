@include('layouts.header')

<div class="row container-sm m-auto w-75">
  
    @include('layouts.profile-menu')

  <div class="col-sm-8 mt-3">
  	<div class="d-flex justify-content-between align-items-center">
  		<h3>Edit comment</h3>
  		<a href="{{ route('comment.index') }}" class="btn btn-primary">Cancel</a>
  	</div>
  	<form action="{{ route('comment.update', $comment->id) }}" class="row g-3 mb-2" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="comment" class="col-form-label">Comment:</label>
            <input name="comment" type="text" class="form-control" id="comment" value="{{ $comment->comment }}">
        </div>
      
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
	</form>
	</div>
</div>

@include('layouts.footer')