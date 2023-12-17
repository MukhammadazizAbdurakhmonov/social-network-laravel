@include('layouts.header')

<div class="mt-2 card w-50 m-auto p-3">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autocomplete="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <label for="repeatPassword" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="repeatPassword" name="password_confirmation" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary m-auto">Register</button>
    </form>
  </div>
@include('layouts.footer')
