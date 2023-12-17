@include('layouts.header')
  <div class="mt-2 card w-50 m-auto p-3">
    <h2>Log in</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input class="form-control" id="exampleInputPassword1" 
                                type="password"
                                name="password"
                                required autocomplete="current-password">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>

        
        @if (Route::has('password.request'))
            <a class="d-block mb-3" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
        

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

@include('layouts.footer')
