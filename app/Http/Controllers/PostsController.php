<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store()
    {
        $mediaPath = null;
        $mediaType = null;

        if (request()->has('media')) {
            if (in_array(request('media')->extension(), ['jpeg', 'png', 'gif', 'jpg'])) {
                $mediaType = 'image';
            }

            if (in_array(request('media')->extension(), ['mp4'])) {
                $mediaType = 'video';
            }

            $mediaPath = request('media')->store($mediaType.'s/posts');
        }
        
        $post = Post::create([
            'body' => request('body', ''),
            'user_id' => auth()->user()->id,
            'media_path' => $mediaPath,
            'media_type' => $mediaType,
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
