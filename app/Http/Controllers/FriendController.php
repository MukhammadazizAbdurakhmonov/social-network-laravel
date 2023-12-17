<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = User::find(auth()->user()->id); /** currently authenticated user */
        $user_ids = $auth_user->followings()->pluck('following_id')->all(); /** associative array of user ids that currently authenticated user follows */          
        
        $followings = DB::table('user_follower')->join('users', 'user_follower.following_id', '=', 'users.id')->where('follower_id', auth()->user()->id)->get();
        $followers = DB::table('user_follower')->join('users', 'user_follower.follower_id', '=', 'users.id')->where('following_id', auth()->user()->id)->get();
        

        return view('friends.index', compact('followings','followers', 'user_ids'));
    }
}
