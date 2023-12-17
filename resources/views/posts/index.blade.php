@include('layouts.header')

<div class="row container-sm m-auto w-75">
    
    @include('layouts.profile-menu')
    
    <div class="col-sm-8 mt-3">
  	    <h3>Posts</h3>
        @foreach ($posts as $post )
            <div class="card mb-3">
                <div class="card-header fs-5">
                    <div class="d-flex align-items-center fs-6">
                            
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary me-2">Edit</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <p class="card-text text-6xl">{{ $post->title }}</p>
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
							<small class="text-body-secondary">{{ $comment->created_at }}</small>
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
