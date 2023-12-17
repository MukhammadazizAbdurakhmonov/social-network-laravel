<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function connect(){
        if(Auth::check()){
            $auth_user = User::find(auth()->user()->id); /** currently authenticated user */
            $user_ids = $auth_user->followings()->pluck('following_id')->all(); /** associative array of user ids that currently authenticated user follows */          
            $users = User::paginate(15)
                    ->except($user_ids)
                    ->except(auth()->user()->id); /** get all users except of currently authenticated user and currently authenticated user follows*/
            
            return view('connect-auth', compact('users'));
        } else{
            $users = User::paginate(15);
            return view('connect-unauth', compact('users'));
        }
    }

    public function search_user(){
        if(!empty($_GET['search_user'])){
            $search_input = $_GET['search_user'];
            $search_results = User::where('name','like', '%'.$search_input.'%')->get();
            return view('connect-unauth', compact('search_results'));
        }else{
            return $this->connect();
        }  
    }

    public function feed(){
        if (Auth::check()) {

            $auth_user = User::find(auth()->user()->id); /** currently authenticated user */
            $user_ids = $auth_user->followings()->pluck('following_id')->all(); /** associative array of user ids that currently authenticated user follows */          
            $posts = Post::whereIn('user_id', $user_ids)->orWhere('user_id', auth()->user()->id)->latest()->get(); /** posts of users that currently authenticated user follows */
            $users = User::paginate(20)->except($user_ids)->except(auth()->user()->id); /** get all users except of currently authenticated user and currently authenticated user follows*/
            $comments = Comment::all(); /** get all comments */

            return view('feed', compact('posts', 'users', 'comments', 'user_ids'));
        } else{
            return view('index');
        }   
    }

    public function profile(){
        return view('profile.index');
    }
}
