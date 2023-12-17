<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_user_profile(string $id){
        $user = User::findorfail($id);

        if ($user->id != auth()->user()->id) {
            return view('users.show-user-profile', compact('user'));
        }else{
            redirect('/profile');
        }
    }

    public function show_user_posts(string $id){
        $user = User::findorfail($id);
        $posts = $user->posts;
        return view('users.show-user-posts', compact('posts','user'));
    }

    public function show_user_comments(string $id){
        $user = User::findorfail($id);
        $comments = $user->comments;
        return view('users.show-user-comments', compact('user', 'comments'));
    }

    public function show_user_comment_post(string $id){
        $comment = Comment::findOrFail($id);
        return view('users.show-user-comment-post', compact('comment'));
    }

    public function show_user_friends(string $id){
        $user = User::findorfail($id);

        $auth_user = User::find(auth()->user()->id); /** currently authenticated user */
        $user_ids = $auth_user->followings()->pluck('following_id')->all(); /** associative array of user ids that currently authenticated user follows */          
        
        $followings = DB::table('user_follower')->join('users', 'user_follower.following_id', '=', 'users.id')->where('follower_id', $id)->get();
        $followers = DB::table('user_follower')->join('users', 'user_follower.follower_id', '=', 'users.id')->where('following_id', $id)->get();

        return view('users.show-user-friends', compact('user','followings','followers','user_ids', 'auth_user'));
    }
}
