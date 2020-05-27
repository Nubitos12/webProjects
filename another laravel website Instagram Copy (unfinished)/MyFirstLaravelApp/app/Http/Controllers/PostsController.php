<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }
    
    public function store()
    {
        

        $data = request()->validate([
            'caption' => 'required | min:3 | max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        

        $imagePath = (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
        
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);

        // This does the same thing
        //return view('post.show', compact('post')
    }
}