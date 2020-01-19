<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store()
    {
        dd(request()->all());
        
        $post = Post::create([
            'body' => request('body', ''),
            'user_id' => auth()->user()->id,
        ]);

    	return redirect()->to('/home')->with('last_added_post_id', $post->id);
    }

    public function destroy(Post $post)
    {
        if ($post->user_id === auth()->user()->id) {
           $post->delete();
        }

        return redirect()->to('/home');
    }
}
