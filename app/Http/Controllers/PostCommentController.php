<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post){
        $this->validate($request, [
            'content' => 'bail|min:3|required'
        ]);
        $comment = $post->comments()->create([
            'content' => $request->content,
            'user_id' => $request->user()->id ]);
        return \redirect()->back();
    }
}
