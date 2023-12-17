@include('layouts.header')

<div class="row container-sm m-auto w-75">
    
    @include('layouts.user-menu')
    
    <div class="col-sm-8 mt-3">
  	    <h3>Posts</h3>
        @foreach ($posts as $post )
            <div class="card mb-3">
                <div class="card-header fs-5">
					<div class="d-flex align-items-center fs-6">
						<img src="{{ asset('storage/'.$post->user->profile_image) }}" class="rounded-circle me-2" style="width: 54px; height: 54px;">
						<a href="{{ route('user.show', $post->user_id) }}" class="me-4 link-body-emphasis link-offset-0 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $post->user->name }}</a>
						<a href="#" class="text-decoration-none">Unfollow</a>
					</div>
				</div>
                <div class="card-body">
                    <p class="card-text text-6xl">{{ $post->title }}</p>
                </div>

                @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top w-75 mt-2 m-auto" alt="...">
                @else

                @endif

                <div class="card-body">
                    <p class="card-text text-2xl">{{ $post->content }}</p>
                </div>
                

                @include('comments.create')

                <div class="list-group">	
					@foreach ($post->comments as $comment )
						<div href="#" class="list-group-item list-group-item-action">
							<div class="d-flex w-100 justify-content-between">
							@if ($comment->user_id != auth()->user()->id)
								<a href="{{ route('user.show', $comment->user->id) }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"><h6 class="mb-1">{{ $comment->user->name }}</h6></a> 								
							@else
								<a href="{{ route('profile.index') }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"><h6 class="mb-1">{{ $comment->user->name }}</h6></a> 
							@endif
							<span class="text-body-secondary">{{ $comment->created_at }}</span>
							</div>
							<p class="mb-1">{{ $comment->comment }}</p>
						</div>
						
					@endforeach
				</div>

            </div>
        @endforeach
    </div>
</div>

@include('layouts.footer')