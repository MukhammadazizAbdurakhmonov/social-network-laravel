@include('layouts.header')


<div class="row container-sm m-auto w-75">

	@include('layouts.profile-menu')

	<div class="col-sm-8 mt-3">
		<h3>Friends</h3>
		<div class="row">
			<div class="col">
				<h4>My followings</h4>
				@foreach ($followings as $following)
					<div class="card mb-2">
						<div class="card-body row">

							@if($following->profile_image)
								<div class="col">
									<img src="{{ asset('storage/'.$following->profile_image) }}" class="rounded-circle me-2" style="width: 52px; height:52px">
								</div>
							@else
								<div class="col">
									<img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 52px; height:52px">
								</div>
							@endif

							<div class="col text-start">
								<a href="{{ route('user.show', $following->following_id) }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $following->name }}</a>
							</div>
							<div class="col text-end">
								<form action="{{ route('user.unfollow') }}" method="post">
									@csrf
									<input name="following_id" type="hidden" value="{{ $following->following_id }}">
									<button class="btn btn-link text-decoration-none" value="link">Unfollow</button>
								</form>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col">
				<h4>My followers</h4>
				@foreach ($followers as $follower)
					<div class="card mb-2">
						<div class="card-body row">
							@if($follower->profile_image)
								<div class="col">
									<img src="{{ asset('storage/'.$follower->profile_image) }}" class="rounded-circle me-2" style="width: 52px; height:52px">
								</div>
							@else
								<div class="col">
									<img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 52px; height:52px">
								</div>
							@endif

							<div class="col text-start">
								<a href="{{ route('user.show', $follower->follower_id) }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $follower->name }}</a>
							</div>

							<div class="col text-end">
								@if (in_array($follower->follower_id, $user_ids))
									<form action="{{ route('user.unfollow') }}" method="post">
										@csrf
										<input name="following_id" type="hidden" value="{{ $follower->follower_id }}">
										<button class="btn btn-link text-decoration-none" value="link">Unfollow</button>
									</form>
								@else
									<form action="{{ route('user.follow') }}" method="post">
										@csrf
										<input name="following_id" type="hidden" value="{{ $follower->follower_id }}">
										<button class="btn btn-link text-decoration-none" value="link">Follow</button>
									</form>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</div>	
		</div>
	</div>
</div>

@include('layouts.footer')
