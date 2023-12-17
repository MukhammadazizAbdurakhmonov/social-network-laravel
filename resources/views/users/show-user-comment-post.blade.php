@include('layouts.header')

<div class="row container-sm m-auto w-75">
    
    <div class="col-sm-8 mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Post comment</h3>
            
        </div>
            <div class="card mb-3">
                <div class="card-header fs-5">
					<div class="d-flex align-items-center fs-6">

						@if ($comment->post->user->profile_image)
							<img src="{{ asset('storage/'.$comment->post->user->profile_image) }}" class="rounded-circle me-2" style="width: 54px; height: 54px;">
						@else
							<img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 54px; height: 54px;">
						@endif

						@if ($comment->post->user_id != auth()->user()->id)
							<a href="{{ route('user.show', $comment->post->user_id) }}" class="me-4 link-body-emphasis link-offset-0 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $comment->post->user->name }}</a>
							<span>at {{ $comment->post->created_at }}</span>
						@else
							<a href="{{ route('profile.index') }}" class="me-4 link-body-emphasis link-offset-0 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $comment->post->user->name }}</a>
							<span>at {{ $comment->post->created_at }}</span>
						@endif
                        
					</div>
				</div>

                <div class="card-body">
                    <p class="card-text text-6xl">{{ $comment->post->title }}</p>
                </div>

                @if ($comment->post->image)
                    <img src="{{ asset('storage/'.$comment->post->image) }}" class="card-img-top w-75 mt-2 m-auto" alt="...">
                @endif

                <div class="card-body">
                    <p class="card-text text-2xl">{{ $comment->post->content }}</p>
                </div>

                <div class="card-footer">
                    <form action="{{ route('comment.store') }}" class="d-flex align-items-center flex-shrink-1" method="post">
                        @csrf
                        <input name="comment" type="text" class="form-control" placeholder="Add comment as {{ Auth::user()->name }}">
                        <input type="hidden" name="post_id" value="{{ $comment->post->id }}">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <div class="list-group">	
					
						<div href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
							@if ($comment->user_id != auth()->user()->id)
								<a href="{{ route('user.show', $comment->user->id) }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"><h6 class="mb-1">{{ $comment->user->name }}</h6></a> 								
							@else
								<a href="{{ route('profile.index') }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"><h6 class="mb-1">{{ $comment->user->name }}</h6></a> 
							@endif
							<small class="text-body-secondary">{{ $comment->created_at }}</small>
							</div>
							<p class="mb-1">{{ $comment->comment }}</p>
						</div>
					
				</div>
            </div>
    </div>
</div>

@include('layouts.footer')
