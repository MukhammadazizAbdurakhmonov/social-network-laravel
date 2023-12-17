@include('layouts.header')

<div class="row container-sm m-auto w-75">

    @include('layouts.profile-menu')
    
    <div class="col-sm-8 mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3>About</h3>
            <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit profile</a>
        </div>
        
        <ul class="list-group fs-4 mt-2">
            <li class="list-group-item"><i class="fa-solid fa-user me-1"></i>{{ Auth::user()->name }}</li>
            <li class="list-group-item"><i class="fa-solid fa-cake-candles me-1"></i>{{ Auth::user()->birthdate }}</li>
            <li class="list-group-item"><i class="fa-solid fa-briefcase me-1"></i>{{ Auth::user()->workplace }}</li>
            <li class="list-group-item"><i class="fa-solid fa-building-columns me-1"></i>{{ Auth::user()->education }}</li>
            <li class="list-group-item"><i class="fa-solid fa-location-dot me-1"></i>{{ Auth::user()->place_of_residence }}</li>
            <li class="list-group-item"><i class="fa-solid fa-language me-1"></i>{{ Auth::user()->languages }}</li>
            <li class="list-group-item"><i class="fa-solid fa-calendar me-1"></i>Joined <span>{{ Auth::user()->created_at->format('Y') }}</span></li>
          </ul>
      </div>
</div>

@include('layouts.footer')