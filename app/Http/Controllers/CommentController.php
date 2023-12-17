<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Auth::user()->comments;
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_input = $request->all();
        $user_input["user_id"] = Auth::user()->id;
        $user_input["post_id"] = $request["post_id"];
        Comment::create( $user_input);
        
        return redirect('/feed');
    }

    /**
     * Display the specified resource.
     */
    public function show_comment_post(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show-comment-post', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_input = $request->all();
        $comment = Comment::findOrFail($id);
        $comment->update($user_input);

        return redirect('comment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect('comment');
    }
}
