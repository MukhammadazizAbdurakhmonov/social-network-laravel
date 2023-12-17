<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view("posts.index", compact("posts"));
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
        $user_input['user_id'] = Auth::id();

        if($request->hasFile('image')){
            $new_image = $request->file('image')->store('post_images', 'public');
            $user_input['image'] = $new_image;
        }

        Post::create($user_input);
        return redirect('/feed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_input = $request->all();
        $post = Post::findOrFail($id);
        
        if($request->hasFile('image')){

            if($post->image){

                Storage::disk('public')->delete($post->image);
                $new_image = $request->file('image')->store('post_images', 'public');
                $user_input['image'] = $new_image;

            }else{

                $new_image = $request->file('image')->store('post_images', 'public');
                $user_input['image'] = $new_image;

            }
        }
        
        $post->update($user_input);
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->image){

            Storage::disk('public')->delete($post->image);
        
        }

        $post->delete();
        return redirect('post');
    }
}
