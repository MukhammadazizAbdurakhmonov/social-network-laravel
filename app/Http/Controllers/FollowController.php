<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request){

        $follower_id = Auth::user()->id;
        $following_id = $request['following_id'];
        $user = User::find(auth()->user()->id);

        $user->followings()->attach($following_id);
        return redirect('feed');
    }

    public function unfollow(Request $request){
        $follower_id = Auth::user()->id;
        $following_id = $request['following_id'];
        $user = User::find(auth()->user()->id);

        $user->followings()->detach($following_id);
        return redirect('feed');
    }
}
