@include('layouts.header')
  <div class="mt-2 card w-50 m-auto p-3">
    <h5>Forgot your password? Just enter yout email and we will send you instructions on how to recover your password</h5>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
  </div>

@include('layouts.footer')
