<div class="col-sm-4 mt-3">
    <div class="card">

        @if (Auth::user()->profile_image)
              <div class="col">
                <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" class="card-img-top">
            </div>
        @else
            <div class="col">
                <img src="{{ asset('storage/app_images/download.png') }}" class="card-img-top">
            </div>
        @endif
        
        <div class="card-body">
          <h4 class="card-title">{{ Auth::user()->name }}</h4>
          
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            
            <a href="{{ route('profile.index') }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                <h5>About</h5>
            </a>
          </li>
          <li class="list-group-item">
              <a href="{{ route('post.index') }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                  <h5>Posts</h5>
              </a>
          </li>
          <li class="list-group-item">
              <a href="{{ route('comment.index') }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                  <h5>Comments</h5>
              </a>
          </li>
          <li class="list-group-item">
              <a href="{{ route('friend.index') }}" class="card-link text-dark link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">
                  <h5>Friends</h5>
              </a>
          </li>
        </ul>
    </div>
</div>