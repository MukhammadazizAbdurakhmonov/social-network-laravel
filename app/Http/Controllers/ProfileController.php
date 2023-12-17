<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's information
     *
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, string $id): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, string $id): RedirectResponse
    {

        $user_input = $request->all();
        
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if($request->hasFile('profile_image')){

            if($request->user()->profile_image){

                $old_image = $request->user()->profile_image;
                Storage::disk('public')->delete($old_image);
                $new_image = $request->file('profile_image')->store('profile_images', 'public');
                $user_input['profile_image'] = $new_image;
                
            }else{
                
                $new_image = $request->file('profile_image')->store('profile_images', 'public');
                $user_input['profile_image'] = $new_image;
            }
        }

        $request->user()->update($user_input);

        return Redirect::route('profile.index')->with('message', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
