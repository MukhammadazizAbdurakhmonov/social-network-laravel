<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/connect', [FrontController::class, 'connect'])->name('connect');

Route::get('/feed', [FrontController::class, 'feed'])->middleware('auth')->name('feed');
Route::get('/search', [FrontController::class, 'search_user'])->name('search_user');

Route::resource('/post', PostController::class)->middleware('auth');
Route::resource('/comment', CommentController::class)->middleware('auth');
Route::get('comment/{comment}/post', [CommentController::class,'show_comment_post'])->middleware('auth')->name('comment.post');
Route::resource('/friend', FriendController::class)->middleware('auth');

Route::get('user/{user}', [UserController::class, 'show_user_profile'])->middleware('auth')->name('user.show');
Route::get('user/{user}/posts', [UserController::class, 'show_user_posts'])->middleware('auth')->name('user.posts');
Route::get('user/{user}/comments', [UserController::class, 'show_user_comments'])->middleware('auth')->name('user.comments');
Route::get('user/{user}/friends', [UserController::class, 'show_user_friends'])->middleware('auth')->name('user.friends');
Route::get('user/comment/{comment}/post', [UserController::class, 'show_user_comment_post'])->middleware('auth')->name('user.comment.post');

Route::resource('/profile', ProfileController::class)->middleware('auth');

Route::post('user/follow', [FollowController::class,'follow'])->middleware('auth')->name('user.follow');
Route::post('user/unfollow', [FollowController::class,'unfollow'])->middleware('auth')->name('user.unfollow');


require __DIR__.'/auth.php';
