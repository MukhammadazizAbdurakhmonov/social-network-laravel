@include('layouts.header')

<div class="row container-sm m-auto w-75">
    <div class="col-sm-8 mt-3">

		@include('posts.create')
		
    	<h4>Posts</h4>

		@foreach ($posts as $post)
			<div class="card mb-3">
				<div class="card-header fs-5">
					<div class="d-flex align-items-center fs-6">

						@if ($post->user->profile_image)
							<img src="{{ asset('storage/'.$post->user->profile_image) }}" class="rounded-circle me-2" style="width: 54px; height: 54px;">
						@else
							<img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 54px; height: 54px;">
						@endif

						@if ($post->user_id != auth()->user()->id)
							<a href="{{ route('user.show', $post->user_id) }}" class="me-4 link-body-emphasis link-offset-0 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $post->user->name }}</a>
							<span>at {{ $post->created_at }}</span>
						@else
							<a href="{{ route('profile.index') }}" class="me-4 link-body-emphasis link-offset-0 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $post->user->name }}</a>
							<span>at {{ $post->created_at }}</span>
						@endif

						@if (in_array($post->user_id, $user_ids))
							<form action="{{ route('user.unfollow') }}" method="post">
								@csrf
								<input name="following_id" type="hidden" value="{{ $post->user_id }}">
								<button class="btn btn-link text-decoration-none" value="link">Unfollow</button>
							</form>
						@endif

					</div>
				</div>

				<div class="card-body">
					<h5 class="card-text text-2xl">{{ $post->title }}</h5>
				</div>

				@if ($post->image)
					<img src="{{ asset('storage/'.$post->image) }}" class="card-img-top w-75 mt-2 m-auto" alt="...">
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
    <div class="col-sm-4 mt-3">
    	<h4>Recently joined</h4>
		@foreach ($users as $user)

		<div class="card mb-2">
		  <div class="card-body row">
			
		  	@if ($user->profile_image)
			  	<div class="col">
	    			<img src="{{ asset('storage/'.$user->profile_image) }}" class="rounded-circle me-2" style="width: 52px; height:52px">
				</div>
			@else
				<div class="col">
	    			<img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 52px; height:52px">
				</div>
			@endif
			
			<div class="col text-start">
		    	<a href="{{ route('user.show', $user->id) }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $user->name }}</a>
			</div>

			<div class="col text-end">
				@if (in_array($user->id, $user_ids))
					<form action="{{ route('user.unfollow') }}" method="post">
						@csrf
						<input name="following_id" type="hidden" value="{{ $user->id }}">
						<button class="btn btn-link text-decoration-none" value="link">Unfollow</button>
					</form>
				@else
					<form action="{{ route('user.follow') }}" method="post">
						@csrf
						<input name="following_id" type="hidden" value="{{ $user->id }}">
						<button class="btn btn-link text-decoration-none" value="link">Follow</button>
					</form>
				@endif
			</div>
		  </div>
		</div>

		@endforeach
		
	</div>
</div>

@include('layouts.footer')
