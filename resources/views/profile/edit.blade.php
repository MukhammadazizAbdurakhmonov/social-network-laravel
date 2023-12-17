@include('layouts.header')

<div class="row container-sm m-auto w-75">
    
    @include('layouts.profile-menu')

    <div class="col-sm-8 mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Edit details</h3>
            <a href="{{ route('profile.index') }}" class="btn btn-primary">Cancel</a>
        </div>
        <form method="post" action="{{ route('profile.update', $user->id) }}" class="row g-3 mb-2" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="col-12">
              <label for="name" class="form-label">Name</label>
              <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <img src="{{ asset('storage/'.$user->profile_image) }}" alt="" style="width: 372px;">
            </div>

            <div class="col-12">
                <label for="profile_image" class="form-label">Profile image</label>
                <input name="profile_image" type="file" class="form-control" id="profile_image">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                
                    
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
                @endif
            </div>

            <div class="col-12">
              <label for="birthDate" class="form-label">Birthdate</label>
              <input name="birthdate" type="date" class="form-control" id="birthDate" value="{{ old('birth_date', $user->birthdate) }}">
            </div>

            <div class="col-12">
              <label for="education" class="form-label">Education</label>
              <input name="education" type="text" class="form-control" id="education" placeholder="MIT" value="{{ old('education', $user->education) }}">
            </div>

            <div class="col-12">
              <label for="work" class="form-label">Workplace</label>
              <input name="workplace" type="text" class="form-control" id="work" placeholder="Software Engineer at Google" value="{{ old('workplace', $user->workplace) }}">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Place of residence</label>
              <input name="place_of_residence" type="text" class="form-control" id="address" placeholder="California, USA" value="{{ old('place_of_residence', $user->place_of_residence) }}">
            </div>

            <div class="col-12">
              <label for="language" class="form-label">Languages</label>
              <input name="languages" type="text" class="form-control" id="language" placeholder="English" value="{{ old('languages', $user->languages) }}">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
           
        <div class="d-flex justify-content-between align-items-center">
            <h3>Edit credentials</h3>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h4>Update password</h4>
        </div>

        <form method="post" action="{{ route('password.update', $user->id) }}" class="row g-3 mb-2">
            @csrf
            @method('put')
    
            <div class="col-12">
                <label for="current_password" class="form-label">Current Password</label>
                <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                @error('current_password')
                    <div class="error">{{ $message }}</div>
                @enderror
                
            </div>
    
            <div class="col-12">
                <label for="password" class="form-label">New Password</label>
                <input id="password" name="password" type="password" class="form-control" autocomplete="new-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="col-12">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
      </div>
  </div>

@include('layouts.footer')





{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile Information') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>
                    
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
                    
                        <form method="post" action="{{ route('profile.update', $user->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                    
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                            {{ __('Your email address is unverified.') }}
                    
                                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>
                    
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                    
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
