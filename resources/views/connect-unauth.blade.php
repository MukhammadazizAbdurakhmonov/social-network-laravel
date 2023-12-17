@include('layouts.header')

<div class="container m-auto col-sm-4">
  <div class="mt-3">
		<h3>People to follow</h3>
		<form action="{{ route('search_user') }}" class="m-auto p-3 card mb-2" method="get">
            @csrf
		  <div class="mb-3">
		    <label for="searchBar" class="form-label">Search people</label>
		    <input type="text" name="search_user" class="form-control" id="searchBar" placeholder="Type here to search">
		  </div>
		  <button type="submit" class="btn btn-primary">Search</button>
		</form>

        @if (!empty($search_results))
            @foreach ($search_results as $search_result)
                <div class="card mb-2">
                    <div class="d-flex justify-content-between card-body align-items-center">
                        <div>
                            @if ($search_result->profile_image)
                                <img src="{{ asset('storage/'.$search_result->profile_image) }}" class="rounded-circle me-2" style="width: 52px; height:52px">
                            @else
                                <img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 52px; height:52px">
                            @endif
                        </div>
                        <div>
                            <a href="" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $search_result->name }}</a>
                        </div>
                        <div>
                            <a href="{{ route('login') }}" class="btn btn-link text-decoration-none" value="link">Follow</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($users as $user)
                <div class="card mb-2">
                    <div class="d-flex justify-content-between card-body align-items-center">
                        <div>
                            @if ($user->profile_image)
                                <img src="{{ asset('storage/'.$user->profile_image) }}" class="rounded-circle me-2" style="width: 52px; height:52px">
                            @else
                                <img src="{{ asset('storage/app_images/download.png') }}" class="rounded-circle me-2" style="width: 52px; height:52px">
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('login') }}" class="text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">{{ $user->name }}</a>
                        </div>
                        <div>
                            <a href="{{ route('login') }}" class="btn btn-link text-decoration-none" value="link">Follow</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $users->onEachSide(2)->links('pagination::bootstrap-5') }}
        @endif
	</div>
</div>

@include('layouts.footer')
