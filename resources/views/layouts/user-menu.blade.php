<div class="col-sm-4 mt-3">
    <div class="card">

        @if ($user->profile_image)
            <div class="col">
                <img src="{{ asset('storage/'.$user->profile_image) }}" class="card-img-top">
            </div>
        @else
            <div class="col">
                <img src="{{ asset('storage/app_images/download.png') }}" class="card-img-top">
            </div>
        @endif
          
        <div class="card-body">
          <h4 class="card-title">{{ $user->name }}</h4>    
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{ route('user.show', $user->id) }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                    <h5>About</h5>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.posts', $user->id) }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                    <h5>Posts</h5>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.comments', $user->id) }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                    <h5>Comments</h5>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.friends', $user->id) }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                    <h5>Friends</h5>
                </a>
            </li>
        </ul>
    </div>
</div>
